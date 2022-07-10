<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class MakeService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {modelName}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Service class';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Model base Namespace
     *
     * @var string
     */
    private $modelNamespaceBase = 'App\Models\\';

    /**
     * Folder where the Service will be stored
     *
     * @var string
     */
    private $folder;

    /**
     * Folder UNIX permission
     *
     * @var int
     */
    private $folderPermissions = 0755;

    /**
     * Name of the variable
     *
     * @var
     */
    private $singularVariableName;

    /**
     * Name of the model
     *
     * @var
     */
    private $singularModelName;

    /**
     * Name that will have the service
     *
     * @var
     */
    private $serviceName;

    /**
     * Method called when the command is executed
     */
    public function handle()
    {
        $this->singularVariableName = Str::lower($this->argument('modelName'));
        $this->singularModelName = Str::studly($this->argument('modelName'));
        $this->serviceName = Str::studly($this->argument('modelName') . 'Service');

        $this->checkIfModelExists($this->singularModelName);

        $this->checkIfServiceFolderExists();

        $this->makeService();
    }

    /**
     * Method that make the Service file
     */
    private function makeService()
    {
        $service = $this->replaceWords(file_get_contents(app_path('Helpers/Templates/Service/service.stub')));
        $this->saveService($service);
    }

    /**
     * Method that stores the Service file
     *
     * @param string $file
     */
    private function saveService(string $file)
    {
        if (!is_file($this->folder . '/' . $this->serviceName . '.php')) {
            file_put_contents($this->folder . '/' . $this->serviceName . '.php', $file);
            $this->info($this->serviceName . ' created successfully!');
        } else {
            $this->info('Service already exists');
        }
    }
    
    /**
     * Method that checks if the Model exists in the project, if it does not exists, throws an error
     *
     * @param string $model
     */
    private function checkIfModelExists(string $model)
    {
        if (!class_exists($this->modelNamespaceBase . $model)) {
            $this->error('The model ' . $model . ' was not found in this project.');
            die(1);
        }
    }

    /**
     * Method that checks if the Service folder exists, and creates it if it does not
     */
    private function checkIfServiceFolderExists()
    {
        $this->folder = app_path('Services');
        if (!file_exists($this->folder)) {
            mkdir($this->folder, $this->folderPermissions, true);
            $this->info($this->singularModelName . ' folder created successfully into Services folder!');
        }
    }

    /**
     * Method that change the keywords in the stub files, for the ones given
     *
     * @param string $file
     * @return string
     */
    private function replaceWords(string $file): string
    {
        $search = [
            'SingularModelName',
            'SingularVariableName'
        ];
        $replace = [
            $this->singularModelName,
            $this->singularVariableName
        ];
        $result = str_replace($search, $replace, $file);
        return $result;
    }
}
