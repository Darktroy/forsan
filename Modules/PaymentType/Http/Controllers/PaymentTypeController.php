<?php

namespace Modules\PaymentType\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\PaymentType\Entities\PaymentType;
use Illuminate\Support\Facades\Lang;
class PaymentTypeController extends Controller
{
    private $subscriptionTypeModelObj = Null;
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function __construct() {
        $this->paymentTypeModelObj = new PaymentType() ;
    }
    public function listAll() {
        $data = $this->paymentTypeModelObj::all();
        return response()->json(['data' => $data, 'message' => @Lang::get('messages.ar'), 'success' => true], 200);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('paymenttype::create');
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
        return view('paymenttype::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('paymenttype::edit');
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
