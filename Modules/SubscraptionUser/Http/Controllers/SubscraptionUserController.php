<?php

namespace Modules\SubscraptionUser\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\SubscraptionUser\Entities\SubscraptionUser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\DB;
use Exception;

class SubscraptionUserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    private $subscraptionUserModel = null;
    public function __construct() {
        $this->subscraptionUserModel = new SubscraptionUser() ;
    }
    public function index()
    {
        return view('subscraptionuser::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('subscraptionuser::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */

    public function listAll(Request $request) {
                $data = $this->subscraptionUserModel->list($request);
                return response()->json([ 'data' =>$data,'message' => @Lang::get('messages.registered'),'success' => true], 200);
    }

    public function store(Request $request)
    {
            DB::beginTransaction();
            try {
                $data = $this->subscraptionUserModel->storeData($request);
                DB::commit();
                return response()->json([ 'data' =>$data,'message' => @Lang::get('messages.registered'),'success' => true], 200);
            } catch (Exception $e) {
                DB::rollBack();
                $datra = unserialize($e->getMessage());
//                $datra = $e->getMessage();
                return response()->json(['error' => $datra , 'status'=>false], 200);
            }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('subscraptionuser::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('subscraptionuser::edit');
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
