<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head()?>
</head>
<?global $redux_options?>
<body <?php body_class(); ?> >

<div id="wrapper">

<div id="header">

<div class="head-box container">
	<div class="row">
	<div class="col-md-3 col-xs-12">
	LOGO
	</div>
	<div class="col-md-9 col-xs-12 text-right">
	<? echo $redux_options['head-phone']?>
	<p><a href="mailto:info@wordpres.ru">info@wordpres.ru</a></p>
	</div>
	</div>
</div>

<!--Logo & Menu Section-->	
<nav class="top-nav navbar navbar-default">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only"><?php echo 'Меню'; ?></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<?php wp_nav_menu( array(  
				'menu'=>'header_menu',
				//'theme_location' => 'header_menu',
				'container'  => '',
				'menu_class' => 'nav navbar-nav',
				'menu_id'=>'top_menu',
				//'items_wrap'  =>'',
				//'walker' => new basetheme_nav_walker()
				 ) );
				?>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>
</div>

<div id="content">