<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Publisher'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="publishers index large-9 medium-8 columns content">
    <h3><?= __('Publishers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($publishers as $publisher): ?>
            <tr>
                <td><?= $this->Number->format($publisher->id) ?></td>
                <td><?= h($publisher->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $publisher->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $publisher->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $publisher->id], ['confirm' => __('Are you sure you want to delete # {0}?', $publisher->id)]) ?>
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
