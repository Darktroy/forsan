<?php

namespace Modules\SubscriptionType\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\SubscriptionType\Entities\SubscriptionType;
use Illuminate\Support\Facades\Lang;

class SubscriptionTypeController extends Controller
{
    private $subscriptionTypeModelObj = Null;
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function __construct() {
        $this->subscriptionTypeModelObj = new SubscriptionType() ;
    }
    public function listAll(Request $request) {
              $data = $this->subscriptionTypeModelObj->listAll($request);
        return response()->json(['data' => $data, 'message' => @Lang::get('messages.ar'), 'success' => true], 200);
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
