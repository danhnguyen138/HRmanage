<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_recruitment');
            $table->string('name');
            $table->string('email');
            $table->string('CV_image');
            $table->string('department');
            $table->string('position');
            $table->string('status');
            $table->string('note')->nullable();
            $table->foreign('id_recruitment')->references('id')->on('recruits');
            $table->timestamps();

        });
        DB::table('candidates')->insert([
            ['name'=>'Ngo Quang Hieu','email'=>'Hieu@gmail.com','CV_image'=>'1667303867.jpg','department'=>'Phong nhan su','position'=>'Nhan vien','status'=>'2','note'=>'','id_recruitment'=>'1'],
            ['name'=>'Ngo Quang Nghia','email'=>'Nghia@gmail.com','CV_image'=>'1667303867.jpg','department'=>'Phong nhan su','position'=>'Nhan vien','status'=>'2','note'=>'','id_recruitment'=>'1'],
            ['name'=>'Ngo Quang Truong','email'=>'Truong@gmail.com','CV_image'=>'1667303867.jpg','department'=>'Phong nhan su','position'=>'Nhan vien','status'=>'1','note'=>'','id_recruitment'=>'2'],
            ['name'=>'Ngo Quang Trung','email'=>'Trung@gmail.com','CV_image'=>'1667303867.jpg','department'=>'Phong nhan su','position'=>'Nhan vien','status'=>'2','note'=>'','id_recruitment'=>'2']
           
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidates');
    }
};
