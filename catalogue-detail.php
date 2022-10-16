<?php include "globals/header.php";
$catalogueData = data("catalogue", $idStatus, 2, $id);
$recentcatalogue = data("catalogue", $idStatus, 3, $id, 10);
$bannerData = data("pages_banner", 1, 2, 3);
$is_video = (!empty($catalogueData['youtube'])) ? 1 : 0;
if ($is_video) {
	$youtubeLink = $catalogueData['youtube'];
	preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $youtubeLink, $match);
	$youtube_id = $match[1];
}
?>
<style>
	.page-title {
		background-image: url(record@1357admin/dist/img/<?= $bannerData['banner'] ?>) !important;
	}

	.film-detail-info p {
		margin: 10px;
		margin-bottom: 15px;
	}

	.film-detail-info p strong {
		margin-top: 15px;
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
									<li><?= ($catalogueData['heading']); ?></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<div class="section pt-7 pb-7">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="film-detail-video">
						<?php if ($is_video) { ?>
							<div class="youtube-player" id="youtube-player" data-id="<?= $youtube_id; ?>"></div>
						<?php } else { ?>
							<img src="record@1357admin/dist/img/<?= ($catalogueData['image_detail']) ?>" height="500" width="1170" />
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="section pb-7">
		<div class="container">
			<div class="row">
				<div class="col-sm-9">
					<div class="film-detail-title">
						<h3 class="section-title"> <?= $catalogueData['heading']; ?> </h3>
					</div>

					<div class="film-detail-content">
						<?= $catalogueData['description']; ?>
						<div class="mb-4"></div>
						<img src="record@1357admin/dist/img/<?= $catalogueData['image1']; ?>" alt="img" />
						<div class="mb-4"></div>
						<?= $catalogueData['description2']; ?>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="film-detail-info">
						<?= $catalogueData['menu'] ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="section bg-light pt-7 pb-4">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="section-title fz-24 fw-bolder bottom-line">Recent Projects</h3>
					<div class="relate-film-carousel row mt-5" data-auto-play="true" data-desktop="4" data-laptop="3" data-tablet="3" data-mobile="2">
						<?php foreach ($recentcatalogue as $key => $item) : ?>
							<div class="item">
								<div class="item-inner">
									<div class="thumb">
										<a href="catalogue-detail.php?id=<?= base64_encode($item['id']) ?>">
											<img src="record@1357admin/dist/img/<?= ($item['image']) ?>" alt="" />
										</a>
									</div>
									<div class="info">
										<div class="title">
											<a href="catalogue-detail.php?id=<?= base64_encode($item['id']) ?>"><?= substr($item['heading'], 0, 20) ?></a>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach; ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php if ($is_video) { ?>
	<div class="modals">
		<div class="md-modal md-effect-1" id="modal-1">
			<div class="md-content bg-transparent">
				<iframe src="https://www.youtube.com/embed/<?= $youtube_id; ?>" width="500" height="600" allowfullscreen></iframe>
				<button class="md-close">Close me!</button>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script>
		document.addEventListener("DOMContentLoaded",
			function() {
				var div, n,
					v = document.getElementsByClassName("youtube-player");
				for (n = 0; n < v.length; n++) {
					div = document.createElement("div");
					div.setAttribute("data-id", v[n].dataset.id);
					div.innerHTML = labnolThumb(v[n].dataset.id);
					div.onclick = labnolIframe;
					v[n].appendChild(div);
				}
			});

		function labnolThumb(id) {
			var thumb = '<img src="https://i.ytimg.com/vi/ID/maxresdefault.jpg">',
				play = '<div class="play"></div>';
			return thumb.replace("ID", id) + play;
		}

		function labnolIframe() {
			var iframe = document.createElement("iframe");
			var embed = "https://www.youtube.com/embed/ID?autoplay=1";
			iframe.setAttribute("src", embed.replace("ID", this.dataset.id));
			iframe.setAttribute("frameborder", "0");
			iframe.setAttribute("allowfullscreen", "1");
			iframe.setAttribute("height", "600");
			this.parentNode.replaceChild(iframe, this);
		}
	</script>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery-migrate.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/modernizr-2.7.1.min.js"></script>
	<script type="text/javascript" src="js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="js/imagesloaded.pkgd.min.js"></script>
	<script type="text/javascript" src="js/isotope.pkgd.min.js"></script>
	<script type="text/javascript" src="js/jquery.isotope.init.js"></script>
	<script type="text/javascript" src="js/classie.js"></script>
	<script type="text/javascript" src="js/modalEffects.js"></script>
	<script type="text/javascript" src="js/slick.min.js"></script>
	<script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
<?php } ?>
<?php include "globals/footer.php"; ?>