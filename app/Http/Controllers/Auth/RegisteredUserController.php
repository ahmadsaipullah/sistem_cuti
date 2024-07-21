<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nik' => ['required', 'string', 'max:255',  'unique:'.User::class],
            'nama' => ['required', 'string', 'max:255'],
            'dept' => ['required', 'string', 'max:255'],
            'bag' => ['required', 'string', 'max:255'],
            'seksi' => ['required', 'string', 'max:255'],
            'no_hp' => ['required', 'string', 'max:13'],
            'email' => ['required', 'string', 'lowercase', 'email:dns', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', 'min:6', Rules\Password::defaults()],
            'image' => ['nullable', 'string'],
            'level_id' => ['required', 'integer'],
            'cuti_th_sisa' => ['nullable', 'integer'],
        ]);

        $user = User::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'dept' => $request->dept,
            'bag' => $request->bag,
            'seksi' => $request->seksi,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => $request->image,
            'level_id' => $request->level_id,
            'cuti_th_sisa' => $request->cuti_th_sisa,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
