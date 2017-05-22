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

    this.retrieveStudents = function () {
            console.log("retrieving student list");
            $http({
                method: 'GET',
                url: '/app/students'               
            }).then(function successCallback(response) {
                console.log("success!");
            }, function errorCallbac(response) {
                console.log("Error, could not retrieve students");
            });
    };

    this.retrieveCompanies = function () {
            console.log("retrieving company list");
            $http({
                method: 'GET',
                url: '/app/companies'               
            }).then(function successCallback(response) {
                console.log("success!");
            }, function errorCallbac(response) {
                console.log("Error, could not retrieve companies");
            });
    };

    this.retrieveResidences = function () {
            console.log("retrieving residence list");
            $http({
                method: 'GET',
                url: '/app/residencies'               
            }).then(function successCallback(response) {
                console.log("success!");
            }, function errorCallbac(response) {
                console.log("Error, could not retrieve residencies");
            });
    };
}]);

})();