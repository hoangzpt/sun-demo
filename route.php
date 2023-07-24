<?php

require 'controller/BookController.php';
require 'controller/LoginController.php';
require 'controller/LogoutController.php';
require 'controller/RegisterController.php';


$action = $_GET['action'] ?? 'index';


switch($action) {
	case 'index':
        (new LoginController())->index();
		break;
    case 'login':
        (new LoginController())->checklogin();
        break;
    case 'register':
        (new RegisterController())->index();
        break;
    case 'createuser':
        (new RegisterController())->createuser();
        break;
    case 'logout':
        (new LogoutController())->logout();
        break;
    case 'bookindex':
        (new BookController())->index();
        break;
	case 'create':
		(new BookController())->create();
		break;
	case 'store':
		(new BookController())->store();
		break;
	case 'edit':
		(new BookController())->edit();
		break;
	case 'update':
		(new BookController())->update();
		break;
	case 'delete':
		(new BookController())->delete();
		break;
	default:
		echo "Nhập sai rồi";
}
