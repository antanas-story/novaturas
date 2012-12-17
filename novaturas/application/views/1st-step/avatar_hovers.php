<?php foreach($characters as $name=>$info):?>
    <?php
    $offset = $info["scale"]*13/$canvas["maxAvatar"];
    $style= "left:".(($info['x'] - $offset)*100/$canvas['width'])."%;".
            "top:".(($info['y']-$offset)*100/$canvas['height'])."%;".
            "width: ".(($info["scale"]+$offset*2)*100/$canvas["width"])."%;".
            "height: ".(($info["scale"]+$offset*2)*100/$canvas["height"])."%;";
    ?>
    <span id="hover-<?php echo $name; ?>"
          data-id="<?php echo $name; ?>"
          class="avatar-hover transition"
          style="<?php echo $style; ?>"
        ></span>

    
    <?php
    $style= "left:".($info['x']*100/$canvas['width'])."%;".
            "top:".($info['y']*100/$canvas['height'])."%;".
            "width: ".($info["scale"]*100/$canvas["width"])."%;".
            "height: ".($info["scale"]*100/$canvas["height"])."%;";
    ?>
    <canvas id="cropped-<?php echo $name; ?>"
          data-id="<?php echo $name; ?>"
          class="avatar-cropped"
          width="143"
          height="143"
          style="<?php echo $style; ?>"
        ></canvas>

    
<?php endforeach; ?>