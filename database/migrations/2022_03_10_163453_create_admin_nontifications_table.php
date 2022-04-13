<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminNontificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_nontifications', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['transaksi', 'acc register']);
            $table->enum('notifiable_type', ['admin', 'customer service', 'office worker']);
            $table->unsignedBiginteger('notifiable_id')->unsignedBiginteger();
            $table->foreign('notifiable_id')->references('id')->on('admins')->onDelete('cascade');
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
        Schema::dropIfExists('admin_nontifications');
    }
}
