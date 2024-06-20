<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function showLoginForm(): View
    {
        return view('auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ], [
            'email.required' => 'L\'adresse email est obligatoire.',
            'email.email' => 'L\'adresse email doit être valide.',
            'password.required' => 'Le mot de passe est obligatoire.',
        ]);

        if (Auth::attempt($credentials, (bool) $request->remember)) {
            $request->session()->regenerate();

            $user = Auth::user();

            switch ($user->role->value) {
                case 'agent_domaniale':
                    return redirect()->route('domaniale.index');
                case 'agent_urbanisme':
                    return redirect()->route('urbanisme.index');
                case 'agent_cadastrale':
                    return redirect()->route('cadastrale.index');
                case 'agent_impots_domaines':
                    return redirect()->route('impots-domaines.index');
                case 'agent_hygiene':
                    return redirect()->route('hygiene.index');
                case 'depositaire':
                    return redirect()->route('depositaire.index');
                case 'maire':
                    return redirect()->route('maire.index');
                case 'proprietaire':
                    return redirect()->route('proprietaire.index');
                default:
                    return redirect()->intended('/');

            }
        }
        return back()->withErrors([
            'email' => 'Identifiants erronés.',
        ])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
