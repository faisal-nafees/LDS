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
        Schema::create('select_options', function (Blueprint $table) {
            $table->id();
            $table->string('option');
            $table->string('code');
            $table->tinyInteger('for')->comment('0=braket, 1=front notch, 2=back notch, 3=bottom thickness');
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
        Schema::dropIfExists('select_options');
    }
};
