<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::orderBy('created_at', 'DESC')->whereNotIn('status', ['Proses'])->get();
        return view('transaction.index', compact('invoices'));
    }

    public function pay(Request $request, $id)
    {
        $data = $request->validate([
            'nominal' => 'required|numeric|min:1',
        ]);
        $invoice = Invoice::find($id);
        if ($data['nominal'] < $invoice->total) {
            return redirect('/dashboard/transactions/' . $id)->with('failed', 'Nominal lebih kecil dari total!!!');
        }
        $refund = $invoice->total - $data['nominal'];
        $invoice->update([
            'refund' => $refund,
            'status' => 'Lunas'
        ]);
        return redirect('/dashboard/transactions/' . $id)->with('success', 'Pembayaran Berhasil');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $transaction)
    {
        return view('transaction.detail', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $transaction)
    {
        //
    }
}
