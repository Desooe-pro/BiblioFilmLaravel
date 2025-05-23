<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilmController
{
    public static function getSorted(string $type, string $order)
    {
        return match ($type) {
            "note", "sortie" => match ($order) {
                "asc", "desc" => Film::getSorted($type, $order),
                default => Film::all(),
            },
            default => Film::all(),
        };
    }

    public static function getFiltered(string $filtre)
    {
        return match ($filtre){
            "note", "sortie" => Film::getFiltered($filtre),
            default => Film::all()
        };
    }

    public function ajouter(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'note' => 'required|integer',
            'sortie' => 'required|date',
            'commentaire' => 'required|string',
        ]);

        Film::create([
            'title' => $validated["title"],
            'description' => $validated["description"],
            'note' => $validated["note"],
            'sortie' => $validated["sortie"],
            'commentaire' => $validated["commentaire"],
        ]);

        return redirect()->route("films.index")->with("success", "Film ajouté avec succès !");
    }

    public function edit(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|integer',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'note' => 'required|integer',
            'sortie' => 'required|date',
            'commentaire' => 'required|string',
        ]);

        Film::Maj($validated['id'], [
            'title' => $validated["title"],
            'description' => $validated["description"],
            'note' => $validated["note"],
            'sortie' => $validated["sortie"],
            'commentaire' => $validated["commentaire"],
        ]);
        return redirect()->route("films.show", $validated['id'])->with("success", "Film modifié avec succès !");
    }

    public function delete(int $id)
    {
        $exists = DB::table("films")
            ->where('id', $id)
            ->exists();

        if (!$exists) {
            return redirect()->back()
                ->with('error', 'Film introuvable');
        }
        else {
            Film::Supr($id);
        }
        return redirect()->route("films.index")->with("success", "Film supprimé avec succès !");
    }

    public static function getSortie(string $type, string $order)
    {
        if ($type !== "sortie"){
            return ["type" => "sortie", "order" => "desc"];
        }
        elseif ($order === "desc"){
            return ["type" => "sortie", "order" => "asc"];
        }
        else {
            return ["type" => "0", "order" => "0"];
        }
    }

    public static function getNote(string $type, string $order)
    {
        if ($type !== "note"){
            return ["type" => "note", "order" => "desc"];
        }
        elseif ($order === "desc"){
            return ["type" => "note", "order" => "asc"];
        }
        else {
            return ["type" => "0", "order" => "0"];
        }
    }
}
