<section class="header3
<?php if ($database->getSecuritySystem()->getAlarmStatus() == "True") echo "cid-qJ61pe0d3Z"; else echo " cid-qJ62AsM9se"; ?>"
         id="header3-i">

    <?php
    if ($database->getSecuritySystem()->getAlarmStatus() == "True")
        include 'includes/messages/message_alert.php';
    else
        include 'includes/messages/message_normal.php';
    ?>

</section>