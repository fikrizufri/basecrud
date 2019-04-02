<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('parent_id')->unsigned()->default(0);
            $table->string('name');
            $table->string('slug');
            $table->string('url');
            $table->string('class');
            $table->tinyInteger('position');
            $table->integer('group_id')->unsigned();
            $table->enum('active', ['Y', 'N']);
            $table->string('target');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('group_id')->references('id')->on('menu_groups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
