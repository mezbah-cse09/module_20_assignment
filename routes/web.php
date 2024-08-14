<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


//---------- GET /contacts: List all contacts 
// GET /contacts/create: Show the form to create a new contact
// POST /contacts: Store a new contact
//------- GET /contacts/{id}: Show a specific contact
// GET /contacts/{id}/edit: Show the form to edit a contact
// PUT /contacts/{id}: Update a contact
// DELETE /contacts/{id}: Delete a contact

// Route::get('/contacts',[ContactController::class,'index'])->name('index');
// Route::get('/contacts/{id}',[ContactController::class,'show'])->name('show');
// Route::get('/contacts/create',[ContactController::class,'createView'])->name('createView');


Route::get('/contacts',[ContactController::class,'index'])->name('index');
Route::get('/contacts/create',[ContactController::class,'create'])->name('createView');
Route::post('contacts',[ContactController::class,'store'])->name('create');
Route::get('/contacts/{id}',[ContactController::class,'show'])->name('show');
Route::get('/contacts/{id}/edit',[ContactController::class,'edit'])->name('editView');
Route::put('/contacts/{id}',[ContactController::class,'update'])->name('edit');
Route::delete('/contacts/{id}',[ContactController::class,'destroy'])->name('delete');