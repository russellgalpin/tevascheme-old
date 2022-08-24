<?php
/**
 * 500 error page.
 * Note: This uses Pharmacy Support header/footer.
 */
?>
<div class="main-content span12 center relative">
    <?php
// Header markup
    echo $this->element('pharmacy/header');
    ?>
    <h2><?php echo $name; ?></h2>
    <p class="error">
        <strong><?php echo __d('cake', 'Error'); ?>: </strong>
        <?php echo __d('cake', 'An Internal Error Has Occurred.'); ?>
    </p>
    <?php
    if (Configure::read('debug') > 0):
        echo $this->element('exception_stack_trace');
    endif;
    ?>
    <?php
    // Footer markup
    echo $this->element('pharmacy/footer');
    ?>
</div>	
