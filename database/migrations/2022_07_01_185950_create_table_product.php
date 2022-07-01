<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description')
                ->nullable();
            $table->float('price', 19, 2)
                ->nullable()
                ->default(0);
            $table->unsignedInteger('status')
                ->nullable()
                ->default(0);
            $table->unsignedInteger('campaign_id')
                ->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('campaign_id')
                ->references('id')
                ->on('campaign')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
