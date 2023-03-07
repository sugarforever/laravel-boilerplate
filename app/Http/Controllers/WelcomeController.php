<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class WelcomeController extends Controller
{
    public function index() {
        return Inertia::render("Welcome/Index");
    }
}
