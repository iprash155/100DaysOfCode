"use strict";
let a =10;
let b = 2;
let operator = '**';
switch (operator) {
    case '+':
        document.write(a+b);
        break;
    
    case '-':
        document.write(a-b);
        break;

    case '*':
        document.write(a*b);
        break;

    case '/':
        document.write(a/b);
        break;
    
    case '%':
        document.write(a%b);
        break;

    case '**':
        document.write(a**b);
        break;

    default:
        document.write("the operation is not valid");
        break;
}