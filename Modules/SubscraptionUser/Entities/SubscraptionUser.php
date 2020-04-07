<?php

namespace Modules\SubscraptionUser\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Modules\UserToSubscription\Entities\UserToSubscription;
use Exception;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Modules\Period\Entities\period;
use Illuminate\Support\Facades\Lang;

class SubscraptionUser extends Model {

    protected $table = 'SubscraptionUser';
    protected $primaryKey = 'SubscraptionUser_id';
    protected $fillable = ['user_id', 'name', 'email',
        'mobile', 'university_id',
        'latitude', 'longitude', 'address',
        'payment_type_id'];

    public function storeData(Request $request) {
        $validator = Validator::make($request->all(), [
                    'name' => 'required|min:3',
                    'email' => 'required|email',
                    'university_id' => 'required|exists:university,university_id',
                    'address' => 'required|min:5',
                    'latitude' => 'required_with:longitude|nullable',
                    'longitude' => 'required_with:latitude|nullable',
                    'mobile' => 'required',
                    'start_date' => 'required|date',
                    'payment_type_id' => 'required|exists:PaymentType,payment_type_id',
                    'SubscriptionType_id' => 'required|exists:SubscriptionType,SubscriptionType_id',
                    'period_id' => 'required|exists:period,period_id',
                    'way_id' => 'required|exists:way,way_id',
        ]);
        if ($validator->fails()) {
            $error = $validator->messages()->toArray();
            $error_msg = [];
            foreach ($error as $er) {
                $error_msg[] = $er[0];
            }
            throw new Exception(serialize($error_msg));
        }
        $data = [];

        $user = auth()->user()->toArray();
        $row = explode('-', $request->start_date);
//        dd($row);
//        array:3 [
//  0 => "2019"
//  1 => "8"
//  2 => "15"
//]
        $period = \Modules\SubscriptionType\Entities\period::where('period_id',$request->period_id)->firstorFail();
        $dt = Carbon::create($row[0], $row[1], $row[2]);
        $end_date = substr( $dt->addMonths($period['months']), 0,10);
        $subscritpionTypes = \Modules\SubscriptionType\Entities\SubscriptionType::where('SubscriptionType_id',
                $request->SubscriptionType_id)->firstorFail();
        $payFees = \Modules\PaymentType\Entities\PaymentType::where('payment_type_id',$request->payment_type_id)->firstorFail();
        $payment_amount = $subscritpionTypes['subscription_amount']+
                $subscritpionTypes['tax_amount']+$payFees['transaction_fees'];
        
        $data[] = $subscribeduser = self::create(array(
                    'user_id' => $user['user_id'],
                    'name' => $request->name,
                    'email' => $request->email,
                    'mobile' => $request->mobile,
                    'address' => $request->address,
                    'university_id' => $request->university_id,
                    'latitude' => isset($request->latitude) ? $request->latitude : Null,
                    'longitude' => isset($request->longitude) ? $request->longitude : Null,
                    'payment_type_id' => $request->payment_type_id));
        
        $userToSubscription = UserToSubscription::create(array(
                    'PaymentType_id' => $request->payment_type_id,
                    'SubscriptionType_id' => $request->SubscriptionType_id,
                    'start_date' => $request->start_date,
                    'end_date' => $end_date,
                    'way_id' => $request->way_id,
                    'period_id' => $request->period_id,
                    'payment_amount'=>$payment_amount,
                    'user_id' => $user['user_id'],
                    'SubscraptionUser_id' => $subscribeduser['SubscraptionUser_id'],
        ));
        $usertoSubscriptiondetails = UserToSubscription::where('UserToSubscription_id',
                $userToSubscription['UserToSubscription_id'])->with('paymentType', 'SubscriptionType')->firstorFail();
        
        $subscribeduser['start_date'] = $usertoSubscriptiondetails['start_date'];
        $subscribeduser['end_date'] = $end_date;
        $subscribeduser['way'] = $usertoSubscriptiondetails['way_id'];
        $subscribeduser['period'] = $usertoSubscriptiondetails['period_id'];
        $subscribeduser['payment_type_name_ar'] = $usertoSubscriptiondetails['paymentType']['name_ar'];
        $subscribeduser['payment_type_name_en'] = $usertoSubscriptiondetails['paymentType']['name_en'];
        $subscribeduser['subscription_name_ar'] = $usertoSubscriptiondetails['SubscriptionType']['name_ar'];
        $subscribeduser['subscription_name_en'] = $usertoSubscriptiondetails['SubscriptionType']['name_en'];
        $subscribeduser['subscription_amount'] = $usertoSubscriptiondetails['SubscriptionType']['subscription_amount'];
        $subscribeduser['subscription_tax_amount'] = $usertoSubscriptiondetails['SubscriptionType']['tax_amount'];
//        $subscribeduser['subscription_trans_amount'] = $usertoSubscriptiondetails['SubscriptionType']['trans_amount'];
        $subscribeduser['subscription_trans_amount'] = $payFees['transaction_fees'];
        $subscribeduser['subscription_total_amount'] = $payment_amount;
        return $subscribeduser;
    }

    public function list(Request $request) {
        if(isset($request->lang) && ($request->lang == 'ar'|| $request->lang == 'en') ){
            App::setlocale($request->lang);
        }
        $user = auth()->user()->toArray();
        $rowdata = self::where('user_id', $user['user_id'])
        ->with('userviasubscription.paymentType'
                        , 'userviasubscription.SubscriptionType'
                        , 'university')->get()->toArray();
        $data = [];
        if (count($rowdata)) {
            foreach ($rowdata as $key => $row) {
                $data[] = array('SubscraptionUser_id' => $row['SubscraptionUser_id'],
                  'name' => $row['name'],
                    'email' => $row['email'],
                    'university_name' => $row['university']['name_'.App::getLocale()],
                    'latitude' => $row['latitude'], 'longitude' => $row['longitude'],
                    'address' => $row['address'],
                    'payment_type_name' => $row['userviasubscription'][0]['payment_type']['name_'.App::getLocale()],
                    'subscription_id' => $row['userviasubscription'][0]['UserToSubscription_id'],
                    'subscription_type_name' => $row['userviasubscription'][0]['subscription_type']['name_'.App::getLocale()],
                    'subscription_amount' => $row['userviasubscription'][0]['subscription_type']['subscription_amount'],
                    'subscription_tax_amount' => $row['userviasubscription'][0]['subscription_type']['tax_amount'],
                    'subscription_trans_amount' => $row['userviasubscription'][0]['subscription_type']['trans_amount'],
                    'subscription_total_amount' => $row['userviasubscription'][0]['subscription_type']['total_amount'],
                );
            }
        }
        return $data;
    }

// Relations section
    public function userviasubscription() {
        return $this->hasMany('Modules\UserToSubscription\Entities\UserToSubscription',
                        'SubscraptionUser_id', 'SubscraptionUser_id');
    }

    public function university() {
        return $this->hasOne('Modules\University\Entities\University',
                        'university_id', 'university_id');
    }

}
