<?php
namespace App\Helper;

/**
 * Class TimePeriod
 * @package App\Helper
 */
class TimePeriod
{
    /**
     * @param null $to
     * @param null $from
     * @return array[]
     * @throws \Exception
     */
    public static function getRangeByMonthYear($to = null, $from= null) : array {
            $now = new \DateTime('now');
            $toMonth = $now->format('m');
            $fromMonth = $now->format('m');
            $toYear = $now->format('Y');
            $fromYear = $now->format('Y');

            if($to){
                $toDate = new \DateTime($to);
                $toMonth = $toDate->format('m');
                $toYear = $toDate->format('Y');
            }
            if($from){
                $fromDate = new \DateTime($from);
                $fromMonth = $fromDate->format('m');
                $fromYear = $fromDate->format('Y');
            }
            return [
                'month' => ['from' => $fromMonth, 'to' => $toMonth],
                'year' => ['from' =>$fromYear, 'to' => $toYear],
            ];
        }
}