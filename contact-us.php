<?php
	include "globals/header.php";
	$data = $db->getData("SELECT address,phone,email FROM contactus");
	$dataVisibleStatus = $db->getData("SELECT contactaddressView address, contactphoneView phone, contactemailView email FROM hfacsettings");
	// return print_r($data);
	$bannerData = data("pages_banner",1,2,8);
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
	<?php
	if (isset($_POST) && !empty($_POST)) {
		$array = [
			"name" => $db->addStr($_POST["name"]),
			"mobile" => $db->addStr($_POST["mobile"]),
			"email" => $db->addStr($_POST["email"]),
			"message" => $db->addStr($_POST["message"]),
		];
		$function->insert($array, "queries");
		echo '<div class="alert alert-success">Yor Query has been submit successfully</div>
	<script>setTimeout(function () {window.location.href = "contact-us";}, 2000);</script>';

		// return print_r($_POST);
	}
	?>
	
	<div class="section pt-12 mb-10">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="contact-info">
						<?php foreach ($data as $key => $item):
						 if($dataVisibleStatus[$key]): ?>
						<div class="icon-boxes">
							<div class="icon-boxes-inner">
								<h5 class="icon-boxes-title"> <?= ($key) ?></h5>
								<div class="icon-boxes-content">
								<?= $item ?>
								</div>
							</div>
						</div>
						<?php endif; endforeach;?>

						
						
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
							<div class="col-md-12">
								<textarea name="message" cols="40" rows="7" class="mb-3" placeholder="Message"></textarea>
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