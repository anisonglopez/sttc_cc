<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Auth;
use App\Role;
use App\UserInRole;
use App\Company;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
            view()->composer('*',function($view) {
                $user_id = Auth::user() ? Auth::user()->id : '';
                $stmt = Role::Query()
                ->select('role_permissions.code')
                ->Join('user_in_roles', 'roles.id', '=', 'user_in_roles.role_id')
                ->Join('role_permissions', 'roles.id', '=', 'role_permissions.role_id')
                ->where('roles.trash', 0)
                ->where('user_id', $user_id )
                ->distinct()
                ->get();
                $code =  array();
    
                foreach ($stmt as $row) :
                    $code[] = $row['code'];
                    $branch_id[] = $row['code'];
                endforeach;
    
                $stmt2 = UserInRole::Query()
                ->select('branches.short_name')
                ->Join('roles', 'user_in_roles.role_id', '=', 'roles.id')
                ->Join('branches', 'roles.branch_id', '=', 'branches.id')
                ->where('user_in_roles.user_id', $user_id )
                ->distinct()
                ->get();
                $branch_name =  '';
                foreach ($stmt2 as $row) :
                    $branch_name = $branch_name . ' ' . $row['short_name'] . ',';
                endforeach;
                $branch_name  = rtrim($branch_name, ',');
                $view->with('Permissions',$code); 
                $view->with('BranchName',$branch_name ); 
            });
        }

        //
}
