<?php

namespace Modules\UserToSubscription\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\DB;
use Exception;
use Modules\UserToSubscription\Entities\UserToSubscription;

class UserToSubscriptionController extends Controller {

    private $userToSubscriptionModel = Null;

    public function __construct() {
        $this->userToSubscriptionModel = new UserToSubscription();
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function changePickupOne(Request $request) {
        try {
            DB::beginTransaction();
            $data = $this->userToSubscriptionModel->changePickupOne($request);
            DB::commit();
            return response()->json(['data' => $data, 'message' => @Lang::get('messages.ar'), 'success' => true], 200);
        } catch (Exception $e) {
            DB::rollBack();
            $data = @unserialize($e->getMessage());
            if ($data !== false) {
                $datra = unserialize($e->getMessage());
                return response()->json(['error' => $datra, 'status' => false], 200);
            } else {
                return response()->json(['error' => $e->getMessage(), 'status' => false], 200);
            }
        }
    }

    public function editOne(Request $request) {
        try {
            DB::beginTransaction();
            $data = $this->userToSubscriptionModel->editOne($request);
            DB::commit();
            return response()->json(['data' => $data, 'message' => @Lang::get('messages.ar'), 'success' => true], 200);
        } catch (Exception $e) {
            DB::rollBack();
            $data = @unserialize($e->getMessage());
            if ($data !== false) {
                $datra = unserialize($e->getMessage());
                return response()->json(['error' => $datra, 'status' => false], 200);
            } else {
                return response()->json(['error' => $e->getMessage(), 'status' => false], 200);
            }
        }
    }

    public function renewOne(Request $request) {
        try {
            DB::beginTransaction();

            $data = $this->userToSubscriptionModel->renewOne($request);
            DB::commit();

            return response()->json(['data' => $data, 'message' => @Lang::get('messages.ar'), 'success' => true], 200);
        } catch (Exception $e) {
            DB::rollBack();
            $data = @unserialize($e->getMessage());
            if ($data !== false) {
                $datra = unserialize($e->getMessage());
                return response()->json(['error' => $datra, 'status' => false], 200);
            } else {
                return response()->json(['error' => $e->getMessage(), 'status' => false], 200);
            }
        }
    }

    public function listONE(Request $request) {
        try {
            $data = $this->userToSubscriptionModel->listOne($request);
            return response()->json(['data' => $data, 'message' => @Lang::get('messages.ar'), 'success' => true], 200);
        } catch (Exception $e) {
            $data = @unserialize($e->getMessage());
            if ($data !== false) {
                $datra = unserialize($e->getMessage());
                return response()->json(['error' => $datra, 'status' => false], 200);
            } else {
                return response()->json(['error' => $e->getMessage(), 'status' => false], 200);
            }
        }
    }

    public function listAll() {
        $data = $this->userToSubscriptionModel->list();
        return response()->json(['data' => $data, 'message' => @Lang::get('messages.ar'), 'success' => true], 200);
    }

    public function index() {
        return view('usertosubscription::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create() {
        return view('usertosubscription::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id) {
        return view('usertosubscription::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id) {
        return view('usertosubscription::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id) {
        //
    }

}
