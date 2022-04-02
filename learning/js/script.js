"use strict";
class person{
    constructor(person_name,person_age){
        this.name=person_name;
        this.age=person_age;
    }
    display(){
        document.write(this.name+" is of age "+this.age);
    }
}

let person1 = new person('prashant',21);

person1.display();

//for-in loop

for(let property in person1){
    document.write("<br>"+property + " : "+person1[property]+ "<br>");
}