<div id="menu">
    <ul>
        <li><?php echo $this->Html->link('Upload PDF Files', '/admin/files', array('class' => 'top')); ?>   
        <li><?php echo $this->Html->link('Pages', '/admin/contentpages', array('class' => 'top')); ?>   
        <li><?php echo $this->Html->link('Sections', '/admin/sections', array('class' => 'top')); ?>   
		<li><?php echo $this->Html->link('Price List Signups', '/admin/forms/export_price_list_signup', array('class' => 'top')); ?>
		<li><?php echo $this->Html->link('CMS User Accounts', '/admin/users', array('class' => 'top')); ?>   
    </ul>
</div>