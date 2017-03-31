<?php

use Framework\TwigAdapter;
use Medoo\Medoo;

class Bootstrap extends Yaf\Bootstrap_Abstract{

	private $_app;

	private $_config;

	public function _init(Yaf\Dispatcher $dispatcher){
        $this->_app = Yaf\Application::app();
        $this->_config = $this->_app->getConfig()->toArray();
    }

    public function _initViews(Yaf\Dispatcher $dispatcher){
    	$twigconf = $this->_config['twig'];
    	$twigdir = $twigconf['templatedir'];
    	unset($twigconf['templatedir']);
        $twig = new TwigAdapter($twigdir, $twigconf);
        Yaf\Dispatcher::getInstance()->setView($twig);
    }

    public function _initDB(Yaf\Dispatcher $dispatcher){
        $medoo = new Medoo($this->_config['db']);
        Yaf\Registry::set('db', $medoo);
    }
}