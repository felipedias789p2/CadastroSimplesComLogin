<?php

namespace App\Http\Controllers;

use App\Http\Requests\StockRequest;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::latest()->paginate(5);
        return view('dashboard', compact('stocks'))->with('i', (request()->input('page', 1) - 1) * 15);
    }

    public function create()
    {
        return view('stocks.create');
    }

    public function store(StockRequest $request)
    {
        Stock::create($request->all());
        return redirect()->route('stocks.index')->with('success', 'Created Successfully.');
    }


    public function show($id)
    {
        $stock = Stock::find($id);
        return view('stocks.show', compact('stock'));
    }


    public function edit($id)
    {
        $stock = Stock::find($id);
        return view('stocks.edit', compact('stock'));
    }

    public function update(StockRequest $request, Stock $stock)
    {

        $stock->update($request->all());
        return redirect()->route('stocks.index')->with('success', 'Updated Successfully.');
    }

    public function destroy($id)
    {
        $flight = Stock::find($id);
        $flight->delete();
        return redirect()->route('stocks.index')->with('success', 'Registro Excluido com sucesso.');
    }

    public function search(Request $request)
    {
        $filtro = $request->all();
        $pecas = Stock::where('product_name', 'LIKE', "%{$request->search}%")->orWhere('product_desc', 'LIKE', "%{$request->search}%")->get();
        return view('stocks.index', compact('pecas', 'filtro'));
    }
}
