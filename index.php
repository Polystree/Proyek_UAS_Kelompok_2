<?php
include 'function.php';
   
if (isset($_POST['submit'])) {
    $db->runSQL("INSERT INTO data_mahasiswa (nama, nim, alamat, prodi, ukt) VALUES ('{$_POST['nama']}', '{$_POST['nim']}', '{$_POST['alamat']}', '{$_POST['prodi']}', '{$_POST['ukt']}')");

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="icon" href="Logo.png" type="image/gif" sizes="16x16">
    <title>Kelompok 2</title>
</head>
<body>

<div class="container">
    <div style="display: flex;align-items: center;justify-content: space-between;">
        <div class="title">
            <img src="Logo.png" alt="">
            <h1 style="margin: 0;">Data UKT Mahasiswa</h1>
        </div>
        <div class="theme-switcher">
            <button class="theme-btn gold" data-theme="gold"></button>
            <button class="theme-btn blue" data-theme="blue"></button>
            <button class="theme-btn green" data-theme="green"></button>
            <button class="theme-btn gray active" data-theme="gray"></button>
        </div>
    </div>
    <div class="container-2">
        <div class="sidebar">
            <div class="sidebar-header">
                <span class="sidebar-header-text">Input Data</span>
            </div>
            <form action="" method="post">
                <div class="input-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" name="nama" required>
                </div>
                <div class="input-group">
                    <label for="nim">NIM</label>
                    <input type="text" name="nim" required>
                </div>
                <div class="input-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" required>
                </div>
                <div class="input-group">
                    <label for="prodi">Program Studi</label>
                    <input type="text" name="prodi" required>
                </div>
                <div class="input-group">
                    <label for="ukt">UKT</label>
                    <input type="text" name="ukt" required>
                </div>
                <button type="submit" name="submit">Submit</button>
            </form>
        </div>
    
        <div class="content">
            <div style="display: flex;align-items: center;justify-content: space-between;">
                <div class="topbar">
                    <div class="topbar-header">
                        <span class="topbar-header-text">Query Data</span>
                    </div>
                    <div class="control-tab">
                        <button class="tab" onclick="openTab(event, 'semua-data')">Semua Data</button>
                        <button class="tab" onclick="openTab(event, 'statistik-5-serangkai')">Statistik 5 Serangkai</button>
                        <button class="tab" onclick="openTab(event, 'pencilan-atas')">Pencilan Atas</button>
                        <button class="tab" onclick="openTab(event, 'pencilan-bawah')">Pencilan Bawah</button>
                        <button class="tab" onclick="openTab(event, 'standar-deviasi')">Standar Deviasi</button>
                    </div>
                </div>
            </div>
            <div id="semua-data" class="tab-content">
                <?php include 'queryAllData.php'; ?>
            </div>

            <div id="statistik-5-serangkai" class="tab-content">
                <?php include 'query5Serangkai.php'; ?>
            </div>

            <div id="pencilan-atas" class="tab-content">
                <?php include 'queryPencilanAtas.php'; ?>
            </div>

            <div id="pencilan-bawah" class="tab-content">
                <?php include 'queryPencilanBawah.php'; ?>
            </div>

            <div id="standar-deviasi" class="tab-content">
                <?php include 'queryStdev.php'; ?>
            </div>
        </div>
    </div>
</div>
</body>
<script>
    function confirmDelete(nim) {
        if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
            window.location.href = 'delete.php?nim=' + nim;
        }
    }

    document.querySelectorAll('.theme-btn').forEach(button => {
        button.addEventListener('click', () => {
            document.querySelectorAll('.theme-btn').forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');
            document.documentElement.setAttribute('data-theme', button.dataset.theme);
        });
    });

    function openTab(evt, tabName) {
            var i, tabcontent, tabbuttons;   
        
            tabcontent = document.getElementsByClassName("tab-content");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            
            tabbuttons = document.getElementsByClassName("tab");
            for (i = 0; i < tabbuttons.length; i++) {
                tabbuttons[i].className = tabbuttons[i].className.replace(" active", "");
            }
            
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('.tab').click();
        });
</script>
</html>