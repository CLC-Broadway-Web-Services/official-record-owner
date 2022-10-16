<?php include "globals/header.php";
$dataArray = [
	"name",
	"email",
	"phone",
	"qualification",
	"interest",
	"office_preference",
	"current_organisation",
	"cv",
];
$bannerData = data("pages_banner", 1, 2, 7);
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
	<?php if (isset($_POST) && !empty($_POST)) {
		$file = time() . "-" . $_FILES[$dataArray[7]]['name'];
		move_uploaded_file($_FILES[$dataArray[7]]['tmp_name'], "record@1357admin/dist/img/career/" . $file);
		$_POST[$dataArray[7]] = $file;
		$function->insert2($_POST, "career");

		echo '<div class="alert alert-success">your data has been submitted successfully</div>
	<script>
	alert("your data has been recorded successfully");
	setTimeout(function () {window.location.href = "career";}, 2000);</script>';
	} ?>
	<div class="section pt-12 mb-10">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 class="section-title bottom-line mb-5">Application Form</h3>
				</div>
				<div class="col-md-9">
					<form method="post" class="contact-form" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-12">
								<input type="text" name="<?= $dataArray[0] ?>" value="" size="40" class="mb-3" placeholder="Name" required />
							</div>

							<div class="col-md-12">
								<input type="email" name="<?= $dataArray[1] ?>" value="" size="40" class="mb-3" placeholder="Email" required />
							</div>



							<div class="col-md-12">
								<input type="text" name="<?= $dataArray[2] ?>" value="" size="40" class="mb-3" placeholder="Phone" required />
							</div>


							<div class="col-md-12">
								<input type="text" name="<?= $dataArray[3] ?>" value="" size="40" class="mb-3" placeholder="Academic  qualification" required />
							</div>



							<div class="col-md-12">
								<input type="text" name="<?= $dataArray[4] ?>" value="" size="40" class="mb-3" placeholder="Area Of Interest" required />
							</div>




							<div class="col-md-12">
								<input type="text" name="<?= $dataArray[5] ?>" value="" size="40" class="mb-3" placeholder="Office (City) Preference" required />
							</div>


							<div class="col-md-12">
								<input type="text" name="<?= $dataArray[6] ?>" value="" size="40" class="mb-3" placeholder="Current Organization" />
							</div>


							<div class="col-md-12">
								<div class="single-input-field">

									<p class="upload"> <a href="#"></a>
										<input type="file" name="<?= $dataArray[7] ?>" size="40" class="wpcf7-form-control wpcf7-file wpcf7-validates-as-required" accept=".jpg,.jpeg,.png,.gif,.pdf,.doc,.docx,.ppt,.pptx,.odt,.avi,.ogg,.m4a,.mov,.mp3,.mp4,.mpg,.wav,.wmv" aria-required="true" aria-invalid="false"><small>Upload CV</small>
									</p>

								</div>
							</div>

						</div>
						<div class="row">

						</div>
						<div class="row">
							<div class="col-md-12">
								<input type="submit" class="button" />
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


</div>
<?php include "globals/footer.php"; ?>