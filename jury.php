<?php include "globals/header.php";

$allServiceData = data("market", $idStatus);

// how many records should be displayed on a page?
$records_per_page = 4;

// include the pagination class
require 'library/pagination/Zebra_Pagination.php';

// instantiate the pagination object
$pagination = new Zebra_Pagination();

// set position of the next/previous page links
$pagination->navigation_position(isset($_GET['navigation_position']) && in_array($_GET['navigation_position'], array('left', 'right')) ? $_GET['navigation_position'] : 'outside');

// if we have to show records in reversed order
if (isset($_GET['reversed'])) $pagination->reverse(true);

// the number of total records is the number of records in the array
$pagination->records(count($allServiceData));

// records per page
$pagination->records_per_page($records_per_page);

// here's the magick: we need to display only the records for the current page
$allServiceData = array_slice(
	$allServiceData,                                             //  from the original array we extract
	(($pagination->get_page() - 1) * $records_per_page),    //  starting with these records
	$records_per_page                                       //  this many records
);


$bannerData = data("pages_banner", 1, 2, 20);
?>
<style>
	.page-title {
		background-image: url(record@1357admin/dist/img/<?= $bannerData['banner'] ?>) !important;
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
	<div class="section pt-5 pb-5">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="mt-13 hidden-sm"></div>
					<?php foreach ($allServiceData as $key => $item) :
						if ($key % 2 == 0) :
					?>

							<div class="film-our-services type-image mb-7">
								<a href="#">
									<div class="row">
										<div class="col-md-6 col-image">
											<img src="record@1357admin/dist/img/<?= $item['image'] ?>" alt="" />
										</div>
										<div class="col-md-6 col-text">
											<div class="text">
												<div class="title"> <?= $item['heading'] ?></div>
												<div class="content">
													<?= $item['short_description'] ?>
												</div>
											</div>
										</div>
									</div>
								</a>
							</div>
						<?php else : ?>
							<div class="film-our-services type-image right mb-7">
								<a href="#">
									<div class="row">
										<div class="col-md-6 col-image">
											<img src="record@1357admin/dist/img/<?= $item['image'] ?>" alt="" />
										</div>
										<div class="col-md-6 col-text">
											<div class="text">
												<div class="title"> <?= $item['heading'] ?></div>
												<div class="content">
													<?= $item['short_description'] ?>
												</div>
											</div>
										</div>
									</div>
								</a>
							</div>
					<?php
						endif;
					endforeach;
					$pagination->render();

					?>

				</div>
			</div>
		</div>
	</div>
	<div class="section pt-2 pb-13">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="text-center">
						<h2 class="section-title fz-24 mb-2">We work with established agencies, labels and <br />organizations, as well as young talents and startups.</h2>
						<div class="mt-4"></div>
						<a href="contact-us" target="_self" class="button">Contact Us</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include "globals/footer.php"; ?>