<?php
    require_once('config.inc.php');
    include_once('header.php');
    $conn_str = DB_SYS.':host='.DB_HOST.';dbname='.DB_NAME;
    try {
        $pdo = new PDO($conn_str,DB_USER,DB_PASS);
    if(isset($_SESSION['id'])){
        $id = $_SESSION['id'];
    }
    else{
        redirect("index.php");
    }
    if(isset($_POST['fname'])){
        $namePattern = '/^([a-zA-Z\s]){3,30}$/';
        $fnamePattern = '/^([a-zA-Z]){3,10}$/';
        $lnamePattern = '/^([a-zA-Z\s]){3,20}$/';
        $aboutPattern = '/^([a-zA-Z\s\'\.\!]){5,50}$/';
        $profilePattern = '/^([a-zA-Z\s\'\-\,\.\!]){100,350}$/';
        $objectivePattern = '/^([a-zA-Z\s\'\-\,\.\!]){75,250}$/';
        $titleInstitutePattern = '/^([a-zA-Z\s\'\&\.\,\-\(\)]){5,100}$/';
        $completionPattern = '/^([a-zA-Z0-9\-\,]){5,10}$/';
        $resultPattern = '/^([0-9\/\(\)\%]){5,10}$/';
        $linkPattern = '/^(https\:\/\/|http\:\/\/)([^\.@\s]+)(\.[^\.@\s]+)+$/';
        $skillPattern = '/^([0-9a-zA-Z\+\s]){3,50}$/';
        $passPattern = '/^([a-zA-Z0-9\!\@\#\$\%\^\&\*\<\>]){8,15}$/';
        $emailPattern = '/^[^@\s]+@([^\.@\s]+)(\.[^\.@\s]+)+$/';
        $phonePattern = '/^(\+923|00923|03)[0-4][0-9]\-?\d{7}$/';
        
        $fname = $_POST['fname'];
        if(!preg_match($fnamePattern,$fname)){
            redirect('form.php');
        }
        $fname = filter_var($fname, FILTER_SANITIZE_SPECIAL_CHARS);
        $lname = $_POST['lname'];
        if(!preg_match($lnamePattern,$lname)){
            redirect('form.php');
        }
        $lname = filter_var($lname, FILTER_SANITIZE_SPECIAL_CHARS);
        $about = $_POST['about'];
        if(!preg_match($aboutPattern,$about)){
            redirect('form.php');
        }
        $about = filter_var($about, FILTER_SANITIZE_SPECIAL_CHARS);
        $email = $_POST['email'];
        if(!preg_match($emailPattern,$email)){
            redirect('form.php');
        }
        $email = filter_var($email, FILTER_SANITIZE_SPECIAL_CHARS);
        $phone = $_POST['phone'];
        if(!preg_match($phonePattern,$phone)){
            redirect('form.php');
        }
        $phone = filter_var($phone, FILTER_SANITIZE_SPECIAL_CHARS);
        $profile = $_POST['profile'];
        if(!preg_match($profilePattern,$profile)){
            redirect('form.php');
        }
        $profile = filter_var($profile, FILTER_SANITIZE_SPECIAL_CHARS);
        $objective = $_POST['objective'];
        if(!preg_match($objectivePattern,$objective)){
            redirect('form.php');
        }
        $objective = filter_var($objective, FILTER_SANITIZE_SPECIAL_CHARS);
        $dtitle = $_POST['dtitle'];
        $dinstitute = $_POST['dinstitute'];
        $dcompletion = $_POST['dcompletion'];
        $dresult = $_POST['dresult'];
        foreach($dtitle as $i=>$t){
            $title = $dtitle[$i];
            $institute = $dinstitute[$i];
            $completion = $dcompletion[$i];
            $result = $dresult[$i];
            if($title=="" || $institute=="" || $completion=="" || $result==""){
                break;
            }
            if(!preg_match($titleInstitutePattern,$title)){
                redirect('form.php');
            }
            if(!preg_match($titleInstitutePattern,$institute)){
                redirect('form.php');
            }
            if(!preg_match($completionPattern,$completion)){
                redirect('form.php');
            }
            if(!preg_match($resultPattern,$result)){
                redirect('form.php');
            }
        }
        $etitle = $_POST['etitle'];
        $elink = $_POST['elink'];
        foreach($etitle as $i=>$t){
            $title = $etitle[$i];
            $link = $elink[$i];
            if($title=="" || $link==""){
                break;
            }
            if(!preg_match($titleInstitutePattern,$title)){
                redirect('form.php');
            }
            if(!preg_match($linkPattern,$link)){
                redirect('form.php');
            }
        }
        $ctitle = $_POST['ctitle'];
        $cinstitute = $_POST['cinstitute'];
        $ccompletion = $_POST['ccompletion'];
        $cresult = $_POST['cresult'];
        $clink = $_POST['clink'];
        foreach($ctitle as $i=>$t){
            $title = $ctitle[$i];
            $institute = $cinstitute[$i];
            $completion = $ccompletion[$i];
            $result = $cresult[$i];
            $link = $clink[$i];
            if($title=="" || $institute=="" || $completion=="" || $result=="" || $link==""){
                break;
            }
            if(!preg_match($titleInstitutePattern,$title)){
                redirect('form.php');
            }
            if(!preg_match($titleInstitutePattern,$institute)){
                redirect('form.php');
            }
            if(!preg_match($completionPattern,$completion)){
                redirect('form.php');
            }
            if(!preg_match($resultPattern,$result)){
                redirect('form.php');
            }
            if(!preg_match($linkPattern,$link)){
                redirect('form.php');
            }
        }
        $skill = $_POST['skill'];
        foreach($skill as $s){
            if($s==""){
                break;
            }
            if(!preg_match($skillPattern,$s)){
                redirect('form.php');
            }
        }
        $interest = $_POST['interest'];
        foreach($interest as $i){
            if($i==""){
                break;
            }
            if(!preg_match($skillPattern,$i)){
                redirect('form.php');
            }
        }
        $language = $_POST['language'];
        foreach($language as $l){
            if($l==""){
                break;
            }
            if(!preg_match($skillPattern,$l)){
                redirect('form.php');
            }
        }
        $hobby = $_POST['hobby'];
        foreach($hobby as $h){
            if($h==""){
                break;
            }
            if(!preg_match($skillPattern,$h)){
                redirect('form.php');
            }
        }
        $name = $_POST['name'];
        $designation = $_POST['designation'];
        $rphone = $_POST['rphone'];
        foreach($name as $i=>$n){
            $desig = $designation[$i];
            $ph = $rphone[$i];
            if($n==""||$desig==""||$ph==""){
                break;
            }
            if(!preg_match($namePattern,$n)){
                redirect('form.php');
            }
            if(!preg_match($titleInstitutePattern,$desig)){
                redirect('form.php');
            }
            if(!preg_match($phonePattern,$ph)){
                redirect('form.php');
            }
        }
        if(isset($_FILES['image'])){
            $filename = $_FILES['image']['name'];
            $filetype = $_FILES['image']['type'];
            $filesize = $_FILES['image']['size'];
            $tmpname = $_FILES['image']['tmp_name'];
            $pattern = '/^image/';
            if($filename!=""&&$filetype!=""&&$filesize!=""&&$tmpname!=""){
                $uploadedfile = "images/{$id}_{$filename}";
                if(!preg_match($pattern,$filetype)){
                    redirect("form.php");
                }
                move_uploaded_file($tmpname, $uploadedfile);
            }
            else{
                $sql = "SELECT * FROM image WHERE id=:id";
                $stat = $pdo->prepare($sql);
                $stat->bindValue(":id",$id);
                $stat->execute();
                if($img = $stat->fetch()){
                    $uploadedfile = $img['path'];
                }
                else{
                    $uploadedfile = "images/Placeholder-Male.png";
                }
            }
        }
        else{
            $sql = "SELECT * FROM image WHERE id=:id";
            $stat = $pdo->prepare($sql);
            $stat->bindValue(":id",$id);
            $stat->execute();
            if($img = $stat->fetch()){
                $uploadedfile = $img['path'];
            }
            else{
                $uploadedfile = "images/Placeholder-Male.png";
            }
        }
        $sql = "DELETE FROM name WHERE id=:id";
        $stat = $pdo->prepare($sql);
        $stat->bindValue(":id",$id);
        $stat->execute();
        $sql = "INSERT INTO name(id, fName, lName) VALUES (:id, :fname, :lname)";
        $stat = $pdo->prepare($sql);
        $stat->bindValue(":id",$id);
        $stat->bindValue(":fname",$fname);
        $stat->bindValue(":lname",$lname);
        $stat->execute();
        $sql = "DELETE FROM image WHERE id=:id";
        $stat = $pdo->prepare($sql);
        $stat->bindValue(":id",$id);
        $stat->execute();
        $sql = "INSERT INTO image(id, path) VALUES (:id, :path)";
        $stat = $pdo->prepare($sql);
        $stat->bindValue(":id",$id);
        $stat->bindValue(":path",$uploadedfile);
        $stat->execute();
        $sql = "DELETE FROM personal WHERE id=:id";
        $stat = $pdo->prepare($sql);
        $stat->bindValue(":id",$id);
        $stat->execute();
        $sql = "INSERT INTO personal(id, about, emailid, phone, profile, objective) VALUES (:id, :about, :email, :phone, :profile, :objective)";
        $stat = $pdo->prepare($sql);
        $stat->bindValue(":id",$id);
        $stat->bindValue(":about",$about);
        $stat->bindValue(":email",$email);
        $stat->bindValue(":phone",$phone);
        $stat->bindValue(":profile",$profile);
        $stat->bindValue(":objective",$objective);
        $stat->execute();
        $sql = "DELETE FROM education WHERE id=:id";
            $stat = $pdo->prepare($sql);
            $stat->bindValue(":id",$id);
            $stat->execute();
        foreach($dtitle as $i=>$t){
            $title = $dtitle[$i];
            $institute = $dinstitute[$i];
            $completion = $dcompletion[$i];
            $result = $dresult[$i];
            if($title=="" || $institute=="" || $completion=="" || $result==""){
                break;
            }
            $sql = "INSERT INTO education(id, title, institute, completion, result) VALUES (:id, :title, :institute, :completion, :result)";
            $stat = $pdo->prepare($sql);
            $stat->bindValue(":id",$id);
            $title = filter_var($title, FILTER_SANITIZE_SPECIAL_CHARS);
            $institute = filter_var($institute, FILTER_SANITIZE_SPECIAL_CHARS);
            $completion = filter_var($completion, FILTER_SANITIZE_SPECIAL_CHARS);
            $result = filter_var($result, FILTER_SANITIZE_SPECIAL_CHARS);
            $stat->bindValue(":title",$title);
            $stat->bindValue(":institute",$institute);
            $stat->bindValue(":completion",$completion);
            $stat->bindValue(":result",$result);
            $stat->execute();
        }
        $sql = "DELETE FROM experience WHERE id=:id";
        $stat = $pdo->prepare($sql);
        $stat->bindValue(":id",$id);
        $stat->execute();
        foreach($etitle as $i=>$t){
            $title = $etitle[$i];
            $link = $elink[$i];
            if($title=="" || $link==""){
                break;
            }
            $sql = "INSERT INTO experience(id, title, link) VALUES (:id, :title, :link)";
            $stat = $pdo->prepare($sql);
            $stat->bindValue(":id",$id);
            $title = filter_var($title, FILTER_SANITIZE_SPECIAL_CHARS);
            $link = filter_var($link, FILTER_SANITIZE_SPECIAL_CHARS);
            $stat->bindValue(":title",$title);
            $stat->bindValue(":link",$link);
            $stat->execute();
        }
        $sql = "DELETE FROM certifications WHERE id=:id";
        $stat = $pdo->prepare($sql);
        $stat->bindValue(":id",$id);
        $stat->execute();
        foreach($ctitle as $i=>$t){
            $title = $ctitle[$i];
            $institute = $cinstitute[$i];
            $completion = $ccompletion[$i];
            $result = $cresult[$i];
            $link = $clink[$i];
            if($title=="" || $institute=="" || $completion=="" || $result=="" || $link==""){
                break;
            }
            $sql = "INSERT INTO certifications(id, title, institute, completion, result, link) VALUES (:id, :title, :institute, :completion, :result, :link)";
            $stat = $pdo->prepare($sql);
            $stat->bindValue(":id",$id);
            $title = filter_var($title, FILTER_SANITIZE_SPECIAL_CHARS);
            $institute = filter_var($institute, FILTER_SANITIZE_SPECIAL_CHARS);
            $completion = filter_var($completion, FILTER_SANITIZE_SPECIAL_CHARS);
            $result = filter_var($result, FILTER_SANITIZE_SPECIAL_CHARS);
            $link = filter_var($link, FILTER_SANITIZE_SPECIAL_CHARS);
            $stat->bindValue(":title",$title);
            $stat->bindValue(":institute",$institute);
            $stat->bindValue(":completion",$completion);
            $stat->bindValue(":result",$result);
            $stat->bindValue(":link",$link);
            $stat->execute();
        }
        $sql = "DELETE FROM skills WHERE id=:id";
        $stat = $pdo->prepare($sql);
        $stat->bindValue(":id",$id);
        $stat->execute();
        foreach($skill as $s){
            if($s==""){
                break;
            }
            $sql = "INSERT INTO skills(id, name) VALUES (:id, :name)";
            $stat = $pdo->prepare($sql);
            $stat->bindValue(":id",$id);
            $s = filter_var($s, FILTER_SANITIZE_SPECIAL_CHARS);
            $stat->bindValue(":name",$s);
            $stat->execute();
        }
        $sql = "DELETE FROM languages WHERE id=:id";
        $stat = $pdo->prepare($sql);
        $stat->bindValue(":id",$id);
        $stat->execute();
        foreach($language as $l){
            if($l==""){
                break;
            }
            $sql = "INSERT INTO languages(id, name) VALUES (:id, :name)";
            $stat = $pdo->prepare($sql);
            $stat->bindValue(":id",$id);
            $l = filter_var($l, FILTER_SANITIZE_SPECIAL_CHARS);
            $stat->bindValue(":name",$l);
            $stat->execute();
        }
        $sql = "DELETE FROM interests WHERE id=:id";
        $stat = $pdo->prepare($sql);
        $stat->bindValue(":id",$id);
        $stat->execute();
        foreach($interest as $i){
            if($i==""){
                break;
            }
            $sql = "INSERT INTO interests(id, name) VALUES (:id, :name)";
            $stat = $pdo->prepare($sql);
            $stat->bindValue(":id",$id);
            $i = filter_var($i, FILTER_SANITIZE_SPECIAL_CHARS);
            $stat->bindValue(":name",$i);
            $stat->execute();
        }
        $sql = "DELETE FROM hobbies WHERE id=:id";
        $stat = $pdo->prepare($sql);
        $stat->bindValue(":id",$id);
        $stat->execute();
        foreach($hobby as $h){
            if($h==""){
                break;
            }
            $sql = "INSERT INTO hobbies(id, name) VALUES (:id, :name)";
            $stat = $pdo->prepare($sql);
            $stat->bindValue(":id",$id);
            $h = filter_var($h, FILTER_SANITIZE_SPECIAL_CHARS);
            $stat->bindValue(":name",$h);
            $stat->execute();
        }
        $sql = "DELETE FROM referencedetails WHERE id=:id";
        $stat = $pdo->prepare($sql);
        $stat->bindValue(":id",$id);
        $stat->execute();
        foreach($name as $i=>$n){
            $desig = $designation[$i];
            $phone = $rphone[$i];
            if($n==""||$desig==""||$phone==""){
                break;
            }
            $sql = "INSERT INTO referencedetails(id, name, designation, phone) VALUES (:id, :name, :designation, :phone)";
            $stat = $pdo->prepare($sql);
            $stat->bindValue(":id",$id);
            $n = filter_var($n, FILTER_SANITIZE_SPECIAL_CHARS);
            $desig = filter_var($desig, FILTER_SANITIZE_SPECIAL_CHARS);
            $phone = filter_var($phone, FILTER_SANITIZE_SPECIAL_CHARS);
            $stat->bindValue(":name",$n);
            $stat->bindValue(":designation",$desig);
            $stat->bindValue(":phone",$phone);
            $stat->execute();
        }
        $loc = "showpage.php?id={$id}";
        redirect($loc);
    }
    else{
        redirect("form.php");
    }
}catch (PDOException $e) {
    die($e->getmessage());
}
?>