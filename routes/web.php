<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/send', [App\Http\Controllers\ProjectsController::class, 'sendmail'])->name('send');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');
Route::get('/copie', [App\Http\Controllers\HomeController::class, 'copie'])->name('copie');

Route::get('offres', [App\Http\Controllers\HomeController::class, 'offres'])->name('offres');

Route::get('/v2', [App\Http\Controllers\HomeController::class, 'indexv2'])->name('welcomev2');

Route::get('/loginv2', [App\Http\Controllers\HomeController::class, 'loginv2']);

Route::POST('password_reset', [App\Http\Controllers\Auth\NewPasswordController::class, 'resetPassword'])->name('password_reset');

//Route::get('/registerv2', [App\Http\Controllers\HomeController::class, 'registerv2'])->name('registerv2');

Route::get('/resetv2', [App\Http\Controllers\HomeController::class, 'resetv2']);
Route::get('/{donnees}/detailv2', [App\Http\Controllers\HomeController::class, 'detailv2'])->name('detailv2');

Route::get('/aide-utilisateur', [App\Http\Controllers\HomeController::class, 'aide'])->name('aide_utilisateur');
Route::get('/guide/comment-gerer-mon-compte', [App\Http\Controllers\HomeController::class, 'commentGererCompte'])->name('commentGererCompte');
Route::get('/guide/creer-un-projet', [App\Http\Controllers\HomeController::class, 'creerUnprojet'])->name('creerUnprojet');
Route::get('/guide/faire-une-offre', [App\Http\Controllers\HomeController::class, 'faireOffre'])->name('faireOffre');

Route::get('/guide/chercheur', [App\Http\Controllers\HomeController::class, 'guideChercheur'])->name('chercheur');
Route::get('/guide/client', [App\Http\Controllers\HomeController::class, 'guideClient'])->name('client');
Route::get('/guide/eviter-les-litiges', [App\Http\Controllers\HomeController::class, 'eviteLitige'])->name('eviteLitige');
Route::get('/guide/principe-de-fonctionnement', [App\Http\Controllers\HomeController::class, 'principeFonctionnement'])->name('principeFonctionnement');

Route::post('offres/', [App\Http\Controllers\HomeController::class, 'offres'])->name('searchoffre');

Route::post('ckeditor/upload', [App\Http\Controllers\CKEditorController::class, 'upload'])->name('ckeditor.image-upload');

Route::get('about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('nos_services', [App\Http\Controllers\HomeController::class, 'service'])->name('service');
Route::get('/offre/{donnees}/detail','App\Http\Controllers\HomeController@detail')->name('detail');

Route::get('/search', [App\Http\Controllers\HomeController::class, 'rechercheOffre']);

Route::get('/autocomplete_kills', [App\Http\Controllers\HomeController::class, 'autorecherche_kills']);
Route::get('/autocomplete_pays', [App\Http\Controllers\HomeController::class, 'autorecherche_pays']);

/**Route::post('/autocomplete/getAutocomplete/', [App\Http\Controllers\HomeController::class,'getAutocomplete'])->name('Autocomplte.getAutocomplte');

Route::post('/autocomplete/fetch', [App\Http\Controllers\HomeController::class, 'fetch'])->name('autocomplete.fetch');
*/
Route::get('contacts',  [App\Http\Controllers\ContactController::class, 'create'])->name('contacts');

Route::get('lancement',  [App\Http\Controllers\ContactController::class, 'lancement'])->name('lancement');

Route::post('contact',  [App\Http\Controllers\ContactController::class, 'store']);

Route::post('commentaire', 'App\Http\Controllers\CommentaireController@store')->name('commentaire.store');

Route::post('newsletter', 'App\Http\Controllers\UsersController@newsletter')->name('newsletter');

// Middleware group
Route::group(['middleware' => ['auth']], function() {
    
    Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
    /**
     * Routes pour les 2
    */
    Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');
    Route::get('profil', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');
    Route::post('profil', [App\Http\Controllers\UserController::class, 'update_avatar'])->name('update_avatar');
    Route::resource('/users', 'App\Http\Controllers\UserController')->only(['profile', 'update_avatar', 'admin_credential_rules', 'postCredentials']);
    Route::post('modifie', [App\Http\Controllers\UserController::class, 'postCredentials'])->name('users.postCredentials');


    
	Route::get('edition/{user}/informations', [App\Http\Controllers\UserinfosController::class, 'infos'])->name('userinfos');
    Route::put('edition/{userinfo}/userinfo', [App\Http\Controllers\UserinfosController::class, 'update'])->name('update.userinfos');
    //Route::get('/{user}/informations', [App\Http\Controllers\UserinfosController::class,'infoInter'])->name('userinfos.internaud');
    Route::post('/profile/update', [App\Http\Controllers\UserinfosController::class, 'updateProfile'])->name('profile.update');
    
    /**
     * Routes uniquement chercheur
    */
    Route::group(['prefix' => 'chercheur', 'middleware'  =>  [ 'role:chercheur' ],  'as' => 'chercheur.',
	], function() {
        Route::get('candidature/{candidature}/edit', 'App\Http\Controllers\CandidaturesController@edit')->name('candidature.edit');
        Route::put('candidature/{candidature}', 'App\Http\Controllers\CandidaturesController@update')->name('candidature.update');
        Route::post('/vos_informations', [App\Http\Controllers\UserinfosController::class, 'store'])->name('userinfos.store');
        Route::get('/ajouter_vos_informations', [App\Http\Controllers\UserinfosController::class, 'create'])->name('form.userinfos');
        Route::get('/ajouter_informations', [App\Http\Controllers\UserinfosController::class, 'create_all'])->name('form.userinfo_all');
		Route::get('candidature/{candidature}', [App\Http\Controllers\HomeController::class, 'candidature'])->name('candidature');
        Route::post('/{info}/cv_modifie', [App\Http\Controllers\UserinfosController::class, 'update_cv'])->name('cv_modifie');

        Route::post('/projet/post', [App\Http\Controllers\CandidaturesController::class, 'store'])->name('projet.post');
        
        Route::get('/domaines/ajouter', [App\Http\Controllers\UserinfosSkillsController::class, 'create'])->name('userinfos_skills.userinfos_skill.create');

        Route::post('/domaines', [App\Http\Controllers\UserinfosSkillsController::class, 'store'])->name('userinfos_skills.userinfos_skill.store');

        Route::get('/domaines/liste', [App\Http\Controllers\UserinfosSkillsController::class, 'liste'])->name('userinfos_skills.userinfos_skill.liste');
        
        Route::get('langues/create',[App\Http\Controllers\LanguagesUserinfosController::class, 'create'])->name('languages_userinfos.languages_userinfo.create');
        Route::post('/langues', [App\Http\Controllers\LanguagesUserinfosController::class, 'store'])->name('languages_userinfos.languages_userinfo.store');
        Route::get('/langues/liste', [App\Http\Controllers\LanguagesUserinfosController::class, 'liste'])->name('languages_userinfos.languages_userinfo.liste');

        Route::delete('/userinfos_skill/{userinfos_skill}',[App\Http\Controllers\UserinfosSkillsController::class, 'destroy'])->name('userinfos_skill.destroy');
        
        Route::delete('/languages_userinfo/{languages_userinfo}', [App\Http\Controllers\LanguagesUserinfosController::class, 'destroy'])->name('languages_userinfo.destroy');
    });
    
    /**
     * Routes uniquement recruteur
    */
    Route::group([
		'prefix' => 'recruteur',
		'middleware'  =>  [ 'role:recruteur' ],
		'as' => 'recruteur.',
	], function() {
        Route::get('/ajouter_vos_informations', [App\Http\Controllers\UserinfosController::class, 'create'])->name('form.userinfos');
        Route::post('/vos_information', [App\Http\Controllers\UserinfosController::class, 'store'])->name('create.userinfos');
        
        Route::get('project/create',[App\Http\Controllers\ProjectsController::class, 'create'])->name('project.create');
        Route::post('/projet/nouveau', [App\Http\Controllers\ProjectsController::class, 'store'])->name('nouveau.projet');
        
        Route::post('/recruitement/candidat', [App\Http\Controllers\CandidaturesController::class, 'recrutement'])->name('recruitement');

        Route::get('/candidats', [App\Http\Controllers\DashboardController::class, 'candidats'])->name('candidature');
        
        Route::get('/offres/realisees', [App\Http\Controllers\DashboardController::class, 'offreRealiser'])->name('offreRealiser');

        Route::get('/liste/chercheurs', [App\Http\Controllers\CandidaturesController::class, 'listeChercheurs'])->name('listeChercheurs');
        
        Route::get('/candidats/{liste}/',[App\Http\Controllers\DashboardController::class, 'candidatoffre'])->name('listee');

        Route::get('/{info}/edit',[App\Http\Controllers\UserinfosController::class, 'edit'])->name('info.edit');

        Route::get('candidat/{info}/detail',[App\Http\Controllers\UserinfosController::class, 'showCandidats'])->name('detail.candidats');
	});


    /**
     * Routes uniquement administrateur
    */

    
    Route::get('projects/{project}/edit','App\Http\Controllers\ProjectsController@edit')->name('projects.project.edit');
    Route::put('project/{project}', 'App\Http\Controllers\ProjectsController@update')->name('projects.project.update');


    Route::group([
		'prefix' => 'admin',
		'middleware'  =>  [ 'role:admin' ],
		'as' => 'admin.',
	], function() {
        Route::group([
            'prefix' => 'skills',
        ], function () {
            Route::get('/', 'App\Http\Controllers\SkillsController@index')->name('skills.skill.index');
            Route::get('/create','App\Http\Controllers\SkillsController@create')->name('skills.skill.create');
            Route::get('/show/{skill}','App\Http\Controllers\SkillsController@show')->name('skills.skill.show');
            Route::get('/{skill}/edit','App\Http\Controllers\SkillsController@edit')->name('skills.skill.edit');
            Route::post('/', 'App\Http\Controllers\SkillsController@store')->name('skills.skill.store');
            Route::put('skill/{skill}', 'App\Http\Controllers\SkillsController@update')->name('skills.skill.update');
            Route::delete('/skill/{skill}','App\Http\Controllers\SkillsController@destroy')->name('skills.skill.destroy');
        });

        Route::group([
            'prefix' => 'countries',
        ], function () {
            Route::get('/', 'App\Http\Controllers\CountriesController@index')->name('countries.countrie.index');
            Route::get('/create','App\Http\Controllers\CountriesController@create')->name('countries.countrie.create');
            Route::get('/show/{countrie}','App\Http\Controllers\CountriesController@show')->name('countries.countrie.show');
            Route::get('/{countrie}/edit','App\Http\Controllers\CountriesController@edit')->name('countries.countrie.edit');
            Route::post('/', 'App\Http\Controllers\CountriesController@store')->name('countries.countrie.store');
            Route::put('countrie/{countrie}', 'App\Http\Controllers\CountriesController@update')->name('countries.countrie.update');
            Route::delete('/countrie/{countrie}','App\Http\Controllers\CountriesController@destroy')->name('countries.countrie.destroy');
        });
    
        Route::group([
            'prefix' => 'languages',
        ], function () {
            Route::get('/', 'App\Http\Controllers\LanguagesController@index')->name('languages.language.index');
            Route::get('/create','App\Http\Controllers\LanguagesController@create')->name('languages.language.create');
            Route::get('/show/{language}','App\Http\Controllers\LanguagesController@show')->name('languages.language.show');
            Route::get('/{language}/edit','App\Http\Controllers\LanguagesController@edit')->name('languages.language.edit');
            Route::post('/', 'App\Http\Controllers\LanguagesController@store')->name('languages.language.store');
            Route::put('update/{language}', 'App\Http\Controllers\LanguagesController@update')->name('languages.language.destroy');
            Route::post('destroy/{language}', 'App\Http\Controllers\LanguagesController@destroy')->name('languages.language.update');
        });

        Route::group([
            'prefix' => 'userinfos',
        ], function () {
            Route::get('/', 'App\Http\Controllers\UserinfosController@index')->name('userinfos.userinfo.index');
            Route::get('/create','App\Http\Controllers\UserinfosController@create')->name('userinfos.userinfo.create');
            Route::get('/show/{userinfo}','App\Http\Controllers\UserinfosController@show')->name('userinfos.userinfo.show');
            Route::get('/{userinfo}/edit','App\Http\Controllers\UserinfosController@edit')->name('userinfos.userinfo.edit');
            Route::post('/', 'App\Http\Controllers\UserinfosController@store')->name('userinfos.userinfo.store');
            Route::put('userinfo/{userinfo}', 'App\Http\Controllers\UserinfosController@update')->name('userinfos.userinfo.update');
            Route::delete('/userinfo/{userinfo}','App\Http\Controllers\UserinfosController@destroy')->name('userinfos.userinfo.destroy');
        });
    
    
        Route::group([
            'prefix' => 'userinfos_skills',
        ], function () {
            Route::get('/', 'App\Http\Controllers\UserinfosSkillsController@index')->name('userinfos_skills.userinfos_skill.index');
            Route::get('/create','App\Http\Controllers\UserinfosSkillsController@create')->name('userinfos_skills.userinfos_skill.create');
            Route::get('/show/{userinfosSkill}','App\Http\Controllers\UserinfosSkillsController@show')->name('userinfos_skills.userinfos_skill.show');
            Route::get('/{userinfosSkill}/edit','App\Http\Controllers\UserinfosSkillsController@edit')->name('userinfos_skills.userinfos_skill.edit');
            Route::post('/', 'App\Http\Controllers\UserinfosSkillsController@store')->name('userinfos_skills.userinfos_skill.store');
        });

        Route::group([
            'prefix' => 'projects',
        ], function () {
            Route::get('/', 'App\Http\Controllers\ProjectsController@index')->name('projects.project.index');
            Route::get('/create','App\Http\Controllers\ProjectsController@create')->name('projects.project.create');
            Route::get('/show/{project}','App\Http\Controllers\ProjectsController@show')->name('projects.project.show');
            Route::post('/', 'App\Http\Controllers\ProjectsController@store')->name('projects.project.store');
            Route::delete('/project/{project}','App\Http\Controllers\ProjectsController@destroy')->name('projects.project.destroy');
            
            
            Route::get('/update/publier/{id}/{publier}', 'App\Http\Controllers\ProjectsController@updateStatus')->name('publier');
        });

        Route::group([
            'prefix' => 'languages_userinfos',
        ], function () {
            Route::get('/', 'App\Http\Controllers\LanguagesUserinfosController@index')->name('languages_userinfos.languages_userinfo.index');
            Route::get('/create','App\Http\Controllers\LanguagesUserinfosController@create')->name('languages_userinfos.languages_userinfo.create');
            Route::get('/show/{languagesUserinfo}','App\Http\Controllers\LanguagesUserinfosController@show')->name('languages_userinfos.languages_userinfo.show');
            Route::get('/{languagesUserinfo}/edit','App\Http\Controllers\LanguagesUserinfosController@edit')->name('languages_userinfos.languages_userinfo.edit');
            Route::post('/', 'App\Http\Controllers\LanguagesUserinfosController@store')->name('languages_userinfos.languages_userinfo.store');
        });
        
        Route::group([
            'prefix' => 'imageurls',
        ], function () {
            Route::get('/', 'App\Http\Controllers\ImageurlsController@index')->name('imageurls.imageurl.index');
            Route::get('/create','App\Http\Controllers\ImageurlsController@create')->name('imageurls.imageurl.create');
            Route::get('/show/{imageurl}','App\Http\Controllers\ImageurlsController@show')->name('imageurls.imageurl.show');
            Route::get('/{imageurl}/edit','App\Http\Controllers\ImageurlsController@edit')->name('imageurls.imageurl.edit');
            Route::post('/', 'App\Http\Controllers\ImageurlsController@store')->name('imageurls.imageurl.store');
            Route::put('imageurl/{imageurl}', 'App\Http\Controllers\ImageurlsController@update')->name('imageurls.imageurl.update');
            Route::delete('/imageurl/{imageurl}','App\Http\Controllers\ImageurlsController@destroy')->name('imageurls.imageurl.destroy');
        });

        
		
        Route::group([
            'prefix' => 'users',
        ], function () {
            Route::get('/', 'App\Http\Controllers\UsersController@index')->name('users.user.index');
            Route::post('/newsletter', 'App\Http\Controllers\UsersController@newsletter')->name('users.user.newsletter');
            Route::get('/create','App\Http\Controllers\UsersController@create')->name('users.user.create');
            Route::get('/show/{user}','App\Http\Controllers\UsersController@show')->name('users.user.show')->where('id', '[0-9]+');
            Route::get('/{user}/edit','App\Http\Controllers\UsersController@edit')->name('users.user.edit')->where('id', '[0-9]+');
            Route::post('/', 'App\Http\Controllers\UsersController@store')->name('users.user.store');
            Route::put('user/{user}', 'App\Http\Controllers\UsersController@update')->name('update')->where('id', '[0-9]+');
            Route::delete('/user/{user}','App\Http\Controllers\UsersController@destroy')->name('users.user.destroy')->where('id', '[0-9]+');
    
        Route::group([
            'prefix' => 'roles',
        ], function () {
            Route::get('/', 'App\Http\Controllers\RolesController@index')->name('roles.role.index');
            Route::get('/create','App\Http\Controllers\RolesController@create')->name('roles.role.create');
            Route::get('/show/{role}','App\Http\Controllers\RolesController@show')->name('roles.role.show');
            Route::get('/{role}/edit','App\Http\Controllers\RolesController@edit')->name('roles.role.edit');
            Route::post('/', 'App\Http\Controllers\RolesController@store')->name('roles.role.store');
            Route::put('role/{role}', 'App\Http\Controllers\RolesController@update')->name('roles.role.update');
            Route::delete('/role/{role}','App\Http\Controllers\RolesController@destroy')->name('roles.role.destroy');
        });
        
        Route::get('candidature/{candidature}/edit', 'App\Http\Controllers\CandidatureController@edit')->name('candidatures.candidature.edit');
        Route::prefix('candidatures')->name('candidatures.')->group(function(){
            Route::get('/', 'App\Http\Controllers\CandidaturesController@index')->name('candidature');
            Route::get('/create','App\Http\Controllers\CandidaturesController@create')->name('candidature.create');
            Route::get('/show/{candidature}','App\Http\Controllers\CandidaturesController@show')->name('candidature.show');
            // Route::get('/{candidature}/edit','App\Http\Controllers\CandidaturesController@edit')->name('candidatures.candidature.edit');
            Route::get('candidature/{candidature}/edit', [App\Http\Controllers\CandidatureController::class, 'edit'])->name('candidature.edit');
            Route::post('/', 'App\Http\Controllers\CandidaturesController@store')->name('candidature.store');
            Route::put('candidature/{candidature}', 'App\Http\Controllers\CandidaturesController@update')->name('candidature.update');
            Route::delete('/candidature/{candidature}','App\Http\Controllers\CandidaturesController@destroy')->name('candidature.destroy');
        });
          
            Route::resource('/permissions', 'Laratrust\Http\Controllers\PermissionsController')
                ->only(['index', 'edit', 'update']);

            Route::resource('/roles', 'Laratrust\Http\Controllers\RolesController')
                ->only(['index', 'create', 'edit', 'update', 'destroy', 'show', 'store']);

            Route::resource('/roles-assignment', 'Laratrust\Http\Controllers\RolesAssignmentController')
                ->only(['index', 'edit', 'update']);


        //Route::get('locale', 'App\Http\Controllers\LocalizationController@getLang')->name('getlang');
        // Route qui permet de modifier la langue
        //Route::get('locale/{lang}', 'App\Http\Controllers\LocalizationController@setLang')->name('setlang');
	});

});

});    
require __DIR__.'/auth.php';


//Route::put('language/{language}', 'App\Http\Controllers\LanguagesController@update')->name('languages.language.update');
//Route::delete('/language/{language}','App\Http\Controllers\LanguagesController@destroy')->name('languages.language.destroy');


