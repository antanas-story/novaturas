    <header>
        <a data-step="1st" class="step 1st active" title="<?php echo $s['other']['1st-step-desc'] ?>">
            <span class="num">1</span> <?php echo $s['faq']['1st-step-headline'] ?>
        </a>
        <a data-step="2nd" class="step 2nd" title="<?php echo $s['other']['2nd-step-desc'] ?>">
            <span class="num">2</span> <?php echo $s['faq']['2nd-step-headline'] ?>
        </a>
        <a data-step="3rd" class="step 3rd" data-title="<?php echo $s['other']['3rd-step-desc'] ?>">
            <span class="num">3</span> <?php echo $s['faq']['3rd-step-headline'] ?>
        </a>
        
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
                    <a href="<?php echo base_url() ?>lt/create" class="lt">
                        <span></span>
                        <?php echo $s['other']['language-lt'] ?>
                    </a>
                    <a href="<?php echo base_url() ?>ee/create" class="ee">
                        <span></span>
                        <?php echo $s['other']['language-ee'] ?>
                    </a>
                    <a href="<?php echo base_url() ?>lv/create" class="lv">
                        <span></span>
                        <?php echo $s['other']['language-lv'] ?>
                    </a>
                    <a href="<?php echo base_url() ?>en/create" class="en">
                        <span></span>
                        <?php echo $s['other']['language-en'] ?>
                    </a>
                    <a href="<?php echo base_url() ?>ru/create" class="ru">
                        <span></span>
                        <?php echo $s['other']['language-ru'] ?>
                    </a>
                    
                </span>
            </span>
            <span id="faqIcon" class="icon">
            </span>
            <span class="like-button">
                <div class="fb-like" data-href="http://novaturas.story.lt/" data-send="false" data-layout="button_count" data-width="75" data-height="20" data-show-faces="false" data-font="lucida grande"></div>
            </span>
        </div>
    </header>