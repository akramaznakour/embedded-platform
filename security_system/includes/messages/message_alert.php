<div class="container">
    <div class="media-container-row">
        <div class="mbr-figure" style="width: 135%;">
            <img src="capture/<?php echo $database->getLastPictures()->getId(); ?>.jpg">
        </div>


        <div class="media-content">
            <h1 class="mbr-section-title mbr-white pb-3 mbr-fonts-style display-1">ALERT&nbsp;</h1>
            <h3 class="mbr-section-subtitle align-left mbr-white mbr-light pb-3 mbr-fonts-style display-2">A motion
                was detected !!!</h3>
            <div class="mbr-section-text mbr-white pb-3 ">
                <p class="mbr-text mbr-fonts-style display-5">A motion was detected in the picture taken at :<br>

                    <?php echo $database->getLastPictures()->getTime(); ?>

                </p>


            </div>

            <!-- Trigger the modal with a button -->
            <div class="mbr-section-btn">
                <a data-toggle="modal" data-target="#myModal"
                   class="btn btn-md btn-white-outline display-7">TURN OFF THE ALARM</a>
            </div>
            <?php if (isset($_SESSION["falsh_error"]) && $_SESSION["falsh_error"]) {
                include './includes/messages/flash_incorrect_password.php';
            } ?>
            <?php include 'includes/messages/modal.php' ?>
        </div>
    </div>


</div>
</div>

