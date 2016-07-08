<!DOCTYPE html>
<html ng-app='Carriages'>
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.6/angular.min.js" charset="utf-8"></script>
    <script src="js/app.js" charset="utf-8"></script>
    <script src="js/main.js" charset="utf-8"></script>
    <script   src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.14.1/moment.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js" charset="utf-8"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body ng-controller='MainCtrl'>
    <div class="container">
      <div class="row">
        <h3>Добавить</h1>
        <hr>
        <div class="col-md-6 col-sm-6">
          <form class="form" action="index.html" method="post">
            <div class="form-group">
              <label>Номер вагона:</label>
              <input type="input" class="form-control" name="name" ng-model='carriageNumber'>
            </div>
            <div class="form-group">
              <label>Владелец:</label>
              <select id="owners" class="form-control" ng-model="carriageOwner">
                <option value="{{ owner.id }}" ng-repeat='owner in owners'>{{ owner.name }}</option>
              </select>
            </div>
            <div class="form-group">
              <label>Год выпуска</label>
              <input type="date" class="form-control" name="name" value="" ng-model="carriageKind">
            </div>
            <label style="color: red">{{ errorCarriage }}</label>
            <div class="form-group">
              <input type="button" class="btn btn-success" value="Добавить вагон" ng-click="addCarriage()">
            </div>
          </form>
        </div>
        <div class="col-md-6 col-sm-6">
          <form class="form" action="index.html" method="post">
            <div class="form-group">
              <label>Название компании</label>
              <input type="input" class="form-control" name="name" ng-model='ownerName'>
            </div>
            <div class="form-group">
              <label style="color: red">{{ errorOwner }}</label>
            </div>
            <div class="form-group">
              <input type="button" class="btn btn-success" value="Добавить" ng-click='addOwner()'>
            </div>
          </form>
        </div>

      </div>
      <div class="row" style="margin-top: 5%;">
        <h5 style="color: green">Для изменения владельца вагона клините по названию владельца</h5>

        <table class="table text-center">
          <thead>
            <th class="text-center">№ Вагона</th>
            <th class="text-center">Год выпуска</th>
            <th class="text-center">Владелец</th>
            <th></th>
          </thead>
          <tbody>
            <tr ng-repeat='carriage in carriages'>
              <td>{{ carriage.carriage_number }}</td>
              <td>{{ carriage.carriage_kind | date:'yyyy'}}</td>
              <td style="cursor: pointer" ng-click="change(carriage.carriage_number, carriage.carriage_owner)" ng-if="editCarriage !== carriage.carriage_number">{{ carriage.name }}</td>
              <td style="cursor: pointer" ng-if="editCarriage == carriage.carriage_number">
                <select class="form-control" ng-model="changeCarriageOwner" ng-change="updateCarriage(changeCarriageOwner)">
                  <option value="{{ owner.id }}" ng-repeat='owner in owners'>{{ owner.name }}</option>
                </select>
              </td>
              <td>
                <button type="button" class='btn btn-danger' ng-click="removeCarriage(carriage.carriage_number)">Удалить</button>
                <!-- <button type="button" class='btn btn-info' ng-click="removeCarriage(carriage.carriage_number)">Изменить владельца</button> -->
              </td>
            </tr>
          </tbody>
        </table>
      </div>

    </div>
  </body>
</html>
