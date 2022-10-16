<?php include "globals/header.php"; 

$allBlogData = data("blog",$idStatus);
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
$pagination->records(count($allBlogData));

// records per page
$pagination->records_per_page($records_per_page);

// here's the magick: we need to display only the records for the current page
$allBlogData = array_slice(
  $allBlogData,                                             //  from the original array we extract
  (($pagination->get_page() - 1) * $records_per_page),    //  starting with these records
  $records_per_page                                       //  this many records
);

$bannerData = data("pages_banner",1,2,5);
?>
<style>
.page-title {
    background-image: url(record@1357admin/dist/img/<?= $bannerData['banner'] ?>) !important;
}
</style>
<div id="main">
<?php if($bannerData['status']): ?>
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
			<div class="section pt-12 pb-12">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<div class="blog-list">
								<?php foreach ($allBlogData as $key => $item) : ?>
									<div class="blog-list-item style-2">
									<div class="row">
										<div class="col-md-4">
											<div class="post-thumbnail">
												<a href="blog-detail.php?id=<?= base64_encode($item['id']) ?>">
													<img src="record@1357admin/dist/img/<?=$item['image']?>" alt="" />
												</a>
											</div>
										</div>
										<div class="entry-desc col-md-8">
											<div class="list-categories">
											</div>
											<a href="blog-detail.php?id=<?= base64_encode($item['id']) ?>">
												<h3 class="entry-title"><?=$item['heading']?></h3>
											</a>

											<div class="entry-content">
											<?=$item['short_description']?>
											</div>
										</div>
									</div>
								</div>
								<?php endforeach; 
								 $pagination->render();
								?>
						
							</div>

							<!-- <div class="pagination">
								<a class="prev page-numbers" href="#">Previous</a>
								<a class="page-numbers" href="#">1</a>
								<span class="page-numbers current">2</span>
								<a class="page-numbers" href="#">3</a>
								<a class="next page-numbers" href="#">Next</a>
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include "globals/footer.php"; ?>
