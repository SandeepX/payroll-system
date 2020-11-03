<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeleavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employeeleaves', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Employee_id');
            $table->string('LeaveType');
            $table->date('from');
            $table->date('to');
            $table->text('comment');
            $table->enum('status',['pending','approved','cancelled'])->default('pending');
            $table->foreign('Employee_id')->references('id')->on('employees');
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
        Schema::dropIfExists('employeeleaves');
    }
}
