<?php include "globals/header.php";

$allCatalogueData = data("catalogue", $idStatus);
// how many records should be displayed on a page?
$records_per_page = 9;

// include the pagination class
require 'library/pagination/Zebra_Pagination.php';

// instantiate the pagination object
$pagination = new Zebra_Pagination();

// set position of the next/previous page links
$pagination->navigation_position(isset($_GET['navigation_position']) && in_array($_GET['navigation_position'], array('left', 'right')) ? $_GET['navigation_position'] : 'outside');

// if we have to show records in reversed order
if (isset($_GET['reversed'])) $pagination->reverse(true);

// the number of total records is the number of records in the array
$pagination->records(count($allCatalogueData));

// records per page
$pagination->records_per_page($records_per_page);

// here's the magick: we need to display only the records for the current page
$allCatalogueData = array_slice(
	$allCatalogueData,                                             //  from the original array we extract
	(($pagination->get_page() - 1) * $records_per_page),    //  starting with these records
	$records_per_page                                       //  this many records
);

$bannerData = data("pages_banner", 1, 2, 13);
?>
<style>
	.page-title {
		background-image: url(rbs@1357admin/dist/img/<?= $bannerData['banner'] ?>) !important;
	}
</style>
<div id="main">
	<?php if ($bannerData['status']) : ?>
		<div class="section page-title">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="text-center-sm">
							<h1 class="title"><?= $bannerData['name'] ?></h1>
							<div class="breadcrumbs">
								<ul>
									<li><a href="index.php"><?= $bannerData['br1'] ?></a></li>
									<li><?= $bannerData['br2'] ?> </li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<div class="section pt-12 mb-10">
		<div class="container">
			<div class="row">
			<div class="film-masonry masonry-grid-post" style="position: relative; height: 813.688px;">

				<?php foreach ($allCatalogueData as $key => $item) : ?>
						<div class="col-md-4 col-sm-6 film-masonry-item masonry-item anthology-film short-film" style="position: absolute; left: 0px; top: 0px;">
							<div class="film-masonry-item-inner">
								<div class="thumb">
									<a href="catalogue-detail.php?id=<?= base64_encode($item['id']) ?>">
										<img src="rbs@1357admin/dist/img/<?= $item['image'] ?>" alt="">
									</a>
								</div>
								<div class="info">
									<div class="title">
										<a href="catalogue-detail.php?id=<?= base64_encode($item['id']) ?>"><?= $item['heading'] ?></a>
									</div>
									<div class="category">
										<a href="#"><?= $item['subheading'] ?></a>
									</div>
								</div>
							</div>
						</div>
				<?php endforeach;
				
				?>
					</div>
<?php $pagination->render(); ?>
			</div>
		</div>
	</div>

	<?php include "globals/footer.php"; ?>