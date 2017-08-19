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
}elseif($_SESSION["ses_priv"] == 'D') // JADE user
{
    $profile .= 'tjade.php';
}elseif($_SESSION["ses_priv"] == 'E') // JADE user
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
            <?php if($_SESSION["ses_p_1"] == 1){ ?><li><a href="<?php echo $profile; ?>"><i class="ti-user"></i> Mi Perfil</a></li><?php } ?>
            <?php if($_SESSION["ses_p_2"] == 1){ ?><li><a href="inbox.php"><i class="ti-email"></i> Inbox</a></li><?php } ?>
            <?php if($_SESSION["ses_p_3"] == 1){ ?><li><a href="configuration.php"><i class="ti-settings"></i> Cuenta</a></li><?php } ?>
            <?php if($_SESSION["ses_p_4"] == 1){ ?><li><a href="out.php"><i class="fa fa-power-off"></i> Salir</a></li><?php } ?>
        </ul>
    </li>
    <li class="nav-small-cap m-t-10">--- Main Menu</li>
    <?php if($_SESSION["ses_p_5"] == 1){ ?><li> <a href="desktop.php" class="waves-effect"><i data-icon="P" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Escritorio</span></a> </li><?php } ?>
    <?php if($_SESSION["ses_p_6"] == 1){ ?><li> <a href="market2.php" class="waves-effect"><i data-icon="P" class="fa fa-shopping-bag"></i> <span class="hide-menu">Market</span></a> </li><?php } ?>


    <?php if($_SESSION["ses_p_7"] == 1){ ?>
        <li> <a href="#" class="waves-effect active"><i class="fa fa-product-hunt" data-icon="v"></i> <span class="hide-menu"> Proyectos <span class="fa arrow"></span></span></a>
            <ul class="nav nav-second-level">
                <?php if($_SESSION["ses_p_8"] == 1){ ?><li> <a href="step_project.php">Nuevo</a> </li><?php } ?>
                <?php if($_SESSION["ses_p_9"] == 1){ ?><li> <a href="search_proyectos.php">Consultar</a> </li><?php } ?>
                <?php if($_SESSION["ses_p_27"] == 1){ ?><li> <a href="JD-sproyectos.php">Consultar</a> </li><?php } ?>
            </ul>
        </li>
    <?php } ?>

    <?php if($_SESSION["ses_p_10"] == 1){ ?>
        <li> <a href="#" class="waves-effect active"><i class="linea-icon linea-basic fa-fw" data-icon="v"></i> <span class="hide-menu"> Subastas <span class="fa arrow"></span></span></a>
            <ul class="nav nav-second-level">
                <?php if($_SESSION["ses_p_11"] == 1){ ?><li> <a href="step_subastas.php">Nuevo</a> </li><?php } ?>
                <?php if($_SESSION["ses_p_12"] == 1){ ?><li> <a href="search_subasta.php">Consultar</a> </li><?php } ?>
            </ul>
        </li>
    <?php } ?>

    <?php if($_SESSION["ses_p_13"] == 1){ ?><li> <a href="inversiones.php" class="waves-effect"><i data-icon="P" class="fa fa-money"></i> <span class="hide-menu">Inversiones</span></a> </li><?php } ?>
    <?php if($_SESSION["ses_p_14"] == 1){ ?><li> <a href="favoritos.php" class="waves-effect"><i data-icon="P" class="fa fa-star"></i> <span class="hide-menu">Favoritos</span></a> </li><?php } ?>

    <li class="nav-small-cap">--- Soporte</li>
    <li><a href="documentation.php" class="waves-effect"><i class="fa fa-circle-o text-danger"></i> <span class="hide-menu">Documentacion</span></a></li>
    <li><a href="faq.php" class="waves-effect"><i class="fa fa-circle-o text-success"></i> <span class="hide-menu">Faqs</span></a></li>
</ul>
