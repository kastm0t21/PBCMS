'use strict';

var app = angular.module('app', ['ui.router', 'ngAnimate']);
app.config(['$urlRouterProvider', '$stateProvider', function($urlRouterProvider, $stateProvider){
    $urlRouterProvider.otherwise('/');

    $stateProvider
        // .state('page',{
        //     url: '/',
        //     templateUrl: 'pages/blank-page.html'
        // })
        .state('product',{
            url: '/',
            templateUrl: 'pages/product.html',
            controller: 'ProductController'
        })
        // .state('category',{
        //     url: '/category',
        //     templateUrl: 'pages/category.html',
        //     controller: 'CategoryController'
        // })
        // .state('port_slot',{
        //     url: '/port_slot',
        //     templateUrl: 'pages/portslot.html',
        //     controller: 'PSController'
        // })
        // .state('port_type',{
        //     url: '/port_type',
        //     templateUrl: 'pages/porttype.html',
        //     controller: 'PTController'
        // })
        .state('images',{
            url: '/images',
            templateUrl: 'pages/images.html',
            controller: 'ProductController'
        })
}])

app.directive("character", function (){
  return{
    restrict: 'E',
    scope:{
      
    }
  }
})

app.directive('fileModel', ['$parse', function ($parse) {
    return {
    restrict: 'A',
    link: function(scope, element, attrs) {
        var model = $parse(attrs.fileModel);
        var modelSetter = model.assign;

        element.bind('change', function(){
            scope.$apply(function(){
                modelSetter(scope, element[0].files[0]);
            });
        });
    }
   };
}]);

// We can write our own fileUpload service to reuse it in the controller
// app.service('fileUpload', ['$http', function ($http) {
//     this.uploadFileToUrl = function(file, uploadUrl){
//          var fd = new FormData();
//          fd.append('file', file);
//         //  fd.append('name', name);
//          $http.post(uploadUrl, fd, {
//              transformRequest: angular.identity,
//              headers: {'Content-Type': undefined,'Process-Data': false}
//          })
//          .then(function successCallback (response){
//              console.log(response.data);
//          },function errorCallback(response){
//              console.log(response);
//          })
//      }
//  }]);