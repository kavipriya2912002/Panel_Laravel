<?php

namespace App\Http\Controllers;

use App\Models\AllTransaction;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;

class PdfController extends Controller
{
  

public function generateTransactionPdf($transactionId)
{
    // Fetch the transaction from the database
    $transaction = AllTransaction::find($transactionId);

    if (!$transaction) {
        Log::error("Transaction with ID {$transactionId} not found.");
        return response()->json(['error' => 'Transaction not found'], 404);
    }

    $data = [
        'transactionType' => $transaction->transaction_type,
        'userId' => $transaction->user_id,
        'date' => $transaction->datetime,
        'status' => $transaction->status,
        'amount' => $transaction->amount,
        'transactionId' => $transaction->transaction_id,
    ];

    // Log the data being passed to the PDF
    Log::info('Generating PDF for transaction:', $data);

    // Generate PDF
    $pdf = Pdf::loadView('reports.transactions', $data);

    // Return PDF as a response
    return $pdf->download("transaction_{$transaction->transaction_id}.pdf");
}

    
}
