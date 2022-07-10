<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeTask extends MakeFileStructure
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:task {path}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->setNameSpace('App/Tasks');
        $this->setSuffix('Task');
        $this->setStubPath('stubs/task.stub');
        $this->setExtension('.php');
        $this->setFolderPermissions(0755);
    }

    public function replaceWords_0(string $file): string
    {
        $search = [
            'NameSpacePathStub',
            'ClassNameStub'
        ];
        $replace = [
            $this->getNamespace(),
            $this->getClassName()
        ];
        return str_replace($search, $replace, $file);
    }
}
