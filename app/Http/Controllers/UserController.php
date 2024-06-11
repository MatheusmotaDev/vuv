<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Rules\MatchOldPassword;
use Carbon\Carbon;

class UserController extends Controller
{
    public function edit()
    {
        if (Auth::user()->isSeller()) {
            return view('seller.edit');
        } else {
            return view('customer.edit');
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
        ]);

        Auth::user()->update($request->only('name', 'email'));

        if (Auth::user()->isSeller()) {
            return redirect()->route('seller.dashboard')->with('success', 'Perfil atualizado com sucesso.');
        } else {
            return back()->with('success', 'Perfil atualizado com sucesso.');
        }
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'password' => ['required', new MatchOldPassword],
        ]);

        Auth::user()->delete();

        return redirect('/')->with('success', 'Conta excluída com sucesso.');
    }

    public function saudacaoUsuario()
    {
        $horaAtualBrasil = Carbon::now('America/Sao_Paulo')->hour;
        $saudacao = "";

        if ($horaAtualBrasil >= 6 && $horaAtualBrasil < 12) {
            $saudacao = "Bom dia";
        } elseif ($horaAtualBrasil >= 12 && $horaAtualBrasil < 18) {
            $saudacao = "Boa tarde";
        } else {
            $saudacao = "Boa noite";
        }

        $nomeUsuario = Auth::user()->name;

        return "$saudacao, $nomeUsuario";
    }
}
