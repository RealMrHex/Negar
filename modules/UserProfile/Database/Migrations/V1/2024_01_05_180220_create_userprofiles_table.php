<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Support\Enums\V1\Entities\Entities;
use Modules\UserProfile\Entities\V1\UserProfile\UserProfileFields;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(Entities::UserProfile->table(), function (Blueprint $table)
        {
            $table->id();
            $table->foreignId(UserProfileFields::USER_ID)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string(UserProfileFields::AVATAR)->nullable();
            $table->string(UserProfileFields::FIRST_NAME)->nullable();
            $table->string(UserProfileFields::LAST_NAME)->nullable();
            $table->string(UserProfileFields::FULL_NAME)
                  ->virtualAs('CONCAT(' . UserProfileFields::FIRST_NAME . ", ' ', " . UserProfileFields::LAST_NAME . ')')
            ;
            $table->tinyInteger(UserProfileFields::GENDER)->nullable();
            $table->timestamp(UserProfileFields::BIRTH_DATE)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Entities::UserProfile->table());
    }
};
