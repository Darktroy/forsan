<?php

namespace Modules\UserToSubscription\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Exception;

use Modules\SubscraptionUser\Entities\SubscraptionUser;
class UserToSubscription extends Model {
    protected $table = 'UserToSubscription';
    protected $primaryKey = 'UserToSubscription_id';
    protected $fillable = ['SubscraptionUser_id', 'SubscriptionType_id','PaymentType_id','renewed','payment_amount',
     'start_date', 'end_date', 'way_id','user_id','period_id'];
// Relations Section
            public function paymentType() {
                return $this->hasOne('Modules\PaymentType\Entities\PaymentType', 'payment_type_id', 'PaymentType_id');
            }
            public function SubscriptionType() {
                return $this->hasOne('Modules\SubscriptionType\Entities\SubscriptionType', 'SubscriptionType_id', 'SubscriptionType_id');
            }
            
            public function subscribeUser() {
                return $this->hasOne('Modules\SubscraptionUser\Entities\SubscraptionUser', 'SubscraptionUser_id', 'SubscraptionUser_id');
            }
// CRUD section
    public function list() {
        $data = [];
         $user = auth()->user()->toArray();
         $supScriptionIdsrow = SubscraptionUser::where('user_id',$user['user_id'])->select('SubscraptionUser_id')->get()->toArray();
         $supScriptionIds = [];
         foreach ($supScriptionIdsrow as $key => $value) {
             $supScriptionIds[] = $value['SubscraptionUser_id'];
         }
         $subscripesRows = self::whereIn('SubscraptionUser_id',$supScriptionIds)->with('SubscriptionType','subscribeUser')->get()->toArray();
         foreach ($subscripesRows as $key => $value) {
                    $data[] = array(
                              'subscriber_name'                     => $value['subscribe_user']['name'],
                              'subscription_type_name'       => $value['subscription_type']['name_ar'],
                              'subscription_amount'             => $value['subscription_type']['subscription_amount'],
                              'tax_amount'                              => $value['subscription_type']['tax_amount'],
                              'trans_amount'                          => $value['subscription_type']['trans_amount'],
                              'total_amount'                           => $value['subscription_type']['total_amount'],
                              "start_date"                               => $value['start_date'],
                              "end_date"                                => $value['end_date'],
                              "way"                                         => $value['way'],
                              "period"                                     => $value['period'],
                              "UserToSubscription_id"         => $value['UserToSubscription_id'],
                    );
          }
          return $data ;
    }
    
    public function listOne(Request $request) {
        $user = auth()->user()->toArray();
        
        $validator = Validator::make($request->all(), [
                        'UserToSubscription_id' => 'required|exists:UserToSubscription,UserToSubscription_id'
                    ]);
                    if ($validator->fails()) {
                        $error = $validator->messages()->toArray();
                        $error_msg =[];
                        foreach ($error as $er) {
                            $error_msg[]= $er[0];
                        }
                        throw  new Exception(serialize($error_msg));
                    }
        $rowData = self::where('user_id',$user['user_id'])->where('UserToSubscription_id',$request->UserToSubscription_id)->
                    with('SubscriptionType','subscribeUser.university')->get()->toArray();
        if (count($rowData)==0){
            $error_msg =[];
            $error_msg[] = 'you donot have this subscription';
            throw  new Exception(serialize($error_msg));
        }
        $data =[];
        foreach ($rowData as $key => $value) {
                    $data   = array(
                              'subscriber_name'                     => $value['subscribe_user']['name'],
                              'subscriber_address'                     => $value['subscribe_user']['address'],
                              'subscriber_mobile'                     => $value['subscribe_user']['mobile'],
                              'university_name_ar'                     => $value['subscribe_user']['university']['name_ar'],
                              'subscription_type_name'       => $value['subscription_type']['name_ar'],
                              'subscription_amount'             => $value['subscription_type']['subscription_amount'],
                              'tax_amount'                              => $value['subscription_type']['tax_amount'],
                              'trans_amount'                          => $value['subscription_type']['trans_amount'],
                              'total_amount'                           => $value['subscription_type']['total_amount'],
                              "start_date"                               => $value['start_date'],
                              "end_date"                                => $value['end_date'],
                              "way"                                         => $value['way'],
                              "period"                                     => $value['period'],
                              "UserToSubscription_id"         => $value['UserToSubscription_id'],
                    );
          }
        return $data;
                    
    }
    
    public function renewOne(Request $request) {
        $user = auth()->user()->toArray();
                $validator = Validator::make($request->all(), [
                    'start_date'=> 'required|date',
                    'payment_type_id' => 'required|exists:PaymentType,payment_type_id',
                    'UserToSubscription_id' => 'required|exists:UserToSubscription,UserToSubscription_id'
                ]);
                if ($validator->fails()) {
                    $error = $validator->messages()->toArray();
                    $error_msg =[];
                    foreach ($error as $er) {
                        $error_msg[]= $er[0];
                    }
                    throw  new Exception(serialize($error_msg));
                }
                $rowData = self::where('user_id', $user['user_id'])->where('UserToSubscription_id',$request->UserToSubscription_id)->first()->toArray();
                
                if (count($rowData)==0){
                    $error_msg =[];
                    $error_msg[] = 'you donot have this subscription';
                    throw  new Exception(serialize($error_msg));
                }
                $rowData['renewed'] = 1;
                $rowData['start_date'] = $request->start_date;
                $rowData['PaymentType_id'] = $request->payment_type_id;
                $rowData['UserToSubscription_id'] = Null;
                $renwable_data = self::create($rowData);
                return $renwable_data;
                
    }
    
    public function editOne(Request $request) {
                $user = auth()->user()->toArray();
                $validator = Validator::make($request->all(), [
                    'period' => 'required|in:month,one semester,two semester',
                    'payment_type_id' => 'required|exists:PaymentType,payment_type_id',
                    'UserToSubscription_id' => 'required|exists:UserToSubscription,UserToSubscription_id'
                ]);
                if ($validator->fails()) {
                    $error = $validator->messages()->toArray();
                    $error_msg =[];
                    foreach ($error as $er) {
                        $error_msg[]= $er[0];
                    }
                    throw  new Exception(serialize($error_msg));
                }
                $rowData = self::where('user_id', $user['user_id'])->where('UserToSubscription_id',$request->UserToSubscription_id)->first();
                
                if (is_array($rowData) && count($rowData)==0){
                    $error_msg =[];
                    $error_msg[] = 'you donot have this subscription';
                    throw  new Exception(serialize($error_msg));
                }
                $rowData['period'] = $request->period;
                $rowData['PaymentType_id'] = $request->payment_type_id;
                $rowData->save();
                return $rowData;
                
    }
    
    public function changePickupOne(Request $request) {
                $user = auth()->user()->toArray();
                $validator = Validator::make($request->all(), [
                        'address' => 'required|min:5',
                        'latitude' => 'required_with:longitude|nullable',
                        'longitude' => 'required_with:latitude|nullable',
                        'UserToSubscription_id' => 'required|exists:UserToSubscription,UserToSubscription_id'
                ]);
                if ($validator->fails()) {
                    $error = $validator->messages()->toArray();
                    $error_msg =[];
                    foreach ($error as $er) {
                        $error_msg[]= $er[0];
                    }
                    throw  new Exception(serialize($error_msg));
                }
                $data = self::where('user_id', $user['user_id'])->where('UserToSubscription_id',$request->UserToSubscription_id)->first();
//                dd();
                $rowData = SubscraptionUser::where('SubscraptionUser_id',$data['SubscraptionUser_id'])->first();
                if (is_array($rowData) && count($rowData)==0){
                    $error_msg =[];
                    $error_msg[] = 'you donot have this subscription';
                    throw new Exception(serialize($error_msg));
                }
                $rowData['address'] = $request->address;
                $rowData['latitude'] = isset($request->latitude)?$request->latitude:$rowData['latitude'];
                $rowData['longitude'] = isset($request->latitude)?$request->latitude:$rowData['longitude'];
                $rowData->save();
                return $rowData;
                
    }
            
}