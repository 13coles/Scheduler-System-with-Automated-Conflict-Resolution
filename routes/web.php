<?php

use App\Http\Controllers\CalendarEventsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NavigationController;


// Routes for the calendar of events
Route::get('/calendar/events', [CalendarEventsController::class, 'getCalendarEvents']);
Route::delete('/calendar/event/{id}', [CalendarEventsController::class, 'deleteCalendarEvents']);
Route::put('/calendar/event/{id}', [CalendarEventsController::class, 'updateCalendarEvents']);
Route::put('/calendar/{id}/resize', [CalendarEventsController::class, 'resizeEvent']);
Route::put('/calendar/search', [CalendarEventsController::class, 'searchEvent']);

// Routes for navigation menus
Route::get('/', [NavigationController::class, 'dashboardFunction'])->name('pages.index');
Route::get('/dashboard/schedules', [NavigationController::class, 'scheduleFunction'])->name('pages.schedule');
Route::get('/dashboard/subjects', [NavigationController::class, 'subjectsFunction'])->name('pages.subjects');
Route::get('/dashboard/classroom', [NavigationController::class, 'classroomFunction'])->name('pages.classroom');
Route::get('/dashboard/teachers', [NavigationController::class, 'teachersFunction'])->name('pages.teachers');
Route::get('/dashboard/profile', [NavigationController::class, 'userProfileFunction'])->name('pages.profile');
