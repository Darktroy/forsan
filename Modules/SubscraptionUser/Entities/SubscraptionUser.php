<?php

namespace Modules\SubscraptionUser\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Modules\UserToSubscription\Entities\UserToSubscription;

use Exception;
use Illuminate\Http\Request;

class SubscraptionUser extends Model
{
    protected $table = 'SubscraptionUser';
    protected $primaryKey = 'SubscraptionUser_id';
    
    protected $fillable = [ 'name', 'email',
                                    'mobile', 'university_id', 
                                    'latitude','longitude','address',
                                    'payment_type_id' ];
    
        public function storeData(Request $request) {
                $validator = Validator::make($request->all(), [
                    'name' => 'required|min:3',
                    'email' => 'required|email|unique:SubscraptionUser',
                    'university_id' => 'required|exists:university,university_id',
//                    'latitude' => 'required_if:longitude|nullable',
//                    'longitude' => 'required_if:latitude|nullable',
                    'mobile' => 'required',
                    'address' => 'required|min:5',
                    'start_date'=> 'required|date',
                    'payment_type_id' => 'required|exists:PaymentType,payment_type_id',
                    'SubscriptionType_id' => 'required|exists:SubscriptionType,SubscriptionType_id',
                    'period' => 'required|in:month, one semester, two semester',
                    'way' => 'required|in:go,back,go_and_back',
                    'SubscriptionType_id' => 'required|exists:SubscriptionType,SubscriptionType_id',
                ]);

                if ($validator->fails()) {
                    $error = $validator->messages()->toArray();
                    $error_msg =[];
                    foreach ($error as $er) {
                        $error_msg[]= $er[0];
                    }
                    throw  new Exception(serialize($error_msg));
                }
                $data = [];
                $data[] =$subscribeduser= self::create(array('name' => $request->name, 
                                                            'email' => $request->email,
                                                            'mobile' => $request->mobile,
                                                            'university_id' => $request->university_id, 
                                                            'latitude' => $request->latitude, 'longitude' => $request->longitude,
                                                            'payment_type_id' => $request->payment_type_id));
               $userToSubscription = UserToSubscription::create(array(
                                    'PaymentType_id'=> $request->payment_type_id ,
                                    'SubscriptionType_id'=>$request->SubscriptionType_id ,
                                    'start_date'=> $request->start_date,
                                    'way'=> $request->way,
                                    'period'=> $request->period,
                                    'SubscraptionUser_id'=> $subscribeduser['SubscraptionUser_id'],
                                    ));
               $usertoSubscriptiondetails= UserToSubscription::where('UserToSubscription_id',$userToSubscription['UserToSubscription_id'])
                       ->with('pymentType','SubscriptionType')->firstorFail();
               $data[] = $usertoSubscriptiondetails;
                    return $data;
        }
}
