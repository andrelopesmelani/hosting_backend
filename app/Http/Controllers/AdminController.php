<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Domain;

class AdminController extends Controller
{
    public function getAllUsers()
    {
        return response()->json(User::all());
    }

    public function getUserDomains($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user->domains);
    }
    public function destroy($id)
    {
        User::destroy($id);
        return response()->json(null, 204);
    }
}
