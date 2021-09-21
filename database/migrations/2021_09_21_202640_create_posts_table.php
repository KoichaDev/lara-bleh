<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // * The schema will be defined through what we want the column should have name based on the object and method we want to utilie!
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            // Alternative 1
            // index() will give a bit of speed to the database
            // $table->integer('user_id')->unsigned() ->index();

            // This will reference the user table of the ID columns
            // constrained() means we have foreign key constrained which helps us your database graph UI interface to allow you to pick records based on the constrained-foregin keys
            // onDelete('cascade') which means if you delete e.g. a user that has any post that is related to that specific user. We use that cascade to delete the database level
            $table->foreignId('user_id') -> constrained() -> onDelete('cascade');
            $table->text('body');
            $table->timestamps(); // create_at and update__column will be used from the timestamp. Very useful!
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
}
