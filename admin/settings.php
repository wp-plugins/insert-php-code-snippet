<?php

global $wpdb;
// Load the options


if($_POST){
		
	$_POST=xyz_trim_deep($_POST);
	$_POST = stripslashes_deep($_POST);
				
		$xyz_ips_limit = abs(intval($_POST['xyz_ips_limit']));
		if($xyz_ips_limit==0)$xyz_ips_limit=20;
		
		$xyz_ips_credit = $_POST['xyz_ips_credit'];
		
		
		update_option('xyz_ips_limit',$xyz_ips_limit);
		update_option('xyz_credit_link',$xyz_ips_credit);
	
	?>
	
	<div class="system_notice_area_style1" id="system_notice_area">
		Settings updated successfully. &nbsp;&nbsp;&nbsp;<span id="system_notice_area_dismiss">Dismiss</span>
	</div>
	<?php
}


?>

<div>

	
	<form method="post">
	<div style="float: left;width: 98%">
	<fieldset style=" width:100%; border:1px solid #F7F7F7; padding:10px 0px 15px 10px;">
	<legend ><h3>Settings</h3></legend>
	<table class="widefat"  style="width:99%;">
						<tr valign="top">
				<td scope="row" ><label for="xyz_ips_credit">Credit link to author</label>
				</td>
				<td><select name="xyz_ips_credit" id="xyz_ips_credit">
						<option value="ips"
						<?php if(isset($_POST['xyz_ips_credit']) && $_POST['xyz_ips_credit']=='ips') { echo 'selected';}elseif(get_option('xyz_credit_link')=="ips"){echo 'selected';} ?>>Enable</option>
						<option value="0"
						<?php if(isset($_POST['xyz_ips_credit']) && $_POST['xyz_ips_credit']!='ips') { echo 'selected';}elseif(get_option('xyz_credit_link')!="ips"){echo 'selected';} ?>>Disable</option>

				</select>
				</td>
			</tr>
			
			<tr valign="top">
				<td scope="row" class=" settingInput" id=""><label for="xyz_ips_limit">Pagination limit</label></td>
				<td id=""><input  name="xyz_ips_limit" type="text"
					id="xyz_ips_limit" value="<?php if(isset($_POST['xyz_ips_limit']) ){echo abs(intval($_POST['xyz_ips_limit']));}else{print(get_option('xyz_ips_limit'));} ?>" />
				</td>
			</tr>
			
			<tr valign="top">
				<td scope="row" class=" settingInput" id="bottomBorderNone">
				</td>
				<td id="bottomBorderNone"><input style="margin:10px 0 20px 0;" id="submit" class="button-primary bottonWidth" type="submit" value=" Update Settings " />
				</td>
			</tr>
			
	</table>
	</fieldset>
	
	</div>

	</form>
</div>