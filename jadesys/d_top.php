<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 17/06/17
 * Time: 10:40
 */
$profile = 'profile_';
if($_SESSION["ses_priv"] == 'B')  //Inversionista
{
    // perfil
    $profile .= 'tinversionistas.php';
}elseif($_SESSION["ses_priv"] == 'C') // Empresa
{
    $profile .= 'tempresas.php';
}elseif($_SESSION["ses_priv"] == 'A') // JADE user
{
    $profile .= 'tadmin.php';
}
?>
<ul class="nav navbar-top-links navbar-right pull-right">
    <li class="dropdown"> <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><i class="icon-envelope"></i>
            <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
        </a>
        <ul class="dropdown-menu mailbox animated bounceInDown">
            <li>
                <div class="drop-title">You have 0 new messages</div>
            </li>
            <li>
                <div class="message-center"> <a href="#">
                        <!--div class="user-img"> <img src="../plugins/images/users/pawandeep.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                        <div class="mail-contnet">
                            <h5>Empresa 1</h5>
                            <span class="mail-desc">Registro un nuevo proyecto!</span> <span class="time">9:30 AM</span> </div>
                    </a> <a href="#">
                        <div class="user-img"> <img src="../plugins/images/users/sonu.jpg" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                        <div class="mail-contnet">
                            <h5>Empresa 2</h5>
                            <span class="mail-desc">Se registro una nueva empresa</span> <span class="time">9:10 AM</span> </div>
                    </a> <a href="#">
                        <div class="user-img"> <img src="../plugins/images/users/arijit.jpg" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>
                        <div class="mail-contnet">
                            <h5>Empresa 3</h5>
                            <span class="mail-desc">Inicio una subasta!</span> <span class="time">9:08 AM</span> </div>
                    </a> <a href="#">
                        <div class="user-img"> <img src="../plugins/images/users/pawandeep.jpg" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
                        <div class="mail-contnet">
                            <h5>Empresa 4</h5>
                            <span class="mail-desc">Subastas proximas a vencer!</span> <span class="time">9:02 AM</span> </div-->
                    </a> </div>
            </li>
            <li> <a class="text-center" href="inbox.php"> <strong>See all notifications</strong> <i class="fa fa-angle-right"></i> </a></li>
        </ul>
        <!-- /.dropdown-messages -->
    </li>
    <!-- /.dropdown -->

    <!-- /.dropdown -->
    <li class="dropdown"> <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="../plugins/images/users/varun.jpg" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><?php echo $_SESSION['ses_name']; ?></b> </a>
        <ul class="dropdown-menu dropdown-user animated flipInY">
            <?php if($_SESSION["ses_p_1"] == 1){ ?><li><a href="<?php echo $profile; ?>"><i class="ti-user"></i> My Profile</a></li><?php } ?>
            <?php if($_SESSION["ses_p_2"] == 1){ ?><li><a href="inbox.php"><i class="ti-email"></i> Inbox</a></li><?php } ?>
            <li role="separator" class="divider"></li>
            <?php if($_SESSION["ses_p_3"] == 1){ ?><li><a href="configuration.php"><i class="ti-settings"></i> Account Setting</a></li><?php } ?>
            <li role="separator" class="divider"></li>
            <?php if($_SESSION["ses_p_4"] == 1){ ?><li><a href="out.php"><i class="fa fa-power-off"></i> Logout</a></li><?php } ?>
        </ul>
        <!-- /.dropdown-user -->
    </li>
    <li class="right-side-toggle"> <a class="waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li>
    <!-- /.dropdown -->
</ul>
