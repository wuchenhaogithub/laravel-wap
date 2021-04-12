<?php
namespace Wuchenhao\LaravelShop\Wap\Goods\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class indexController extends Controller
{

    public function index(){
        return view('wap.goods::index.index');
    }

}
