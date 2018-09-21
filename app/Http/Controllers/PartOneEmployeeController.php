<?php

namespace App\Http\Controllers;

use App\Employee;

class PartOneEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('part-one.index', [
            'employees' => Employee::where('chief_id',0)
                ->orWhereNull('chief_id')
                ->with('subordinates')->paginate(10)
        ]);
    }

}
