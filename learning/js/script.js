"use strict";
// starting ajax http request
let xhr = new XMLHttpRequest();

let el = document.getElementById('abc');

el.onclick = function (){
    xhr.onreadystatechange =postAjax;
    xhr.open('POST','php/update_database.php');
    xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
    xhr.send('email=prashantprajapati159@gmail.com&id=4');
    
    el.innerHTML=`${response.name}`+'-'+`${resopnse.message}`;
    el.style.color = 'red';
}

function postAjax(){
    if (xhr.readyState===XMLHttpRequest.DONE) {
        if (xhr.status===200) {
            let response=JSON.parse(xhr.responseText);
            alert("hi "+response.name+"-"+response.message);
        } else {
            alert("something went wrong");
        }
    }
}