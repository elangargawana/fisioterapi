<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserPelanggan;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed'],
            'gender' => ['required', 'in:laki-laki,perempuan'],
            'alamat' => ['required', 'string'],
            'no_hp' => ['required', 'string']
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return response()->json([
                'status' => 400,
                'message' => $errors,
                'data' => null
            ], 400);
        }

        $validatedData = $validator->validated();

        try {
            DB::beginTransaction();

            $user = new User($validatedData);
            $user->password = bcrypt($validatedData['password']);
            $user->save();
            $user->assignRole('User');
            $validatedData['user_id'] = $user->id;
            $user_pelanggan = new UserPelanggan($validatedData);
            $user_pelanggan->save();

            DB::commit();
            return response()->json([
                'status' => 200,
                'message' => "success",
                'data' => null
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 500,
                'message' => $e->getMessage(),
                'data' => null
            ], 500);
        }
    }
}
