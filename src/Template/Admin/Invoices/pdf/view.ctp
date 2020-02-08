<?php

/**
 * @var \App\Model\Entity\Invoice $invoice
 */

?>
<div class="row">
    <div class="col-lg-12 col-md-12">
        <h1 style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;"><i class="fal fa-file-invoice-dollar fa-fw"></i> Payment Invoice INV #<?= $this->Number->format($invoice->id) ?></h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-warning">
            <div class="panel-body">
                <span><?= __('User') ?>: <?= $invoice->has('user') ? $this->Html->link($invoice->user->full_name, ['controller' => 'Users', 'action' => 'view', $invoice->user->id]) : '' ?></span>
                <?php if ($invoice->has('application')) : ?>
                    <br />
                    <span><?= __('Application') ?>: <?= $this->Html->link($invoice->application->display_code, ['controller' => 'Applications', 'action' => 'view', $invoice->application->id]) ?></span>
                <?php endif; ?>
                <?php if ($invoice->has('reservation')) : ?>
                    <br />
                    <span><?= __('Reservation') ?>: <?= $this->Html->link($invoice->reservation->reservation_number, ['controller' => 'Reservations', 'action' => 'view', $invoice->reservation->id]) ?></span>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-body">
                <span><?= __('Date Created') ?>: <?= h($this->Time->i18nFormat($invoice->created,'dd-MMM-YY HH:mm', 'Europe/London')) ?></span>
                <br />
                <span><?= __('Date Last Modified') ?>: <?= h($this->Time->i18nFormat($invoice->modified,'dd-MMM-YY HH:mm', 'Europe/London')) ?></span>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-hover">
                <tr>
                    <th><?= __('Initial Value') ?></th>
                    <th><?= __('Payments Recieved') ?></th>
                    <th><?= __('Balance') ?></th>
                </tr>
                <tr>
                    <td><?= $this->Number->currency($invoice->initial_value,'GBP') ?></td>
                    <td><?= $this->Number->currency($invoice->paid_value,'GBP') ?></td>
                    <td><?= $this->Number->currency($invoice->balance,'GBP') ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
<?php if (!empty($invoice->invoice_items)): ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <i class="fal fa-file-invoice-dollar fa-fw"></i> Invoice Line Items
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <th><?= __('Description') ?></th>
                                <th><?= __('Quantity') ?></th>
                                <th><?= __('Value') ?></th>
                                <th><?= __('Sum Price') ?></th>
                                <th><?= __('Visible') ?></th>
                            </tr>
                            <?php foreach ($invoice->invoice_items as $invoiceItems): ?>
                                <tr>
                                    <td><?= h($invoiceItems->description) ?></td>
                                    <td><?= h($invoiceItems->quantity) ?></td>
                                    <td><?= h($this->number->currency($invoiceItems->value,'GBP')) ?></td>
                                    <td><?= (strpos($invoiceItems->description, 'CANCELLED') !== false)  ? $this->Html->link($this->number->currency($invoiceItems->quantity_price,'GBP'),['controller' => 'InvoiceItems', 'action' => 'edit', $invoiceItems->id, 'prefix' => 'admin' ]) : $this->number->currency($invoiceItems->quantity_price,'GBP'); ?></td>
                                    <td><?= $invoiceItems->visible ? __('Yes') : __('No'); ?>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
                <div class="panel-footer">
                    <?= $this->element('terms', ['invoice' => $invoice]) ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if (empty($invoice->invoice_items)): ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-yellow">
                <div class="panel-body">
                    <?= $this->element('terms', ['invoice' => $invoice]) ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if (!empty($invoice->schedule_items)): ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <i class="fal fa-clock fa-fw"></i> Deposit Schedule
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <th><?= __('Description') ?></th>
                                <th><?= __('Quantity') ?></th>
                                <th><?= __('Value') ?></th>
                                <th><?= __('Sum Price') ?></th>
                            </tr>
                            <?php foreach ($invoice->schedule_items as $invoiceItems): ?>
                                <tr>
                                    <td><?= h($invoiceItems->description) ?></td>
                                    <td><?= h($invoiceItems->quantity) ?></td>
                                    <td><?= h($this->Number->currency($invoiceItems->value,'GBP')) ?></td>
                                    <td><?= h($this->Number->currency($invoiceItems->quantity_price,'GBP')) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
                <div class="panel-footer">
                    <?php $invoice->has('application') ? $depositDate = $invoice->application->event->deposit_date : $depositDate = $invoice->reservation->event->deposit_date ?>
                    <p>The full value of the Deposit above is due before: <strong><?= h($this->Time->format($depositDate,'dd-MMM-YY', 'Europe/London')) ?></strong></p>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<div class="row">
    <div class="col-lg-12">
        <?php if (!empty($invoice->payments)): ?>
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <i class="fal fa-receipt fa-fw"></i> Payments Recieved
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body"><div class="related">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tr>
                                    <th><?= __('Id') ?></th>
                                    <th><?= __('Actions') ?></th>
                                    <th><?= __('Value') ?></th>
                                    <th><?= __('Created') ?></th>
                                    <th><?= __('Paid') ?></th>
                                    <th><?= __('Name on Cheque') ?></th>
                                </tr>
                                <?php foreach ($invoice->payments as $payments): ?>
                                    <tr>
                                        <td><?= h($payments->id) ?></td>
                                        <td class="actions">
                                            <div class="dropdown btn-group">
                                                <button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown">
                                                    <i class="fal fa-cog"></i>  <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu " role="menu">
                                                    <li><?= $this->Html->link(__('View'), ['controller' => 'Payments', 'prefix' => 'admin', 'action' => 'view', $payments->id]) ?></li>
                                                    <li><?= $this->Html->link(__('Edit'), ['controller' => 'Payments', 'prefix' => 'admin', 'action' => 'edit', $payments->id]) ?></li>
                                                    <li><?= $this->Form->postLink(__('Delete'), ['controller' => 'Payments', 'prefix' => 'admin', 'action' => 'delete', $payments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payments->id)]) ?></li>
                                                    <li class="divider"></li>
                                                    <li><?= $this->Html->link(__('Notify'), ['controller' => 'Notifications', 'action' => 'notify_payment', $payments->id]) ?></li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td><?= $this->Number->currency($payments->value,'GBP') ?></td>
                                        <td><?= $this->Time->i18nFormat($payments->created,'dd-MMM-YY HH:mm', 'Europe/London') ?></td>
                                        <td><?= $this->Time->i18nFormat($payments->paid,'dd-MMM-YY HH:mm', 'Europe/London') ?></td>
                                        <td><?= h($payments->name_on_cheque) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if (empty($invoice->payments)): ?>
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <i class="fal fa-receipt fa-fw"></i> Payments received will be listed here.
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <?php if (!empty($invoice->notes)) : ?>
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <i class="fal fa-edit fa-fw"></i> Invoice Notes
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <th><?= __('Id') ?></th>
                                <th><?= __('Actions') ?></th>
                                <th><?= __('Note') ?></th>
                                <th><?= __('Last Modified') ?></th>
                            </tr>
                            <?php foreach ($invoice->notes as $notes): ?>
                                <tr>
                                    <td><?= h($notes->id) ?></td>
                                    <td class="actions">
                                        <div class="dropdown btn-group">
                                            <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                                                <i class="fal fa-cog"></i>  <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu " role="menu">
                                                <li><?= $this->Html->link(__('View'), ['controller' => 'Notes', 'prefix' => 'admin', 'action' => 'view', $notes->id]) ?></li>
                                                <li><?= $this->Html->link(__('Edit'), ['controller' => 'Notes', 'prefix' => 'admin', 'action' => 'edit', $notes->id]) ?></li>
                                                <li><?= $this->Form->postLink(__('Delete'), ['controller' => 'Notes', 'prefix' => 'admin', 'action' => 'delete', $notes->id], ['confirm' => __('Are you sure you want to delete note # {0}?', $notes->id)]) ?></li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td><?= $this->Text->autoParagraph($notes->note_text) ?></td>
                                    <td><?= $this->Time->i18nFormat($notes->modified,'dd-MMM-YY HH:mm', 'Europe/London') ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
