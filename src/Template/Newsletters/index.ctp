<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Newsletter'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Genres'), ['controller' => 'Genres', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Genre'), ['controller' => 'Genres', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="newsletters index large-9 medium-8 columns content">
    <h3><?= __('Newsletters') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th><?= $this->Paginator->sort('first_name') ?></th>
                <th><?= $this->Paginator->sort('last_name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($newsletters as $newsletter): ?>
            <tr>
                <td><?= $this->Number->format($newsletter->id) ?></td>
                <td><?= h($newsletter->email) ?></td>
                <td><?= h($newsletter->first_name) ?></td>
                <td><?= h($newsletter->last_name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $newsletter->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $newsletter->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $newsletter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $newsletter->id)]) ?>
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
