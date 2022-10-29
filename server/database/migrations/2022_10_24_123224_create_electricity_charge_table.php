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
        Schema::create('electricity_charge', function (Blueprint $table) {
            $table->id();
            $table->timestamp('start_date');
            $table->foreignId('shop_id')->constrained('shop')->onDelete('cascade');
            $table->timestamp('end_date');
            $table->double('kwh', null, 2 );
            $table->double('kwh_charge', null, 2);
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
        Schema::dropIfExists('electricity_charge', function (Blueprint $table) {
            $table->dropSoftDeletes();
            $table->dropForeign(['shop_id']);
        });
    }
};
