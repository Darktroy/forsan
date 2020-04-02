<?php

namespace Modules\BanksList\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\BanksList\Entities\BanksList;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\DB;
use Exception;

class BanksListController extends Controller
{ 
    private $banksListModelObj = Null;
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function __construct() {
        $this->banksListModelObj = new BanksList() ;
    }
    public function listAllAdminBanks(Request $request) {
        $data = $this->banksListModelObj->listAllAdminBanks($request);
        return response()->json(['data' => $data, 'message' => @Lang::get('messages.ar'), 'success' => true], 200);
    }
    public function listAll(Request $request) {
        $data = $this->banksListModelObj->listAll($request);
        return response()->json(['data' => $data, 'message' => @Lang::get('messages.ar'), 'success' => true], 200);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('bankslist::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('bankslist::create');
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
        return view('bankslist::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('bankslist::edit');
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
