<div id="1st-step" class="step container">
    <?php
    // main editing window
    ?>
    <div class="main first-step" id="canvasContainer">
        <?php
        // All avatar hovers that overlay on the faces
        require APPPATH."/views/1st-step/avatar_hovers.php";
        ?>
        <canvas id="canvas" width=""></canvas>
    </div><!--! end of .main.first-step -->
    
    <?php
    // All avatars in the footer with button to proceed to next step
    require APPPATH."/views/1st-step/avatars_footer.php";
    ?>
    
    <div id="manual-fine-uploader" 
         data-error="<?php echo $s['other']['error-pic-upload-failed'] ?>"
         data-url="<?php echo base_url() ?>upload"
         class="hidden"></div>
    <div id="ajax" class="popup with-overlay wait-forever"></div>         
</div><!--! end of #1st-step -->

    <?php
    // FAQ Popup explaining the procedure. Shows on load
    require APPPATH."/views/1st-step/faq_popup.php";
    // Shows when you select friend's photos from facebook
    require APPPATH."/views/1st-step/fb_popup.php";
    // Shows when you have uploaded a pic from pc or selected one from facebook
    require APPPATH."/views/1st-step/crop_popup.php";
    ?>