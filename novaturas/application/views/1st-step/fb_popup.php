<?php /*<div id="fbPopup" class="popup with-overlay hidden">
    
</div><!-- end faqPopup --> */ ?>


<div id="fbPopup" class="popup with-overlay">
    <a href="#" class="close-button" onclick="closePopup();return false;" title="close-button-txt"></a>
    <h2><span><?php echo $s['faq']['1st-step-headline'] ?></span></h2>
    <div id="fbFriendSelector">
            <section id="friendsName">
                <p><?php echo $s['1st-step-upload-from-facebook']['choose-friend-faq'] ?></p>
                    <form action="#">
                            <input type="text"
                                   id="friend_field"
                                   placeholder="<?php echo $s['1st-step-upload-from-facebook']['choose-friend-field-description'] ?>"
                                   title="<?php echo $s['1st-step-upload-from-facebook']['choose-friend-field-description'] ?>" class="input">
                    </form>
            </section><!-- end friendsName -->
            <div class="error hidden">
                    <?php
                    $str = $s["1st-step-upload-from-facebook"]["choose-picture-facebook-error"];
                    $str = str_replace("]", '</a>', $str);
                    $str = str_replace("[", '<a href="#" onclick="$(\'#from-pc\').click(); return false;">', $str);
                    echo $str;
                    ?>
            </div>
            <section id="imgThumbs">
                    <figure class="example hidden">
                            <div>
                            <img src="<?php echo base_url() ?>imgs/1x1.gif" width="50" height="50" title="">
                            <a href="#"></a>
                            </div>
                    </figure>
            </section><!-- end imgThumbs -->
            <div class="button-container">
                <a href="#" class="button" id="fbNextStep" data-error="<?php echo $s['1st-step-upload-from-facebook']['friend-not-chosen-error'] ?>">
                    <?php echo $s['1st-step-upload-from-facebook']['button-headline'] ?><br>
                    <span><?php echo $s['1st-step-upload-from-facebook']['button-text'] ?></span>
                </a>
            </div>
        </div>
        <div id="fbPictureSelector" style="display:none;">
            <section id="selectedFriend">
                    <figure class="selected-user">
                            <img src="<?php echo base_url() ?>imgs/1x1.gif" width="50" height="50" title="">
							<?php echo $s['1st-step-upload-from-facebook'] ?><!-- current facebook name & <br> between first & last name-->
                    </figure>
                <a href="#" class="simple-button b-friend" id="fbPrevStep"><span></span><?php echo $s['choose-another-friend'] ?></a>
            </section><!-- end selectedFriend -->
            <section id="imgFbThumbs">
                <h2><span><?php echo $s['1st-step-upload-from-facebook']['choose-picture-headline'] ?></span></h2>
                <div id="slider">
                        <a href="#" class="nav-prev"></a>
                        <a href="#" class="nav-next"></a>
                </div>
                <figure class="example hidden" title=""></figure>
            </section><!-- end imgThumbs -->
            <div class="button-container">
                <a href="#" class="button" id="fbPicChosen" data-error="<?php echo $s['1st-step-upload-from-facebook']['picture-not-chosen-error'] ?>">
                    <?php echo $s['1st-step-upload-from-facebook']['button-headline'] ?><br>
                    <span><?php echo $s['1st-step-upload-from-facebook']['button-text'] ?></span>
                </a>
            </div>
        </div>
</div><!-- end #fbPopup -->