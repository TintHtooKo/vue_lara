<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){
        return view('admin.profile.index');
    }

    public function updateAdmin(Request $request){
        $this->validateAdmin($request);
        $data = $this->adminData($request);
        User::where('id',Auth::user()->id)->update($data);
        return back()->with(['updateSuccess'=>'Admin Profile Updated Successfully']);
    }

    public function changePasswordPage(){
        return view('admin.profile.changePassword');
    }

    public function changePassword(Request $request){
        $this->validatePassword($request);
        $dbData = User::where('id',Auth::user()->id)->first();
        $dbPassword = $dbData->password;
        if(Hash::check($request->oldpassword,$dbPassword)){
            $data = [
                'password' => Hash::make($request->newpassword)
            ];
            User::where('id',Auth::user()->id)->update($data);
            return to_route('dashboard');
        }else{
            return back()->with(['updateError'=>'Old Password Not Match']);
        }
    }

    private function validateAdmin($request){
        $request->validate([
            'name' => 'required',
        ]);
    }

    private function adminData($request){
        return [
            'name' => $request->name,
            'email'=> $request->email,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'gender'=>$request->gender
        ];
    }

    private function validatePassword($request){
        $request->validate([
            'oldpassword' => 'required', 
            'newpassword' => 'required',
            'confirmPassword' => 'required|same:newpassword',
        ]);
    }
}
