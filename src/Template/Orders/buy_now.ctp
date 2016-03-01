<div class="orders form large-12 medium-12 columns content">
    <h1>
        Your are going to buy
        <b><?php echo $product->name; ?></b>
    </h1>
    <fieldset>
        <legend><?= __('Enter your email:') ?></legend>
        <?= $this->Form->create($order) ?>
        <?php
                echo $this->Form->input('customer_email');
        ?>
    </fieldset>

    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
