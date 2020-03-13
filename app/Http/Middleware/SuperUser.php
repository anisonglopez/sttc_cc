<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class SuperUser
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
             // 2 mean Super User Group
             if( Auth::check() && Auth::user()->isAdmin() == 2 ) {
                return $next($request);
            } 
            else {
                abort(403, 'Unauthorized action. คุณไม่ได้รับสิทธิ์ในการเข้าถึงข้อมูล');
            }
    }
}
