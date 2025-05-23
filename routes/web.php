<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\UrlController;
use App\Models\Film;
use Illuminate\Support\Facades\Route;

// Affichage page d'accueil
Route::view("/", "welcome")->name("welcome");

// Affichage de tous les films
Route::get("/films", function (){

    return redirect()->route('films.sorted', ['type' => '0', 'order' => 0]);
})->name("films.index");

// Affichage d'un film
Route::get("/films/{id}", function (int $id){
    $back = back()->getTargetUrl();
    if (str_contains($back, "sorted")) {
        $back = route("films.sorted", UrlController::traiteBackSorted($back));
    }
    elseif (str_contains($back, "filtre")) {
        $back = route("films.filtre", UrlController::traiteBackFiltered($back));
    }

    $film = Film::getById($id);

    return view("films.show", compact("film", "back"));
})->name("films.show");

// Affichage du formulaire d'ajout de film
Route::view("/add/films", "films.create")->name("film.create");

// Ajout du film
Route::post("/films/ajouter", [FilmController::class, "ajouter"])->name("films.ajouter");

// Affichage du formulaire d'édition
Route::get("/edit/films/{id}", function (int $id){
    $film = Film::getById($id);

    return view("films.edit", compact("film", "id"));
})->name("film.edit");

// Modification du film
Route::post("/films/edit", [FilmController::class, "edit"])->name("films.edit");

// Suppression du film
Route::delete("/delete/films/{id}", [FilmController::class, "delete"])->name("films.delete");

// Afficher les films par triés
Route::get("films/sorted/{type}/{order}", function (string $type, string $order){
    $films = FilmController::getSorted($type, $order);

    $sortie = FilmController::getSortie($type, $order);
    $note = FilmController::getNote($type, $order);

    $filtre = "";

    return view("films.index", compact("films", "sortie", "note", "filtre"));
})->name("films.sorted");

// Afficher les films filtrés
Route::get("/films/filtre/{filtre}", function (string $filtre){
    $films = FilmController::getFiltered($filtre);

    $type = $order = 0;
    $sortie = FilmController::getSortie($type, $order);
    $note = FilmController::getNote($type, $order);

    return view("films.index", compact("films", "sortie", "note", "filtre"));
})->name("films.filtre");
