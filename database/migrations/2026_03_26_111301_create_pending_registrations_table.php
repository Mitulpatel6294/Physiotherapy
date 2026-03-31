<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pending_registrations', function (Blueprint $table) {

            $table->id();

            $table->string('name');
            $table->string('email')->index();
            $table->string('password');

            $table->string('otp_hash', 255);
            $table->timestamp('otp_expires_at');

            $table->unsignedTinyInteger('attempts_count')->default(0);
            $table->timestamp('last_sent_at')->nullable();

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pending_registrations');
    }
};
