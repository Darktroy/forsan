<?php

namespace Modules\BankAccounts\Entities;
use Modules\BanksList\Entities\BanksList;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Http\Request;

class BankAccounts extends Model
{
    protected $table = 'BankAccounts';
    protected $primaryKey = 'BankAccounts_id';
//    protected $primaryKey = 'BanksList_id';
    protected $fillable = [ 'UserToSubscription_id', 'adminstration_BanksList_id',
    'client_BanksList_name','user_id',
                        'account_number','trans_code','trans_date','image_name'];
    // Relations 
    public function adminBanksDetails() {
        return $this->belongsTo('BanksList', 'adminstration_BanksList_id', 'BanksList_id');
//        return $this->belongsTo($related, $foreignKey, $ownerKey);
    }
    
    // CRUD operations 
    public function storeData(Request $request) {
        $validator = Validator::make($request->all(), [
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    'client_BanksList_name' => 'required|min:5',
                    'trans_code' => 'required',
                    'trans_date' => 'required|date',
                    'account_number' => 'required',
                    'UserToSubscription_id' => 'required|exists:UserToSubscription,UserToSubscription_id',
                    'adminstration_BanksList_id' => 'required|exists:BanksList,BanksList_id',
        ]);
        if ($validator->fails()) {
            $error = $validator->messages()->toArray();
            $error_msg = [];
            foreach ($error as $er) {
                $error_msg[] = $er[0];
            }
            throw new Exception(serialize($error_msg));
        }
        
        $user = auth()->user()->toArray();
        $imageName = time().$user['user_id'].'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $imageName);
        $data  = self::create(array(
                    'user_id' => $user['user_id'],
                    'UserToSubscription_id' => $request->UserToSubscription_id,
                    'adminstration_BanksList_id' => $request->adminstration_BanksList_id,
                    'client_BanksList_name' => $request->client_BanksList_name,
                    'image_name' => $imageName,
                    'trans_code' => $request->trans_code,
                    'trans_date' => $request->trans_date,
                    'account_number' => $request->account_number));
       
        return $data;
    }

    
}
