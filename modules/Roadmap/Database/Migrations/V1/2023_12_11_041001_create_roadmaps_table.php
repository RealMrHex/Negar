<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Roadmap\Entities\V1\Roadmap\RoadmapFields;
use Modules\Support\Enums\V1\Entities\Entities;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(Entities::Roadmap->table(), function (Blueprint $table)
        {
            $table->id();
            $table->string(RoadmapFields::SLUG)->unique();
            $table->integer(RoadmapFields::WEIGHT)->unique();
            $table->string(RoadmapFields::LOGO);
            $table->string(RoadmapFields::THUMBNAIL);
            $table->string(RoadmapFields::DEMO)->nullable();
            $table->string(RoadmapFields::TITLE);
            $table->mediumText(RoadmapFields::DESCRIPTION);
            $table->tinyInteger(RoadmapFields::STATUS);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Entities::Roadmap->table());
    }
};
