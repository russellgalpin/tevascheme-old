<div class="files index">
    <h2><?php echo __('Files'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>		
            <!--<th><?php echo $this->Paginator->sort('id'); ?></th>-->
            <th><?php echo $this->Paginator->sort('description', 'File Description'); ?></th>            
            <th><?php echo $this->Paginator->sort('modified', 'Last Updated'); ?></th>            
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($files as $file): ?>
            <tr>		
                <!--<td><?php echo h($file['File']['id']); ?>&nbsp;</td>-->
                <td><?php echo $this->Html->link($file['File']['description'], '/files/' . $file['File']['filename']); ?>&nbsp;</td>                     
                <td><?php echo date('d/m/Y H:i', $this->Time->toUnix($file['File']['modified'])); ?>&nbsp;</td>                

                <td class="actions">			
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $file['File']['id'])); ?>
                    <?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $file['File']['id']), null, __('Are you sure you want to delete: %s?', $file['File']['description'])); ?>
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
        <li><?php echo $this->Html->link(__('Upload a New File'), array('action' => 'add')); ?></li>		
    </ul>
</div>
