<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAluguersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluguers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('campo');
            $table->date('date');
            $table->string('hora');
            $table->float('price');
            $table->string('ref')->unique();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('aluguers');
    }
}
