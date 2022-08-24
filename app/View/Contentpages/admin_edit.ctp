<div class="contentpages form">
<?php echo $this->Form->create('Contentpage'); ?>
	<fieldset>
		<legend><?php echo __('Edit Page'); ?></legend>
	<?php
        echo $this->Form->input('id');
		echo $this->Form->input('title');		
		echo $this->Form->input('section_id', array('empty' => true));
		echo $this->Form->input('body', array('class' => 'ckeditor'));  
        echo $this->Form->input('layout');          
        echo $this->Form->input('template');                
		echo $this->Form->input('meta_description');
        echo $this->Form->input('meta_keywords');
		echo $this->Form->input('sort_order');
		echo $this->Form->input('footer', array('type' => 'textarea','class' => 'ckeditor')); 
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Contentpage.id')), null, __('Are you sure you want to delete: %s?', $this->Form->value('Contentpage.title'))); ?></li>
		<li><?php echo $this->Html->link(__('List Pages'), array('action' => 'index')); ?></li>		
	</ul>
</div>
