<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Admin
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
        // 1 mean Admin Group
        if( Auth::check() && Auth::user()->isAdmin() == 1 ) {
            return $next($request);
        } 
        else {
            abort(403, 'Unauthorized action. คุณไม่ได้รับสิทธิ์ในการเข้าถึงข้อมูล');
        }
    }
}
