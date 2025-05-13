<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('squads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('squad_tech_expert', function (Blueprint $table) {
            $table->id();
            $table->foreignId('squad_id')->constrained()->onDelete('cascade');
            $table->foreignId('tech_expert_id')->constrained('users')->onDelete('cascade');
            $table->string('job_title');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('squad_tech_expert');
        Schema::dropIfExists('squads');
    }
};
