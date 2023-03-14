<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
    //
    public function index()
    {
        //
        $activeEmpCount = $activeStoreCount = $inactiveEmpCount = $inactiveStoreCount = 0;
        $activeEmpCount = Employee::where('status', 1)->count();
        $inactiveEmpCount = Employee::where('status', 0)->count();
        $activeStoreCount = Store::where('status', 1)->count();
        $inactiveStoreCount = Store::where('status', 0)->count();

        $stores = DB::table('employees')->join('stores', 'stores.id', '=', 'employees.store_id')
        ->select('stores.name','employees.store_id', DB::raw('COUNT(employees.store_id) as count'))
        ->groupBy('employees.store_id', 'stores.name')->get(); 

        return view('dashboard')->with(['activeEmpCount'=>$activeEmpCount, 'inactiveEmpCount'=> $inactiveEmpCount, 'activeStoreCount'=> $activeStoreCount,
        'inactiveStoreCount'=> $inactiveStoreCount, 'storesCount'=>$stores]);
    }
    public function dashboardCount() 
    {
        
    }
}
