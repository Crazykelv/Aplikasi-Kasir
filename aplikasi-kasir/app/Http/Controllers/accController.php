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
            'loginemail' => 'required',
            'loginpassword' => 'required'
        ]);

        if (auth()->attempt(['enail' => $incomingFields['loginemail'], 'password' => $incomingFields['loginpassword']])) {
            $request->session()->regenerate();
            return redirect('/');
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

        return redirect('/home');
    }   // Login & Register buat Admin

    // Tambah data member
    public function addMember(Request $request) {
        $member = new User();

        $member -> nama = $request -> namaMember;
        $member -> noTelepon = $request -> noTelepon;
        $member -> discount = $request -> discount;

        $member -> save();
    }

}
