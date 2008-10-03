<?php
/**
 * @todo Move to admin/settings.php
 * @author Ryan McCue <cubegames@gmail.com>
 * @package Lilina
 * @version 1.0
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */
require_once('admin.php');


/**
 * Activate a plugin
 *
 * @since 1.0
 *
 * @param string $plugin_file Relative path to plugin
 * @return bool Whether plugin was activated
 */
function activate_plugin($plugin_file) {
	global $current_plugins;
	$plugin_file = trim($plugin_file);

	if(!validate_plugin($plugin_file))
		return false;
	$current_plugins[md5($plugin_file)] = $plugin_file;
	
	$data = new DataHandler();
	$data->save('plugins.data', serialize($current_plugins));
	return true;
}

/**
 * Deactivate a plugin
 *
 * @since 1.0
 *
 * @param string $plugin_file Relative path to plugin
 * @return bool Whether plugin was deactivated
 */
function deactivate_plugin($plugin_file) {
	global $current_plugins;
	
	if(!isset($current_plugins[md5($plugin_file)]))
		return false;

	if(!validate_plugin($plugin_file))
		return false;

	unset($current_plugins[md5($plugin_file)]);
	
	$data = new DataHandler();
	$data->save('plugins.data', serialize($current_plugins));
	return true;
}

if(isset($_REQUEST['activate_plugin'])) {
	activate_plugin($_REQUEST['activate_plugin']);
}
elseif(isset($_REQUEST['deactivate_plugin'])) {
	deactivate_plugin($_REQUES['activate_plugin']);
}
	


require_once(LILINA_INCPATH . '/core/file-functions.php');
admin_header(_r('Settings'));
?>
<h1><?php _e('Settings'); ?></h1>
<form action="settings.php" method="post">
	<fieldset id="general">
		<legend><?php _e('General Settings'); ?></legend>
		<div class="row">
			<label for="sitename"><?php _e('Site name'); ?>:</label>
			<input type="text" name="sitename" id="sitename" value="<?php echo $settings['sitename']; ?>" />
		</div>
		<div class="row">
			<label for="baseurl"><?php _e('Site address (URL)'); ?>:</label>
			<input type="text" name="baseurl" id="baseurl" value="<?php echo $settings['baseurl']; ?>" />
		</div>
	</fieldset>
	<fieldset id="views">
		<legend><?php _e('Viewing Settings'); ?></legend>
		<div class="row">
			<label for="template"><?php _e('Template'); ?>:</label>
			<select id="template" name="template">
				<?php
				foreach(available_templates() as $template) {
					echo '<option value="', $template['name'];
					if($template['name'] === $settings['template']) {
						echo '" selected="selected';
					}
					echo '">', $template['real_name'], '</option>';
				}
				?>
			</select>
		</div>
		<div class="row">
			<label for="lang"><?php _e('Language') ?></label>
			<select id="lang" name="lang">
				<?php
				foreach(available_locales() as $locale) {
					echo '<option';
					if($locale['name'] === $settings['locale']) {
						echo ' selected="selected"';
					}
					echo '>', $locale['name'], '</option>';
				}
				?>
			</select>
		</div>
	</fieldset>
	<input type="hidden" name="page" value="settings" />
	<input type="submit" value="<?php _e('Save') ?>" class="submit" disabled="disabled" />
</form>
<form action="settings.php" method="post">
	<fieldset id="plugins">
		<legend><?php _e('Plugin Management'); ?></legend>
		<table class="item-table">
			<thead>
				<tr>
					<th scope="col"><?php _e('Plugin') ?></th>
					<th scope="col"><?php _e('Version') ?></th>
					<th scope="col"><?php _e('Description') ?></th>
					<th scope="col"><?php _e('Status') ?></th>
					<th scope="col"><?php _e('Action') ?></th>
				</tr>
			</thead>
			<tbody>
<?php
foreach(lilina_plugins_list(get_plugin_dir()) as $plugin):
	global $current_plugins;
	$plugin_meta = plugins_meta($plugin);
	$plugin_file = str_replace(get_plugin_dir(), '', $plugin);
?>
				<tr>
					<td><?php echo $plugin_meta->name ?></td>
					<td><?php echo $plugin_meta->version ?></td>
					<td><?php echo $plugin_meta->description ?></td>
					<td><?php if(isset($current_plugins[md5($plugin_file)])) _e('Activated'); else _e('Deactivated'); ?></td>
					<td><a href="settings.php?activate_plugin=<?php echo $plugin_file ?>"><?php if(isset($current_plugins[md5($plugin_file)])) _e('Dectivate'); else _e('Activate'); ?></a></td>
				</td>
<?php
endforeach;
?>
			</tbody>
		</table>
	</fieldset>
</form>
<h2>Reset</h2>
<p>This will delete your settings.php and you will need to run install.php again. <a href="<?php echo $_SERVER['PHP_SELF'];?>?page=settings&amp;action=reset">Proceed?</a></p>
<?php
admin_footer();
?>