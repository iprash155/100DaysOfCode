"use strict";

//function construction
class person {
    constructor(person_name, person_age) {
        this.name = person_name;
        this.age = person_age;

    }
    display(){
        document.write(this.name+" is of age "+this.age);
    }
};

// creating objects using new keyword

let person1 = new person ('prashant','21');
let person2 = new person ('himanshu','22');

document.write(person1.name)
// displayig property
person1.display();
