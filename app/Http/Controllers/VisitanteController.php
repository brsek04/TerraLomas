<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Menu;
use Illuminate\Http\Request;

use App\Models\Supplier;



class VisitanteController extends Controller
{
    /**
     * Display the list of branches for visitors.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = Branch::all();
        $suppliers = Supplier::all();
        return view('visitante', compact('branches', 'suppliers'));
    }

    /**
     * Display the menus of a specific branch for visitors.
     *
     * @param  int  $branchId
     * @return \Illuminate\Http\Response
     */
    public function showBranchMenus($branchId)
    {
        $branch = Branch::findOrFail($branchId);
        $menus = $branch->menus()->get();
        return view('branchMenus', compact('branch', 'menus'));
    }
}
