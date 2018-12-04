<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->default('')->comment('文章标题');
            $table->unsignedInteger('user_id')->index()->default(0)->comment('文章作者');
            //外键约束：数据库迁移-->外键约束
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->unsignedInteger('category_id')->index()->default(0)->comment('文章栏目id');
            $table->foreign('category_id')
                ->references('id')->on('gategories')
                ->onDelete('cascade');
            $table->string('background')->default('')->comment('文章背景图片');
            $table->text('content')->comment('文章内容');
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
        Schema::dropIfExists('articles');
    }
}
