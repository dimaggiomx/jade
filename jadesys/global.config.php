<?php
	define('C_MAINDIR', $_SERVER ['DOCUMENT_ROOT'].$directory);
	
	//Para definir
	define('C_WWW', 'http://localhost/');
	define('C_SITEFOLDER','jade/jadesys');
	define('C_DOMAIN', C_WWW.C_SITEFOLDER.'/');
	define('C_SITE_MAINDIR', C_MAINDIR.'/'.C_SITEFOLDER.'/');
	define('C_SITE_COMPLETE', C_MAINDIR.'/');
	define('C_P_FOLDERNAME', C_SITEFOLDER);
	
	// defino constantes a usar durant todo el sistema
	define('C_P_CLASES', C_SITE_MAINDIR.'config/');
	define('C_P_DB', C_SITE_MAINDIR.'config.php');
	define('C_P_FOTOS', C_SITE_MAINDIR.'fotos/');
	
	define('C_P_GALERIA', C_WWW.C_SITEFOLDER.'/tgalerias/');
	define('C_P_TITLE', 'Jade Capital Flow System');



$login_redirect = "login.html"; // page to directed to when logged in
$logout_redirect = "out.php"; // redirect to your own logout page.

    //$AMBIENTE = 'PRO';
    //$AMBIENTE = 'DES';


?>