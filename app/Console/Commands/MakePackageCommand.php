<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MakePackageCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:package {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function handle()
    {
        $name = Str::studly($this->argument('name'));
        $basePath = base_path("packages/{$name}");
        $srcPath = "{$basePath}/src";

        if (File::exists($basePath)) {
            $this->error("Package exist");
            return;
        }

        File::makeDirectory($srcPath, 0755, true);
        File::makeDirectory("{$srcPath}/Manager");

        File::put("{$basePath}/composer.json", $this->getComposerJson($name));

        File::put("{$srcPath}/{$name}.php", $this->getFacadeContent($name));

        File::put("{$srcPath}/{$name}ServiceProvider.php", $this->getServiceProviderContent($name));

    }

    protected function getComposerJson(string $name): string
    {
        return json_encode([
            "name" => Str::slug($name) . "/package",
            "autoload" => [
                "psr-4" => [
                    "Xefi\\{$name}\\" => "src/"
                ]
            ],
            "extra" => [
                "laravel" => [
                    "providers" => [
                        "Xefi\\{$name}\\{$name}ServiceProvider"
                    ]
                ]
            ]
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

    protected function getFacadeContent(string $name): string
    {
        return <<<PHP
<?php

namespace Xefi\\{$name};

use Illuminate\Support\Facades\Facade;

/**
 * @see \\Xefi\\{$name}\\Services\\{$name}Manager
 */
class {$name} extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return strtolower('{$name}');
    }
}
PHP;
    }

    protected function getServiceProviderContent(string $name): string
    {
        return <<<PHP
<?php

namespace Xefi\\{$name};

use Illuminate\Support\ServiceProvider;
use Xefi\\{$name}\\Services\\{$name}Manager;

class {$name}ServiceProvider extends ServiceProvider
{
    public function register()
    {
        \$this->app->singleton('{$name}', function () {
            return new {$name}Manager();
        });
    }

    public function boot()
    {
        //
    }
}
PHP;
    }
}
