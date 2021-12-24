<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function getAll() {
        try {
            $users = User::all();
            return response()->json(['success' => true, 'users' => $users], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Invalid!'], 500);
        }
    }

    public function create(Request $request) {
        $validate = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname'  => 'required',
            'email'     => 'required',
            'phone'     => 'required',
        ]);

        if ($validate->fails()){       
            return response()->json(['success' => false, 'message' => 'Please fill out all field!'], 500);  
        }

        try {
            User::create($request->all());
            return response()->json(['success' => true, 'message' => 'User has been created successfully!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Something is wrong!'], 500);
        }
    }

    public function edit(Request $request) {
        try {
            $user = User::find($request->id);
            return response()->json(['success' => true, 'user' => $user], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Invalid!'], 500);
        }
    }

    public function update(Request $request) {
        $validate = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname'  => 'required',
            'email'     => 'required',
            'phone'     => 'required',
        ]);

        if ($validate->fails()){       
            return response()->json(['success' => false, 'message' => 'Please fill out all field!'], 500);  
        }

        try {
            $input = $request->except(['created_at', 'updated_at', 'remember_token']);
            $user = User::find($request->id);
            $user->update($input);
            return response()->json(['success' => true, 'message' => 'User has been updated successfully!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Something is wrong!'], 500);
        }
    }

    public function delete(Request $request) {
        try {
            $user = User::find($request->id);
            $user->delete();
            return response()->json(['success' => true, 'message' => 'User has been deleted successfully!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Something is wrong!'], 500);
        }
    }
}
