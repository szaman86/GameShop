<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Newsletter'), ['action' => 'edit', $newsletter->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Newsletter'), ['action' => 'delete', $newsletter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $newsletter->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Newsletters'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Newsletter'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Genres'), ['controller' => 'Genres', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Genre'), ['controller' => 'Genres', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="newsletters view large-9 medium-8 columns content">
    <h3><?= h($newsletter->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($newsletter->email) ?></td>
        </tr>
        <tr>
            <th><?= __('First Name') ?></th>
            <td><?= h($newsletter->first_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Name') ?></th>
            <td><?= h($newsletter->last_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($newsletter->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Genres') ?></h4>
        <?php if (!empty($newsletter->genres)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($newsletter->genres as $genres): ?>
            <tr>
                <td><?= h($genres->id) ?></td>
                <td><?= h($genres->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Genres', 'action' => 'view', $genres->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Genres', 'action' => 'edit', $genres->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Genres', 'action' => 'delete', $genres->id], ['confirm' => __('Are you sure you want to delete # {0}?', $genres->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
