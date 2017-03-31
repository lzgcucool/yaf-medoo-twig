<?php

namespace Model;

use \Framework\Model as ModelBase;

class Groups extends ModelBase
{
	protected $tableName = 'wpd_groups';

	public function getGroupByid( $gid ) {
		return $this->select('*',['id'=>$gid]);
	}
}