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
        Schema::create('generic', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->string('value');
            $table->tinyinteger('status')->default(0);
            $table->longtext('icon_picture_link');
            $table->timestamps();
            $table->string('staff_email');
            $table->foreign('staff_email')->references('email')->on('staffs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('generic', function (Blueprint $table) {
            // Drop the foreign key constraint before dropping the column
            $table->dropForeign(['staff_email']);
            $table->dropColumn('staff_email');
        });
        Schema::dropIfExists('generic');
    }
};
