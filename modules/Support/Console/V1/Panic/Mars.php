<?php

namespace Modules\Support\Console\V1\Panic;

use Exception;
use Filament\Facades\Filament;
use Illuminate\Console\Command;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Filesystem\Filesystem;
use Laravel\Prompts\Progress;
use Module;
use Throwable;
use function Laravel\Prompts\multiselect;
use function Laravel\Prompts\note;
use function Laravel\Prompts\progress;
use function Laravel\Prompts\search;
use function Laravel\Prompts\select;
use function Laravel\Prompts\spin;
use function Laravel\Prompts\table;
use function Laravel\Prompts\text;
use function Laravel\Prompts\warning;

class Mars extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'panic:mars';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Speed up your filament structure building...';

    /**
     * The selected module.
     *
     * @var string $selectedModule
     */
    protected string $selectedModule;

    /**
     * The selected panel.
     *
     * @var string $selectedPanel
     */
    protected string $selectedPanel;

    /**
     * The selected model.
     *
     * @var string $selectedModel
     */
    protected string $selectedModel;

    /**
     * All available models
     *
     * @var array $availableModels
     */
    protected array $availableModels;

    /**
     * Selected resource name
     *
     * @var string $selectedResourceName
     */
    protected string $selectedResourceName;

    /**
     * The selected features.
     *
     * @var array $selectedFeatures
     */
    protected array $selectedFeatures;

    /**
     * The desired reading preference.
     *
     * @var string $wannaRead
     */
    protected string $wannaRead;

    /**
     * The current step.
     *
     * @var string $step
     */
    protected string $step;

    /**
     * The estimated time to read.
     *
     * @var int $readTime
     */
    protected int $readTime;

    /**
     * The progress tracking object.
     *
     * @var Progress $progress
     */
    protected Progress $progress;

    /**
     * The filesystem object.
     *
     * @var Filesystem $filesystem
     */
    protected Filesystem $filesystem;

    /**
     * An array of table rows.
     *
     * @var array $rows
     */
    protected array $rows = [];

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        try
        {
            $this
                ->selectModel()
                ->selectModule()
                ->selectPanel()
                ->resourceName()
                ->selectFeatures()
                ->readPreferences()
                ->prepare()
            ;

        }
        catch (Throwable $exception)
        {
            warning($exception->getMessage());
        }
    }

    /**
     * Request the resource name
     *
     * @return $this
     */
    public function resourceName(): self
    {
        $this->selectedResourceName = text(
            label      : '✨ Type your resource name:',
            placeholder: 'e.g: UserResource',
            required   : true
        );

        return $this;
    }

    /**
     * Select model
     *
     * @return $this
     */
    protected function selectModel(): self
    {
        $fs     = $this->fs();
        $models = [];

        // Loop on all enabled modules
        foreach (Module::allEnabled() as $module)
        {
            // Loop on all versions
            for ($version = 1; $version <= config('framework.max_versioned_file'); $version++)
            {
                // Get the entities versioned directory
                $versionedDirectory = $module->getPath() . "/Entities/V$version";

                // Continue to check if it's not a directory
                if (!$fs->isDirectory($versionedDirectory))
                    continue;

                $modelDirectories = $fs->directories($versionedDirectory);
                foreach ($modelDirectories as $directory)
                {
                    $model = str($directory)->afterLast('/')->toString();

                    $files = $fs->files($directory);
                    if (empty($files))
                        continue;

                    $filesThatEnsureModelStructure = [
                        "$model.php",
                        "{$model}Fields.php",
                        "{$model}Scopes.php",
                        "{$model}Relations.php",
                        "{$model}Attributes.php",
                    ];

                    $score     = 0;
                    $modelFile = null;

                    foreach ($files as $file)
                    {
                        $fileName = $file->getBasename();
                        if (in_array($fileName, $filesThatEnsureModelStructure))
                            $score++;

                        if ($fileName === $filesThatEnsureModelStructure[0])
                            $modelFile = $file;
                    }

                    if (isset($modelFile) && $score > 1)
                    {
                        $fqcn = str($modelFile)
                            ->after('/modules/')
                            ->prepend('Modules/')
                            ->replace('/', '\\')
                            ->replaceLast('.' . $modelFile->getExtension(), '')
                            ->toString()
                        ;

                        $models[$fqcn] = $modelFile;
                    }
                }
            }
        }

        $this->availableModels = $models;

        $this->selectedModel = search(
            label      : '🔥 Select your target model',
            options    : function ($value) use ($models)
            {
                return array_filter(array_keys($models), function ($key) use ($value)
                {
                    return stripos($key, $value) !== false;
                });
            },
            placeholder: 'Search your model',
            hint       : 'Press enter to select',
        );

        return $this;
    }

    /**
     * Select module
     *
     * @return $this
     */
    protected function selectModule(): self
    {
        $this->selectedModule = select(
            label  : '🎯 Select your target module',
            options: array_keys(Module::allEnabled()),
            hint   : 'Press enter to select',
        );
        return $this;
    }

    /**
     * Select panel
     *
     * @return $this
     */
    protected function selectPanel(): self
    {
        $panels = [];

        foreach (Filament::getPanels() as $panel)
            $panels[$panel->getId()] = str($panel->getId())->studly();

        $this->selectedPanel = select(
            label  : '⚡️ Select your target panel',
            options: $panels,
            hint   : 'Press enter to select',
        );
        return $this;
    }

    /**
     * Select features
     *
     * @return $this
     */
    protected function selectFeatures(): self
    {
        $this->selectedFeatures = multiselect(
            label   : '🥂 Pick your features',
            options : $this->features(),
            required: true,
            hint    : 'Press space to select'
        );
        if (array_key_exists('all-in-one', $this->selectedFeatures))
            $this->selectedFeatures = array_keys($this->features());

        $this->selectedFeatures[] = 'kill';
        return $this;
    }

    /**
     * Read preferences
     *
     * @return $this
     */
    protected function readPreferences(): self
    {
        $this->wannaRead = select(
            label  : '👻 How about reading as we process your request?',
            options: [
                         'quote' => '🤩 I like to read quotes',
                         'joke'  => '😂 I like to read dad-jokes',
                         'nope'  => '😒 Crap, NO! just leave me alone',
                     ],
            hint   : 'Press enter to select',
        );

        if ($this->wannaRead !== 'nope')
        {
            $this->readTime = (int)select(
                label  : '👀 How much it takes to read a ' . $this->wannaRead,
                options: [
                             '3' => "😎 Huh, I'm pro. at least 3 seconds",
                             '5' => "🤓 I'm lazy a bit, I think 5 is okay",
                             '7' => '🥲 It takes a year for me',
                         ],
                hint   : 'Press enter to select',
            );
        }

        return $this;
    }

    /**
     * Progress and prepare
     *
     * @return void
     */
    protected function prepare(): void
    {
        progress(
            label   : 'Preparing your request to build...',
            steps   : $this->selectedFeatures,
            callback: fn(string $feature, Progress $progress) => $this->buildFeature($feature, $progress),
            hint    : 'Drink a shot of Whiskey while we are working on it... 🍷'
        );

        note('We made it for you, take a look 👀');
        spin(fn() => sleep(rand(1, 7)), 'Generating report... 🪄');
        table($this->headers(), $this->rows);
        note('Made with ❤️ and ☕️ by PanicDev');
    }

    /**
     * Get the features or search a feature by its key
     *
     * @param ?string $search
     *
     * @return string|array
     */
    protected function features(string $search = null): string|array
    {
        $features = [
            'resource' => 'Resource',
            'create'   => 'Resource Create Page',
            'edit'     => 'Resource Edit Page',
            'list'     => 'Resource List Page',
            'schema'   => 'Resource Schema',
        ];

        return $search ? ($features[$search] ?? '') : $features;
    }

    /**
     * Build a feature based on the requested one
     *
     * @param string   $feature
     * @param Progress $progress
     *
     * @return void
     * @throws Exception
     */
    protected function buildFeature(string $feature, Progress $progress): void
    {
        $this->progress = $progress;
        $this->step     = $feature;
        switch ($feature)
        {
            case 'resource':
                $this->handleResource();
                return;
            case 'create':
                $this->handleResourceCreatePage();
                return;
            case 'edit':
                $this->handleResourceEditPage();
                return;
            case 'list':
                $this->handleResourceListPage();
                return;
            case 'schema':
                $this->handleResourceSchema();
                return;
            case 'kill':
                $this->handleKiller();
                return;
        }
    }

    /**
     * Handle all in one request
     *
     * @return void
     */
    protected function handleAllInOne(): void
    {
        $this->progress->label("What a lovely choice, let's make it happen...");
        //sleep(3);
    }

    /**
     * @throws FileNotFoundException
     * @throws Exception
     */
    protected function process(string $path, string $file, string $extension, string $stub, array $replacers = []): void
    {
        $this->progress->label($this->label());

        if ($this->wannaRead === 'joke')
        {
            $this->progress->hint($this->jokes()[rand(0, 75)]);
            sleep(rand($this->readTime, $this->readTime * 2));
        }
        else if ($this->wannaRead === 'quote')
        {
            $this->progress->hint($this->quotes()[rand(0, 55)]);
            sleep(rand($this->readTime, $this->readTime * 2));
        }
        else
        {
            sleep(rand(1, 3));
        }

        $_path               = $this->path($path);
        $_file               = $this->safe($file . '.' . $extension);
        $_filePath           = $this->file("$_path/$_file");
        $_namespace          = $this->namespace($path);
        $_resource_namespace = $this->namespace('Filament/{{ PANEL }}/Resources/{{ RESOURCE }}Resource');

        if ($this->fs()->exists($_filePath))
        {
            $this->row($_file, $_namespace, $this->shortPath($_path), '🔴 Skipped', 'File was exist');
            return;
        }

        $this->generate(
            $stub,
            $_path,
            $_file,
            array_merge(
                $replacers,
                [
                    '{{ RESOURCE }}'           => $this->safe($file),
                    '{{ RESOURCE_BASE }}'      => $this->resourceBase(),
                    '{{ NAMESPACE }}'          => $_namespace,
                    '{{ RESOURCE_NAMESPACE }}' => $_resource_namespace,
                    '{{ MODEL_HELPER }}'       => $this->modelHelper(),
                ]
            )
        );

        $this->row($_file, $_namespace, $this->shortPath($_path), '🟢 Success', 'File generated');
    }

    /**
     * Handle resource
     *
     * @throws Exception
     */
    protected function handleResource(): void
    {
        $this->process(
            path     : 'Filament/{{ PANEL }}/Resources',
            file     : '{{ RESOURCE }}Resource',
            extension: 'php',
            stub     : 'resource',
        );
    }

    /**
     * Handle resource create page
     *
     * @throws Exception
     */
    protected function handleResourceCreatePage(): void
    {
        $this->process(
            path     : 'Filament/{{ PANEL }}/Resources/{{ RESOURCE }}Resource/Pages',
            file     : 'Create{{ RESOURCE }}',
            extension: 'php',
            stub     : 'create',
        );
    }

    /**
     * Handle resource edit page
     *
     * @throws Exception
     */
    protected function handleResourceEditPage(): void
    {
        $this->process(
            path     : 'Filament/{{ PANEL }}/Resources/{{ RESOURCE }}Resource/Pages',
            file     : 'Edit{{ RESOURCE }}',
            extension: 'php',
            stub     : 'edit',
        );
    }

    /**
     * Handle resource list page
     *
     * @throws Exception
     */
    protected function handleResourceListPage(): void
    {
        $this->process(
            path     : 'Filament/{{ PANEL }}/Resources/{{ RESOURCE }}Resource/Pages',
            file     : 'List{{ RESOURCE_PLURAL }}',
            extension: 'php',
            stub     : 'list',
        );
    }

    /**
     * Handle resource schema
     *
     * @throws Exception
     */
    protected function handleResourceSchema(): void
    {
        $this->process(
            path     : 'Filament/{{ PANEL }}/Resources/{{ RESOURCE }}Resource/Schema',
            file     : '{{ RESOURCE }}Schema',
            extension: 'php',
            stub     : 'schema',
        );
    }

    /**
     * Handle killer
     *
     * @return void
     */
    protected function handleKiller(): void
    {
        $this->progress->label('Almost done, finalizing your request....');
        sleep(3);
    }

    /**
     * Get the current version
     *
     * @return int
     */
    protected function version(): int
    {
        return config('framework.max_versioned_file', 1);
    }

    /**
     * Find the selected module
     *
     * @throws Exception
     */
    protected function module(): \Nwidart\Modules\Module
    {
        try
        {
            return Module::find($this->selectedModule);
        }
        catch (Throwable)
        {
            throw new Exception('Could not find the module that you have been selected at first.');
        }
    }

    /**
     * Get the namespace
     *
     * @param string $append
     *
     * @return string
     * @throws Exception
     */
    protected function namespace(string $append = null): string
    {
        try
        {
            $append = isset($append) ? ('\\' . $this->safe($append)) : '';

            return (
                config('modules.namespace') . '\\' . $this->module()->getStudlyName() . $append);
        }
        catch (Throwable $exception)
        {
            throw new Exception('Could not create namespace due ' . $exception->getMessage());
        }
    }

    /**
     * Get the model
     *
     * @return string
     */
    protected function model(): string
    {
        return str($this->selectedModel)->afterLast('\\')->toString();
    }

    /**
     * Get the model helper
     *
     * @return string
     */
    protected function modelHelper(): string
    {
        $version = str($this->selectedModel)->explode('\\')[3];
        $model   = str($this->selectedModel)->afterLast('\\')->toString();

        return strtolower("{$version}_$model");
    }

    /**
     * Get the panel
     *
     * @return string
     */
    protected function panel(): string
    {
        return str($this->selectedPanel)->studly()->toString();
    }

    /**
     * Get the resource
     *
     * @return string
     */
    protected function resource(): string
    {
        return $this->resourceBase();
    }

    /**
     * Get the resource plural
     *
     * @return string
     */
    protected function resourcePlural(): string
    {
        return str($this->resourceBase())->plural();
    }

    /**
     * Get the resource base
     *
     * @return string
     */
    protected function resourceBase(): string
    {
        return str($this->selectedResourceName)
            ->studly()
            ->replaceLast('resource', '')
            ->replaceLast('Resource', '')
            ->toString()
        ;
    }

    /**
     * Get the file system
     *
     * @return Filesystem
     */
    protected function fs(): Filesystem
    {
        if (empty($this->filesystem))
            $this->filesystem = new Filesystem();

        return $this->filesystem;
    }

    /**
     * Get the path
     *
     * @throws Exception
     */
    protected function path(string $append): string
    {
        try
        {
            return ($this->module()->getPath() . '/' . $this->safe($append, true));
        }
        catch (Throwable $exception)
        {
            throw new Exception('Could not create namespace due ' . $exception->getMessage());
        }
    }

    /**
     * Get the file path
     *
     * @param string $append
     * @param bool   $relative
     *
     * @return string
     * @throws Exception
     */
    protected function file(string $append, bool $relative = true): string
    {
        try
        {
            return $relative ? $this->safe($append, true) : ($this->module()->getPath() . '/' . $this->safe($append, true));
        }
        catch (Throwable $exception)
        {
            throw new Exception('Could not create namespace due ' . $exception->getMessage());
        }
    }

    /**
     * Get the safe string
     *
     * @param string $unsafe
     * @param bool   $pathStyle
     *
     * @return string
     */
    protected function safe(string $unsafe, bool $pathStyle = false): string
    {
        return str($unsafe)
            ->whenEndsWith(
                '/',
                fn($string) => str($string)->replaceLast('/', '')
            )
            ->replace('{{ MODEL }}', $this->model())
            ->replace('{{ PANEL }}', $this->panel())
            ->replace('{{ RESOURCE }}', $this->resource())
            ->replace('{{ RESOURCE_PLURAL }}', $this->resourcePlural())
            ->replace('{{ VERSION }}', 'V' . $this->version())
            ->when(!$pathStyle, fn($string) => str($string)->replace('/', '\\'))
        ;
    }

    /**
     * Get the short path
     *
     * @param $path
     *
     * @return string
     */
    protected function shortPath($path): string
    {
        return str($path)->replace('/var/www/html/', '');
    }

    /**
     * Get the stub values
     *
     * @param string $stub
     *
     * @return string
     * @throws FileNotFoundException
     */
    protected function stub(string $stub): string
    {
        $stubsBasePath = Module::find('Support')->getPath() . '/Stubs/Panic/Mars/';
        return $this->fs()->get($stubsBasePath . $stub . '.stub');
    }

    /**
     * Generate from stub
     *
     * @param string $from From Stub file
     * @param string $to   To directory
     * @param string $as   AS file name
     * @param array  $with With variables to replace
     *
     * @return void
     * @throws FileNotFoundException
     */
    protected function generate(string $from, string $to, string $as, array $with = []): void
    {
        $this->fs()->ensureDirectoryExists($to);

        $stub    = $this->stub($from);
        $content = str($stub)->replace(array_keys($with), array_values($with));

        $this->fs()->put($to . '/' . $as, $content);
    }

    /**
     * Add a row to the results table
     *
     * @param string $file
     * @param string $namespace
     * @param string $path
     * @param string $status
     * @param string $message
     *
     * @return void
     */
    protected function row(string $file, string $namespace, string $path, string $status, string $message): void
    {
        $this->rows[] = [
            $file,
            $namespace,
            $path,
            $status,
            $message,
        ];
    }

    /**
     * Get the table headers
     *
     * @return array
     */
    protected function headers(): array
    {
        return [
            'File',
            'Namespace',
            'Path',
            'Status',
            'Message',
        ];
    }

    /**
     * Get the model helper name
     *
     * @return string
     */
    protected function helper(): string
    {
        return 'v' . $this->version() . '_' . str($this->safe('{{ MODEL }}'))->snake();
    }

    /**
     * 100 Dad jokes
     *
     * @return string[]
     */
    protected function jokes(): array
    {
        return [
            "Why did the scarecrow win an award? Because he was outstanding in his field!",
            "I told my wife she was drawing her eyebrows too high. She looked surprised.",
            "How do you organize a space party? You planet.",
            "I only know 25 letters of the alphabet. I don't know y.",
            "Why couldn't the bicycle stand up by itself? It was two-tired.",
            "Why don't scientists trust atoms? Because they make up everything.",
            "I would tell you a joke about an elevator, but it's an uplifting experience.",
            "Why did the math book look sad? Because it had too many problems.",
            "Why don't skeletons fight each other? They don't have the guts.",
            "What did one hat say to the other? Stay here, I'm going on ahead.",
            "What do you call fake spaghetti? An impasta.",
            "I told my wife she was drawing her eyebrows too high. She looked surprised.",
            "Why don't scientists trust atoms? Because they make up everything.",
            "Why did the math book look sad? Because it had too many problems.",
            "Why don't skeletons fight each other? They don't have the guts.",
            "What did one hat say to the other? Stay here, I'm going on ahead.",
            "What do you call fake spaghetti? An impasta.",
            "I used to play piano by ear, but now I use my hands and fingers.",
            "Why did the scarecrow become a successful politician? Because he was outstanding in his field.",
            "I told my wife she should embrace her mistakes. She gave me a hug.",
            "What do you call a factory that makes good products? A satisfactory.",
            "Why don't scientists trust atoms? Because they make up everything.",
            "What did the janitor say when he jumped out of the closet? Supplies!",
            "I only know 25 letters of the alphabet. I don't know y.",
            "Why did the bicycle fall over? Because it was two-tired!",
            "How do you catch a squirrel? Climb a tree and act like a nut!",
            "What's orange and sounds like a parrot? A carrot.",
            "What did the ocean say to the shore? Nothing, it just waved.",
            "I would tell you a joke about an elevator, but it's an uplifting experience.",
            "Why don't skeletons fight each other? They don't have the guts.",
            "Why did the math book look sad? Because it had too many problems.",
            "How do you make holy water? You boil the hell out of it.",
            "Why did the scarecrow win an award? Because he was outstanding in his field!",
            "I told my wife she was drawing her eyebrows too high. She looked surprised.",
            "What do you call a fish wearing a crown? A kingfish.",
            "What did one hat say to the other? Stay here, I'm going on ahead.",
            "I'm on a whiskey diet. I've lost three days already.",
            "What did the janitor say when he jumped out of the closet? Supplies!",
            "Why don't scientists trust atoms? Because they make up everything.",
            "What do you call a factory that makes good products? A satisfactory.",
            "I used to play piano by ear, but now I use my hands and fingers.",
            "Why did the scarecrow become a successful politician? Because he was outstanding in his field.",
            "I told my wife she should embrace her mistakes. She gave me a hug.",
            "What do you call a factory that makes good products? A satisfactory.",
            "Why don't scientists trust atoms? Because they make up everything.",
            "What did the janitor say when he jumped out of the closet? Supplies!",
            "I only know 25 letters of the alphabet. I don't know y.",
            "Why did the bicycle fall over? Because it was two-tired!",
            "How do you catch a squirrel? Climb a tree and act like a nut!",
            "What's orange and sounds like a parrot? A carrot.",
            "What did the ocean say to the shore? Nothing, it just waved.",
            "I would tell you a joke about an elevator, but it's an uplifting experience.",
            "Why don't skeletons fight each other? They don't have the guts.",
            "Why did the math book look sad? Because it had too many problems.",
            "How do you make holy water? You boil the hell out of it.",
            "Why did the scarecrow win an award? Because he was outstanding in his field!",
            "I told my wife she was drawing her eyebrows too high. She looked surprised.",
            "What do you call a fish wearing a crown? A kingfish.",
            "What did one hat say to the other? Stay here, I'm going on ahead.",
            "I'm on a whiskey diet. I've lost three days already.",
            "What did the janitor say when he jumped out of the closet? Supplies!",
            "Why don't scientists trust atoms? Because they make up everything.",
            "What do you call a factory that makes good products? A satisfactory.",
            "I used to play piano by ear, but now I use my hands and fingers.",
            "Why did the scarecrow become a successful politician? Because he was outstanding in his field.",
            "I told my wife she should embrace her mistakes. She gave me a hug.",
            "What do you call a factory that makes good products? A satisfactory.",
            "Why don't scientists trust atoms? Because they make up everything.",
            "What did the janitor say when he jumped out of the closet? Supplies!",
            "I only know 25 letters of the alphabet. I don't know y.",
            "Why did the bicycle fall over? Because it was two-tired!",
            "How do you catch a squirrel? Climb a tree and act like a nut!",
            "What's orange and sounds like a parrot? A carrot.",
            "What did the ocean say to the shore? Nothing, it just waved.",
            "I would tell you a joke about an elevator, but it's an uplifting experience.",
            "Why don't skeletons fight each other? They don't have the guts.",
            "Why did the math book look sad? Because it had too many problems.",
            "How do you make holy water? You boil the hell out of it.",
        ];
    }

    /**
     * Get the quotes
     *
     * @return string[]
     */
    protected function quotes(): array
    {
        return [
            "Life is 10% what happens to us and 90% how we react to it.",
            "The only way to do great work is to love what you do.",
            "Success is not final, failure is not fatal: It is the courage to continue that counts.",
            "Believe you can and you're halfway there.",
            "In the middle of difficulty lies opportunity.",
            "Your time is limited, don't waste it living someone else's life.",
            "Do not wait to strike till the iron is hot, but make it hot by striking.",
            "It's not whether you get knocked down, it's whether you get up.",
            "The only limit to our realization of tomorrow will be our doubts of today.",
            "If you want to achieve greatness stop asking for permission.",
            "The future belongs to those who believe in the beauty of their dreams.",
            "The best way to predict the future is to create it.",
            "Don't watch the clock; do what it does. Keep going.",
            "Success usually comes to those who are too busy to be looking for it.",
            "The only place where success comes before work is in the dictionary.",
            "The only person you are destined to become is the person you decide to be.",
            "You are never too old to set another goal or to dream a new dream.",
            "Don't be pushed around by the fears in your mind. Be led by the dreams in your heart.",
            "Strive not to be a success, but rather to be of value.",
            "The only way to do great work is to love what you do.",
            "I have not failed. I've just found 10,000 ways that won't work.",
            "You don't have to be great to start, but you have to start to be great.",
            "The only limit to our realization of tomorrow will be our doubts of today.",
            "It's not what you look at that matters, it's what you see.",
            "Don't be afraid to give up the good to go for the great.",
            "You miss 100% of the shots you don't take.",
            "Opportunities don't happen. You create them.",
            "The harder I work, the luckier I get.",
            "I find that the harder I work, the more luck I seem to have.",
            "It always seems impossible until it's done.",
            "The only thing standing between you and your goal is the story you keep telling yourself as to why you can't achieve it.",
            "Success is stumbling from failure to failure with no loss of enthusiasm.",
            "Your work is going to fill a large part of your life, and the only way to be truly satisfied is to do what you believe is great work.",
            "Don't cry because it's over, smile because it happened.",
            "The secret of getting ahead is getting started.",
            "Success is not in what you have, but who you are.",
            "Don't watch the clock; do what it does. Keep going.",
            "The only place where success comes before work is in the dictionary.",
            "Success usually comes to those who are too busy to be looking for it.",
            "The only person you are destined to become is the person you decide to be.",
            "You are never too old to set another goal or to dream a new dream.",
            "Don't be pushed around by the fears in your mind. Be led by the dreams in your heart.",
            "Strive not to be a success, but rather to be of value.",
            "The only way to do great work is to love what you do.",
            "I have not failed. I've just found 10,000 ways that won't work.",
            "You don't have to be great to start, but you have to start to be great.",
            "The only limit to our realization of tomorrow will be our doubts of today.",
            "It's not what you look at that matters, it's what you see.",
            "Don't be afraid to give up the good to go for the great.",
            "You miss 100% of the shots you don't take.",
            "Opportunities don't happen. You create them.",
            "The harder I work, the luckier I get.",
            "I find that the harder I work, the more luck I seem to have.",
            "It always seems impossible until it's done.",
            "The only thing standing between you and your goal is the story you keep telling yourself as to why you can't achieve it.",
            "Success is stumbling from failure to failure with no loss of enthusiasm.",
            "Your work is going to fill a large part of your life, and the only way to be truly satisfied is to do what you believe is great work.",
            "Don't cry because it's over, smile because it happened.",
            "The secret of getting ahead is getting started.",
            "Success is not in what you have, but who you are.",
        ];
    }

    /**
     * Get the labels
     *
     * @return string
     */
    protected function label(): string
    {
        $labels = [
            'resource'     => "Creating resource resource class...",
            'create'       => "Creating resource create page...",
            'edit'         => "Creating resource edit page...",
            'list'         => "Creating resource list page...",
            'schema'       => "Creating resource schema...",
            'translations' => "Translating the resource...",
        ];

        return $labels[$this->step];
    }
}
