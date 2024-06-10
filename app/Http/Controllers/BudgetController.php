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
        $budget->seller_id = auth()->id();  
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

    public function showBudgets(Quotation $quotation)
    {
        $budgets = $quotation->budgets()->with('items', 'seller')->get();
        return view('customer.budgets', compact('budgets', 'quotation'));
    }

    public function acceptBudget(Request $request, Quotation $quotation, Budget $budget)
    {
        if ($quotation->status !== 'in_progress') {
            $quotation->status = 'in_progress';
            $quotation->save();

            // Aceitar o orçamento
            $budget->status = 'accepted';
            $budget->save();

            // Recusar outros orçamentos
            $quotation->budgets()->where('id', '!=', $budget->id)->update(['status' => 'refused']);

            // Passar os parâmetros corretamente para a rota
            return redirect()->route('customer.budgets.accepted', ['quotation' => $quotation, 'budget' => $budget])->with('success', 'Orçamento aceito com sucesso.');
        }

        return redirect()->back()->with('error', 'Não foi possível aceitar o orçamento.');
    }

    public function refuseBudget(Request $request, Quotation $quotation, Budget $budget)
    {
        $budget->status = 'refused';
        $budget->save();

        return redirect()->back()->with('success', 'Orçamento recusado com sucesso.');
    }

    public function acceptedBudget(Quotation $quotation, Budget $budget)
    {
        return view('customer.budget-accepted', compact('budget'));
    }

    public function index()
{
    // Obter os orçamentos do vendedor autenticado
    $budgets = Budget::where('seller_id', auth()->id())->with('quotation')->get();

    // Retornar a view com os orçamentos
    return view('seller.budgets', compact('budgets'));
}
}
