<?php

namespace Modules\UserToSubscription\Entities;

use Illuminate\Database\Eloquent\Model;

class UserToSubscription extends Model
{
    protected $table = 'UserToSubscription';
    protected $primaryKey = 'UserToSubscription_id';
    protected $fillable = [ 'SubscraptionUser_id', 'SubscriptionType_id',
                                    'PaymentType_id','start_date','end_date','way',
                                    'period'];
            public function pymentType() {
                return $this->hasOne('Modules\PaymentType\Entities\PaymentType', 'payment_type_id', 'PaymentType_id');
            }
            public function SubscriptionType() {
                return $this->hasOne('Modules\SubscriptionType\Entities\SubscriptionType','SubscriptionType_id' ,'SubscriptionType_id');
            }
}
