<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Module;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ModuleController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Modules/Index', [
            'modules' => Module::with('project')->latest()->get()
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Modules/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'title' => 'required|string',
            'methodology' => 'required|in:scrum,sprint',
        ]);

        Module::create($validated);

        return redirect()->route('admin.modules.index')->with('success', 'Module created.');
    }

    public function edit(Module $module)
    {
        return Inertia::render('Admin/Modules/Edit', [
            'module' => $module
        ]);
    }

    public function update(Request $request, Module $module)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'methodology' => 'required|in:scrum,sprint',
        ]);

        $module->update($validated);

        return redirect()->route('admin.modules.index')->with('success', 'Module updated.');
    }

    public function destroy(Module $module)
    {
        $module->delete();

        return redirect()->route('admin.modules.index')->with('success', 'Module deleted.');
    }
}
