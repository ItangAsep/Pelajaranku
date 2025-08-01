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
        Schema::create('approvals', function (Blueprint $table) {
        $table->id();
        $table->foreignId('material_id')->constrained()->onDelete('cascade');
        $table->foreignId('approved_by')->constrained('users')->onDelete('cascade');
        $table->enum('status', ['approved', 'rejected']);
        $table->text('notes')->nullable();
        $table->timestamp('approved_at')->nullable();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approvals');
    }
};
