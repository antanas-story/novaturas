<div id="faqPopup" class="popup with-overlay <?php if($step==1) echo 'show-at-once'; ?>">
    <a href="#" class="close-button" onclick="closePopup();return false;" title="close-button-txt"></a>
        <section id="step1">
                <div class="step"><span>1</span></div>
                <h2><?php echo $s['faq']['1st-step-headline'] ?></h2>
                <figure><img src="<?php echo base_url() ?>imgs/step1-icon.png" width="158" height="158"></figure>
                <p>
                    <?php echo $s['faq']['1st-step-description'] ?>
                    </p>
        </section><!-- end step1 -->
        <section id="step2">
                <div class="step"><span>2</span></div>
                <h2><?php echo $s['faq']['2nd-step-headline'] ?></h2>
                <figure><img src="<?php echo base_url() ?>imgs/step2-icon.png" width="158" height="158"></figure>
                <p><?php echo $s['faq']['2nd-step-description'] ?></p>
        </section><!-- end step2 -->
        <section id="step3">
                <div class="step"><span>3</span></div>
                <h2><?php echo $s['faq']['3rd-step-headline'] ?></h2>
                <figure><img src="<?php echo base_url() ?>imgs/step3-icon.png" width="158" height="158"></figure>
                <p><?php echo $s['faq']['3rd-step-description'] ?></p>
        </section><!-- end step3 -->
        <div class="button-container"><a href="#" class="button" onclick="closePopup();return false;"><?php echo $s['faq']['button-headline'] ?><br><span><?php echo $s['faq']['button-text'] ?></span></a></div>

</div><!-- end faqPopup -->