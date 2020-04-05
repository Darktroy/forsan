<?php

namespace Modules\SubscriptionType\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
use App;
use Illuminate\Http\Request;

class way extends Model
{
    protected $table = 'way';
    protected $primaryKey = 'way_id';
    protected $fillable = [ 'name_ar','name_en' ];

    public function listAll(Request $request){
        if(isset($request->lang) && ($request->lang == 'ar'|| $request->lang == 'en') ){
            App::setlocale($request->lang);
        }

        $data = self::select('way_id',
        'name_'.App::getLocale().' as name')->get()->toArray();
       

        // // echo URL::to(''); // Base URL
        // foreach ($dataRow as $key => $value) {
        //     $data[] = array('id'=>$value['SliderImages_id'],'path'=>URL::to('public/SliderImages/'.$value['name']));
        // }

        return $data;
                            }
}
