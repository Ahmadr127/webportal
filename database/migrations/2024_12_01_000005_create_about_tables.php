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
        // About Sections
        Schema::create('about_sections', function (Blueprint $table) {
            $table->id();
            $table->string('section_key')->unique(); // e.g., 'company_profile', 'vision', 'mission'
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->longText('content');
            $table->string('image')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });

        // Company Values
        Schema::create('company_values', function (Blueprint $table) {
            $table->id();
            $table->string('icon'); // FontAwesome class
            $table->string('title');
            $table->text('description');
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_values');
        Schema::dropIfExists('about_sections');
    }
};
