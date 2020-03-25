<?php

namespace Modules\BankAccounts\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\DB;
use Modules\BankAccounts\Entities\BankAccounts;
use Exception;

class BankAccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
     private $bankAccountsModel = null;
    public function __construct() {
        $this->bankAccountsModel = new BankAccounts() ;
    }
    
    public function AddAccount(Request $request)
    {
            DB::beginTransaction();
            try {
                $data = $this->bankAccountsModel->storeData($request);
                DB::commit();
                return response()->json([ 'data' =>$data,'message' => @Lang::get('messages.registered'),'success' => true], 200);
            } catch (Exception $e) {
                DB::rollBack();
                $test = @unserialize($e->getMessage());
if ($test !== false) {
    $datra = unserialize($e->getMessage());
                return response()->json(['error' => $datra , 'status'=>false], 200);
                
} else {
    
                return response()->json(['error' => $e->getMessage() , 'status'=>false], 200);
}
                
            }
    }
    
    public function index()
    {
        return view('bankaccounts::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('bankaccounts::create');
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
        return view('bankaccounts::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('bankaccounts::edit');
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
