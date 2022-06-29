<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Currency;
class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currencies = Currency::all();      
        return view('dashboard', compact('currencies'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|max:255',
            'currency' => 'required|max:255',
            ]);
        
        Currency::insert([
            'code' => $request->code,
            'currency' => $request->currency,
           ]);            
        
            return Redirect()->back()->with('success', 'Currency Successfully Created');   
        
        }

    public function edit($id)
    {
        $currency = Currency::find($id);
        return view('admin.currencies.edit', compact('currency'));
    }

    public function update(Request $request, $id)
    {
        $update = Currency::find($id)->update([
            'code' => $request->code,
            'currency' => $request->currency,
            ]);            
        return Redirect()->route('currency')->with('success', 'Currency Successfully Updated'); 

    }

    public function destroy($id)
    {
        $delete = Currency::find($id)->delete();
        return Redirect()->route('currency')->with('success', 'Currency Successfully Deleted'); 

    }
}
