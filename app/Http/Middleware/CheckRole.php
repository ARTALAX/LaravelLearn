<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {

        // Если у пользователя нет нужной роли, перенаправляем на главную страницу
        if (Auth::user()->role === 'admin') {
            return $next($request);
            // Редирект, если роль не совпадает
        }

        return redirect()->back();

    }
}
