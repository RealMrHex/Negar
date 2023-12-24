<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Season\Entities\V1\Season\SeasonFields;
use Modules\Support\Enums\V1\Entities\Entities;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(Entities::Season->table(), function (Blueprint $table)
        {
            $table->id();
            $table->foreignId(Entities::Course->foreign())->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string(SeasonFields::TITLE);
            $table->unsignedInteger(SeasonFields::WEIGHT);
            $table->tinyInteger(SeasonFields::STATUS);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Entities::Season->table());
    }
};
