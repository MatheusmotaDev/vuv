<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use App\Models\User;
use App\Notifications\NewQuotation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class QuotationController extends Controller
{
    public function create(): View
    {
        return view('customer.new-quotation');
    }

    public function store(Request $request): RedirectResponse
    {
        // Decode the string(in json format) that comes from the items input
        $request['quotationItems'] = json_decode($request->input('quotationItems'), true);

        $request->validate([
            'quotationTitle' => 'required|string|max:255',
            'deliveryAddress' => 'required|string|max:255',
            'generalNotes' => 'string|max:1028',
            'quotationItems.*.category' => 'required|string',
            'quotationItems.*.name' => 'required|string',
            'quotationItems.*.quantity' => 'required|numeric',
            'quotationItems.*.brand' => 'required|string',
            'quotationItems.*.description' => 'required|string|max:512'
        ]);

        $request->user()->load('quotations');
        $quotation = $request->user()->quotations()->create([
            'name' => $request->quotationTitle,
            'shipping_address' => $request->deliveryAddress,
            'notes' => $request->generalNotes,
        ]);

        $quotation->items()->createMany($request->quotationItems);

        // Notify sellers about the new quotation
        $sellerUsers = User::where('role', 'seller')->get();
        foreach ($sellerUsers as $seller) {
            $seller->notify(new NewQuotation($quotation));
        }

        return redirect()->back()->with('status', 'Cotação criada com sucesso');
    }

    // Visualizando cotações especificas
    public function index(): View
    {
        $quotations = auth()->user()->quotations;
        return view('customer.quotations', ['quotations' => $quotations]);
    }

    // Itens da cotação especifica
    public function showItems(Quotation $quotation): View
    {
        return view('customer.items', ['quotation' => $quotation]);
    }

    // Lista cotações (admin)
    public function adminIndex()
    {
        $quotations = Quotation::all();
        return view('admin.quotations', ['quotations' => $quotations]);
    }

    // Apaga cotações ( admin )
    public function destroy(Quotation $quotation)
    {
        $quotation->delete();
        return redirect()->route('admin.quotations.index')->with('success', 'Cotação excluída com sucesso.');
    }

    public function closeQuotation(Request $request, Quotation $quotation)
    {
        $quotation->status = 'closed';
        $quotation->save();

        return redirect()->route('customer.quotations')->with('success', 'Cotação encerrada com sucesso.');
    }

    public function print(Quotation $quotation)
    {
        return view('customer.print_quotation', compact('quotation'));
    }

    public function clearNotifications(Request $request)
    {
        // Limpar as notificações do usuário autenticado
        auth()->user()->unreadNotifications()->delete();
        
        // Redirecionar de volta para a página anterior
        return back()->with('success', 'Notificações limpas com sucesso.');
    }
    
}

