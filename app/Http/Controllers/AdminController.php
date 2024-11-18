<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\LoginRequest;

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
    
        // Determine action based on form input
        if ($request->action === 'allow') {
            $user->is_allowed = true;
           
            $user->save();
    
            // Update related LoginRequest status to 'approved'
            $loginRequests = LoginRequest::where('user_id', $user->id)->get();
            foreach ($loginRequests as $loginRequest) {
                $loginRequest->status = 'approved';
                $loginRequest->save();
            }
        } elseif ($request->action === 'reject') {
            $user->is_allowed = false;
           
            $user->save();
    
            // Update related LoginRequest status to 'rejected'
            $loginRequests = LoginRequest::where('user_id', $user->id)->get();
            foreach ($loginRequests as $loginRequest) {
                $loginRequest->status = 'rejected';
                $loginRequest->save();
            }
        }
    
        // Redirect back with success message
        return redirect()->route('admin.index')->with('status', 'User status updated successfully.');
    }
    
    

}
