<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected function sale($promotional_price, $price) {
    settype($promotional_price, 'int');
    settype($price, 'int');
    if ($promotional_price == 0 || $promotional_price == $price) {return 0;
    }

    $sale = round((1-($promotional_price/$price))*100, 1);
    if ($sale == 100) {
      return 99.9;
    }
    return $sale;
  }
}
