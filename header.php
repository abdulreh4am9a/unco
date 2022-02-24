<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="css/styles.css"></link>
<link rel="shortcut icon" href="images/Logo-short.png"></link>
</head>
<?php
require_once('config.inc.php');
$conn_str = DB_SYS.':host='.DB_HOST.';dbname='.DB_NAME;
try {
    $pdo = new PDO($conn_str,DB_USER,DB_PASS);
session_start();
if(isset($_SESSION['id']) && isset($_SESSION['randstr'])){
    $id = $_SESSION['id'];
    $randstr = $_SESSION['randstr'];
    $sql = "SELECT * FROM userdetails WHERE id=:id AND randstr=:randstr";
    $stat = $pdo->prepare($sql);
    $stat->bindValue(":id",$id);
    $stat->bindValue(":randstr",$randstr);
    $stat->execute();
        if($result = $stat->fetch()){
            $randString = generateRandomString();
            $_SESSION['randstr'] = $randString;
            if(isset($_COOKIE['randstr'])){
                $_COOKIE['randstr'] = $randString;
            }
            $sql = "UPDATE userdetails SET randstr=:rand WHERE id =:id";
            $stat = $pdo->prepare($sql);
            $stat->bindValue(":rand",$randString);
            $stat->bindValue(":id",$result['id']);
            $stat->execute();
            ?>
            <header>
                <div id="B">
                    <span id="brand"><a href="index.php">unco.</a></span>
                </div>
                <div id="X"></div>
                <div id="E">
                    <p><a href='form.php'>Edit</a></p>
                </div>
                <div id="L">
                    <p><a href="logout.php">Logout</a></p>
                </div>
            </header>
            <?php
        }
        else{
            redirect("index.php");
        }
}
else if(isset($_COOKIE['id']) && isset($_COOKIE['randstr'])){
    $id = $_COOKIE['id'];
    $randstr = $_COOKIE['randstr'];
    $sql = "SELECT * FROM userdetails WHERE id=:id AND randstr=:randstr";
    $stat = $pdo->prepare($sql);
    $stat->bindValue(":id",$id);
    $stat->bindValue(":randstr",$randstr);
    $stat->execute();
        if($result = $stat->fetch()){
            $randString = generateRandomString();
            $_SESSION['id'] = $id;
            $_SESSION['randstr'] = $randString;
            $_COOKIE['randstr'] = $randString;
            $sql = "UPDATE userdetails SET randstr=:rand WHERE id =:id";
            $stat = $pdo->prepare($sql);
            $stat->bindValue(":rand",$randString);
            $stat->bindValue(":id",$result['id']);
            $stat->execute();
            ?>
            <header>
                <div id="B">
                    <span id="brand"><a href="index.php">unco.</a></span>
                </div>
                <div id="X"></div>
                <div id="E">
                    <p><a href='form.php?id="<?php echo"$id" ?>"'>Edit</a></p>
                </div>
                <div id="L">
                    <p><a href="logout.php">Logout</a></p>
                </div>
            </header>
            <?php    
        }
        else{
            redirect("index.php");
        }
}
else{
    ?>
            <header>
                <div id="B">
                    <span id="brand"><a href="index.php">unco.</a></span>
                </div>
                <div id="X"></div>
                <div id="E">
                <p><a href='signup.php'>Signup</a></p>
                </div>
                <div id="L">
                    <p><a href="login.php">Login</a></p>
                </div>
            </header>
            <?php
}
}catch (PDOException $e) {
    die('Server error');
}
?>