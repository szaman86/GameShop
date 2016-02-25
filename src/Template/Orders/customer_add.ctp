<div class="orders form large-12 medium-12 columns content">
    <h1>
        Customer Add <?php echo $product->name; ?>
    </h1>
    <fieldset>
        <legend><?= __('Enter your email:') ?></legend>
        <?= $this->Form->create($order) ?>
        <?php
            echo $this->Form->input('email');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
