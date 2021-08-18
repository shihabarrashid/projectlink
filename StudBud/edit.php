<?php
$mysqli = new mysqli('localhost', 'root','', 'studbud') or die(mysqli_error($mysqli));

if(isset($_GET['edit']))
{
    $id = $_GET['edit'];
    $result = $mysqli -> query("SELECT * FROM user_data WHERE id = $id");

    while($row = mysqli_fetch_array($result) )
    {
        $name = $row['name'];
        $email = $row['email'];
        // $uname = $_row["uname"];
        // $pass = $_row["pass"];
        // $ins = $_row["ins"];
    }

   
}
?>

<?php
if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $uname = $_POST["uname"];
    $pass = $_POST["pass"];
    $ins = $_POST["ins"];

    $result = $mysqli -> query("UPDATE user_data SET name='$name', email='$email', uname='$uname', pass='$pass', ins='$ins' WHERE id=$id");

    header("refresh: 2; url = user_edit.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudBud|Edit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="reg_style.css">
</head>
<body>

<div  class="register-col">
        <section class="register">
            <h1>Update Information</h1>
            <form action="" method="post">
                <p>Name</p>
                <input type="text" name="name" value="<?php echo $name; ?>">
                <p>Email</p>
                <input type="text" name="email" value="<?php echo $email; ?>">
                <p>Username</p>
                <input type="text" name="uname">
                <p>Password</p>
                <input type="password" name="pass"> 
                <p>Institution</p>
                <input type="text" name="ins" >
                <input type="hidden" name="id" value="<?php echo $_GET['edit'];?>">
                <br> <br>
                <button type="submit" name="update" value="update"  class="reg-buuton">Edit Informaton
                </button> 
            </form>
        </section>
    </div>

        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>