<?php

namespace App\Http\Controllers\User;

use App\Models\Checkout;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $checkouts = Checkout::with('Camp')
            ->whereUserId(Auth::id())
            ->get();
        return view('user.dashboard', ['checkouts' => $checkouts]);
    }
}
