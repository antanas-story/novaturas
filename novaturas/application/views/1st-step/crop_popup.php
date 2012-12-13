<div id="editPhotoPopup" class="popup with-overlay">
    <a href="#" class="close-button" onclick="closePopup();return false;" title="close-button-txt"></a>
    <h2><span><?php echo $s['1st-step-face-crop']['crop-face-description'] ?></span></h2>
        <section id="editPhotoContainer">
                <figure>
                        <img src="img/1x1.gif" width="700" height="700">
                </figure>
            <a href="#" class="simple-button" onclick="closePopup();showPopup('#fbPopup');return false;"><?php echo $s['1st-step-face-crop']['choose-another-photo'] ?></a>
        </section><!-- end editPhotoContainer -->
        <section id="editPhotoTools">
                <div class="slider-zoom">
                        <p><?php echo $s['1st-step-face-crop']['zoom-in-out-description'] ?></p>
                        <div class="slider">
                                <div class="minus"></div>
                                <div class="point"></div>
                                <div class="bar"></div>
                                <div class="plus"></div>
                        </div>
                </div>
                <div class="slider-rotate">
                        <p><?php echo $s['1st-step-face-crop']['rotate-description'] ?></p>
                        <div class="slider">
                                <div class="minus"></div>
                                <div class="point" style="left: 40%;"></div>
                                <div class="bar"></div>
                                <div class="plus"></div>
                        </div>
                </div>
            <p><?php echo $s['1st-step-face-crop']['drag-description'] ?></p>
            <a href="#" class="button" onclick="closePopup();return false;"><?php echo $s['1st-step-face-crop']['button-headline'] ?><br><span><?php echo $s['1st-step-face-crop']['button-text'] ?></span></a>
        </section><!-- end editPhotoTools -->
</div><!-- end editPhotoPopup -->