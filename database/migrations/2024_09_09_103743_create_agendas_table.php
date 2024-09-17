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
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->string('event_name');
            $table->date('event_start_date');
            $table->date('event_end_date');
            $table->string('event_location');
            $table->tinyinteger('status')->default(0);
            $table->longtext('description')->nullable();
            $table->timestamps();
            $table->string('staff_email');
            $table->foreign('staff_email')->references('email')->on('staffs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('agendas', function (Blueprint $table) {
            // Drop the foreign key constraint before dropping the column
            $table->dropForeign(['staff_email']);
            $table->dropColumn('staff_email');
        });
        Schema::dropIfExists('agendas');
    }
};
