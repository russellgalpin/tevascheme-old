<div class="files form">
<?php echo $this->Form->create('File', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Add File'); ?></legend>
	<?php
                echo $this->Form->input('filename', array('type' => 'file'));		
		echo $this->Form->input('description');				
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Files'), array('action' => 'index')); ?></li>				
	</ul>
</div>
