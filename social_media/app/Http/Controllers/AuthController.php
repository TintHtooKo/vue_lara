<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //user login and release token
    public function login(Request $request){
        $user = User::where('email',$request->email)->first();
        if($user){
            if(Hash::check($request->password,$user->password)){
                return response()->json([
                    'user' => $user,
                    'token' => $user->createToken(time())->plainTextToken
                ]);
            }else{
                return response()->json([
                    'error' => 'Password does not match',
                    'user' => null,
                    'token' => null
                ]);
            }
        }else{
            return response()->json([
                'user' => null,
                'token' => null
            ]);
        }
    }

    public function register(Request $request){
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];

        $userExist = User::where('email',$request->email)->first();
        if($userExist){
            return response()->json([
                'error' => 'Email already registered',
            ]);
        }else{
            $user = User::create($data);
            return response()->json([
                'success' => 'User registered successfully',
                'user' => $user,
                'token' => $user->createToken(time())->plainTextToken
            ]);
        }
    }

    public function categoryList(){
        $category = Category::all();
        return response()->json([
            'data' => $category
        ]);
    }
}
