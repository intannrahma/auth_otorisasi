<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  ...$roles   // bisa menerima banyak role
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        // Pastikan user sudah login
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        // Cek apakah role user ada di daftar role yang diizinkan
        if (!in_array($user->role, $roles)) {
            abort(403, 'Anda tidak punya akses');
        }

        return $next($request);
    }
}