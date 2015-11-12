<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Redirect;
use Validator;
use App\Model\Admin\UserModel;
use Auth;

class UserController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data = User::where('admin_access_level',99)->get();
//     dd($data);
        return view('admin.pages.user.user_manage')->with('data', $data);
    }

    public function user_manage_status($id) {
        $data = User::findOrfail($id);
        if ($data->status == 0) {
            User::where('id', $id)->update(['status' => 1]);
            return redirect()->route('user_manage')->with('message', 'status change successfully.....');
        } elseif ($data->status == 1) {
            User::where('id', $id)->update(['status' => 0]);
            return redirect()->route('user_manage')->with('message', 'status change successfully.....');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUserRegister() {
        return view('admin.pages.user.user_register');
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
                    'mobile' => 'required|max:20|unique:customer',
                    'password' => 'required|confirmed|min:5',
        ]);

        if ($validator->fails()) {
            return redirect('/user_register')
                            ->withInput()
                            ->withErrors($validator);
        } else {
            $this->create($request->all());
            return redirect()->intended('/user_register')->with('message','New User insert successfully....');
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
        $user= UserModel::create([
                    'admin_id' =>$admin->id,
                    'name' => $data['name'],
                    'mobile' => $data['mobile'],
                    'present_address' => $data['present_address'],
                    'status' => '1',
        ]);
        
        User::create([
                    'user_id'=>$user->id,
                    'email' => $data['email'],
                    'password' => bcrypt($data['password']),
                    'admin_access_level' => '99',
                   
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
    public function edit($id, $access_id) {
   //    dd($id,$access_level);
        $count = User::where(['id' => $id, 'admin_access_level' => $access_id])->count();
      //  dd($count);
        if ($count == 1) {
            //get the adin I
            $user=User::where(['id' => $id, 'admin_access_level' => $access_id])->get();
          foreach ($user as $info)
          { //dd($user_info);
            $user_id=$info->user_id; 
          }
            $data = UserModel::where('id',$user_id)->get();
           // dd($data);
            return view('admin.pages.user.user_manage_edit')->with('data', $data);
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
        $data=  UserModel::findOrfail($id);
        $data->update($input);
       return redirect()->route('user_manage')->with('message','change successfully.....');
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
            $user_id=$d->user_id;
        }
        $data=  UserModel::findOrfail($user_id);
        $dataUser->delete($id);
        $data->delete($user_id);
        return redirect()->route('user_manage')->with('message','user data delete successfully.....');
    }

}
