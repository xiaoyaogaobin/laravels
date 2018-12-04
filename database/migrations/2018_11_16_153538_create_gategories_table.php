<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gategories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',100) ->default('') ->comment('文章标题');
            $table->string('icon',20) ->default('') ->comment('图片');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void --
     */
    public function down()
    {
        Schema::dropIfExists('gategories');
    }
}
