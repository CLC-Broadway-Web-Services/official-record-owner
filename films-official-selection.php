<?php include "globals/header.php";

// $allOfficialSelectionData = data("official_selection", $idStatus);
$sql = "SELECT *,official_selection.id mainId FROM official_selection  JOIN official_selection_category ON   official_selection.category = official_selection_category.id  where official_selection.status = 1 ORDER BY official_selection.id DESC";
$allOfficialSelectionData = $db->getAllData($sql);
$allofficial_selectionCatData = data("official_selection_category");
$bannerData = data("pages_banner", 1, 2, 13);
?>
<style>
	.info1 .title a {
		font-size: 18px;
		overflow: hidden;
		text-overflow: ellipsis;
		display: -webkit-box;
		-webkit-line-clamp: 2;
		-webkit-box-orient: vertical;
		font-weight: 400;
		font-family: Merriweather;
		color: #333;
	}

	.info1 {
		padding: 20px 30px;
		background-color: #fff;
		-moz-box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
		-webkit-box-shadow: 0 10px 20px rgb(0 0 0 / 5%);
		box-shadow: 0 10px 20px rgb(0 0 0 / 5%);
	}

	.info1 .title a {
		font-size: 18px;
		overflow: hidden;
		text-overflow: ellipsis;
		display: -webkit-box;
		-webkit-line-clamp: 2;
		-webkit-box-orient: vertical;
		font-weight: 400;
		font-family: Merriweather;
		color: #333;
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

	<div class="section pt-12">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="gallery-filter">
						<ul class="nav nav-pills masonry-filter">
							<li class="active"><a data-toggle="pill" href="#home">All</a></li>
							<?php foreach ($allofficial_selectionCatData as $key => $item) : ?>
								<li><a data-toggle="pill" href="#cat_<?= $item['id'] ?>"><?= $item['name'] ?></a></li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="section pb-12">
		<div class="container">
			<div class="tab-content">
				<div id="home" class="tab-pane fade in active">
					<div class="row">
						<?php foreach ($allOfficialSelectionData as $key => $item) : ?>
							<div class="col-md-4 col-sm-6">
								<div class="film-masonry-item-inner">
									<div class="thumb">
										<a href="films-official-selection-details.php?id=<?= base64_encode($item['mainId']) ?>">
											<img src="record@1357admin/dist/img/<?= $item['image'] ?>" alt="">
										</a>
									</div>
									<div class="info1">
										<div class="title">
											<a href="films-official-selection-details.php?id=<?= base64_encode($item['mainId']) ?>"><?= $item['heading'] ?></a>
										</div>

									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
				<?php foreach ($allofficial_selectionCatData as $key => $item) :
					$official_selectionData = $db->getAllData("SELECT *,official_selection.id mainId FROM official_selection  JOIN official_selection_category ON   official_selection.category = official_selection_category.id WHERE official_selection.category = " . $item['id'] ." AND official_selection.status = 1")
				?>
					<div id="cat_<?= $item['id'] ?>" class="tab-pane fade">
						<div class="row">
							<?php foreach ($official_selectionData as $key => $row) : ?>
								<div class="col-md-4 col-sm-6">
									<div class="film-masonry-item-inner">
										<div class="thumb">
											<a href="films-official-selection-details.php?id=<?= base64_encode($row['mainId']) ?>">
												<img src="record@1357admin/dist/img/<?= $row['image'] ?>" alt="">
											</a>
										</div>
										<div class="info1">
											<div class="title">
												<a href="films-official-selection-details.php?id=<?= base64_encode($row['mainId']) ?>"><?= $row['heading'] ?></a>
											</div>

										</div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endforeach; ?>

			</div>
		</div>
	</div>
</div>
<?php include "globals/footer.php"; ?>