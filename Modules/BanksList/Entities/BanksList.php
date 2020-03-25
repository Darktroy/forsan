<?php

namespace Modules\BanksList\Entities;

use Illuminate\Database\Eloquent\Model;

class BanksList extends Model
{
    protected $table = 'BanksList';
    protected $primaryKey = 'BanksList_id';
    protected $fillable = [ 'bank_name_ar', 'bank_name_en','adminstration'];
}
