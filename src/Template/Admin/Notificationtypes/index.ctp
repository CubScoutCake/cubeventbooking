<div class="notificationtypes index large-10 medium-9 columns content">
    <h3><?= __('Notificationtypes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('notification_type') ?></th>
                <th><?= $this->Paginator->sort('notification_description') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($notificationtypes as $notificationtype): ?>
            <tr>
                <td><?= $this->Number->format($notificationtype->id) ?></td>
                <td><?= h($notificationtype->notification_type) ?></td>
                <td><?= h($notificationtype->notification_description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $notificationtype->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $notificationtype->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $notificationtype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notificationtype->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
