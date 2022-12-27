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
        Schema::create('acrs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id')->nullable();   
            $table->string('client_name')->nullable();
            $table->string('email_id')->nullable();
            $table->unsignedBigInteger('contact_no')->nullable();
            $table->string('district')->nullable();
            $table->string('state_id')->nullable();
            $table->unsignedBigInteger('whatsapp_no')->nullable();
            
            $table->string('package_id')->nullable();
            $table->string('request_type')->nullable();  
            $table->string('final_ammount')->nullable();  
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->date('deposit_date')->nullable();
            $table->string('payment_mode')->nullable();  
            $table->string('neft_payment')->nullable();  
            $table->string('amount')->nullable();  
            $table->string('advance_amount')->nullable();  
            $table->string('narration')->nullable();  
            $table->string('attachment')->nullable();
            $table->date('deleted_date')->nullable();
            $table->timestamps();
            $table->foreign('bank_id')->references('id')->on('banks')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acrs');
    }
};