<?php

namespace Modules\SubscriptionType\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
use App;
use Illuminate\Http\Request;

class period extends Model
{
    protected $table = 'period';
    protected $primaryKey = 'period_id';
    protected $fillable = [ 'name_ar','name_en','months' ];

    public function listAll(Request $request){
        if(isset($request->lang) && ($request->lang == 'ar'|| $request->lang == 'en') ){
            App::setlocale($request->lang);
        }

        $data = self::select('period_id',
        'name_'.App::getLocale().' as name')->get()->toArray();
        // $data =[];

        // // echo URL::to(''); // Base URL
        // foreach ($dataRow as $key => $value) {
        //     $data[] = array('id'=>$value['SliderImages_id'],'path'=>URL::to('public/SliderImages/'.$value['name']));
        // }

        return $data;
                            }
}
