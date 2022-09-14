<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{
    /**
     * Home Page
     */
    public function index()
    {
        return view('employees.index');
    }

    /**
     * Single Field Autocomplete
     */
    public function single()
    {
        return view('employees.single');
    }
    /**
     * Multi Field Autocomplete 
     */
    public function multi()
    {
        return view('employees.multi');
    }
    
    /**
     * GetEmployees
     */
    public function getDataParts($id)
    {
        if (empty($id)) {
            return [];
        }
        $datas = DB::table('masterdata')
            ->where('masterdata.part_name', 'LIKE', "$id%")
            ->limit(25)
            ->get();

        return $datas;  
    }

    /**
     * GetCountries
     */
    public function getCountries(Request $request)
    {
        $name = $request->get('name');
        $fieldName =  $request->get('fieldName');

        $name = strtolower(trim($name));
        if (empty($fieldName)) {
            $fieldName = 'name';
        }

        $countries = DB::table('country')
            ->select('country.*')
            ->where(`LOWER(`.$fieldName.`)`, 'LIKE', "$name%")
            ->limit(25)
            ->get();

        return $countries; 
    }
}
