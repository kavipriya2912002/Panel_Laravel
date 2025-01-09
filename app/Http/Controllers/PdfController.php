<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;

class PdfController extends Controller
{
    public function generateTransactionPdf($transactionId)
    {
        // Check if the transaction exists
        $transaction = Transaction::find($transactionId);
    
        if (!$transaction) {
            // Log the error if the transaction does not exist
            Log::error("Transaction not found: {$transactionId}");
            return response()->json(['error' => 'Transaction not found'], 404);
        }
    
        // Log the data if the transaction exists
        $data = [
            'transactionType' => $transaction->transaction_type,
            'userId' => $transaction->user_id,
            'date' => $transaction->datetime,
            'status' => $transaction->status,
            'amount' => $transaction->amount,
            'transactionId' => $transaction->transaction_id,
        ];
    
        Log::info('Generating PDF for transaction:', $data);
    
        // Generate the PDF
        $pdf = Pdf::loadView('reports.transactions', $data);
    
        // Return the PDF response
        return response($pdf->output(), 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="transaction_' . $transaction->transaction_id . '.pdf"');
    }
    
}
