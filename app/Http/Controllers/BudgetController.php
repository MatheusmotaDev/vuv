<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Budget;
use App\Models\Quotation;

class BudgetController extends Controller
{
    public function store(Request $request, Quotation $quotation)
    {
        // Validar os dados
        $validatedData = $request->validate([
            'prices' => 'required|array',
            'total-price' => 'required|numeric',
        ]);

        // Criar o orçamento
        $budget = new Budget();
        $budget->seller_id = auth()->id();  // Assumindo que o vendedor está logado
        $budget->quotation_id = $quotation->id;
        $budget->status = 'pending';
        $budget->total_price = $validatedData['total-price'];
        $budget->save();

        // Adicionar os itens ao orçamento
        foreach ($validatedData['prices'] as $itemId => $price) {
            $budget->items()->attach($itemId, ['price' => $price]);
        }

        // Redirecionar ou retornar resposta
        return redirect()->back()->with('success', 'Orçamento criado com sucesso.');
    }
}
