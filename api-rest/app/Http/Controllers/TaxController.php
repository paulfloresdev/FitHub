<?php

namespace App\Http\Controllers;

use App\Models\Tax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaxController extends Controller
{
    //  - Get all records
    public function index()
    {
        $taxes = Tax::all();
        return response()->json($taxes);
    }


    //  - Create a new record
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|min:1|max:100',
            'lastname' => 'required|string|min:1|max:100',
            'rfc' => 'required|string|min:12|max:13',
            'curp' => 'required|string|size:18',
            'street' => 'required|string|min:1|max:64',
            'int_num' => 'string|min:1|max:7',
            'ext_num' => 'required|string|min:1|max:7',
            'colony' => 'required|string|min:1|max:64',
            'cp' => 'required|string|size:5',
            'city' => 'required|string|min:1|max:64',
            'state_id' => 'required|numeric',
            'phone' => 'required|string|size:10',
            'email' => 'required|string|min:1|max:100',
            'rse' => 'required|string|min:1|max:100',
            'person_type' => 'required|numeric',
            'use_type' => 'required|numeric',
            'user_id' => 'required|numeric',
        ];
        $validator = Validator::make($request->input(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()->all()
            ], 400);
        }
        $Tax = new Tax($request->input());
        $Tax->save();
        return response()->json([
            'status' => true,
            'message' => 'Tax created successfully'
        ], 200);
    }


    //  - Get an specific record
    public function show(Tax $Tax)
    {
        return response()->json([
            'status' => true,
            'data' => $Tax
        ], 200);
    }


    //  - Update an specific record
    public function update(Request $request, Tax $Tax)
    {
        $rules = [
            'name' => 'required|string|min:1|max:100',
            'lastname' => 'required|string|min:1|max:100',
            'rfc' => 'required|string|min:12|max:13',
            'curp' => 'required|string|size:18',
            'street' => 'required|string|min:1|max:64',
            'int_num' => 'required|string|min:1|max:7',
            'ext_num' => 'required|string|min:1|max:7',
            'colony' => 'required|string|min:1|max:64',
            'cp' => 'required|string|size:5',
            'city' => 'required|string|min:1|max:64',
            'state_id' => 'required|numeric',
            'phone' => 'required|string|size:10',
            'email' => 'required|string|min:1|max:100',
            'rse' => 'required|string|min:1|max:100',
            'person_type' => 'required|numeric',
            'use_type' => 'required|numeric',
            'user_id' => 'required|numeric',
        ];
        $validator = Validator::make($request->input(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()->all()
            ], 400);
        }
        $Tax->update($request->input());
        return response()->json([
            'status' => true,
            'message' => 'Tax updated successfully'
        ], 200);
    }


    //  - Delete an specific record
    public function destroy(Tax $Tax)
    {
        $Tax->delete();
        return response()->json([
            'status' => true,
            'message' => 'Tax deleted successfully'
        ], 200);
    }
}
