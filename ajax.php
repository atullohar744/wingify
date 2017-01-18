<?php
session_start();
require_once("config.php");
opendb();
require_once('api.php');
$api = new api();

$mode = @$_REQUEST['mode'];
$id = intval(@$_REQUEST['id']);
switch ($mode) {
	case 'edit':
		echo $api->editProduct($id);
		break;
	
	case 'delete':
		echo $api->deleteProduct($id);
		break;
	
	case 'add':
		echo $api->addUpdateProduct();
		break;
	
	case 'logout':
		session_destroy();
		redirect('index.php');
		break;
	
	default:
		
		break;
}
closedb();

?>