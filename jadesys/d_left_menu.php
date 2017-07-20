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
<ul class="nav" id="side-menu">
    <li class="sidebar-search hidden-sm hidden-md hidden-lg">
        <!-- input-group -->
        <div class="input-group custom-search-form">
            <input type="text" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
            <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
            </span> </div>
        <!-- /input-group -->
    </li>
    <li class="user-pro"> <a href="#" class="waves-effect"><img src="../plugins/images/users/varun.jpg" alt="user-img"  class="img-circle"> <span class="hide-menu"><?php echo $_SESSION['ses_usr']; ?><span class="fa arrow"></span></span></a>
        <ul class="nav nav-second-level">
            <li><a href="<?php echo $profile; ?>"><i class="ti-user"></i> Mi Perfil</a></li>
            <!--li><a href="javascript:void(0)"><i class="ti-wallet"></i> Mi Balance</a></li-->
            <li><a href="inbox.php"><i class="ti-email"></i> Inbox</a></li>
            <li><a href="configuration.php"><i class="ti-settings"></i> Cuenta</a></li>
            <li><a href="out.php"><i class="fa fa-power-off"></i> Salir</a></li>
        </ul>
    </li>
    <li class="nav-small-cap m-t-10">--- Main Menu</li>
    <li> <a href="#" class="waves-effect active"><i class="linea-icon linea-basic fa-fw" data-icon="v"></i> <span class="hide-menu"> Escritorio <span class="fa arrow"></span> <span class="label label-rouded label-custom pull-right">4</span></span></a>
        <ul class="nav nav-second-level">
            <li> <a href="market2.php">Market</a> </li>
            <?php if($_SESSION["ses_priv"] == 'C'){ ?>
            <li> <a href="step_project.php">Proyectos</a> </li>
            <li> <a href="step_subastas.php">Subastas</a> </li>
            <?php } ?>
            <li> <a href="documents.php">Documentos</a> </li>
        </ul>
    </li>
    <li class="nav-small-cap">--- Soporte</li>
    <li><a href="documentation.php" class="waves-effect"><i class="fa fa-circle-o text-danger"></i> <span class="hide-menu">Documentacion</span></a></li>
    <li><a href="faq.php" class="waves-effect"><i class="fa fa-circle-o text-success"></i> <span class="hide-menu">Faqs</span></a></li>
</ul>
