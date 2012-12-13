
<div id="container" class="container greeting">
    
    <div id="greetingMain" class="main" role="main">
    </div><!--! end of #greetingMain -->
    
    <div id="greetingPopup" class="greeting with-overlay popup">
		<h2><span>"Novaturas"</span></h2>
                <p><?php echo $s['other']['greetin-text'] ?></p>
		<p class="author">
                    2012-12-24, Novaturas<br />
        <a href="#" onclick="restartAnimation(); return false" class="simple-button">
            <?php echo $s['greeting']['repeat-animation'] ?>
        </a>
        <a href="<?php echo base_url().$lang ?>/create" class="simple-button">
            <?php echo $s['greeting']['create-your-own'] ?>
        </a>
                    </p>
    </div><!-- end of #greetingPopup -->
</div><!--! end of #greeting -->

<!--<div id="greetingPopup" class="popup with-overlay">
        
</div><!--! end of #greetingPopup -->

<script src="<?php echo base_url() ?>js/greeting.js"type="text/javascript"></script>
