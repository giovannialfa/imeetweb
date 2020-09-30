<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::where('status', 'normal')->get();
        $currentAdmin = Admin::where('id', Auth::id())->get();
        return view('admin.admin', ['admins' => $admins, 'currentAdmin' => $currentAdmin]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $output = '';
        $validator = Validator::make($request->all(), [
            'adminFullname'=>'required',
            'adminId'=>'required',
            'adminPassword'=>'required',
            'currentBuilding'=>'required',
         ]);
        if(!$validator->fails()) {
            $admin = Admin::create([
                'fullname' => $request->adminFullname,
                'adminId' => $request->adminId,
                'password' => $request->adminPassword,
                'building'=> $request->currentBuilding,
                'status' => 'normal',
            ]);
            $output .= 'Failed';
        }
        else {
            $output .= 'Success';
            // return response()->json(['code'=>500,'message'=>'Post Failed', 'building'=> $request->currentBuilding, 'fullname' =>$request->adminFullname],500);
        }

        return $output;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
