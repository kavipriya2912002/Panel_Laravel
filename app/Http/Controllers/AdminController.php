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
    
        // Handle the action based on the form submission
        if ($request->action === 'allow') {
            $user->is_allowed = true;
            $user->save();
    
            // Update the LoginRequest status as approved
            $loginRequest = LoginRequest::where('user_id', $user->id)->first();
            if ($loginRequest) {
                $loginRequest->status = 'approved';
                $loginRequest->save();
            }
        } elseif ($request->action === 'reject') {
            $user->is_allowed = false;
            $user->save();
    
            // Update the LoginRequest status as rejected
            $loginRequest = LoginRequest::where('user_id', $user->id)->first();
            if ($loginRequest) {
                $loginRequest->status = 'rejected';
                $loginRequest->save();
            }
        }
    
        // Redirect back to the dashboard after updating the user status
        return redirect()->route('admin.index')->with('status', 'User status updated successfully');
    }
    
    

    public function getLoginRequests()
    {
        $requests = LoginRequest::where('status', 'pending')->with('user')->get();
        return view('admin.login-requests', compact('requests'));
    }

    public function approveLogin($id)
    {
        $request = LoginRequest::find($id);
        $request->update(['status' => 'allowed']);
        // Notify the user or update their login session logic here
        return back()->with('success', 'Login approved.');
    }

    public function rejectLogin($id)
    {
        $request = LoginRequest::find($id);
        $request->update(['status' => 'rejected']);
        // Notify the user or log them out if required
        return back()->with('success', 'Login rejected.');
    }

    

}
