<div id="container" class="container greeting anim">
    <?php
    // Navigation header menu
    $noFaq = true;
    require APPPATH."/views/templates/nav.php";
    ?>
    <div id="greetingMain" class="main" role="main">
    </div><!--! end of #greetingMain -->
    
    <div id="greetingPopup" class="greeting with-overlay popup">
		<h2><span>"Novaturas"</span></h2>
		<p><?php echo $s['other']['greetin-text'] ?></p>
		<p class="author">Novaturas</p>
		<div class="buttons-container">
			<a href="#" onclick="restartAnimation(); return false" title="<?php echo $s['greeting']['repeat-animation'] ?>" class="simple-button b-repeat"><span></span>
				<?php echo $s['greeting']['repeat-animation'] ?>
			</a>
			<a href="<?php echo base_url().$lang ?>/create" title="<?php echo $s['greeting']['create-your-own'] ?>" class="simple-button b-create"><span></span>
				<?php echo $s['greeting']['create-your-own'] ?>
			</a>
		</div>
	</div><!-- end of #greetingPopup -->
	<footer style="margin-bottom: 30px;"></footer>
</div><!--! end of #greeting -->
<script src="<?php echo base_url() ?>js/greeting.js"type="text/javascript"></script>
