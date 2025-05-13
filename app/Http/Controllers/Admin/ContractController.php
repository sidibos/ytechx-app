<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContractController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Contracts/Index', [
            'contracts' => Contract::with('customer', 'project')->latest()->get()
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Contracts/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:users,id',
            'project_id' => 'required|exists:projects,id',
            'terms' => 'required|string',
            'signed_at' => 'nullable|date',
        ]);

        Contract::create($validated);

        return redirect()->route('admin.contracts.index')->with('success', 'Contract created.');
    }

    public function edit(Contract $contract)
    {
        return Inertia::render('Admin/Contracts/Edit', [
            'contract' => $contract
        ]);
    }

    public function update(Request $request, Contract $contract)
    {
        $validated = $request->validate([
            'terms' => 'required|string',
            'signed_at' => 'nullable|date',
        ]);

        $contract->update($validated);

        return redirect()->route('admin.contracts.index')->with('success', 'Contract updated.');
    }

    public function destroy(Contract $contract)
    {
        $contract->delete();

        return redirect()->route('admin.contracts.index')->with('success', 'Contract deleted.');
    }
}
