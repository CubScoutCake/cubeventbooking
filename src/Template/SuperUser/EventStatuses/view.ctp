<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EventStatus $eventStatus
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Event Status'), ['action' => 'edit', $eventStatus->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Event Status'), ['action' => 'delete', $eventStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventStatus->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Event Statuses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event Status'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="eventStatuses view large-9 medium-8 columns content">
    <h3><?= h($eventStatus->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Event Status') ?></th>
            <td><?= h($eventStatus->event_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($eventStatus->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Live') ?></th>
            <td><?= $eventStatus->live ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Accepting Applications') ?></th>
            <td><?= $eventStatus->accepting_applications ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Events') ?></h4>
        <?php if (!empty($eventStatus->events)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Full Name') ?></th>
                <th scope="col"><?= __('Live') ?></th>
                <th scope="col"><?= __('New Apps') ?></th>
                <th scope="col"><?= __('Start Date') ?></th>
                <th scope="col"><?= __('End Date') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Deposit') ?></th>
                <th scope="col"><?= __('Deposit Date') ?></th>
                <th scope="col"><?= __('Deposit Value') ?></th>
                <th scope="col"><?= __('Deposit Inc Leaders') ?></th>
                <th scope="col"><?= __('Deposit Text') ?></th>
                <th scope="col"><?= __('Cubs') ?></th>
                <th scope="col"><?= __('Cubs Value') ?></th>
                <th scope="col"><?= __('Cubs Text') ?></th>
                <th scope="col"><?= __('Yls') ?></th>
                <th scope="col"><?= __('Yls Value') ?></th>
                <th scope="col"><?= __('Yls Text') ?></th>
                <th scope="col"><?= __('Leaders') ?></th>
                <th scope="col"><?= __('Leaders Value') ?></th>
                <th scope="col"><?= __('Leaders Text') ?></th>
                <th scope="col"><?= __('Logo') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('City') ?></th>
                <th scope="col"><?= __('County') ?></th>
                <th scope="col"><?= __('Postcode') ?></th>
                <th scope="col"><?= __('Invtext Id') ?></th>
                <th scope="col"><?= __('Legaltext Id') ?></th>
                <th scope="col"><?= __('Discount Id') ?></th>
                <th scope="col"><?= __('Intro Text') ?></th>
                <th scope="col"><?= __('Tagline Text') ?></th>
                <th scope="col"><?= __('Location') ?></th>
                <th scope="col"><?= __('Max') ?></th>
                <th scope="col"><?= __('Max Cubs') ?></th>
                <th scope="col"><?= __('Max Yls') ?></th>
                <th scope="col"><?= __('Max Leaders') ?></th>
                <th scope="col"><?= __('Allow Reductions') ?></th>
                <th scope="col"><?= __('Logo Ratio') ?></th>
                <th scope="col"><?= __('Invoices Locked') ?></th>
                <th scope="col"><?= __('Admin Firstname') ?></th>
                <th scope="col"><?= __('Admin Lastname') ?></th>
                <th scope="col"><?= __('Admin Email') ?></th>
                <th scope="col"><?= __('Admin User Id') ?></th>
                <th scope="col"><?= __('Parent Applications') ?></th>
                <th scope="col"><?= __('Max Apps') ?></th>
                <th scope="col"><?= __('Max Section') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Event Type Id') ?></th>
                <th scope="col"><?= __('Section Type Id') ?></th>
                <th scope="col"><?= __('Closing Date') ?></th>
                <th scope="col"><?= __('Cc Apps') ?></th>
                <th scope="col"><?= __('Complete') ?></th>
                <th scope="col"><?= __('Cc Prices') ?></th>
                <th scope="col"><?= __('Team Price') ?></th>
                <th scope="col"><?= __('Event Status Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($eventStatus->events as $events): ?>
            <tr>
                <td><?= h($events->id) ?></td>
                <td><?= h($events->name) ?></td>
                <td><?= h($events->full_name) ?></td>
                <td><?= h($events->live) ?></td>
                <td><?= h($events->new_apps) ?></td>
                <td><?= h($events->start_date) ?></td>
                <td><?= h($events->end_date) ?></td>
                <td><?= h($events->created) ?></td>
                <td><?= h($events->modified) ?></td>
                <td><?= h($events->deposit) ?></td>
                <td><?= h($events->deposit_date) ?></td>
                <td><?= h($events->deposit_value) ?></td>
                <td><?= h($events->deposit_inc_leaders) ?></td>
                <td><?= h($events->deposit_text) ?></td>
                <td><?= h($events->cubs) ?></td>
                <td><?= h($events->cubs_value) ?></td>
                <td><?= h($events->cubs_text) ?></td>
                <td><?= h($events->yls) ?></td>
                <td><?= h($events->yls_value) ?></td>
                <td><?= h($events->yls_text) ?></td>
                <td><?= h($events->leaders) ?></td>
                <td><?= h($events->leaders_value) ?></td>
                <td><?= h($events->leaders_text) ?></td>
                <td><?= h($events->logo) ?></td>
                <td><?= h($events->address) ?></td>
                <td><?= h($events->city) ?></td>
                <td><?= h($events->county) ?></td>
                <td><?= h($events->postcode) ?></td>
                <td><?= h($events->invtext_id) ?></td>
                <td><?= h($events->legaltext_id) ?></td>
                <td><?= h($events->discount_id) ?></td>
                <td><?= h($events->intro_text) ?></td>
                <td><?= h($events->tagline_text) ?></td>
                <td><?= h($events->location) ?></td>
                <td><?= h($events->max) ?></td>
                <td><?= h($events->max_cubs) ?></td>
                <td><?= h($events->max_yls) ?></td>
                <td><?= h($events->max_leaders) ?></td>
                <td><?= h($events->allow_reductions) ?></td>
                <td><?= h($events->logo_ratio) ?></td>
                <td><?= h($events->invoices_locked) ?></td>
                <td><?= h($events->admin_firstname) ?></td>
                <td><?= h($events->admin_lastname) ?></td>
                <td><?= h($events->admin_email) ?></td>
                <td><?= h($events->admin_user_id) ?></td>
                <td><?= h($events->parent_applications) ?></td>
                <td><?= h($events->max_apps) ?></td>
                <td><?= h($events->max_section) ?></td>
                <td><?= h($events->deleted) ?></td>
                <td><?= h($events->event_type_id) ?></td>
                <td><?= h($events->section_type_id) ?></td>
                <td><?= h($events->closing_date) ?></td>
                <td><?= h($events->cc_apps) ?></td>
                <td><?= h($events->complete) ?></td>
                <td><?= h($events->cc_prices) ?></td>
                <td><?= h($events->team_price) ?></td>
                <td><?= h($events->event_status_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Events', 'action' => 'view', $events->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Events', 'action' => 'edit', $events->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Events', 'action' => 'delete', $events->id], ['confirm' => __('Are you sure you want to delete # {0}?', $events->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
