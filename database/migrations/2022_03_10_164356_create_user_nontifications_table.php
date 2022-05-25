<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserNontificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_nontifications', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['info', 'ads']);
            $table->enum('notifiable_type', ['transaksi', 'diskon', 'product']);
            $table->unsignedBiginteger('notifiable_id')->unsignedBiginteger();
            $table->foreign('notifiable_id')->references('id')->on('users')->onDelete('cascade');
            $table->text('data');
            $table->datetime('read_at')->nullable();
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
        Schema::dropIfExists('user_nontifications');
    }
}
