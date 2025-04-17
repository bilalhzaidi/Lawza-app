<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
// app/Http/Controllers/DashboardController.php
public function index()
{
    $docs = Document::where('user_id', auth()->id())->get();
    return view('dashboard', compact('docs'));
}
