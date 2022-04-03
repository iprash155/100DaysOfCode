"use strict";
let subject = new Array("maths","operating systems","DBMS");
document.write(subject[0]);
subject.push("computer network");
for(let i of subject){
    document.write(i+" ")
}
subject.pop();      //fetches last element of an array and removes it
for(let i of subject){
    document.write(i+" ")
}