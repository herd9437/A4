//This file serves as the main controller for the whole application.
var kuWork = angular.module('kuWorkApp', []);
// kuWork.controller("kuWorkController", function($scope, $http){
	
// });

(function() {
kuWork.controller('kuWorkController', ['$scope', '$rootScope', '$http', function($scope, $rootScope, $http) {

    var kuCtrl = this;

    this.retrieveActivities = function () {
            console.log("retrieving activitiy list");
            $http({
                method: 'GET',
                url: '/app/activities'               
            }).then(function successCallback(response) {
                console.log("success!");
            }, function errorCallbac(response) {
                console.log("Error, could not retrieve activities");
            });
    };
}]);

})();