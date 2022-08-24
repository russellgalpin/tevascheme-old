<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
                echo $this->Form->input('id');                
		echo $this->Form->input('username', array('readonly' => 'readonly'));
                echo $this->Form->input('password', array('type' => 'password', 'value' => '', 'autocomplete' => 'off'));
		echo $this->Form->input('status', array('type' => 'checkbox', 'label' => 'Active'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>		
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>		
	</ul>
</div>
