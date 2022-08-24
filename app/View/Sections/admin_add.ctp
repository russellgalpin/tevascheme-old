<div class="sections form">
<?php echo $this->Form->create('Section', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Add Section'); ?></legend>
	<?php
		echo $this->Form->input('title');
                echo $this->Form->input('code');
                echo $this->Form->input('sort_order');                
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Sections'), array('action' => 'index')); ?></li>
	</ul>
</div>
