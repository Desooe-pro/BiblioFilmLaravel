<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string("title", 100);
            $table->text("description");
            $table->date("sortie");
            $table->decimal("note", 3, 1);
            $table->text("commentaire");
            $table->timestamps();

            $table->index('title');
            $table->index('sortie');
            $table->index("note");
        });

        $films = [
            [
                "title" => "Inception",
                "description" => "Un voleur spécialisé dans l'extraction des secrets subconscients reçoit une mission inhabituelle : implanter une idée dans l'esprit d'un PDG.",
                "sortie" => "2010-07-16",
                "note" => 8.8,
                "commentaire" => "Un chef-d'œuvre de science-fiction signé Christopher Nolan.",
            ],
            [
                "title" => "Le Seigneur des Anneaux : La Communauté de l'Anneau",
                "description" => "Un jeune Hobbit se voit confier la mission de détruire un anneau maléfique capable de corrompre même les plus sages.",
                "sortie" => "2001-12-19",
                "note" => 8.8,
                "commentaire" => "Épique, magique et fidèle à l'univers de Tolkien.",
            ],
            [
                "title" => "Parasite",
                "description" => "Une famille pauvre s'immisce dans la vie d'une famille riche, déclenchant une série d'événements inattendus.",
                "sortie" => "2019-05-30",
                "note" => 8.6,
                "commentaire" => "Un thriller social brillant, à la fois drôle et inquiétant.",
            ],
            [
                "title" => "The Dark Knight",
                "description" => "Batman affronte le Joker, un criminel imprévisible semant le chaos à Gotham.",
                "sortie" => "2008-07-18",
                "note" => 9.0,
                "commentaire" => "Heath Ledger est phénoménal dans le rôle du Joker.",
            ],
            [
                "title" => "Amélie",
                "description" => "Une jeune femme timide à l'imagination débordante décide de changer la vie de ceux qui l'entourent.",
                "sortie" => "2001-04-25",
                "note" => 8.3,
                "commentaire" => "Poétique, drôle et visuellement enchanteur.",
            ],
        ];

        foreach ($films as $film) {
            DB::table("films")->insert([
                "title" => $film["title"],
                "description" => $film["description"],
                "sortie" => $film["sortie"],
                "note" => $film["note"],
                "commentaire" => $film["commentaire"]
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
