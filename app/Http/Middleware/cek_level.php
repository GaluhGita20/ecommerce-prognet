<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class cek_level
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$jabatan)
    {
        return $next($request);
        if(in_array($request->user()->jabatan,$jabatan)){
            return $next($request);
        }
        return redirect('login');
    }
}
