<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactMessagesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('subject')->nullable();
            $table->text('message');
            $table->text('reply')->nullable();
            $table->boolean('is_read')->default(false);
            $table->timestamps();

            // Foreign key constraint, assuming you have users table
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    if (Schema::hasColumn('contact_messages', 'reply')) {
        Schema::table('contact_messages', function (Blueprint $table) {
            $table->dropColumn('reply');
        });
    }

    Schema::dropIfExists('contact_messages');
}

}
