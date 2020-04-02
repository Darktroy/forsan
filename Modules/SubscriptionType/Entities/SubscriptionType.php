<?php

namespace Modules\SubscriptionType\Entities;

use Illuminate\Database\Eloquent\Model;
use App;
use Illuminate\Http\Request;

class SubscriptionType extends Model
{
    protected $table = 'SubscriptionType';
    protected $primaryKey = 'SubscriptionType_id';
    protected $fillable = [ 'name_ar', 'name_en','subscription_amount','tax_amount',
                            'trans_amount','total_amount' ];

    public function listAll(Request $request){
        if(isset($request->lang) && ($request->lang == 'ar'|| $request->lang == 'en') ){
            App::setlocale($request->lang);
        }
        $data = self::select('SubscriptionType_id',
        'name_'.App::getLocale().' as name','total_amount','subscription_amount','tax_amount',
        'trans_amount')->get()->toArray();
        return $data;
                            }
}
