<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Accounts\AccountsController;
use App\Http\Controllers\members\AgentController;
use App\Http\Controllers\Clients\ClientController;
use App\Http\Controllers\Clients\FollowUpCatController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/agent-login', [AgentController::class,'agent_login']);


Route::get('/dashboard',[AccountsController::class,'dashboard'])
->middleware('auth:web')->name('dashboard');

Route::get('/agent_dashboard',[AgentController::class,'dashboard'])
->middleware('auth:agent')->name('agent_dashboard');

Route::middleware('auth:agent')->group(function(){
    
    Route::get('daily_dairy',[ClientController::class,'daily_dairy']);
    Route::get('client_follow_up/{id}/{client_id}',[ClientController::class,'client_follow_up']);
    Route::post('client_follow_up_sub',[ClientController::class,'client_follow_up_sub']);

    Route::get('clients_list',[ClientController::class,'clients_list']);
    Route::post('udpate_cleint_status',[ClientController::class,'udpate_cleint_status']);
    
    Route::get('clients_follow_up_list/{id}',[ClientController::class,'clients_follow_up_list']);
    Route::get('client_registration',[ClientController::class,'create']);
    Route::post('client_registration',[ClientController::class,'store']);

    Route::get('follow_up_categories',[FollowUpCatController::class,'follow_up_categories']);
    Route::post('follow_up_cat_submit',[FollowUpCatController::class,'follow_up_cat_submit']);
    Route::post('follow_up_cat_update',[FollowUpCatController::class,'follow_up_cat_update']);

    Route::get('follow_up_sub_categories',[FollowUpCatController::class,'follow_up_sub_categories']);
    Route::post('follow_up_sub_cat_submit',[FollowUpCatController::class,'follow_up_sub_cat_submit']);
    Route::post('follow_up_sub_cat_update',[FollowUpCatController::class,'follow_up_sub_cat_update']);
    
});


Route::middleware('auth:web')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Agents
    Route::get('/add-agent', [AgentController::class,'create']);
    Route::get('/agents-list', [AgentController::class,'index']);
    Route::get('/agents-profile/{id}', [AgentController::class,'show']);
    Route::post('/agent-submit', [AgentController::class,'store']);
    Route::get('/agent-update/{id}', [AgentController::class,'edit']);
    Route::post('/agent-update/{id}', [AgentController::class,'update']);
    Route::get('/fetch_agent_list', [AgentController::class,'fetch_agent_list']);
    Route::get('/fetch_agent_bal/{id}', [AgentController::class,'fetch_agent_bal']);
    Route::get('/agent-ledeger/{id}', [AgentController::class,'AgentLedeger']);
    Route::post('/update_agent_status', [AgentController::class,'update_agent_status']);
});

require __DIR__.'/auth.php';
