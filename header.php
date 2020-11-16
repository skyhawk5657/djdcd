<?php
/**
 * Online Search App Common Header
 * DC: 5/6/2019; LU: 5/7/2019; 10/4/2019
 */

 // retrieve online search list from JSON data file
include 'online_search_json_list.php';
$obj = json_decode($online_search_json_list); // this is an array, but all its elements are object
$total = count($obj);

// display search list for debugging purpose if needed
$display_list = FALSE; 
if ($display_list) {
	echo "<p>Display Online Service List: $online_search_json_list";
	echo "<p>Online Services: $total entries total</p>";
	$max_entries_to_display = 100;
	$i = 1;
	foreach ($obj as $entry) {
		echo $i.'; '.$entry->ID.'; '.$entry->Name.'; '.$entry->URL.'<br />';
		$i++;
		if ($i === $max_entries_to_display) {
			echo '<br />Break at '.$i;
			break; // stop displaying after it reaches specified number of entries
		}
	}
	exit;
}

// build search list for dropdown menu
$search_dropdown_list = '';
foreach ($obj as $entry) {
	$search_dropdown_list .= '<a class="dropdown-item" href="'.$entry->URL.'">'.$entry->Name.'</a>';
}
?>
<body>
<header id="pageHeader">
	<div class="container-fluid">
		<div class="row">
			<div class="header-left col-xs-12 col-sm-3">
				<a href="<?php echo SITE_URL; ?>"><img src="../images/hims-site-logo_180.jpg"></a>
			</div>
			<div class="header-middle col-xs-12 col-sm-6">
				<h1><?php echo $page_title; ?></h1>
			</div>
			<div class="header-right col-xs-12 col-sm-3">			
				<div class="dropdown">
					<a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--- 檢索列表 ---</a>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
						<?php echo $search_dropdown_list; ?>
					</div>
				</div>	
			</div>
		</div>	
	</div>
</header>
<?php if ($display_breadcrumb) { ?>
	<div class="breadcrumb-bar">
		<?php echo $this_breadcrumb; ?>
	</div>
<?php } ?>