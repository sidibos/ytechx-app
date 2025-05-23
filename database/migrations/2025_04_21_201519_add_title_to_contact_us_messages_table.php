<?php

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
        Schema::table('contact_us_messages', function (Blueprint $table) {
            $table
            ->string('title')
            ->nullable()
            ->after('id'); // or adjust position as needed
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contact_us_messages', function (Blueprint $table) {
            $table->dropColumn('title');
        });
    }
};
