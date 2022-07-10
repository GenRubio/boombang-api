<?php

namespace App\Console\Commands;

class MakeViewHandlerController extends MakeFileStructure
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'view:handler {path}';

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
        $this->setNameSpace('resources/js/controllers');
        $this->setSuffix('Controller');
        $this->setStubPath('stubs/view-handler-controller.stub');
        $this->setExtension('.js');
        $this->setFolderPermissions(0755);
    }

    /**
     * Method that change the keywords in the stub files, for the ones given
     *
     * For $this->setMultiFiles() use
     * replaceWords_0
     * replaceWords_1
     * replaceWords_2
     * 
     * @param string $file
     * @return string
     */
    public function replaceWords_0(string $file): string
    {
        $search = [
            'ClassNameStub'
        ];
        $replace = [
            $this->getClassName()
        ];
        return str_replace($search, $replace, $file);
    }
}
