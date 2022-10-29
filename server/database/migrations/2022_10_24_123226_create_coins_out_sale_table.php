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
        Schema::create('coins_out_sale', function (Blueprint $table) {
            $table->id();
            $table->double('amount', null, 2);
            $table->foreignId('shareholder_id')->constrained('shareholder');
            $table->double('shareholder_percentage', null, 2);
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
        Schema::dropIfExists('coins_out_sale', function (Blueprint $table) {
            $table->dropSoftDeletes();
            $table->dropForeign(['shareholder_id']);
        });
    }
};
