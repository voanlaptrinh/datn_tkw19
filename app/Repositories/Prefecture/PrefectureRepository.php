<?php

namespace App\Repositories\Prefecture;

use App\Http\Controllers\BaseController;
use App\Models\Prefecture;
use App\Repositories\Prefecture\PrefectureInterface;
use Illuminate\Support\Facades\Auth;

class PrefectureRepository extends BaseController implements PrefectureInterface
{
    private Prefecture $prefecture;

    public function __construct(Prefecture $prefecture)
    {
        $this->prefecture = $prefecture;
    }

    public function get()
    {
        return $this->prefecture->latest()->select('id', 'name as label', 'area_id')
            ->orderBy('order_num')
            ->get();
    }
}
