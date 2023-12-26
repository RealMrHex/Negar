<?php

namespace Modules\Course\Entities\V1\Course;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Entities\V1\BaseModel;
use Modules\Course\Database\Factories\V1\CourseFactory\CourseFactory;
use Modules\Course\Enums\V1\CourseStatus\CourseStatus;

class Course extends BaseModel
{
    use HasFactory,
        CourseModifiers,
        CourseRelations,
        CourseScopes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        CourseFields::ID,
        CourseFields::SLUG,
        CourseFields::TITLE,
        CourseFields::PRICE,
        CourseFields::OFF_PRICE,
        CourseFields::INSTALLMENT_PRICE,
        CourseFields::DURATION,
        CourseFields::COVER,
        CourseFields::SHORT_DESCRIPTION,
        CourseFields::LONG_DESCRIPTION,
        CourseFields::FREE_ACCESS,
        CourseFields::CASH_ACCESS,
        CourseFields::SUBSCRIPTION_ACCESS,
        CourseFields::IS_PURCHASABLE,
        CourseFields::IS_INSTALLMENTABLE,
        CourseFields::IS_ONLINE,
        CourseFields::IS_FACE_TO_FACE,
        CourseFields::IS_OFFLINE,
        CourseFields::MINIMUM_CAPACITY,
        CourseFields::MAXIMUM_CAPACITY,
        CourseFields::REGISTRATION_START_DATE,
        CourseFields::REGISTRATION_END_DATE,
        CourseFields::AUTO_CANCELLATION,
        CourseFields::STATUS,
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        CourseFields::STATUS => CourseStatus::class,
    ];

    /**
     * Get a new factory instance for the model.
     *
     * @param callable|array|int|null $count
     * @param callable|array          $state
     *
     * @return Factory<static>
     */
    public static function factory($count = null, $state = []): Factory
    {
        return CourseFactory::new();
    }
}
