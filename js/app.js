angular.module('app', ['ngRoute'])

    .config(function ($routeProvider) {
        $routeProvider
            .when('/', {
                templateUrl: "views/home.html"
            })
            .when('/about', {
                templateUrl: "views/about.html"
            })
            .otherwise({
                redirectTo: '/'
            })
    })
    .controller('contactCtrl', function($scope, $http) {
        $scope.formData = {};
        // process the form
        $scope.processForm = function () {
            $http({
                method: 'POST',
                url: '../../api/contact.php',
                data: $.param($scope.formData),  // pass in data as strings
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}  // set the headers so angular passing info as form data (not request payload)
            })
                .success(function (data) {
                    console.log(data);

                    if (!data.success) {
                        console.log('Not Good');
                        // if not successful, bind errors to error variables
                        $scope.errorLastName = data.errors.LastName;
                        $scope.errorFirstName = data.errors.FirstName;
                        $scope.errorEmail1 = data.errors.Email1;
                        $scope.errorEmail2 = data.errors.Email2;
                        $scope.messageError = data.messageError;
                        $scope.message = '';
                        $scope.success = false;

                    } else {
                        console.log('Good');
                        // if successful, bind success message to message
                        $scope.message = data.message;
                        $scope.errorLastName = '';
                        $scope.errorFirstName = '';
                        $scope.errorEmail1 = '';
                        $scope.errorEmail2 = '';
                        $scope.errorMotmot1 = '';
                        $scope.errorMotmot2 = '';
                        $scope.errorMotmot3 = '';
                        $scope.errorSelectedDay = '';
                        $scope.errorSelectedMonth = '';
                        $scope.errorSelectedYear = '';
                        $scope.messageError = '';
                        $scope.formData = '';
                        $scope.success = true;

                    }

                });

        };


    })
    .controller('recordBetaCtrl', function($scope, $http) {
        $scope.formData = {};
        // process the form
        $scope.processForm = function () {
            $http({
                method: 'POST',
                url: '../../api/recordBeta.php',
                data: $.param($scope.formData),  // pass in data as strings
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}  // set the headers so angular passing info as form data (not request payload)
            })
                .success(function (data) {
                    console.log(data);

                    if (!data.success) {
                        console.log('Not Good');
                        // if not successful, bind errors to error variables
                        $scope.errorEmail1 = data.errors.Email1;
                        $scope.errorEmail2 = data.errors.Email2;
                        $scope.messageError = data.messageError;
                        $scope.message = '';
                        $scope.success = false;

                    } else {
                        console.log('Good');
                        // if successful, bind success message to message
                        $scope.message = data.message;
                        $scope.errorEmail1 = '';
                        $scope.errorEmail2 = '';
                        $scope.formData = '';
                        $scope.success = true;

                    }

                });

        };


    })
    .controller('recordWaitingListCtrl', function($scope, $http) {
        $scope.formData = {};
        // process the form
        $scope.processForm = function () {
            $http({
                method: 'POST',
                url: '../../api/recordWaitingList.php',
                data: $.param($scope.formData),  // pass in data as strings
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}  // set the headers so angular passing info as form data (not request payload)
            })
                .success(function (data) {
                    console.log(data);

                    if (!data.success) {
                        console.log('Not Good');
                        // if not successful, bind errors to error variables
                        $scope.errorEmail1 = data.errors.Email1;
                        $scope.errorEmail2 = data.errors.Email2;
                        $scope.messageError = data.messageError;
                        $scope.message = '';
                        $scope.success = false;

                    } else {
                        console.log('Good');
                        // if successful, bind success message to message
                        $scope.message = data.message;
                        $scope.errorEmail1 = '';
                        $scope.errorEmail2 = '';
                        $scope.formData = '';
                        $scope.success = true;

                    }

                });

        };


    })



