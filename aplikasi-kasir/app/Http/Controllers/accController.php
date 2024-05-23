<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class accController extends Controller
{   
    // Login & Register buat Admin
    public function login(Request $request) {
        $incomingFields = $request -> validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (auth()->attempt(['email' => $incomingFields['email'], 'password' => $incomingFields['password']])) {
            $request->session()->regenerate();
            return redirect('/dashboard');
        }
        else {
            return redirect('/loginw');
        }
    }

    public function logout() {
        auth() -> logout ();
        return redirect('/');
    }

    public function register(Request $request) {
        $incomingFields = $request->validate([
            'nama' => ['required', 'min:3', 'max:25', Rule::unique('users', 'nama')],
            'email' => ['required', 'min:3', Rule::unique('users', 'email')],
            'password' => 'required'
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
        auth()->login($user);

        return redirect('dashboard');
    }   // Login & Register buat Admin

    // Tambah data member
    public function addMemberData(Request $request) {
        $member = new User();

        $member -> nama = $request -> namaMember;
        $member -> noTelepon = $request -> noTelepon;
        $member -> userValue = 1;

        $member -> save();

        return redirect('member');
    }

    public function delMember($id) {

        $user = User::find($id);

        $user->delete();

        return redirect()->back();

    }

    public function updateDiscUp($id) {

        $user = User::find($id);

        if ($user->discount === 0.30) {
            return redirect()->back();
        } else if ($user->discount <= 0.30) {
            $user -> discount += 0.10;
        }

        $user -> save();

        return redirect()->back();        
    }

    public function updateDiscDown($id) {

        $user = User::find($id);

        if ($user->discount === 0) {
            return redirect()->back();
        } else if ($user->discount > 0) {
            $user -> discount -= 0.10;
        }

        $user -> save();

        return redirect()->back();        
    }

}

