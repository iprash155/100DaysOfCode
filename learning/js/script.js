"use strict";

let even = [2,4,6,8];
let odd = [1,3,5,7];

let nos = [...even,...odd];

nos.forEach(i=>document.write(i+" "));