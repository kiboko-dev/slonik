<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('connections', function (Blueprint $table) {
            $table->uuid('id');
            $table->foreignUuid('license')
                ->references('id')
                ->on('licenses')
                ->onDelete('cascade');
            $table->ipAddress('ip')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('connections');
    }
};
