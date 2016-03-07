<?= $this->assign('title', 'Herts Cubs - Admin Home Page'); ?>
<?= $cell = $this->cell('Notifications', [$userId]); $cell ?>

<div class="landing actions columns large-2 medium-3">

	<?= $this->start('Sidebar');
	echo $this->element('Sidebar/admin');
	$this->end(); ?>
	
	<?= $this->fetch('Sidebar') ?>
	
</div>

<div class="landing admin_home large-9 medium-9 columns content">
	<div>
	</br>
		<p>Key administration tasks can be accomplished from this admin section, which has complete control over all applications and data.</p>
	</div>
</div>

<div class="landing admin_home large-10 medium-9 columns content">
	<table class="goat" cellpadding="0" cellspacing="0">
        <tr class="goat">
        	<th class="goat"><?= __('Users'); ?></th>
			<th class="goat"><?= __('Applications'); ?></th>
			<th class="goat"><?= __('Attendees'); ?></th>
			<th class="goat"><?= __('Financial'); ?></th>
			<th class="goat"><?= __('Champions'); ?></th>
			<th class="goat"><?= __('Scout Groups & Districts'); ?></th>
        </tr>
        <tr class="goat">
        	<td class="goat"><?= $this->Html->link('Users', ['prefix' => 'admin','controller' => 'Users', 'action' => 'index']); ?></td>
			<td class="goat"><?= $this->Html->link('Applications', ['prefix' => 'admin','controller' => 'Applications', 'action' => 'index']); ?></td>
			<td class="goat"><?= $this->Html->link('Attendees', ['prefix' => 'admin', 'controller' => 'Attendees', 'action' => 'index']); ?></td>
			<td class="goat"><?= $this->Html->link('Invoices', ['prefix' => 'admin', 'controller' => 'Invoices', 'action' => 'index']); ?></td>
			<td class="goat"><?= $this->Html->link('Champions', ['prefix' => 'admin', 'controller' => 'Champions', 'action' => 'index']); ?></td>
			<td class="goat"><?= $this->Html->link('Districts', ['prefix' => 'admin', 'controller' => 'Districts', 'action' => 'index']); ?></td>
        </tr>
        <tr class="goat">
        	<td class="goat"><?= $this->Html->link('Add User', ['prefix' => 'admin','controller' => 'Users', 'action' => 'add']); ?></td>
			<td class="goat"><?= $this->Html->link('Add Application', ['prefix' => 'admin','controller' => 'Applications', 'action' => 'add']); ?></td>
			<td class="goat"><?= $this->Html->link('Add Attendee', ['prefix' => 'admin', 'controller' => 'Attendees', 'action' => 'add']); ?></td>
			<td class="goat"><?= $this->Html->link('Add Invoice', ['prefix' => 'admin', 'controller' => 'Invoices', 'action' => 'add']); ?></td>
			<td class="goat"><?= $this->Html->link('Add Champion', ['prefix' => 'admin', 'controller' => 'Champions', 'action' => 'add']); ?></td>
			<td class="goat"><?= $this->Html->link('Add a District', ['prefix' => 'admin', 'controller' => 'Districts', 'action' => 'add']); ?></td>
        </tr>
        <tr class="goat">
			<td class="goat"></td>
			<td class="goat"></td>
			<td class="goat"><?= $this->Html->link('Allergies', ['prefix' => 'admin', 'controller' => 'Allergies', 'action' => 'index']); ?></td>
			<td class="goat"><?= $this->Html->link('Payments', ['prefix' => 'admin', 'controller' => 'Payments', 'action' => 'index']); ?></td>
			<td class="goat"></td>
			<td class="goat"><?= $this->Html->link('Scout Groups', ['prefix' => 'admin', 'controller' => 'Scoutgroups', 'action' => 'index']); ?></td>
        </tr>
        <tr class="goat">
			<td class="goat"></td>
			<td class="goat"></td>
			<td class="goat"><?= $this->Html->link('Add Allergy', ['prefix' => 'admin', 'controller' => 'Allergies', 'action' => 'add']); ?></td>
			<td class="goat"><?= $this->Html->link('Add Payment', ['prefix' => 'admin', 'controller' => 'Payments', 'action' => 'add']); ?></td>
			<td class="goat"></td>
			<td class="goat"><?= $this->Html->link('Add Scout Group', ['prefix' => 'admin', 'controller' => 'Scoutgroups', 'action' => 'add']); ?></td>
        </tr>
        <tr class="goat">
			<td class="goat"></td>
			<td class="goat"></td>
			<td class="goat"></td>
			<td class="goat"><?= $this->Html->link('Line Items', ['prefix' => 'admin', 'controller' => 'InvoiceItems', 'action' => 'index']); ?></td>
			<td class="goat"></td>
			<td class="goat"></td>
        </tr>
    </table>
</div>

<div class="landing admin_home large-10 medium-9 columns content">
	<table class="goat" cellpadding="0" cellspacing="0">
        <tr class="goat">
        	<th class="goat"><?= __('Settings'); ?></th>
        	<th class="goat"><?= __('Setting Types'); ?></th>
			<th class="goat"><?= __('Roles'); ?></th>
			<th class="goat"><?= __('Events'); ?></th>
			<th class="goat"><?= __('Discounts'); ?></th>
        </tr>
        <tr class="goat">
        	<td class="goat"><?= $this->Html->link('Settings', ['prefix' => 'admin', 'controller' => 'Settings', 'action' => 'index']); ?></td>
        	<td class="goat"><?= $this->Html->link('Setting Types', ['prefix' => 'admin', 'controller' => 'Settingtypes', 'action' => 'index']); ?></td>
			<td class="goat"><?= $this->Html->link('Roles', ['prefix' => 'admin', 'controller' => 'Roles', 'action' => 'index']); ?></td>
			<td class="goat"><?= $this->Html->link('Events', ['prefix' => 'admin', 'controller' => 'Events', 'action' => 'index']); ?></td>
			<td class="goat"><?= $this->Html->link('Discounts', ['prefix' => 'admin','controller' => 'Discounts', 'action' => 'index']); ?></td>
        </tr>
        <tr class="goat">
        	<td class="goat"><?= $this->Html->link('Add Setting', ['prefix' => 'admin', 'controller' => 'Settings', 'action' => 'add']); ?></td>
        	<td class="goat"><?= $this->Html->link('Add Setting Type', ['prefix' => 'admin', 'controller' => 'Settingtypes', 'action' => 'add']); ?></td>
			<td class="goat"><?= $this->Html->link('Add Role', ['prefix' => 'admin', 'controller' => 'Roles', 'action' => 'add']); ?></td>
			<td class="goat"><?= $this->Html->link('Add Event', ['prefix' => 'admin', 'controller' => 'Events', 'action' => 'add']); ?></td>
			<td class="goat"><?= $this->Html->link('Add Discount', ['prefix' => 'admin', 'controller' => 'Discounts', 'action' => 'add']); ?></td>
        </tr>
    </table>
</div>

<div class="admin_home large-10 medium-9 columns">
    <h3><?= __('Summary Numbers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Html->link(__('Events'), ['controller' => 'Events', 'action' => 'index']) ?></th>
                <th><?= $this->Html->link(__('Users'), ['controller' => 'Users', 'action' => 'index']) ?></th>
                <th><?= $this->Html->link(__('Applications'), ['controller' => 'Applications', 'action' => 'index']) ?></th>
                <th><?= $this->Html->link(__('Invoices'), ['controller' => 'Invoices', 'action' => 'index']) ?></th>
                <th><?= $this->Html->link(__('Payments'), ['controller' => 'Payments', 'action' => 'index']) ?></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $this->Number->format($cntEvents) ?></td>
                <td><?= $this->Number->format($cntUsers) ?></td>
                <td><?= $this->Number->format($cntApplications) ?></td>
                <td><?= $this->Number->format($cntInvoices) ?></td>
                <td><?= $this->Number->format($cntPayments) ?></td>
            </tr>
        </tbody>
    </table>
</div>

<div class="admin_home large-12 medium-12 columns">
    <h3><?= __('Upcoming Events') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= h('Name') ?></th>
                <th><?= h('Start Date') ?></th>
                <th><?= h('Last Modified') ?></th>
                <th><?= h('Venue') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($events as $event): ?>
            <tr>
                <td><?= $this->Html->link($event->name, ['controller' => 'Events', 'action' => 'full_view', 'prefix' => 'admin', $event->id]) ?></td>
                <td><?= $this->Time->i18nFormat($event->start, 'dd-MMM-yy HH:mm') ?></td>
                <td><?= $this->Time->i18nFormat($event->modified, 'dd-MMM-yy HH:mm') ?></td>
                <td><?= h($event->location) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Events', 'action' => 'full_view', $event->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Events', 'action' => 'edit', $event->id]) ?>
                    <?= $this->Html->link(__('Preview'), ['controller' => 'Events', 'action' => 'view', $event->id]) ?>
                    <?= $this->Html->link(__('Bookings'), ['controller' => 'Applications', 'action' => 'bookings', $event->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="admin_home shaded" id="admin_shade">

	<div class="admin_home large-12 medium-12 columns">
		<h3><?= __('New Users') ?></h3>
	    <table cellpadding="0" cellspacing="0">
	    <thead>
	        <tr>
	            <th><?= h('Username') ?></th>
	            <th><?= h('Scout Group') ?></th>
	            <th><?= h('Role') ?></th>
	            <th><?= h('First Name') ?></th>
	            <th><?= h('Last Name') ?></th>
	            <th><?= h('Auth Role') ?></th>
	            <th class="actions"><?= __('Actions') ?></th>
	        </tr>
	    </thead>
	    <tbody>
	    <?php foreach ($users as $user): ?>
	        <tr>
	            <td><?= h($this->Text->truncate($user->username,18)) ?></td>
	            <td><?= $user->has('scoutgroup') ? $this->Html->link($this->Text->truncate($user->scoutgroup->scoutgroup,18), ['controller' => 'Scoutgroups', 'action' => 'view', $user->scoutgroup->id]) : '' ?></td>
	            <td><?= $user->has('role') ? $this->Html->link($this->Text->truncate($user->role->role,18), ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
	            <td><?= h($user->firstname) ?></td>
	            <td><?= h($user->lastname) ?></td>
	            <td><?= h(strtoupper($user->authrole)) ?></td>
	            <td class="actions">
	                <?= $this->Html->link(__('View'), ['prefix' => 'admin','controller' => 'Users','action' => 'view', $user->id]) ?>
	                <?= $this->Html->link(__('Edit'), ['prefix' => 'admin','controller' => 'Users','action' => 'edit', $user->id]) ?>
	            </td>
	        </tr>

	    <?php endforeach; ?>
	    </tbody>
	    </table>
	</div>

	<div class="admin_home large-12 medium-12 columns">
		<h3><?= __('Recent Applications') ?></h3>
	    <table cellpadding="0" cellspacing="0">
	    <thead>
	        <tr>
	            <th><?= h('Application') ?></th>
	            <th><?= h('User') ?></th>
	            <th><?= h('Scout Group') ?></th>
	            <th><?= h('Section') ?></th>
	            <th><?= h('Permit Holder') ?></th>
	            <th><?= h('Last Modified') ?></th>
	            <th class="actions"><?= __('Actions') ?></th>
	        </tr>
	    </thead>
	    <tbody>
	    <?php foreach ($applications as $application): ?>
	        <tr>
	            <td><?= h($application->display_code) ?></td>
	            <td><?= $application->has('user') ? $this->Html->link($this->Text->truncate($application->user->full_name,18), ['controller' => 'Users', 'action' => 'view', $application->user->id]) : '' ?></td>
	            <td><?= $application->has('scoutgroup') ? $this->Html->link($this->Text->truncate($application->scoutgroup->scoutgroup,18), ['controller' => 'Scoutgroups', 'action' => 'view', $application->scoutgroup->id]) : '' ?></td>
	            <td><?= $this->Text->truncate($application->section,18) ?></td>
	            <td><?= $this->Text->truncate($application->permitholder,18) ?></td>
	            <td><?= $this->Time->i18nFormat($application->modified, 'dd-MMM-yy HH:mm') ?></td>
	            <td class="actions">
	                <?= $this->Html->link(__('View'), ['controller' => 'Applications', 'action' => 'view', $application->id]) ?>
	                <?= $this->Html->link(__('Edit'), ['controller' => 'Applications', 'action' => 'edit', $application->id]) ?>
	                <?= $this->Form->postLink(__('Query'), ['controller' => 'Applications','action' => 'query', $application->id], ['confirm' => __('Are you sure you want to query the user of application # {0}?', $application->id)]) ?>
	            </td>
	        </tr>

	    <?php endforeach; ?>
	    </tbody>
	    </table>
	</div>

	<div class="admin_home large-12 medium-12 columns content">
	    <h3><?= __('Recent Invoices') ?></h3>
	    <table cellpadding="0" cellspacing="0">
	        <thead>
	            <tr>
	                <th><?= h('id') ?></th>
	                <th><?= h('Full Name') ?></th>
	                <th><?= h('Date Created') ?></th>
	                <th><?= h('Value') ?></th>
	                <th><?= h('Received') ?></th>
	                <th><?= h('Balance') ?></th>
	                <th class="actions"><?= __('Actions') ?></th>
	            </tr>
	        </thead>
	        <tbody>
	            <?php foreach ($invoices as $invoice): ?>
	            <tr>
	                <td>Invoice #<?= $this->Number->format($invoice->id) ?></td>
	                <td><?= $invoice->has('user') ? $this->Html->link($this->Text->truncate($invoice->user->full_name,18), ['controller' => 'Users', 'action' => 'view', $invoice->user->id]) : '' ?></td>
	                <td><?= $this->Time->i18nformat($invoice->created,'dd-MMM-yy HH:mm') ?></td>
	                <td><?= $this->Number->currency($invoice->initialvalue,'GBP') ?></td>
	                <td><?= $this->Number->currency($invoice->value,'GBP') ?></td>
	                <td><?= $this->Number->currency($invoice->balance,'GBP') ?></td>
	                <td class="actions">
	                    <?= $this->Html->link(__('View'), ['prefix' => 'admin','controller' => 'Invoices','action' => 'view', $invoice->id]) ?>
	                    <?= $this->Html->link(__('Update'), ['prefix' => 'admin','controller' => 'Invoices','action' => 'regenerate', $invoice->id]) ?>
	                </td>
	            </tr>
	            <?php endforeach; ?>
	        </tbody>
	    </table>
	</div>

	<div class="payments large-12 medium-12 columns">
	    <h3><?= __('Recent Payments') ?></h3>
	    <table cellpadding="0" cellspacing="0">
	        <thead>
	            <tr>
	                <th><?= h('Payment ID') ?></th>
	                <th><?= h('Value') ?></th>
	                <th><?= h('Date Created') ?></th>
	                <th><?= h('Date Paid') ?></th>
	                <th class="actions"><?= __('Actions') ?></th>
	            </tr>
	        </thead>
	        <tbody>
	            <?php foreach ($payments as $payment): ?>
	            <tr>
	                <td><?= $this->Number->format($payment->id) ?></td>
	                <td><?= $this->Number->currency($payment->value,'GBP') ?></td>
	                <td><?= $this->Time->i18nformat($payment->created,'dd-MMM-yy HH:mm') ?></td>
	                <td><?= $this->Time->i18nformat($payment->paid,'dd-MMM-yy HH:mm') ?></td>
	                <td class="actions">
	                    <?= $this->Html->link(__('View'), ['prefix' => 'admin','controller' => 'Payments','action' => 'view', $payment->id]) ?>
	                    <?= $this->Html->link(__('Edit'), ['prefix' => 'admin','controller' => 'Payments','action' => 'edit', $payment->id]) ?>
	                </td>
	            </tr>
	            <?php endforeach; ?>
	        </tbody>
	    </table>
	</div>



</div>