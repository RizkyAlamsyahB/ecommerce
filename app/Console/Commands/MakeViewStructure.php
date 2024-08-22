<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeViewStructure extends Command
{
    protected $signature = 'make:view-structure {name}';

    protected $description = 'Create a view folder structure with index, create, show, and edit views';

    public function handle()
    {
        $name = $this->argument('name');
        $path = resource_path('views/admin/' . $name);

        File::makeDirectory($path, 0755, true, true);
        File::put($path . '/index.blade.php', '');
        File::put($path . '/create.blade.php', '');
        File::put($path . '/show.blade.php', '');
        File::put($path . '/edit.blade.php', '');

        $this->info("View structure for {$name} created successfully.");
    }
}
