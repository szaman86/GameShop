<div class="products view large-12 medium-12 columns content">
    <h3><?= h($product->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($product->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Genre') ?></th>
            <td><?= $product->has('genre') ? $this->Html->link($product->genre->name, ['controller' => 'Genres', 'action' => 'customerView', $product->genre->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Publisher') ?></th>
            <td><?= $product->has('publisher') ? $this->Html->link($product->publisher->name, ['controller' => 'Publishers', 'action' => 'customerView', $product->publisher->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($product->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Price') ?></th>
            <td><?= $this->Number->format($product->price) ?></td>
        </tr>
        <tr>
            <th><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($product->quantity) ?></td>
        </tr>
        <tr>
            <th><?= __('Date Publish') ?></th>
            <td><?= h($product->date_publish) ?></td>
        </tr>
    </table>
</div>
