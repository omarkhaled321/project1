<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 10);

        $sortBy = $request->get('sort_by', 'created_at');

        $sortOrder = $request->get('sort_order', 'asc');

        $query = User::query();
        
         if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->get('name') . '%');
        }

        if ($request->has('email')) {
            $query->where('email', 'like', '%' . $request->get('email') . '%');
        }

        if ($request->has('created_at')) {
            $query->whereDate('created_at', $request->get('created_at'));
        }

        $users = $query->orderBy($sortBy, $sortOrder)->paginate($perPage);

        return response()->json($users);

}
}