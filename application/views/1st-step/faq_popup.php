<div id="faqPopup" class="popup with-overlay <?php if($step==1) echo 'show-at-once'; ?>">
    <p>1. <?php echo $s['faq']['1st-step-headline'] ?><br />
    <?php echo $s['faq']['1st-step-description'] ?></p>
    
    <p>2. <?php echo $s['faq']['2nd-step-headline'] ?><br />
    <?php echo $s['faq']['2nd-step-description'] ?></p>
    
    <p>3. <?php echo $s['faq']['3rd-step-headline'] ?><br />
    <?php echo $s['faq']['3rd-step-description'] ?></p>
    
    
    <a href="#" class="button" onclick="closePopup();return false;">
        <?php echo $s['faq']['button-headline'] ?>
        <span><?php echo $s['faq']['button-text'] ?></span>
    </a>
</div>