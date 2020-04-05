<?php

namespace Modules\SubscriptionType\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\SubscriptionType\Entities\SubscriptionType;
use Modules\SubscriptionType\Entities\SliderImages;
use Modules\SubscriptionType\Entities\way;
use Modules\SubscriptionType\Entities\period;
use Illuminate\Support\Facades\Lang;

class SubscriptionTypeController extends Controller
{
    private $subscriptionTypeModelObj = Null;
    private $sliderImages = Null;
    private $way = Null;
    private $period = Null;
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function __construct() {
        $this->subscriptionTypeModelObj = new SubscriptionType() ;
        $this->sliderImages = new SliderImages() ;
        $this->way = new way() ;
        $this->period = new period() ;
    }
    public function listAll(Request $request) {
        $data = [];
        $data['subscriptionType'] = $this->subscriptionTypeModelObj->listAll($request);
        $data['way'] = $this->way->listAll($request);
        $data['period'] = $this->period->listAll($request);
        return response()->json(['data' => $data, 'message' => @Lang::get('messages.ar'), 'success' => true], 200);
        }

        public function listWays(Request $request) {
            $data = [];
            $data['way'] = $this->way->listAll($request);
            return response()->json(['data' => $data, 'message' => @Lang::get('messages.ar'), 'success' => true], 200);
            }
            public function listPeriods(Request $request) {
                $data = [];
                $data['period'] = $this->period->listAll($request);
                return response()->json(['data' => $data, 'message' => @Lang::get('messages.ar'), 'success' => true], 200);
                }
        public function home(Request $request) {
            $data = [];
            $data['subscriptionType'] = $this->subscriptionTypeModelObj->listAll($request);
            $data['SliderImages'] =$this->sliderImages->listAll();
            $data['way'] = $this->way->listAll($request);
            $data['period'] = $this->period->listAll($request);
        return response()->json(['data' => $data,
                                'message' => @Lang::get('messages.ar'),
                                'success' => true], 200);
        }
        public function test()
        {
            echo url();
        }
    public function index()
    {
        return view('subscriptiontype::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('subscriptiontype::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('subscriptiontype::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('subscriptiontype::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
