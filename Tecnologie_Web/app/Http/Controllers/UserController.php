<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ModifyPassUserRequest;
use App\Http\Requests\ModifyUserRequest;

class UserController extends Controller {
    
    protected $_userModel;
    protected $redirectTo = 'modificaprof';
    
    
    public function __construct() {
        $this->middleware('can:isUser');
        $this->_userModel = new User;
    }

    public function index() {
        return view('welcome');
    }
    
    public function modificaprof() {
        $user = $this->_userModel->getUser();
        return view('user.modificaprof')
        ->with('user', $user);
    }
    
    public function showmodificaform(ModifyUserRequest $request) {
        $user = Auth::user();
        $user->fill($request->validated());
        $user->save();
        return response()->json(['redirect' => route('modificaprof')]);
    }
    
    public function modificaPass(ModifyPassUserRequest $request){
        //$user=$this->_userModel->getUser();
        $user = auth()->user();
        //$user = User::where('id', $id)->get()->first();
        if (!(Hash::check($request->get('old_password'), $user->password))) { 
            return redirect()->back();
        }
 
        if(strcmp($request->get('old_password'), $request->get('password')) == 0){
            return redirect()->back();
        }
        $user->fill($request->validated());
        $newPassword = $request->input('modpassword');
        $user->password = Hash::make($newPassword);
        $user->update();
        return redirect()->route('home');
    }
    
    public function showPassword(){
        $user = $this->_userModel->getUser();
        return view('user.modificaPassUser');
    }

}
