<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css"></link>
    <title>UNCO | Signup</title>
</head>
<body>
<?php
    require_once('config.inc.php');
    include_once('header.php');
    $conn_str = DB_SYS.':host='.DB_HOST.';dbname='.DB_NAME;
    try {
        $pdo = new PDO($conn_str,DB_USER,DB_PASS);
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
                redirect('index.php');    
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
                $_SESSION['randstr'] = $randString;
                $_COOKIE['randstr'] = $randString;
                $sql = "UPDATE userdetails SET randstr=:rand WHERE id =:id";
                $stat = $pdo->prepare($sql);
                $stat->bindValue(":rand",$randString);
                $stat->bindValue(":id",$result['id']);
                $stat->execute();
                redirect('index.php');    
            }
    }
    $class = "noerror";
    $alt = "Enter a valid value";
    $name = "";    
    $email = "";
    $pass = "";
    $cpass = "";    
    $remember = "off";
        if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirmPassword'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $pass = $_POST['password'];
            $cpass = $_POST['confirmPassword'];
            if(isset($_POST['remember'])){
                $remember = $_POST['remember'];
            }
            if($name != "" && $email != "" && $pass != "" && $cpass != ""){
                if($pass==$cpass){
                $sql = "SELECT * FROM userdetails WHERE email=:email AND password=:pass";
                $stat = $pdo->prepare($sql);
                $stat->bindValue(":email",$email);
                $stat->bindValue(":pass",$pass);
                $stat->execute();
                if($result = $stat->fetch()){
                    $_SESSION['id'] = $result['id'];
                    $randString = generateRandomString();
                    $_SESSION['randstr'] = $randString;
                    $sql = "UPDATE userdetails SET randstr=:rand WHERE id =:id";
                    $stat = $pdo->prepare($sql);
                    $stat->bindValue(":rand",$randString);
                    $stat->bindValue(":id",$result['id']);
                    $stat->execute();
                    if($remember=="on"){
                        $expiry = time()+60*60*24*365;
                        setcookie('id',$result['id'],$expiry);
                        setcookie('randstr',$randString,$expiry);
                    }
                    redirect('index.php');
                }
                $sql = "SELECT * FROM userdetails WHERE email=:email";
                $stat = $pdo->prepare($sql);
                $stat->bindValue(":email",$email);
                $stat->execute();
                if($result = $stat->fetch()){
                    ?>
                    <div class="flex">
                        <div class="inner heading">
                            <p>An accout with this email already exists. Please Login!</p>
                        </div>
                        <div class="inner button">
                            <a href="login.php"><button>Login</button></a>
                        </div>
                    </div>
                        <?php
                        include_once('footer.php');
                        die();
                }
                else{
                    $sql = "INSERT INTO userdetails(name, email, password, randstr) VALUES (:name,:email,:pass,:randstr)";
                    $randString = generateRandomString();
                    $stat = $pdo->prepare($sql);
                    $stat->bindValue(":name",$name);
                    $stat->bindValue(":email",$email);
                    $stat->bindValue(":pass",$pass);
                    $stat->bindValue(":randstr",$randString);
                    $stat->execute();
                    session_start();
                    $_SESSION['id'] = $result['id'];
                    $randString = generateRandomString();
                    $_SESSION['randstr'] = $randString;
                    $sql = "UPDATE userdetails SET randstr=:rand WHERE id =:id";
                    $stat = $pdo->prepare($sql);
                    $stat->bindValue(":rand",$randString);
                    $stat->bindValue(":id",$result['id']);
                    $stat->execute();
                    if($remember=="on"){
                        $expiry = time()+60*60*24*365;
                        setcookie('id',$result['id'],$expiry);
                        setcookie('randstr',$randString,$expiry);
                    }
                    redirect('login.php');
                }
                }
                else{
                    $class = "error";
                    $alt = "Passwords does not match";
                }
            }
        }
    ?>
    <div class="outer">
        <form action="signup.php" method="POST">
            <div class="flex">
                <div class="inner heading">
                    <h1>Sign Up</h1>
                </div>
                <div class="inner">
                    <div class="labels">
                    <label for="name">Name</label>
                    </div>
                    <div class="inputs">
                    <input required type="text" name="name" id="name">
                    <div class="displayerror"></div>
                    </div>
                </div>
                <div class="inner">
                    <div class="labels">
                    <label for="email">Email</label>                          
                    </div>
                    <div class="inputs">
                    <input required type="email" name="email" id="email">
                    <div class="displayerror"></div>
                    </div>
                </div>
                <div class="inner">
                    <div class="labels">
                    <label for="pass">Password</label>
                    </div>
                    <div class="inputs">
                    <input required class="<?php echo"$class" ?>" title="<?php echo"$alt" ?>" type="password" name="password" id="pass">
                    <div class="displayerror"></div>
                    </div>
                </div>
                <div class="inner">
                    <div class="labels">
                    <label for="cpass">Confirm Password</label>
                    </div>
                    <div class="inputs">
                    <input required class="<?php echo"$class" ?>" title="<?php echo"$alt" ?>" type="password" name="confirmPassword" id="cpass">
                    <div class="displayerror"></div>
                    </div>
                </div>
                <div class="inner remember">
                    <input type="checkbox" name="rememberme" id="remember">
                    <label for="remember">Keep me signed in</label>
                </div>
                <div class="inner button">
                    <div class="displayerror"></div>
                    <input type="submit" value="Sign Up">
                </div>    
            </div>
        </form>
    </div>
    <?php
}catch (PDOException $e) {
    die('Server error');
}
include_once('footer.php');
    ?>
    <script src="script.js" lang="javascript"></script>
</body>
</html>