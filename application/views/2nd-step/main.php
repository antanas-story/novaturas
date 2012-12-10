<div id="container" class="2nd-step">
    <?php
    // Including navigation header menu
    require APPPATH."/views/templates/nav.php";
    ?>    
    <div id="main">
        <h1><?php echo $s['2nd-step-greeting-text']['enter-a-greeting-headline'] ?></h1>
        <p><?php echo $s['2nd-step-greeting-text']['enter-a-greeting-description'] ?></p>
        <input type='text'
               id="headline"
               name="headline"
               placeholder="<?php echo $s['2nd-step-greeting-text']['headline-placeholder'] ?>"
               />
        <textarea
               id="text"
               name="text"
               placeholder="<?php echo $s['2nd-step-greeting-text']['greeting-text-placeholder'] ?>"
               ></textarea>

        <a href="<?php echo base_url() ?>3rd-step" class="button">
                <?php echo $s['2nd-step-greeting-text']['button-headline'] ?>
                <span><?php echo $s['2nd-step-greeting-text']['button-text'] ?></span>
        </a>
    </div><!--! end of #main -->
    
</div><!--! end of #container -->