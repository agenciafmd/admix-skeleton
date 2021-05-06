<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create:skeleton_name_pluralTable extends Migration
{
    public function up()
    {
        Schema::create(':skeleton_name_plural_lower', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('is_active')
                ->default(1);
            $table->boolean('star')
                ->default(0);
            $table->string('name');
            $table->string('slug');
            $table->integer('sort')
                ->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists(':skeleton_name_plural_lower');
    }
}
