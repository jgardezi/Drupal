
<div id="wrapper" class="container_16">

	<header id="mainheader" class="grid_16">
	<?php if ($page['header']): ?>
	<?php print render($page['header']['block_1']['#markup']); ?>
		<!-- <section id="logo" class="grid_11 alpha">
			<h1>
				<a href="#">Single Molecule <span>Bioscience</span></a>
			</h1>
		</section>
		<aside id="logo_unsw" class="grid_5 omega">
			<h1>@unsw</h1>
		</aside> -->
	<?php endif; ?>
        <?php if ($main_menu): ?>
            <nav id="mainNav" class="grid_16">
			<h1>Main page navigation</h1>
                <?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('id' => 'siteNav', 'class' => array('Black')),)); ?>
            </nav>
		<!-- /.section, /#navigation -->
        <?php endif; ?>
    </header>


	<section id="middleblock" class="grid_16">

        <?php print $messages; ?>
		
		<?php if ($page['content']) :?>
        <article id="textblock" class="grid_8 alpha">
			<a id="main-content"></a>
            <?php print render($title_prefix); ?>
            <?php if ($title): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
            <?php print render($title_suffix); ?>
            <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
            <?php print render($page['help']); ?>
            <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
            <blockquote>
                <?php print render($page['content']); ?>
            </blockquote>
		</article>
        <?php endif; ?>

        <?php if ($is_front): ?>
        <?php if ($page['right']): ?>
        <aside id="animationArea" class="grid_8 omega">
        	<?php print render($page['right']); ?>
		 </aside>
		<?php endif; ?>
        <?php endif; ?>
        
        <?php if ($page['footer']): ?>
        <footer id="mainfooter" class="">
			<div id="box">
				<?php print render($page['footer']); ?>
			</div>
		</footer>
		<?php endif; ?>
		
	</section>



</div>

<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript"
	src="js/nivo-slider/jquery.nivo.slider.js"></script>
<script type="text/javascript" src="js/main.js"></script>
