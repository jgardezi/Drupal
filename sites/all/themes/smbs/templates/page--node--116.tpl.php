<div id="wrapper" class="container_16">

	<?php if ($page['header']): ?>
	<header id="mainheader" class="grid_16">
		<section id="logo" class="grid_11 alpha">
			<h1>
				<a href="#">Single Molecule <span>Bioscience</span></a>
			</h1>
		</section>
		<aside id="logo_unsw" class="grid_5 omega">
			<h1>@unsw</h1>
		</aside>
			<?php if ($main_menu): ?>
            <nav id="mainNav" class="grid_16">
			<h1>Main page navigation</h1>
                <?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('id' => 'siteNav', 'class' => array('Black')),)); ?>
            </nav>
		<!-- /.section, /#navigation -->
        <?php endif; ?>
	</header>
	<?php endif; ?>

	<section id="middleArea" class="grid_16">
		<?php print $messages; ?>
		
		<article id="map_canvas">
			<iframe src="http://www.map-generator.org/60cce09a-ffb2-485b-ab6a-265d4a75a6fb/iframe-map.aspx" scrolling="no" height="280px" width="860px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><br><small><a href="http://www.map-generator.org/60cce09a-ffb2-485b-ab6a-265d4a75a6fb/large-map.aspx" target="_blank"><a/></small>
		</article>
				
		<?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
		
		<?php print render($page['content']); ?>
		
		<?php if ($page['contact']): ?>
		<aside id="contactform" class="grid_8 omega">
			<?php print render($page['contact']); ?>
		</aside>
		<?php endif; ?>
		
		<?php if ($page['footer']): ?>
		<footer id="mainfooter" class="">
			<div id="box">
				<img width="15" height="15" alt="Developer"
					src="images/icons/developer.png"> Developed by <a
					href="http://javedweb.com/">Javed Gardezi</a> and <a href="#">
					Samuel</a>
			</div>
		</footer>
		<?php endif; ?>

	</section>



</div>