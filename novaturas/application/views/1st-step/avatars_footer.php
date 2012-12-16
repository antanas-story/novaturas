<footer>
    <a href="#" class="button" id="1st-step-done">
        <?php echo $s['1st-step-main']['button-headline'] ?>
        <span><?php echo $s['1st-step-main']['button-text'] ?></span>
    </a>
    
    <div class="avatars">
        <?php foreach($characters as $name=>$info):?>
        <span id="<?php echo $name; ?>"
              class="avatar transition"
              data-x="<?php echo $info["x"]; ?>"
              data-y="<?php echo $info["y"]; ?>"
              <?php /* data-picture="http://novaturas.story.lt/uploads/019.jpg" */ ?>
              data-rotation="0"
              data-scale="<?php echo $info["scale"]; ?>">
            <span class="face">
                <img alt="" />
            </span>
            <span class="see-through"></span>
            <span class="default-face" style="background-image: url('<?php echo base_url() ?>imgs/avatar-<?php echo $name; ?>.png');"></span>
        </span>
        <?php endforeach; ?>
    </div>

    <div id="menu" class="gradient">
        <a href="#" id="from-pc">
            <span></span>
            <?php echo $s['1st-step-main']['upload-pic-from-pc'] ?>
        </a>
        <a href="#" id="from-fb">
            <span></span>
            <?php echo $s['1st-step-main']['upload-pic-from-fb'] ?>
        </a>
        <a href="#" id="edit-pic" class="picture">
            <span></span>
            <?php echo $s['1st-step-main']['edit-pic'] ?>
        </a>
        <a href="#" id="delete-pic" class="picture">
            <span></span>
            <?php echo $s['1st-step-main']['delete-pic'] ?>
        </a>
    </div>

</footer>