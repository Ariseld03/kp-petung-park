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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longtext('description');
            $table->double('price', 15, 2);
            $table->tinyinteger('status')->default(0);
            $table->tinyinteger('status_recommended')->default(0);
            $table->integer('number_love')->nullable();
            $table->timestamps();
            
            $table->string('staff_email');
            $table->foreign('staff_email')->references('email')->on('staffs')->onDelete('cascade');
            
            $table->unsignedBigInteger('gallery_id');
            $table->foreign('gallery_id')->references('id')->on('galleries')->onDelete('cascade');
           
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('menus', function (Blueprint $table) {
            // Drop the foreign key constraint before dropping the column
            $table->dropForeign(['staff_email']);
            $table->dropForeign(['gallery_id']);
            $table->dropForeign(['category_id']);
            $table->dropColumn(['staff_email', 'gallery_id', 'category_id']);
        });
        Schema::dropIfExists('menus');
    }
};
