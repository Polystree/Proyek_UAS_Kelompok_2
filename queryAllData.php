

<table width="100%">
    <tr>
        <th width="20%">Nama Lengkap</th>
        <th width="15%">NIM</th>
        <th width="25%">Alamat</th>
        <th width="20%">Program Studi</th>
        <th width="15%">UKT</th>
        <th width="5%">Aksi</th>
    </tr>

    <?php
    
    $result = $db->runQuery("SELECT * FROM data_mahasiswa");
    if (!empty($result)) { 
        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
            echo "<td>" . htmlspecialchars($row['nim']) . "</td>";
            echo "<td>" . htmlspecialchars($row['alamat']) . "</td>";
            echo "<td>" . htmlspecialchars($row['prodi']) . "</td>";
            echo "<td>" . htmlspecialchars(number_format($row['ukt'], 0, ',', '.')) . "</td>";
            echo "<td><button onclick='confirmDelete(\"" . htmlspecialchars($row['nim']) . "\")'><img src='delete.svg'></button></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>Tidak ada data.</td></tr>";
    }
    ?>
</table>