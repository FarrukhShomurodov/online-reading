<?php

namespace App\Http\Controllers\Site;

use App\Models\UserBook;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class RoomController
{
    public function index(): View
    {
        $user = Auth::guard('user')->user();

        $books = UserBook::query()->where('user_id', $user->id)->get();

        return view('site.pages.room', compact('user', 'books'));
    }
}
