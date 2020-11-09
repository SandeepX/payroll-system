<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('departmentId');
            $table->string('employee');
            $table->date('date');
            $table->float('BasicAllowance')->nullable();
            $table->float('otherAllowance')->nullable();
            $table->float('BasicSalary');
            $table->float('BasicDeduct')->nullable();

            $table->float('otherDeduct')->nullable();
            $table->float('total');

            $table->enum('payment',['cash','check','BankDeposit'])->default('cash');
            $table->enum('status',['paid','unpaid'])->default('unpaid');
            $table->unsignedBigInteger('created_by');
            $table->foreign('departmentId')->references('id')->on('departments')->OnDelete('SET NULL');
            $table->foreign('created_by')->references('id')->on('users')->OnDelete('SET NULL');
            
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
        Schema::dropIfExists('payrolls');
    }
}
