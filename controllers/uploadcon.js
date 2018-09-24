'use strict'

    app.controller('myCtrl', ['$scope', 'fileUpload', function($scope, fileUpload){

    $scope.uploadFile = function(){
    var file = $scope.myFile;
    console.log('file is ' );
    console.dir(file);

    var uploadUrl = "dbfiles/productdb/upload.php";
    var text = $scope.name;
    fileUpload.uploadFileToUrl(file, uploadUrl, text);
    };

}]);