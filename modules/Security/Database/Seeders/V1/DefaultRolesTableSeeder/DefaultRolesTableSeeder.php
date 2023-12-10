<?php

namespace Modules\Security\Database\Seeders\V1\DefaultRolesTableSeeder;

use Illuminate\Database\Eloquent\Model;
use Modules\Base\Database\Seeders\V1\BaseDatabaseSeeder\BaseDatabaseSeeder;
use Modules\Security\Entities\V1\Permission\RoleFields;

class DefaultRolesTableSeeder extends BaseDatabaseSeeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Model::unguard();

        $this
            ->sudo()
            ->manager()
            ->teacher()
            ->parent()
            ->student()
        ;
    }

    /**
     * Create sudo roles
     *
     * @return self
     */
    private function sudo(): self
    {
        v1_role()->create(
            [
                RoleFields::NAME         => 'sudo',
                RoleFields::DISPLAY_NAME => __('v1.security::role.sudo.display_name'),
                RoleFields::GUARD_NAME   => 'web',
            ]
        );

        v1_user()->find(1)->assignRole('sudo');
        v1_user()->find(2)->assignRole('sudo');

        return $this;
    }

    /**
     * Create manager roles
     *
     * @return self
     */
    private function manager(): self
    {
        v1_role()->create(
            [
                RoleFields::NAME         => 'manager',
                RoleFields::DISPLAY_NAME => __('v1.security::role.manager.display_name'),
                RoleFields::GUARD_NAME   => 'web',
            ]
        );

        v1_user()->find(3)->assignRole('manager');

        return $this;
    }

    /**
     * Create Teacher roles
     *
     * @return self
     */
    private function teacher(): self
    {
        v1_role()->create(
            [
                RoleFields::NAME         => 'teacher',
                RoleFields::DISPLAY_NAME => __('v1.security::role.teacher.display_name'),
                RoleFields::GUARD_NAME   => 'web',
            ]
        );

        return $this;
    }

    /**
     * Create Parent roles
     *
     * @return self
     */
    private function parent(): self
    {
        v1_role()->create(
            [
                RoleFields::NAME         => 'parent',
                RoleFields::DISPLAY_NAME => __('v1.security::role.parent.display_name'),
                RoleFields::GUARD_NAME   => 'web',
            ]
        );

        return $this;
    }

    /**
     * Create Student roles
     *
     * @return void
     */
    private function student(): void
    {
        v1_role()->create(
            [
                RoleFields::NAME         => 'student',
                RoleFields::DISPLAY_NAME => __('v1.security::role.student.display_name'),
                RoleFields::GUARD_NAME   => 'web',
            ]
        );
    }
}
