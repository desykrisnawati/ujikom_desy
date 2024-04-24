<?php

session_start();
include '../config/connection.php';
if ($_SESSION['status'] != 'login') {
    echo "
        <script>
            location.href='../index.php';
        </script>
    ";
}

$userId = $_SESSION['userid'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Website Gallery Photo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>

<header class="bg-gray-500">
    <div class="px-[4rem] py-6">
        <div class="flex justify-between items-center">
            <div>
                <a class="text-3xl font-bold text-white" href="index.php">Gallery Photo</a>
            </div>
            <div>
                <div class="w-[20rem] flex justify-evenly">
                    <a class="text-xl text-white" href="index.php">Home</a>
                    <a class="text-xl text-white" href="home.php">My Image</a>
                    <a class="text-xl text-white" href="upload.php">Upload</a>
                    <a class="text-xl text-white" href="../service/logout_service.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
</header>

    <div>
        <div>
            <div>
                <div class="w-full px-[10rem] py-[3rem]">
                    <div class="bg-red-500 w-min p-3 rounded-lg">
                        <a href="add-image.php">
                            <h1 class="text-3xl font-bold mb-5 text-white">Upload</h1>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div>
                <div class="w-full p-9">
                    <h1 class="text-3xl font-bold mb-5">Upload</h1>
                    <div class="flex flex-wrap justify-center border border-black p-[3rem]">
                        <table class="border border-black">
                            <thead class="border border-black">
                            <tr class="border border-black">
                                <th class="border border-black">No</th>
                                <th class="border border-black">Foto</th>
                                <th class="border border-black">Judul Foto</th>
                                <th class="border border-black">Deskripsi</th>
                                <th class="border border-black">Tanggal</th>
                                <th class="border border-black">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            $userId = $_SESSION['userid'];
                            $sql = mysqli_query($connection, "SELECT * FROM pictures WHERE user_id = '$userId'");
                            while ($data = mysqli_fetch_array($sql)) {
                                ?>
                                <tr class="border border-black">
                                    <td class="border border-black"><?php echo $no++ ?></td>
                                    <td class="border border-black">
                                        <div class="w-full h-full flex justify-center">
                                            <img class="w-[5rem] h-[5rem]" src="../image/<?php echo $data['file_path']?>" alt="<?php echo $data['file_path']?>">
                                        </div>
                                    </td>
                                    <td class="border border-black text-center"><?php echo $data['title']?></td>
                                    <td class="border border-black text-center">
                                        <div class="flex justify-center w-[45rem] px-8">
                                            <div>
                                                <?php echo $data['description']?>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="border border-black text-center"><?php echo $data['upload_date']?></td>
                                    <td class="border border-black text-center">
                                        <a href="edit-image.php?filePath=<?php echo $data['file_path']?>&id=<?php echo $data['id']?>&title=<?php echo $data['title']?>&description=<?php echo $data['description']?>">
                                            Edit
                                        </a>

                                        <a href="delete-image.php?id=<?php echo $data['id']?>">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>