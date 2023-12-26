<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Course\Entities\V1\CourseUser\CourseUserFields;
use Modules\Support\Enums\V1\Entities\Entities;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(Entities::CourseUser->pivot(), function (Blueprint $table)
        {
            $table->id();
            $table->foreignId(Entities::Course->foreign())->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId(Entities::User->foreign())->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->tinyInteger(CourseUserFields::ROLE);
            $table->unsignedInteger(CourseUserFields::COMMISSION);
            $table->unsignedInteger(CourseUserFields::WEIGHT);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Entities::CourseUser->pivot());
    }
};
