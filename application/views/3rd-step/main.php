<div id="container" class="3rd-step">
    <?php
    // Including navigation header menu
    require APPPATH."/views/templates/nav.php";
    ?>    
    <div id="main">
        
<h1><?php echo $s['3rd-step-share-it']['share-it-headline'] ?></h1>
<p><?php echo $s['3rd-step-share-it']['share-it-description'] ?></p>
<p>
    <?php echo $s['3rd-step-share-it']['link-description'] ?>
    <input type='text' id='url' value='http://novaturas.lt/sveikinimas/OaJ23f' readonly />
</p>

<a href="#" onclick="shareToFB();return false;" class='button'>
    <?php echo $s['3rd-step-share-it']['button-share-by-facebook'] ?>
</a>
<a href="#" onclick="showPopup('#emailPopup');return false" class='button'>
    <?php echo $s['3rd-step-share-it']['button-share-by-email'] ?>
</a>

<a href="#" onclick="promptDownload();return false;" class="button">
    <?php echo $s['3rd-step-share-it']['button-save-to-pc'] ?>
</a>

<div id="emailPopup" class="popup with-overlay">
    <input type="text"
           placeholder="<?php echo $s['3rd-step-share-it']['email-name-caption'] ?>"
           name="my_name" />
    <input type="text"
           placeholder="<?php echo $s['3rd-step-share-it']['email-send-to-caption'] ?>"
           name="send_to"
            />
    
        <a href="#" class="button"
           onclick="alert('<?php echo $s['3rd-step-share-it']['email-success'] ?>');return false;">
               <?php echo $s['3rd-step-share-it']['email-button-send'] ?>
        </a>
</div>



    </div><!--! end of #main -->
    
</div><!--! end of #container -->
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