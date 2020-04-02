<?php

namespace Modules\BanksList\Entities;

use Illuminate\Database\Eloquent\Model;
use App;
use Illuminate\Http\Request;

class BanksList extends Model
{
    protected $table = 'BanksList';
    protected $primaryKey = 'BanksList_id';
    protected $fillable = [ 'bank_name_ar', 'bank_name_en','adminstration'];
    public function listAll(Request $request){
        if(isset($request->lang) && ($request->lang == 'ar'|| $request->lang == 'en') ){
            App::setlocale($request->lang);
        }
        $data = self::select('BanksList_id',
'bank_name_'.App::getLocale().' as name','adminstration')->get()->toArray();
return $data;
    }

    public function listAllAdminBanks(Request $request) {
        if(isset($request->lang) && ($request->lang == 'ar'|| $request->lang == 'en') ){
            App::setlocale($request->lang);
        }

        $data = self::select('BanksList_id',
        'bank_name_'.App::getLocale().' as name','adminstration')->where('adminstration',1)->get()->toArray();
        return $data;
    }
}
