<?php 
/*phpinfo();*/

define('_ROOTPATH_',__DIR__);
spl_autoload_register();

use App\Controller\Controller;
use App\Controller\PagesController;

$pages = new Controller();
$pages->route();









      