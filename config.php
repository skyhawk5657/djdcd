<?php
/**
 * Online Search App Configuration
 * DC: 5/6/2019; LU: 5/6/2019; 10/9/2019; 12/29/2019
 */
define('HIMS_URL','http://www.homeinmists.com');
define('HIMS_TITLE','白雲深處人家');
define('JMM','蔣門馬');
define('HYVIEW_TITLE','Hyview Softech');
define('HYVIEW_URL','https://www.hyview.com/site');

// check if this is a remote or local server
$host = substr($_SERVER['HTTP_HOST'], 0, 5);
if ( in_array($host, array('local', '127.0', '192.1')) ) {
	$local = TRUE;
} else {
	$local = FALSE;
}

if ( (! empty($_SERVER['REQUEST_SCHEME']) && $_SERVER['REQUEST_SCHEME'] == 'https') ||
     (! empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ||
     (! empty($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443') ) {
    $server_request_scheme = 'https';
} else {
    $server_request_scheme = 'http';
}
$this_path = $server_request_scheme.'://';
$this_path .= $_SERVER['HTTP_HOST'];

if (($_SERVER["SERVER_PORT"] !== '80') && ($_SERVER["SERVER_PORT"] !== '443')) {
	$this_path .= ':'.$_SERVER['SERVER_PORT'];
}

if ($local) {
	define('SITE_URL', $this_path.'/hims/');
} else {
	define('SITE_URL', $this_path.'/');
}

define('HIMSUS_TITLE', HIMS_TITLE.'海外站');
define('HIMSUS_URL', SITE_URL);

$compiled_by = HIMS_TITLE.' <a href="'.HIMSUS_URL.'%e9%97%9c%e6%96%bc%e7%b6%b2%e7%ab%99/%e7%b6%b2%e7%ab%99%e5%89%b5%e5%bb%ba%e4%ba%ba/">'.JMM.'</a> 整理';
$contact_us_url = HIMSUS_URL."%E9%97%9C%E6%96%BC%E7%B6%B2%E7%AB%99/%E8%81%AF%E7%B5%A1%E6%88%91%E5%80%91/";
$contact_us_title = "聯絡我們";

// Breadcrumb: a site-wide switch to turn on or off the display of Breadcrumb
// default to display for the whole site. setting on individual page can overwrite this global setting
$display_breadcrumb = TRUE; 
$common_breadcrumb = '<a href="'.SITE_URL.'">首頁</a> » ';
$common_breadcrumb .= '<a href="'.SITE_URL.'%e7%b6%b2%e7%ab%99%e5%85%ac%e5%91%8a/%e5%9c%a8%e7%b7%9a%e6%aa%a2%e7%b4%a2/">在線檢索</a> » ';