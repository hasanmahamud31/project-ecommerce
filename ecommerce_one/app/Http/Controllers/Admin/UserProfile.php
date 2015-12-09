<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Model\Admin\UserModel;
use Validator;
use App\User;
use Hash;
use Input;
use Storage;

class UserProfile extends Controller {

    public function index() {
        $user_info = Auth::User();
        $user_basic_info = UserModel::where('id', $user_info->user_id)->get();

        return view('admin.pages.profile.profile_manage')->with('user_info', $user_info)->with('user_basic_info', $user_basic_info);
    }

    public function edit_profile($id) {
        $data = UserModel::where('id', $id)->get();
        // dd($data);
        return view('admin.pages.profile.edit_profile')->with('data', $data);
    }

    public function update_profile(Request $request) {
        $input = $request->all();
        $id = $input['id'];
        UserModel::where('id', $id)->update(['name' => $input['name'],'mobile' => $input['mobile'],'present_address' => $input['present_address']]);
        return redirect()->route('profile')->with('message', 'status change successfully.....');
    }

    public function change_password($id) {
        return view('admin.pages.profile.update_password')->with('id', $id);
    }

    public function update_password(Request $request) {
        $input = $request->all();
        $validator = Validator::make($input, [
                    'old_password' => 'required|min:6',
                    'password' => 'required|confirmed|min:6',
        ]);
        $id = $input['id'];
        $old_password = $input['old_password'];
        if ($validator->fails()) {
            return back()
                            ->withInput()
                            ->withErrors($validator);
        } else {
            $user = User::findOrFail($id);
            if (Hash::check($old_password, $user->password)) {
                $user->fill([
                    'password' => Hash::make($input['password'])
                ])->save();
                return redirect()->route('profile')->with('message', 'password change successfully...');
            } else {
                return back()->with('message', 'your old password do not match....');
            }
        }
    }

    public function change_image($id) {
       return view('admin.pages.profile.change_image')->with('id', $id); 
    }
    public function update_image(Request $request) {
        $input = $request->all();
        $id=$input['id'];
      
       //image one start here..........
            if (Input::file('image1')) {
                $image = Input::file('image1');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $path = 'profile_image/';
                $request->file('image1')->move($path, $filename);
                $image_path = $path . $filename;
                
            }
            UserModel::where('id', $id)->update(['image' =>$image_path]);
        return redirect()->route('profile')->with('message', 'image upload successfully...');
    }

}
