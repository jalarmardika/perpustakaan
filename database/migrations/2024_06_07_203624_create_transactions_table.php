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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_code')->unique()->required();
            $table->unsignedBigInteger('book_id')->required();
            $table->foreign('book_id')->references('id')->on('books')->onDelete('restrict');
            $table->unsignedBigInteger('member_id')->required();
            $table->foreign('member_id')->references('id')->on('members')->onDelete('restrict');
            $table->unsignedBigInteger('user_id')->required();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->date('transaction_date');
            $table->date('return_date');
            $table->enum('status', ['borrowed','returned']);
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('transactions');
    }
};
