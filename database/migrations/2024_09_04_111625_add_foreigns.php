<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('setting_values', function (Blueprint $table) {
//            $table->foreign('connection_uuid')
//                ->references('id')
//                ->on('connections')
//                ->onDelete('cascade');
            $table->foreign('key')
                ->references('key')
                ->on('settings')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
    }
};
