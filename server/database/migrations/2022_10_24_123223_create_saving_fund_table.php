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
        Schema::create('saving_fund', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shop_id')->constrained('shop')->onDelete('cascade');
            $table->double('percentage',null, 2);
            $table->text('description')->nullable();
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
        Schema::dropIfExists('saving_fund', function (Blueprint $table) {
            $table->dropSoftDeletes();
            $table->dropForeign(['shop_id']);
        });
    }
};
