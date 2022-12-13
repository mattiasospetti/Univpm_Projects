<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewStaffRequest;
use App\Http\Requests\ModifyStaffRequest;
use Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller {

    public function __construct() {
        $this->middleware('can:isAdmin');
    }

    public function index() {
        return view('admin');
    }

    public function showformstaff() {
        return view('gestionestaff.inserimentostaff');
    }

    public function inseriscistaff(NewStaffRequest $request) {
        $user = new User;
        $user->fill($request->validated());
        $user->role = 'staff';
        $newPassword = $request->input('password');
        $user->password = Hash::make($newPassword);
        $user->save();
        return redirect()->route('admin');
    }

    public function showStaff() {
        $lista = DB::table('users')->where('role', '=', 'staff')->get();
        return view('gestionestaff.showStaff')
                        ->with('lista', $lista);
    }

    public function formModificaS($id) {
        $staff = DB::table('users')->where('id', $id)->first();
        return view('gestionestaff.modificaStaff')
                        ->with('staff', $staff);
    }

    public function modificaStaff(ModifyStaffRequest $request, $id) {
        $staff = User::where('id', $id)->get()->first();
        
        $staff->fill($request->validated());
        $newPassword = $request->input('password');
        $staff->password = Hash::make($newPassword);
        $staff->update();
        return redirect()->route('listastaff');
    }

    public function eliminaStaff() {
        $checked = Request::input('checked', []);
        foreach ($checked as $id) {
            User::where('id', $id)->delete(); //Assuming you have a Todo model. 
        }
        return redirect()->action('AdminController@showStaff');
    }
    
    public function showUsers() {
        $lista = User::where('role', '=', 'utente')->get();
        return view('gestionestaff.showUsers')
                        ->with('lista', $lista);
    }
    
    public function eliminaUtenti() {
        $checked = Request::input('checked', []);
        foreach ($checked as $id) {
            User::where('id', $id)->delete(); //Assuming you have a Todo model. 
        }
        return redirect()->action('AdminController@showUsers');
    }
}
