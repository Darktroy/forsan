<?php

namespace Modules\Ticket\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\DB;
use Modules\Ticket\Entities\Ticket;
use Modules\Ticket\Entities\TicketMessages;
use Exception;
use Illuminate\Http\Client\Request as ClientRequest;

class TicketController extends Controller {

    /**
     * Display a listing of the resource.
     * @return Response
     */
    private $ticketModel = null;
    private $ticketMessages = null;

    public function __construct() {
        $this->ticketModel = new Ticket();
        $this->ticketMessages = new TicketMessages();
    }

    public function AddNewTicket(Request $request) {
        DB::beginTransaction();
        try {
            $data = $this->ticketModel->storeData($request);
            DB::commit();
            return response()->json(['data' => $data, 'message' => @Lang::get('messages.registered'), 'success' => true], 200);
        } catch (Exception $e) {
            DB::rollBack();
            $test = @unserialize($e->getMessage());
            if ($test !== false) {
                $datra = unserialize($e->getMessage());
                return response()->json(['error' => $datra, 'status' => false], 200);
            } else {

                return response()->json(['error' => $e->getMessage(), 'status' => false], 200);
            }
        }
    }

    public function ListTickets() {
        $user = auth()->user()->toArray();
        $data = $this->ticketModel::where('user_id', $user['user_id'])->get()->toArray();
        return response()->json(['data' => $data, 'message' => @Lang::get('messages.registered'), 'success' => true], 200);
    }
    public function ListOneTicketDetails(Request $request) {
        $user = auth()->user()->toArray();
        try {
        $data = $this->ticketModel->showFullTicket($request);
        return response()->json(['data' => $data, 'message' => @Lang::get('messages.registered'), 'success' => true], 200);
        } catch (Exception $e) {
            $test = @unserialize($e->getMessage());
            if ($test !== false) {
                $datra = unserialize($e->getMessage());
                return response()->json(['error' => $datra, 'status' => false], 200);
            } else {

                return response()->json(['error' => $e->getMessage(), 'status' => false], 200);
            }
        }
    }
    public function AddReplayTicket(Request $request) {
        DB::beginTransaction();
        try {
            $data = $this->ticketMessages->storeData($request);
            DB::commit();
            return response()->json(['data' => $data, 'message' => @Lang::get('messages.registered'), 'success' => true], 200);
        } catch (Exception $e) {
            DB::rollBack();
            $test = @unserialize($e->getMessage());
            if ($test !== false) {
                $datra = unserialize($e->getMessage());
                return response()->json(['error' => $datra, 'status' => false], 200);
            } else {

                return response()->json(['error' => $e->getMessage(), 'status' => false], 200);
            }
        }
    }

    public function index() {
        return view('ticket::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create() {
        return view('ticket::create');
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
        return view('ticket::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id) {
        return view('ticket::edit');
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
