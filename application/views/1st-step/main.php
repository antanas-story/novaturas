<div id="container" class="first-step">

<?php
// Including navigation header menu
require APPPATH."/views/templates/nav.php";
?>    
    
    
    <div id="main">
    </div><!--! end of #main -->
    
    <footer>
        <?php foreach($characters as $name=>$info):?>
        <span id="<?php echo $name; ?>"
              class="avatar"
              data-x="<?php echo $info["x"]; ?>"
              data-y="<?php echo $info["y"]; ?>"
              data-scale="<?php echo $info["scale"]; ?>">
            <span class="face"></span>
            <span class="see-through"></span>
            <span class="default-face" style="background-image: url('<?php echo base_url() ?>imgs/avatar-<?php echo $name; ?>.png');"></span>
        </span>
        <?php endforeach; ?>
        
        <a href="<?php echo base_url() ?>2nd-step" class="button">
            <?php echo $s['1st-step-main']['button-headline'] ?>
            <span><?php echo $s['1st-step-main']['button-text'] ?></span>
        </a>
        
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

</div><!--! end of #container -->    

<div id="manual-fine-uploader"></div>

<script src="<?php echo base_url() ?>js/1st-step.js"type="text/javascript"></script>

<?php if(ENVIRONMENT=="development") {
echo APPPATH."<br />";
var_dump($s);
}?>