app.controller('MainCtrl', function($scope, $http) {
  console.log("MainCtrl was started!!!");

  $scope.carriages = '';
  $scope.owners = ''
  $scope.editCarriage = '';
  $scope.carriageOwner = '';

  getCarriages = function () {
    var config = {
      params: {
        action: 'getCarriages',
      }
    }
    $http.get("/functions.php", config)
      .then(function (response) {
        console.log(response.data);
        if (response.data.status == 1) {
          $scope.carriages = response.data.carriages;
        }
      })
  }

  getOwners = function () {
    var config = {
      params: {
        action: 'getOwners',
      }
    }
    $http.get("/functions.php", config)
      .then(function (response) {
        console.log(response.data);
        if (response.data.status == 1) {
          $scope.owners = response.data.owners;
        }
      })
  }

  $scope.addOwner = function () {

    if ($scope.ownerName !== undefined && $scope.ownerName.length) {
      var config = {
        params: {
          action: 'addOwner',
          owner: $scope.ownerName
        }
      }
      $http.get("/functions.php", config)
        .then(function (response) {
          console.log(response.data);
          if (response.data.status == 1) {
            getOwners();
            $scope.ownerName = '';
            $scope.errorOwner = '';
          }
        })
    } else {

      $scope.errorOwner = 'Поле не может быть пустым';
    }

  }

  $scope.addCarriage = function () {

    if ($scope.carriageNumber == undefined || $scope.carriageOwner == undefined || $scope.carriageKind == undefined) {
      $scope.errorCarriage = 'Все поля должны быть заполнены';
      return;
    }
    if (!$scope.carriageNumber.match(/^\d+$/) || $scope.carriageNumber.length !== 8) {
      $scope.errorCarriage = 'Номер должен быть 8ми значным, и состоять только из цифр';
      return;
    }

    var config = {
      params: {
        action: 'addCarriage',
        number: $scope.carriageNumber,
        kind: $scope.carriageKind,
        owner: $scope.carriageOwner
      }
    }
    $http.get("/functions.php", config)
      .then(function (response) {
        console.log(response.data);
        if (response.data.status == 1) {
          $scope.errorCarriage = '';
          $scope.carriageNumber = '';
          $scope.carriageKind = '';
          $scope.carriageOwner = '';
          getCarriages();
        }
        if (response.data.status == 2) {
          console.log("test");
          $scope.errorCarriage = "Вагон с таким номером уже существует";
        }
      })


  }

  $scope.removeCarriage = function (carriageNumber) {
    var config = {
      params: {
        action: 'removeCarriage',
        number: carriageNumber
      }
    }
    $http.get("/functions.php", config)
      .then(function (response) {
        console.log(response.data);
        if (response.data.status == 1) {
          getCarriages();

        }
      })
  }

  $scope.change = function (number, owner) {
    $scope.editCarriage = number;
    $scope.carriageOwner = owner;
    console.log(  $scope.carriageOwner);
    getCarriages();
  }

  $scope.updateCarriage = function (owner) {
    var config = {
      params: {
        action: 'updateCarriage',
        number: $scope.editCarriage,
        owner: owner,
        oldOwner: $scope.carriageOwner
      }
    }
    $http.get("/functions.php", config)
      .then(function (response) {
        console.log(response.data);
        if (response.data.status == 1) {
          $scope.editCarriage = "";
          getCarriages();

        }
      })
  }

  getCarriages();
  getOwners();
})
