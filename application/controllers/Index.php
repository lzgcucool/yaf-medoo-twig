<?php

use Framework\Application;

class IndexController extends Yaf\Controller_Abstract {
	public function indexAction() {
		// var_dump($this);
//        var_dump(Application::app()->useModel('GroupFeature')->getGroupId('qwdnio289'));
//        echo '<br />';
//        var_dump(Application::app()->useModel('Clicks')->getOfferClicks(1));
//        echo '<br />';
//        var_dump(Application::app());
//        echo '<br />';
//        $appp = Application::app()->useService('User')->isLogin();
//        var_dump($appp);

		$this->getView()->display( "index/index.html", [
		    "content" => "Hello World！！！",
        ]);
	}
}
