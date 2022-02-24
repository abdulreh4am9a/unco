let emailNode = document.getElementById('email');
let xhr = new XMLHttpRequest();
emailNode.addEventListener('change', (e) => {
    let email = e.target.value;
    xhr.open('GET','validate.php?input='+email+'&type=email',true);
    xhr.send();
    xhr.onreadystatechange = receiveEmailData;
});
emailNode.addEventListener('click', (e) => {
    emailNode.classList.remove("error");
    emailNode.nextElementSibling.innerText="";
});
function receiveEmailData() {
    if (xhr.readyState == XMLHttpRequest.DONE) {
        if(xhr.responseText == "InValid!"){
            emailNode.className="error";
            emailNode.nextElementSibling.innerText="Invalid Email Address!";
        }
    }
}
let nameNode = document.getElementById('name');
nameNode.addEventListener('change', (e) => {
    let name = e.target.value;
    xhr.open('GET','validate.php?input='+name+'&type=name',true);
    xhr.send();
    xhr.onreadystatechange = receiveNameData;
});
nameNode.addEventListener('click', (e) => {
    nameNode.classList.remove("error");
    nameNode.nextElementSibling.innerText="";
});
function receiveNameData() {
    if (xhr.readyState == XMLHttpRequest.DONE) {
        if(xhr.responseText == "InValid!"){
            nameNode.className="error";
            nameNode.nextElementSibling.innerText=xhr.responseText;
        }
    }
}
let passNode = document.getElementById('pass');
passNode.addEventListener('change', (e) => {
    let pass = e.target.value;
    xhr.open('GET','validate.php?input='+pass+'&type=password',true);
    xhr.send();
    xhr.onreadystatechange = receivePassData;
});
passNode.addEventListener('click', (e) => {
    passNode.classList.remove("error");
    passNode.nextElementSibling.innerText="";
});
function receivePassData() {
    if (xhr.readyState == XMLHttpRequest.DONE) {
        if(xhr.responseText == "InValid!"){
            passNode.className="error";
            passNode.nextElementSibling.innerText="Password must be atleast 8 characters!";
        }
    }
}
let cpassNode = document.getElementById('cpass');
cpassNode.addEventListener('change', (e) => {
    let cpass = e.target.value;
    xhr.open('GET','validate.php?input='+cpass+'&type=password',true);
    xhr.send();
    xhr.onreadystatechange = receivecPassData;
});
cpassNode.addEventListener('click', (e) => {
    cpassNode.classList.remove("error");
    cpassNode.nextElementSibling.innerText="";
});
function receivecPassData() {
    if (xhr.readyState == XMLHttpRequest.DONE) {
        if(xhr.responseText == "InValid!"){
            cpassNode.className="error";
            cpassNode.nextElementSibling.innerText="Password must be atleast 8 characters!";
        }
    }
}