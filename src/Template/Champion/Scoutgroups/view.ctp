<nav class="large-3 medium-4 columns" id="actions-sidebar">
    
    <?= $this->start('Sidebar');
    echo $this->element('Sidebar/admin_view');
    echo $this->element('Sidebar/admin');
    $this->end(); ?>
    
    <?= $this->fetch('Sidebar') ?>
    
</nav>
<div class="scoutgroups view large-9 medium-8 columns content">
    <h3><?= h($scoutgroup->scoutgroup) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Scoutgroup') ?></th>
            <td><?= h($scoutgroup->scoutgroup) ?></td>
        </tr>
        <tr>
            <th><?= __('District') ?></th>
            <td><?= $scoutgroup->has('district') ? $this->Html->link($scoutgroup->district->district, ['controller' => 'Districts', 'action' => 'view', $scoutgroup->district->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($scoutgroup->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Number Stripped') ?></th>
            <td><?= $this->Number->format($scoutgroup->number_stripped) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Applications') ?></h4>
        <?php if (!empty($scoutgroup->applications)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Scoutgroup Id') ?></th>
                <th><?= __('Section') ?></th>
                <th><?= __('Permitholder') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Modification') ?></th>
                <th><?= __('Eventname') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($scoutgroup->applications as $applications): ?>
            <tr>
                <td><?= h($applications->id) ?></td>
                <td><?= h($applications->user_id) ?></td>
                <td><?= h($applications->scoutgroup_id) ?></td>
                <td><?= h($applications->section) ?></td>
                <td><?= h($applications->permitholder) ?></td>
                <td><?= h($applications->created) ?></td>
                <td><?= h($applications->modified) ?></td>
                <td><?= h($applications->modification) ?></td>
                <td><?= h($applications->eventname) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Applications', 'action' => 'view', $applications->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Applications', 'action' => 'edit', $applications->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Applications', 'action' => 'delete', $applications->id], ['confirm' => __('Are you sure you want to delete # {0}?', $applications->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Attendees') ?></h4>
        <?php if (!empty($scoutgroup->attendees)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Scoutgroup Id') ?></th>
                <th><?= __('Role Id') ?></th>
                <th><?= __('Firstname') ?></th>
                <th><?= __('Lastname') ?></th>
                <th><?= __('Dateofbirth') ?></th>
                <th><?= __('Phone') ?></th>
                <th><?= __('Phone2') ?></th>
                <th><?= __('Address 1') ?></th>
                <th><?= __('Address 2') ?></th>
                <th><?= __('City') ?></th>
                <th><?= __('County') ?></th>
                <th><?= __('Postcode') ?></th>
                <th><?= __('Nightsawaypermit') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($scoutgroup->attendees as $attendees): ?>
            <tr>
                <td><?= h($attendees->id) ?></td>
                <td><?= h($attendees->user_id) ?></td>
                <td><?= h($attendees->scoutgroup_id) ?></td>
                <td><?= h($attendees->role_id) ?></td>
                <td><?= h($attendees->firstname) ?></td>
                <td><?= h($attendees->lastname) ?></td>
                <td><?= h($attendees->dateofbirth) ?></td>
                <td><?= h($attendees->phone) ?></td>
                <td><?= h($attendees->phone2) ?></td>
                <td><?= h($attendees->address_1) ?></td>
                <td><?= h($attendees->address_2) ?></td>
                <td><?= h($attendees->city) ?></td>
                <td><?= h($attendees->county) ?></td>
                <td><?= h($attendees->postcode) ?></td>
                <td><?= h($attendees->nightsawaypermit) ?></td>
                <td><?= h($attendees->created) ?></td>
                <td><?= h($attendees->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Attendees', 'action' => 'view', $attendees->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Attendees', 'action' => 'edit', $attendees->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Attendees', 'action' => 'delete', $attendees->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attendees->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($scoutgroup->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Role Id') ?></th>
                <th><?= __('Scoutgroup Id') ?></th>
                <th><?= __('Authrole') ?></th>
                <th><?= __('Firstname') ?></th>
                <th><?= __('Lastname') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Password') ?></th>
                <th><?= __('Phone') ?></th>
                <th><?= __('Address 1') ?></th>
                <th><?= __('Address 2') ?></th>
                <th><?= __('City') ?></th>
                <th><?= __('County') ?></th>
                <th><?= __('Postcode') ?></th>
                <th><?= __('Section') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Username') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($scoutgroup->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->role_id) ?></td>
                <td><?= h($users->scoutgroup_id) ?></td>
                <td><?= h($users->authrole) ?></td>
                <td><?= h($users->firstname) ?></td>
                <td><?= h($users->lastname) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->phone) ?></td>
                <td><?= h($users->address_1) ?></td>
                <td><?= h($users->address_2) ?></td>
                <td><?= h($users->city) ?></td>
                <td><?= h($users->county) ?></td>
                <td><?= h($users->postcode) ?></td>
                <td><?= h($users->section) ?></td>
                <td><?= h($users->created) ?></td>
                <td><?= h($users->modified) ?></td>
                <td><?= h($users->username) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>