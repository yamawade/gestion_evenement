<?php

use App\Models\User;
use App\Models\Evenement;
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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Evenement::class)->constrained()->onDelete('cascade');
            $table->integer('nombre_place');
            $table->date('date_reservation');
            $table->enum('est_accepter_ou_pas',['accepter','decliner'])->default('accepter');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
