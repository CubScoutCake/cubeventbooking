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
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <span><strong><?= __('Application') ?>:</strong> <?= $invoice->has('application') ? $invoice->application->display_code : '' ?></span>
                        <br/>
                        <span><strong><?= __('Event') ?>:</strong> <?= h($invoice->application->event->full_name) ?></span>
                        <br/>
                        <span><strong><?= __('Date Created') ?>:</strong> <?= h($this->Time->i18nFormat($invoice->created,'dd-MMM-YY HH:mm', 'Europe/London')) ?></span>
                        <br/>
                        <span><strong><?= __('User') ?>:</strong> <?= $invoice->has('user') ? $invoice->user->full_name : '' ?></span>
                        <br/>
                        <span><strong><?= __('Section') ?>:</strong> <?= $invoice->application->has('section') ? $this->Text->truncate($invoice->application->section->section,30) : '' ?></span>
                        <br/>
                        <span><strong><?= __('Scout Group') ?>:</strong> <?= $invoice->application->has('section') ? $this->Text->truncate($invoice->application->section->scoutgroup->scoutgroup,30) : '' ?></span>
                        <br/>
                        <span><strong><?= __('District') ?>:</strong> <?= $invoice->application->has('section') ? $this->Text->truncate($invoice->application->section->scoutgroup->district->district,30) : '' ?></span>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <?= $this->element('terms', ['invoice' => $invoice]) ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <i class="fal fa-file-invoice-dollar fa-fw"></i> Balance
            </div>
            <div class="panel-body">
                <table class="table table-condensed">
                    <tr>
                        <th><?= __('Initial Value') ?></th>
                        <th><?= __('Payments Recieved') ?></th>
                        <th><?= __('Balance') ?></th>
                    </tr>
                    <tr>
                        <td><?= $this->Number->currency($invoice->initialvalue,'GBP') ?></td>
                        <td><?= $this->Number->currency($invoice->value,'GBP') ?></td>
                        <td><?= $this->Number->currency($invoice->balance,'GBP') ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<?php if (!empty($invoice->invoice_items)): ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <i class="fal fa-file-invoice-dollar fa-fw"></i> Invoice Line Items
                </div>
                <div class="panel-body">
                    <table class="table table-condensed">
                        <tr>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Quantity') ?></th>
                            <th><?= __('Value') ?></th>
                            <th><?= __('Sum Price') ?></th>
                        </tr>
						<?php foreach ($invoice->invoice_items as $invoiceItems): ?>
                            <tr>
                                <td><?= h($invoiceItems->description) ?></td>
                                <td><?= h($invoiceItems->quantity) ?></td>
                                <td><?= h($this->number->currency($invoiceItems->value,'GBP')) ?></td>
                                <td><?= h($this->number->currency($invoiceItems->quantity_price,'GBP')) ?></td>
                            </tr>
						<?php endforeach; ?>
                    </table>
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
                    <p>The full value of the Deposit above is due before: <strong><?= h($this->Time->format($invoice->application->event->deposit_date,'dd-MMM-YY', 'Europe/London')) ?></strong></p>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<div class="row">
    <div class="col-lg-12">
		<?php if (!empty($invoice->payments)): ?>
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <i class="fal fa-receipt fa-fw"></i> Payments Recieved
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table class="table table-condensed">
                        <tr>
                            <th><?= __('ID') ?></th>
                            <th><?= __('Value') ?></th>
                            <th><?= __('Paid') ?></th>
                            <th><?= __('Name on Cheque') ?></th>
                        </tr>
						<?php foreach ($invoice->payments as $payments): ?>
                            <tr>
                                <td><?= h($payments->id) ?></td>
                                <td><?= $this->Number->currency($payments->value,'GBP') ?></td>
                                <td><?= $this->Time->i18nFormat($payments->paid,'dd-MMM-yy') ?></td>
                                <td><?= $this->Text->wrap($payments->name_on_cheque,20); ?></td>
                            </tr>
						<?php endforeach; ?>
                    </table>
                </div>
            </div>
		<?php endif; ?>
		<?php if (empty($invoice->payments)): ?>
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <i class="fal fa-receipt fa-fw"></i> Payments received will be listed here.
                </div>
            </div>
		<?php endif; ?>
    </div>
</div>
