<?php

global $wpdb;

$_POST = stripslashes_deep($_POST);
$_GET = stripslashes_deep($_GET);

$xyz_ips_snippetId = intval($_GET['snippetId']);
$xyz_ips_snippetStatus = intval($_GET['status']);
$xyz_ips_pageno = intval($_GET['pageno']);
if($xyz_ips_snippetId=="" || !is_numeric($xyz_ips_snippetId)){
	header("Location:".admin_url('admin.php?page=insert-php-code-snippet-manage'));
	exit();

}

$snippetCount = $wpdb->query( 'SELECT * FROM '.$wpdb->prefix.'xyz_ips_short_code WHERE id="'.$xyz_ips_snippetId.'" LIMIT 0,1' ) ;

if($snippetCount==0){
	header("Location:".admin_url('admin.php?page=insert-php-code-snippet-manage&xyz_ips_msg=2'));
	exit();
}else{
	
	$wpdb->update($wpdb->prefix.'xyz_ips_short_code', array('status'=>$xyz_ips_snippetStatus), array('id'=>$xyz_ips_snippetId));
	header("Location:".admin_url('admin.php?page=insert-php-code-snippet-manage&xyz_ips_msg=4&pagenum='.$xyz_ips_pageno));
	exit();
	
}
?>