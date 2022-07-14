<?php

namespace App\Tasks;

use App\Services\DataUserService;

class CreateDataUserTask
{
    private $user;
    private $dataUserService;

    public function __construct($user)
    {
        $this->user = $user;
        $this->dataUserService = new DataUserService();
    }

    public function run()
    {
        $this->dataUserService->create($this->prepareData());
    }

    private function prepareData()
    {
        return [
            'user_id' => $this->user->id,
            'avatar_id' => 37,
            'avatar_colors_hex' => 'FFD797FFCC00FFFFFF6633000066CCFFFFFF000000',
            'description' => 'BoomBang',
        ];
    }
}
