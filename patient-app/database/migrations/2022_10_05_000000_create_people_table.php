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
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('id_card')->unique();
            $table->enum('gender', ['Male', 'Female'])->default('Male');
            $table->string('name');
            $table->string('surname');
            $table->dateTime('date_of_birth')->nullable();
            $table->text('address')->nullable();
            $table->string('post_code')->nullable();
            $table->string('contact_number_1');
            $table->string('contact_number_2');
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
        Schema::dropIfExists('people');
    }
};
