<?php
/**
 * 400 error page.
 * Note: This uses Pharmacy Support header/footer.
 */
?>
<div class="main-content span12 center relative">
    <?php
// Header markup
    echo $this->element('pharmacy/header');
    ?>
    <h1><?php echo $name; ?></h1>
    <p class="error">
        <strong><?php echo __d('cake', 'Error'); ?>: </strong>
        <?php
        printf(
                __d('cake', 'The requested address %s was not found on this server.'), "<strong>'{$url}'</strong>"
        );
        ?>
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
