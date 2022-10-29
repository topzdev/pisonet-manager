<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shareholder', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shop_id')->constrained('shop')->onDelete('cascade');
            $table->double('percentage', null, 2);
            $table->string('username');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->string('password');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shareholder', function (Blueprint $table) {
            $table->dropSoftDeletes();
            $table->dropForeign(['shop_id']);
        });
    }
};
