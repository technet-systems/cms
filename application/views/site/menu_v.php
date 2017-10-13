<body>
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-MCVVJ2"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MCVVJ2');</script>
<!-- End Google Tag Manager -->

    <div class="brand">
		<?php foreach($meta_tags as $item) { ?>
		<?php print $item->c2_meta_title.ucfirst($this->uri->segment(3)); ?>
		<?php } ?>
				
	</div>
	
    <?php foreach($contact as $item) { ?>
    
<div class="address-bar"><a href="tel:+48505660091" id="tel-click"><?php print $item->c1_title; ?></a> | <a href="mailto:<?php print $item->c1_subtitle; ?>?subject=Zapytanie mailowe" target="_blank"><?php print $item->c1_subtitle; ?></a> | <a href="https://www.google.com/maps/place/DM+auto+Damian+Madejski/@50.300107,18.760583,16z/data=!4m5!3m4!1s0x0:0xd8c9acd4d1cfaf6d!8m2!3d50.300107!4d18.760583?hl=pl" target="_blank"><?php print $item->c1_text; ?></a></div>
    <?php } ?>
    
    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <?php foreach($meta_tags as $item) { ?>
                
                <a class="navbar-brand" href="<?php print base_url('start'); ?>"><?php print word_limiter($item->c2_meta_title, 2); ?></a>
                <?php } ?>
                
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="<?php print base_url('start'); ?>">start</a>
                    </li>
                    <li>
                        <a href="<?php print base_url('o_nas'); ?>">o nas</a>
                    </li>
                    <li>
                        <a href="<?php print base_url('przyciemnianie_szyb'); ?>">przyciemnianie</a>
                    </li>
                    <li>
                        <a href="<?php print base_url('realizacje'); ?>">realizacje</a>
                    </li>
                    <li>
                        <a href="<?php print base_url('cennik'); ?>">cennik</a>
                    </li>
                    <li>
                        <a href="<?php print base_url('kontakt'); ?>">kontakt</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	
	<?php if('2016-10-09' >= date('Y-m-d')): ?>
	<div class="container">
		<div class="row">
            <div class="box">
                <div class="col-lg-12 text-justify">
                    
                    <hr>
                    
                    <h2 class="intro-text text-center"><strong>Uwaga!</strong></h2>
                    <hr>
                    
                    <h2 class="text-center"><strong>Nieczynne z powodu urlopu do dnia 09.10.2016.</strong></h3>
                    
                </div>
            </div>
        </div>
	</div>
	<?php endif; ?>

    <script>
        $(document).ready(function() {
            $('#tel-click, #tel-click2').click(function() {
                ga('send', {
                    hitType: 'event',
                    eventCategory: 'Click',
                    eventAction: 'Call',
                    eventLabel: 'Phone'
                });
            });
        });
    </script>