<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class UserrController extends Controller
{
    //
    public function index() 
    {  
        $datauser=User::all();
        return view('user.index', compact('datauser'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'namalengkap'=> 'required',
            'username'=> 'required',
            'password'=> 'required',
            'status'=> 'required'
        ]);
        $pas= $request->password;
        $user=User::create([
            'name'=> $request->namalengkap,
            'email'=> $request->username,
            'password'=> Hash::make($pas),
            'status'=> $request->status
        ]);
        if($user)
        {
            return redirect()->route('user.index');
        }else{
            return redirect()->route('user.create');
        }
    }

    public function edit($id)
    {
        $user=User::find($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'namalengkap'=> 'required',
            'username'=> 'required',
            'status'=> 'required'
        ]);
        $pas= $request->password;
        $user=User::find($id);
        if($pas=="")
        {
            $user->update([
                'name'=> $request->namalengkap,
                'email'=> $request->username,
                //'password'=> Hash::make($pas),
                'status'=> $request->status
            ]);
        }else{
            $user->update([
            'name'=> $request->namalengkap,
            'email'=> $request->username,
            'password'=> Hash::make($pas),
            'status'=> $request->status 
        ]);
        }
       
        if($user)
        {
            return redirect()->route('user.index');
        }else{
            return redirect()->route('user.create');
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id); // Find the user by ID
        $user->delete(); // Delete the user

        // Redirect back to user list with success message
        return redirect()->route('user.index')->with('success', 'User deleted successfully.');
    }
}

