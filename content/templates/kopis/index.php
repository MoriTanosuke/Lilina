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
<script src="http://flesler-plugins.googlecode.com/files/jquery.scrollTo-1.4.2-min.js"></script>
<script src="<?php echo Templates::get_url('hotkeys.js'); ?>" type="text/javascript"></script>
<?php template_header(); ?>
</head> 

<body> 
<div data-role="page">
<div data-role="header">
<ul>
<li><a href="<?php template_siteurl(); ?>"><?php template_sitename(); ?></a></li>
<li><a href="?hours=6">6h</a></li>
<li><a href="?hours=24">24h</a></li>
<li><a href="?hours=48">48h</a></li>
<li><a href="admin/"><?php _e('Admin'); ?></a></li>
</ul>
</div><!-- header -->
<div data-role="content" title="hours-<?php echo get_offset(true); ?>">
<?php while(has_items()): the_item(); ?>
<div class="article" data-role="collapsible" data-theme="b" data-content-theme="c">
  <h1 id="#article-<?php the_id(); ?>"><img src="<?php the_feed_favicon(); ?>" /><?php the_feed_name(); ?> - <?php the_title(); ?> at <?php the_date(); ?></h1>
  <?php the_content(); ?><?php if(has_enclosure()) { the_enclosure(); } ?>
  <?php action_bar() ?>
</div>
<?php endwhile; ?> 
</div><!-- content -->
<div data-role="footer">
<ul>
<li><a href="http://kopis.de">made by kopis.de</a></li>
</ul>
</div><!-- footer -->
</div><!-- page -->
<script type="text/javascript">
$(document).ready(function() {init_keys();});
</script>
</body>
</html>
