<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Category\Entities\V1\Category\CategoryFields;
use Modules\Course\Entities\V1\Course\CourseFields;
use Modules\Support\Enums\V1\Entities\Entities;
use Modules\User\Entities\V1\User\UserFields;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(Entities::Course->table(), function (Blueprint $table)
        {
            $table->id();
            $table->string(CourseFields::SLUG)->unique();
            $table->string(CourseFields::TITLE);
            $table->unsignedBigInteger(CourseFields::PRICE);
            $table->unsignedBigInteger(CourseFields::OFF_PRICE)->nullable();
            $table->unsignedBigInteger(CourseFields::INSTALLMENT_PRICE)->nullable();
            $table->string(CourseFields::DURATION)->nullable();
            $table->string(CourseFields::COVER);
            $table->tinyText(CourseFields::SHORT_DESCRIPTION);
            $table->longText(CourseFields::LONG_DESCRIPTION);
            $table->boolean(CourseFields::FREE_ACCESS);
            $table->boolean(CourseFields::CASH_ACCESS);
            $table->boolean(CourseFields::SUBSCRIPTION_ACCESS);
            $table->boolean(CourseFields::IS_PURCHASABLE);
            $table->boolean(CourseFields::IS_INSTALLMENTABLE);
            $table->boolean(CourseFields::IS_ONLINE);
            $table->boolean(CourseFields::IS_FACE_TO_FACE);
            $table->boolean(CourseFields::IS_OFFLINE);
            $table->unsignedInteger(CourseFields::MINIMUM_CAPACITY)->nullable();
            $table->unsignedInteger(CourseFields::MAXIMUM_CAPACITY)->nullable();
            $table->timestamp(CourseFields::REGISTRATION_START_DATE)->nullable();
            $table->timestamp(CourseFields::REGISTRATION_END_DATE)->nullable();
            $table->boolean(CourseFields::AUTO_CANCELLATION);
            $table->tinyInteger(CourseFields::STATUS);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Entities::Course->table());
    }
};
