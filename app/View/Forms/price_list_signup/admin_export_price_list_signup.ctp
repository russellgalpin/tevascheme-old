<div class="admin-export-price-list-signup index">
	<h2><?php echo __('Export Price List Signups'); ?></h2>
		
	<?php echo $this->Form->create(); ?>
	<?php echo $this->Form->input('date_from', array('label' => 'From', 'id' => 'datepicker_from')); ?>
	<?php echo $this->Form->input('date_to', array('label' => 'To', 'id' => 'datepicker_to')); ?>
	<?php echo $this->Form->end('Create CSV'); ?>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<?php echo $this->element('admin/no_actions'); ?>
</div>

<script>
$(document).ready(function(){

	$("#datepicker_from").datepicker({ dateFormat: "yy-mm-dd" })
	$("#datepicker_to").datepicker({ dateFormat: "yy-mm-dd" })
	

	/* "From" Calendar control */
	$("#datepicker_from").click(function(){		
		$("#datepicker_from").datepicker(
		{			   
			   onSelect: function(dateText, inst){
					 $('#select_date').val(dateText);
					 $("#datepicker_from").datepicker("destroy");
			  }
		 }
		 );
	});
	
	/* "To" Calendar control */
	$("#datepicker_to").click(function(){			
		$("#datepicker_to").datepicker(
		{			 
			   onSelect: function(dateText, inst){
					 $('#select_date').val(dateText);
					 $("#datepicker_to").datepicker("destroy");
			  }
		 }
		 );
	});
	
});
</script>