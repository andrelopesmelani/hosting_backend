<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hosting;
use Illuminate\Support\Facades\Auth;

class HostingController extends Controller
{
    public function index()
    {
        return response()->json(Hosting::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|string',
            'plan' => 'required|string',
            'description' => 'nullable|array',
            'description.*' => 'string',
        ]);

        $data = $request->all();
        $data['description'] = json_encode($request->description);

        $hosting = Hosting::create($data);
        return response()->json($hosting, 201);
    }
    public function update(Request $request, $id)
    {
        $hosting = Hosting::findOrFail($id);

        $data = $request->all();
        if (isset($data['description'])) {
            $data['description'] = json_encode($data['description']);
        }

        $hosting->update($data);

        return response()->json([
            'message' => 'Hosting atualizado com sucesso!',
            'hosting' => $hosting
        ]);
    }

    public function destroy($id)
    {
        Hosting::destroy($id);
        return response()->json(null, 204);
    }
}

