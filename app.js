var app = angular.module("sa_app", []);
app.controller("controller", function($scope, $http, $interval) {
    $scope.btnName = "Enviar";
    $scope.hor = "cargando..";
    $scope.dis = "disp";
    $scope.icono = "icono";
    $scope.fecha = Date.now().toString();

    $scope.recargar = function(){
    $interval(function()
    {$scope.show_data();},100);
}
        

    $scope.insert = function() {
        
            $http.post(
                "insert.php", {
                    'nombre': $scope.nombre,
                    'email': $scope.email,
                    'telefono': $scope.telefono,
                    'mensaje': $scope.mensaje,                    
                    'btnName': $scope.btnName,                   
                }
                
            ).success(function(data){
                alert(data);               
                $scope.nombre = null;         
               $scope.email = null;
               $scope.telefono = null;
               $scope.mensaje = null;               
               $scope.btnName = "Enviar";
               $scope.show_data();
            });
        
    }   
    
    $scope.nav = function(btn){
        $scope.btn = btn;
        
        $http.post("buscar.php",{
            'btn':btn
        })  
        .success(function(data){
            $scope.premium = data;
            $scope.normal = data;
            
        });
    }

    $scope.show_data = function() {
        $http.get("display.php")
            .success(function(data) {
                 
            if(data == 0){
                $scope.hor = "Disponible";
                $scope.dis = "disp"
            
            }else{
                $scope.dis = "no-disp"
                $scope.hor = "No disponible";
            }
                         
        });            
    }

    

    $scope.update_data = function(id, nombre, familia, invitado, menu, mensaje) {        
        $scope.nombre = nombre;
        $scope.familia = familia;
        $scope.invi = invitado;
        $scope.elegido = menu;
        $scope.mensaje = mensaje;
        $scope.id = id;
        $scope.btnName = "Update";
    }
    
    $scope.delete_data = function(id) {
        if (confirm("Esta seguro de que quiere borrarlo?")) {
            $http.post("delete.php", {
                    'id': id
                })
                .success(function(data) {
                    alert(data);
                    $scope.show_data();
                });
        } else {
            return false;
        }
    }
});