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
        // Step 1: Update old enum values to match the new one
        DB::table('contact_us_messages')->where('status', 'view')->update(['status' => 'new']);

        // Step 2: Modify ENUM
        DB::statement("ALTER TABLE contact_us_messages MODIFY COLUMN status ENUM('new', 'viewed') DEFAULT 'new'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Reverse ENUM
        DB::statement("ALTER TABLE contact_us_messages MODIFY COLUMN status ENUM('new', 'view') DEFAULT 'new'");

        // Change viewed back to view
        DB::table('contact_us_messages')->where('status', 'viewed')->update(['status' => 'new']);
    }
};
