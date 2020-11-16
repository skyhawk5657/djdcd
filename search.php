<?php
require '../search/config.php';
require '../search/functions.php';

define('APP_URL',SITE_URL.'/DaoD/');
$page_title = "道教大辭典聯合檢索";

require "../search/head_global.php";
// head app related section
?>
<title><?php echo $page_title.' - '.HIMSUS_TITLE; ?></title>
</head>

<?php
require './dcd_head.php';
$this_breadcrumb = $common_breadcrumb.$page_title;
require '../search/header.php';
?>

<div class="container-fluid">

	<div class="input-row">
		<table class="input-table">
			<tr>
				<td>
					詞條 <input type="text" size="30" id="queryString1" value="">
					<input type="button" value="檢索" onclick="search('queryString1','a')">
				</td>
			</tr>
			<tr>
				<td>
					解說 <input type="text" size="30" id="queryString2" value="">
					<input type="button" value="檢索" onclick="search('queryString2','b')">
				</td>
			</tr>
		</table>
	</div><!-- /input-table-->

	<p class="table-top-desc">解說：李叔還；胡孚琛、閔智亭主編的缺解說文本</p>
				
	<table id="searchTableOut" class="table table-striped table-bordered">
		<thead>
			<tr class="table-secondary">
				<th width="18%">詞條（简体 / 繁體）</th>
				<th width="58%">詞條拼音 / 解說</th>
				<th width="8%"><a href="orgpage.html?page=2380" target="_blank">胡孚琛</a></th>
				<th width="8%"><a href="2orgpage.html?page=1616" target="_blank">閔智亭</a></th>
				<th width="8%"><a href="3orgpage.html?page=703" target="_blank">李叔還</a></th>
			</tr>
		</thead>
	</table>
	
	<p class="compiled-by"><?php echo $compiled_by; ?></p>

</div><!--/container-fluid-->
<?php
require '../search/footer.php';
?>
</body>
</html>
<!-- 2016.09.14 白雲深處人家<http://www.homeinmists.com/>
蔣門馬<nirvanajmm104722@163.com>整理製作-->
