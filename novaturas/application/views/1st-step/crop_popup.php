<div id="editPhotoPopup" class="popup with-overlay">
    <a href="#" class="close-button" onclick="closePopup();return false;" title="close-button-txt"></a>
    <h2><span><?php echo $s['1st-step-face-crop']['crop-face-description'] ?></span></h2>
        <section id="editPhotoContainer">
                <figure>
                    <div class="overlay"></div>
                    <img src="<?php echo base_url() ?>imgs/1x1.gif">
                </figure>
            <a href="#" class="simple-button b-friend" id="chooseAnotherPic"><span></span>
                <?php echo $s['1st-step-face-crop']['choose-another-photo'] ?></a>
        </section><!-- end editPhotoContainer -->
        <section id="editPhotoTools">
                <div class="slider-zoom">
                        <p><?php echo $s['1st-step-face-crop']['zoom-in-out-description'] ?></p>
                        <div class="sliderWrap">
                            <div class="minus"></div>
                            <div class="slider zoom">
                                    <div class="point"></div>
                                    <div class="bar"></div>
                            </div>
                            <div class="plus"></div>
                        </div>
                </div>
                <div class="slider-rotate">
                        <p><?php echo $s['1st-step-face-crop']['rotate-description'] ?></p>
                        <div class="sliderWrap">
                            <div class="minus"></div>
                            <div class="slider rotate">
                                    <div class="point"></div>
                                    <div class="bar"></div>
                            </div>
                            <div class="plus"></div>
                        </div>
                </div>
            <p><?php echo $s['1st-step-face-crop']['drag-description'] ?></p>
            <a href="#" class="button" id="cropButton"><?php echo $s['1st-step-face-crop']['button-headline'] ?><br><span><?php echo $s['1st-step-face-crop']['button-text'] ?></span></a>
        </section><!-- end editPhotoTools -->
</div><!-- end editPhotoPopup -->