<?php

namespace Modules\Support\Providers;

use Filament\Forms\Components\Component;
use Filament\Tables\Columns\Column;
use Illuminate\Support\ServiceProvider;
use Modules\Support\Console\V1\Panic\Venus;
use Throwable;

class SupportServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->registerCommands();
        $this->registerFilamentMacros();
    }

    /**
     * Register Support commands
     *
     * @return void
     */
    private function registerCommands(): void
    {
        $this->commands(
            [
                Venus::class,
            ]
        );
    }

    /**
     * Register filament macros
     *
     * @return void
     */
    private function registerFilamentMacros(): void
    {
        Component::macro('modularTranslate', function (string $module, string $key = null, int $version = null)
        {
            return $this->modularLabel($module, $key, $version)
                        ->modularPlaceholder($module, $key, $version)
            ;
        });

        Component::macro('modularLabel', function (string $module, string $key = null, int $version = null)
        {
            try
            {
                if (empty($key))
                    $key = 'filament.' . $this->getName();

                if (empty($version))
                    $version = config('framework.max_versioned_file', 1);

                $this->label(__("v$version.$module::$key.label"));
            }
            catch (Throwable $exception)
            {
                crash()->report($exception);
            }

            return $this;
        });

        Column::macro('modularLabel', function (string $module, string $key = null, int $version = null)
        {
            try
            {
                if (empty($key))
                    $key = 'filament.' . $this->getName();

                if (empty($version))
                    $version = config('framework.max_versioned_file', 1);

                $this->label(__("v$version.$module::$key.label"));
            }
            catch (Throwable $exception)
            {
                crash()->report($exception);
            }

            return $this;
        });

        Component::macro('modularPlaceholder', function (string $module, string $key = null, int $version = null)
        {
            try
            {
                if (empty($key))
                    $key = 'filament.' . $this->getName();

                if (empty($version))
                    $version = config('framework.max_versioned_file', 1);

                $placeholder = __("v$version.$module::$key.placeholder");
                if (empty($placeholder))
                    $placeholder = __("v$version.$module::filament.global.placeholder", ['key' => __("v$version.$module::$key.label")]);

                if (method_exists($this, 'placeholder'))
                    $this->placeholder($placeholder);
            }
            catch (Throwable $exception)
            {
                crash()->report($exception);
            }

            return $this;
        });
    }
}
