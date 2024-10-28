<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\SpecialInterest;
use App\Models\District;
use App\Models\Student;
use App\Models\Classes;
use App\Models\FeeCategory;
use App\Models\Media;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Models\Subdivisions;
class AdmissionController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:Delete Students', only: ['destroy']),
            new Middleware('permission:Edit Students', only: ['edit','update']),
            new Middleware('permission:Create Students', only: ['create','store']),
            new Middleware('permission:View Students', only: ['index','show','id_card']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view('student.admission.index',compact('students'));
    }

    public function fees_collection()
    {
        return view('camp.fees.index');
    }

    public function create_fees_collection()
    {
        return view('camp.fees.create');
    }

    public function fees_collection_history()
    {
        return view('camp.fees.fee_collection_history');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $districts = District::where('state_id',4853)->get();
        $categories = Categories::where('is_visible',1)->get();
        $special_interest =SpecialInterest::where('status',1)->get();
        $classes =Classes::where('status',1)->get();
        $subdivisions = Subdivisions::where('district_id', 13)->get(['id', 'name']);

        return view('student.admission.create',compact('categories','districts','special_interest','classes','subdivisions'));
    }

    public function getSubdivisions($district_id)
    {
        $Subdivisions = Subdivisions::where('district_id', $district_id)->get(['id', 'name']);
        return response()->json(['subdivisions' => $Subdivisions]);
    }

    public function getFeeByAge($age,$category_id)
    {
       
        $feeCategory = FeeCategory::where('min_age', '<=', $age)
        ->where('max_age', '>=', $age)
        ->where('category_id', $category_id)
        ->first();
 
    
        if ($feeCategory) {
            return response()->json(['feeCategory' => $feeCategory], 200);
        } else {
            return response()->json(['error' => 'No fee category found for this age'], 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // d($request->all());

        if ($request->isMethod('post')){
            try {
                // d($request->all());
                
             

                $validator = Validator::make($request->all(), [
                    'full_name' => 'required|string',
                    'guardian_name' => 'required|string',
                    'email' => 'required|email',
                    'mobile_number' => 'required|digits:10', 
                    'whatsapp_number' => 'nullable|digits:10',
                    'dob' => 'required|date',
                    'aadhar_card_no' => 'required|digits:12',
                    'school_portal_id' => 'required|string',
                    'class_id' => 'required|integer',
                    'category_id' => 'required|exists:categories,id',
                    'district_id' => 'required|integer',
                    'subdivision_id'=> 'required|integer',
                    'age' => 'required|integer|min:0',
                    'residential_address' => 'required|string',
                    'aadhar_proof' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                    'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                ]);


                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                $applicationId= $this->generateApplicationId();
                
                $rollNo = $this->generateRollNumber($request->category_id);

                // d($rollNo);

                $data = [
                    'application_id'=>$applicationId,
                    'roll_no'=>$rollNo,
                    'full_name' => $request->full_name,
                    'guardian_name' => $request->guardian_name,
                    'email' => $request->email,
                    'mobile_number' => $request->mobile_number,
                    'whatsapp_number'=> $request->whatsapp_number,
                    'dob' => $request->dob,
                    'age' => $request->age,
                    'sex' => $request->sex,
                    'aadhar_card_no' => $request->aadhar_card_no,
                    'height' => $request->height,
                    'weight' => $request->weight,
                    'school_portal_id' => $request->school_portal_id,
                    'uniform_size' => $request->uniform_size,
                    'class_id' => $request->class_id,
                    'interest_id' => $request->interest_id,
                    'category_id' => $request->category_id,
                    'district_id' => $request->district_id,
                    'subdivision_id'=> $request->subdivision_id,
                    'residential_address' => $request->residential_address,
                    'permanent_address' => $request->permanent_address,
                    'admission_fees' => $request->admission_fees,
                    'monthly_fees' => $request->monthly_fees,
                    'fee_category_id'=> $request->fee_category_id,
                    'status' => 1, 
                ];
                if ($request->hasFile('aadhar_proof')) {
                    $request->validate([
                        'aadhar_proof' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                    ]);
    
                    $aadharMediaId = $this->handleFileUpload($request->file('aadhar_proof'));
                    $data['aadhar_proof'] = $aadharMediaId;
                }
                if ($request->hasFile('profile_image')) {
                    $request->validate([
                        'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                    ]);
                    $profileMediaId = $this->handleFileUpload($request->file('profile_image'));
                    $data['profile_image'] = $profileMediaId;
                }

                $admission = Student::create($data);
                if ($admission->id) {
                    return redirect()->route('admin.student.admission.edit',$admission->id)->with('success', 'Successfully Sumbited.');   
                }

                
                
            } catch (\Exception $e) {
                return redirect()->back()->withErrors($e->getMessage())->withInput();
            }
        }
    }

    public function show(string $id)
    {
        $student = Student::find($id);
        if($student){
            return view('student.admission.show',compact('student'));
        }else{
            return redirect()->back()->withError(['error'=>'Student Not Found.']);
        }
    }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $districts = District::where('state_id',4853)->get();
        $categories = Categories::where('is_visible',1)->get();
        $special_interest =SpecialInterest::where('status',1)->get();
        $classes =Classes::where('status',1)->get();
        $data = Student::find($id);
        $subdivisions = Subdivisions::where('is_visible',1)->get(['id', 'name']);
        // d($data);
        return view('student.admission.edit',compact('data','categories','districts','special_interest','classes','subdivisions'));
    }

   
    public function update(Request $request)
    {
        if ($request->isMethod('post')) {
            try {
                $student = Student::findOrFail($request->id);
                $validator = Validator::make($request->all(), [
                    'full_name' => 'required|string',
                    'guardian_name' => 'required|string',
                    'email' => 'required|email',
                    'mobile_number' => 'required|digits:10', 
                    'whatsapp_number' => 'nullable|digits:10',
                    'dob' => 'required|date',
                    'aadhar_card_no' => 'required|digits:12',
                    'school_portal_id' => 'required|string',
                    'class_id' => 'required|integer',
                    'category_id' => 'required|exists:categories,id',
                    'district_id' => 'required|integer',
                    'subdivision_id'=> 'required|integer',
                    'age' => 'required|integer|min:0',
                    'residential_address' => 'required|string',
                    'permanent_address' => 'required|string',
                    'aadhar_proof' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                    'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $rollNo = $this->generateRollNumber($request->category_id);
                // Update student data
                $student->full_name = $request->full_name;
                $student->roll_no = $rollNo;
                $student->guardian_name = $request->guardian_name;
                $student->email = $request->email;
                $student->mobile_number = $request->mobile_number;
                $student->whatsapp_number = $request->whatsapp_number;
                $student->dob = $request->dob;
                $student->age = $request->age;
                $student->sex = $request->sex;
                $student->aadhar_card_no = $request->aadhar_card_no;
                $student->height = $request->height;
                $student->weight = $request->weight;
                $student->school_portal_id = $request->school_portal_id;
                $student->uniform_size = $request->uniform_size;
                $student->class_id = $request->class_id;
                $student->interest_id = $request->interest_id;
                $student->category_id = $request->category_id;
                $student->district_id = $request->district_id;
                $student->subdivision_id = $request->subdivision_id;
                $student->residential_address = $request->residential_address;
                $student->permanent_address = $request->permanent_address;
                $student->admission_fees = $request->admission_fees;
                $student->monthly_fees = $request->monthly_fees;
                $student->fee_category_id = $request->fee_category_id;
                
                if ($request->hasFile('aadhar_proof')) {


                    if ($student->aadhar_proof) {
                        $this->deleteFile($student->aadhar_proof);
                        $aadharMediaId = $this->handleFileUpload($request->file('aadhar_proof'));
                        $student->aadhar_proof = $aadharMediaId;
                    }
                
                    
                }

       
                if ($request->hasFile('profile_image')) {
                    if ($student->profile_image) {
                        $this->deleteFile($student->profile_image);
                        $profileMediaId = $this->handleFileUpload($request->file('profile_image'));
                        $student->profile_image = $profileMediaId;
                    }
                }

                $student->save();

                return redirect()->route('admin.student.admission.list')->with('success', 'Successfully Updated.');   

            } catch (\Exception $e) {
                return redirect()->back()->withErrors($e->getMessage())->withInput();
            }
        }

       
        $student = Student::findOrFail($id);
        return view('admin.students.edit', compact('student'));
    }

    private function generateApplicationId()
    {
        $baseNumber = 10000;

        $lastOrder = Student::orderBy('created_at', 'desc')->first();

        if ($lastOrder) {
            return $lastOrder->application_id + 1;
        }
        return $baseNumber;
    }

    private function generateRollNumber($category_id)
    {
        // Find the category
        $category = Categories::find($category_id);
        if (!$category) {
            throw new \Exception('Category not found');
        }
        $categoryFirstLetter = strtoupper(substr($category->name, 0, 1));
        $currentYear = date('Y');
        $lastStudent = Student::where('category_id', $category_id)
            ->whereYear('created_at', $currentYear)
            ->orderBy('id', 'desc')
            ->first();

    
        if ($lastStudent) {
            
            $lastRollNumber = (int) substr($lastStudent->roll_no, -3);
            $newRollNumber = $lastRollNumber + 1;
        } else {
           
            $newRollNumber = 1;
        }
        // Generate the roll number in the desired format: CategoryFirstLetter + Year + RollNumber (padded)
        $rollNo = $categoryFirstLetter .'C'. $currentYear . str_pad($newRollNumber, 3, '0', STR_PAD_LEFT);

        return $rollNo;
    }


    private function handleFileUpload($file)
    {
        $currentYear = date('Y');
        $currentMonth = date('m');
        $directoryPath = "uploads/media/{$currentYear}/{$currentMonth}";

        $fileName = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storeAs($directoryPath, $fileName, 'public');

        $media = Media::create([
            'file_type' => 'image',
            'file_name' => $fileName,
            'file_path' => $filePath,
            'status' => 1,
        ]);

        return $media->id; // Return media ID
    }

    private function deleteFile($mediaId)
    {
       
        $media = Media::find($mediaId);
        if ($media) {
            Storage::disk('public')->delete($media->file_path);
            $media->delete();
        }
    }

    public function details(string $id)
    {
        $data = Student::findOrFail($id);
        return view('student.admission.print_form',compact('data'));
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data= Student::find($id);
        if (!$data) {
            return redirect()->back()->withErrors(['error' => 'Student not found.'])->withInput();
        }

        if ($data) {
            $data->delete();
            return response()->json(['success' => 'Student Deleted Successfully']);
        } else {
            return response()->json(['error' => 'Student not deleted.'], 422);

        }
    }

    public function id_card(string $id)
    {
        $student= Student::find($id);

        return view('student.admission.id_card',compact('student'));
        
    }
}
