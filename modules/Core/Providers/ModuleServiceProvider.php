<?php

namespace Modules\Core\Providers;

use Modules\Base\Providers\V1\BaseServiceProvider\BaseServiceProvider;
use Nwidart\Modules\Laravel\Module;

class ModuleServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function register(): void
    {
        $this->initModules();
    }

    /**
     * Initialize specified list of modules.
     *
     * @note if module list not specified, all enabled modules will list.
     */
    private function initModules(): void
    {
        $modules = $this->app['modules']->allEnabled();

        foreach ($modules as $module)
        {
            $this->loadTranslations($module);
            $this->loadConfigs($module);
            $this->loadMigrations($module);
        }
    }

    /**
     * Load translations for the given module.
     */
    private function loadTranslations(Module $module): void
    {
        $max = config('framework.max_versioned_file');

        for ($version = 1; $version <= $max; $version++)
        {
            $translationsPath = "{$module->getPath()}/Lang/V$version";
            $this->loadTranslationsFrom($translationsPath, "v$version" . '.' . $module->get('alias'));
        }
    }

    /**
     * Load configs for the given module.
     */
    private function loadConfigs(Module $module): void
    {
        $max = config('framework.max_versioned_file');

        for ($version = 1; $version <= $max; $version++)
        {
            collect(['config' => "{$module->getPath()}/Config/V$version/config.php"])
                ->filter(fn($path) => file_exists($path))
                ->each(fn($path, $filename) => $this->mergeConfigFrom($path, "$version.{$module->get('alias')}.$filename"))
            ;
        }
    }

    /**
     * Load migrations for the given module.
     */
    private function loadMigrations(Module $module): void
    {
        $max = config('framework.max_versioned_file');

        for ($version = 1; $version <= $max; $version++)
        {
            $this->loadMigrationsFrom("{$module->getPath()}/Database/Migrations/V$version");
        }
    }
}
