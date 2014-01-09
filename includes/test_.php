<?php
$have  = array();
$have2 = array();
$hand = array(
    array(
        'face'  => '5',
        'suit'  => 's',
        'value' => '5'
    ),
    array(
        'face'  => '5',
        'suit'  => 'h',
        'value' => '5'
    ),
    array(
        'face'  => '4',
        'suit'  => 'h',
        'value' => '4'
    ),
    array(
        'face'  => '7',
        'suit'  => 'h',
        'value' => '7'
    ),
    array(
        'face'  => '8',
        'suit'  => 'h',
        'value' => '8'
    )
);
return_pretty($hand);
foreach($hand as $cards) {
    $have[$cards['face']]++;

}

foreach($hand as $cards) {
    $have2[$cards['suit']]++;

}


return_pretty($have);

if (has_flush($have2)) {
    echo "You have a flush";
} else if (has_consec($hand)) {
    echo "You have a straight";
} else if ($fourof_kind = has_four_of_kind($have)) {
    echo "You have four " . $fourof_kind ."'s";
} else if($threeof_kind = has_three_of_kind($have)) {
    echo "You have three " . $threeof_kind ."'s";
} else if($pair = has_pair($have)) {
    echo "You have a pair of ". $pair ."'s";
} else {
    echo "You ain't got shit";
}

function return_pretty($a) {
    echo '<pre>';
        print_r($a);
    echo '</pre>';
}

function has_pair($have) {
    return array_search(2, $have);
}

function has_three_of_kind($have) {
    return array_search(3, $have);
}

function has_four_of_kind($have) {
    return array_search(4, $have);
}

function has_consec($d) {
    $d = strip_to_face_value($d);
    //temp
    return_pretty($d);
    for($i=0; $i<count($d); $i++) {
        if(isset($d[$i+1]) && $d[$i]+1 != $d[$i+1]) {
            return false;
        }
    }
    return true;
}

function strip_to_face_value($array) {
    $results = array();
    foreach($array as $faces) {
        array_push($results, $faces['value']);
    }
    sort($results);
    return $results;
}

function has_flush($have2) {
    return array_search(5, $have2);
}
