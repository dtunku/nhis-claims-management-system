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
    Schema::create('claims', function (Blueprint $table) {
        $table->id();
        $table->string('hmo_name');
        $table->foreign('hmo_name')
              ->references('name')->on('hmos')
              ->onDelete('cascade')
              ->onUpdate('cascade');
        $table->enum('hmo_type', ['Public','Private']);
        $table->enum('billed_period', ['January','February','March','April','May','June','July','August','September','October','November','December']);
        $table->decimal('billed_amount', 10, 2);
        $table->date('payment_date')->nullable();
        $table->decimal('paid_amount', 10, 2)->nullable();
        $table->decimal('difference', 10, 2)->nullable()->default(null);
        $table->binary('attachment')->nullable();
        $table->text('remark')->nullable();
        $table->timestamps();
    });

    // Schema::table('claims', function (Blueprint $table) {
    //     $table->foreign('hmo_name')
    //           ->references('name')->on('hmos')
    //           ->onDelete('cascade')
    //           ->onUpdate('cascade');
    // });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('claims');
    }
};
