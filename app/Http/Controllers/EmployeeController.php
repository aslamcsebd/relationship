<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Salary;
use App\JobType;
use Image;
use Carbon\Carbon;

class EmployeeController extends Controller{

	// Home
	public function index(){
		$Salaries = Salary::all();
      return view('home', compact('Salaries'));
    }
    
   // Employee
   public function employee(){
      return view('pages.employee');
   }

   public function add_employee(Request $request){
   
      $validated = $request-> validate([
         'name'=> 'required',
         'email'=> 'required|unique:employees,email',
         'gender'=> 'required',
         'dob'=> 'required'
      ]);

     	$insert_Id = Employee::create($validated);

      if ($request->hasFile('photo')) {  
         $image_upload=$request->photo;
         $fileName= $insert_Id->id.".".$request->name.".".$image_upload->getClientOriginalExtension();
         Image::make($image_upload)->resize(400,380)->save(base_path('public/photo/'.$fileName));
         //Image quality   save(base_path('url'), 50);   this 50% image quality will be save
         Employee::find($insert_Id->id)->update(['photo'=> $fileName]);
      }
     return back()->with('success','Insert successfully');
   }

   // Salary

   public function salary(){
 		$Employees = Employee::where('status', '1')->get();   	
 		$JobTypes = JobType::all();   	
      return view('pages.salary', compact('Employees', 'JobTypes'));
   }

   public function add_salary(Request $request){
      
      $validated = $request-> validate([
         'employee_id'=> 'required',
         'position'=> 'required',
         'salary'=> 'required'
      ]);

     	Salary::create($validated);

      $status = Employee::find($request->employee_id);
      $status->status = false;
      $status->save();

     return back()->with('success','Insert successfully');
   }

   public function salary_delete($id){   
      Salary::where('id', $id)->delete();
      return back()->with('success', 'Salary delete successfully');
   }

   public function edit($id){ 
      $Employee = Employee::find($id);     
      $Salary = Salary::where('employee_id', $id)->first();
      $JobTypes = JobType::all();
      return view('pages.edit', compact('Employee', 'Salary', 'JobTypes'));
   }

   public function edit_now(Request $request){
      
      Employee::find($request->employee_id)->update([
         'name'=>$request->name,    
         'email'=>$request->email
      ]);

      if ($request->position!=null) {
         Salary::where('employee_id', $request->employee_id)->update([
            'position'=>$request->position,    
            'salary'=>$request->salary
         ]);
      }else{
         Salary::where('employee_id', $request->employee_id)->update([
            'salary'=>$request->salary
         ]);
      }      

      $Salaries = Salary::all();
      return view('home', compact('Salaries'))->with('success','Update successfully');
   }
 


   // job judy_type()

   public function job(){
 		$JobTypes = JobType::all();
      return view('pages.job', compact('JobTypes'));
   }

   public function add_Job(Request $request){

   	$validated = $request-> validate([
         'position'=> 'required|unique:job_types,position'
      ]);

     	JobType::create($validated);      
     	return back()->with('success','Insert successfully');     
   }

	public function job_delete($id){   
   	JobType::where('id', $id)->delete();
      return back()->with('success2', 'Job delete successfully');
   }

}
