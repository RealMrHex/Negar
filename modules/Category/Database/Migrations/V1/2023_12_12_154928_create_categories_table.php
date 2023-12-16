<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Category\Entities\V1\Category\CategoryFields;
use Modules\Support\Enums\V1\Entities\Entities;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(Entities::Category->table(), function (Blueprint $table)
        {
            $table->id();
            $table->foreignId(CategoryFields::PARENT_ID)
                  ->nullable()
                  ->constrained(Entities::Category->table(), CategoryFields::ID)
                  ->cascadeOnDelete()
                  ->cascadeOnUpdate()
            ;
            $table->string(CategoryFields::SLUG)->unique();
            $table->string(CategoryFields::TITLE);
            $table->string(CategoryFields::COVER);
            $table->string(CategoryFields::SOCIAL_PREVIEW)->nullable();
            $table->tinyText(CategoryFields::DESCRIPTION);
            $table->longText(CategoryFields::CONTENT);
            $table->tinyInteger(CategoryFields::STATUS);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Entities::Category->table());
    }
};
