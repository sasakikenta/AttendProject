<?php

use Illuminate\Database\Eloquent\Model;

class TblOldmanager extends Model
{
	protected $table = 'tbl_oldmanager';
	
	protected $guarded = ['id'];

	const STATUS_C = 1;
	const STATUS_S = 2;

	const STATUS_KEEP = 1;
	const STATUS_BUY = 2;

	const STATUS_STOCK = 1;
	const STATUS_DELI = 2;
	const STATUS_DIS = 3;
	const STATUS_RETURN = 4;

	const STATUS_DELETE = 1;
	const STATUS_NOT_DELETE = 0;

}

