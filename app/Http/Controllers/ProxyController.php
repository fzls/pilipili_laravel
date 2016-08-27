<?php

namespace Pilipili\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use Pilipili\Http\Requests;

/**
 * Class ProxyController
 * @package Pilipili\Http\Controllers
 */
class ProxyController extends Controller {
    /**
     * Provide CORS proxy service for solving single origin problem.
     *
     * @return mixed
     */
    public function corsProxy() {
        header('Access-Control-Allow-Origin: *');
        /* add Access-Control-auth*/
        $url    = Input::get('url');
        $query  = Input::get('query');
        $method = Str::lower(Input::get('method') ? Input::get('method') : 'get');
        $http   = new Client();

        return $http->$method($url, [
            'query' => [
                'lng' => 120.107,
                'lat' => 30.295301,
                'len' => 800,
                '_'   => 1472267874845,
            ],
        ])->getBody();
    }
}
