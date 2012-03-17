<!DOCTYPE html> 
<html> 
<head> 
<title><?php template_sitename(); ?></title> 
<meta name="viewport" content="width=device-width, initial-scale=1;"/> 
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="<?php echo Templates::get_url('style.css'); ?>" type="text/css" />
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.css" />
<script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
<script src="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.js"></script>
<?php template_header(); ?>
</head> 

<body> 
<div data-role="page">
<div data-role="header">
    <div class="toolbar"> 
        <h1 id="pageTitle"></h1> 
        <a id="backButton" class="button" href="<?php template_siteurl(); ?>"></a> 
    </div> 

    <ul id="home" title="Home" selected="true"> 
        <li><a href="#articles">Articles</a></li> 
	<li><a href="#feeds">Feeds</a></li>
	<li><a href="<?php template_siteurl(); ?>index.php?hours=24"><?php printf(_r('Past %d hours'), 24) ?></a></li>
	<li><a href="<?php template_siteurl(); ?>index.php?hours=48"><?php printf(_r('Past %d hours'), 48) ?></a></li>
	<li><a href="<?php template_siteurl(); ?>index.php?hours=168"><?php _e('Past week') ?></a></li>
	<li><a href="<?php template_siteurl(); ?>index.php?hours=-1"><?php _e('Show all') ?></a></li>
	<li><a href="<?php template_siteurl(); ?>index.php?method=update"><?php _e('Update'); ?></a></li>
        <li class="last"><a href="admin/">Admin</a></li> 
    </ul>
</div><!-- header -->

<div data-role="content">
    <ul data-role="listview" data-inset="true">
<?php while(has_items()): the_item(); ?>
	<?php the_date('before=<li data-role="list-divider" title="' . _r('Click to expand/collapse date') . '"> &after=</li>&format=l d F, Y') ?>
	<li data-role="list-divider"><h1 id="article-<?php the_id(); ?>"><img src="<?php the_feed_favicon(); ?>" />&nbsp;<?php the_feed_name() ?> - <?php the_title(); ?> at <?php the_date('&format=h:m:s'); ?></h1></li>
	<li><div class="article"><?php the_content(); ?><?php if(has_enclosure()) { ?><?php the_enclosure(); ?><?php } ?></div>
	</li>
<?php endwhile; ?> 
    </ul>
</div><!-- content -->

<div data-role="page" id="feeds">
<ul title="feeds">
<?php list_feeds('format=<li><a href="%1$s">%3$s</a><a href="%4$2" class="feed-link">('._r('Feed').')</a></li>'); ?>
</ul>
</div>

<div data-role="footer">
</div>
</div><!-- page -->
</body>
</html>

