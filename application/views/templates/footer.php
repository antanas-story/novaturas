
    <div id="ajax" class="popup with-overlay wait-forever"></div>
  <div id="overlay">
  </div>

        <audio id="audio" loop>
            <source src="<?php echo base_url() ?>sound/fonas.mp3" type="audio/mpeg" />
            <source src="<?php echo base_url() ?>sound/fonas.ogg" type="audio/ogg" />
            <source src="<?php echo base_url() ?>sound/fonas.m4a" type="audio/m4a" />
        </audio>

        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";//&appId=491297840910187";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>