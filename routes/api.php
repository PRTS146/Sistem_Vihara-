<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiSlotController;

/*
|--------------------------------------------------------------------------
| API Routes — Internal endpoints for JS-driven components
|--------------------------------------------------------------------------
|
| These routes are loaded with the 'api' prefix.
| GET /api/slots — public, used by guest rumahabu.js
| POST/PUT/DELETE /api/slots — admin only, used by monitoring.js
|
| We add 'web' middleware so session-based auth works for admin endpoints.
|
*/

// Public: anyone can view slots
Route::get('/slots', [ApiSlotController::class, 'index']);

// Admin only: CRUD operations (need web middleware for session auth)
Route::middleware(['web', 'auth'])->group(function () {
    Route::post('/slots', [ApiSlotController::class, 'store']);
    Route::put('/slots/{id}', [ApiSlotController::class, 'update']);
    Route::delete('/slots/{id}', [ApiSlotController::class, 'destroy']);
});
