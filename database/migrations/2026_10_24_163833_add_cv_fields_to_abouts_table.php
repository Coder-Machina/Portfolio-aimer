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
        Schema::table('abouts', function (Blueprint $table) {
            $table->string('headline', 255)->nullable()->after('photo');
            $table->json('experiences')->nullable()->after('bio');
            $table->json('educations')->nullable()->after('experiences');
            $table->json('certifications')->nullable()->after('educations');
            $table->json('languages')->nullable()->after('certifications');
            $table->json('qualities')->nullable()->after('languages');
            $table->json('interests')->nullable()->after('qualities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('abouts', function (Blueprint $table) {
            $table->dropColumn([
                'headline',
                'experiences',
                'educations',
                'certifications',
                'languages',
                'qualities',
                'interests',
            ]);
        });
    }
};
