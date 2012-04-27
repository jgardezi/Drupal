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
	
	<section id="textArea" class="grid_16">
	<?php //if ( !empty($vocabulary_type)) krumo($vocabulary_type); ?>
	<?php //krumo($page);?>
		
		<?php if($secondary_menu): ?>
        <header id="newsHd" class="">
        	<nav id="pageNav" class="">
				<hgroup>
					<h1>News page navigation</h1>
				</hgroup>
				<?php print theme('links__system_secondary_menu', array('links' => $secondary_menu, 'attributes' => array('id' => 'newsNav', 'class' => array('links', 'inline', 'clearfix')) )); ?>
			</nav>
		</header>
		<?php endif; ?>

        <?php print $messages; ?>

        <a id="main-content"></a>
        <?php print render($title_prefix); ?>
        <?php print render($title_suffix); ?>
        <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
        <?php print render($page['help']); ?>
        <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>

        <?php print render($page['content']); ?>
		
		<?php if ($page['footer']): ?>
        <footer id="mainfooter" class="">
			<div id="box">
				<?php print render($page['footer']); ?>
				<!-- 
				<img width="15" height="15" alt="Developer"
					src="images/icons/developer.png"> Developed by <a
					href="http://javedweb.com/">Javed Gardezi</a> and <a href="#">
					Samuel</a>
				-->
			</div>
		</footer>
		<?php endif; ?>

	</section>


</div>