<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Contracts\View\View;

class DashboardController
{
    public function index(): View
    {
        return view('admin.dashboard');
    }
}
