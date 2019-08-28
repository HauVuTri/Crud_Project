<?php

namespace App\Http\Middleware;

use App\Permission;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            DB::beginTransaction();
            $user = Auth::user();
            $permission = Permission::find($user->id_permission);
            if ($permission->name == 'admin') {
                DB::commit();
                return $next($request);
            } else
                DB::commit();
                return redirect('/')->with('error', 'Bạn không phải admin');
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            return redirect()->back()->with('error',$e->getMessage());
        }
    }
}

