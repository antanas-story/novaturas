<div id="2nd-step" class="step container main fixedWidth" style="display:none;">
    <div id="greetingEdit" class="greeting popup show-at-once wait-forever permanent">
            <div class="edit">
                    <form>
                            <input type="text"
                                   name="headline"
                                   placeholder="<?php echo $s['2nd-step-greeting-text']['headline-placeholder'] ?>"
                                   class="input-edit">
                            <textarea
                                name="text"
                                placeholder="<?php echo $s['2nd-step-greeting-text']['greeting-text-placeholder'] ?>"
                                ></textarea>
                            <input
                                name="signedBy"
                                type="text"
                                placeholder="<?php echo $s['2nd-step-greeting-text']['signature-placeholder'] ?>"
                                class="input-edit">
                            <a class="simple-button bt-view" id="2nd-step-review" href="#">
                                <?php echo $s['2nd-step-greeting-text']['review-greeting'] ?>
                            </a>
                            <a class="simple-button bt-ok" id="2nd-step-done" href="#">
                                <?php echo $s['2nd-step-greeting-text']['button-headline'] ?>
                            </a>
                    </form>
            </div>
    </div><!-- end #greeting -->
    
</div><!--! end of #2nd-step -->