<!DOCTYPE html> 
<html> 
<head> 
<title><?php template_sitename(); ?></title> 
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=1;"/> 
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="<?php echo Templates::get_url('iui/iui-logo-touch-icon.png'); ?>" /> 
<link rel="stylesheet" href="<?php echo Templates::get_url('iui/iui.css'); ?>" type="text/css" /> 
<script type="application/x-javascript" src="<?php echo Templates::get_url('iui/iui.js'); ?>"></script> 
<link rel="stylesheet" href="<?php echo Templates::get_url('style.css'); ?>" type="text/css" />
<?php template_header(); ?>
</head> 

<body> 
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
	<li><a href="<?php template_siteurl(); ?>index.php?method=update&cron"><?php _e('Update'); ?></a></li>
        <li class="last"><a href="admin/">Admin</a></li> 
    </ul> 

<div id="contents"></div>

    <ul id="articles" title="Articles"> 
<?php while(has_items()): the_item(); ?>
	<?php the_date('before=<li class="group" title="' . _r('Click to expand/collapse date') . '" class="date"> &after=</li>&format=l d F, Y') ?>
	<li><h1><a href="#article-<?php the_id(); ?>"><?php the_title(); ?></a></h1></li>
<div id="article-<?php the_id(); ?>" class="panel article" title="<?php the_title(); ?>"><?php the_content(); ?><?php if(has_enclosure()) { ?><?php _the_enclosure(); ?><?php } ?></div>
<!--
<script type="javascript">
content = document.createElement('div');
content.setAttribute('id', 'article-<?php the_id(); ?>');
content.setAttribute('class', 'panel');
content.setAttribute('title', '<?php the_title(); ?>');
content.innerHTML = '<?php the_content(); ?><?php if(has_enclosure()) { ?><?php _the_enclosure(); ?><?php } ?>';
document.getElementById('contents').appendChild(content);
</script>
-->

<?php endwhile; ?> 
    </ul>

	<ul id="feeds" title="feeds">
<?php list_feeds('format=<li><a href="%1$s">%3$s</a><a href="%4$2" class="feed-link">('._r('Feed').')</a></li>'); ?>
	</ul>
</body>
</html>

