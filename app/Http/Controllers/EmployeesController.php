<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employees;
use App\Http\Requests;
use Input;

class EmployeesController extends Controller
{
    //
  

  
  
  public function index($id = null) {
    if ($id == null) {
      return Employees::orderBy('id', 'desc')->get();

    } else {
      return $this->show($id);
    }
  }
  
  
  public function store(Request $request) {
    

    
    $imgfile = Input::file('avatar');
  
      $destinationPath = 'uploads'; // upload path
      $extension = $imgfile->getClientOriginalExtension(); // getting image extension

      $fileName = rand(11111,99999).'.'.$extension; // renameing image
      Input::file('avatar')->move($destinationPath, $fileName); // uploading file to given path
      // sending back with message
      $imgsrc = $destinationPath.'/'.$fileName;

      $employee = new Employees;

      $employee->image = $imgsrc;
      $employee->name = $request->input('name');
      $employee->email = $request->input('email');
      $employee->contact = $request->input('contact');
      $employee->position = $request->input('position');
      $employee->department = $request->input('department');
      $employee->save();

      return 'Employee record successfully created with id ' . $employee->id;
  
    
    
  }
  
  public function show($id) {
    return Employees::find($id);
  }

  public function update(Request $request, $id) {
    $employee = Employees::find($id);

    $employee->name = $request->input('name');
    $employee->email = $request->input('email');
    $employee->contact = $request->input('contact');
    $employee->position = $request->input('position');
    $employee->department = $request->input('department');
    $employee->save();

    return "Sucess updating user #" . $employee->id;
  }
  
  public function destroy($id) {
    
    $employee = Employees::findOrFail($id);

      $employee->delete();

   

    return "Employee record successfully deleted #" . $id;
  }

  
}
