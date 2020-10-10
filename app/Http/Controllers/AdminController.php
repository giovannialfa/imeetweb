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

        $adms = Admin::all();
        return view('admin.admin')->with('adms',$adms);
        // $admins = Admin::where('status', 'normal')->get();
        // $currentAdmin = Admin::where('id', Auth::id())->get();
        // return view('admin.admin', ['admins' => $admins, 'currentAdmin' => $currentAdmin]);
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
        $adms = Admin::where('status', 'normal')->get();
        $this->validate($request,[
            'fullname' => 'required',
            'adminId' => 'required',
            'password' => 'required',
        ]);

        $adms = new Admin;

        $adms->fullname = $request->input('fullname');
        $adms->adminId = $request->input('adminId');
        $adms->password = $request->input('password');
        $adms->building = 'Graha';
        $adms->status = 'normal';

        
        $adms->save();

        return redirect('/admin')->with('success','Data Saved');

        // $output = '';
        // $validator = Validator::make($request->all(), [
        //     'adminFullname'=>'required',
        //     'adminId'=>'required',
        //     'adminPassword'=>'required',
        //     'currentBuilding'=>'required',
        //  ]);
        // if(!$validator->fails()) {
        //     $admin = Admin::create([
        //         'fullname' => $request->adminFullname,
        //         'adminId' => $request->adminId,
        //         'password' => $request->adminPassword,
        //         'building'=> $request->currentBuilding,
        //         'status' => 'normal',
        //     ]);
        //     $output .= 'Failed';
        // }
        // else {
        //     $output .= 'Success';
        //     // return response()->json(['code'=>500,'message'=>'Post Failed', 'building'=> $request->currentBuilding, 'fullname' =>$request->adminFullname],500);
        // }

        // return $output;
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
        $this->validate($request,[
            'fullname' => 'required',
            'adminId' => 'required',
            'password' => 'required',
        ]);

        $adms = Admin::find($id);

        $adms->fullname = $request->input('fullname');
        $adms->adminId = $request->input('adminId');
        $adms->password = $request->input('password');
        $adms->building = 'Graha';
        $adms->status = 'normal';

        
        $adms->save();

        return redirect('/admin')->with('success','Data Updated');
        
        
        
        // $admin = Admin::find($id);

        // // $admin->adminFullname = $request->input('fullname');
        // // $admin->adminId = $request->input('adminId');
        // // $admin->adminPassword = $request->input('password');
        // if (Admin::where('id',$id)->exists()) {
        //     $updated = $admin->fill($request->all())->save();
        //     return 'Done';
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adms = Admin::find($id);
        $adms->delete();

        
        return redirect('/admin')->with('success','Data Deleted');
    }

    function AdminUpdate(Request $request) {
        $admin = Admin::where('id' ,$request->id);

        // $admin->adminFullname = $request->input('fullname');
        // $admin->adminId = $request->input('adminId');
        // $admin->adminPassword = $request->input('password');
        if (
            // Admin::where('id',$request->id)->exists()
            $admin
        ) {
            // 'fullname' => $request->fullname, 'adminId' => $request->adminId, 'password' => $request->password
            $updated = $admin->fill($request->all())->save();
            return 'OK';
        }
        else {
            return 'Error';
        }
    }
}