<?php
require_once('config.inc.php');
include_once('header.php');
if(isset($_GET['id'])){
    $id=$_GET['id'];
}
else if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
}
else if(isset($_COOKIE['id'])){
    $id = $_SESSION['id'];
}
else{
    redirect("index.php");
}
    $conn_str = DB_SYS.':host='.DB_HOST.';dbname='.DB_NAME;
    try {
        $pdo = new PDO($conn_str,DB_USER,DB_PASS);
        $sql = "SELECT * FROM name WHERE id=:id";
        $stat = $pdo->prepare($sql);
        $stat->bindValue(":id",$id);
        $stat->execute();
        if($name = $stat->fetch()){
            $sql = "SELECT * FROM personal WHERE id=:id";
            $stat = $pdo->prepare($sql);
            $stat->bindValue(":id",$id);
            $stat->execute();
            if($personal = $stat->fetch()){
              $sql = "SELECT * FROM image WHERE id=:id";
              $stat = $pdo->prepare($sql);
              $stat->bindValue(":id",$id);
              $stat->execute();
              if($image = $stat->fetch()){
                $sql = "SELECT * FROM education WHERE id=:id";
                $stat = $pdo->prepare($sql);
                $stat->bindValue(":id",$id);
                $stat->execute();
                if($education = $stat->fetch()){
                    $sql = "SELECT * FROM experience WHERE id=:id";
                $expstat = $pdo->prepare($sql);
                $expstat->bindValue(":id",$id);
                $expstat->execute();
                if($experience = $expstat->fetch()){
                    $sql = "SELECT * FROM certifications WHERE id=:id";
                    $cerstat = $pdo->prepare($sql);
                    $cerstat->bindValue(":id",$id);
                    $cerstat->execute();
                    if($certification = $cerstat->fetch()){
                        $sql = "SELECT * FROM skills WHERE id=:id";
                        $sklstat = $pdo->prepare($sql);
                        $sklstat->bindValue(":id",$id);
                        $sklstat->execute();
                        if($skills = $sklstat->fetch()){
                            $sql = "SELECT * FROM interests WHERE id=:id";
                            $intstat = $pdo->prepare($sql);
                            $intstat->bindValue(":id",$id);
                            $intstat->execute();
                            if($interests = $intstat->fetch()){
                                $sql = "SELECT * FROM languages WHERE id=:id";
                                $lanstat = $pdo->prepare($sql);
                                $lanstat->bindValue(":id",$id);
                                $lanstat->execute();
                                if($languages = $lanstat->fetch()){
                                    $sql = "SELECT * FROM hobbies WHERE id=:id";
                                    $hobstat = $pdo->prepare($sql);
                                    $hobstat->bindValue(":id",$id);
                                    $hobstat->execute();
                                    if($hobbies = $hobstat->fetch()){
                                        $sql = "SELECT * FROM referencedetails WHERE id=:id";
                                        $refstat = $pdo->prepare($sql);
                                        $refstat->bindValue(":id",$id);
                                        $refstat->execute();
                                        if($references = $refstat->fetch()){
                                            ?>
                                            <!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"></link>
  <link rel="stylesheet" href="css/pagestyle.css"></link>
  <link rel="stylesheet" href"css/style.css"></link>
  <title><?php echo"{$name['fName']} {$name['lName']}" ?> | Personal Homepage</title>
</head>

<body>
  <div class="container">
    <div class="card text-center">
      <div class="card-body">
        <div class="text-center">
          <img src="<?php echo"{$image['path']}" ?>" class="rounded" alt="Placeholder-Male">
        </div>
        <h1 class="card-title" id="contact"><?php echo"{$name['fName']} {$name['lName']}" ?></h1>
        <p class="card-text"><?php echo"{$personal['about']}" ?></p>
        <a href='mailto:<?php echo"{$personal['emailid']}" ?>' class="btn btn-primary">Email</a>
        <a href="tel:<?php echo"{$personal['phone']}" ?>" class="btn btn-primary">Phone</a>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-12 col-sm-6 col-lg-6">
        <div class="card no-border">
          <div class="card-body">
            <h5 class="card-title" id="profile">Profile</h5>
            <p class="card-text"><?php echo"{$personal['profile']}" ?></p>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-lg-6">
        <div class="card no-border">
          <div class="card-body">
            <h5 class="card-title" id="objective">Objective</h5>
            <p class="card-text"><?php echo"{$personal['objective']}" ?></p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12">
      <div class="card no-border">
        <div class="card-body">
          <h5 class="card-title" id="education">Education</h5>
          <div class="row">
              <?php 
              do {echo"
            <div class='col-12 col-sm-6 col-lg-4 format'>
              <h6>{$education['title']}</h6>
              <p class='card-text'><i>{$education['institute']}</i></p>
              <p class='card-text'>{$education['completion']}</p>
              <p class='card-text'>{$education['result']}</p>
            </div>";}while($education = $stat->fetch());
            ?>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12">
      <div class="card no-border">
        <div class="card-body">
          <h5 class="card-title" id="experience">Experience</h5>
          <div class="row">
              <?php
            do{echo"<div class='col-12 col-sm-4 col-lg-4 format'>
              <p class='card-text'>{$experience['title']}</p>
              <a href='{$experience['link']}' target='portfolio' class='btn btn-primary'>Visit Here</a>
            </div>";}while($experience = $expstat->fetch());
?>
    <div class="col-12">
      <div class="card no-border">
        <div class="card-body">
          <h5 class="card-title" id="certifications">Certifications</h5>
          <div class="row">
              <?php
              do{echo"
            <div class='col-12 col-sm-6 col-lg-4 format'>
              <h6>{$certification['title']}</h6>
              <p class='card-text'><i>{$certification['institute']}</i></p>
              <p class='card-text'>{$certification['completion']}</p>
              <p class='card-text'>Grade Achieved : {$certification['result']}</p>
              <a href='{$certification['link']}' target='certificate'
                class='btn btn-primary'>Visit Here</a>
            </div>";}while($certification=$cerstat->fetch());
            ?>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-sm-6 col-lg-6">
        <div class="card no-border">
          <div class="card-body">
            <h5 class="card-title" id="skills">Skills</h5>
            <ul class="list-group list-group-flush">
                <?php
              do{echo"<li class='list-group-item'>{$skills['name']}</li>";}while($skills=$sklstat->fetch());
              ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-lg-6">
        <div class="card no-border">
          <div class="card-body">
            <h5 class="card-title" id="interests">Interests</h5>
            <ul class="list-group list-group-flush">
            <?php
              do{echo"<li class='list-group-item'>{$interests['name']}</li>";}while($interests=$intstat->fetch());
              ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-sm-6 col-lg-6">
        <div class="card no-border">
          <div class="card-body">
            <h5 class="card-title" id="languages">Languages</h5>
            <ul class="list-group list-group-flush">
            <?php
              do{echo"<li class='list-group-item'>{$languages['name']}</li>";}while($languages=$lanstat->fetch());
              ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-lg-6">
        <div class="card no-border">
          <div class="card-body">
            <h5 class="card-title" id="hobbies">Hobbies</h5>
            <ul class="list-group list-group-flush">
            <?php
              do{echo"<li class='list-group-item'>{$hobbies['name']}</li>";}while($hobbies=$hobstat->fetch());
              ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12">
      <div class="card no-border">
        <div class="card-body">
          <h5 class="card-title" id="references">References</h5>
          <div class="row">
              <?php
              do{echo"<div class='col-12 col-sm-6 col-lg-6 format'>
                <h6>{$references['name']}</h6>
                <p class='card-text'><i>{$references['designation']}</i></p>
                <a href='tel:{$references['phone']}'
                  class='btn btn-primary'>Phone</a>
              </div>";}while($references=$refstat->fetch());
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
</body>

</html>
                                            <?php
                                        }
                                        else{
                                            redirect("index.php");
                                        }
                                    }
                                    else{
                                        redirect("index.php");
                                    }
                                  }
                                  else{
                                      redirect("index.php");
                                  }
                                }
                                    else{
                                        redirect("index.php");
                                    }
                                }
                                else{
                                    redirect("index.php");
                                }
                            }
                            else{
                                redirect("index.php");
                            }
                        }
                        else{
                            redirect("index.php");
                        }
                    }
                    else{
                        redirect("index.php");
                    }
                }
                else{
                    redirect("index.php");
                }
            }
            else{
                redirect("index.php");
            }
        }
        else{
            redirect("index.php");
        }
}catch (PDOException $e) {
    die($e->getmessage());
}
?>