<?php include "globals/header.php";
$bannerData = data("banner");
$bannerSocialData = data("dynamic");
$section2Data = data("home_section2", 1, 2, 1);
$section3Data = data("home_section3", 1, 2, 1);
$section4Data = data("home_section4", 1, 2, 1);
$section5Data = data("home_section5");
$section6Data = data("home_section6");
$section7Data = data("home_section7", 1, 2, 1);
$filmData = data("project", 1, 3, 1, 6);
$serviceData = data("service", 1, 3, 1, 3);
$blogData = data("blog", 1, 3, 1, 3);
if (isset($_POST["email"])) {
  $function->insert2($_POST, "home_section8");
  echo "<script>alert('your data has been submitted successfully');
  location.href='index.php';</script>";
}
// print_r($bannerSocialData);
$sicialLinkBannerCount = count($bannerData) - 1;

?>
<div id="main">
  <!-- SECTION 1 -->
  <div class="section">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12 p-0">
          <div id="rev_slider" class="rev_slider fullscreenbanner">
            <ul>
              <?php foreach ($bannerData as $key => $item) : ?>
                <li data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-rotate="0" data-saveperformance="off" data-title="Slide">
                  <img src="record@1357admin/dist/img//banner/<?= $item['image'] ?>" alt="<?= $item['image_alt'] ?>" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" />
                  <div class="tp-caption tp-resizeme mer-34-400" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['-46','-46','-46','-46']" data-fontsize="['34','34','34','24']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"delay":0,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">
                    <?= $item['title'] ?> </div>
                  <div class="tp-caption tp-resizeme mon-64-700" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['70','70','70','70']" data-fontsize="['64','64','50','30']" data-lineheight="['64','64','50','30']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"delay":0,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">
                    <?= $item['bannertext'] ?> </div>
                </li>
              <?php endforeach; ?>
            </ul>
            <div class="tp-static-layers">
              <div class="tp-caption tp-resizeme tp-static-layer tp-static-layer-1" 
              data-x="['left','left','left','left']" data-hoffset="['15','15','15','0']" 
              data-y="['middle','middle','middle','top']" data-voffset="['-66','-66','-66','100']" data-width="none"
               data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" 
               data-startslide="0" data-endslide="<?= $sicialLinkBannerCount; ?>" 
               data-frames='[{"delay":0,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;rZ:270;tO:0% 0%;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']"
                data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">Follow Us </div>
              <div class="tp-caption tp-shape tp-shapewrapper tp-resizeme tp-static-layer"
               data-x="['left','left','left','left']" data-hoffset="['20','20','20','8']" data-y="['middle','middle','middle','top']" 
               data-voffset="['0','0','0','120']" data-width="1" data-height="60" data-whitespace="nowrap" data-type="shape"
                data-responsive_offset="on" data-startslide="0" data-endslide="<?= $sicialLinkBannerCount; ?>"
                 data-frames='[{"delay":0,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' 
                 data-textAlign="['inherit','inherit','inherit','inherit']"
                  data-paddingtop="[0,0,0,0]" 
                  data-paddingright="[0,0,0,0]"
                   data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"></div>
              
              <div class="tp-caption primary-color-hover tp-static-layer tp-icon" data-x="['left','left','left','left']"
               data-hoffset="['0','0','0','-20']" data-y="['middle','middle','middle','top']" data-voffset="['90','90','90','200']" 
               data-width="37" data-height="37" data-whitespace="nowrap" data-type="button" data-responsive_offset="on" data-responsive="off"
                data-startslide="0" data-endslide="<?= $sicialLinkBannerCount; ?>"
                 data-frames='[{"delay":0,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">


                <a href="<?= $bannerSocialData[3]['section1'] ?>" class="icon-af">
                  <i class="fa fa-facebook"></i>
                </a>
              </div>

              <div class="tp-caption primary-color-hover tp-static-layer tp-icon"
               data-x="['left','left','left','left']" data-hoffset="['0','0','0','-20']"
                data-y="['middle','middle','middle','top']"
                 data-voffset="['140','140','140','250']" 
                 data-width="37"
                  data-height="37" 
                  data-whitespace="nowrap"
                   data-type="button"
                    data-responsive_offset="on" data-responsive="off" data-startslide="0"
                     data-endslide="<?= $sicialLinkBannerCount; ?>" 
                     data-frames='[{"delay":0,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">
                <a href="<?= $bannerSocialData[2]['section1'] ?>" class="icon-af">
                  <i class="fa fa-twitter"></i>
                </a>
              </div>
              <div class="tp-caption primary-color-hover tp-static-layer tp-icon" data-x="['left','left','left','left']" data-hoffset="['0','0','0','-20']" 
              data-y="['middle','middle','middle','top']" data-voffset="['190','190','190','300']" data-width="37" data-height="37" data-whitespace="nowrap" 
              data-type="button" data-responsive_offset="on" data-responsive="off" data-startslide="0" data-endslide="<?= $sicialLinkBannerCount; ?>"
               data-frames='[{"delay":0,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">

                <a href="<?= $bannerSocialData[1]['section1'] ?>" class="icon-af">
                  <i class="fa fa-instagram"></i>
                </a>
              </div>
              <div class="tp-caption primary-color-hover tp-static-layer tp-icon" data-x="['left','left','left','left']" data-hoffset="['0','0','0','-20']"
               data-y="['middle','middle','middle','top']" data-voffset="['240','240','240','350']" data-width="37" data-height="37" data-whitespace="nowrap"
                data-type="button" data-responsive_offset="on" data-responsive="off" data-startslide="0" data-endslide="<?= $sicialLinkBannerCount; ?>"
                 data-frames='[{"delay":0,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">


                <a href="https://api.whatsapp.com/send/?phone=91<?= $bannerSocialData[0]['section1'] ?>" class="icon-af">
                  <i class="fa fa-whatsapp"></i>
                </a>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- SECTION 2 -->
  <div class="section pt-12 pb-9">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
        </div>
        <div class="col-sm-12">
          <div class="mt-8"></div>
        </div>
        <div class="col-md-6">
          <div class="floating text-center-sm"> <img src="record@1357admin/dist/img/<?= $section2Data['image'] ?>" alt="<?= $section2Data['imageAlt'] ?>" /> </div>
        </div>
        <div class="col-md-6">
          <div class="text-center-sm">
            <h2 class="section-title mb-4"><?= $section2Data['heading'] ?></h2>
            <p> <?= $section2Data['description'] ?> </p>
            <div class="mt-4"></div>
            <a href="contact-us" target="_self" class="button"><?= $section2Data['button_text'] ?></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- SECTION 4 -->
  <div class="section pt-14 pb-8">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="text-center">
            <h3 class="sub-title primary-color"><?= $section4Data['title'] ?></h3>
            <h2 class="section-title mb-2"><?= $section4Data['heading'] ?></h2>
            <p class="mb-4"><?= $section4Data['description'] ?></p>
          </div>
        </div>
      </div>
      <div class="row">
        <?php foreach ($serviceData as $key => $item) : ?>
          <div class="col-md-4">
            <div class="icon-boxes icon-boxes-bg text-center">
              <div class="icon-boxes-icon" data-bg-image="record@1357admin/dist/img/<?= $item['image']; ?>"> </div>
              <div class="icon-boxes-inner">
                <h5 class="icon-boxes-title"><?= $item['heading'] ?></h5>
                <div class="icon-boxes-content"> <?= $item['short_description'] ?> </div>
                <div class="icon-boxes-link"> <a href="our-services"><span class="ion-android-arrow-forward"></span></a> </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>

      </div>
    </div>
  </div>

  <!-- SECTION 5 -->
  <div class="section pt-7 pb-8">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="testimonial-carousel style-1" data-auto-play="true" data-desktop="1" data-laptop="1" data-tablet="1" data-mobile="1">
            <?php foreach ($section5Data as $key => $item) : ?>
              <div class="item">
                <div class="photo"> <img src="record@1357admin/dist/img/<?= $item['image'] ?>" alt="<?= $item['imageAlt'] ?>" /> </div>
                <h4 class="title"><?= $item['heading'] ?></h4>
                <div class="text"> <?= $item['description'] ?> </div>
                <div class="info">
                </div>
              </div>
            <?php endforeach; ?>

          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- SECTION 6 -->
  <div class="section pb-5">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <hr class="mb-5" />
          <div class="logo-carousel" data-auto-play="true" data-desktop="5" data-laptop="3" data-tablet="3" data-mobile="2">
            <?php foreach ($section6Data as $key => $item) : ?>
              <div class="logo-item"> <img src="record@1357admin/dist/img/<?= $item['image'] ?>" alt="<?= $item['imageAlt'] ?>" /> </div>
            <?php endforeach; ?>

          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- SECTION 7 -->
  <div class="section bg-light pt-10 pb-10">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="text-center mb-7">
            <h3 class="sub-title primary-color"> <?= $section7Data['title'] ?></h3>
            <h2 class="section-title mb-2"><?= $section7Data['heading'] ?></h2>
          </div>
        </div>
      </div>
      <div class="row">
        <?php foreach ($blogData as $key => $item) : ?>
          <div class="col-md-4 col-sm-6">
            <div class="blog-item style-1">
              <div class="blog-item-inner">
                <div class="blog-thumbnail"> <a href="blog-detail.php?id=<?= base64_encode($item['id']) ?>"> <img src="record@1357admin/dist/img/<?= $item['image'] ?>" /> </a> </div>
                <div class="blog-info"> <span class="blog-info-date"> <span class="posted-on"><?= date("F d, Y", strtotime($item['created_at'])) ?></span> </span>
                  <a href="blog-detail.php?id=<?= base64_encode($item['id']) ?>" class="blog-info-title"> <?= $item['heading'] ?></a>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>

      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="text-center mt-4"> <a href="blogs" class="button-2"><?= $section7Data['description'] ?></a> </div>
        </div>
      </div>
    </div>
  </div>

  <!-- SECTION 8 -->
  <div class="section section-bg-3 section-cover footer-newsletter style-1 pt-11 pb-8">
    <div class="container">
      <div class="row">
        <div class="col-md-1">&nbsp;</div>
        <div class="col-md-4">
          <div class="footer-newsletter-left">Subscribe to our Newsletter</div>
        </div>
        <div class="col-md-6">
          <div class="footer-newsletter-right">
            <form method="post">
              <div class="form-fields">
                <div class="form">
                  <input type="email" name="email" placeholder="Enter your e-mail" />
                  <input type="submit" value="Submit" />
                </div>
                <p class="note">Note* : Spectators are our passion. Creation is our core.</p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include "globals/footer.php"; ?>