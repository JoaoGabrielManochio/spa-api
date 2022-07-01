<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablesCityGroupCityCampaign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('active')
                ->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('city_group', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
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

        Schema::create('city', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')
                ->nullable();
            $table->unsignedInteger('city_group_id')
                ->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('city_group_id')
                ->references('id')
                ->on('city_group')
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
        Schema::dropIfExists('campaign');
        Schema::dropIfExists('city_group');
        Schema::dropIfExists('city');
    }
}
