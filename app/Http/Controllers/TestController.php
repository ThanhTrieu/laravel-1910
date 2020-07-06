<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index($t1, $t2)
    {
        return "Doi {$t1} gap doi {$t2} tren san My Dinh";
    }

    public function tennis(Request $request)
    {
        // $request = new Request;
        $p1 = $request->player1;
        $p2 = $request->player2;
        $time = $request->query('time'); //$request->time;
        $place = $request->query('place'); //$request->place;
        //$p = $_GET['place'] ?? '';
        $queryString = $request->getQueryString();
        $fullQueryString = $request->fullUrl();
        dd($queryString, $fullQueryString); //?time=10-10-2020&place=Spain

        return "Van dong vien {$p1} dang thi dau vs VDV {$p2} vao luc {$time} o san thi dau {$place}";
    }

    public function covidCorona()
    {
        // load view
        $corona = [
            [
                'id' => 1,
                'country_code' => 'vn',
                'country' => 'Viet Nam',
                'nhiem_benh' => 10,
                'tu_vong' => 0,
                'khoi_benh' => 300
            ],
            [
                'id' => 2,
                'country_code' => 'cn',
                'country' => 'Trung Quoc',
                'nhiem_benh' => 300000,
                'tu_vong' => 20000,
                'khoi_benh' => 150000
            ],
            [
                'id' => 3,
                'country_code' => 'us',
                'country' => 'Hoa Ky',
                'nhiem_benh' => 350000,
                'tu_vong' => 30000,
                'khoi_benh' => 150000
            ]
        ];
        return view('test.covid.index', compact('corona'));
        // return view('test/covid/index');
    }
}
