'use strict';
app.controller("PTController",['$scope','$http', function($scope,$http){

        getInfo();
        function getInfo(){
            $http.post('dbfiles/porttypedb/Details.php').success(function(data){
            $scope.details = data;
        });
    }

    $scope.empInfo = {'gender' : 'male'};
    $scope.show_form = true;
    $scope.formToggle =function(){
        $('#Form').slideToggle();
        $('#editForm').css('display', 'none');
    }
    $scope.insertInfo = function(info){
        $http.post('dbfiles/porttypedb/insertDetails.php',
        {
            "type":info.type
        })
        .success(function(data){
            if (data == true) {
                getInfo();
                $('#Form').css('display', 'none');
                $('#Form').each(function(){
                    this.reset();
                })
                alert('Successfully Registered.');
            }
        });
    }

    $scope.deleteInfo = function(info){
        $http.post('dbfiles/porttypedb/deleteDetails.php',
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
    $http.post('dbfiles/porttypedb/updateDetails.php',
    {
        "id":info.id,
        "type":info.type
    })
    .success(function(data){
        $scope.show_form = true;
            if (data == true) {
                getInfo();
            }   
        });
    }
    $scope.updateMsg = function(id){
            $('#editForm').css('display', 'none');
        }
    // $scope.categories();
}]);
