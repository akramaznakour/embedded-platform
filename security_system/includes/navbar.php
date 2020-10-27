<section class="menu cid-qJ62CWkWFP" once="menu" id="menu2-j">

    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-toggleable-sm bg-color "
         style="background-color: <?php if ($database->getSecuritySystem()->getAlarmStatus() == "True") echo "#BA0000"; else echo "#1ABB9C" ?>">
        <div class="navbar-buttons mbr-section-btn">

            </a> <a class="btn btn-sm btn-white-outline display-4" href="../">
        <span class="mbri-home mbr-iconfont mbr-iconfont-btn">
        </span>home
            </a></div>

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
        <div class="menu-logo">
            <div class="navbar-brand">


            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <div class="navbar-buttons mbr-section-btn">
                <a class="btn btn-sm btn-white-outline display-4" href="./logout.php">
        <span class="mbri-login mbr-iconfont mbr-iconfont-btn">
        </span>logout
                </a> <a class="btn btn-sm btn-white-outline display-4" href="./settings.php">
        <span class="mbri-setting mbr-iconfont mbr-iconfont-btn">
        </span>settings
                </a>
            </div>
        </div>
    </nav>
</section>