
var oculto=false;
var tope=-300;
var nav=navigator.appName;
//if (nav.indexOf('Explorer')!=-1) {prop="fondo.style.top"; var oculto=true};
//if (nav.indexOf ('Netscape') !=-1) prop="document.fondo.top";
//if (nav.indexOf ('Mozilla') !=-1) {prop="fondo.style.top"; var oculto=true};
prop="fondo.style.top"; var oculto=true

function mueve(direcc){
eval ("a=parseInt("+prop+")+direcc;");
if (a<=0 & a>tope) eval (prop+"=a;");
if(loop) setTimeout('mueve('+direcc+')',0);

}

function pos(posicion){
eval (prop+"=posicion;");
}

