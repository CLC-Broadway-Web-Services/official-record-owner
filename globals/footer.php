<?php
$footer = data("footer", 1, 4);
// return print_r($footer);
// die();
?>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <?php if ($footer[1]['status']) : ?>
                    <a href="index.php" id="footer_logo">
                        <img class="footer-logo-image" src="record@1357admin/dist/img/<?= $footer[1]['name'] ?>" alt="RECORD media" /></a>
                <?php endif; ?>
                <div class="footer-social"> 
                <?php if($footer[9]['status']):  ?><a data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook" href="<?= $footer[9]['name'];  ?>"><i class="fa fa-facebook"></i></a> <?php endif; ?>
               <?php if($footer[8]['status']):  ?> <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter" href="<?= $footer[8]['name']  ?>"><i class="fa fa-twitter"></i></a> <?php endif; ?>
                <?php if($footer[7]['status']):  ?> <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Whatsapp" href="https://api.whatsapp.com/send/?phone=91<?=  $footer[7]['name'] ?>"><i class="fa fa-whatsapp"></i></a><?php endif; ?>
                 <?php if($footer[6]['status']):  ?><a data-toggle="tooltip" data-placement="top" title="" data-original-title="Instagram" href="<?=  $footer[6]['name']  ?>"><i class="fa fa-instagram"></i></a><?php endif; ?>
                </div>
            </div>


            <div class="col-md-4" style="float: right;">
                <div class="widget">
                    <h3 class="widget-title"><?= $footer[5]['status'] ? $footer[5]['name'] : null ?></h3>
                    <div class="textwidget">
                        <p><?= $footer[4]['status'] ? "Address: ".$footer[4]['name'] : null ?></p>
                        <p><?= $footer[3]['status'] ? "Phone: ".$footer[3]['name'] : null ?></p>
                        <p><a href="mailto:<?= $footer[2]['status'] ? $footer[2]['name'] : null ?>"><?= $footer[2]['status'] ? "Email: ".$footer[2]['name'] : null ?></a></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</footer>
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="copyright-container">
                <div class="col-md-6 p-0">
                    <div class="copyright-left"> <?= $footer[0]['status'] ? $footer[0]['name'] : null ?></div>
                </div>
                <!-- <div class="col-md-6 p-0">
                    <div class="copyright-right">
                        <ul>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Term And Conditions</a></li>
                        </ul>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>
</div>
<div class="modals">
    <div class="md-modal md-effect-1" id="modal-1">
        <div class="md-content bg-transparent">
            <iframe src="../../player.vimeo.com/video/177252412.php" width="500" height="281" allowfullscreen></iframe>
            <button class="md-close">Close me!</button>
        </div>
    </div>
</div>
<div class="md-overlay"></div>
<!-- the overlay element -->

<a class="backtotop" id="backtotop"><i class="ion-android-arrow-up"></i></a>
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
<script type="text/javascript" src="js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="js/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="js/extensions/revolution.extension.video.min.js"></script>
<script type="text/javascript" src="js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="js/extensions/revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="js/extensions/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript" src="js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="js/extensions/revolution.extension.migration.min.js"></script>
<script type="text/javascript" src="js/extensions/revolution.extension.parallax.min.js"></script>
</body>

</html>