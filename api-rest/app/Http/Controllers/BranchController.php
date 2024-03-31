<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Branch;

class BranchController extends Controller
{
    //  - Get all records
    public function index()
    {
        $Branches = Branch::all();
        return response()->json($Branches);
    }


    //  - Create a new record
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|min:1|max:100',
            'address' => 'required|string|min:1|max:255',
            'phone' => 'required|string|size:10',
            'email' => 'required|string|min:1|max:100',
            'logo_path' => 'required|string|min:1|max:255',
            'color' => 'required|string|size:6',
            'tax_id' => 'required|numeric',
        ];
        $validator = Validator::make($request->input(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()->all()
            ], 400);
        }
        $Branch = new Branch($request->input());
        $Branch->save();
        return response()->json([
            'status' => true,
            'message' => 'Branch created successfully'
        ], 200);
    }


    //  - Get an specific record
    public function show(Branch $Branch)
    {
        return response()->json([
            'status' => true,
            'data' => $Branch
        ], 200);
    }


    //  - Update an specific record
    public function update(Request $request, Branch $Branch)
    {
        $rules = [
            'name' => 'required|string|min:1|max:100',
            'address' => 'required|string|min:1|max:255',
            'phone' => 'required|string|size:10',
            'email' => 'required|string|min:1|max:100',
            'logo_path' => 'required|string|min:1|max:255',
            'color' => 'required|string|size:6',
            'tax_id' => 'required|numeric',
        ];
        $validator = Validator::make($request->input(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()->all()
            ], 400);
        }
        $Branch->update($request->input());
        return response()->json([
            'status' => true,
            'message' => 'Branch updated successfully'
        ], 200);
    }


    //  - Delete an specific record
    public function destroy(Branch $Branch)
    {
        $Branch->delete();
        return response()->json([
            'status' => true,
            'message' => 'Branch deleted successfully'
        ], 200);
    }
}
