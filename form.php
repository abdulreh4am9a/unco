<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css"></link>
    <title>UNCO | Form</title>
</head>
<body>
    <?php
    require_once('config.inc.php');
        include_once('header.php');
        if(isset($_SESSION['id'])){
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
            $fname = $name['fName'];
            $lname = $name['lName'];
            $sql = "SELECT * FROM personal WHERE id=:id";
            $stat = $pdo->prepare($sql);
            $stat->bindValue(":id",$id);
            $stat->execute();
            if($personal = $stat->fetch()){
                $about = $personal['about'];
                $email = $personal['emailid'];
                $phone = $personal['phone'];
                $profile = $personal['profile'];
                $objective = $personal['objective'];
                $sql = "SELECT * FROM education WHERE id=:id";
                $stat = $pdo->prepare($sql);
                $stat->bindValue(":id",$id);
                $stat->execute();
                if($education = $stat->fetch()){
                    $dtitle = $education['title'];
                    $dinstitute = $education['institute'];
                    $dcompletion = $education['completion'];
                    $dresult = $education['result'];
                    $sql = "SELECT * FROM experience WHERE id=:id";
                $expstat = $pdo->prepare($sql);
                $expstat->bindValue(":id",$id);
                $expstat->execute();
                if($experience = $expstat->fetch()){
                    $etitle = $experience['title'];
                    $elink = $experience['link'];
                    $sql = "SELECT * FROM certifications WHERE id=:id";
                    $cerstat = $pdo->prepare($sql);
                    $cerstat->bindValue(":id",$id);
                    $cerstat->execute();
                    if($certification = $cerstat->fetch()){
                        $ctitle = $certification['title'];
                        $cinstitute = $certification['institute'];
                        $ccompletion = $certification['completion'];
                        $cresult = $certification['result'];
                        $clink = $certification['link'];
                        $sql = "SELECT * FROM skills WHERE id=:id";
                        $sklstat = $pdo->prepare($sql);
                        $sklstat->bindValue(":id",$id);
                        $sklstat->execute();
                        if($skills = $sklstat->fetch()){
                            $skill = $skills['name'];
                            $sql = "SELECT * FROM interests WHERE id=:id";
                            $intstat = $pdo->prepare($sql);
                            $intstat->bindValue(":id",$id);
                            $intstat->execute();
                            if($interests = $intstat->fetch()){
                                $interest = $interests['name'];
                                $sql = "SELECT * FROM languages WHERE id=:id";
                                $lanstat = $pdo->prepare($sql);
                                $lanstat->bindValue(":id",$id);
                                $lanstat->execute();
                                if($languages = $lanstat->fetch()){
                                    $lang = $languages['name'];
                                    $sql = "SELECT * FROM hobbies WHERE id=:id";
                                    $hobstat = $pdo->prepare($sql);
                                    $hobstat->bindValue(":id",$id);
                                    $hobstat->execute();
                                    if($hobbies = $hobstat->fetch()){
                                        $hobby = $hobbies['name'];
                                        $sql = "SELECT * FROM referencedetails WHERE id=:id";
                                        $refstat = $pdo->prepare($sql);
                                        $refstat->bindValue(":id",$id);
                                        $refstat->execute();
                                        if($references = $refstat->fetch()){
                                            $rname = $references['name'];
                                            $designation = $references['designation'];
                                            $rphone = $references['phone'];
                                            ?>
        <form id="ff" method="POST" enctype="multipart/form-data" action="action.php">
        <fieldset>
            <legend>Personal Information</legend>
            <div class="pflex">
            <div class="pgrid">
            <label for="fname">First Name</label>
            <input type="text" name="fname" placeholder="No space or special characters" value="<?php echo$fname ?>" id="fname">
            </div>
            <div class="pgrid">
            <label for="lname">Last Name</label>
            <input type="text" name="lname" placeholder="No special characters allowed" value="<?php echo$lname ?>" id="lname">
            </div>
            <div class="pgrid">
            <label for="about">About</label>
            <input type="text" name="about" placeholder="5-50 characters" value="<?php echo$about ?>" id="about">
            </div>
            <div class="pgrid">
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Must be a valid email address" value="<?php echo$email ?>" id="email">
            </div>
            <div class="pgrid">            
            <label for="phone">Phone</label>
            <input type="text" name="phone" placeholder="Must be a valid phone number" value="<?php echo$phone ?>" id="phone">
            </div>
            <div class="pgrid">
            <label for="image">Picture</label>
            <input type="file" name="image" id="image">
            </div>
        </div>
        </fieldset>
        <fieldset>
            <legend>Profile</legend>
            <div class="pgrid">
            <label for="profile">Describe About Yourself</label>
            <textarea name="profile" id="profile" placeholder="100-350 characters" rows="1"><?php echo$profile ?></textarea>
            </div>
        </fieldset>
        <fieldset>
            <legend>Objective</legend>
            <div class="pgrid">
            <label for="objective">Describe Objective</label>
            <textarea name="objective" id="objective" placeholder="75-250 characters" rows="1"><?php echo$objective ?></textarea>
            </div>
        </fieldset>
        <fieldset>
            <legend>Education</legend>
            <div class="insertEducation">
                <input type="text" placeholder="Title" value="<?php echo$dtitle ?>" name="dtitle[]" class="title">
                <input type="text" placeholder="Institute" value="<?php echo$dinstitute ?>" name="dinstitute[]" class="institute">
                <input type="text" placeholder="Completion" value="<?php echo$dcompletion ?>" name="dcompletion[]" class="completion">
                <input type="text" placeholder="Result" value="<?php echo$dresult ?>" name="dresult[]" class="result">
            </div>
            <?php
            if($education = $stat->fetch()){
                $dtitle = $education['title'];
                $dinstitute = $education['institute'];
                $dcompletion = $education['completion'];
                $dresult = $education['result'];
            }
            else{
                $dtitle = "";
                $dinstitute = "";
                $dcompletion = "";
                $dresult = "";
            }
            ?>
            <div class="insertEducation">
                <input type="text" placeholder="Title" value="<?php echo$dtitle ?>" name="dtitle[]" class="title">
                <input type="text" placeholder="Institute" value="<?php echo$dinstitute ?>" name="dinstitute[]" class="institute">
                <input type="text" placeholder="Completion" value="<?php echo$dcompletion ?>" name="dcompletion[]" class="completion">
                <input type="text" placeholder="Result" value="<?php echo$dresult ?>" name="dresult[]" class="result">
            </div>
            <?php
            if($education = $stat->fetch()){
                $dtitle = $education['title'];
                $dinstitute = $education['institute'];
                $dcompletion = $education['completion'];
                $dresult = $education['result'];
            }
            else{
                $dtitle = "";
                $dinstitute = "";
                $dcompletion = "";
                $dresult = "";
            }
            ?>
            <div class="insertEducation">
                <input type="text" placeholder="Title" value="<?php echo$dtitle ?>" name="dtitle[]" class="title">
                <input type="text" placeholder="Institute" value="<?php echo$dinstitute ?>" name="dinstitute[]" class="institute">
                <input type="text" placeholder="Completion" value="<?php echo$dcompletion ?>" name="dcompletion[]" class="completion">
                <input type="text" placeholder="Result" value="<?php echo$dresult ?>" name="dresult[]" class="result">
            </div>
            <?php
            if($education = $stat->fetch()){
                $dtitle = $education['title'];
                $dinstitute = $education['institute'];
                $dcompletion = $education['completion'];
                $dresult = $education['result'];
            }
            else{
                $dtitle = "";
                $dinstitute = "";
                $dcompletion = "";
                $dresult = "";
            }
            ?>
            <div class="insertEducation">
                <input type="text" placeholder="Title" value="<?php echo$dtitle ?>" name="dtitle[]" class="title">
                <input type="text" placeholder="Institute" value="<?php echo$dinstitute ?>" name="dinstitute[]" class="institute">
                <input type="text" placeholder="Completion" value="<?php echo$dcompletion ?>" name="dcompletion[]" class="completion">
                <input type="text" placeholder="Result" value="<?php echo$dresult ?>" name="dresult[]" class="result">
            </div>
            <?php
            if($education = $stat->fetch()){
                $dtitle = $education['title'];
                $dinstitute = $education['institute'];
                $dcompletion = $education['completion'];
                $dresult = $education['result'];
            }
            else{
                $dtitle = "";
                $dinstitute = "";
                $dcompletion = "";
                $dresult = "";
            }
            ?>
            <div class="insertEducation">
                <input type="text" placeholder="Title" value="<?php echo$dtitle ?>" name="dtitle[]" class="title">
                <input type="text" placeholder="Institute" value="<?php echo$dinstitute ?>" name="dinstitute[]" class="institute">
                <input type="text" placeholder="Completion" value="<?php echo$dcompletion ?>" name="dcompletion[]" class="completion">
                <input type="text" placeholder="Result" value="<?php echo$dresult ?>" name="dresult[]" class="result">
            </div>
        </fieldset>
        <fieldset>
            <legend>Experience</legend>
            <div class="insertExperience">
                <input type="text" placeholder="Title" value="<?php echo$etitle ?>" name="etitle[]" class="title">
                <input type="url" placeholder="Link" value="<?php echo$elink ?>" name="elink[]" class="link">
            </div>
            <?php
            if($experience = $expstat->fetch()){
                $etitle = $experience['title'];
                $elink = $experience['link'];
            }
            else{
                $etitle = "";
                $elink = "";
            }
            ?>
            <div class="insertExperience">
                <input type="text" placeholder="Title" value="<?php echo$etitle ?>" name="etitle[]" class="title">
                <input type="url" placeholder="Link" value="<?php echo$elink ?>" name="elink[]" class="link">
            </div>
            <?php
            if($experience = $expstat->fetch()){
                $etitle = $experience['title'];
                $elink = $experience['link'];
            }
            else{
                $etitle = "";
                $elink = "";
            }
            ?>
            <div class="insertExperience">
                <input type="text" placeholder="Title" value="<?php echo$etitle ?>" name="etitle[]" class="title">
                <input type="url" placeholder="Link" value="<?php echo$elink ?>" name="elink[]" class="link">
            </div>
            <?php
            if($experience = $expstat->fetch()){
                $etitle = $experience['title'];
                $elink = $experience['link'];
            }
            else{
                $etitle = "";
                $elink = "";
            }
            ?>
            <div class="insertExperience">
                <input type="text" placeholder="Title" value="<?php echo$etitle ?>" name="etitle[]" class="title">
                <input type="url" placeholder="Link" value="<?php echo$elink ?>" name="elink[]" class="link">
            </div>
            <?php
            if($experience = $expstat->fetch()){
                $etitle = $experience['title'];
                $elink = $experience['link'];
            }
            else{
                $etitle = "";
                $elink = "";
            }
            ?>
            <div class="insertExperience">
                <input type="text" placeholder="Title" value="<?php echo$etitle ?>" name="etitle[]" class="title">
                <input type="url" placeholder="Link" value="<?php echo$elink ?>" name="elink[]" class="link">
            </div>
            <?php
            if($experience = $expstat->fetch()){
                $etitle = $experience['title'];
                $elink = $experience['link'];
            }
            else{
                $etitle = "";
                $elink = "";
            }
            ?>
            <div class="insertExperience">
                <input type="text" placeholder="Title" value="<?php echo$etitle ?>" name="etitle[]" class="title">
                <input type="url" placeholder="Link" value="<?php echo$elink ?>" name="elink[]" class="link">
            </div>
        </fieldset>
        <fieldset>
            <legend>Certifications</legend>
            <div class="insertCertification">
                <input type="text" placeholder="Title" value="<?php echo$ctitle ?>" name="ctitle[]" class="title">
                <input type="text" placeholder="Institute" value="<?php echo$cinstitute ?>" name="cinstitute[]" class="institute">
                <input type="text" placeholder="Completion" value="<?php echo$ccompletion ?>" name="ccompletion[]" class="completion">
                <input type="text" placeholder="Result" value="<?php echo$cresult ?>" name="cresult[]" class="result">
                <input type="url" placeholder="Link" value="<?php echo$clink ?>" name="clink[]" class="link">
            </div>
            <?php
            if($certification = $cerstat->fetch()){
                $ctitle = $certification['title'];
                $cinstitute = $certification['institute'];
                $ccompletion = $certification['completion'];
                $cresult = $certification['result'];
                $clink = $certification['link'];
            }
            else{
                $ctitle = "";
                $cinstitute = "";
                $ccompletion = "";
                $cresult = "";
                $clink = "";
            }
            ?>
            <div class="insertCertification">
                <input type="text" placeholder="Title" value="<?php echo$ctitle ?>" name="ctitle[]" class="title">
                <input type="text" placeholder="Institute" value="<?php echo$cinstitute ?>" name="cinstitute[]" class="institute">
                <input type="text" placeholder="Completion" value="<?php echo$ccompletion ?>" name="ccompletion[]" class="completion">
                <input type="text" placeholder="Result" value="<?php echo$cresult ?>" name="cresult[]" class="result">
                <input type="url" placeholder="Link" value="<?php echo$clink ?>" name="clink[]" class="link">
            </div>
            <?php
            if($certification = $cerstat->fetch()){
                $ctitle = $certification['title'];
                $cinstitute = $certification['institute'];
                $ccompletion = $certification['completion'];
                $cresult = $certification['result'];
                $clink = $certification['link'];
            }
            else{
                $ctitle = "";
                $cinstitute = "";
                $ccompletion = "";
                $cresult = "";
                $clink = "";
            }
            ?>
            <div class="insertCertification">
                <input type="text" placeholder="Title" value="<?php echo$ctitle ?>" name="ctitle[]" class="title">
                <input type="text" placeholder="Institute" value="<?php echo$cinstitute ?>" name="cinstitute[]" class="institute">
                <input type="text" placeholder="Completion" value="<?php echo$ccompletion ?>" name="ccompletion[]" class="completion">
                <input type="text" placeholder="Result" value="<?php echo$cresult ?>" name="cresult[]" class="result">
                <input type="url" placeholder="Link" value="<?php echo$clink ?>" name="clink[]" class="link">
            </div>
            <?php
            if($certification = $cerstat->fetch()){
                $ctitle = $certification['title'];
                $cinstitute = $certification['institute'];
                $ccompletion = $certification['completion'];
                $cresult = $certification['result'];
                $clink = $certification['link'];
            }
            else{
                $ctitle = "";
                $cinstitute = "";
                $ccompletion = "";
                $cresult = "";
                $clink = "";
            }
            ?>
            <div class="insertCertification">
                <input type="text" placeholder="Title" value="<?php echo$ctitle ?>" name="ctitle[]" class="title">
                <input type="text" placeholder="Institute" value="<?php echo$cinstitute ?>" name="cinstitute[]" class="institute">
                <input type="text" placeholder="Completion" value="<?php echo$ccompletion ?>" name="ccompletion[]" class="completion">
                <input type="text" placeholder="Result" value="<?php echo$cresult ?>" name="cresult[]" class="result">
                <input type="url" placeholder="Link" value="<?php echo$clink ?>" name="clink[]" class="link">
            </div>
            <?php
            if($certification = $cerstat->fetch()){
                $ctitle = $certification['title'];
                $cinstitute = $certification['institute'];
                $ccompletion = $certification['completion'];
                $cresult = $certification['result'];
                $clink = $certification['link'];
            }
            else{
                $ctitle = "";
                $cinstitute = "";
                $ccompletion = "";
                $cresult = "";
                $clink = "";
            }
            ?>
            <div class="insertCertification">
                <input type="text" placeholder="Title" value="<?php echo$ctitle ?>" name="ctitle[]" class="title">
                <input type="text" placeholder="Institute" value="<?php echo$cinstitute ?>" name="cinstitute[]" class="institute">
                <input type="text" placeholder="Completion" value="<?php echo$ccompletion ?>" name="ccompletion[]" class="completion">
                <input type="text" placeholder="Result" value="<?php echo$cresult ?>" name="cresult[]" class="result">
                <input type="url" placeholder="Link" value="<?php echo$clink ?>" name="clink[]" class="link">
            </div>
        </fieldset>
        <fieldset>
            <legend>Skills</legend>
            <div class="insert">
            <div class="insertSkill">
                <input type="text" value="<?php echo$skill ?>" name="skill[]" class="skill">
            </div>
            <?php
            if($skills = $sklstat->fetch()){
                $skill = $skills['name'];
            }
            else{
                $skill = "";
            }
            ?>
            <div class="insertSkill">
                <input type="text" value="<?php echo$skill ?>" name="skill[]" class="skill">
            </div>
            <?php
            if($skills = $sklstat->fetch()){
                $skill = $skills['name'];
            }
            else{
                $skill = "";
            }
            ?>
            <div class="insertSkill">
                <input type="text" value="<?php echo$skill ?>" name="skill[]" class="skill">
            </div>
            <?php
            if($skills = $sklstat->fetch()){
                $skill = $skills['name'];
            }
            else{
                $skill = "";
            }
            ?>
            <div class="insertSkill">
                <input type="text" value="<?php echo$skill ?>" name="skill[]" class="skill">
            </div>
            <?php
            if($skills = $sklstat->fetch()){
                $skill = $skills['name'];
            }
            else{
                $skill = "";
            }
            ?>
            <div class="insertSkill">
                <input type="text" value="<?php echo$skill ?>" name="skill[]" class="skill">
            </div>
            <?php
            if($skills = $sklstat->fetch()){
                $skill = $skills['name'];
            }
            else{
                $skill = "";
            }
            ?>
            <div class="insertSkill">
                <input type="text" value="<?php echo$skill ?>" name="skill[]" class="skill">
            </div>
            <?php
            if($skills = $sklstat->fetch()){
                $skill = $skills['name'];
            }
            else{
                $skill = "";
            }
            ?>
            <div class="insertSkill">
                <input type="text" value="<?php echo$skill ?>" name="skill[]" class="skill">
            </div>
            <?php
            if($skills = $sklstat->fetch()){
                $skill = $skills['name'];
            }
            else{
                $skill = "";
            }
            ?>
            <div class="insertSkill">
                <input type="text" value="<?php echo$skill ?>" name="skill[]" class="skill">
            </div>
            </div>
        </fieldset>
        <fieldset>
            <legend>Interests</legend>
            <div class="insert">
            <div class="insertInterest">
                <input type="text" value="<?php echo$interest ?>" name="interest[]" class="interest">
            </div>
            <?php
            if($interests = $intstat->fetch()){
                $interest = $interests['name'];
            }
            else{
                $interest = "";
            }
            ?>
            <div class="insertInterest">
                <input type="text" value="<?php echo$interest ?>" name="interest[]" class="interest">
            </div>
            <?php
            if($interests = $intstat->fetch()){
                $interest = $interests['name'];
            }
            else{
                $interest = "";
            }
            ?>
            <div class="insertInterest">
                <input type="text" value="<?php echo$interest ?>" name="interest[]" class="interest">
            </div>
            <?php
            if($interests = $intstat->fetch()){
                $interest = $interests['name'];
            }
            else{
                $interest = "";
            }
            ?>
            <div class="insertInterest">
                <input type="text" value="<?php echo$interest ?>" name="interest[]" class="interest">
            </div>
            <?php
            if($interests = $intstat->fetch()){
                $interest = $interests['name'];
            }
            else{
                $interest = "";
            }
            ?>
            <div class="insertInterest">
                <input type="text" value="<?php echo$interest ?>" name="interest[]" class="interest">
            </div>
            <?php
            if($interests = $intstat->fetch()){
                $interest = $interests['name'];
            }
            else{
                $interest = "";
            }
            ?>
            <div class="insertInterest">
                <input type="text" value="<?php echo$interest ?>" name="interest[]" class="interest">
            </div>
            <?php
            if($interests = $intstat->fetch()){
                $interest = $interests['name'];
            }
            else{
                $interest = "";
            }
            ?>
            <div class="insertInterest">
                <input type="text" value="<?php echo$interest ?>" name="interest[]" class="interest">
            </div>
            <?php
            if($interests = $intstat->fetch()){
                $interest = $interests['name'];
            }
            else{
                $interest = "";
            }
            ?>
            <div class="insertInterest">
                <input type="text" value="<?php echo$interest ?>" name="interest[]" class="interest">
            </div>
            </div>
        </fieldset>
        <fieldset>
            <legend>Languages</legend>
            <div class="insert">
            <div class="insertLang">
                <input type="text" value="<?php echo$lang ?>" name="language[]" class="Language">
            </div>
            <?php
            if($languages = $lanstat->fetch()){
                $lang = $languages['name'];
            }
            else{
                $lang = "";
            }
            ?>
            <div class="insertLang">
                <input type="text" value="<?php echo$lang ?>" name="language[]" class="Language">
            </div>
            <?php
            if($languages = $lanstat->fetch()){
                $lang = $languages['name'];
            }
            else{
                $lang = "";
            }
            ?>
            <div class="insertLang">
                <input type="text" value="<?php echo$lang ?>" name="language[]" class="Language">
            </div>
            <?php
            if($languages = $lanstat->fetch()){
                $lang = $languages['name'];
            }
            else{
                $lang = "";
            }
            ?>
            <div class="insertLang">
                <input type="text" value="<?php echo$lang ?>" name="language[]" class="Language">
            </div>
            <?php
            if($languages = $lanstat->fetch()){
                $lang = $languages['name'];
            }
            else{
                $lang = "";
            }
            ?>
            <div class="insertLang">
                <input type="text" value="<?php echo$lang ?>" name="language[]" class="Language">
            </div>
            <?php
            if($languages = $lanstat->fetch()){
                $lang = $languages['name'];
            }
            else{
                $lang = "";
            }
            ?>
            <div class="insertLang">
                <input type="text" value="<?php echo$lang ?>" name="language[]" class="Language">
            </div>
            <?php
            if($languages = $lanstat->fetch()){
                $lang = $languages['name'];
            }
            else{
                $lang = "";
            }
            ?>
            <div class="insertLang">
                <input type="text" value="<?php echo$lang ?>" name="language[]" class="Language">
            </div>
            <?php
            if($languages = $lanstat->fetch()){
                $lang = $languages['name'];
            }
            else{
                $lang = "";
            }
            ?>
            <div class="insertLang">
                <input type="text" value="<?php echo$lang ?>" name="language[]" class="Language">
            </div>
            </div>
        </fieldset>
        <fieldset>
            <legend>Hobbies</legend>
            <div class="insert">
            <div class="insertHobby">
                <input type="text" value="<?php echo$hobby ?>" name="hobby[]" class="hobby">
            </div>
            <?php
            if($hobbies = $hobstat->fetch()){
                $hobby = $hobbies['name'];
            }
            else{
                $hobby = "";
            }
            ?>
            <div class="insertHobby">
                <input type="text" value="<?php echo$hobby ?>" name="hobby[]" class="hobby">
            </div>
            <?php
            if($hobbies = $hobstat->fetch()){
                $hobby = $hobbies['name'];
            }
            else{
                $hobby = "";
            }
            ?>
            <div class="insertHobby">
                <input type="text" value="<?php echo$hobby ?>" name="hobby[]" class="hobby">
            </div>
            <?php
            if($hobbies = $hobstat->fetch()){
                $hobby = $hobbies['name'];
            }
            else{
                $hobby = "";
            }
            ?>
            <div class="insertHobby">
                <input type="text" value="<?php echo$hobby ?>" name="hobby[]" class="hobby">
            </div>
            <?php
            if($hobbies = $hobstat->fetch()){
                $hobby = $hobbies['name'];
            }
            else{
                $hobby = "";
            }
            ?>
            <div class="insertHobby">
                <input type="text" value="<?php echo$hobby ?>" name="hobby[]" class="hobby">
            </div>
            <?php
            if($hobbies = $hobstat->fetch()){
                $hobby = $hobbies['name'];
            }
            else{
                $hobby = "";
            }
            ?>
            <div class="insertHobby">
                <input type="text" value="<?php echo$hobby ?>" name="hobby[]" class="hobby">
            </div>
            <?php
            if($hobbies = $hobstat->fetch()){
                $hobby = $hobbies['name'];
            }
            else{
                $hobby = "";
            }
            ?>
            <div class="insertHobby">
                <input type="text" value="<?php echo$hobby ?>" name="hobby[]" class="hobby">
            </div>
            <?php
            if($hobbies = $hobstat->fetch()){
                $hobby = $hobbies['name'];
            }
            else{
                $hobby = "";
            }
            ?>
            <div class="insertHobby">
                <input type="text" value="<?php echo$hobby ?>" name="hobby[]" class="hobby">
            </div>
            </div>
        </fieldset>
        <fieldset>
            <legend>References</legend>
            <div class="insertReference">
                <input type="text" placeholder="Name" value="<?php echo$rname ?>" name="name[]" class="name">
                <input type="text" placeholder="Designation" value="<?php echo$designation ?>" name="designation[]" class="designation">
                <input type="text" placeholder="Phone" value="<?php echo$rphone ?>" name="rphone[]" class="phone">
            </div>
            <?php
            if($references = $refstat->fetch()){
                $rname = $references['name'];
                $designation = $references['designation'];
                $rphone = $references['phone'];
            }
            else{
                $rname = "";
                $designation = "";
                $rphone = "";
            }
            ?>
            <div class="insertReference">
                <input type="text" placeholder="Name" value="<?php echo$rname ?>" name="name[]" class="name">
                <input type="text" placeholder="Designation" value="<?php echo$designation ?>" name="designation[]" class="designation">
                <input type="text" placeholder="Phone" value="<?php echo$rphone ?>" name="rphone[]" class="phone">
            </div>
            
        </fieldset>
        <div class="buttons">
            <input type="submit" value="Submit">
            <input type="reset" value="Clear">
        </div>
    </form>
    <script src="formvalid.js" lang="javascript"></script>
                                            <?php
                                            include_once('footer.php');
                                            die();
                                        }
                                    }
                                }
                                }
                            }
                        }
                    }
                }
            }
        }
            ?>
    <form id="ff" method="POST" enctype="multipart/form-data" action="action.php">
        <fieldset>
            <legend>Personal Information</legend>
            <div class="pflex">
            <div class="pgrid">
            <label for="fname">First Name</label>
            <input type="text" name="fname" id="fname">
            </div>
            <div class="pgrid">
            <label for="lname">Last Name</label>
            <input type="text" name="lname" id="lname">
            </div>
            <div class="pgrid">
            <label for="about">About</label>
            <input type="text" name="about" id="about">
            </div>
            <div class="pgrid">
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
            </div>
            <div class="pgrid">            
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone">
            </div>
            <div class="pgrid">
            <label for="image">Picture</label>
            <input type="file" name="image" id="image">
            </div>
        </div>
        </fieldset>
        <fieldset>
            <legend>Profile</legend>
            <div class="pgrid">
            <label for="profile">Describe About Yourself</label>
            <textarea name="profile" id="profile" rows="1"></textarea>
            </div>
        </fieldset>
        <fieldset>
            <legend>Objective</legend>
            <div class="pgrid">
            <label for="objective">Describe Objective</label>
            <textarea name="objective" id="objective" rows="1"></textarea>
            </div>
        </fieldset>
        <fieldset>
            <legend>Education</legend>
            <div class="insertEducation">
                <input type="text" placeholder="Title" name="dtitle[]" class="title">
                <input type="text" placeholder="Institute" name="dinstitute[]" class="institute">
                <input type="text" placeholder="Completion" name="dcompletion[]" class="completion">
                <input type="text" placeholder="Result" name="dresult[]" class="result">
            </div>
            <div class="insertEducation">
                <input type="text" placeholder="Title" name="dtitle[]" class="title">
                <input type="text" placeholder="Institute" name="dinstitute[]" class="institute">
                <input type="text" placeholder="Completion" name="dcompletion[]" class="completion">
                <input type="text" placeholder="Result" name="dresult[]" class="result">
            </div>
            <div class="insertEducation">
                <input type="text" placeholder="Title" name="dtitle[]" class="title">
                <input type="text" placeholder="Institute" name="dinstitute[]" class="institute">
                <input type="text" placeholder="Completion" name="dcompletion[]" class="completion">
                <input type="text" placeholder="Result" name="dresult[]" class="result">
            </div>
            <div class="insertEducation">
                <input type="text" placeholder="Title" name="dtitle[]" class="title">
                <input type="text" placeholder="Institute" name="dinstitute[]" class="institute">
                <input type="text" placeholder="Completion" name="dcompletion[]" class="completion">
                <input type="text" placeholder="Result" name="dresult[]" class="result">
            </div>
            <div class="insertEducation">
                <input type="text" placeholder="Title" name="dtitle[]" class="title">
                <input type="text" placeholder="Institute" name="dinstitute[]" class="institute">
                <input type="text" placeholder="Completion" name="dcompletion[]" class="completion">
                <input type="text" placeholder="Result" name="dresult[]" class="result">
            </div>
        </fieldset>
        <fieldset>
            <legend>Experience</legend>
            <div class="insertExperience">
                <input type="text" placeholder="Title" name="etitle[]" class="title">
                <input type="url" placeholder="Link" name="elink[]" class="link">
            </div>
            <div class="insertExperience">
                <input type="text" placeholder="Title" name="etitle[]" class="title">
                <input type="url" placeholder="Link" name="elink[]" class="link">
            </div>
            <div class="insertExperience">
                <input type="text" placeholder="Title" name="etitle[]" class="title">
                <input type="url" placeholder="Link" name="elink[]" class="link">
            </div>
            <div class="insertExperience">
                <input type="text" placeholder="Title" name="etitle[]" class="title">
                <input type="url" placeholder="Link" name="elink[]" class="link">
            </div>
            <div class="insertExperience">
                <input type="text" placeholder="Title" name="etitle[]" class="title">
                <input type="url" placeholder="Link" name="elink[]" class="link">
            </div>
            <div class="insertExperience">
                <input type="text" placeholder="Title" name="etitle[]" class="title">
                <input type="url" placeholder="Link" name="elink[]" class="link">
            </div>
        </fieldset>
        <fieldset>
            <legend>Certifications</legend>
            <div class="insertCertification">
                <input type="text" placeholder="Title" name="ctitle[]" class="title">
                <input type="text" placeholder="Institute" name="cinstitute[]" class="institute">
                <input type="text" placeholder="Completion" name="ccompletion[]" class="completion">
                <input type="text" placeholder="Result" name="cresult[]" class="result">
                <input type="url" placeholder="Link" name="clink[]" class="link">
            </div>
            <div class="insertCertification">
                <input type="text" placeholder="Title" name="ctitle[]" class="title">
                <input type="text" placeholder="Institute" name="cinstitute[]" class="institute">
                <input type="text" placeholder="Completion" name="ccompletion[]" class="completion">
                <input type="text" placeholder="Result" name="cresult[]" class="result">
                <input type="url" placeholder="Link" name="clink[]" class="link">
            </div>
            <div class="insertCertification">
                <input type="text" placeholder="Title" name="ctitle[]" class="title">
                <input type="text" placeholder="Institute" name="cinstitute[]" class="institute">
                <input type="text" placeholder="Completion" name="ccompletion[]" class="completion">
                <input type="text" placeholder="Result" name="cresult[]" class="result">
                <input type="url" placeholder="Link" name="clink[]" class="link">
            </div>
            <div class="insertCertification">
                <input type="text" placeholder="Title" name="ctitle[]" class="title">
                <input type="text" placeholder="Institute" name="cinstitute[]" class="institute">
                <input type="text" placeholder="Completion" name="ccompletion[]" class="completion">
                <input type="text" placeholder="Result" name="cresult[]" class="result">
                <input type="url" placeholder="Link" name="clink[]" class="link">
            </div>
            <div class="insertCertification">
                <input type="text" placeholder="Title" name="ctitle[]" class="title">
                <input type="text" placeholder="Institute" name="cinstitute[]" class="institute">
                <input type="text" placeholder="Completion" name="ccompletion[]" class="completion">
                <input type="text" placeholder="Result" name="cresult[]" class="result">
                <input type="url" placeholder="Link" name="clink[]" class="link">
            </div>
        </fieldset>
        <fieldset>
            <legend>Skills</legend>
            <div class="insert">
            <div class="insertSkill">
                <input type="text" name="skill[]" class="skill">
            </div>
            <div class="insertSkill">
                <input type="text" name="skill[]" class="skill">
            </div>
            <div class="insertSkill">
                <input type="text" name="skill[]" class="skill">
            </div>
            <div class="insertSkill">
                <input type="text" name="skill[]" class="skill">
            </div>
            <div class="insertSkill">
                <input type="text" name="skill[]" class="skill">
            </div>
            <div class="insertSkill">
                <input type="text" name="skill[]" class="skill">
            </div>
            <div class="insertSkill">
                <input type="text" name="skill[]" class="skill">
            </div>
            <div class="insertSkill">
                <input type="text" name="skill[]" class="skill">
            </div>
            </div>
        </fieldset>
        <fieldset>
            <legend>Interests</legend>
            <div class="insert">
            <div class="insertInterest">
                <input type="text" name="interest[]" class="interest">
            </div>
            <div class="insertInterest">
                <input type="text" name="interest[]" class="interest">
            </div>
            <div class="insertInterest">
                <input type="text" name="interest[]" class="interest">
            </div>
            <div class="insertInterest">
                <input type="text" name="interest[]" class="interest">
            </div>
            <div class="insertInterest">
                <input type="text" name="interest[]" class="interest">
            </div>
            <div class="insertInterest">
                <input type="text" name="interest[]" class="interest">
            </div>
            <div class="insertInterest">
                <input type="text" name="interest[]" class="interest">
            </div>
            <div class="insertInterest">
                <input type="text" name="interest[]" class="interest">
            </div>
            </div>
        </fieldset>
        <fieldset>
            <legend>Languages</legend>
            <div class="insert">
            <div class="insertLang">
                <input type="text" name="language[]" class="Language">
            </div>
            <div class="insertLang">
                <input type="text" name="language[]" class="Language">
            </div>
            <div class="insertLang">
                <input type="text" name="language[]" class="Language">
            </div>
            <div class="insertLang">
                <input type="text" name="language[]" class="Language">
            </div>
            <div class="insertLang">
                <input type="text" name="language[]" class="Language">
            </div>
            <div class="insertLang">
                <input type="text" name="language[]" class="Language">
            </div>
            <div class="insertLang">
                <input type="text" name="language[]" class="Language">
            </div>
            <div class="insertLang">
                <input type="text" name="language[]" class="Language">
            </div>
            </div>
        </fieldset>
        <fieldset>
            <legend>Hobbies</legend>
            <div class="insert">
            <div class="insertHobby">
                <input type="text" name="hobby[]" class="hobby">
            </div>
            <div class="insertHobby">
                <input type="text" name="hobby[]" class="hobby">
            </div>
            <div class="insertHobby">
                <input type="text" name="hobby[]" class="hobby">
            </div>
            <div class="insertHobby">
                <input type="text" name="hobby[]" class="hobby">
            </div>
            <div class="insertHobby">
                <input type="text" name="hobby[]" class="hobby">
            </div>
            <div class="insertHobby">
                <input type="text" name="hobby[]" class="hobby">
            </div>
            <div class="insertHobby">
                <input type="text" name="hobby[]" class="hobby">
            </div>
            <div class="insertHobby">
                <input type="text" name="hobby[]" class="hobby">
            </div>
            </div>
        </fieldset>
        <fieldset>
            <legend>References</legend>
            <div class="insertReference">
                <input type="text" placeholder="Name" name="name[]" class="name">
                <input type="text" placeholder="Designation" name="designation[]" class="designation">
                <input type="text" placeholder="Phone" name="rphone[]" class="phone">
            </div>
            <div class="insertReference">
                <input type="text" placeholder="Name" name="name[]" class="name">
                <input type="text" placeholder="Designation" name="designation[]" class="designation">
                <input type="text" placeholder="Phone" name="rphone[]" class="phone">
            </div>
        </fieldset>
        <div class="buttons">
            <input type="submit" value="Submit">
            <input type="reset" value="Clear">
        </div>
    </form>
    <?php
}catch (PDOException $e) {
    die($e->getmessage());
}
    include_once('footer.php');
    ?>
    <script src="formvalid.js" lang="javascript"></script>
</body>
</html>