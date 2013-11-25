<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script src="<?php echo get_template_directory_uri(); ?>/js/plugins.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
  var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
  (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
  g.src='//www.google-analytics.com/ga.js';
  s.parentNode.insertBefore(g,s)}(document,'script'));
</script>

<!-- Lettering JS -->
<script src="<?php bloginfo('template_url');?>/js/jquery.lettering.js"></script>
<script>
  $(document).ready(function() {
     $(".lettering").lettering();
  });
</script>

<!-- FitText -->
<script src="<?php bloginfo('template_url');?>/js/jquery.fittext.js"></script>
<script>
  jQuery(".fitText").fitText();
  //jQuery("#sub-title").fitText();
</script>