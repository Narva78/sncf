<?php
include("views/header.php");

if (!isset($_REQUEST['action'])) {
	$_REQUEST['action'] = 'gestionPC';
}


$action = $_REQUEST['action'];

switch ($action) {
	case 'gestionPC': {
			include("views/gestionPC");
			break;
		}
}
