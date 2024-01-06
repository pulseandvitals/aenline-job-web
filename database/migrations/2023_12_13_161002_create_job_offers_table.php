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
        Schema::create('job_offers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('user_id')->foreign('id')->on('users')->cascade();
            $table->string('company_name')->nullable();
            $table->string('company_logo')->nullable();
            $table->text('company_address')->nullable();
            $table->text('employment_settings')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->text('work_setup')->nullable();
            $table->text('tags')->nullable();
            $table->boolean('is_available')->default(1);
            $table->integer('applicant_count')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_offers');
    }
};
