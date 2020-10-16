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
            $table->string('empoyee_id');
            $table->string('date_of_joining');
            $table->string('name');
            $table->string('dob');
            $table->string('marital_status');

            $table->string('father_name');
            $table->string('mother_name');

                       
            $table->string('permanent_address');
            $table->string('correspondence_address')->nullable();
            $table->string('mobile');
            $table->string('alternate')->nullable();
            $table->string('wife_of')->nullable();
            $table->string('guardian_mobile')->nullable();
            $table->string('father_occupation')->nullable();


            $table->string('qualification');
            
           
            $table->string('nominee_name')->nullable();
            $table->string('nominee_relation')->nullable();
            $table->string('nominee_mobile')->nullable();


            $table->string('photo')->nullable();
            $table->string('signature_image')->nullable();
            $table->string('adhar_number')->nullable();
            $table->string('adhar_image')->nullable();
            $table->string('pan_number')->nullable();
            $table->string('pan_image')->nullable();
           
           
            

           
            $table->string('account_number')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_ifsc')->nullable();


            $table->string('epf_no')->nullable();
            $table->string('esic_no')->nullable();
           
           
            $table->string('company_id')->nullable();
            $table->string('department_id')->nullable();
            $table->string('designation')->nullable();

            $table->string('salary')->default('0');

            $table->string('un_number')->nullable();
            
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
