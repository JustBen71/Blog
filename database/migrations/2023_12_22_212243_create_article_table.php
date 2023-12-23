<?php

use App\Models\Categorie;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('titreArticle');
            $table->string('contenuArticle');
            $table->timestamps();
        });
        Schema::table('articles', function(Blueprint $table)
        {
            $table->foreignIdFor(User::class)
                ->nullable()
                ->constrained()
                ->onUpdate("restrict")
                ->onDelete("SET NULL");
        });
        Schema::table('articles', function(Blueprint $table)
        {
            $table->foreignIdFor(Categorie::class)
                ->nullable()
                ->constrained()
                ->onUpdate("restrict")
                ->onDelete("SET NULL");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
