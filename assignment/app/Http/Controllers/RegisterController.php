<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Http\Request;
use DB;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function show()
    {
        $data = Register::select('emp_code', 'profile_img', 'joining_date', DB::raw("CONCAT(first_name, ' ', last_name) as full_name"))->orderBy('id', 'desc')->get();

        return response()->json(['data' => $data]);

        // return $data;
    }

    public function create()
    {
        $max_id = Register::max('id');
        if ($max_id) {
            $emp_id = 'Emp-' . str_pad($max_id + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $emp_id = 'Emp-' . str_pad(1, 4, '0', STR_PAD_LEFT);
        }
        return $emp_id;
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'joining_date' => 'required',
            'profile_img' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $input['emp_code'] = $request->emp_code;
        $input['first_name'] = $request->first_name;
        $input['last_name'] = $request->last_name;
        $input['joining_date'] = $request->joining_date;

        if ($request->hasFile('profile_img')) {
            $profileImg = $request->file('profile_img');
            $avatarName = time() . '.' . $profileImg->getClientOriginalExtension();
            $avatarPath = public_path('/images/');
            $profileImg->move($avatarPath, $avatarName);
            $input['profile_img'] = "images/" . $avatarName;
        }

        if (Register::create($input)) {
            return response()->json(['message' => 'Employee Registration Completed Successfully...']);
        } else {
            return response()->json(['error' => 'Employee Registration Not Completed...'], 400);
        }
    }

    public function filterData(Request $request)
    {
        $startDate = $request->input('fromDate');
        $endDate = $request->input('endDate');

        $data = Register::select('emp_code', 'profile_img', 'joining_date', DB::raw("CONCAT(first_name, ' ', last_name) as full_name"))->whereBetween('joining_date', [$startDate, $endDate])->get();

        if (count($data) > 0) {
            return response()->json(['data' => $data]);
        } else {
            return response()->json(['error' => 'No data Found...'], 400);
        }
    }
}
