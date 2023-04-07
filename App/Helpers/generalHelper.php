<?php

namespace App\Helpers;

class generalHelper {

    public static function time_format($datetime, $full = false)
    {
        $now = new \DateTime;
        $ago = new \DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );

        foreach ($string as $constant => &$value) {
            if ($diff->$constant) {
                if($diff->$constant > 1)
                {
                    $value = $value . "s";
                }
                $value = $diff->$constant . ' ' . $v . ($diff->$constant > 1 ? $value : '');
            } else {
                unset($string[$constant]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'Just now';
    }

}