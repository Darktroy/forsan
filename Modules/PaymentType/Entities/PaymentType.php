<?php

namespace Modules\PaymentType\Entities;

use Illuminate\Database\Eloquent\Model;
use App;
use Illuminate\Http\Request;

class PaymentType extends Model
{
    protected $table = 'PaymentType';
    protected $primaryKey = 'payment_type_id';
    protected $fillable = [ 'name_ar', 'name_en','transaction_fees'];
    public function listAll(Request $request){
        if(isset($request->lang) && ($request->lang == 'ar'|| $request->lang == 'en') ){
            App::setlocale($request->lang);
        }

        $data = self::select('payment_type_id',
'name_'.App::getLocale().' as name','transaction_fees')->get()->toArray();
return $data;
    }
}
