<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Rules\LegalIdRule;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Validation\Rules;

class SellerRegistrationController extends Controller
{
    public function create() : View
    {
        return view('auth.seller.register');
    }

    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'legal_id' => ['required','unique:users,legal_id', new LegalIdRule],
            'phone_number' => ['required','unique:users,phone_number','regex:#\([1-9]{2}\) (?:[2-8]|9[0-9])[0-9]{3}\-[0-9]{4}#']
        ]);

        $seller = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'legal_id' => $request->legal_id,
            'phone_number' => $request->phone_number,
            'role' => 'seller'
        ]);

        Auth::login($seller);

        return redirect(route('seller.dashboard', absolute:false));
    }
}
