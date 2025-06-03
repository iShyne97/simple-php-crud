<?php

include 'config/connection.php';

$id = isset($_GET['edit']) ? $_GET['edit'] : null;
$data = !is_null($id) ? query("SELECT * FROM students WHERE id = $id")[0] : 0;
// $success = null;

if (isset($_POST['submit'])){

    $nama = htmlspecialchars($_POST['nama']);
    $nrp = htmlspecialchars($_POST['nrp']);
    $email = htmlspecialchars($_POST['email']);
    $jurusan = htmlspecialchars($_POST['jurusan']);
    $gambar = $_FILES['gambar']['name'];
    $gambar_set = isset($gambar) ? upload($_FILES['gambar']) : false;

    if ($data > 0){
        if ( $gambar_set ) {
            if ( file_exists($data['gambar']) ){
                unlink($data['gambar']);
            }
            $update = "UPDATE students SET nama='$nama', nrp='$nrp', email='$email', jurusan='$jurusan', gambar='$gambar_set' WHERE id=$id";
        } else {
            $update = "UPDATE students SET nama='$nama', nrp='$nrp', email='$email', jurusan='$jurusan' WHERE id=$id";
        }
        if ( cud($update) > 0){
            // $success = true;
            header('Location: index.php?edit=succeeded');
        } else {
            // $success = false;
            header('Location: index.php?edit=failed');
        }
    } else {
        if ( $gambar_set ){
            $insert = "INSERT INTO students(nama, nrp, email, jurusan, gambar) VALUES ('$nama', '$nrp', '$email', '$jurusan', '$gambar_set')";
        } else {
            $insert = "INSERT INTO students(nama, nrp, email, jurusan) VALUES ('$nama', '$nrp', '$email', '$jurusan')";
        }
        if ( cud($insert) > 0){
            // $success = true;
            header('Location: index.php?add=succeeded');
        } else {
            // $success = false;
            header('Location: index.php?add=failed');
        }
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Mahasiswa</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="w-7xl mx-auto">
        <div class="text-3xl text-center my-5 rounded-lg border py-3">Form Mahasiswa</div>
        <!-- <?php if (!is_null($success)) : ?> 
            <?php if ($success) : ?>
            <div role="alert" class="alert alert-success">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>Data has been added!</span>
            </div>
            <?php else : ?>
            <div role="alert" class="alert alert-error">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>Error! Task failed successfully.</span>
            </div>
            <?php endif; ?>
        <?php endif; ?> -->
        <div class="w-1/2 mx-auto">
            <form action="" method="post" enctype="multipart/form-data">
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">What is your name?</legend>
                    <label class="input validator w-full">
                        <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <g
                            stroke-linejoin="round"
                            stroke-linecap="round"
                            stroke-width="2.5"
                            fill="none"
                            stroke="currentColor"
                            >
                            <!-- <rect width="20" height="16" x="2" y="4" rx="2"></rect> -->
                            <path d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"></path>
                            </g>
                        </svg>
                        <input type="text" placeholder="Enter your name" name="nama" value="<?= isset($_GET['edit']) ? $data['nama'] : "" ?>" required />
                    </label>
                    <div class="validator-hint hidden">Enter valid name</div>
                </fieldset>
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">What is your NRP?</legend>
                    <label class="input validator w-full">
                        <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <g
                            stroke-linejoin="round"
                            stroke-linecap="round"
                            stroke-width="2.5"
                            fill="none"
                            stroke="currentColor"
                            >
                            <!-- <rect width="20" height="16" x="2" y="4" rx="2"></rect> -->
                            <path d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 6.338 0Z"></path>
                            </g>
                        </svg>
                        <input type="number" placeholder="Enter your nrp" name="nrp" value="<?= isset($_GET['edit']) ? $data['nrp'] : "" ?>" required />
                    </label>
                    <div class="validator-hint hidden">Enter valid NRP number</div>
                </fieldset>
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">What is your email?</legend>
                    <label class="input validator w-full">
                        <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <g
                            stroke-linejoin="round"
                            stroke-linecap="round"
                            stroke-width="2.5"
                            fill="none"
                            stroke="currentColor"
                            >
                            <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                            <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                            </g>
                        </svg>
                        <input type="email" placeholder="mail@site.com" name="email" value="<?= isset($_GET['edit']) ? $data['email'] : "" ?>" required />
                    </label>
                    <div class="validator-hint hidden">Enter valid email address</div>
                </fieldset>
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">What is your subject?</legend>
                    <label class="input validator w-full">
                        <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <g
                            stroke-linejoin="round"
                            stroke-linecap="round"
                            stroke-width="2.5"
                            fill="none"
                            stroke="currentColor"
                            >
                            <!-- <rect width="20" height="16" x="2" y="4" rx="2"></rect> -->
                            <path d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0 0 12 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75Z"></path>
                            </g>
                        </svg>
                        <input type="text" placeholder="Enter your subject" name="jurusan" value="<?= isset($_GET['edit']) ? $data['jurusan'] : "" ?>" required />
                    </label>
                    <div class="validator-hint hidden">Enter valid subject</div>
                </fieldset>
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Upload your photo</legend>
                    <label class="input validator p-0 w-full">
                        <svg class="h-[1em] opacity-50 ml-3 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <g
                            stroke-linejoin="round"
                            stroke-linecap="round"
                            stroke-width="2.5"
                            fill="none"
                            stroke="currentColor"
                            >
                            <!-- <rect width="20" height="16" x="2" y="4" rx="2"></rect> -->
                            <path d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z"></path>
                            </g>
                        </svg>
                        <input type="file" class="file-input w-full" placeholder="Upload your photo" name="gambar"/>
                    </label>
                    <div class="validator-hint hidden">Enter valid image</div>
                </fieldset>
                <div class="flex justify-end my-5">
                    <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>