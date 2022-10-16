<?php include "globals/header.php";
$AboutUs = new AboutUs();
$data = $AboutUs->getAboutUs(1);
$bannerData = data("pages_banner",1,2,1);
// return print_r($bannerData);
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
	<div class="section pt-16 pb-10">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-12">
					<div class="text-center-xs">
						<img src="record@1357admin/dist/img/<?=$data['sec1_image1']?>" alt="" class="mb-3" />
						<?=$data['sec1_image2_text']?>
						<div class="mt-4"></div>
					
					</div>
				</div>
				<div class="col-md-4 col-sm-12">
					<div class="mt-3"></div>
					<div class="film-single-testimonial small">
						<div class="item">
							<div class="photo">
								<img src="images/quote_bg_2.png" alt="" />
							</div>
							<div class="text">
							<?=$data['sec1_image1_text']?>
							</div>
						
							<div class="mt-5"></div>
							<img src="record@1357admin/dist/img/<?=$data['sec1_image2']?>" alt="" />
						</div>
					</div>
					<div class="mb-9"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-7 col-sm-12">
					<div class="film-list-member">
						<div class="item">
							<div class="photo">
								<img src="record@1357admin/dist/img/<?=$data['sec2_image1']?>" alt="" />
							</div>
							<div class="info">
								<span class="name"><?=$data['sec2_image1_title']?></span>
								<span class="tagline">/ <?=$data['sec2_image1_subtitle']?></span>
							</div>
						</div>
						<div class="item">
							<div class="photo">
								<img src="record@1357admin/dist/img/<?=$data['sec2_image2']?>" alt="" />
							</div>
							<div class="info">
								<span class="name"><?=$data['sec2_image2_title']?></span>
								<span class="tagline nd-font">/ <?=$data['sec2_image2_subtitle']?></span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-5 col-sm-12">
				<?=$data['sec2_text']?>
				<div class="icon-boxes icon-boxes-small">
						<div class="icon-boxes-icon">
							<i class="ion-trophy"></i>
						</div>
						<h5 class="icon-boxes-title"> <?=$data['sec2_award1_heading']?></h5>
						<div class="icon-boxes-content">
						<?=$data['sec2_award1_text']?>
						</div>
					</div>
					<div class="mb-4"></div>
					<div class="icon-boxes icon-boxes-small">
						<div class="icon-boxes-icon">
							<i class="ion-trophy"></i>
						</div>
						<h5 class="icon-boxes-title"> <?=$data['sec2_award2_heading']?></h5>
						<div class="icon-boxes-content">
						<?=$data['sec2_award2_text']?>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


</div>
<?php include "globals/footer.php"; ?>
