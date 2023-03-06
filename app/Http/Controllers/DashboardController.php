<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index() {
        return Inertia::render("Dashboard/Index");
    }

    public function ethereum() {
        return Inertia::render("Dashboard/Ethereum", [
            "eth_address" => auth()->user()->eth_address
        ]);
    }
}
