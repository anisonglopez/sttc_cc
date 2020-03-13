<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Branch;
use App\Department;
use App\DepInBranch;
use App\Material;
use App\Joborder;

class ComponentController extends Controller
{
    public function get_branch_from_com($request)
    {
        $matchThese = ['com_id' =>$request, 'trash' =>0];
        $smtp = Branch::where($matchThese)->get();
        return $smtp;
    }
    public function get_dep_from_branch($request)
    {
        $matchThese = ['branch_id' =>$request, 'trash' =>0];
        $smtp = DepInBranch::query()
        ->select('*')
        ->Join('departments', 'dep_in_branches.dep_id', '=', 'departments.id')
        ->where($matchThese)
        ->get();
        return $smtp;
    }
    public function get_material()
    {
        $stmt = Material::all()->where('trash', 0);
        return  $stmt;
    }
    public function get_job_order($request)
    {
        $matchThese = ['id' =>$request, 'trash' =>0];
        $smtp = Joborder::query()
        ->select('*')
        ->where($matchThese)
        ->get();
        return $smtp;
    }
    //
}
