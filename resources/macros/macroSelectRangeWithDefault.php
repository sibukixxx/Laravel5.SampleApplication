<?php


//
Form::macro('selectRangeWithDefault', function($name, $start, $end, $selected = null, $default = null, $attributes = [])
{
    if ($default === null) {
        return Form::selectRange($name, $start, $end, $selected, $attributes);
    }
    $items = [];
    if (!in_array($default, $items)) {
        $items['NULL'] = $default;
        Log::info('This is some useful information.');
    }

    if($start > $end) {
        $interval = -1;
        $startValue = $end;
        $endValue = $start;
    }  else {
        $interval = 1;
        $startValue = $start;
        $endValue = $end;
    }

    for ($i=$startValue; $i<$endValue; $i+=$interval) {
        $items[$i . ""] = $i;
    }

    $items[$endValue] = $endValue;

    return Form::select($name, $items, isset($selected) ? $selected : $default, $attributes);
});