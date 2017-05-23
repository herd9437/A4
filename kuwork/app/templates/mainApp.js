//This file serves as the main controller for the whole application.
var kuWork = angular.module('kuWorkApp', []);

(function() {
kuWork.controller('kuWorkController', ['$scope', '$rootScope', '$http', function($scope, $rootScope, $http) {

    var kuCtrl = this;

    kuCtrl.activityList = [];
    kuCtrl.studentList = [];
    kuCtrl.companyList = [];
    kuCtrl.resienceList = [];

    kuCtrl.retrieveActivities = function () {
            console.log("retrieving activitiy list");
            $http({
                method: 'GET',
                url: '/app/activities'               
            }).then(function successCallback(response) {
                kuCtrl.activityList = response.data;
                console.log("success!");
            }, function errorCallbac(response) {
                console.log("Error, could not retrieve activities");
            });
    };

    $scope.updateStudentList = function (sample) {
                kuCtrl.studentList = sample;
                //Array.prototype.push.apply(this.studentList, sample);
                console.log(kuCtrl.studentList);
    };

    kuCtrl.retrieveStudents = function () {
            console.log("retrieving student list");
            $http({
                method: 'GET',
                url: '/app/students'               
            }).then(function successCallback(response) {
                kuCtrl.studentList = response.data;
                console.log("success!");
            }, function errorCallbac(response) {
                console.log("Error, could not retrieve students");
                
                var sample =[{"phone_number": "2722523418", "email": "au.vecchio@gmail.com", "class": "Senior", "degree": "BS", "name": "Austin Vecchio", "major": "Computer Science"}];

                $scope.updateStudentList(sample);
                
            });
    };

    kuCtrl.retrieveCompanies = function () {
            console.log("retrieving company list");
            $http({
                method: 'GET',
                url: '/app/companies'               
            }).then(function successCallback(response) {
                kuCtrl.companyList = response.data;
                console.log("success!");
            }, function errorCallbac(response) {
                console.log("Error, could not retrieve companies");
            });
    };

    kuCtrl.retrieveResidencies = function () {
            console.log("retrieving residence list");
            $http({
                method: 'GET',
                url: '/app/residencies'               
            }).then(function successCallback(response) {
                kuCtrl.resienceList = response.data;
                console.log("success!");
            }, function errorCallbac(response) {
                console.log("Error, could not retrieve residencies");
            });
    };
}]);

})();