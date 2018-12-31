<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Auth;
class clearance
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
      $user = User::all();
      if(Auth::user()->hasPermissionTo('Administer roles & permissions')) {

        return $next($request);
      }
      if($request->is('posts/create')){
        if(!Auth::user()->hasPermissionTo('create post')) {
          abort('401');
        } else {
          return $next($request);
        }
      }

      if($request->is('posts/*/edit')){
        if(!Auth::user()->hasPermissionTo('edit post')) { // if user edit the post
          abort('401');
        } else {
          return $next($request);
        }
      }

      if($request->isMethod('Delete')) { // if user deleting a post
        if(!Auth::user()->hasPermissionTo('delete post')) {
          abort('401');
        } else {
          return $next($request);
        }
      }
      return $next($request);
    }
}
