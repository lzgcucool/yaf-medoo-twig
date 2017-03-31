<?php

namespace Framework;


use \Twig_Loader_Filesystem;
use \Twig_Environment;
use \Yaf;
/**
* twig template lib 
*/
class TwigAdapter implements Yaf\View_Interface
{

	protected $_assigned = [];

	protected $_twig;

	protected $_loader;
	
	function __construct( $tpldir, array $twigconfig )
	{
		$this->_loader = new Twig_Loader_Filesystem($tpldir);
		$this->_twig = new Twig_Environment($this->_loader, $twigconfig);
	}

	public function render( $viewPath, $tpl_val = NULL ){
		$template = $this->_twig->loadTemplate($viewPath);
        if (is_array($tpl_val)){
            $this->_assigned = array_merge($this->_assigned, $tpl_val);
        }
        return $template->render($this->_assigned);
	}

	public function display( $viewPath, $tpl_val = NULL ){
		$template = $this->_twig->loadTemplate($viewPath);
		if (is_array($tpl_val)){
            $this->_assigned = array_merge($this->_assigned, $tpl_val);
        }
        return $template->render($this->_assigned);
	}

	public function assign( $spec, $value = NULL ){
		if (is_array($spec)) {
            $this->_assigned = array_merge($this->_assigned, $spec);
        }
        $this->_assigned[$spec] = $value;
	}


	public function setScriptPath( $path ){
		$this->_loader->setPaths($path);
	}

	public function getScriptPath(){
		$paths = $this->_loader->getPaths();
		return reset($paths);
	}
}