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
        Schema::create('membership_clubs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('name')->unique();
            $table->string('slug')->nullable();
            $table->string('country');
            $table->string('club_email')->unique();
            $table->string('club_mobile')->unique();
            $table->string('club_website')->nullable();
            $table->string('club_facebook_link')->nullable();
            $table->string('club_twitter_link')->nullable();
            $table->string('club_instagram_link')->nullable();
            $table->string('club_venue')->nullable();
            $table->string('club_zip_code')->nullable();
            $table->string('club_language')->nullable();
            $table->string('number_of_supporters')->default(0);
            $table->timestamp('last_supporter_joined_date')->nullable();
            $table->string('ticket_contact_name')->nullable();
            $table->string('ticket_contact_email')->nullable();
            $table->string('ticket_contact_number')->nullable();
            $table->string('ticket_address')->nullable();
            // $table->timestamp('')->default();
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
        Schema::dropIfExists('membership_clubs');
    }
};
