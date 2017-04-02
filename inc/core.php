<?php

@session_start();
define("Plux", TRUE);
define("DR", $_SERVER['DOCUMENT_ROOT']);
define('CHARSET','UTF-8');
@header('Content-type: text/html; charset='.CHARSET);
ini_set('display_errors', 0);

require_once("ajustes.php");

$H = date('H');
$i = date('i');
$s = date('s');
$m = date('m');
$d = date('d');
$Y = date('Y');
$j = date('j');
$n = date('n');
$today = $d;
$month = $m;
$year = $Y;
$getmoney_date = date('d/m/Y',mktime($m,$d,$Y));
$birthday_date = date('d/m', mktime($m,$d));
$date_normal = date('d/m/Y',mktime($m,$d,$Y));
$date_full = date('d/m/Y H:i:s',mktime($H,$i,$s,$m,$d,$Y));

function SacarIP() {
	if($_SERVER) {
		if($_SERVER["HTTP_X_FORWARDED_FOR"]) {
		$realip = $_SERVER["HTTP_X_FORWARDED_FOR"];
		} elseif ($_SERVER["HTTP_CLIENT_IP"]) {
		$realip = $_SERVER["HTTP_CLIENT_IP"];
		} else {
		$realip = $_SERVER["REMOTE_ADDR"];
		}
	} else {
				if(getenv("HTTP_X_FORWARDED_FOR")) {
					$realip = getenv("HTTP_X_FORWARDED_FOR");
				} elseif(getenv("HTTP_CLIENT_IP")) {
					$realip = getenv("HTTP_CLIENT_IP");
				} else {
					$realip = getenv("REMOTE_ADDR");
				}
			}
	return $realip;
}
$ip = SacarIP();

function GenerateTicket(){
	$data = "DE-";
	for ($i=1; $i<=6; $i++){
		$data = $data . rand(0,9);
	}
	$data = $data . "-";
	for ($i=1; $i<=20; $i++){
		$data = $data . rand(0,9);
	}
	$data = $data . "-HABBO-HOTEL-DE";
	$data = $data . rand(0,5);
	return $data;
}

/* Código anti inyecciones SQL */

function addslashes__recursive($var){
if (!is_array($var))
return addslashes($var);
$new_var = array();
foreach ($var as $k => $v)$new_var[addslashes($k)]=addslashes__recursive($v);
return $new_var;
}
$_POST=addslashes__recursive($_POST);
$_GET=addslashes__recursive($_GET);
$_REQUEST=addslashes__recursive($_REQUEST);
$_SERVER=addslashes__recursive($_SERVER);
$_COOKIE=addslashes__recursive($_COOKIE);

/* Aqui termina el codigo */

function ProtectVars($str)
{
	$str = addslashes($str);
	$str = mysql_real_escape_string($str);
	$str = htmlspecialchars($str);
	return $str;
}

foreach($_POST as $param => $value)
{
	$_POST[$param] = ProtectVars($value);
}
foreach($GET as $param => $value)
{
	$_GET[$param] = ProtectVars($value);
}

if(isset($_POST['Username']) && isset($_POST['Password']))
{
	$U = $_POST['Username'];
	$P = $_POST['Password'];
	$Fail = false;
	
	$GetUser = mysql_query("SELECT * FROM users WHERE username = '$U' AND password = '".md5($P)."'");
	if(empty($U) || empty($P))
	{
		echo '<div id="box"  class="animated bounceInRight" style="background: #cf232a;border-left-color: #db2012;border-color: #df0e17;padding: 10px;text-transform: uppercase;"><center><font style="color:#FFFFFF;">Los datos est&aacute;n vac&iacute;os</font></center></div>';
	}
	elseif(mysql_num_rows($GetUser) == 0)
	{
		echo '<div id="box"  class="animated bounceInRight" style="background: #cf232a;border-left-color: #db2012;border-color: #df0e17;padding: 10px;text-transform: uppercase;"><center><font style="color:#FFFFFF;">El usuario no existe o la contrase&ntilde;a es incorrecta</font></center></div>';
		$Fail = true;
	}
	$Checkban = mysql_query("SELECT * FROM bans WHERE value = '". $U ."' OR value = '". $ip ."'");
	if(mysql_num_rows($Checkban) > 0)
	{
	    $ban = mysql_fetch_assoc($Checkban);
	    echo '<div id="box"  class="animated bounceInRight" style="background: #cf232a;border-left-color: #db2012;border-color: #df0e17;padding: 10px;text-transform: uppercase;color:white;text-align:center;">Has sido baneado, raz&oacute;n <b>'. $ban['reason'] .'</b>.</font></center></div>';
	    $Fail = true;
	}
	if($Fail == false)
	{
		if(mysql_num_rows($GetUser) > 0)
		{
			$_SESSION['Username'] = $U;
			$_SESSION['Password'] = $P;
		}
	}
}

if(isset($_SESSION['Username']) && isset($_SESSION['Password']))
{
	$SU = $_SESSION['Username'];
	$SP = $_SESSION['Password'];
	
	$GetUser = mysql_query("SELECT * FROM users WHERE username = '$SU' AND password = '".md5($SP)."'");
	if(mysql_num_rows($GetUser) > 0)
	{
		$myrow = mysql_fetch_assoc($GetUser);
		define("User", true);
	}
} else {
	define("User", false);
}
if(isset($_POST['RUsername']) && isset($_POST['ROPassword']) && isset($_POST['RTPassword']) && isset($_POST['RMail']) && isset($_POST['ROMail']))
{
	$RU = $_POST['RUsername'];
	$ROP = $_POST['ROPassword'];
	$RTP = $_POST['RTPassword'];
	$RM = $_POST['RMail'];
	$ROM = $_POST['ROMail'];
	$Fail = false;
	
	
	$GetUser = mysql_query("SELECT * FROM users WHERE username = '$RU'");
	if(mysql_num_rows($GetUser) > 0)
	{
		echo '<div id="box" style="background: #DF696E; border-left-color: #DF696E; border-color: #DF696E;padding: 5px;"><center><font style="color:#FFFFFF;">El usuario ya existe, por favor elige otro</font></center></div>';
		$Fail = true;
	}
	$GetUser = mysql_query("SELECT * FROM users WHERE mail = '$RM'");
	if(mysql_num_rows($GetUser) > 0)
	{
	    echo '<div id="box" style="background: #DF696E; border-left-color: #DF696E; border-color: #DF696E;padding: 5px;"><center><font style="color:#FFFFFF;">El email ya existe, por favor elige otro</font></center></div>';
		$Fail = true;
    }
	$Chekban = mysql_query("SELECT * FROM bans WHERE value = '". $ip ."'");
	if(mysql_num_rows($Chekban) > 0)
	{
	    echo '<div id="box" style="background: #DF696E; border-left-color: #DF696E; border-color: #DF696E;padding: 5px;"><center><font style="color:#FFFFFF;">No puedes registrarte. Tu IP ha sido baneada.</font></center></div>'; 
		$Fail = true;
	}
	elseif(empty($RU) || empty($ROP) || empty($RTP) || empty($RM))
	{
		echo '<div id="box" style="background: #DF696E; border-left-color: #DF696E; border-color: #DF696E;padding: 5px;"><center><font style="color:#FFFFFF;">Algun dato esta vacio a&uacute;n</font></center></div>';
		$Fail = true;
	}
	elseif($RTP !== $ROP)
	{
		echo '<div id="box" style="background: #DF696E; border-left-color: #DF696E; border-color: #DF696E; padding: 5px;"><center><font style="color:#FFFFFF;">Las dos contrase&ntilde;as no son iguales</font></center></div>';
		$Fail = true;
	}
	elseif($RM !== $ROM)
    {
	    echo '<div id="box" style="background: #DF696E; border-left-color: #DF696E; border-color: #DF696E; padding: 5px;"><center><font style="color:#FFFFFF;">Los correos no son iguales</font></center></div>';
		$Fail = true;
	}
	if($Fail == false)
	{
		mysql_query("INSERT INTO users (username, real_name, password, mail, look, motto, account_created, ip_last, votos, photo_perfil, portada) VALUES ('$RU', '', '".md5($ROP)."', '$RM', 'hd-185-1.lg-270-78.hr-155-37.cp-3284-1321.ch-210-1408.sh-906-1408', '". $Mision ."', '". $date_normal ."', '". $ip ."', '0', '". $PerfilD ."', '". $Portada ."')");
		mysql_query("INSERT INTO user_info (user_id,reg_timestamp) VALUES ('".$RU['id']."','".time()."')");
		mysql_query("INSERT INTO user_stats (id) VALUES ('".$RU['id']."')");
		echo '<div id="box" style="background: #04B404; border-left-color: #04B404; border-color: #04B404; padding: 5px;"><center><font style="color:#FFFFFF;"> Te has registrado correctamente, Ahora seras redirecionado para ingresar(Por serguridad). <META HTTP-EQUIV="REFRESH" CONTENT="3;URL=/">
</font></center></div>';
	}
}
?>
<?php 
$Us = mysql_query("SELECT * FROM users WHERE id ='". $myrow['id'] ."'");
$u = mysql_fetch_assoc($Us);

if(isset($_POST['FPerfil'])) 
{
$FP = $_POST['FPerfil'];
$Fallo = false;

    if(empty($FP)) 
	{
	    echo '<div id="box" style="background: #DF696E; border-left-color: #DF696E; border-color: #DF696E;padding: 5px; width: 460px;"><center><font style="color:#FFFFFF;">El campo de "Foto de perfil" esta vacio.</font></center></div>';
        $Fallo = true;
	}
    if($Fallo == false)
    {
        mysql_query("UPDATE users SET photo_perfil = '". $FP ."' WHERE id ='". $u['id'] ."'");
        echo '<div id="box" style="background: #04B404; border-left-color: #04B404; border-color: #04B404; padding: 5px; width: 460px;"><center><font style="color:#FFFFFF;">La foto de perfil fue cambiada, espera 3 segundos y veras al cambio.</font></center></div><meta http-equiv="Refresh" content="0;URL=/perfil.php?perfil='. $u['id'] .'" />';
    }
}
if(isset($_POST['FPortada']))
{
$FPO = $_POST['FPortada'];
$Fallo = false;	

    if(empty($FPO))
	    {
		    echo '<div id="box" style="background: #DF696E; border-left-color: #DF696E; border-color: #DF696E;padding: 5px; "><center><font style="color:#FFFFFF;">El campo de "Foto de portada" esta vacio.</font></center></div>';
			$Fallo = true;
		}
    if($Fallo == false)
	    {
		    mysql_query("UPDATE users SET portada = '". $FPO ."' WHERE id ='". $u['id'] ."'");
			echo'<div id="box" style="background: #04B404; border-left-color: #04B404; border-color: #04B404; padding: 5px; width: 460px;"><center><font style="color:#FFFFFF;">La foto de portada fue cambiada, espera 3 segundos para ver el cambio.</font></center></div><meta http-equiv="Refresh" content="0;URL=/perfil.php?perfil='. $u['id'] .'" />';
		}
}
if(isset($_POST['NMotto']))
{
$NMotto = $_POST['NMotto'];
$Fallo = false;
    if($Fallo == false)
    {
        mysql_query("UPDATE users SET motto = '". $NMotto ."' WHERE id ='". $u['id'] ."'");
        echo '<div id="box" style="background: #04B404; border-left-color: #04B404; border-color: #04B404; padding: 5px; width: 460px;"><center><font style="color:#FFFFFF;">T&uacute; misi&oacute;n fue cambia por <b>'. $NMotto .'</b> con exito.</font></center></div>';	
    }
}	
if(isset($_POST['MMail']) && isset($_POST['NMail']) && isset($_POST['RNMail']))
{  
$MM = $_POST['MMail']; 
$NM = $_POST['NMail'];
$RNM = $_POST['RNMail'];
$Fallo = false;
    
    $GetMail = mysql_query("SELECT * FROM users WHERE mail = '". $NM ."'");
    if(mysql_num_rows($GetMail) > 0)	
	{
	    echo '<div id="box" style="background: #DF696E; border-left-color: #DF696E; border-color: #DF696E;padding: 5px; "><center><font style="color:#FFFFFF;">El email ya esta en uso, prueba otro.</font></center></div>';
		$Fallo = true;
	}	
	elseif(empty($MM) || empty($NM) || empty($RNM))
	{
	    echo '<div id="box" style="background: #DF696E; border-left-color: #DF696E; border-color: #DF696E;padding: 5px; "><center><font style="color:#FFFFFF;">Los campos de cambiar "email", estan vacios.</font></center></div>';
	    $Fallo = true;
	}
    elseif($MM !==	$u['mail'])
	{
	    echo '<div id="box" style="background: #DF696E; border-left-color: #DF696E; border-color: #DF696E;padding: 5px; "><center><font style="color:#FFFFFF;">Tu email antiguo no es correcto.</font></center></div>';
		$Fallo = true;
	}	
	elseif($NM !== $RNM)
	{
	    echo '<div id="box" style="background: #DF696E; border-left-color: #DF696E; border-color: #DF696E;padding: 5px; "><center><font style="color:#FFFFFF;">Los correos no son iguales.</font></center></div>';
		$Fallo = true;
	}	
	if($Fallo == false)
	{   
	    mysql_query("UPDATE users SET mail = '". $NM ."' WHERE id ='". $u['id'] ."'");
		echo'<div id="box" style="background: #04B404; border-left-color: #04B404; border-color: #04B404; padding: 5px; width: 460px;"><center><font style="color:#FFFFFF;">Cambio efectuado, ahora tu correo es <b>'. $NM .'</b></font></center></div>';
	}
}	
if(isset($_POST['NPassword']) && isset($_POST['REPassword']))
{
$NP = $_POST['NPassword'];
$REP = $_POST['REPassword'];
$Fallo = false;

    if(empty($NP) || empty($REP))
	{
	    echo '<div id="box" style="background: #DF696E; border-left-color: #DF696E; border-color: #DF696E;padding: 5px; "><center><font style="color:#FFFFFF;">Los campos de nueva contrase&ntilde;a estan vacios.</font></center></div>';
		$Fallo = true;
	}	
	elseif($NP !== $REP)
	{
	    echo '<div id="box" style="background: #DF696E; border-left-color: #DF696E; border-color: #DF696E;padding: 5px; "><center><font style="color:#FFFFFF;">Las contrase&ntilde;as no coinciden.</font></center></div>';
		$Fallo = true;
	}
    if($Fallo == false)
    {
      	mysql_query("UPDATE users SET password = '". md5($NP) ."' WHERE id='". $u['id'] ."'");
		echo "<script type=\"text/javascript\">alert('Haz cambiado tu contraeña con exito, tienes que iniciar sesion de nuevo.'); window.location='index.php';</script>";
		session_destroy();
	    echo header("Location: /");
	}
}
$checkman = mysql_query("SELECT * FROM cms_mantenimiento");
$man = mysql_fetch_assoc($checkman);
?>