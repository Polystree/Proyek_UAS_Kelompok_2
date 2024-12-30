<?php
    require_once "function.php";
    
    $result = $db->runQuery("SELECT ukt FROM data_mahasiswa ORDER BY ukt ASC");
    $ukt = [];
    if (!empty($result)) {
        foreach ($result as $row) {
            $ukt[] = $row['ukt'];
        }
    }
    if (!empty($ukt)) {
    $minimum = min($ukt);
    $maksimum = max($ukt);
    $quartiles = calculate_quartiles($ukt);
    
    $keterangan = ["Minimum", "Q1", "Q2", "Q3", "Maksimum"];
    $serangkai = [$minimum, $quartiles['Q1'], $quartiles['Q2'], $quartiles['Q3'], $maksimum];  
    }
    
?>

<table width="100%">
    <tr>
        <th width="50%">Statistik 5 Serangkai</th>
        <th width="50%">Nilai</th>
    </tr>
    <?php for ($i = 0; $i < 5; $i++) { ?>
        <tr>
            <td><?php echo $keterangan[$i]; ?></td>
            <td><?php echo htmlspecialchars(number_format($serangkai[$i], 2)); ?></td>
        </tr>
    <?php } ?>
    
</table>