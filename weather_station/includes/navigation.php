<div class="top_nav">
    <div class="nav_menu" style="height: 50px">
        <nav class="nav_menu" style="height: 50px">


            <ul class="nav navbar-nav navbar-left">
                <a href="../"
                   style="height : 50px ;padding: 15px 25px"
                   class=" pull-left">
                    <span class="badge bg-green">HOME <i class="fa fa-home "></i></span>
                </a>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                <?php if (isset($_SESSION['auth']) && $_SESSION['auth'] == 'auth') { ?>
                    <li>
                        <a href="#" data-toggle="dropdown" role="button" class="hidden-xs  "
                           aria-expanded="false" aria-haspopup="true" style="height : 50px;padding: 10px 20px">
                                <span class="badge bg-green"> <?php echo $_SESSION['name'] ?> <i
                                            class="fa fa-user "></i></span>
                            <span class="caret"></span>
                        </a>
                        <a href="#" data-toggle="dropdown" role="button" class="hidden-lg hidden-sm hidden-md "
                           aria-expanded="false" aria-haspopup="true"
                           style="height : 48px;padding-bottom: 0px;margin-top: -65px ; ">
                                <span class="badge bg-green"> <?php echo $_SESSION['name'] ?> <i
                                            class="fa fa-user "></i></span>
                            <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="logout.php"">
                                Logout
                                </a>
                            </li>
                            <li><a href="settings.php">Settings</a></li>
                        </ul>
                    </li>


                <?php } else { ?>

                    <a href="login.php" style="height : 50px ;padding: 15px 25px"
                       class="dropdown-toggle pull-right hidden-xs  ">
                        <span class="badge bg-green">LOGIN <i class="fa fa-user "></i></span>
                    </a>
                    <a href="login.php"
                       class="dropdown-toggle pull-right hidden-lg hidden-sm hidden-md"
                       style="height : 48px;padding: 22px 10px;margin-top: -65px ; ">
                        <span class="badge bg-green"> LOGIN <i class="fa fa-user "></i></span>
                    </a>


                <?php } ?>


            </ul>
        </nav>
    </div>
</div>
