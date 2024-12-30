<table width="100%">
    <tr>
        <th width="100%" colspan="5">Mahasiswa dengan UKT di Bawah <?php echo htmlspecialchars(number_format(max(0, $batasBawah), 0, ',', '.')); ?></th>
    </tr>
    <tr>
        <th width="20%">Nama Lengkap</th>
        <th width="15%">NIM</th>
        <th width="25%">Alamat</th>
        <th width="20%">Program Studi</th>
        <th width="20%">UKT</th>
    </tr>

    <?php
    $sql = "SELECT * FROM data_mahasiswa WHERE ukt < $batasBawah ORDER BY ukt ASC ";
    $result = $db->runQuery($sql);

    if (!empty($result)) {
        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
            echo "<td>" . htmlspecialchars($row['nim']) . "</td>";
            echo "<td>" . htmlspecialchars($row['alamat']) . "</td>";
            echo "<td>" . htmlspecialchars($row['prodi']) . "</td>";
            echo "<td>" . htmlspecialchars(number_format($row['ukt'], 0, ',', '.')) . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Tidak ada data.</td></tr>";
    }
    ?>
</table>
