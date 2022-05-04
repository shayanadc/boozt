<?php


namespace App\Controllers;

use App\Helper\TimePeriod;
use App\Request;
use App\Response;
use App\Services\SummaryService;

class SummaryController extends Controller
{

    public function index(Request $request) {
        $filters = $request->getQuery();
        $fields = [];

        $to = isset($filters['to'])? $filters['to']: null;
        $from = isset($filters['from'])? $filters['from']: null;

        $timePeriod = TimePeriod::get($to,$from);
        $emptyQuery = !isset($filters['customers']) && !isset($filters['orders']) && !isset($filters['revenue']);

        if(isset($filters['orders']) || $emptyQuery){
            $fields['orders'] = true;
        }
        if(isset($filters['revenue']) || $emptyQuery){
            $fields['revenue'] = true;
        }
        if(isset($filters['customers']) || $emptyQuery){
            $fields['customers'] = true;
        }
        $service = SummaryService::getMany($fields, $timePeriod);
        return Response::json($service);

    }
}