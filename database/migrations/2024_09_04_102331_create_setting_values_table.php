<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('setting_values', function (Blueprint $table) {
            $table->id();
            $table->uuid('connection_uuid');
            $table->string('key');
            $table->string('value');
            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('setting_values');
    }
};
