<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\User;
use App\Patient;

class AdminController extends Controller
{
    public function view_staff()
    {
        $staffs = User::where('privileges','!=','admin')->get();

        return view('layouts.admin.view_staff')->with(['staffs' => $staffs]);
    }
    public function add_staff()
    {
        // $staffs = User::where('privileges','!=',1)->get();

        return view('layouts.admin.add_staff');
    }
    public function register(Request $request)
    {
        $credentials =  $request->validate([
            'name' => 'required|max:25',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'privileges' => 'required'
        ]);
        $user = new User();
        $user->name = $credentials['name'];
        $user->email = $credentials['email'];
        $user->password = Hash::make($credentials['password']);
        $user->privileges = $credentials['privileges'];
        
        $user->save();

        return back()->with('success','New staff added successfully');
    }
    public function edit($id)
    {
        $staff = User::findOrFail($id);
        return view('layouts.admin.edit_staff')->with(['staff' => $staff]);
    }
    public function update($id)
    {
        $user = User::findOrFail($id);

        $user->name = request()->name;
        $user->email = request()->email;
        $user->privileges = request()->privileges;

        $user->save();

        return back()->with('success','Staff record updated successfully');
    }
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return back()->with('success','Staff record deleted successfully');
    }

    public function patients()
    {
        // get all patients in the system
        $patients = Patient::all();

        return view('layouts.admin.view_patients')->with('patients',$patients);
    }

    public function remove_patient($id)
    {
        $patient = Patient::findOrFail($id);

        $patient->delete();

        return back()->with('success','Patient record deleted successfullly');
    }

    public function view_history($id)
    {
        $history = Patient::findOrFail($id);

        return view('layouts.admin.history')->with('history',$history);
    }
}
