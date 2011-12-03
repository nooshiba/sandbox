<?php

require_once 'smarty/Smarty.class.php';
require_once 'Zend/Loader/Autoloader.php';
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

	public function _initPulse()
	{
		$autoloader = Zend_Loader_Autoloader::getInstance();
		$autoloader->unregisterNamespace(array('Zend_', 'ZendX_'))
			                   ->setFallbackAutoloader(true);

	}
}

