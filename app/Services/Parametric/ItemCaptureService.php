<?php

namespace App\Services\Parametric;

use App\Http\Controllers\Controller;
use App\Models\Parametric\ItemCapture;
use App\Repositories\Parametric\ItemCapture\ItemCaptureRepository;

/**
 * Class ItemCaptureService
 * @package App\Services\ItemCapture
 */
class ItemCaptureService extends Controller
{
    /**
     * ItemCaptureService constructor.
     * @param ItemCapture $ItemCapture
     */
    public function __construct()
    {
        $this->itemCaptureRepository = new ItemCaptureRepository();
    }

    public function getAll()
    {
        return $this->itemCaptureRepository->getAll();
    }
}
