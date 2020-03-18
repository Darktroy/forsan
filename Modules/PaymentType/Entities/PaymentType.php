<?php

namespace Modules\PaymentType\Entities;

use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model
{
    protected $table = 'PaymentType';
    protected $primaryKey = 'payment_type_id';
    protected $fillable = [ 'name_ar', 'name_en'];
}
