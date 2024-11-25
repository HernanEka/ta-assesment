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
        Schema::create('ips', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address', 15)->unique();
            $table->string('slug')->unique();
            $table->string('tipe')->default('user');
            $table->foreignId('server_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ips');
    }
};
