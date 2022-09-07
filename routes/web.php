<?php

use App\Http\Livewire\ExcoList;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\User\Forum;
use App\Http\Livewire\User\AddPost;
use App\Http\Livewire\User\Profile;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\ResetPassword;
use App\Http\Livewire\User\ViewPost;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\Admin\ClubInfo;
use App\Http\Livewire\Admin\Packages;
use App\Http\Livewire\ChangePassword;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\ClubUsers;
use App\Http\Livewire\Admin\Dashboard;
use Illuminate\Support\Facades\Session;
use App\Http\Livewire\Dashboard\AddExco;
use App\Http\Livewire\Auth\ActivateAgent;
use App\Http\Controllers\StripeController;
use App\Http\Livewire\Admin\CreatePackage;
use App\Http\Livewire\Dashboard\CheckList;
use App\Http\Livewire\Dashboard\BranchDetails;
use App\Http\Livewire\Dashboard\UpdateDetails;
use App\Http\Livewire\User\ExcoList as UserExcoList;
use App\Http\Livewire\Dashboard\ActivateAgentAccount;
use App\Http\Livewire\VerifyEmail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/send/mail',function(){
    return view('emails.agent_activation');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/', Login::class)->name('branch.login');
    Route::get('/join/supporter/{slug}', Register::class)->name('user.join');
    Route::get('/activate/agent', ActivateAgent::class)->name('activate.agent');
    Route::get('/forgot/password', ResetPassword::class)->name('reset.password');
    Route::get('/verify/email', VerifyEmail::class)->name('verify.email');
    Route::get('/change/password', ChangePassword::class)->name('change.password');
});


Route::middleware(['auth', 'user-access:manager'])->group(function () {
    Route::prefix('manager')->group(function () {
        Route::get('/branch/checklist', CheckList::class)->name('branch.checklist');
        Route::get('/branch/details', BranchDetails::class)->name('branch.details');
        Route::get('/branch/update/details/{status?}/{tx_ref?}/{transaction_id?}', UpdateDetails::class)->name('branch.update.details');
        Route::get('/branch/update/account', ActivateAgentAccount::class)->name('branch.activate.account');
        Route::get('/branch/exco/list', ExcoList::class)->name('branch.excos');
        Route::get('/branch/add/exco', AddExco::class)->name('branch.add.exco');
    });
    Route::get('/stripe-payment/{id}', [StripeController::class, 'getPaymentForm'])->name('stripe.payment');
    Route::post('/stripe-payment', [StripeController::class, 'postPayment'])->name('stripe.process.payment');
});
Route::get('worldpay',function(){
    return view('livewire.dashboard.worldpay');
});
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/clubs', Dashboard::class)->name('admin.dashboard');
        Route::get('/clubs/users/{id}',ClubUsers::class)->name('admin.viewusers');
        Route::get('/clubs/info/{id}',ClubInfo::class)->name('admin.viewinfo');
        Route::get('/create/package',CreatePackage::class)->name('admin.createpackages');
        Route::get('/view/packages',Packages::class)->name('admin.viewpackages');
    });
});
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/profile', Profile::class)->name('user.profile');
        Route::get('/exco/list', UserExcoList::class)->name('user.exco.list');
    });
});
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', Profile::class)->name('user.profile');
    Route::get('/forum', Forum::class)->name('forum');
    Route::get('/forum/post/{id}', ViewPost::class)->name('read.post');
    Route::get('/add/post', AddPost::class)->name('add.post');
});
Route::post('/logout', function () {
    Session::flush();

    Auth::logout();

    return redirect('/');
})->name('logout');
