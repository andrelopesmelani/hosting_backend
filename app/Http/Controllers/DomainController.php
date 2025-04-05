<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Domain;
use App\Models\Hosting;
use App\Models\User;

class DomainController extends Controller
{
    public function index() {
        return response()->json(Domain::all());
    }public function store(Request $request) {
        $validated = $request->validate([
            'domain_name' => 'required|string|max:255',
            'hosting_id' => 'required|exists:hostings,id',
            'user_id' => 'required|exists:users,id',
            'expiration_date' => 'required|date',
            'status' => 'required|string|in:active,inactive',
        ]);

        $domain = Domain::create($validated);
        return response()->json($domain, 201);
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'domain_name' => 'required|string|max:255',
            'hosting_id' => 'required|exists:hostings,id',
            'user_id' => 'required|exists:users,id',
            'expiration_date' => 'required|date',
            'status' => 'required|string|in:active,inactive',
        ]);

        $domain = Domain::findOrFail($id);
        $domain->update($validated);
        return response()->json($domain);
    }
    public function destroy($id) {
        Domain::destroy($id);
        return response()->json(null, 204);
    }
}
