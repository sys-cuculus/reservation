<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('app:make-view-command')]
#[Description('Command description')]
class MakeViewCommand extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $view = $this->argument('view');
        $path = $this->viewPath($view);
        $this->createDir($path);
        if (File::exists($path)) {
            $this->error("File {$path} already exists!");
            return;
        }
        File::put($path, $path);
        $this->info("File {$path} created.");
    }

    /**
    * Get the view full path.
    *
    * @param string $view
    * 
    * @return string
    */
    public function viewPath($view) 
    {
        $view = str_replace('.', '/', $view) . '.blade.php';
        $path = "resources/views/{$view}";
        return $path;
    }
    
    /**
    * Create a view directory if it does not exist.
    *
    * @param $path
    */
    public function createDir($path)
    {
        $dir = dirname($path);
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }
    }
}
