<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Admin\StorageRequest;
use App\Http\Requests\Admin\UpdateRequest;
use App\Models\Admin;
use App\Services\AdminService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AdminController
{
    protected AdminService $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function index(): View
    {
        $admins = Admin::all();

        return view('admin.admins.index', compact('admins'));
    }

    public function create(): View
    {
        return view('admin.admins.create');
    }

    public function store(StorageRequest $request): RedirectResponse
    {
        $this->adminService->store((array)$request->validated());

        return redirect()->route('admins.index')->with('success', 'Админ успешно добавлен!');
    }

    public function edit(Admin $admin): View
    {
        return view('admin.admins.edit', compact('admin'));
    }

    public function update(UpdateRequest $request, Admin $admin): RedirectResponse
    {
        $this->adminService->update($admin, (array)$request->validated());

        return redirect()->route('admins.index')->with('success', 'Админ успешно обнавлен!');
    }

    public function destroy(Admin $admin): RedirectResponse
    {
        if ($admin->email === 'online@gmail.com') {
            return redirect()->route('admins.index')->withErrors('Вы неможете удалить админа.');
        }

        $this->adminService->destroy($admin);

        return redirect()->route('admins.index')->with('success', 'Админ успешно удален!');
    }
}
