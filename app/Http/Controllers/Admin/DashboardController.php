<?php

namespace App\Http\Controllers\Admin;


use App\Models\Quote;
use App\Models\Project;
use App\Models\Contract;
use App\Models\Task;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Dashboard', [
            'metrics' => [
                'quotes' => [
                    'total' => Quote::count(),
                    'approved' => Quote::where('status', 'approved')->count(),
                    'pending' => Quote::where('status', 'pending')->count(),
                    'rejected' => Quote::where('status', 'rejected')->count(),
                ],
                'projects' => [
                    'total' => Project::count(),
                    'in_progress' => Project::where('status', 'in_progress')->count(),
                    'completed' => Project::where('status', 'completed')->count(),
                ],
                'contracts' => [
                    'signed' => Contract::whereNotNull('signed_at')->count(),
                ],
                'tasks' => [
                    'total' => Task::count(),
                    'done' => Task::where('status', 'done')->count(),
                ],
            ],
            'projectChartData' => Project::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
                ->groupByRaw('MONTH(created_at)')
                ->orderByRaw('MONTH(created_at)')
                ->pluck('count', 'month')
        ]);
    }
}
