"use strict";

function calculateSum(a,b,...args) {
    let sum=a+b;
    args.forEach(i=>sum+=i);
    return sum;
}

let s = calculateSum(3,5,7,9);
document.write(s+" ");
s=calculateSum(1,2,1,2,1515,2626,5185,4849,1561616,16511,848);
document.write(s+" ");