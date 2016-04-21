<!DOCTYPE html>
<html lang="en-US" ng-app="employeeRecords">
  <head>
    <title>Angular</title>

    <!-- Load Bootstrap CSS -->
   {!! Html::style('css/bootstrap.min.css') !!}
   {!! Html::style('css/style.css') !!}
   
    <!-- Load Javascript Libraries (AngularJS, JQuery, Bootstrap) -->
    {!! Html::script('app/lib/angular/angular.min.js') !!}
    {!! Html::script('js/jquery.min.js') !!}
    {!! Html::script('js/bootstrap.min.js')!!}


    <!-- AngularJS Application Scripts -->
    {!! Html::script('app/app.js') !!}
    {!! Html::script('app/controllers/employees.js') !!}
  </head>
  <body>
    <h2><center>LARAVEL + ANGULAR</center></h2>
    <div ng-controller="employeesController" class="container">
      {!! Form::text( 'search' ,'', array('class' => 'form-control searchBox', 'ng-model' => 'query' ) )!!}
      <!-- Table-to-load-the-data Part -->
      <th><button id="btn-add" class="btn btn-success btn-md btnAdd" ng-click="toggle('add', 0)">Add New Employee</button></th>
      <table class="table table-striped table-bordered">
        <thead>
          <tr>

            <th>Name</th>
            <th>Email</th>
            <th>Contact No</th>
            <th>Position</th>
            <th>Department</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr ng-repeat="employee in employees | filter:query ">

            <td class="ng-cloak">@{{ employee.name }}</td>
            <td class="ng-cloak">@{{ employee.email }}</td>
            <td class="ng-cloak">@{{ employee.contact }}</td>
            <td class="ng-cloak">@{{ employee.position }}</td>
            <td class="ng-cloak">@{{ employee.department }}</td>
            <td>
              <button class="btn btn-primary btn-md btn-detail" ng-click="toggle('edit', employee.id)">Edit</button>
              <button class="btn btn-danger btn-md btn-delete" ng-click="confirmDelete(employee.id)">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
      <!-- End of Table-to-load-the-data Part -->
      <!-- Modal (Pop up when detail button clicked) -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" ng-click="clear()"><span aria-hidden="true">×</span></button>
              <h4 class="modal-title" id="myModalLabel">@{{form_title}}</h4>
            </div>
            <div class="modal-body">
              {!! Form::open( array( 'class' => 'form-horizontal', 'files' => true, 'enctype' => 'multipart/form-data' )) !!}
<!--            <input type="hidden" value="@{{employee.id}}" ng-model="employee.id">-->
              <div class="form-group">
                {!! Form::label('avatar', 'Picture', array ( 'class' => 'control-label col-sm-2' ) ); !!}
                <div class="control-group">
                  <div class="col-sm-10">
                    {!! Form::file('avatar') !!}
                  </div>
                </div>
              </div>
                <div class="form-group error">
                  <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control has-error" id="name" name="name" placeholder="Fullname" value="@{{name}}" 
                           ng-model="employee.name" ng-required="true">
                    <span class="help-inline" 
                          ng-show="frmEmployees.name.$invalid && frmEmployees.name.$touched">Name field is required</span>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" value="@{{email}}" 
                           ng-model="employee.email" ng-required="true">
                    <span class="help-inline" 
                          ng-show="frmEmployees.email.$invalid && frmEmployees.email.$touched">Valid Email field is required</span>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Contact Number</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="contact_number" name="contact" placeholder="Contact Number" value="@{{contact}}" 
                           ng-model="employee.contact" ng-required="true">
                    <span class="help-inline" 
                          ng-show="frmEmployees.contact.$invalid && frmEmployees.contact.$touched">Contact number field is required</span>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Position</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="position" name="position" placeholder="Position" value="@{{position}}" 
                           ng-model="employee.position" ng-required="true">
                    <span class="help-inline" 
                          ng-show="frmEmployees.position.$invalid && frmEmployees.position.$touched">Position field is required</span>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Department</label>
                  <div class="col-sm-9">
                    <select name="department" value="@{{department}}" id="department" ng-model="employee.department" ng-required="true" class="form-control">
                      <option value="Ecommerce">Ecommerce</option>
                      <option value="Web Integration">Web Integration</option>
                    </select>
                
                    <span class="help-inline" 
                          ng-show="frmEmployees.department.$invalid && frmEmployees.department.$touched">Position field is required</span>
                  </div>
                </div>
                <div class="modal-footer">
                  <a href="javascript:void(0)" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmEmployees.$invalid">Save changes</a>
                </div>
              {!! Form::close() !!}
            </div>
         
          </div>
        </div>
      </div>
    </div>

  </body>
</html>