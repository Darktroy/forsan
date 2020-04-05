<?php

namespace Modules\SubscriptionType\Entities;

use Illuminate\Database\Eloquent\Model;
use App;
use Modules\SubscriptionType\Entitie\period;
use Illuminate\Http\Request;

class SubscriptionType extends Model
{
    protected $table = 'SubscriptionType';
    protected $primaryKey = 'SubscriptionType_id';
    protected $fillable = [ 'name_ar', 'name_en','subscription_amount','tax_amount',
                            'trans_amount','total_amount','period_id','way_id' ];

    public function listAll(Request $request){
        if(isset($request->lang) && ($request->lang == 'ar'|| $request->lang == 'en') ){
            App::setlocale($request->lang);
        }
        $data =[];
        $dataRow = self::select('SubscriptionType_id',
        'name_'.App::getLocale().' as name','total_amount','subscription_amount','tax_amount',
        'trans_amount','way_id','period_id')->with('way','period')->get()->toArray();
        foreach ($dataRow as $key => $value) {
            $tempWayname = $value['way']['name_'.App::getLocale()];
            $tempperiodname = $value['period']['name_'.App::getLocale()];
            unset($value['way']);
            unset($value['period']);
            $value['way_name'] = $tempWayname;
            $value['period_name'] = $tempperiodname;
            $data[] = $value;
        }
        return $data;
    }

    public function way(){
        return $this->hasOne('Modules\SubscriptionType\Entities\way','way_id','way_id');
    }
    public function period(){
        return $this->belongsTo('Modules\SubscriptionType\Entities\period','period_id','period_id');
//        return $this->belongTo('Modules\SubscriptionType\Entitie\period','period_id','period_id');
    }
}
