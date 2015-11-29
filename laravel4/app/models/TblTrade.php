<?php

use Illuminate\Database\Eloquent\Model;

class TblTrade extends Model
{
	protected $table = 'tbl_trade';
	
	protected $guarded = ['id'];

	public $timestamps = false;

	const STATUS_DELETE = 1;
	const STATUS_NOT_DELETE = 0;

}

