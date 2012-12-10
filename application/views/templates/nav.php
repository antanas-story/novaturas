    <header>
        <span class="step <?php if($step==1) echo "active"?>">
            <span class="num">1</span> <?php echo $s['faq']['1st-step-headline'] ?>
        </span>
        <span class="step <?php if($step==2) echo "active"?>">
            <span class="num">2</span> <?php echo $s['faq']['2nd-step-headline'] ?>
        </span>
        <span class="step <?php if($step==3) echo "active"?>">
            <span class="num">3</span> <?php echo $s['faq']['3rd-step-headline'] ?>
        </span>
        
        <div class="right">
            <span class="volume">
                <span id="volumeControl" class="bar">
                    <span class="loudness"></span>
                </span>
                <span id="mute" class="icon"></span>
            </span>
            <span class="language">
                <span class="icon" id="languageSelect"></span>
                <span id="languageDropdown" class="language dropdown">
                    <a href="<?php echo base_url() ?>lang/lt" class="lt">
                        <span></span>
                        <?php echo $s['other']['language-lt'] ?>
                    </a>
                    <a href="<?php echo base_url() ?>lang/ee" class="ee">
                        <span></span>
                        <?php echo $s['other']['language-ee'] ?>
                    </a>
                    <a href="<?php echo base_url() ?>lang/lv" class="lv">
                        <span></span>
                        <?php echo $s['other']['language-lv'] ?>
                    </a>
                    <a href="<?php echo base_url() ?>lang/en" class="en">
                        <span></span>
                        <?php echo $s['other']['language-en'] ?>
                    </a>
                    <a href="<?php echo base_url() ?>lang/ru" class="ru">
                        <span></span>
                        <?php echo $s['other']['language-ru'] ?>
                    </a>
                    
                </span>
            </span>
            <span id="faqIcon" class="icon">
            </span>
            <span class="like-button">
                <div class="fb-like" data-href="http://www.novaturas.lt/" data-send="false" data-layout="button_count" data-width="75" data-height="20" data-show-faces="false" data-font="lucida grande"></div>
            </span>
        </div>
    </header>


<?php
// Including other template files
require APPPATH."/views/1st-step/faq_popup.php";
?>