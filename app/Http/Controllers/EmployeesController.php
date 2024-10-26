<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

use App\Models\User; 
use App\Models\Media;
use App\Models\SalaryConfiguration;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\File;

class EmployeesController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:Delete Employee', only: ['delete']),
            new Middleware('permission:Edit Employee', only: ['edit','update_process']),
            new Middleware('permission:Create Employee', only: ['add_new','process']),
            new Middleware('permission:View Employee', only: ['index']),
        ];
    }

    public function index(){
        $employees = User::orderBy('id','desc')->get();
        return view('employees.contents',compact('employees'));
    }

    public function add_new(){
        $roles = Role::all();
        return view('employees.add',compact('roles'));
    }

    public function process(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|digits:10|regex:/^[6789]/|unique:users,phone',
            'password' => 'required|min:8',
            'roles' => 'nullable|exists:roles,name',
            'employee_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:1,0'
        ], [
            'employee_image.max' => 'The Employee Image must not be larger than 2 MB.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }else{
            $employee = new User();
            $employee->name = $request->name;
            $employee->status = $request->status;
            $employee->email = $request->email;
            $employee->phone = $request->mobile;
            $employee->password = bcrypt($request->password);
            $employee->syncRoles($request->roles);

            if ($request->hasFile('employee_image')) {

                $currentYear = date('Y');
                $currentMonth = date('m');
                $directoryPath = "uploads/media/{$currentYear}/{$currentMonth}";

                $fileName = hexdec(uniqid()) . '.' . $request->employee_image->getClientOriginalExtension();
                $filePath = $request->file('employee_image')->storeAs($directoryPath, $fileName, 'public');
                // $fileName = $request->file('aadhar_proof')->getClientOriginalName();

                $media = Media::create([
                    'file_type' => 'image',
                    'file_name' => $fileName,
                    'file_path' => $filePath,
                    'status' => 1,
                ]);

                $employee->profile_image = $media->id;
            }


            $res = $employee->save();
            if($res){
                return redirect()->route('employee.edit',$employee->id)->with('success','Employee Added Successfully');
            }else{
                return back()->with('success','Employee Not Added');
            }
        }
    }

    public function edit(Request $request){
        $employee = User::find($request->id);
        $roles = Role::all();
        return view('employees.edit',compact('employee','roles'));
    }

    public function update_process(Request $request){
        // return $request->all();
        $employee = User::find($request->id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($employee->id),
            ],
            'mobile' => [
                'required',
                'digits:10',
                'regex:/^[6789]/',
                Rule::unique('users', 'phone')->ignore($employee->id),
            ],
            'password' => 'nullable|min:8',
            'roles' => 'nullable|exists:roles,name',
            'employee_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:1,0'
        ], [
            'employee_image.max' => 'The Employee Image must not be larger than 2 MB.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }else{
            $employee->name = $request->name;
            $employee->status = $request->status;
            $employee->email = $request->email;
            $employee->phone = $request->mobile;
            $employee->syncRoles($request->roles);

            if ($request->hasFile('employee_image')) {
                $currentYear = date('Y');
                $currentMonth = date('m');
                $directoryPath = "uploads/media/{$currentYear}/{$currentMonth}";

                $fileName = hexdec(uniqid()) . '.' . $request->employee_image->getClientOriginalExtension();
                $filePath = $request->file('employee_image')->storeAs($directoryPath, $fileName, 'public');
                // $fileName = $request->file('employee_image')->getClientOriginalName();

                if ($employee->profile_image) {
                
                    $media= Media::find($employee->profile_image);
                    if ($media->file_path) {
                        if(File::exists($media->file_path))
                        {
                            File::delete($media->file_path);
                        }
                    }
      
                    $media->file_type ='image' ;
                    $media->file_name = $fileName ;
                    $media->file_path = $filePath ;
                    $media->status = 1;
                    $media->save();
                }else{
                    $media = Media::create([
                        'file_type' => 'image',
                        'file_name' => $fileName,
                        'file_path' => $filePath,
                        'status' => 1,
                    ]);
    
                    $employee->profile_image = $media->id;
                }

                
            }


            // Personal Details
            $employee->blood_group = $request->blood_group;
            $employee->date_of_birth = $request->dob;
            $employee->gender = $request->gender;
            $employee->marital_status = $request->marital_status;
            $employee->nationality = $request->nationality;
            $employee->religion = $request->religion;
            $employee->aadhaar_number = $request->aadhaar_number;
            $employee->pan_card_number = $request->pan_card_number;

            if ($request->hasFile('aadhar_proof')) {
                $currentYear = date('Y');
                $currentMonth = date('m');
                $directoryPath = "uploads/media/{$currentYear}/{$currentMonth}";

                $fileName = hexdec(uniqid()) . '.' . $request->aadhar_proof->getClientOriginalExtension();
                $filePath = $request->file('aadhar_proof')->storeAs($directoryPath, $fileName, 'public');
                // $fileName = $request->file('aadhar_proof')->getClientOriginalName();

                if ($employee->aadhar_proof) {
                    $media= Media::find($employee->aadhar_proof);
                    if ($media->file_path) {
                        if(File::exists($media->file_path))
                        {
                            File::delete($media->file_path);
                        }
                    }
                    $media->file_type ='image' ;
                    $media->file_name = $fileName ;
                    $media->file_path = $filePath ;
                    $media->status = 1;
                    $media->save();
                }else{
                    $media = Media::create([
                        'file_type' => 'image',
                        'file_name' => $fileName,
                        'file_path' => $filePath,
                        'status' => 1,
                    ]);
                    $employee->aadhaar_image = $media->id;
                }
            }

            if ($request->hasFile('pan_card_proof')) {
                $currentYear = date('Y');
                $currentMonth = date('m');
                $directoryPath = "uploads/media/{$currentYear}/{$currentMonth}";

                $fileName = hexdec(uniqid()) . '.' . $request->pan_card_proof->getClientOriginalExtension();
                $filePath = $request->file('pan_card_proof')->storeAs($directoryPath, $fileName, 'public');
                // $fileName = $request->file('pan_card_proof')->getClientOriginalName();

                if ($employee->pan_card_proof) {
                    $media= Media::find($employee->pan_card_proof);
                    if ($media->file_path) {
                        if(File::exists($media->file_path))
                        {
                            File::delete($media->file_path);
                        }
                    }
                    $media->file_type ='image' ;
                    $media->file_name = $fileName ;
                    $media->file_path = $filePath ;
                    $media->status = 1;
                    $media->save();
                }else{
                    $media = Media::create([
                        'file_type' => 'image',
                        'file_name' => $fileName,
                        'file_path' => $filePath,
                        'status' => 1,
                    ]);
                    $employee->pan_card_proof = $media->id;
                }
            }

            $employee->pin_code = $request->pin_code;
            $employee->address = $request->address;


            // Sallary Details
            if ($request->filled(['base_salary', 'provident_fund', 'health_insurance', 'income_tax', 'other_deductions', 'paying_in_hand'])) {
                
                if(SalaryConfiguration::where('user_id',$employee->id)->exists()){
                    //update
                    $salary = SalaryConfiguration::where('user_id',$employee->id)->first();
                    $salary->user_id = $employee->id;
                    $salary->base_salary = $request->base_salary;
                    $salary->provident_fund = $request->provident_fund;
                    $salary->health_insurance = $request->health_insurance;
                    $salary->income_tax = $request->income_tax;
                    $salary->other_deductions = $request->other_deductions;
                    $salary->paying_in_hand = $request->paying_in_hand;
                    $salary->update();
                }else{
                    //create new
                    $salary = new SalaryConfiguration();
                    $salary->user_id = $employee->id;
                    $salary->base_salary = $request->base_salary;
                    $salary->provident_fund = $request->provident_fund;
                    $salary->health_insurance = $request->health_insurance;
                    $salary->income_tax = $request->income_tax;
                    $salary->other_deductions = $request->other_deductions;
                    $salary->paying_in_hand = $request->paying_in_hand;
                    $salary->save();
                }
                
            }

            // Bank Details
            $employee->bank_ac_number = $request->bank_ac_number;
            $employee->bank_name = $request->bank_name;
            $employee->ifsc_code = $request->ifsc_code;

            if ($request->hasFile('bank_passbook')) {
                $currentYear = date('Y');
                $currentMonth = date('m');
                $directoryPath = "uploads/media/{$currentYear}/{$currentMonth}";

                $fileName = hexdec(uniqid()) . '.' . $request->bank_passbook->getClientOriginalExtension();
                $filePath = $request->file('bank_passbook')->storeAs($directoryPath, $fileName, 'public');
                // $fileName = $request->file('bank_passbook')->getClientOriginalName();

                if ($employee->bank_passbook) {
                    $media= Media::find($employee->passbook_image);
                    if ($media->file_path) {
                        if(File::exists($media->file_path))
                        {
                            File::delete($media->file_path);
                        }
                    }
                    $media->file_type ='image' ;
                    $media->file_name = $fileName ;
                    $media->file_path = $filePath ;
                    $media->status = 1;
                    $media->save();
                }else{
                    $media = Media::create([
                        'file_type' => 'image',
                        'file_name' => $fileName,
                        'file_path' => $filePath,
                        'status' => 1,
                    ]);
                    $employee->passbook_image = $media->id;
                }
            }

            $res = $employee->update();
            if($res){
                return back()->with(['success'=>'Employee Updated Successfully']);
            }else{
                return back()->with(['success'=>'Employee Not Updated']);
            }
        }
    }

    public function delete(Request $request){
        $employee = User::find($request->id);
        if($employee){
            if ($employee->profile_image) {
                $media = Media::find($employee->profile_image);
                if ($media->file_path) {
                    if(File::exists($media->file_path)){
                        File::delete($media->file_path);
                    }
                    $media->delete();
                }
            }
            $res = $employee->delete();
            if($res){
                return back()->with(['success'=>'Employee Deleted Successfully']);
            }else{
                return back()->with(['error'=>'Employee Not Deleted']);
            }
        }else{
            return back()->with(['error'=>'Employee Not Found']);
        }
    }
}