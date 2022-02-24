<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css"></link>
    <link rel="stylesheet" href="css/pagestyle.css"></link>
    <title>UNCO | Home</title>
</head>
<body>
    <?php
    require_once('config.inc.php');
        include_once('header.php');
    ?>
    <div id="main">
        <h1>CREATE A PERSONAL HOMEPAGE WITH <span id="brand">unco.</span></h1>
        <p>Easy to create and update!</p>
        <button><a href="form.php">Start Now</a></button>
    </div>
    <div class="container">
        
    <div class="row">
    <!-- <p><input type="text" name="name" placeholder="Enter name to Search"></p> -->
    <?php
        $conn_str = DB_SYS.':host='.DB_HOST.';dbname='.DB_NAME;
        try {
            if(isset($_SESSION['id'])){
                $id = $_SESSION['id'];
                $pdo = new PDO($conn_str,DB_USER,DB_PASS);
                $sql = "SELECT * FROM name WHERE id=:id";
                $stat = $pdo->prepare($sql);
                $stat->bindValue(":id",$id);
                $stat->execute();
                if($names = $stat->fetch()){
                    $name = $names['fName']." ".$names['lName'];
                    $sql = "SELECT * FROM personal WHERE id=:id";
                    $stat = $pdo->prepare($sql);
                    $stat->bindValue(":id",$id);
                    $stat->execute();
                    if($abouts = $stat->fetch()){
                        $about = $abouts['about'];
                        $sql = "SELECT * FROM image WHERE id=:id";
                        $stat = $pdo->prepare($sql);
                        $stat->bindValue(":id",$id);
                        $stat->execute();
                        if($images = $stat->fetch()){
                            $path = $images['path'];   
                        }
                        else{
                            $path = "images/Placeholder-Male.png";
                        }
                    }
                    ?>
                        <div class="col-12 col-sm-6 col-lg-4 addmargin">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="text-center">
                                    <img src="<?php echo$path ?>" class="rounded" alt="Placeholder-Male">
                                    </div>
                                    <h1 class="card-title" id="contact"><?php echo"$name" ?></h1>
                                    <p class="card-text"><?php echo"$about" ?></p>
                                    <a href='showpage.php?id=<?php echo"$id" ?>' class="btn btn-primary">Visit Here</a>
                                </div>
                            </div>
                        </div>
                        <?php
                }
            }
            else{
                $id = 0;
            }
                            $sql = "SELECT * FROM name WHERE id!=:id";
                            $stat = $pdo->prepare($sql);
                            $stat->bindValue(":id",$id);
                            $stat->execute();
                            while($names = $stat->fetch()){
                                $id= $names['id'];
                                $name = $names['fName']." ".$names['lName'];
                                $sql = "SELECT * FROM personal WHERE id=:id";
                                $perstat = $pdo->prepare($sql);
                                $perstat->bindValue(":id",$id);
                                $perstat->execute();
                                if($abouts = $perstat->fetch()){
                                    $about = $abouts['about'];
                                    $sql = "SELECT * FROM image WHERE id=:id";
                        $imgstat = $pdo->prepare($sql);
                        $imgstat->bindValue(":id",$id);
                        $imgstat->execute();
                        if($images = $imgstat->fetch()){
                            $path = $images['path'];   
                        }
                        else{
                            $path = "images/Placeholder-Male.png";
                        }
                                    ?>
                        <div class="col-12 col-sm-6 col-lg-4 addmargin">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="text-center">
                                    <img src="<?php echo$path ?>" class="rounded" alt="Placeholder-Male">
                                    </div>
                                    <h1 class="card-title" id="contact"><?php echo"$name" ?></h1>
                                    <p class="card-text"><?php echo"$about" ?></p>
                                    <a href='showpage.php?id=<?php echo"$id" ?>' class="btn btn-primary">Visit Here</a>
                                </div>
                            </div>
                        </div>
                        <?php
                                }
                            }
                        ?>
                    </div>
                    
                </div>
            <?php
        }catch (PDOException $e) {
            die('Server error');
        }
    ?>

    </div>
    <?php
    include_once('footer.php');
    ?>
    <script></script>
</body>
</html>