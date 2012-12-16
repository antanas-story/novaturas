<?php if(ENVIRONMENT=="development") {
/*foreach($characters as $character=>$info) {
    echo '$config["character_info"]["'.$character.'"] = ';
    echo 'array("x"=>'.($info['x']-57).',"y"=>'.($info['y']-45).',"scale"=>'.$info['scale'].');';
    echo '<br />';
} echo '.<br />';*/
// path to application folder
// echo APPPATH."<br />";
// all locale strings
//var_dump($s);
} ?>
  <div id="overlay">
  </div>

        <audio id="audio" loop>
            <source src="<?php echo base_url() ?>sound/fonas.mp3" type="audio/mpeg" />
            <source src="<?php echo base_url() ?>sound/fonas.ogg" type="audio/ogg" />
            <source src="<?php echo base_url() ?>sound/fonas.m4a" type="audio/m4a" />
        </audio>

<input type='hidden' id='basePath' name='basePath' value='<?php echo base_url() ?>' /> 
    
    <div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '<?php echo FACEBOOK_APP_ID; ?>', // App ID from the App Dashboard
      channelUrl : '<?php echo base_url(); ?>channel.php', // Channel File for x-domain communication
      status     : true, // check the login status upon init?
      cookie     : true, // set sessions cookies to allow your server to access the session?
      xfbml      : true  // parse XFBML tags on this page?
    });

    // Additional initialization code such as adding Event Listeners goes here

  };

  (function(d, debug){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all" + (debug ? "/debug" : "") + ".js";
     ref.parentNode.insertBefore(js, ref);
   }(document, /*debug*/ false));
</script>
    
    
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>