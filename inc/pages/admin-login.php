<?php
/******************************************
		Lilina: Simple PHP Aggregator
File:		admin-login.php
Purpose:	Just finish off the install
Notes:		Must turn off the non-fatal ones
Style:		**EACH TAB IS 4 SPACES**
Licensed under the GNU General Public License
See LICENSE.txt to view the license
******************************************/
defined('LILINA') or die('Restricted access');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Administration - Login</title>
</head>
<body>
<div id="login" style="border:1px solid #777; background: #ddd; margin-top:1em;padding:1em;padding-bottom:0em;">
<?php
if(isset($error_message) && !empty($error_message)) {
	echo '<p style="font-weight:bold; color:#E60000;">' . $error_message . '</p>';
}
?>	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<table>
			<tr style="<?php echo $highlight_un; ?>">
				<td><label for="user"><?php _e('Username'); ?>:</label></td>
				<td><input type="text" name="user" id="user" /></td>
			</tr>
			<tr style="<?php echo $highlight_pw; ?>">
				<td><label for="pass"><?php _e('Password'); ?>:</label></td>
				<td><input type="password" name="pass" id="pass" /></td>
			</tr>
			<tr>
				<td colspan="2" style="text-align: center;">
					<input type="submit" value="<?php _e('Login'); ?>" />
				</td>
			</tr>
		</table>
	</form>
</div>
</body>
</html>