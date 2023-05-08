<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrower', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_members');
            $table->foreign('id_members')->references('id')->on('members');
            $table->string('book_number');
            $table->date('loan_date');
            $table->date('date_of_return');
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('borrower');
    }
}
