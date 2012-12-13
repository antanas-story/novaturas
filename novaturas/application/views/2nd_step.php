<div id="2nd-step" class="step container main" style="display:none;">
    <div id="greetingEdit" class="greeting popup show-at-once">
            <div class="edit">
                    <form action="#">
                            <input type="text" placeholder="<?php echo $s['2nd-step-greeting-text']['headline-placeholder'] ?>" class="input-edit">
                            <textarea placeholder="<?php echo $s['2nd-step-greeting-text']['greeting-text-placeholder'] ?>"></textarea>
                            <input type="text" placeholder="<?php echo $s['2nd-step-greeting-text']['signature-placeholder'] ?>" class="input-edit">
                            <?php /* <a class="simple-button bt-view"><?php echo $s['2nd-step-greeting-text']['button-headline'] ?></a>
                            <a class="simple-button bt-ok"><?php echo $s['2nd-step-greeting-text']['button-text'] ?></a> */ ?>
                            <div class="button-container">
                                <a class="button" id="2nd-step-done">
                                    <?php echo $s['2nd-step-greeting-text']['button-headline'] ?>
                                    <span><?php echo $s['2nd-step-greeting-text']['button-text'] ?></span>
                                </a>
                            </div>
                    </form>
            </div>
    </div><!-- end #greeting -->
    
</div><!--! end of #2nd-step -->