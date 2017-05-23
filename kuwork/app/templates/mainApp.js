//This file serves as the main controller for the whole application.
var kuWork = angular.module('kuWorkApp', []);

(function() {
kuWork.controller('kuWorkController', ['$scope', '$rootScope', '$http', function($scope, $rootScope, $http) {

    var kuCtrl = this;

    this.activityList = [];
    this.studentList = [];
    this.companyList = [];
    this.resienceList = [];

    this.retrieveActivities = function () {
            console.log("retrieving activitiy list");
            $http({
                method: 'GET',
                url: '/app/activities'               
            }).then(function successCallback(response) {
                this.activityList = response.data;
                console.log("success!");
            }, function errorCallbac(response) {
                console.log("Error, could not retrieve activities");
            });
    };

    updateStudentList = function (sample) {
                this.studentList = sample;
                //Array.prototype.push.apply(this.studentList, sample);
                console.log(this.studentList);
    };

    this.retrieveStudents = function () {
            console.log("retrieving student list");
            $http({
                method: 'GET',
                url: '/app/students'               
            }).then(function successCallback(response) {
                this.studentList = response.data;
                console.log("success!");
            }, function errorCallbac(response) {
                console.log("Error, could not retrieve students");
                
                var sample =[{"phone_number": "2722523418", "email": "au.vecchio@gmail.com", "class": "Senior", "degree": "BS", "name": "Austin Vecchio", "major": "Computer Science"}];

                updateStudentList(sample);
                
            });
    };

    this.retrieveCompanies = function () {
            console.log("retrieving company list");
            $http({
                method: 'GET',
                url: '/app/companies'               
            }).then(function successCallback(response) {
                this.companyList = response.data;
                console.log("success!");
            }, function errorCallbac(response) {
                console.log("Error, could not retrieve companies");
            });
    };

    this.retrieveResidencies = function () {
            console.log("retrieving residence list");
            $http({
                method: 'GET',
                url: '/app/residencies'               
            }).then(function successCallback(response) {
                this.resienceList = response.data;
                console.log("success!");
            }, function errorCallbac(response) {
                console.log("Error, could not retrieve residencies");
            });
    };
}]);

})();