<?php

namespace App\Http\Controllers;
use App\Models\Schedules;
use App\Models\Events;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public function indexFunction() {
        return view('index');
    }
    public function dashboardFunction() {
        return view('pages.home');
    }

    public function scheduleFunction() {
       return view('pages.schedule');
    }
    
    public function subjectsFunction() {
        return view('pages.subjects');
    }

    public function teachersFunction() {
        return view('pages.teachers');
    }
    public function userProfileFunction() {
        return view('pages.profile');
    }
    public function classroomFunction() {
        return view('pages.classroom');
    }
}
