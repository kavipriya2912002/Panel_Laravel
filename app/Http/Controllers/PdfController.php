<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function generateTransactionPdf($transactionId)
    {
        // Fetch transaction details from the database
        $transaction = Transaction::findOrFail($transactionId);

        // Pass transaction data to the PDF view
        $data = [
            'transactionType' => $transaction->transaction_type,
            'userId' => $transaction->user_id,
            'date' => $transaction->datetime,
            'status' => $transaction->status,
            'amount' => $transaction->amount,
            'transactionId' => $transaction->transaction_id,
        ];

        // Generate PDF
        $pdf = Pdf::loadView('reports.transaction', $data);

        // Return PDF as a response
        return $pdf->download("transaction_{$transaction->transaction_id}.pdf");
    }
}
