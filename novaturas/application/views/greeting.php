<div id="container" class="container greeting anim">
    <?php
    // Navigation header menu
    $noFaq = true;
    require APPPATH."/views/templates/nav.php";
    ?>
    <div id="greetingMain" class="main" role="main">
	<canvas id="canvas" width="<?php echo $canvas["width"] ?>" height="<?php echo $canvas["height"] ?>"></canvas>
	<?php if(is_array($greeting["files"])) foreach($greeting["files"] as $file): $c = $characters[$file["which"]]; ?>
	    <img src="<?php echo $file["cropped"]; ?>" alt=""
		 width="<?php echo $canvas["croppedSize"]; ?>" height="<?php echo $canvas["croppedSize"]; ?>"
		 data-x="<?php echo $c["x"] ?>" data-y="<?php echo $c["y"] ?>"
		 data-scale="<?php echo $c["scale"] ?>"
		 data-which="<?php echo $file["which"] ?>"
		 />
	
	<?php endforeach; ?>
    </div><!--! end of #greetingMain -->
    
    <div id="greetingPopup" class="greeting with-overlay popup">
	
		<h2><span><?php echo !empty($greeting['headline']) ? $greeting['headline'] : $s['other']["page-title"] ?></span></h2>
		<p><?php echo !empty($greeting['text']) ? $greeting['text'] : $s['other']['greetin-text'] ?></p>
		<p class="author">
		    <?php echo !empty($greeting['signedBy']) ? $greeting['signedBy'] : $s['other']["page-title"] ?>
		</p>
		
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
