<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
    <title>Cetak Data Siswa</title>
</head>
<body>
<div class="container pt-3">
    <h2 class="text-center mb-3">Data Siswa</h2>
    <?php
    if(!empty($_SESSION['dataSiswa'])) {
        echo "<div class='dataSiswa table-responsive px'>";
        echo '<table class="table table-striped table-sm rounded text-center table-bordered">';
        echo "<thead class='table-warning'><tr><th>No</th><th>Nama</th><th>NIS</th><th>Rayon</th></tr></thead><tbody>";
        foreach($_SESSION['dataSiswa'] as $key => $value) {
            echo "<tr>";
            echo "<td>" . ($key+1) . "</td>";
            echo "<td>". $value['nama']."</td>";
            echo "<td>". $value['nis']."</td>";
            echo "<td>" . $value['rayon']."</td>";
            echo "</tr>";
        }
        echo "</tbody></table></div>";
    } else {
        echo '<table class="table table-striped table-sm rounded text-center table-bordered">';
        echo "<thead class='table-warning'><tr><th>No</th><th>Nama</th><th>NIS</th><th>Rayon</th></tr></thead>";
        echo "<tbody><tr><td colspan='4' class='text-center text-danger py-4'>Tidak Ada Data</td></tr></tbody>";
        echo "</table>";
    }
    ?>
    <div class="mt">
        <a href="index.php" class="btn btn-primary">Kembali</a>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
        window.onload = function () {
            window.print();
        }
    </script>
</body>
</html>