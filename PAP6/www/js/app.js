(function(){
  'use strict';
  var todosPAP={};
  var module = angular.module('app', ['onsen']);

  module.controller('AppController', function($scope, $data) {
    $scope.doSomething = function() {
      setTimeout(function() {
        alert(''+device.uuid);
      }, 100);
    };
  });

  module.controller('PAPDetailController', function($scope, $data) {
    $scope.item = $data.selectedItem;
  });

  module.controller('PAPController', function($scope, $data, $http) {
    $scope.items = todosPAP;  
    $http.get('http://empowerlabs.com/proyectos/trackersAPI/BSystem/PAP/padres.php').
  success(function(data, status, headers, config) {
  	data.reverse();
    $data.items=data;
    todosPAP=data;
    $scope.items = $data.items;  
    $scope.showDetail = function(item) {
      var selectedItem = item;
      $data.selectedItem = selectedItem;
      $scope.ons.navigator.pushPage('PAPDetail.html', {title : selectedItem.title});
    };
  }).
  error(function(data, status, headers, config) {
  	
  });
  });

  module.factory('$data', function() {
      var data = {};
      
      data.items = todosPAP;
      
      return data;
  });
})();




