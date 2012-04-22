
<div id="wrapper" class="container_16">

    <header id="mainheader" class="grid_16">
        <section id="logo" class="grid_11 alpha">
            <h1><a href="#">Single Molecule <span>Bioscience</span></a></h1>
        </section>
        <aside id="logo_unsw" class="grid_5 omega">
            <h1>@unsw</h1>
        </aside>
        <?php if ($main_menu): ?>
            <nav id="mainNav" class="grid_16">
                <h1>Main page navigation</h1>
                <?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('id' => 'siteNav', 'class' => array('Black')),)); ?>
            </nav> <!-- /.section, /#navigation -->
        <?php endif; ?>
        <!-- <nav id="mainNav" class="grid_16">
                <h1>Main page navigation</h1>
            <ul id="siteNav" class="Black">
                <li class="link"><a href="index.html">Home</a></li>
                <li class="link"><a href="news.html">News</a></li>
                <li class="link"><a href="people.html">People</a></li>
                <li class="link"><a href="reseach.html">Reseach</a></li>
                <li class="link"><a href="publications.html">Publications</a></li>
                <li class="link"><a href="join_us.html">Join Us</a></li>
                <li class="link"><a href="contact_us.html">Contact Us</a></li>
                <li class="link"><a href="others.html">Others</a></li>
            </ul>
        </nav> -->	
    </header>

    <section id="middleblock" class="grid_16">

        <?php print $messages; ?>

        <article id="textblock" class="grid_8 alpha">
            <?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
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

        <?php if ($is_front): ?>
            <aside id="animationArea" class="grid_8 omega">
                <div class="slider-wrapper theme-default">
                    <div class="ribbon"></div>
                    <div id="slider" class="nivoSlider">
                        <img src="images/toystory.jpg" alt="" />
                        <a href="http://dev7studios.com"><img src="images/up.jpg" alt="" title="This is an example of a caption" /></a>
                        <img src="images/walle.jpg" alt="" data-transition="slideInLeft" />
                        <img src="images/nemo.jpg" alt="" title="#htmlcaption" />
                    </div>
                    <div id="htmlcaption" class="nivo-html-caption">
                        <strong>This</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>.
                    </div>
                </div>
            </aside>
        <?php endif; ?>
        <footer id="mainfooter" class="">
            <div id="box">
                <img width="15" height="15" alt="Developer" src="images/icons/developer.png"> Developed by <a href="http://javedweb.com/">Javed Gardezi</a> and <a href="#"> Samuel</a>
            </div>
        </footer>
    </section>



</div>

<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/nivo-slider/jquery.nivo.slider.js"></script>
<script type="text/javascript" src="js/main.js"></script>
