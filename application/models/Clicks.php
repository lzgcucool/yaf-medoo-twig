<?php

namespace Model;

use \Framework\Model as ModelBase;

class Clicks extends ModelBase
{
	protected $tableName = 'wpd_clicks';

	public function getOfferClicks( $offerid ) {
		return $this->select('*',['offerid'=>$offerid]);
	}
}