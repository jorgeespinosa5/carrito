

// Muestra el número mayor que se encuentra en el arreglo
let numeros = [1,5,10,20,100,234];
let max = Math.max(...numeros);
console.log(max);


let articulaciones=["hombro", "rodilla"];
let cuerpo=["cabeza", "pierna", ...articulaciones, "brazo"];
console.log(cuerpo);