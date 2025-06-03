<?php
include 'config/connection.php';

$students = query("SELECT * FROM students ORDER BY id DESC");

$success = null;
$id = isset($_GET['delete']) ? $_GET['delete'] : null;

if(!is_null($id)){
    $data = query("SELECT * FROM students WHERE id=$id")[0];
    if ($data > 0){
        if ( file_exists($data['gambar']) ){
            unlink($data['gambar']);
        }
        if ( cud("DELETE FROM students WHERE id='$id'") > 0){
            $success = true;
            header('Location: index.php');
        } else {
            $success = false;
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar PHP+DB with TailwindCSS+daisyUI</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="w-7xl mx-auto">
        <div class="text-3xl text-center my-5 rounded-lg border py-3">Data Mahasiswa</div>
        <div class="flex justify-end my-5">
            <a href="manage-student.php" class="btn btn-primary">Add Mahasiswa</a>
        </div>
        <div class="overflow-x-auto rounded-box border border-base-content/10 bg-base-100 my-5">
            <table class="table">
            <!-- head -->
            <thead>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>NRP</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $key => $student) : ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td>
                        <div class="avatar">
                            <div class="w-20 mask mask-squircle">
                                <img src="<?= $student['gambar'] ?>" alt="<?= $student['nama'] ?>" class="">
                            </div>
                        </div>
                    </td>
                    <td><?= $student['nrp'] ?></td>
                    <td><?= $student['nama'] ?></td>
                    <td><?= $student['email'] ?></td>
                    <td><?= $student['jurusan'] ?></td>
                    <td>
                        <a href="manage-student.php?edit=<?= $student['id']?>" class="btn btn-soft btn-success">Ubah</a>
                        <a href="?delete=<?= $student['id']?>" onclick="return confirm('Yakin ?');" class="btn btn-soft btn-error">Hapus</a>
                    </td>
                </tr>
                <?php endforeach;  ?>
            </tbody>
        </table>
        </div>
    </div>
</body>
</html>