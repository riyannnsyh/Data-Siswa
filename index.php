<?php
session_start();

if (!isset($_SESSION['dataSiswa'])) {
    $_SESSION['dataSiswa'] = [];
}

if (isset($_POST['kirim'])) {
    if (!empty($_POST['nama']) && !empty($_POST['nis']) && !empty($_POST['rayon'])) {
        $data = [
            'nama' => $_POST['nama'],
            'nis' => $_POST['nis'],
            'rayon' => $_POST['rayon']
        ];
        array_push($_SESSION['dataSiswa'], $data);
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
}

if (isset($_GET['hapus'])) {
    $key = $_GET['hapus'];
    unset($_SESSION['dataSiswa'][$key]);
    $_SESSION['dataSiswa'] = array_values($_SESSION['dataSiswa']);
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
    <title>Data Siswa</title>
    <style>
        .content-input, label{
            margin: 10px 0;
        }
    </style>
</head>
<body>
<div class="container d-flex flex-column gap-3 pt-3 px-5">
    <div class="add container py-3">
            <h2 class="text-center">Masukkan Data Siswa</h2>
            <form action="" method="post">
                <div class="input">
                    <div class="content-input">
                        <label for="nama">Nama :</label>
                        <input class="form-control" type="text" name="nama" id="nama" aria-label="default input example" placeholder="Masukkan Nama" required>
                    </div>
                    <div class="content-input">
                        <label for="nis">NIS :</label>
                        <input class="form-control" type="number" name="nis" id="nis" placeholder="Masukkan NIS" required>
                    </div>
                    <div class="content-input">
                        <label for="rayon">Rayon :</label>
                        <input class="form-control" type="text" name="rayon" id="rayon" placeholder="Masukkan Rayon" required>
                    </div>
                </div>
                <div class="d-flex gap-1 text-xl-center">
                    <button type="submit" name="kirim" class="btn btn-primary"><i class="fa-solid fa-user-plus"></i> Tambah</button>
                    <?php if (!empty($_SESSION['dataSiswa'])): ?>
                        <a href="print.php" style="color: white; text-decoration: none;" class="btn btn-success"><i class="fa-solid fa-print"></i> Print</a>
                        <a href="reset.php" style="color: white; text-decoration: none;" class="btn btn-secondary"><i class="fa-solid fa-rotate-right"></i>  Reset</a>
                    <?php endif; ?>
                </div>
            </form>       
    </div>
    <hr>
    <?php 
    if (!empty($_SESSION['dataSiswa'])) {
        echo "<div class='dataSiswa table-responsive'>";
        echo '<table class="table table-striped table-sm rounded text-center table-bordered">';
        echo "<thead class='table-warning'><tr><th>No</th><th>Nama</th><th>NIS</th><th>Rayon</th><th>Action</th></tr></thead><tbody>";
        foreach ($_SESSION['dataSiswa'] as $key => $value) {
            echo "<tr>";
            echo "<td>" . ($key + 1) . "</td>";
            echo "<td>" . $value['nama'] . "</td>";
            echo "<td>" . $value['nis'] . "</td>";
            echo "<td>" . $value['rayon'] . "</td>";
            echo '<td><a href="edit.php?edit=' . $key . '" class="btn btn-warning" style="margin-right: 5px;"><i class="fa-solid fa-pen-to-square"></i></a><a href="?hapus=' . $key . '" class="btn btn-danger"><i class="fa-solid fa-user-minus"></i></a></td>';
            echo "</tr>";
        }
        echo "</tbody></table>";
        echo "</div>";
    } else {
        echo '<table class="table table-striped table-sm rounded text-center table-bordered">';
        echo "<thead class='table-warning'><tr><th>No</th><th>Nama</th><th>NIS</th><th>Rayon</th><th>Action</th></tr></thead>";
        echo "<tbody><tr><td colspan='5 ' class='text-center text-danger py-4'>Tidak Ada Data</td></tr></tbody>";
        echo "</table>";
    }
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>