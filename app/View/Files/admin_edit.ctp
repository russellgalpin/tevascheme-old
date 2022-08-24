<div class="files form">    
<?php echo $this->Form->create('File', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Edit File'); ?></legend>
	<?php
                echo $this->Form->input('id');
		echo $this->Form->input('filename', array('type' => 'file'));	                
	?>
                <div class="input text"><label>Existing File <p class="help">Uploading a new file will replace this one</p></label>
                <?php 
				$filename = explode('_', $this->request->data['File']['filename']);
				echo $this->Html->link($filename[1], '/files/' . $this->request->data['File']['filename']); 
				?>
                </div>
        <?php
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
