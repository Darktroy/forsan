<?php

namespace Modules\Userdetails\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Userdetails\Entities\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Lang;

class UserdetailsController extends Controller
{

    /**
     * Handles Registration Request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'fullname' => 'required|min:3',
//            'email' => 'required|email|unique:users',
            'email' => 'required|email',
            'type' => 'required|in:user,driver',
            'mobile' => 'required',
            'password' => 'required|min:6|required_with:c_password|same:c_password',
            'c_password' => 'min:6'
        ]);

        if ($validator->fails()) {
            $error = $validator->messages()->toArray();
            foreach ($error as $er) {
                $error_msg[] = $er[0];
            }
            //                return @Lang::get('messages.welcome');
            return response()->json(['error' => $error_msg], 200);
        }

        $user = User::create([
            'name' => $request->fullname,
            'email' => $request->email,
            'type' => $request->type,
            'mobile' => $request->mobile,
            'password' => bcrypt($request->password)
        ]);

        $token = $user->createToken('TutsForWeb')->accessToken;

        return response()->json([
            'data' => [
                'token' => $token, 'name' => $user['name'], 'user_data' => $user,
            ],
            'message' => @Lang::get('messages.registered'),
            'success' => true
        ], 200);
    }

    /**
     * Handles Login Request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required|min:6'
        ]);

        if ($validator->fails()) {
            $error = $validator->messages()->toArray();
            foreach ($error as $er) {
                $error_msg[] = $er[0];
            }
            return response()->json(['error' => $error_msg], 200);
        }
        $credentials = [
            'email' => $request->username,
            'password' => $request->password
        ];
        if (is_numeric($request->get('username'))) {
            $credentials = [
                'mobile' => $request->username,
                'password' => $request->password
            ];
        }
        /* elseif (filter_var($request->get('email'), FILTER_VALIDATE_EMAIL)) {
            return ['email' => $request->get('email'), 'password' => $request->get('password')];
        }*/




        if (auth()->attempt($credentials)) {
            // createToken
            $token = auth()->user()->createToken('TutsForWeb')->accessToken;
            // $token = auth()->user()->createmaileToken('TutsForWeb')->accessToken;
            return response()->json([
                'user_info' => auth()->user()->toArray(), 'access_token' => $token
            ], 200);
        } else {
            return response()->json(['error' => 'UnAuthorised'], 401);
        }
    }

    /**
     * Returns Authenticated User Details
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function details()
    {
        return response()->json(['user' => auth()->user()], 200);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('userdetails::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('userdetails::create');
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
        return view('userdetails::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('userdetails::edit');
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
