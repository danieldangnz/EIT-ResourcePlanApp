<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Programme;

class ReportController extends Controller
{
    public function index() {
        $programmes = Programme::all();

        return view('/reports', compact('programmes'));
    }
}
