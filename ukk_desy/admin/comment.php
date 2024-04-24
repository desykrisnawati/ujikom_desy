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
$pictureName = $_GET['picture'];
$pictureTitle = $_GET['pictureTitle'];
$pictureId = $_GET['pictureId'];
$description = $_GET['description'];
$uploadDate = $_GET['uploadDate'];
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
            <div class="w-full p-9">
                <p class="text-3xl font-bold mb-5">Picture</p>
                <div class="flex flex-col justify-between border border-black">
                    <div class="bg-white flex flex-col space-y-4 self-start justify-around">
                        <img class="w-[19rem] h-[10rem]" src="../image/<?php echo $pictureName?>" alt="<?php echo $pictureTitle?>">
                        <p class="w-[5rem] h-">
                            <?php
                            $checkLike = mysqli_query($connection, "SELECT * FROM likes WHERE picture_id='$pictureId' AND user_id='$userId'");

                            if (mysqli_num_rows($checkLike) == 1) { ?>
                                <a class="flex justify-evenly" href="../service/like_service_index.php?pictureName=<?php echo $pictureName?>&pictureTitle=<?php echo $pictureTitle?>&pictureId=<?php echo $pictureId?>&description=<?php echo $description?>&uploadDate=<?php echo $uploadDate?>" type="submit" name="cancel-like-index">
                                    <svg aria-label="Unlike" class="x1lliihq x1n2onr6 xxk16z8" fill="currentColor" height="24" role="img" viewBox="0 0 48 48" width="24">
                                        <title>
                                            Unlike
                                        </title>
                                        <path d="M34.6 3.1c-4.5 0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5s1.1-.2 1.6-.5c1-.6 2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z">
                                        </path>
                                    </svg>
                                    <?php
                                    $like = mysqli_query($connection, "SELECT * FROM likes WHERE picture_id = '$pictureId'");
                                    echo mysqli_num_rows($like).' Like';
                                    ?>
                                </a>
                            <?php } else { ?>
                                <a class="flex justify-evenly" href="../service/like_service_index.php?pictureName=<?php echo $pictureName?>&pictureTitle=<?php echo $pictureTitle?>&pictureId=<?php echo $pictureId?>&description=<?php echo $description?>&uploadDate=<?php echo $uploadDate?>" type="submit" name="like-index">
                                    <svg aria-label="Like" class="x1lliihq x1n2onr6 xyb1xck" fill="currentColor" height="24" role="img" viewBox="0 0 24 24" width="24">
                                        <title>
                                            Like
                                        </title>
                                        <path d="M16.792 3.904A4.989 4.989 0 0 1 21.5 9.122c0 3.072-2.652 4.959-5.197 7.222-2.512 2.243-3.865 3.469-4.303 3.752-.477-.309-2.143-1.823-4.303-3.752C5.141 14.072 2.5 12.167 2.5 9.122a4.989 4.989 0 0 1 4.708-5.218 4.21 4.21 0 0 1 3.675 1.941c.84 1.175.98 1.763 1.12 1.763s.278-.588 1.11-1.766a4.17 4.17 0 0 1 3.679-1.938m0-2a6.04 6.04 0 0 0-4.797 2.127 6.052 6.052 0 0 0-4.787-2.127A6.985 6.985 0 0 0 .5 9.122c0 3.61 2.55 5.827 5.015 7.97.283.246.569.494.853.747l1.027.918a44.998 44.998 0 0 0 3.518 3.018 2 2 0 0 0 2.174 0 45.263 45.263 0 0 0 3.626-3.115l.922-.824c.293-.26.59-.519.885-.774 2.334-2.025 4.98-4.32 4.98-7.94a6.985 6.985 0 0 0-6.708-7.218Z">
                                        </path>
                                    </svg>
                                    <?php
                                    $like = mysqli_query($connection, "SELECT * FROM likes WHERE picture_id = '$pictureId'");
                                    echo mysqli_num_rows($like).' Like';
                                    ?>
                                </a>
                            <?php } ?>
                        </p>
                    </div>
                    <div class="bg-white rounded-bl-lg rounded-br-lg p-4">
                        <p><?php echo $description?></p>
                        <p class="text-xs mt-2"><?php echo $uploadDate?></p>
                    </div>
                    <div class="border border-black w-full p-4 flex flex-col space-y-5">
                        <div>
                            <div>
                                <p class="text-3xl font-bold mb-5 text-white">
                                    Comment Section
                                </p>
                                <hr>
                            </div>
                            <div>
                                <?php
                                $comment = mysqli_query($connection, "SELECT c.*, u.username FROM comments c INNER JOIN users u ON c.user_id = u.id WHERE c.picture_id='$pictureId'");

                                while ($row = mysqli_fetch_array($comment)) {
                                    $username = $row['username'];
                                    $commentText = $row['comment'];
                                    $commentDate = $row['comment_date']?>

                                    <div>
                                        <div class="flex justify-start gap-4">
                                            <p class="font-bold capitalize"><?php echo $username; ?></p>
                                            <p><?php echo $commentText; ?></p>
                                        </div>
                                        <p class="text-xs"><?php echo $commentDate?></p>
                                    </div>

                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div>
                            <form action="../service/comment_service.php?picture=<?php echo $pictureName?>&pictureTitle=<?php echo $pictureTitle?>&pictureId=<?php echo $pictureId?>&description=<?php echo $description?>&uploadDate=<?php echo $uploadDate?>" method="post">
                                <div>
                                    <label for="pic-id">Picture ID</label>
                                    <input class="w-full pl-4 text-black border border-black" type="text" id="pic-id" value="<?php echo $pictureId?>" name="picture-id" readonly/>
                                </div>
                                <div>
                                    <label for="comment-id">Comment</label>
                                    <textarea class="w-full pl-4 text-black border border-black" id="comment-id" name="comment" required></textarea>
                                </div>
                                <div>
                                    <button class="bg-red-500 text-white p-2 rounded-md"  type="submit" name="submit">Kirim</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>