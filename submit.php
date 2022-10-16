<?php
include "globals/header.php";
$data = $db->getData("SELECT address,phone,email FROM contactus");
$dataVisibleStatus = $db->getData("SELECT contactaddressView address, contactphoneView phone, contactemailView email FROM hfacsettings");
// return print_r($data);
$submit_data = $db->getAllData("SELECT * FROM submit_dynamic");
$bannerData = data("pages_banner", 1, 2, 19);
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
	<?php
	if (isset($_POST) && !empty($_POST)) {
		$array = [
			"name" => $db->addStr($_POST["name"]),
			"mobile" => $db->addStr($_POST["mobile"]),
			"email" => $db->addStr($_POST["email"]),
			"movie" => $db->addStr($_POST["movie"]),
			"duration" => $db->addStr($_POST["duration"]),
			"language" => $db->addStr($_POST["language"]),
			"country" => $db->addStr($_POST["country"]),
			"preview_link" => $db->addStr($_POST["preview_link"]),
			"password" => $db->addStr($_POST["password"]),
			"director" => $db->addStr($_POST["director"]),
			"producer" => $db->addStr($_POST["producer"]),
			"production_company" => $db->addStr($_POST["production_company"]),
			"synopsis" => $db->addStr($_POST["synopsis"]),
		];
		$function->insert($array, "submit");
		echo '<div class="alert alert-success">Yor Query has been submit successfully</div>
	<script>
	alert("Your data has been submitted successfully");
	setTimeout(function () {window.location.href = "submit";}, 2000);</script>';

		// return print_r($_POST);
	}
	?>

	<div class="section pt-12 mb-10">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="contact-info">
						<div class="row">
							<?php foreach ($submit_data as $v) : ?>
								<div class="col-md-4">
									<a href="<?= $v['link_url'] ?>">
										<img src="record@1357admin/dist/img/<?= $v['image'] ?>" alt="small icons">
										<h6><?= $v['heading'] ?></h6>
									</a>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
				<div class="col-md-9">
					<h3 class="section-title bottom-line mb-5">Get In Touch</h3>
					<form method="post" class="contact-form" method="post">
						<div class="row">
							<div class="col-md-4">
								<input type="text" name="name" value="" size="40" class="mb-3" placeholder="Name" required />
							</div>
							<div class="col-md-4">
								<input type="text" name="mobile" value="" size="40" class="mb-3" placeholder="Mobile" required />
							</div>
							<div class="col-md-4">
								<input type="email" name="email" value="" size="40" class="mb-3" placeholder="Email" required />
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<input type="text" name="movie" value="" size="40" class="mb-3" placeholder="movie" required />
							</div>
							<div class="col-md-4">
								<input type="text" name="duration" value="" size="40" class="mb-3" placeholder="duration" required />
							</div>
							<div class="col-md-4">
								<input type="text" name="language" value="" size="40" class="mb-3" placeholder="language" required />
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<input type="text" name="country" value="" size="40" class="mb-3" placeholder="Country" required />
							</div>
							<div class="col-md-4">
								<input type="text" name="preview_link" value="" size="40" class="mb-3" placeholder="Preview Link" required />
							</div>
							<div class="col-md-4">
								<input type="text" name="password " value="" size="40" class="mb-3" placeholder="Password " required />
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<input type="text" name="director" value="" size="40" class="mb-3" placeholder="Director" required />
							</div>
							<div class="col-md-4">
								<input type="text" name="producer" value="" size="40" class="mb-3" placeholder="Producer" required />
							</div>
							<div class="col-md-4">
								<input type="text" name="production_company" value="" size="40" class="mb-3" placeholder="Production Company" required />
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<textarea name="synopsis" cols="40" rows="7" class="mb-3" placeholder="Synopsis"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<input type="submit" value="SEND US NOW" class="button" />
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


</div>
<?php include "globals/footer.php"; ?>