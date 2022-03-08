<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Jobs\SyncUsersFromAPI;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends BaseController
{

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $auth = Auth::user();
            $success['token'] = $auth->createToken('LaravelSanctumAuth')->plainTextToken;
            $success['name'] = $auth->name;

            return $this->handleResponse($success, 'User logged-in!');
        } else {
            return $this->handleError('Unauthorised.', ['error' => 'Unauthorised']);
        }
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);


        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('LaravelSanctumAuth')->plainTextToken;
        $success['name'] = $user->name;

        return $this->handleResponse($success, 'User successfully registered!');
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function jobSyncFromAPI()
    {
        SyncUsersFromAPI::dispatch();
        return $this->handleResponse('', 'Задача поставлена в очередь.');
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function jobSyncFromAPINow()
    {
        SyncUsersFromAPI::dispatchSync();
        return $this->handleResponse('', 'Задача запущена немедленно.');
    }

}
