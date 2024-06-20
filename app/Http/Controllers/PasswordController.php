<?php

namespace App\Http\Controllers;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class PasswordController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }

    public function index(): View
    {
        return view('profile.password-reset', [
        ]);
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        $user = Auth::user();

        $validated = $request->validate([
            'current_password' => [
                'required',
                'string',
                function (string $attribute, mixed $value, Closure $fail) {
                    if (! Hash::check($value, Auth::user()->password)) {
                        $fail("Le {$attribute} est erroné.");
                    }
                },
            ],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ], [
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.min' => 'Le mot de passe doit avoir au moins 8 caractères.',
            'password.confirmed' => 'Les mots de passe ne correspondent pas.',
        ]);

        $user->update([
            'password' => Hash::make($validated['password']),
        ]);

        switch ($user->role->value) {
            case 'agent_domaniale':
                return redirect()->route('domaniale.index')->withStatus('Mot de passe modifié avec succès!');;
            case 'agent_urbanisme':
                return redirect()->route('urbanisme.index')->withStatus('Mot de passe modifié avec succès!');;
            case 'agent_cadastrale':
                return redirect()->route('cadastrale.index')->withStatus('Mot de passe modifié avec succès!');;
            case 'agent_impots_domaines':
                return redirect()->route('impots-domaines.index')->withStatus('Mot de passe modifié avec succès!');;
            case 'agent_hygiene':
                return redirect()->route('hygiene.index')->withStatus('Mot de passe modifié avec succès!');;
            case 'depositaire':
                return redirect()->route('depositaire.index')->withStatus('Mot de passe modifié avec succès!');;
            case 'maire':
                return redirect()->route('maire.index')->withStatus('Mot de passe modifié avec succès!');;
            case 'proprietaire':
                return redirect()->route('proprietaire.index')->withStatus('Mot de passe modifié avec succès!');;
            default:
                return redirect()->intended('/');

        }
    }

}
