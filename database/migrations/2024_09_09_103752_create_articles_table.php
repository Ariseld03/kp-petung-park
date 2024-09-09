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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longtext('main_content');
            $table->tinyinteger('status')->default(0);
            $table->string('staff_email');
            $table->unsignedBigInteger('agenda_id');
            $table->timestamps();
            
            $table->foreign('staff_email')->references('email')->on('staffs')->onDelete('cascade');
            $table->foreign('agenda_id')->references('id')->on('agendas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            // Drop the foreign key constraint before dropping the column
            $table->dropForeign(['staff_email']);
            $table->dropForeign(['agenda_id']);
            $table->dropColumn('staff_email');
            $table->dropColumn('agenda_id');
        });
        Schema::dropIfExists('articles');
    }
};
