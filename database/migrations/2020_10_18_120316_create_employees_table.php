<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('father_name');
            $table->date('dob');
            $table->enum('gender',['Male','Female','other'])->nullable();
            $table->string('phone');
            $table->string('reference')->nullable();
            $table->string('referencePhone')->nullable();
            $table->string('localaddress')->nullable();
            $table->string('permanentadress');
            $table->string('Nationality');
            $table->enum('Materialstatus',['married','unmarried','Others'])->default('unmarried');
            $table->string('photo')->nullable();
            $table->string('resumefile')->nullable();
            $table->string('joiningletter')->nullable();
            $table->string('offerletter')->nullable();
            $table->string('contractletter')->nullable();
            $table->string('googledriveurl')->nullable();
           // $table->string('department');
            $table->unsignedBigInteger('department');

            $table->string('designation');
            $table->date('dateofjoining');
            $table->date('dateofleaving')->nullable();
            $table->enum('status',['active','inactive'])->default('active');
           
            $table->float('basicsalary');
            $table->float('allowence')->nullable();
            $table->float('deduction')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('Accountholdername');
            $table->bigInteger('Accountnumber');
            $table->string('bankname');
            $table->string('branch');
            
            $table->integer('bankcode')->nullable();
            $table->unsignedBigInteger('added_by');
            $table->foreign('added_by')->references('id')->on('users');
            $table->foreign('department')->references('id')->on('departments');

            










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
        Schema::dropIfExists('employees');
    }
}
