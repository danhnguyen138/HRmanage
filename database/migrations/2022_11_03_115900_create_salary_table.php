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
        Schema::create('salary', function (Blueprint $table) {
            $table->id();
            $table->string('salary_id');
            $table->string('user_id');
            $table->string('mouth_salary');
            $table->integer('work_day');
            $table->string('basic_salary');
            $table->string('allowance');
            $table->string('fee_payable');
            $table->string('money_received');
            $table->string('day_check');
            $table->string('note')->nullable();
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
        Schema::dropIfExists('salary');
    }
};
