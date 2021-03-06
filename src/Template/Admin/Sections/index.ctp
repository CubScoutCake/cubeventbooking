<div class="row">
    <div class="col-lg-12">
        <h3><i class="fal fa-fire fa-fw"></i> Sections</h3>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id', '#') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('section') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('section_type_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('scoutgroup_id') ?></th>
                    <th><?= h('District') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($sections as $section): ?>
                    <tr>
                        <td><?= $this->Number->format($section->id) ?></td>
                        <td><?= h($section->section) ?></td>
                        <td class="actions">
                            <?= $this->Html->link('<i class="fal fa-eye"></i>', ['action' => 'view', $section->id], ['title' => __('View'), 'class' => 'btn btn-default btn-sm', 'escape' => false]) ?>
                            <?= $this->Html->link('<i class="fal fa-pencil"></i>', ['action' => 'edit', $section->id], ['title' => __('Edit'), 'class' => 'btn btn-default btn-sm', 'escape' => false]) ?>
                            <?= $this->Form->postLink('<i class="fal fa-trash-alt"></i>', ['action' => 'delete', $section->id], ['confirm' => __('Are you sure you want to delete # {0}?', $section->id), 'title' => __('Delete'), 'class' => 'btn btn-default btn-sm', 'escape' => false]) ?>
                        </td>
                        <td><?= $section->has('section_type') ? $this->Html->link($section->section_type->section_type, ['controller' => 'SectionTypes', 'action' => 'view', $section->section_type->id]) : '' ?></td>
                        <td><?= $section->has('scoutgroup') ? $this->Html->link($section->scoutgroup->scoutgroup, ['controller' => 'Scoutgroups', 'action' => 'view', $section->scoutgroup->id]) : '' ?></td>
                        <td><?= $section->scoutgroup->has('district') ? $this->Html->link($section->scoutgroup->district->district, ['controller' => 'Districts', 'action' => 'view', $section->scoutgroup->district->id]) : '' ?></td>
                        <td><?= h($section->created) ?></td>
                        <td><?= h($section->modified) ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('next') . ' >') ?>
            </ul>
            <p><?= $this->Paginator->counter() ?></p>
        </div>
    </div>
</div>
