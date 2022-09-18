<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user_id = Auth::user()->id;
        $role = UserRole::where('role_name',"=","admin" )->first();
        if($role->user_id == $user_id){
            return $next($request);
          }
          return response('<h1>sorry user must be admin</h1>');

    }
}
