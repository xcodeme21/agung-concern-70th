<?php

namespace App\Http\Middleware;

use Closure;

class SetLocale
{
    protected $supported_languages = ['id', 'en'];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!session()->has('locale')) {
            session(['locale' => 'id']);
        }

        app()->setLocale(session('locale'));

        return $next($request);
    }
}
