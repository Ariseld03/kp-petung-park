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
        Schema::table('generic', function (Blueprint $table) {
            $table->longText('value')->change();
            $table->longText('icon_picture_link')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('generic', function (Blueprint $table) {
            $table->string('value')->change();
            $table->string('icon_picture_link')->nullable()->change();
        });
    }
};
