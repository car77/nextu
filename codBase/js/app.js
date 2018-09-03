var miCalculadora = {
	vVisor: "0",
	init: (function(){
			this.EventosaBoton();
	}),
    EventosaBoton: function(){
		document.getElementById("0").addEventListener("click", function() {miCalculadora.Numeros("0");});
		document.getElementById("1").addEventListener("click", function() {miCalculadora.Numeros("1");});
		document.getElementById("2").addEventListener("click", function() {miCalculadora.Numeros("2");});
		document.getElementById("3").addEventListener("click", function() {miCalculadora.Numeros("3");});
		document.getElementById("4").addEventListener("click", function() {miCalculadora.Numeros("4");});
		document.getElementById("5").addEventListener("click", function() {miCalculadora.Numeros("5");});
		document.getElementById("6").addEventListener("click", function() {miCalculadora.Numeros("6");});
		document.getElementById("7").addEventListener("click", function() {miCalculadora.Numeros("7");});
		document.getElementById("8").addEventListener("click", function() {miCalculadora.Numeros("8");});
		document.getElementById("9").addEventListener("click", function() {miCalculadora.Numeros("9");});
		document.getElementById("raiz").addEventListener("click", function() {miCalculadora.Raiz("raiz");});
		document.getElementById("dividido").addEventListener("click", function() {miCalculadora.Operacion("/");});
		document.getElementById("por").addEventListener("click", function() {miCalculadora.Operacion("*");});
		document.getElementById("menos").addEventListener("click", function() {miCalculadora.Operacion("-");});
		document.getElementById("mas").addEventListener("click", function() {miCalculadora.Operacion("+");});		
		document.getElementById("on").addEventListener("click", function() {miCalculadora.On();});
		document.getElementById("sign").addEventListener("click", function() {miCalculadora.Sign();});
        document.getElementById("igual").addEventListener("click", function() {miCalculadora.Igual();});
		document.getElementById("punto").addEventListener("click", function() {miCalculadora.Punto();});
	},
	Numeros: function(valor){
     
	  if (this.vVisor.length < 8 || this.vVisor==0) {
		if (this.vVisor==0) {
				this.vVisor = "";
				this.vVisor = this.vVisor + parseInt(valor);
		} else {
				this.vVisor = this.vVisor + parseInt(valor);
		}
	  }
	    document.getElementById("display").innerHTML = this.vVisor;
		
	},
	On: function(){
		this.vVisor=0;
		document.getElementById("display").innerHTML = 0;
		document.getElementById("display").innerHTML = this.vVisor;
	},	
	Punto: function(){
		if (this.vVisor.indexOf(".")== -1) {
			if (this.vVisor == ""){
				this.vVisor = this.vVisor + "0.";
			} else {
				this.vVisor = this.vVisor + ".";
			}
			document.getElementById("display").innerHTML = this.vVisor;
		}
	},
	Sign: function(){
		if (this.vVisor!="0") {
		   this.vVisor=this.vVisor * -1
		   document.getElementById("display").innerHTML = this.vVisor;
	    }
	},		
	Raiz: function(valor){
		this.vVisor=Math.sqrt(this.vVisor);
		document.getElementById("display").innerHTML = this.vVisor.toFixed(1);
	},		
	Igual: function(){
		//Object result = engine.eval(this.vVisor);
		this.vVisor=eval(this.vVisor);
		document.getElementById("display").innerHTML = this.vVisor;
	},			
	Operacion: function(valor){
		this.vVisor=this.vVisor + valor;
		document.getElementById("display").innerHTML = this.vVisor;
	}	
};


miCalculadora.init();