<?php

use App\Livewire\CvForm;
use App\Livewire\TemplateSlider;
use App\Models\CvTemplate;
use App\Livewire\CvRegistration;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/cv-form', CvForm::class)->name('cv.form');

Route::get('/cv-success', function () {
    if (!session('cv_submitted')) {
        return redirect('/'); // redirect ke homepage atau form
    }
    return view('cv-success');
})->name('cv.success');