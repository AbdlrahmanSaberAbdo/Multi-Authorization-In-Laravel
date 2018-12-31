<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use App\User;
class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      $user = User::all()->count();
      if(!($user == 1)) {
        if(!Auth::user()->hasPermissionTo('Administer roles & permissions')){ // if user doesn't have this role {}
          abort('401');
        }
      }
      return $next($request);
    }
}
