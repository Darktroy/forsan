<?php

namespace Modules\SubscriptionType\Entities;

use Illuminate\Database\Eloquent\Model;

class SubscriptionType extends Model
{
    protected $table = 'SubscriptionType';
    protected $primaryKey = 'SubscriptionType_id';
    protected $fillable = [ 'name_ar', 'name_en','subscription_amount','tax_amount',
                            'trans_amount','total_amount' ];
}
