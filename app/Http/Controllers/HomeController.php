<?php

namespace App\Http\Controllers;
use App\Models\Activity;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $activities = Activity::all();
        return view('home', ['activities' => $activities]);
    }



}
