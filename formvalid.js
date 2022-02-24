let fnameNode = document.getElementById('fname');
let xhr = new XMLHttpRequest();
fnameNode.addEventListener('change', (e) => {
    let fname = e.target.value;
    xhr.open('GET','validate.php?input='+fname+'&type=fname',true);
    xhr.send();
    xhr.onreadystatechange = receivefnameData;
});
fnameNode.addEventListener('click', (e) => {
    fnameNode.classList.remove("error");
});
function receivefnameData() {
    if (xhr.readyState == XMLHttpRequest.DONE) {
        if(xhr.responseText == "InValid!"){
            fnameNode.className="error";
        }
    }
}
let lnameNode = document.getElementById('lname');
lnameNode.addEventListener('change', (e) => {
    let lname = e.target.value;
    xhr.open('GET','validate.php?input='+lname+'&type=lname',true);
    xhr.send();
    xhr.onreadystatechange = receivelnameData;
});
lnameNode.addEventListener('click', (e) => {
    lnameNode.classList.remove("error");
});
function receivelnameData() {
    if (xhr.readyState == XMLHttpRequest.DONE) {
        if(xhr.responseText == "InValid!"){
            lnameNode.className="error";
        }
    }
}
let aboutNode = document.getElementById('about');
aboutNode.addEventListener('change', (e) => {
    let about = e.target.value;
    xhr.open('GET','validate.php?input='+about+'&type=about',true);
    xhr.send();
    xhr.onreadystatechange = receiveaboutData;
});
aboutNode.addEventListener('click', (e) => {
    aboutNode.classList.remove("error");
});
function receiveaboutData() {
    if (xhr.readyState == XMLHttpRequest.DONE) {
        if(xhr.responseText == "InValid!"){
            aboutNode.className="error";
        }
    }
}
let emailNode = document.getElementById('email');
emailNode.addEventListener('change', (e) => {
    let email = e.target.value;
    xhr.open('GET','validate.php?input='+email+'&type=email',true);
    xhr.send();
    xhr.onreadystatechange = receiveemailData;
});
emailNode.addEventListener('click', (e) => {
    emailNode.classList.remove("error");
});
function receiveemailData() {
    if (xhr.readyState == XMLHttpRequest.DONE) {
        if(xhr.responseText == "InValid!"){
            emailNode.className="error";
        }
    }
}
let phoneNode = document.getElementById('phone');
phoneNode.addEventListener('change', (e) => {
    let phone = e.target.value;
    xhr.open('GET','validate.php?input='+phone+'&type=mobile',true);
    xhr.send();
    xhr.onreadystatechange = receivephoneData;
});
phoneNode.addEventListener('click', (e) => {
    phoneNode.classList.remove("error");
});
function receivephoneData() {
    if (xhr.readyState == XMLHttpRequest.DONE) {
        if(xhr.responseText == "InValid!"){
            phoneNode.className="error";
        }
    }
}
let profileNode = document.getElementById('profile');
profileNode.addEventListener('change', (e) => {
    let profile = e.target.value;
    xhr.open('GET','validate.php?input='+profile+'&type=profile',true);
    xhr.send();
    xhr.onreadystatechange = receiveprofileData;
});
profileNode.addEventListener('click', (e) => {
    profileNode.classList.remove("error");
});
function receiveprofileData() {
    if (xhr.readyState == XMLHttpRequest.DONE) {
        if(xhr.responseText == "InValid!"){
            profileNode.className="error";
        }
    }
}
let objectiveNode = document.getElementById('objective');
objectiveNode.addEventListener('change', (e) => {
    let objective = e.target.value;
    xhr.open('GET','validate.php?input='+objective+'&type=objective',true);
    xhr.send();
    xhr.onreadystatechange = receiveobjectiveData;
});
objectiveNode.addEventListener('click', (e) => {
    objectiveNode.classList.remove("error");
});
function receiveobjectiveData() {
    if (xhr.readyState == XMLHttpRequest.DONE) {
        if(xhr.responseText == "InValid!"){
            objectiveNode.className="error";
        }
    }
}
let titleNode = document.getElementsByClassName('title');
for(let t of titleNode){
    t.addEventListener('change', (e) => {
        let title = e.target.value;
        xhr.open('GET','validate.php?input='+title+'&type=title',true);
        xhr.send();
        xhr.onreadystatechange = receivetitleData;
    });
    t.addEventListener('click', (e) => {
        t.classList.remove("error");
    });
    function receivetitleData() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if(xhr.responseText == "InValid!"){
                t.className="error";
            }
        }
    }
}
let instituteNode = document.getElementsByClassName('institute');
for(let t of instituteNode){
    t.addEventListener('change', (e) => {
        let institute = e.target.value;
        xhr.open('GET','validate.php?input='+institute+'&type=institute',true);
        xhr.send();
        xhr.onreadystatechange = receiveinstituteData;
    });
    t.addEventListener('click', (e) => {
        t.classList.remove("error");
    });
    function receiveinstituteData() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if(xhr.responseText == "InValid!"){
                t.className="error";
            }
        }
    }
}
let completionNode = document.getElementsByClassName('completion');
for(let t of completionNode){
    t.addEventListener('change', (e) => {
        let completion = e.target.value;
        xhr.open('GET','validate.php?input='+completion+'&type=completion',true);
        xhr.send();
        xhr.onreadystatechange = receivecompletionData;
    });
    t.addEventListener('click', (e) => {
        t.classList.remove("error");
    });
    function receivecompletionData() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if(xhr.responseText == "InValid!"){
                t.className="error";
            }
        }
    }
}
let resultNode = document.getElementsByClassName('result');
for(let t of resultNode){
    t.addEventListener('change', (e) => {
        let result = e.target.value;
        xhr.open('GET','validate.php?input='+result+'&type=result',true);
        xhr.send();
        xhr.onreadystatechange = receiveresultData;
    });
    t.addEventListener('click', (e) => {
        t.classList.remove("error");
    });
    function receiveresultData() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if(xhr.responseText == "InValid!"){
                t.className="error";
            }
        }
    }
}
let linkNode = document.getElementsByClassName('link');
for(let t of linkNode){
    t.addEventListener('change', (e) => {
        let link = e.target.value;
        xhr.open('GET','validate.php?input='+link+'&type=link',true);
        xhr.send();
        xhr.onreadystatechange = receivelinkData;
    });
    t.addEventListener('click', (e) => {
        t.classList.remove("error");
    });
    function receivelinkData() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if(xhr.responseText == "InValid!"){
                t.className="error";
            }
        }
    }
}
let skillNode = document.getElementsByClassName('skill');
for(let t of skillNode){
    t.addEventListener('change', (e) => {
        let skill = e.target.value;
        xhr.open('GET','validate.php?input='+skill+'&type=skill',true);
        xhr.send();
        xhr.onreadystatechange = receiveskillData;
    });
    t.addEventListener('click', (e) => {
        t.classList.remove("error");
    });
    function receiveskillData() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if(xhr.responseText == "InValid!"){
                t.className="error";
            }
        }
    }
}
let interestNode = document.getElementsByClassName('interest');
for(let t of interestNode){
    t.addEventListener('change', (e) => {
        let interest = e.target.value;
        xhr.open('GET','validate.php?input='+interest+'&type=skill',true);
        xhr.send();
        xhr.onreadystatechange = receiveinterestData;
    });
    t.addEventListener('click', (e) => {
        t.classList.remove("error");
    });
    function receiveinterestData() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if(xhr.responseText == "InValid!"){
                t.className="error";
            }
        }
    }
}
let languageNode = document.getElementsByClassName('language');
for(let t of languageNode){
    t.addEventListener('change', (e) => {
        let language = e.target.value;
        xhr.open('GET','validate.php?input='+language+'&type=skill',true);
        xhr.send();
        xhr.onreadystatechange = receivelanguageData;
    });
    t.addEventListener('click', (e) => {
        t.classList.remove("error");
    });
    function receivelanguageData() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if(xhr.responseText == "InValid!"){
                t.className="error";
            }
        }
    }
}
let hobbyNode = document.getElementsByClassName('hobby');
for(let t of hobbyNode){
    t.addEventListener('change', (e) => {
        let hobby = e.target.value;
        xhr.open('GET','validate.php?input='+hobby+'&type=skill',true);
        xhr.send();
        xhr.onreadystatechange = receivehobbyData;
    });
    t.addEventListener('click', (e) => {
        t.classList.remove("error");
    });
    function receivehobbyData() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if(xhr.responseText == "InValid!"){
                t.className="error";
            }
        }
    }
}
let nameNode = document.getElementsByClassName('name');
for(let t of nameNode){
    t.addEventListener('change', (e) => {
        let name = e.target.value;
        xhr.open('GET','validate.php?input='+name+'&type=name',true);
        xhr.send();
        xhr.onreadystatechange = receivenameData;
    });
    t.addEventListener('click', (e) => {
        t.classList.remove("error");
    });
    function receivenameData() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if(xhr.responseText == "InValid!"){
                t.className="error";
            }
        }
    }
}
let desigNode = document.getElementsByClassName('designation');
for(let t of desigNode){
    t.addEventListener('change', (e) => {
        let desig = e.target.value;
        xhr.open('GET','validate.php?input='+desig+'&type=title',true);
        xhr.send();
        xhr.onreadystatechange = receivedesigData;
    });
    t.addEventListener('click', (e) => {
        t.classList.remove("error");
    });
    function receivedesigData() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if(xhr.responseText == "InValid!"){
                t.className="error";
            }
        }
    }
}
let rphoneNode = document.getElementsByClassName('phone');
for(let t of rphoneNode){
    t.addEventListener('change', (e) => {
        let phone = e.target.value;
        xhr.open('GET','validate.php?input='+phone+'&type=mobile',true);
        xhr.send();
        xhr.onreadystatechange = receivePhoneData;
    });
    t.addEventListener('click', (e) => {
        t.classList.remove("error");
    });
    function receivePhoneData() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if(xhr.responseText == "InValid!"){
                t.className="error";
            }
        }
    }
}