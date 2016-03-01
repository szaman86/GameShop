<div class="genres view large-12 medium-12 columns content">
    <h3><?= h($genre->name) ?></h3>

    <div class="related">
        <h4><?= __('Related Products') ?></h4>
        <?php if (!empty($genre->products)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Date Publish') ?></th>
                <th><?= __('Price') ?></th>
                <th><?= __('Quantity') ?></th>
                <th><?= __('Genre Id') ?></th>
                <th><?= __('Publisher Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($genre->products as $products): ?>
            <tr>
                <td><?= h($products->id) ?></td>
                <td><?= h($products->name) ?></td>
                <td><?= h($products->date_publish) ?></td>
                <td><?= h($products->price) ?></td>
                <td><?= h($products->quantity) ?></td>
                <td><?= h($products->genre_id) ?></td>
                <td><?= h($products->publisher_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Products', 'action' => 'view', $products->id])
                    ?>
                    <?= $this->Html->link(__('Buy'), ['controller' => 'Orders', 'action' => 'buyNow', $products->id])
                    ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
