app.controller('PostController', function ($scope,$http) {
    getInfo();
    function getInfo(){
        $http.post('conn/info.php').success(function(data) {
            $scope.employees = (data);
            // console.log(data);
        })
    }

    $scope.deleteUser = function (info) {
        $http.post('conn/delete.php',
        {
            "del_id":info.id
        })
        .success(function (data) {
            if(confirm("Are you sure to delete user?")){
                if(data == true){
                    getInfo();
                    $scope.employees.splice(1);
                }
            }
        })
    }

    $scope.insertUser = function (info) {
        $http.post('conn/insert.php',
        {
            "name":info.name,
            "email":info.email,
            "companyName":info.companyName
        })
        .success(function (data) {
            if (data == true){
                getInfo();
                $('#form').each(function(){
                    this.reset();
                })
                confirm("Successfully Registered!");
            }
        })
    }

    $scope.currentUser = {};
    $scope.editInfo = function(info){
        $scope.currentUser = info;
        $('#empForm').slideUp();
        $('#editForm').slideToggle();
    }
});

