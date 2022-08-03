<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Tasks\CreateDataUserTask;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Services\Parametric\AvatarService;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Http\Controllers\Admin\Traits\UserCrud\UserCrudDataFieldsTabTrait;
use App\Http\Controllers\Admin\Traits\UserCrud\UserCrudListOperationTrait;
use App\Http\Controllers\Admin\Traits\UserCrud\UserCrudUserFieldsTabTrait;

class UserCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation {
        store as traitStore;
    }
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation{
        update as traitUpdate;
    }
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    use UserCrudListOperationTrait;
    use UserCrudDataFieldsTabTrait;
    use UserCrudUserFieldsTabTrait;

    public function setup()
    {
        CRUD::setModel(\App\Models\User::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/user');
        CRUD::setEntityNameStrings('user', 'users');
        $this->avatarService = new AvatarService();
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(UserRequest::class);
        $this->crud->setRequest($this->handlePasswordInput(request()));
        $this->setUserFieldsTab();
    }

    protected function setupUpdateOperation()
    {
        CRUD::setValidation(UserRequest::class);
        $this->crud->unsetValidation('password');
        $this->crud->setRequest($this->handlePasswordInput(request()));
        $this->setUserFieldsTab();
        $this->setDataFieldsTab();
    }

    protected function store()
    {
        $responde = $this->traitStore();
        (new CreateDataUserTask($this->crud->entry))->run();
        return $responde;
    }

    protected function update()
    {
        try {
            DB::beginTransaction();
            $currentEntry = $this->crud->getCurrentEntry();
            $dataUser = json_decode($this->crud->getRequest()->get('user_data'));
            $currentEntry->dataUser()->update((array)$dataUser[0]);
            DB::commit();
            return $this->traitUpdate();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => "Ha ocurrido un error inesperado"]);
        }
    }

    protected function handlePasswordInput($request)
    {
        if ($request->input('password')) {
            $request->request->set('password', Hash::make($request->input('password')));
        } else {
            $request->request->remove('password');
        }

        return $request;
    }
}
