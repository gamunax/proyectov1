var app	=	angular.module("app",[]);

app.config(function($routeProvider){
	$routeProvider.when("/mant_cliente",{
		controller : "clienteController",
		templateUrl: "templates/mantCliente.html"
	});
});