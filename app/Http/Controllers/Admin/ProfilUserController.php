<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Direction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfilUserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $users = DB::table('users')
            ->leftJoin('directions', 'users.idDirection', '=', 'directions.idDirection')
            ->select('users.*', 'directions.nom as direction_nom')
            ->when($search, function ($query, $search) {
                return $query->where('users.nom', 'LIKE', "%{$search}%")
                    ->orWhere('users.prenom', 'LIKE', "%{$search}%")
                    ->orWhere('users.email', 'LIKE', "%{$search}%")
                    ->orWhere('users.bureau', 'LIKE', "%{$search}%")
                    ->orWhere('directions.nom', 'LIKE', "%{$search}%")
                    ->orWhere('users.usertype', 'LIKE', "%{$search}%");
            })
            ->paginate(10);

        return view('admin.manage-users', compact('users'));
    }

    public function edit(User $user)
    {
        $directions = Direction::all();
        return view('admin.users-edit', compact('user', 'directions'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'bureau' => 'required|string|max:255',
            'idDirection' => 'nullable|exists:directions,idDirection',
            'usertype' => 'required|in:admin,technicien,user',
        ]);

        $user->update($request->all());

        return redirect()->route('admin.manage_users')->with('success', 'Utilisateur mis à jour avec succès.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.manage_users')->with('success', 'Utilisateur supprimé avec succès.');
    }
}
