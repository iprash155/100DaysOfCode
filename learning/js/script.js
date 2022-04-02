"use strict";

//function construction
function Dog(breed,height,weight) {
    this.breed=breed;
    this.height=height;
    this.weight= weight;
    this.display=function(){
        this.breed+" "+this.height;
    };
}

// creating objects using new keyword

let dog1 = new Dog ('golder retriever','3.5 ft','5 kg');
let dog2 = new Dog ('pitbull','4 ft','7 kg');

// displayig property
document.write(dog1.breed);
document.write(dog2.weight);
