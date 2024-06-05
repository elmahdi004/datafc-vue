<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Request;
use app\http\Controllers\AuthController;
use App\Http\Controllers\DemandeController;
use App\Models\Demande;
use App\Models\Formation;
use App\Models\Message;
use App\Models\User;
use App\Http\Controllers\FormationCategorieController;
use App\Http\Controllers\InfoController;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/', function () {
    return Inertia::render('accueil/Accueil');
});

Route::get('/sommes-nous', function () {
    return Inertia::render('sommesNous/SommesNous');
});
Route::get('/domiciliation', function () {
    return Inertia::render('domiciliation/Domiciliation');
});
// Route::get('/home',function(){  
//     return Inertia::render('Home');
// });

Route::get('/contact-nous',function(){    
    return Inertia::render('contact/Contact');
});
Route::get('/ingenierie-de-formation', function () {
    return Inertia::render('nosServices/Ingn');
});
Route::get('/formation', function () {
    return Inertia::render('formationPage/FormationPage');
});
Route::get('/assistance-conseil-en-recrutement', function () {
    return Inertia::render('assistancconseil/Assistancconseil');
});
Route::get('/formations-interentreprises', function () {
    return Inertia::render('Formations/Formations');
});
Route::get('/info-formation/{idf}', function ($idf) {
    return Inertia::render('Formations/infoForrmation/FormationInfo', ['idf' => $idf]);
});
Route::get('/nos-formations', function () {
    return Inertia::render('nosFormation/NosFormation');
});
Route::get("/etude_stratigique", function () {
    return Inertia::render('etudeSt/EtudeSt');
});





$adminList = [
    // [
    //     "path" => "/admin",
    //     "element" => "index"
    // ],
    [
        "path" => "/admin/Demande",
        "element" => "Demande"
    ],
    [
        "path" => "/admin/Formtion",
        "element" => "formtion/index"
    ],
    [
        "path" => "/admin/Formtion/add",
        "element" => "formtion/Add"
    ],
    [
        "path" => "/admin/info",
        "element" => "Info"
    ],
    [
        "path" => "/admin/users",
        "element" => "Users"
    ],
    [
        "path" => "/admin/message",
        "element" => "Message"
    ],
    [
        "path" => "/admin/Certificat",
        "element" => "Certificat"
    ]
];
foreach ($adminList as $link) {
    Route::get($link["path"], function (Request $request) use ($link) {
        // $request->session()->flash('flash.banner', 'Yay it works!');
        //$request->session()->flash('flash.bannerStyle', 'error');
        $com = 'Dashboard/admin/' . $link["element"];
        return Inertia::render($com);
    });
}
Route::get("/admin", function () {
    $demandesCount = Demande::count();
    $formationsCount = Formation::count();
    $usersCount = User::count();
    $messagesCount = Message::count();
    $latsetDemandes = Demande::orderBy('created_at','desc')->with(['formation','user','demandeable'])->take(5)->get();
    $latsetMessages = Message::orderBy('created_at','desc')->take(5)->get();


    return Inertia::render('Dashboard/admin/index',[
        'demandesCount'=> $demandesCount,
        'formationsCount'=> $formationsCount,
        'usersCount'=> $usersCount,
        'messagesCount'=> $messagesCount,
        'latsetDemandes'=>$latsetDemandes,
        'latsetMessages'=>$latsetMessages
    ]);
});

Route::get("/admin/formtion/edit/{idf}", function ($idf) {
    return Inertia::render('Dashboard/admin/formtion/Edit', ['idf' => $idf]);
});

// Route::post('/login',[AuthController::class,'login'])->name('login');


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// Client Routes 
Route::get("/Client/Demande", function () {
    return Inertia::render('dashboardClient/PagesClient');
});

Route::post('/physique/add',[DemandeController::class,'storePhysique']);
Route::post('/moral/add',[DemandeController::class,'storeMoral']);
Route::post('/category/store',[FormationCategorieController::class,'store']);

Route::post('/addUser',[InfoController::class,'register']);
require __DIR__.'/auth.php';
