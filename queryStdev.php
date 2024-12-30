<?php
$query = "SELECT STDDEV_POP(ukt) AS std_dev FROM data_mahasiswa";
$result = $db->runQuery($query);
$std_dev = 0;

if (!empty($result)) {
    $std_dev = $result[0]['std_dev'];
}
?>
<table width="100%">
    <tr>
        <th>Standar Deviasi UKT</th>
    </tr>
    <tr>
        <td><?php echo htmlspecialchars(number_format($std_dev, 2, ',', '.')); ?></td>
    </tr>
</table>    