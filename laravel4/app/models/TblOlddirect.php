<?php

use Illuminate\Database\Eloquent\Model;

class TblOlddirect extends Model
{
	protected $table = 'tbl_direct_nold';
	
	protected $guarded = ['id'];

	public $timestamps = false;

	const STATUS_DELETE = 1;
	const STATUS_NOT_DELETE = 0;

}

