<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyAsset extends Model
{
	protected $table = 'issued_to_employee';
    protected $primaryKey = 'id';
}
