<?php include "globals/header.php";
$blogData = data("blog", $idStatus, 2, $id);
$recentBlog = data("blog", $idStatus, 3, $id, 3);
$bannerData = data("pages_banner", 1, 2, 6);
$is_video = (!empty($blogData['youtube'])) ? 1 : 0;

if ($is_video) {
	$youtubeLink = $blogData['youtube'];
	preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $youtubeLink, $match);
	$youtube_id = $match[1];
}
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
									<li><?= ($blogData['heading']); ?></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
</div>
<div class="section pt-12 pb-12">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="blog-detail">
					<div class="single-post-thumbnail">
					<?php if ($is_video) { ?>
						<div class="youtube-player" id="youtube-player" data-id="<?= $youtube_id; ?>"></div>

						<?php } else { ?>
						<img src="record@1357admin/dist/img/<?= $blogData['image_detail'] ?>" alt="" />
						<?php } ?>
						<div class="list-categories">
						</div>
					</div>
					<h4 class="entry-title"><?= $blogData['heading'] ?></h4>

					<div class="entry-content mb-3">
						<p><?= $blogData['description'] ?></p>
					</div>
				</div>

			</div>
			<div class="col-md-3">
				<div class="sidebar">
					<div class="widget-area">


						<div class="widget widget-film-posts">
							<h3 class="widget-title">Recent Posts</h3>
							<?php foreach ($recentBlog as $key => $item) : ?>
								<div class="item">
									<div class="thumb">
										<img src="record@1357admin/dist/img/<?= $item['image'] ?>" alt="" />
									</div>
									<div class="info">
										<span class="date"><?= date("F d, Y", strtotime($item['created_at'])) ?></span>
										<span class="title">
											<a href="blog-detail.php?id=<?= base64_encode($item['id']) ?>"><?= substr($item['heading'], 0, 20) . "..." ?> </a>
										</span>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
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
			<iframe src="https://www.youtube.com/embed/<?= $youtube_id; ?>" width="500" height="281" allowfullscreen></iframe>
			<button class="md-close">Close me!</button>
		</div>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script>
        document.addEventListener("DOMContentLoaded",
            function () {
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