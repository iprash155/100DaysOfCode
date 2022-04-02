"use strict";
let dog = {
    breed:'golder retriever',
    height : '4 ft',
    age : 2,
    display : function(){
        document.write(this.breed+" "+this.height+" "+this.age);
        exit;
    }
};

document.write(dog.display());