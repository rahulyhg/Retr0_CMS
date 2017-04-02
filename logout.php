<?php
require_once("inc/ajustes.php");
require_once("inc/core.php");

	session_destroy();
	echo header("Location: /");
?>