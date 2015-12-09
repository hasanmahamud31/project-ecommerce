<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Redirect;
use Validator;
use App\Model\Admin\StaffModel;
use Auth;

class StaffController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data = User::where('access_level',21)->get();
//     dd($data);
        return view('admin.pages.staff.staff_manage')->with('data', $data);
    }

    public function staff_manage_status($id) {
        $data = User::findOrfail($id);
        if ($data->status == 0) {
            User::where('id', $id)->update(['status' => 1]);
            return redirect()->route('staff_manage')->with('message', 'status change successfully.....');
        } elseif ($data->status == 1) {
            User::where('id', $id)->update(['status' => 0]);
            return redirect()->route('staff_manage')->with('message', 'status change successfully.....');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getStaffRegister() {
        return view('admin.pages.staff.staff_register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
                    'name' => 'required|max:120',
                    'email' => 'required|email|max:120|unique:users',
                    'mobile' => 'required|max:20|unique:staffs',
                    'password' => 'required|confirmed|min:5',
        ]);

        if ($validator->fails()) {
            return redirect('/staff_register')
                            ->withInput()
                            ->withErrors($validator);
        } else {
            $this->create($request->all());
            return redirect()->intended('/staff_register')->with('message','New Staff insert successfully....');
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data) {
//        echo '<pre>';
//         print_r($data);
//       exit();
        $admin=Auth::User();
        $staff= StaffModel::create([
                    'admin_id' =>$admin->id,
                    'name' => $data['name'],
                    'mobile' => $data['mobile'],
                    'NID' => $data['NID'],
                    'present_address' => $data['present_address'],
                    'permanent_address' => $data['permanent_address'],
                    'staff_joining_date' => $data['staff_joining_date'],
                    'status' => '1',
        ]);
        
        User::create([
                    'user_id'=>$staff->id,
                    'email' => $data['email'],
                    'password' => bcrypt($data['password']),
                    'access_level' => '21',
                   
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $access_level) {
   //    dd($id,$access_level);
        $count = User::where(['id' => $id, 'access_level' => $access_level])->count();
      //  dd($count);
        if ($count == 1) {
            //get the adin I
            $user=User::where(['id' => $id, 'access_level' => $access_level])->get();
          foreach ($user as $info)
          { //dd($user_info);
            $staff_id=$info->user_id; 
          }
            $data = StaffModel::where('id',$staff_id)->get();
           // dd($data);
            return view('admin.pages.staff.staff_manage_edit')->with('data', $data);
        } else {
            echo 'contact the developer';
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id) { 
       // dd($request,$id); 
        
        $input=$request->all();
        $data=  StaffModel::findOrfail($id);
        $data->update($input);
       return redirect()->route('staff_manage')->with('message','change successfully.....');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id) {
       // dd($id);      
        $dataUser=  User::findOrfail($id);
        $dataUse=  User::where('id',$id)->get();
        foreach ($dataUse as $d){
            $staff_id=$d->user_id;
        }
        $data=  StaffModel::findOrfail($staff_id);
        $dataUser->delete($id);
        $data->delete($staff_id);
        return redirect()->route('staff_manage')->with('message','staff data delete successfully.....');
    }

}
