<?php

namespace App\Http\Controllers\Admin\Partner;

use App\Models\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChangeOrderController extends Controller
{
    
    public function update(Partner $partner, $arrow)
    {
        if ($arrow === 'up') {
            $partner->moveOrderUp();
        } else {
            $partner->moveOrderDown();
        }

        return redirect()->back();
    }
}
