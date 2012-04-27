<article id="contactInfo" class="grid_8 alpha">
	<?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      //dsm($content);
      //	($content);
      print render($content);
    ?>
</article>