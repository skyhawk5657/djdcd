<?php
/**
 * Online Search App Footer
 * DC: 5/6/2019; LU: 5/7/2019
 */
 
// The following variables are defined in config.php:
// $contact_us_url, $contact_us_title
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>

<footer id="pageFooter">
	<div class="container-fluid">
		<div class="row">
			<div class="footer-left col-xs-12 col-sm-12 col-md-8">
				<span>&copy; <?php echo HIMSUS_TITLE; ?> <?php echo get_the_year(); ?> <a href="<?php echo $contact_us_url; ?>"><?php echo $contact_us_title; ?></a></span>
			</div>
			<div class="footer-right col-xs-12 col-sm-12 col-md-4">
				<span><a href="<?php echo HYVIEW_URL; ?>/contact-us/%e8%81%af%e7%b5%a1%e6%88%91%e5%80%91/" target="_blank">Designed by <?php echo HYVIEW_TITLE; ?></a></span>
			</div>
		</div>
	</div>
</footer>