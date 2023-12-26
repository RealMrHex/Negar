<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Episode\Entities\V1\Episode\EpisodeFields;
use Modules\Season\Entities\V1\Season\SeasonFields;
use Modules\Support\Enums\V1\Entities\Entities;
use Modules\Support\Enums\V1\ToggleStatus\ToggleStatus;
use Modules\User\Entities\V1\User\UserFields;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(Entities::Episode->table(), function (Blueprint $table)
        {
            $table->id();
            $table->foreignId(EpisodeFields::TEACHER_ID)->constrained(Entities::User->table(), UserFields::ID)->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId(EpisodeFields::SEASON_ID)->constrained(Entities::Season->table(), SeasonFields::ID)->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedInteger(EpisodeFields::WEIGHT);
            $table->string(EpisodeFields::ATTACHMENT)->nullable();
            $table->string(EpisodeFields::TITLE);
            $table->longText(EpisodeFields::DESCRIPTION)->nullable();
            $table->string(EpisodeFields::DURATION);
            $table->jsonb(EpisodeFields::VIDEO_CONFIG)->nullable();
            $table->timestamp(EpisodeFields::PUBLISHED_AT)->nullable();
            $table->timestamp(EpisodeFields::SUBSCRIPTION_ACCESSED_AT)->nullable();
            $table->timestamp(EpisodeFields::PAID_ACCESSED_AT)->nullable();
            $table->timestamp(EpisodeFields::INSTALLMENT_ACCESSED_AT)->nullable();
            $table->tinyInteger(EpisodeFields::FREE_ACCESS)->default(ToggleStatus::Disabled->value);
            $table->tinyInteger(EpisodeFields::IS_ACCESSIBLE)->default(ToggleStatus::Enabled->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Entities::Episode->table());
    }
};
