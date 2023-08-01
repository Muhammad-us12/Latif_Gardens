<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\members\AgentController;
use App\Http\Controllers\members\CustomerController;

use App\Http\Controllers\Clients\ClientController;
use App\Http\Controllers\Clients\FollowUpCatController;

use App\Http\Controllers\Accounts\AccountsController;
use App\Http\Controllers\Accounts\PaymentsController;
use App\Http\Controllers\Accounts\ReceivedController;
use App\Http\Controllers\Accounts\ExpenseController;

use App\Http\Controllers\location\LocationsController;
use App\Http\Controllers\location\SocietyController;
use App\Http\Controllers\location\BlockController;
use App\Http\Controllers\website\BlogsController;
use App\Http\Controllers\location\PlotController;

use App\Http\Controllers\WebsiteController;



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


Route::get('/', [WebsiteController::class,'index']);
Route::get('/blogs_list', [WebsiteController::class,'blogs_list']);
Route::get('/category-blogs/{id}', [WebsiteController::class,'category_blogs']);
Route::get('/blog-details/{id}', [WebsiteController::class,'blog_details']);

Route::get('/contact_us', [WebsiteController::class,'contact_us']);
Route::get('/about_us', [WebsiteController::class,'about_us']);

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

    
});


Route::middleware('auth:web')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    
    
    Route::get('add_client_admin',[ClientController::class,'add_client_admin']);
    Route::post('client_registration_admin',[ClientController::class,'store_admin']);
    Route::get('all_clients_list',[ClientController::class,'all_clients_list']);
    Route::get('unassign_clients_list',[ClientController::class,'unassign_clients_list']);
    Route::get('assign_clients_to_agents',[ClientController::class,'assign_clients_to_agents']);
    

    Route::get('clients_follow_up_list_admin/{id}',[ClientController::class,'clients_follow_up_list_admin']);
    Route::post('udpate_cleint_status_admin',[ClientController::class,'udpate_cleint_status']);

    Route::get('follow_up_categories',[FollowUpCatController::class,'follow_up_categories']);
    Route::post('follow_up_cat_submit',[FollowUpCatController::class,'follow_up_cat_submit']);
    Route::post('follow_up_cat_update',[FollowUpCatController::class,'follow_up_cat_update']);

    Route::get('follow_up_sub_categories',[FollowUpCatController::class,'follow_up_sub_categories']);
    Route::post('follow_up_sub_cat_submit',[FollowUpCatController::class,'follow_up_sub_cat_submit']);
    Route::post('follow_up_sub_cat_update',[FollowUpCatController::class,'follow_up_sub_cat_update']);
    
    
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

    // Cash Accounts
    Route::get('/cash-deposit', [AccountsController::class,'cashDeposit']);
    Route::post('/cash-deposit', [AccountsController::class,'cashDepositSub']);
    Route::get('/cash_deposit_print/{id}', [AccountsController::class,'cash_deposit_print']);
    Route::get('/accounts-list', [AccountsController::class,'index']);
    Route::post('/account-submit', [AccountsController::class,'store']);
    Route::get('/accounts-ledeger/{id}', [AccountsController::class,'accountLedeger']);
    Route::get('/fetch_cash_acc_bal/{id}', [AccountsController::class,'fetch_cash_acc_bal']);
    Route::get('/fetch_account_list', [AccountsController::class,'fetch_account_list']);
    Route::get('/payable_receivable', [AccountsController::class,'payable_receivable']);
    Route::get('/profit-report', [AccountsController::class,'profit_report']);
    Route::get('/date-wise-profit-report', [AccountsController::class,'date_wise_profit_report']);
    Route::post('/date-wise-profit-report', [AccountsController::class,'date_wise_profit_report_sub']);

    // Payments 
    Route::get('/payments-list', [PaymentsController::class,'index']);
    Route::get('/payments-add', [PaymentsController::class,'create']);
    Route::post('/payments-sub', [PaymentsController::class,'store']);
    Route::get('/payment-list-print/{id}', [PaymentsController::class,'payment_list_print']);



    // Received Payments 
    Route::get('/received-list', [ReceivedController::class,'index']);
    Route::get('/received-add', [ReceivedController::class,'create']);
    Route::post('/received-sub', [ReceivedController::class,'store']);
    Route::get('/receive-list-print/{id}', [ReceivedController::class,'payment_list_print']);

    // Expense 
    Route::get('/add-expense', [ExpenseController::class,'create']);
    Route::get('/expense-list', [ExpenseController::class,'index']);
    Route::post('/expense-sub', [ExpenseController::class,'store']);
    Route::get('/expense-categories', [ExpenseController::class,'expense_categories']);
    Route::post('/expense-cat-submit', [ExpenseController::class,'storeCategory']);
    Route::get('/expense-sub-categories', [ExpenseController::class,'expense_sub_categories']);
    Route::post('/expense-sub-cat-submit', [ExpenseController::class,'expense_sub_cat_submit']);
    Route::post('/fetch_sub_category', [ExpenseController::class,'fetch_sub_category']);
    Route::get('/expense_print/{id}', [ExpenseController::class,'expense_print']);
    Route::post('/expense-cat-update', [ExpenseController::class,'update']);
    Route::post('/expense-sub-cat-update', [ExpenseController::class,'sub_cat_update']);

    // Marla
    Route::post('/add_marala_type', [SocietyController::class,'add_marala_type']);
    Route::post('/fetch_marala_type', [SocietyController::class,'fetch_marala_type']);

    // Locations 
    Route::get('/locations-list', [LocationsController::class,'index']);
    Route::get('/add-location', [LocationsController::class,'create']);
    Route::post('/location-submit', [LocationsController::class,'store']);
    Route::get('/location-update/{id}', [LocationsController::class,'edit']);
    Route::post('/location-update/{id}', [LocationsController::class,'update']);

    // Society
    Route::get('/add-society', [SocietyController::class,'create']);
    Route::get('/societies-list', [SocietyController::class,'index']);
    Route::post('/society-submit', [SocietyController::class,'store']);
    Route::get('/society-update/{id}', [SocietyController::class,'edit']);
    Route::post('/society-update/{id}', [SocietyController::class,'update']);
    Route::post('/fetch_socities_wi_location', [SocietyController::class,'fetch_socities_wi_location']);
    Route::post('/fetch_blocks_wi_scotites', [SocietyController::class,'fetch_blocks_wi_scotites']);

    // Blocks
    Route::get('/block-list', [BlockController::class,'index']);
    Route::post('/block-submit', [BlockController::class,'store']);

    // Plots
    Route::get('/plots-list', [PlotController::class,'index']);
    Route::get('/add-plot', [PlotController::class,'create']);
    Route::post('/plots-submit', [PlotController::class,'store']);

    Route::get('/sale-plot', [PlotController::class,'sale_plot']);
    Route::post('/fetch_plots_wi_block', [PlotController::class,'fetch_plots_wi_block']);
    Route::post('/plot-sale-submit', [PlotController::class,'plot_sale_submit']);
    
    
    // Customers
    Route::get('/add-customer', [CustomerController::class,'create']);
    Route::get('/customers-list', [CustomerController::class,'index']);
    Route::get('/customer-profile/{id}', [CustomerController::class,'show']);
    Route::post('/customer-submit', [CustomerController::class,'store']);
    Route::get('/customer-update/{id}', [CustomerController::class,'edit']);
    Route::post('/customer-update/{id}', [CustomerController::class,'update']);
    Route::get('/fetch_customer_list', [CustomerController::class,'fetch_customer_list']);
    Route::get('/fetch_customer_bal/{id}', [CustomerController::class,'fetch_customer_bal']);
    Route::get('/fetch_customer_plots/{id}', [CustomerController::class,'fetch_customer_plots']);
    Route::get('/customer-ledeger/{id}', [CustomerController::class,'customerLedeger']);
    Route::get('/customer-plots/{id}', [CustomerController::class,'customerPlots']);
    Route::get('/customer-plot-ledeger/{id}', [CustomerController::class,'customerPlotsledger']);
    
    // Blogs
    Route::get('/blogs-list', [BlogsController::class,'index']);
    Route::get('/blogs-add', [BlogsController::class,'create']);
    Route::get('/blogs-update/{id}', [BlogsController::class,'edit']);
    Route::post('/blogs-update/{id}', [BlogsController::class,'update']);
    Route::post('/blogs-submit', [BlogsController::class,'store']);
    Route::get('/blogs-categories', [BlogsController::class,'blogs_categories']);
    Route::get('/category-data/{id}', [BlogsController::class,'getCategories']);
    Route::post('/blog-cat-submit', [BlogsController::class,'storeCategory']);
    Route::post('/blog-cat-update', [BlogsController::class,'updateCategory']);
    Route::post('/update_blog_status', [BlogsController::class,'update_blog_status']);
    

});

require __DIR__.'/auth.php';
