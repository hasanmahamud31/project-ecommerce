<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Redirect;
use Validator;
use App\Model\Admin\AdminModel;


class AdminController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data = User::where('admin_access_level',12)->get();
//     dd($data);
        return view('admin.pages.admin.admin_manage')->with('data', $data);
    }

    public function admin_manage_status($id) {
        $data = User::findOrfail($id);
        if ($data->status == 0) {
            User::where('id', $id)->update(['status' => 1]);
            return back()->with('message', 'status change successfully.....');
        } elseif ($data->status == 1) {
            User::where('id', $id)->update(['status' => 0]);
            return back()->with('message', 'status change successfully.....');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAdminRegister() {
        return view('admin.pages.admin.admin_register');
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
                    'mobile' => 'required|max:20|unique:admins',
                    'password' => 'required|confirmed|min:5',
        ]);

        if ($validator->fails()) {
            return back()->withInput()
                         ->withErrors($validator);
        } else {
            $this->create($request->all());
            return redirect()->intended('/admin_register')->with('message','New Admin insert successfully....');
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
        $admin= AdminModel::create([
                    'name' => $data['name'],
                    'mobile' => $data['mobile'],
        ]);
        
        User::create([
                    'user_id'=>$admin->id,
                    'email' => $data['email'],
                    'password' => bcrypt($data['password']),
                    'admin_access_level' => '12',
                   
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
        $count = User::where(['id' => $id, 'admin_access_level' => $access_level])->count();
      //  dd($count);
        if ($count == 1) {
            //get the adin I
            $user=User::where(['id' => $id, 'admin_access_level' => $access_level])->get();
          foreach ($user as $info)
          { //dd($user_info);
            $admin_id=$info->user_id; 
          }
            $data = AdminModel::where('id',$admin_id)->get();
           // dd($data);
            return view('admin.pages.admin.admin_manage_edit')->with('data', $data);
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
        $data=  AdminModel::findOrfail($id);
        $data->update($input);
       return redirect()->route('manage_admin')->with('message','change successfully.....');
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
            $admin_id=$d->user_id;
        }
        $data=  AdminModel::findOrfail($admin_id);
        $dataUser->delete($id);
        $data->delete($admin_id);
        return back()->with('message','admin data delete successfully.....');
    }

}
