<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('connections', function (Blueprint $table) {
            $table->uuid('id');
            $table->timestamp('last_connection')->default(now());
            $table->unsignedInteger('threads_count')->default(1);
            $table->string('thread_resolution')->default('1080p');
            $table->unsignedInteger('thread_framerate')->default(25);
            $table->boolean('highlight_active_tread')->default(true);
            $table->boolean('highlight_mouse_pointer_area')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('connections');
    }
};
