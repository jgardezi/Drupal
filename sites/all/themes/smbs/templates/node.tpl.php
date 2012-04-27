<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> newsarea clearfix"<?php print $attributes; ?>>

  <?php if(isset($people_type)) : ?>
  	<?php print render($people_type); ?>
  <?php endif; ?>

  <?php //print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h2 class="post_title"<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
  <?php endif; ?>
  <?php //print render($title_suffix); ?>

  <?php if ($display_submitted): ?>
    <p class="meta">
      Posted <?php print $date; ?> by <?php print $name; ?> in <?php print $type; ?>
    </p>
  <?php endif; ?>
  
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      //dsm($content);
      //	($content);
      print render($content);
    ?>
  

  <?php print render($content['links']); ?>

  <?php print render($content['comments']); ?>

</article>