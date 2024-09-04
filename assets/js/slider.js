var imagenes = ["assets/Imagenes/opcion.png",
    "assets/Imagenes/opcion3.jpg",
    "assets/Imagenes/naranja.jpg"
];

var ropa = ["assets/Imagenes/modelo1.jpg",
    "assets/Imagenes/modelo2.jpg",
    "assets/Imagenes/modelo3.jpg"
];

var mujeres = ["assets/Imagenes/ves.jpg",
    "assets/Imagenes/con2.jpg",
    "assets/Imagenes/womenn.jpg",
    "assets/Imagenes/women2.jpg"
];

document.getElementsByName("Imagen")[0].src = imagenes[0];
document.getElementsByName("Imagen")[0].classList.add("active");
document.getElementsByName("ropas")[0].src = ropa[0];
document.getElementsByName("ropas")[0].classList.add("active");
document.getElementsByName("women")[0].src = mujeres[0];
document.getElementsByName("women")[0].classList.add("active");

var contador = 0;
var contador1 = 0;
var contador2 = 0;
var intervalo = setInterval(RightMove, 4000);
var intervalos = setInterval(DerechaMove, 4000);
var intervalos2 = setInterval(DerechaMover, 4000);

document.getElementById("slider-right").addEventListener("click", function () {
    clearInterval(intervalo);
    RightMove();
    intervalo = setInterval(RightMove, 4000);
});

document.getElementById("slider-left").addEventListener("click", function () {
    clearInterval(intervalo);
    leftMove();
    intervalo = setInterval(RightMove, 4000);
});

document.getElementById("slider-derecha").addEventListener("click", function () {
    clearInterval(intervalos);
    DerechaMove();
    intervalos = setInterval(DerechaMove, 4000);
});

document.getElementById("slider-izquierda").addEventListener("click", function () {
    clearInterval(intervalos);
    IzquierdaMove();
    intervalos = setInterval(DerechaMove, 4000);
});

document.getElementById("deslizar-derecha").addEventListener("click", function () {
    clearInterval(intervalos2);
    DerechaMover();
    intervalos2 = setInterval(DerechaMover, 4000);
});

document.getElementById("deslizar-izquierda").addEventListener("click", function () {
    clearInterval(intervalos2);
    IzquierdaMover();
    intervalos2 = setInterval(DerechaMover, 4000);
});

function RightMove() {
    contador++;
    if (contador > imagenes.length - 1) {
        contador = 0;
    }
    changeImage(document.getElementsByName("Imagen")[0], imagenes[contador]);
}

function leftMove() {
    contador--;
    if (contador < 0) {
        contador = imagenes.length - 1;
    }
    changeImage(document.getElementsByName("Imagen")[0], imagenes[contador]);
}

function DerechaMove() {
    contador1++;
    if (contador1 > ropa.length - 1) {
        contador1 = 0;
    }
    changeImage(document.getElementsByName("ropas")[0], ropa[contador1]);
}

function IzquierdaMove() {
    contador1--;
    if (contador1 < 0) {
        contador1 = ropa.length - 1;
    }
    changeImage(document.getElementsByName("ropas")[0], ropa[contador1]);
}

function DerechaMover() {
    contador2++;
    if (contador2 > mujeres.length - 1) {
        contador2 = 0;
    }
    changeImage(document.getElementsByName("women")[0], mujeres[contador2]);
}

function IzquierdaMover() {
    contador2--;
    if (contador2 < 0) {
        contador2 = mujeres.length - 1;
    }
    changeImage(document.getElementsByName("women")[0], mujeres[contador2]);
}

function changeImage(imageElement, newSrc) {
    imageElement.classList.remove("active");
    setTimeout(function () {
        imageElement.src = newSrc;
        imageElement.classList.add("active");
    }, 100);
}
