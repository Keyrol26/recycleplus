<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AdminController,
    BookingController,
    ClientController,
    CollectorController,
    ImageProcessingController,
    SuperadminController,
    ProfileController,
};

Route::get('/', function () {
    return view('auth.login');
});

// SuperAdmin-Role 0 Section
Route::group(['middleware' => ['auth', 'verified', 'superadmin']], function () {
    //Superadmin Landing Page
    Route::get('superadmin/home', action: [SuperadminController::class, 'home'])->name("superadmin")->middleware('superadmin');
    // - Superadmin List with Search function
    Route::get('/superadmin-list', [SuperadminController::class, 'superadminlist'])->name("superadminlist");
    Route::get("/superadmin-list/search", [SuperadminController::class, 'searchsuperadminlist'])->name("searchsuperadminlist");

    // - Admin List with Search function
    Route::get('/admin-list', [SuperadminController::class, 'adminlist'])->name("adminlist");
    Route::get("/admin-list/search", [SuperadminController::class, 'searchadminlist'])->name("searchadminlist");

    // - Collector List with Search function
    Route::get('/collector-list', [SuperadminController::class, 'collectorlist'])->name("sp.collectorlist");
    Route::get("/collector-list/search", [SuperadminController::class, 'searchcollectorlist'])->name("sp.searchcollectorlist");

    // - Client List with Search function
    Route::get('/client-list', [SuperadminController::class, 'clientlist'])->name("clientlist");
    Route::get("/client-list/search", [SuperadminController::class, 'searchclientlist'])->name("searchclientlist");

    Route::get('/add-user', [SuperadminController::class, 'adduser'])->name("adduser");
    Route::post('/register-user', [SuperadminController::class, 'createuser'])->name("createuser");

    Route::delete('/delete-user/{id}', [SuperadminController::class, 'deleteuser'])->name('deleteuser');
});

// Admin-Role 1 Section
Route::group(['middleware' => ['auth', 'verified', 'admin']], function () {
    //Admin Dashboard
    Route::get('admin/home', [AdminController::class, 'home'])->name("admin")->middleware('admin');

    Route::get('/debug', function () {
        return view('index');
    });
});

// User-Role 2 Section
Route::group(['middleware' => ['auth', 'verified', 'client']], function () {
    //User Landing Page
    Route::get('/home', action: [ClientController::class, 'home'])->name("home")->middleware('client');
    //booking-process
    Route::post('/create-bookingservices', action: [ClientController::class, 'storebooking'])->name("storebooking");
    //add new address
    Route::post('/create-address', action: [ClientController::class, 'storeaddress'])->name("storeaddress");
    //profile page (update,pass,email)
    Route::get('/profile', [ClientController::class, 'profile'])->name("profile");
    Route::put('/profile-update', [ClientController::class, 'update'])->name('userprofile.update');
    Route::put('/profile-update-address/{addressId}', [ClientController::class, 'updateaddress'])->name('userprofile.updateaddress');
    Route::delete('/profile-delete-address/{addressId}', [ClientController::class, 'deleteaddress'])->name('userprofile.deleteaddress');
    Route::put('/profile-security/password', [ClientController::class, 'userpassupdate'])->name('userpassupdate.update');
    Route::put('/profile-security/email', [ClientController::class, 'useremailupdate'])->name('useremailupdate.update');

    //Show booking User history with detail
    Route::get('/booking-history', [ClientController::class, 'history'])->name('history');
    Route::get('/booking-history/search', [ClientController::class, 'searchHistory'])->name('history.search');


    Route::get('/history-details/{id}', [ClientController::class, 'historydetails'])->name("history-details");

});

// Collector-Role 3 Section
Route::group(['middleware' => ['auth', 'verified', 'collector']], function () {
    //Collector Landing Page
    Route::get('collector/home', action: [CollectorController::class, 'home'])->name("collector")->middleware('collector');
    // - Assigned Booking with Search function
    Route::get('/assigned-booking', [CollectorController::class, 'assignedbooking'])->name("assignedbooking");
    Route::get("/assigned-booking/search", [CollectorController::class, 'searchassigned'])->name("collector.searchassigned");

    // - Otw Booking with Search function
    Route::get('/otw-assigned-booking', [CollectorController::class, 'otwbooking'])->name("collector.otwbooking");
    Route::get("/otw-assigned-booking/search", [CollectorController::class, 'searchotw'])->name("collector.searchotw");

    // - History Booking with Search function
    Route::get('/history-booking', [CollectorController::class, 'historybooking'])->name("historybooking");
    Route::get("/history-booking/search", [CollectorController::class, 'searchhistory'])->name("collector.searchhistory");

    Route::get('collector/route-map', action: [CollectorController::class, 'routemap'])->name("routemap");
});

//Multi-Role Section
Route::group(['middleware' => ['auth', 'verified', 'role:0,1,3']], function () {
    // - Booking Details
    Route::get('/booking-details/{id}', [BookingController::class, 'bookingdetails'])->name("booking-details");
    //Update Booking Status
    Route::put('/booking-details/{bookingId}/updatestatus', [BookingController::class, 'updatestatus'])->name('admin.updatestatus');
    //Update Image Validation Status
    Route::put('/booking-details/{bookingId}/updatevalidationstatus', [BookingController::class, 'updatevalidationstatus'])->name('admin.updatevalidationstatus');
    //Assign and Update Collector
    Route::put('/booking-details/{bookingId}/assign/{collectorId}', [BookingController::class, 'assignedcollector'])->name('admin.assignedcollector');
    //Unsigned Collector
    Route::put('/booking-details/{bookingId}/unsigned-collector', [BookingController::class, 'unsignedcollector'])->name('admin.unsignedcollector');
    // - Profile
    Route::get('/multi-profile/{userId}', [ProfileController::class, 'profile'])->name("multi-profile");//controller need to change later
    Route::post('/multi-profile/update/{userId}', [ProfileController::class, 'updateprofile'])->name("multi-profile-update");//controller need to change later
    Route::post('/multi-profile/update-email/{userId}', [ProfileController::class, 'updateEmail'])->name("multi-profile-update-email");//controller need to change later
    Route::post('/multi-profile/update-password/{userId}', [ProfileController::class, 'updatePassword'])->name("multi-profile-update-password");//controller need to change later
    Route::post('/multi-profile/update-collector-status/{userId}', [ProfileController::class, 'updateCollectorStatus'])->name("multi-profile-update-status");//controller need to change later
    Route::post('/multi-profile/create-address/{userId}', action: [ProfileController::class, 'storeaddress'])->name("multi-profile-storeaddress");
    Route::post('/multi-profile/update-address/{userId}-{addressId}', action: [ProfileController::class, 'updateaddress'])->name("multi-profile-updateaddress");
    Route::delete('/multi-profile/delete-address/{userId}-{addressId}', action: [ProfileController::class, 'deleteaddress'])->name("multi-profile-deleteaddress");

    Route::put('/multi-collectorstatus/{collectorId}', [BookingController::class, 'collectorstatus'])->name("multi-collectorstatus");

    Route::get('/booking-assigned-for/{collectorid}', [BookingController::class, 'assignedbookingfor'])->name("assignedbookingfor");
    Route::get("/booking-assigned-for/{collectorid}/search", [BookingController::class, 'searchassignedbookingfor'])->name("assignedbookingforsearch");

    Route::get('/set-active-tab/{tab}', function ($tab) {
        session(['tab' => $tab]);
        return response()->json(['success' => true]);
    });
});

//admin and SuperAdmin
Route::group(['middleware' => ['auth', 'verified', 'role:0,1,']], function () {

    // - All Booking
    Route::get('/all-booking', [BookingController::class, 'allbooking'])->name("allbooking");
    Route::get("/all-booking/search", [BookingController::class, 'searchall'])->name("admin.searchall");

    // - Accepted Booking with Search function
    Route::get('/accepted-booking', [BookingController::class, 'acceptbooking'])->name("acceptbooking");
    Route::get("/accepted-booking/search", [BookingController::class, 'searchaccept'])->name("admin.searchaccept");

    // - Rejected Booking with Search function
    Route::get('/rejected-booking', [BookingController::class, 'rejectbooking'])->name("rejectbooking");
    Route::get("/rejected-booking/search", [BookingController::class, 'searchreject'])->name("admin.searchreject");

    // - Pending Booking with Search function
    Route::get('/pending-booking', [BookingController::class, 'pendingbooking'])->name("pendingbooking");
    Route::get("/pending-booking/search", [BookingController::class, 'searchpending'])->name("admin.searchpending");

    // - In-Process Booking with Search function
    Route::get('/inprocess-booking', [BookingController::class, 'inprocessbooking'])->name("inprocessbooking");
    Route::get("/inprocess-booking/search", [BookingController::class, 'searchprocess'])->name("admin.searchprocess");

    // - Unsigned Booking with Search function
    Route::get('/unsigned-booking', [BookingController::class, 'unsignedbooking'])->name("unsignedbooking");
    Route::get("/unsigned-booking/search", [BookingController::class, 'searchunsigned'])->name("admin.searchunsigned");

    // - Otw Booking with Search function
    Route::get('/otw-booking', [BookingController::class, 'otwbooking'])->name("otwbooking");
    Route::get("/otw-booking/search", [BookingController::class, 'searchotw'])->name("admin.searchotw");

    // - Collected Booking with Search function
    Route::get('/collected-booking', [BookingController::class, 'collectedbooking'])->name("collectedbooking");
    Route::get("/collected-booking/search", [BookingController::class, 'searchcollected'])->name("admin.searchcollected");

    // - Collector Slot Availability with Search function
    Route::get("/collector-slot-list", [BookingController::class, 'collectorlist'])->name("collectorlist");
    Route::get("/collector-slot-list/search", [BookingController::class, 'searchcollector'])->name("admin.searchcollector");

    Route::match(['get', 'post'], '/classify-image/{id}', [ImageProcessingController::class, 'classifyImage'])->name('wastevalidate');
    Route::match(['get', 'post'], '/validate-all-images', [ImageProcessingController::class, 'validateAllUnvalidatedImages'])->name('validateAllImages');

    Route::get("/recycle-analytic", [AdminController::class, 'analytic'])->name("analytic");
});

Auth::routes(['verify' => true]);
