<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\Admin;
use App\Models\User;
use App\Models\Tache;
use App\Models\Demande;
use App\Mail\Websitemail;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Récupérer les statistiques pour le tableau de bord
        $totalUsers = User::count(); // Nombre total d'utilisateurs
        $totalTachesAffectees = Tache::where('statut', 'affecté')->count(); // Tâches affectées
        $totalReaffectations = Tache::where('statut','annulée')->count(); // Tâches réaffectées
        $totalTachesEnCours = Tache::where('statut', 'en cours')->count(); // Tâches en cours
        $totalTachesTerminees = Tache::where('statut', 'terminée')->count(); // Tâches terminées

        // Envoyer les données à la vue
        return view('admin.dashboard', compact(
            'totalUsers', 
            'totalTachesAffectees', 
            'totalReaffectations', 
            'totalTachesEnCours', 
            'totalTachesTerminees'
        ));
    }

    public function login()
    {
        return view('admin.login');
    }

    public function login_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

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
        $request->validate([
            'email' => 'required|email',
        ]);

        $admin_data = Admin::where('email', $request->email)->first();
        if (!$admin_data) {
            return redirect()->back()->with('error', 'Email not found');
        }

        $token = Str::random(60);
        $admin_data->token = $token;
        $admin_data->update();

        $reset_link = url('admin/reset-password/' . $token . '/' . urlencode($request->email));
        $subject = "Reset Password";
        $data = [
            'reset_link' => $reset_link,
        ];

        Mail::to($request->email)->send(new Websitemail($subject, $data));

        return redirect()->back()->with('success', 'Reset password link sent to your email');
    }

    public function reset_password($token, $email)
    {
        $admin_data = Admin::where('email', $email)->where('token', $token)->first();

        if (!$admin_data) {
            return redirect()->back()->with('error', 'Invalid token or email');
        }

        return view('admin.reset_password', compact('token', 'email'));
    }

    public function reset_password_submit(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);

        $admin_data = Admin::where('email', $request->email)->where('token', $request->token)->first();

        if (!$admin_data) {
            return redirect()->back()->with('error', 'Invalid token or email');
        }

        $admin_data->password = Hash::make($request->password);
        $admin_data->token = "";
        $admin_data->update();

        return redirect()->route('admin_login')->with('success', 'Password Reset Successfully');
    }
}


