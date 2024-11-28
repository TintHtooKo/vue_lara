<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function index(){
        $userData = User::select('id','name','email','phone','address','gender')
                        ->when(request('search'),function($query){
                            $query->whereAny(['name','email','phone','address','gender'],
                            'like','%'.request('search').'%');
                        })
                        ->get();
        return view('admin.list.index',compact('userData'));
    }

    public function adminDelete($id){
        User::find($id)->delete();
        return back()->with(['deleteSuccess'=>'Admin Deleted Successfully']);
    }
}
