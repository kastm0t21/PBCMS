app.controller("myController", ['$scope', '$http', function($scope, $http){
    $scope.uploadFile = function(){
        var form_data = new FormData();
        angular.forEach($scope.files, function(file){
            form_data.append('file', file);
        })
        $http.post('dbfiles/productdb/upload.php', form_data,
        {
            transformRequest:angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        }).success(function(response){
            alert(response);
        })
    }
}])