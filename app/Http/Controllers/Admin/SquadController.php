<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Squad;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SquadController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Squads/Index', [
            'squads' => Squad::with('project')->latest()->get()
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Squads/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'name' => 'required|string',
        ]);

        Squad::create($validated);

        return redirect()->route('admin.squads.index')->with('success', 'Squad created.');
    }

    public function edit(Squad $squad)
    {
        return Inertia::render('Admin/Squads/Edit', [
            'squad' => $squad
        ]);
    }

    public function update(Request $request, Squad $squad)
    {
        $validated = $request->validate([
            'name' => 'required|string',
        ]);

        $squad->update($validated);

        return redirect()->route('admin.squads.index')->with('success', 'Squad updated.');
    }

    public function destroy(Squad $squad)
    {
        $squad->delete();

        return redirect()->route('admin.squads.index')->with('success', 'Squad deleted.');
    }
}
