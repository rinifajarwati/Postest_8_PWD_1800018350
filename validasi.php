<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validasi</title>
    <style>
        .error {
            color: #ff0000;
        }
    </style>
</head>
<body>
    <?php

    $db = mysqli_connect("localhost", "root", "", "db_admin");
    // define variables and set to empty values
    $namaErr = $emailErr = $genderErr = $websiteErr = "";
    $nama = $email = $gender = $comment = $website = "";
    $statusErr = false;

    if ($_SERVER['REQUEST_METHOD'] ==  'POST') {
        if (empty($_POST['nama'])) {
            $namaErr = "Nama harus diisi";
            $statusErr = true;
        } else {
            $nama = test_input($_POST['nama']);
        }

        if (empty($_POST['email'])) {
            $emailErr = "Email harus diisi";
            $statusErr = true;
        } else {

            $email = test_input($_POST['email']);
            // check if email address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Email tidak sesuai format";
                $statusErr = true;
            }
        }

        if (empty($_POST['website'])) {
            $websiteErr = "Website harus diisi";
            $statusErr = true;
        } else {
            $website = test_input($_POST['website']);
        }

        if (empty($_POST['comment'])) {
            $comment = "";
        } else {
            $comment = test_input($_POST['comment']);
        }

        if (empty($_POST['gender'])) {
            $genderErr = "Gender harus diisi";
            $statusErr = true;
        } else {
            $gender = test_input($_POST['gender']);
        }

        if (false == $statusErr) {
            $sql = "INSERT INTO comments(nama, email, website, comment, gender)
                    VALUES('$nama', '$email', '$website', '$comment', '$gender')";
            $insert = mysqli_query($db, $sql);
        }


    }

    function test_input ($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    ?>

    <h2>Posting Komentar</h2>

    <p><span class="error">* Harus Diisi</span></p>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <table>
            <tr>
                <td>Nama : </td>
                <td><input type="text" name="nama" id="nama"><span class="error">* <?php echo $namaErr; ?></span></td>
            </tr>
            <tr>
                <td>E-mail : </td>
                <td><input type="text" name="email" id="email"><span class="error">* <?php echo $emailErr; ?></span></td>
            </tr>
            <tr>
                <td>Website : </td>
                <td><input type="text" name="website" id="website"><span class="error">* <?php echo $websiteErr; ?></span></td>
            </tr>
            <tr>
                <td>Comment : </td>
                <td><textarea name="comment" id="comment" cols="40" rows="5"></textarea></td>
            </tr>
            <tr>
                <td>Gender : </td>
                <td>
                    <input type="radio" name="gender" value="L">Laki-laki
                    <input type="radio" name="gender" value="P">Perempuan
                    <span class="error">* <?php echo $genderErr; ?></span>
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="Submit" name="submit"></td>
            </tr>
        </table>
    </form>

    <?php
    echo "<h2>Data yang Anda isi:</h2>";

    echo $nama . "<br/>";
    echo $email . "<br/>";
    echo $website . "<br/>";
    echo $comment . "<br/>";
    echo $gender ;

    ?>
</body>
</html>