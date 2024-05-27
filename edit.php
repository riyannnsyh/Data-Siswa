<?php 
session_start();

// Jika data siswa yang ingin diedit tidak diberikan, kembalikan ke halaman utama
if (!isset($_GET['edit']) || empty($_SESSION['dataSiswa'][$_GET['edit']])) {
    header("Location: index.php");
    exit;
}

$index = $_GET['edit'];
$dataSiswa = $_SESSION['dataSiswa'][$index];

// Jika form dikirimkan untuk menyimpan perubahan
if (isset($_POST['update'])) {
    // Lakukan validasi data
    if (@$_POST['nama'] && @$_POST['nis'] && @$_POST['rayon']) {
        // Update data siswa dengan data yang baru
        $_SESSION['dataSiswa'][$index] = [
            'nama' => $_POST['nama'],
            'nis' => $_POST['nis'],
            'rayon' => $_POST['rayon'],
        ];

        // Redirect kembali ke halaman utama setelah mengedit data
        header("Location: index.php");
        exit;
    }  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Edit Data Siswa</title>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Edit Data Siswa</h2>
        <form method="post">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" id="nama" name="nama" class="form-control" value="<?php echo $dataSiswa['nama']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="nis" class="form-label">NIS:</label>
                <input type="number" id="nis" name="nis" class="form-control" value="<?php echo $dataSiswa['nis']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="rayon" class="form-label">Rayon:</label>
                <input type="text" id="rayon" name="rayon" class="form-control" value="<?php echo $dataSiswa['rayon']; ?>" required>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update</button>
            <a href="index.php" class="btn btn-secondary ms-2">Back</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>