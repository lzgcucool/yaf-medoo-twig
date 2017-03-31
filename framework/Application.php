<?php
/**
 * Created by PhpStorm.
 * User: leecucole
 * Date: 2017/3/21
 * Time: 上午1:19
 */
namespace Framework;

use Yaf;


class Application {

    const APP_CONF = APP_PATH . '/conf/application.ini';

    protected $_objInst = [];

    protected $_handle;

    protected static $_app;

    protected function __construct( $conf_path ) {

        $this->_handle = new Yaf\Application( $conf_path );
    }

    public static function app( $conf_path = self::APP_CONF ) {

        if ( !self::$_app ) {

            self::$_app = new self( $conf_path );
        }

        return self::$_app;
    }

    public function run(){

        $this->_handle->getDispatcher()->catchException(false);
        $this->_handle->getDispatcher()->setErrorHandler(function () {
            return $this->handleError(func_get_args());
        });
        $this->_handle->bootstrap()->run();
    }

    public function handleError ( array $errormes ) {
//        var_dump($errormes);
        return true;
    }

    public function useModel( $modelName )
    {
        if ( !isset($this->_objInst['model'][$modelName]) ) {
            try {
                $modelNameStr = 'Model\\' . $modelName;
                if ( class_exists($modelNameStr) ) {
                    $this->_objInst['model'][$modelName] = new $modelNameStr();
                } else {
                    throw new \Exception("The object class {$modelNameStr} is not found");
                }
            } catch (Exception $e) {
                echo 1;

                exit;
            }
        }

        return $this->_objInst['model'][$modelName];
    }

    public function useService( $serviceName )
    {
        if ( !isset($this->_objInst['service'][$serviceName]) ) {
            try {
                $serviceNameStr = 'Service\\' . $serviceName;
                if ( class_exists($serviceNameStr) ) {
                    $this->_objInst['service'][$serviceName] = new $serviceNameStr();
                } else {
                    throw new \Exception("The object class {$serviceNameStr} is not found");
                }
            } catch (Exception $e) {
                $err = [
                    'code' => $e->getCode(),
                    'msg'  => $e->getMessage(),
                    'file'    => $e->getFile(),
                    'line'   => $e->getLine()
                ];
                $this->handleError($err);
                exit;
            } catch (\Error $e) {
                var_dump($e);
            }
        }

        return $this->_objInst['service'][$serviceName];
    }
}