<?php

use App\Models\Association;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('evenements', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->date('date_limite_inscription');
            $table->text('description');
            $table->string('image');
            $table->string('lieu');
            $table->boolean('est_cloturer_ou_pas');
            $table->date('date_evenement');
            $table->foreignIdFor(Association::class)->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evenements');
    }
};
