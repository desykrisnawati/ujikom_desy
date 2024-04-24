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
            <div class="p-5 flex justify-end">
            </div>
            <hr>
            
                </div>
            </div>
            <div class="w-full p-9">
                <p class="text-3xl font-bold mb-5">My Image</p>
                <div class="flex flex-wrap justify-center border border-black p-[3rem]">
                    <?php
                    $query = mysqli_query($connection, "SELECT * FROM pictures WHERE user_id='$userId'");
                    $pernahTrue = false;
                    while ($data = mysqli_fetch_array($query)) {
                        $pictureId = $data['id'];
                        $pictureDate = $data['upload_date'];?>
                        <div>
                            <div class="border border-black">
                                <div>
                                    <a href="comment.php?picture=<?php echo $data['file_path'] ?>&pictureTitle=<?php echo $data['title']?>&pictureId=<?php echo $pictureId?>&description=<?php echo $data['description']?>&uploadDate=<?php echo $pictureDate?>">
                                        <img class="w-[19rem] h-[10rem]" src="../image/<?php echo $data['file_path'] ?>" alt="<?php echo $data['title']?>">
                                    </a>
                                </div>
                                <div class="w-[19rem] h-[10rem] px-3 py-2 overflow-hidden">
                                    <?php echo $data['description']?>
                                </div>
                                <div class="m-3 flex justify-between items-center">
                                    <p>
                                        <?php
                                        $checkLike = mysqli_query($connection, "SELECT * FROM likes WHERE picture_id='$pictureId' AND user_id='$userId'");

                                        if (mysqli_num_rows($checkLike) == 1) {
                                            $like = mysqli_query($connection, "SELECT * FROM likes WHERE picture_id = '$pictureId'");
                                            echo mysqli_num_rows($like).' Like';
                                        } else {
                                            $like = mysqli_query($connection, "SELECT * FROM likes WHERE picture_id = '$pictureId'");
                                            echo mysqli_num_rows($like).' Like';
                                        } ?>
                                    </p>
                                    <p>
                                        <a href="comment.php?picture=<?php echo $data['file_path'] ?>&pictureTitle=<?php echo $data['title']?>&pictureId=<?php echo $pictureId?>&description=<?php echo $data['description']?>&uploadDate=<?php echo $pictureDate?>">
                                            <?php
                                            $commentTotal = mysqli_query($connection, "SELECT * FROM comments WHERE picture_id='$pictureId'");
                                            echo mysqli_num_rows($commentTotal). ' Comment';
                                            ?>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php
                        $pernahTrue = true;
                    }
                    if (!$pernahTrue) { ?>
                        <p>
                            Tidak ada gambar yang kamu miliki
                        </p>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
