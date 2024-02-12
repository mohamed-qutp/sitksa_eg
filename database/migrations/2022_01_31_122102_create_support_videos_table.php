<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('support_videos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('support_projects_id');
            $table->index('support_projects_id');
            $table->foreign('support_projects_id')->references('id')->on('support_projects')->onDelete('cascade')->onUpdate('cascade');
            
            $table->string('title');
            $table->text('video');
            
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
        Schema::dropIfExists('support_videos');
    }
}
