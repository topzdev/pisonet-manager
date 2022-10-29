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
        Schema::create('coins_out', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('shop_id')->constrained('shop');
            $table->foreignId('saving_fund_id')->nullable()->constrained('saving_fund')->onDelete('cascade');
            $table->foreignId('electricity_charge_id')->nullable()->constrained('electricity_charge')->onDelete('cascade');
            $table->text('description')->nullable();
            $table->timestamp('start_date');
            $table->timestamp('end_date');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coins_out', function (Blueprint $table) {
            $table->dropSoftDeletes();
            $table->dropForeign(["shop_id", "saving_fund_id", "electricity_charge_id"]);
        });
    }
};
