<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserStoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_stories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id');
            $table->boolean('active')->default(true); // change scope to inactive if the test is not needed anymore
            $table->string('status')->nullable(); // OK / KO / BK
            $table->char('code', 3);
            // Requirements ---
            $table->text('condition'); // "In quanto"
            $table->text('expectation'); // "Voglio poter"
            $table->text('objective'); // "In modo che"
            $table->text('test'); // "So di aver finito quando"
            // ---
            $table->text('feedbacks')->nullable();
            $table->timestamp('tested_at')->nullable(); // if != null the user story can't be modified
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
        Schema::dropIfExists('user__stories');
    }
}
