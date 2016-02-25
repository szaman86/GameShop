<div class="orders form large-12 medium-12 columns content">
    <h1>
        Your are going to buy
        <b><?php echo $product->name; ?></b>
    </h1>
    <fieldset>
        <legend><?= __('Enter your email:') ?></legend>
        <?= $this->Form->create($order) ?>
        <?php
            echo $this->Form->input('email');
        echo $this->Form->label('newsletter', 'Would you like to receive newsletter?');
            echo $this->Form->checkbox('newsletter');
        ?>
    </fieldset>

    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
