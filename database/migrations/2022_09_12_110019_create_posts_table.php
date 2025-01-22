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
            $table->bigInteger('user_id')->comment('0 = admin, ids = users ids')->nullable();
            $table->bigInteger('category_id')->nullable();
            $table->string('tags', 255)->nullable();
            $table->text('short_post')->nullable();
            $table->longText('description')->nullable();
            $table->string('image', 255)->default('post.png');
            $table->tinyInteger('status')->default(1)->comment('0 = inactive, 1 = active');
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
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
