<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\LoginRequest;
use App\Models\Service;
use App\Models\ServiceProvider;
use App\Models\Wallet;
use App\Models\WalletHistory;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();

    // Fetch pending login requests
    $requests = LoginRequest::where('status', 'pending')->with('user')->get();

    // Pass both variables to the view
    return view('admin.dashboard', compact('users', 'requests'));
    }

   

    public function updateStatus(Request $request, $id)
{
    $user = User::findOrFail($id);
    
    // Log or debug to ensure correct user is being retrieved
    Log::info("Updating user ID: {$id}, action: {$request->action}");

    if ($request->action === 'allow') {
        $user->is_allowed = true;
        $user->save();

        // Log the status update
        Log::info("User {$id} allowed.");

        LoginRequest::where('user_id', $user->id)
                    ->update(['status' => 'approved']);
    } elseif ($request->action === 'reject') {
        $user->is_allowed = false;
        $user->save();

        // Log the status update
        Log::info("User {$id} rejected.");

        LoginRequest::where('user_id', $user->id)
                    ->update(['status' => 'rejected']);
    }

    return redirect()->route('admin.loginstatus')->with('status', 'User status updated successfully.');
}

   
    // public function updateStatus(Request $request, $id)
    // {
    //     $user = User::findOrFail($id);
    
    //     // Determine action based on form input
    //     if ($request->action === 'allow') {
    //         $user->is_allowed = true;
           
    //         $user->save();
    
    //         // Update related LoginRequest status to 'approved'
    //         $loginRequests = LoginRequest::where('user_id', $user->id)->get();
    //         foreach ($loginRequests as $loginRequest) {
    //             $loginRequest->status = 'approved';
    //             $loginRequest->save();
    //         }
    //     } elseif ($request->action === 'reject') {
    //         $user->is_allowed = false;
           
    //         $user->save();
    
    //         // Update related LoginRequest status to 'rejected'
    //         $loginRequests = LoginRequest::where('user_id', $user->id)->get();
    //         foreach ($loginRequests as $loginRequest) {
    //             $loginRequest->status = 'rejected';
    //             $loginRequest->save();
    //         }
    //     }
    
    //     // Redirect back with success message
    //     return redirect()->route('admin.index')->with('status', 'User status updated successfully.');
    // }

    public function getWalletHistory(Request $request)
    {
        $userId = $request->user()->id; // Fetch the user ID from the request (assuming authenticated user)
    
        // Step 1: Fetch the wallet for the user
        $wallet = Wallet::where('user_id', $userId)->first();
    
        // If no wallet is found, return an appropriate response
        if (!$wallet) {
            return response()->json(['message' => 'Wallet not found for this user'], 404);
        }
    
        // Step 2: Fetch the wallet history using the wallet ID
        $history = WalletHistory::where('wallet_id', $wallet->id)->orderBy('created_at', 'desc')->get();
    
        // Return the history as a JSON response
        return response()->json($history);
    }

    public function WalletHistory(){
        $wallethistory = WalletHistory::all();
        return response()->json($wallethistory);

    }



    public function userlist()
    {
        $users = User::all();
        return view('admin.userlist', compact('users'));
    }

    public function loginstatus()
    {
        $requests = LoginRequest::where('status', 'pending')->with('user')->get();

        return view('admin.loginstatus', compact('requests'));
    }

    public function wallethistorypage()
    {
        $wallethistory = WalletHistory::all();
        return view('admin.wallethistory', compact('wallethistory'));
    }

    public function commission()
    {
        return view('admin.commission');
    }

    public function servicecharge()
    {
        $services = Service::all();
        $users = User::all();
        $serviceProviders = ServiceProvider::all(); 

        return view('admin.servicecharge', compact('services', 'users', 'serviceProviders'));
    }


}
