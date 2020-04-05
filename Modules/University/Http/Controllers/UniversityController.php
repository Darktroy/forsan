<?php

namespace Modules\University\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\University\Entities\University;
use Illuminate\Support\Facades\Lang;
use App;

class UniversityController extends Controller
{
    private $universityModelObj = Null;
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function __construct() {
        $this->universityModelObj = new University() ;
    }
    public function listAll(Request $request) {
        if(isset($request->lang) && ($request->lang == 'ar'|| $request->lang == 'en') ){
            App::setlocale($request->lang);
        }
        $data = $this->universityModelObj->select('university_id',
        'name_'.App::getLocale().' as name')->get()->toArray();
        return response()->json(['data' => $data, 'message' => @Lang::get('messages.ar'),
        'success' => true], 200);
    }

    public function index()
    {
        return view('university::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('university::create');
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
        return view('university::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('university::edit');
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
