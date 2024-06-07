<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    public function store(Request $request, ) : RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            ''
        ]);

        $request->user()->load('budgets');
        $budget = $request->user()->budgets()->create([
            'name' => $request->name
        ]);

        $budget->items()->attach();

        return redirect('/');
    }
}
