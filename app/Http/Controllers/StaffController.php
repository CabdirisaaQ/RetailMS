<?php

namespace Retailms\Http\Controllers;

use Auth;
use Validator;
use Retailms\Models\User;
use Illuminate\Http\Request;

class StaffController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {	
    	 // get all the staff
        $staff = user::all();

        // load the view and pass the staff
        return View('admin.staff.index')
            ->with('staff', $staff);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.staff.createStaff');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //dd('all ok');
        $this->validate($request, [
            'fname'         => 'required|max:255',
            'lname'         => 'required|max:255',
            'username'      => 'required|alpha_dash|max:255|unique:users',
            'employment'    => 'required|max:255',
            'permission'    => 'required|max:255',
            //'password'      => 'required|confirmed|min:6',
            'password'      => 'required|min:6',
        ]);

        $now = new \DateTime();
        User::create([
            'fname'      =>  $request->input('fname'),
            'lname'      =>  $request->input('lname'),
            'username'   =>  $request->input('username'),
            'employment' =>  $request->input('employment'),
            'permission' =>  $request->input('permission'),
            'password'   =>  bcrypt($request->input('password')),
            'created_by' =>  $request->user()->username,
            'created_at' =>  $now,
            'updated_by' =>  NULL,
            'updated_at' =>  NULL,
        ]);

        return redirect()
        ->route('admin.staff.index')
        ->with('info', 'New staff had been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        // get all staff
        $staff = user::find($id);

        // show the view and pass the staff to it
        return view('admin.staff.findStaff')
                ->with('staff', $staff);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        // find staff
        $staff = user::find($id);

        /*// Generating the select markup
        if ($staff->employment == "manager") {
            $staff->employment = '<option value="casheir" >Casheir</option><option value="manager" selected>Manager</option>';
        } else {
            $staff->employment = '<option value="casheir" selected>Casheir</option><option value="manager">Manager</option>';
        }

        if ($staff->permission == "user") {
            $staff->permission = '<option value="user" selected>User</option><option value="admin">Admin</option>';
        } elseif ($staff->permission == "admin") {
            $staff->permission = '<option value="user">User</option><option value="admin" selected>Admin</option>';
        }*/
        

        // $staff->employment = "n";
        // dd($staff->employment);

        // show the view and pass the staff to it
        return view('admin.staff.editStaff')
                ->with('staff', $staff);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request,$id)
    {
        // update staff

        $this->validate($request, [
            'fname'         => 'required|max:255',
            'lname'         => 'required|max:255',
            'username'      => 'required|alpha_dash|max:255',
            'employment'    => 'required|max:255',
            'password'      => 'required|min:6',
        ]);

        // store
        $now = new \DateTime();
        $staff = user::find($id);
        $staff->fname      =  $request->input('fname');
        $staff->lname      =  $request->input('lname');
        $staff->username   =  $request->input('username');
        $staff->employment =  $request->input('employment');
        $staff->permission =  $request->input('permission');
        $staff->password   =  bcrypt($request->input('password'));
        $staff->updated_by =  $request->user()->username;
        $staff->updated_at =  $now;
        $staff->save();

        // redirect
        return redirect()
            ->route('admin.staff.index')
            ->with('info', 'Staff had been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        // deleting staff
        $staff = user::find($id);
                $staff->delete();

         // redirect
         return redirect()
                    ->route('admin.staff.index')
                    ->with('info', 'Staff had been deleted successfully.');;
    }
}