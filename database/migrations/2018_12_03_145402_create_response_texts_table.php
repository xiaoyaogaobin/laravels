<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponseTextsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('response_texts', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content')->comment('回复内容');
            $table->unsignedInteger('rule_id')->index()->default(0)->comment('规则主键 id');
            $table->foreign('rule_id')
                ->references('id')->on('rules')
                ->onDelete('cascade');
            $table->timestamps();
        },'基本图文描述');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('response_texts');
    }
}
