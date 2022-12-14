<div class="sections index">
	<h2><?php echo __('Sections'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>			
			<th><?php echo $this->Paginator->sort('title'); ?></th>
                        <th><?php echo $this->Paginator->sort('sort_order'); ?></th>
                        <th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($sections as $section): ?>
	<tr>	
		<td><?php echo h($section['Section']['title']); ?></td>	
                <td><?php echo h($section['Section']['sort_order']); ?></td>
                <td class="actions">			
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $section['Section']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $section['Section']['id']), null, __('Are you sure you want to delete: %s?', $section['Section']['title'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Section'), array('action' => 'add')); ?></li>
	</ul>
</div>
