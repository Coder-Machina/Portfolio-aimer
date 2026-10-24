<?php

declare(strict_types=1);

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
        // [WHY] Singleton settings record storing global site identity and contact links
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name', 150);
            $table->string('contact_email', 150);
            $table->string('phone', 30)->nullable();
            $table->string('whatsapp_number', 30)->nullable();
            $table->json('social_links')->nullable();
            $table->string('logo', 255)->nullable();
            $table->text('meta_description')->nullable();
            $table->string('cv_file', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
