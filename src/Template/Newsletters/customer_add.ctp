<div class="newsletters form large-12 medium-12 columns content">
    <?= $this->Form->create($newsletter) ?>
    <fieldset>
        <legend><?= __('Add Newsletter') ?></legend>
        <?php
            echo $this->Form->input('email');
            echo $this->Form->input('first_name');
            echo $this->Form->input('last_name');
            echo $this->Form->input('genres._ids', ['options' => $genres]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
