<?php
require_once "dbcontroller.php";
$db = new DBController();

function calculate_quartiles($data) {
    $count = count($data);
    
    if ($count % 2 == 0) {
        $q2 = ($data[$count/2 - 1] + $data[$count/2]) / 2;
    } else {
        $q2 = $data[($count/2)];
    }
    
    $lowerHalf = array_slice($data, 0, floor($count/2));
    $lowerCount = count($lowerHalf);
    if ($lowerCount % 2 == 0) {
        $q1 = ($lowerHalf[$lowerCount/2 - 1] + $lowerHalf[$lowerCount/2]) / 2;
    } else {
        $q1 = $lowerHalf[($lowerCount/2)];
    }
    
    $upperHalf = array_slice($data, ceil($count/2));
    $upperCount = count($upperHalf);
    if ($upperCount % 2 == 0) {
        $q3 = ($upperHalf[$upperCount/2 - 1] + $upperHalf[$upperCount/2]) / 2;
    } else {
        $q3 = $upperHalf[($upperCount/2)];
    }
    return ['Q1' => $q1, 'Q2' => $q2, 'Q3' => $q3];
}

function pencilan($data) {
    $q = calculate_quartiles($data);
    $iqr = $q['Q3'] - $q['Q1'];
    
    return [
        'batasBawah' => $q['Q1'] - (1.5 * $iqr),
        'batasAtas' => $q['Q3'] + (1.5 * $iqr)
    ];
}

$result = $db->runQuery("SELECT ukt FROM data_mahasiswa ORDER BY ukt ASC");
if (!empty($result)) {
    $uktValues = array_map(fn($row) => $row['ukt'], $result);
}   else {
    $uktValues = [];
}

if (!empty($uktValues)) {
    $batas = pencilan($uktValues);
    $batasBawah = $batas['batasBawah'];
    $batasAtas = $batas['batasAtas']; 
}

?>

