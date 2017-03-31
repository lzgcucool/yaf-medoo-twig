<?php

namespace Model;

use \Framework\Model as ModelBase;

class GroupFeature extends ModelBase
{
	protected $tableName = 'wpd_group_feature';

	public function getGroupId( $feature ) {
		return $this->get('id',['feature'=>$feature]);
	}
}