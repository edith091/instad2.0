<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\Admin;
use App\Mail\Websitemail;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function login()
    {
        return view('admin.login');
    }

    public function login_submit(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Get the login credentials
        $credentials = $request->only('email', 'password');

        // Attempt to log the user in
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin_dashboard')->with('success', 'Login Successful');
        } else {
            return redirect()->route('admin_login')->with('error', 'Invalid Credentials');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin_login')->with('success', 'Logout Successful');
    }

    public function forget_password()
    {
        return view('admin.forget_password');
    }

    public function forget_password_submit(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
        ]);
    
        // Find the admin by email
        $admin_data = Admin::where('email', $request->email)->first();
        if (!$admin_data) {
            return redirect()->back()->with('error', 'Email not found');
        }
    
        // Generate a token
        $token = Str::random(60);
        $admin_data->token = $token;
        $admin_data->update();
    
        // Prepare data for the email view
        $reset_link = url('admin/reset-password/' . $token . '/' . urlencode($request->email)); // Encode the email for URL safety
        $subject = "Reset Password";
        $data = [
            'reset_link' => $reset_link,
        ];
    
        // Send reset email using a view
        Mail::to($request->email)->send(new Websitemail($subject, $data));
    
        return redirect()->back()->with('success', 'Reset password link sent to your email');
    }
    
    
    
    

    public function reset_password($token, $email)
    {
        // Find admin by email and token
        $admin_data = Admin::where('email', $email)->where('token', $token)->first();

        if (!$admin_data) {
            return redirect()->back()->with('error', 'Invalid token or email');
        }

        return view('admin.reset_password', compact('token', 'email'));
    }

    public function reset_password_submit(Request $request)
    {
        // Validate the request data
        $request->validate([
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);

        // Find admin by email and token
        $admin_data = Admin::where('email', $request->email)->where('token', $request->token)->first();

        if (!$admin_data) {
            return redirect()->back()->with('error', 'Invalid token or email');
        }

        // Update password and clear token
        $admin_data->password = Hash::make($request->password);
        $admin_data->token = "";
        $admin_data->update();

        return redirect()->route('admin_login')->with('success', 'Password Reset Successfully');
    }
}



