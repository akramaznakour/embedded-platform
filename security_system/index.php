<?php
session_start();
require '../dataBase/Database.php';
$database = new Database();

if (!isset($_SESSION['auth']) && !$_SESSION['auth'] == 'true')
    header('location:login.php');
?>

<!DOCTYPE html>
<html>

<?php include 'includes/head.php' ?>

<body>

<?php include 'includes/navbar.php' ?>

<?php include 'includes/header.php' ?>

<section class="mbr-gallery mbr-slider-carousel
<?php if ($database->getSecuritySystem()->getAlarmStatus() == "True") echo " cid-qJ61rEtADM"; else echo "cid-qJ62zNBmOk"; ?>

" id="gallery1-h">


    <div class="container">
        <div><!-- Filter --><!-- Gallery -->
            <div class="mbr-gallery-row">
                <div class="mbr-gallery-layout-default">
                    <div>
                        <div>
                            <?php foreach ($database->getAllPictures() as $picture) { ?>
                                <div class="mbr-gallery-item mbr-gallery-item--p1" data-video-url="false"
                                     data-tags="Awesome">
                                    <div href="#lb-gallery1-h" data-slide-to="<?php echo $picture->getId(); ?>"
                                         data-toggle="modal"><img
                                                src="capture/<?php echo $picture->getId(); ?>.jpg " alt=""><span
                                                class="icon-focus"></span><span
                                                class="mbr-gallery-title mbr-fonts-style display-7"><?php echo $picture->getTime(); ?></span>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div><!-- Lightbox -->
            <div data-app-prevent-settings="" class="mbr-slider modal fade carousel slide" tabindex="-1"
                 data-keyboard="true" data-interval="false" id="lb-gallery1-h">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <ol class="carousel-indicators">

                                <?php $i = 0;
                                foreach ($database->getAllPictures() as $picture) { ?>

                                    <li data-app-prevent-settings="" data-target="#lb-gallery1-h"
                                        <?php if (++$i == 1) { ?> class=" active" <?php } ?>
                                        data-slide-to="<?php echo $picture->getId(); ?>"></li>
                                <?php } ?>
                            </ol>
                            <div class="carousel-inner">
                                <?php $i = 0;
                                foreach ($database->getAllPictures() as $picture) { ?>

                                    <div class="carousel-item <?php if (++$i == 1) { ?>   active  <?php } ?>"><img
                                                src="capture/<?php echo $picture->getId(); ?>.jpg" alt=""></div>

                                <?php } ?>
                            </div>
                            <a class="carousel-control carousel-control-prev" role="button" data-slide="prev"
                               href="#lb-gallery1-h"><span class="mbri-left mbr-iconfont"
                                                           aria-hidden="true"></span><span
                                        class="sr-only">Previous</span></a><a
                                    class="carousel-control carousel-control-next" role="button" data-slide="next"
                                    href="#lb-gallery1-h"><span class="mbri-right mbr-iconfont"
                                                                aria-hidden="true"></span><span
                                        class="sr-only">Next</span></a><a class="close" href="#" role="button"
                                                                          data-dismiss="modal"><span class="sr-only">Close</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>


<?php include 'includes/scripts.php' ?>

</body>
</html>