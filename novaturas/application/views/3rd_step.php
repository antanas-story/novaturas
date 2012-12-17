<div id="3rd-step" class="main step container fixedWidth" style="display:none;">
    	<div id="sharePopup" class="popup show-at-once wait-forever permanent">
		<h2><span><?php echo $s['3rd-step-share-it']['share-it-description'] ?></span></h2>
		<section id="shareBy">
			<div class="url">
				<p><?php echo $s['3rd-step-share-it']['link-description'] ?></p>
                                <input type="text"
                                       value="<?php echo base_url().$job["hash"] ?>"
                                       class="input"
                                       id="url"
                                       readonly="readonly"
                                       data-url="<?php echo base_url()."{$job["hash"]}.jpg" ?>">
				
			</div>
			<div id="emailPopup" class="mail">
			    <form action="#">
				<a href="#" class="back" onclick="showUrlForm();return false;"></a>
				    <input type="text" placeholder="<?php echo $s['3rd-step-share-it']['email-name-caption'] ?>"
					   class="input" name="sentBy" id="sentBy"
					   data-error="<?php echo $s['3rd-step-share-it']['email-error-no-name'] ?>">
				    <input type="text" placeholder="<?php echo $s['3rd-step-share-it']['email-send-to-caption'] ?>"
					   class="input email" name="sentTo" id="sentTo"
					   data-error="<?php echo $s['3rd-step-share-it']['email-error-bad-email'] ?>">
				    <button class="button b-send"
					    data-success="<?php echo $s['3rd-step-share-it']['email-success'] ?>"
					    data-error="<?php echo $s['3rd-step-share-it']['email-error'] ?>"
					    ><span></span>
					    <?php echo $s['3rd-step-share-it']['email-button-send'] ?>
				    </button>
			    </form>
			    <div class="msg" style="display:none"></div>
			</div>
		</section><!-- end #shareBy -->
		<div class="buttons-container">
			<a href="#" class="simple-button b-fb" onclick="shareToFB();return false;">
                            <span></span>
                            <?php echo $s['3rd-step-share-it']['button-share-by-facebook'] ?>
                        </a>
			<a href="#" class="simple-button b-mail" onclick="showEmailForm();return false">
                            <span></span>
                            <?php echo $s['3rd-step-share-it']['button-share-by-email'] ?>
                        </a>
			<a href="#" class="simple-button b-save" onclick="promptDownload();return false;">
                            <span></span>
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
      picture: '<?php echo base_url() ?>imgs/example-postcard.png',
      name: '<?php echo $s['facebook']['post-title'] ?>',
      //caption: '',
      description: '<?php echo $s['facebook']['post-description'] ?>'
    };

    function callback(response) {
	if(response!=null && response!=undefined && response!="")
	    $.post(basePath+"update", {fb: 1});
	console.log("fb post response", response);
    }

    FB.ui(obj, callback);
}
function promptDownload() {
    window.open( $('#url').data("url") );
}
function showEmailForm() {
    $("#shareBy .url").hide();
    $("#shareBy #emailPopup").show();
}
function showUrlForm() {
    $("#shareBy #emailPopup").hide();
    $("#shareBy .url").show();
}
</script>