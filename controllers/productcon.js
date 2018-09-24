'use strict';
app.controller("ProductController",['$scope','$http', function($scope,$http){
        getInfo();
        function getInfo(){
            $http.post('dbfiles/productdb/Details.php').success(function(data){
                $scope.details = data;
            });
        }
        getCInfo();
        function getCInfo() {
            $http.post('dbfiles/productdb/categorydetails.php').success(function(categorydata){
                $scope.category = categorydata;
                // console.log(categorydata);
            });
        }
        getPSInfo();
        function getPSInfo(){
            $http.post('dbfiles/productdb/type.php').success(function(typedata){
                $scope.type = typedata;
                // console.log(typedata);
            });
        }
        getPTInfo();
        function getPTInfo(){
            $http.post('dbfiles/productdb/collection.php').success(function(collectiondata){
                $scope.collection = collectiondata;
                // console.log(PTdata);
            });
        }

    $scope.show_form = true;
    $scope.formToggle =function(){
        $('#Form').slideToggle();
        $('#editForm').css('display', 'none');
    }
    $scope.insertInfo = function(info){
        // console.log(info);
        var ASIN = info.ASIN;
        var name = info.name;
        var url = info.url;
        var quantity = info.quantity;
        var color = info.color;
        var size = info.size;
        var price = info.price;
        var type = info.type;
        var category = info.category;
        var collection = info.collection;

        var fd = new FormData();
        fd.append('ASIN', ASIN);
        fd.append('name', name);
        fd.append('url', url);
        fd.append('quantity', quantity);
        fd.append('color', color);
        fd.append('size', size);
        fd.append('price', price);
        fd.append('type', type);
        fd.append('category', category);
        fd.append('collection', collection);
        fd.append('color', color);
        $http.post('dbfiles/productdb/insertDetails.php', fd, 
        {
             transformRequest: angular.identity,
             headers: {'Content-Type': undefined,'Process-Data': false}
            // "name":info.name,
            // "image":info.image,
            // "category_id":info.category_id,
            // "slot_id":info.slot_id,
            // "type_id":info.type_id
        })
        .success(function(data){
            var a = "Successfully Registered!";
            if (data == a) {
                getInfo();
                $('#Form').css('display', 'none');
                $('#Form').each(function(){
                    this.reset();
                })
                // alert('Successfully Registered.');
                // alert(data);

            }
            alert(data);
            // console.log(data);
        });
    }

    $scope.deleteInfo = function(info){
        $http.post('dbfiles/productdb/deleteDetails.php',
        {
            "del_id":info.id
        })
        .success(function(data){
            if (confirm("Are you sure to delete this record?")) {
                if (data == true) {
                    getInfo();
                }               
            }

        });
    }
    $scope.currentData = {};
    $scope.editInfo = function(info){
        $scope.currentData = info;
        $('#Form').slideUp();
        $('#editForm').slideToggle();
    }
    $scope.UpdateInfo = function(info){
        console.log(info);
        var ASIN = info.ASIN;
        var name = info.name;
        var url = info.url;
        var quantity = info.quantity;
        var color = info.color;
        var size = info.size;
        var price = info.price;
        var type = info.type;
        var category = info.category;
        var collection = info.collection;

        var fd = new FormData();
        fd.append('ASIN', ASIN);
        fd.append('name', name);
        fd.append('url', url);
        fd.append('quantity', quantity);
        fd.append('color', color);
        fd.append('size', size);
        fd.append('price', price);
        fd.append('type', type);
        fd.append('category', category);
        fd.append('collection', collection);
        fd.append('color', color);

    $http.post('dbfiles/productdb/updateDetails.php', fd,
    {
        // "id":info.id,
        // "name":info.name,
        // "category_id":info.category_id,
        // "slot_id":info.slot_id,
        // "type_id":info.type_id,
        transformRequest: angular.identity,
        headers: {'Content-Type': undefined,'Process-Data': false}
    })
    .success(function(data){
        console.log(data);
        var a = "Successfully Updated";
        $scope.show_form = true;
            if (data == a) {
                getInfo();
            }
        alert(data);   
        });
    }
    $scope.updateMsg = function(id){
            $('#editForm').css('display', 'none');
        }

    // $scope.uploadFile = function(){
    //     var form_data = new FormData();
    //     angular.forEach($scope.files, function(file){
    //         form_data.append('file', file);
    //     })
    //     // $http.post('dbfiles/productdb/upload.php', form_data,
    //     // {
    //     //     transformRequest:angular.identity,
    //     //     headers: {'Content-Type': undefined, 'Process-Data': false}
    //     // }).success(function(response){
    //     //     alert(response);
    //     // })
    // }


    $scope.uploadFile = function(){

    };



}]);

