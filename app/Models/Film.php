<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class Film extends Model
{
    protected $fillable = ['title', 'description', 'sortie', 'note', 'commentaire'];

    public static function getById(int $id)
    {
        $films = Film::all();
        $retour = true;

        foreach ($films as $film){
            if ($film->attributes["id"] === $id){
                $retour = $film;
            }
        }

        return $retour === true ? $film = ["title"=>"Film introuvable"] : $retour;
    }

    public static function getSorted(string $type, string $order)
    {
        return DB::table("films")
            ->orderBy($type, $order)
            ->get();
    }

    public static function Maj($id, $film)
    {
        DB::table("films")
            ->where('id', $id)
            ->update([
                'title' => $film["title"],
                'description' => $film["description"],
                'note' => $film["note"],
                'sortie' => $film["sortie"],
                'commentaire' => $film["commentaire"],
            ]);
    }

    public static function Supr(int $id)
    {
        DB::table("films")
            ->where('id', $id)
            ->delete();
    }

    public static function getFiltered(string $filtre)
    {
        return match ($filtre) {
            "sortie" => DB::table("films")
                ->where("sortie", ">=", Carbon::now()->subYears(10))
                ->get(),
            "note" => DB::table("films")
                ->where("note", ">", 7)
                ->get(),
            default => Film::all(),
        };
    }
}
