<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class MakeEntity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:entity {entityName}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ability to create all the complete files of an entity';

    /**
     * Model base Namespace
     *
     * @var string
     */
    private $modelNamespaceBase = 'App\Models\\';

    /**
     * Name of the model
     *
     * @var
     */
    private $singularModelName;

    /**
     * Name of the table
     *
     * @var
     */
    private $pluralVariableName;

    /**
     * Response Text
     *
     * @var
     */
    private $response = '';

    private $makeRepository = false;

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->singularModelName = Str::studly($this->argument('entityName'));
        $this->pluralVariableName = Str::of($this->argument('entityName'))->plural()->snake();
        $this->questionnaire();
    }

    private function questionnaire()
    {
        $this->info('Use Y / N to answer. Default value N');

        if ($this->confirm('Do you want to create the Backpack CRUD?', true)) {
            Artisan::call('backpack:crud ' . $this->singularModelName);
        }

        if ($this->confirm('Do you want to create the Resource?', true)) {
            $this->makeResource();
        }

        if ($this->confirm('Do you want to create the Resource Collection?', true)) {
            $this->makeResource(true);
        }

        if ($this->confirm('Do you want to create the Hexagonal Structure?', true)) {
            $this->makeRepository();
            $this->makeService();
        }

        $this->info($this->response);
    }

    private function makeResource($collection = false)
    {
        Artisan::call('make:resource ' . $this->singularModelName);
        $this->response .= $this->singularModelName . ' Resource' . ($collection ? ' Collection' : '') . ' created successfully!' . PHP_EOL;
    }

    private function makeRepository()
    {
        Artisan::call('make:repository ' . $this->singularModelName);
        $this->response .= $this->singularModelName . ' Repository and RepositoryInterface created successfully!' . PHP_EOL;
    }

    private function makeService()
    {
        Artisan::call('make:service ' . $this->singularModelName);
        $this->response .= $this->singularModelName . ' Service created successfully!' . PHP_EOL;
    }
}
