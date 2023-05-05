<?php

use App\Http\Controllers\Admin\ApplicationAttachmentController;
use App\Http\Controllers\Admin\ApplicationStatusController;
use App\Http\Controllers\Admin\CampusLocationController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\JobTypeController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\QualificationTypeController;
use App\Http\Controllers\Admin\ReferralSourceController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Bpartner\ApplicationDetailController;
use App\Http\Controllers\Bpartner\ApplicationLongListController;
use App\Http\Controllers\Bpartner\ApplicationShortListController;
use App\Http\Controllers\Bpartner\ApplicationShowController;
use App\Http\Controllers\Bpartner\BpartnerIndexController;
use App\Http\Controllers\Bpartner\CandidateOfferController;
use App\Http\Controllers\Bpartner\CommentController;
use App\Http\Controllers\Bpartner\InterviewInvitationController;
use App\Http\Controllers\Bpartner\InterviewListController;
use App\Http\Controllers\Bpartner\PnCApprovedRequistionController;
use App\Http\Controllers\Bpartner\PublishedJobCommentController;
use App\Http\Controllers\Bpartner\RequistionController;
use App\Http\Controllers\Candidate\AcademicInfoController;
use App\Http\Controllers\Candidate\ApplicationsController;
use App\Http\Controllers\Candidate\AvailableJobsController;
use App\Http\Controllers\Candidate\BasicInfoController;
use App\Http\Controllers\Candidate\CandidateAttachmentController;
use App\Http\Controllers\Candidate\CandidateDeclarationController;
use App\Http\Controllers\Candidate\CandidateIndexController;
use App\Http\Controllers\Candidate\CandidateInformationController;
use App\Http\Controllers\Candidate\CandidateWorkExpController;
use App\Http\Controllers\Candidate\InterviewResponseController;
use App\Http\Controllers\FinanceOfficer\FOcommentController;
use App\Http\Controllers\FinanceOfficer\FOIndexController;
use App\Http\Controllers\FinanceOfficer\FORequistionController;
use App\Http\Controllers\HoD\ApplicationInformationController;
use App\Http\Controllers\HoD\ApprovedRequisitionController;
use App\Http\Controllers\HoD\HoDFeedbackController;
use App\Http\Controllers\HoD\HodIndexController;
use App\Http\Controllers\HoD\InterviewPanelController;
use App\Http\Controllers\HoD\ReceivedApplicationsContoller;
use App\Http\Controllers\HoD\StaffRequisitionFormController;
use App\Http\Controllers\PnCED\EDCommentController;
use App\Http\Controllers\PnCED\PnCEDIndexController;
use App\Http\Controllers\PnCED\PnCEDRequisitionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

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
Route::get('/job/{slug}', function () {
    return view('job');
})->name('job');
Route::get('/', [WelcomeController::class, 'vacancy'])->name('search');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    $user = auth()->user();
    if ($user->hasRole('Admin')) {
        return redirect('/admin');
    } else if($user->hasRole('HoD')){
        return redirect('/hod');
    } else if($user->hasRole('Business Partner')){
        return redirect('/bpartner');
    } else if($user->hasRole('Finance Officer')){
        return redirect('/financeofficer');
    } else if($user->hasRole('PnC Executive Director')){
        return redirect('/pnced');
    } else {
//        return view('dashboard');
        return redirect('/candidate');
    }
})->middleware(['auth', 'verified'])->name('dashboard');



//Route::get('/admin', function () {
//    return view('admin.index');
//})->middleware(['auth', 'role:Admin'])->name('admin.index');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile_hod', [ProfileController::class, 'edit'])->name('profile.edit_hod');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => ['auth', 'role:Admin']], function () {
    Route::group([
        'prefix' => 'admin',
        'as' => 'admin.',
    ], function () {
        Route::get('/', [IndexController::class, 'index'])->name('index');
        Route::resource('/roles', RoleController::class);
        Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
        Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');
        Route::resource('/permissions', PermissionController::class);
        Route::post('/permissions/{permission}/roles',[PermissionController::class, 'assignRole'])->name('permissions.roles');
        Route::delete('/permissions/{permission}/roles/{role}',[PermissionController::class, 'removeRole'])->name('permissions.roles.remove');
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
        Route::post('/users/{user}/roles', [UserController::class, 'assignRole'])->name('users.roles');
        Route::post('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('users.roles.remove');
        Route::post('/users/{user}/permissions', [UserController::class, 'givePermission'])->name('users.permissions');
        Route::post('/users/{user}/permissions/{permission}', [UserController::class, 'revokePermission'])->name('users.permissions.revoke');
        Route::resource('/jobtypes', JobTypeController::class);
        Route::resource('/departments', DepartmentController::class);
        Route::resource('/status', ApplicationStatusController::class);
        Route::resource('/campuslocation', CampusLocationController::class);
        Route::resource('/referralsource', ReferralSourceController::class);
        Route::resource('/qualificationtype', QualificationTypeController::class);
        Route::resource('/applicationattachment', ApplicationAttachmentController::class);
    });
});

Route::group(['middleware' => ['auth', 'role:HoD']], function () {
    Route::group([
        'prefix' => 'hod',
        'as' => 'hod.',
    ], function () {
        Route::get('/', [HodIndexController::class, 'index'])->name('index');
        Route::resource('/staffrequistionform', StaffRequisitionFormController::class);
        Route::resource('/approvedrequistion', ApprovedRequisitionController::class);
        Route::resource('/applications', ReceivedApplicationsContoller::class);
        Route::resource('/applicationinformation', ApplicationInformationController::class);
        Route::resource('/interviewpanel', InterviewPanelController::class);
        Route::resource('/hodfeedback', HoDFeedbackController::class);
    });
});

Route::group(['middleware' => ['auth', 'role:Business Partner']], function () {
    Route::group([
        'prefix' => 'bpartner',
        'as' => 'bpartner.',
    ], function () {
        Route::get('/', [BpartnerIndexController::class, 'index'])->name('index');
        Route::resource('/requistions', RequistionController::class);
        Route::resource('/comments', CommentController::class);
        Route::resource('/pncapprovedrequistions', PnCApprovedRequistionController::class);
        Route::resource('/publishedjobcomments', PublishedJobCommentController::class);
        Route::resource('/applications', ApplicationDetailController::class);
        Route::resource('/applicationshow', ApplicationShowController::class);
        Route::resource('/applicationlonglist', ApplicationLongListController::class);
        Route::resource('/applicationshortlist', ApplicationShortListController::class);
        Route::resource('/interviewinvitation', InterviewInvitationController::class);
        Route::resource('/interviewlist', InterviewListController::class);
        Route::resource('/candidateoffer', CandidateOfferController::class);
    });
});

Route::group(['middleware' => ['auth', 'role:Finance Officer']], function () {
    Route::group([
        'prefix' => 'financeofficer',
        'as' => 'financeofficer.',
    ], function () {
        Route::get('/', [FOIndexController::class, 'index'])->name('index');
        Route::resource('/forequistions', FORequistionController::class);
        Route::resource('/focomments', FOCommentController::class);
    });
});

Route::group(['middleware' => ['auth', 'role:PnC Executive Director']], function () {
    Route::group([
        'prefix' => 'pnced',
        'as' => 'pnced.',
    ], function () {
        Route::get('/', [PnCEDIndexController::class, 'index'])->name('index');
        Route::resource('/edrequistions', PnCEDRequisitionController::class);
        Route::resource('/edcomments', EDCommentController::class);
    });
});

Route::group(['middleware' => ['auth']], function () {
    Route::group([
        'prefix' => 'candidate',
        'as' => 'candidate.',
    ], function () {
        Route::get('/', [CandidateIndexController::class, 'index'])->name('index');
        Route::resource('/availablejobs', AvailableJobsController::class);
        Route::resource('/applications', ApplicationsController::class);
        Route::resource('/information', CandidateInformationController::class);
        Route::resource('/basicinfo', BasicInfoController::class);
        Route::resource('/academicinfo', AcademicInfoController::class);
        Route::resource('/workexperience', CandidateWorkExpController::class);
        Route::resource('/applicationattachment', CandidateAttachmentController::class);
        Route::resource('/candidatedeclaration', CandidateDeclarationController::class);
        Route::resource('/interviewresponse', InterviewResponseController::class );
    });
});





require __DIR__.'/auth.php';
