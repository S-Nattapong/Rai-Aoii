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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('desired');
            $table->double('quantity',6,2)->default(0);
            $table->integer('deal_money')->default(0);
            $table->integer('deposit_money')->default(0);
            $table->string('reason')->nullable()->default(null);
            // $table->unsignedBigInteger('producer_id')->nullable()->default(null);
            // $table->foreign('producer_id')->references('id')->on('users');
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
        Schema::dropIfExists('posts');
    }
};
