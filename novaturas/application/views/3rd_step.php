<div id="3rd-step" class="main step container" style="display:none;">
    	<div id="sharePopup" class="popup show-at-once">
		<h2><span><?php echo $s['3rd-step-share-it']['share-it-description'] ?></span></h2>
		<section id="shareBy">
			<div class="url">
				<p><?php echo $s['3rd-step-share-it']['link-description'] ?></p>
				<input type="text" value="http://novaturas.story.lt/" class="input" readonly="readonly">
			</div>
			<div class="mail">
				<a href="#" class="back"></a>
				<form action="#">
					<input type="text" placeholder="<?php echo $s['3rd-step-share-it']['email-name-caption'] ?>" class="input">
					<input type="text" placeholder="<?php echo $s['3rd-step-share-it']['email-send-to-caption'] ?>" class="input">
					<button class="button"
                                                onclick="alert('<?php echo $s['3rd-step-share-it']['email-success'] ?>');return false;"
                                                ><?php echo $s['3rd-step-share-it']['email-button-send'] ?>
                                        </button>
				</form>
			</div>
		</section><!-- end #shareBy -->
		<div class="buttons-container">
			<a href="#" class="simple-button b-fb" onclick="shareToFB();return false;">
                            <?php echo $s['3rd-step-share-it']['button-share-by-facebook'] ?>
                        </a>
			<a href="#" class="simple-button b-mail" onclick="showPopup('#emailPopup');return false">
                            <?php echo $s['3rd-step-share-it']['button-share-by-email'] ?>
                        </a>
			<a href="#" class="simple-button b-save" onclick="promptDownload();return false;">
                            <?php echo $s['3rd-step-share-it']['button-save-to-pc'] ?>
                        </a>
		</div>
	</div><!-- end #sharePopup -->
        

</div><!--! end of #3rd-step -->
    
<?php
// TODO share to fb
// TODO email
// TODO download to pc
/*
3rd-step-share-it	share-it-headline
3rd-step-share-it	share-it-description
3rd-step-share-it	link-description
3rd-step-share-it	button-share-by-facebook
3rd-step-share-it	button-share-by-email
3rd-step-share-it	button-save-to-pc
3rd-step-share-it	email-subject
3rd-step-share-it	email-text
3rd-step-share-it	email-name-caption
3rd-step-share-it	email-send-to-caption
3rd-step-share-it	email-button-send
3rd-step-share-it	email-success
  
  
  
 * Į tai kas žemiau dėmėsio nekreipti :)

 */
?>
<script>
function shareToFB() {
    var obj = {
      method: 'feed',
      //redirect_uri: 'YOUR URL HERE',
      link: $('#url').val(),
      picture: '<?php echo base_url() ?>imgs/example-postcard.ng',
      name: '<?php echo $s['facebook']['post-title'] ?>',
      //caption: '',
      description: '<?php echo $s['facebook']['post-description'] ?>'
    };

    function callback(response) {
      document.getElementById('msg').innerHTML = "Post ID: " + response['post_id'];
    }

    FB.ui(obj, callback);
}
function promptDownload() {
    window.open( $('#url').val() );
}
</script>