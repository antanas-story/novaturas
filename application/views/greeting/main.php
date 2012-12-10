
<div id="container" class="greeting">
    
    <div id="main" role="main">
    </div><!--! end of #main -->
    
</div><!--! end of #container -->

<div id="greetingPopup" class="popup with-overlay">
        <a href="#" onclick="restartAnimation(); return false" class="button">
            <?php echo $s['greeting']['repeat-animation'] ?>
        </a>
        <a href="<?php echo base_url() ?>1st-step" class="button">
            <?php echo $s['greeting']['create-your-own'] ?>
        </a>
</div><!--! end of #greetingPopup -->

<script src="<?php echo base_url() ?>js/greeting.js"type="text/javascript"></script>
