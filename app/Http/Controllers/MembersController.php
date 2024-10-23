<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Categories;
use App\Models\Members;
use App\Models\District;
use App\Models\MemberCategory;
use App\Models\Media;
use App\Models\MemberTransaction;
use App\Models\Transaction;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class MembersController extends Controller
{
    public function index()
    {
        $members = Members::all();
        return view('members.member.index',compact('members'));
    }

    public function create()
    {
       $districts = District::where('state_id',4853)->get();
       $categories = Categories::where('is_visible',1)->get();
       $member_category =  MemberCategory::where('status',1)->get();
        return view('members.member.create',compact('districts','categories','member_category'));
    }

    public function store(Request $request)
    {
        
        if ($request->isMethod('post')){
            try {
                // d($request->all());
                
                $validator =  Validator::make($request->all(), [
                    'member_cat_id'=> 'required|exists:member_categories,id',
                    'category_id' => 'required|exists:categories,id',
                    'full_name' => 'required',
                    'email' => 'required|unique:members,email',
                    'mobile_number' => 'required|unique:members,mobile_number',
                    'dob' => 'required',
                    'age' => 'required',
                    'address' => 'required',
                    'district_id' => 'required'
                ]);


                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $data = [
                    'member_cat_id' => $request->member_cat_id,
                    'father_name'=>$request->father_name,
                    'full_name' => $request->full_name,
                    'email' => $request->email,
                    'mobile_number' => $request->mobile_number,
                    'whatsapp_number' => $request->whatsapp_number,
                    'dob' => $request->dob,
                    'age' => $request->age,
                    'aadhar_card_no' => $request->aadhar_card_no,
                    'address' => $request->address,
                    'category_id' => $request->category_id,
                    'district_id' => $request->district_id,
                    'is_visible' => $request->is_visible,
                ];
                if ($request->hasFile('aadhar_proof')) {
                    $request->validate([
                        'aadhar_proof' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                    ]);
    
                    $currentYear = date('Y');
                    $currentMonth = date('m');
                    $directoryPath = "uploads/media/{$currentYear}/{$currentMonth}";
    
                    $fileName = hexdec(uniqid()) . '.' . $request->aadhar_proof->getClientOriginalExtension();
                    $filePath = $request->file('aadhar_proof')->storeAs($directoryPath, $fileName, 'public');
                    $fileName = $request->file('aadhar_proof')->getClientOriginalName();
    
                    $media = Media::create([
                        'file_type' => 'image',
                        'file_name' => $fileName,
                        'file_path' => $filePath,
                        'status' => 1,
                    ]);
    
                    $data['aadhar_proof'] = $media->id;
                }
                if ($request->hasFile('profile_image')) {
                    $request->validate([
                        'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                    ]);
    
                    $currentYear = date('Y');
                    $currentMonth = date('m');
                    $directoryPath = "uploads/media/{$currentYear}/{$currentMonth}";
    
                    $fileName = hexdec(uniqid()) . '.' . $request->profile_image->getClientOriginalExtension();
                    $filePath = $request->file('profile_image')->storeAs($directoryPath, $fileName, 'public');
                    $fileName = $request->file('profile_image')->getClientOriginalName();
    
                    $media = Media::create([
                        'file_type' => 'image',
                        'file_name' => $fileName,
                        'file_path' => $filePath,
                        'status' => 1,
                    ]);
    
                    $data['profile_image'] = $media->id;
                }

                $members = Members::create($data);
                $res = $members->update(['member_id' => generate_member_id($members->id)]);
                if ($members->id) {
                    return redirect()->route('admin.members.edit',$members->id)->with('success', 'Members Created Successfully.');   
                }

                
                
            } catch (\Exception $e) {
                return redirect()->back()->withErrors($e->getMessage())->withInput();
            }
        }
    }

    public function show(string $id)
    {
        $member = Members::find($id);
        if($member){
            return view('members.member.show',compact('member'));
        }else{
            return redirect()->back()->withError(['error'=>'Member Not Found.']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Members::find($id);
        $districts = District::where('state_id',4853)->get();
        $categories = Categories::where('is_visible',1)->get();
        $member_category =  MemberCategory::where('status',1)->get();
        return view('members.member.edit',compact('data','districts','categories','member_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        
        if ($request->isMethod('post')){
            try {
                // d($request->all());
                $members= Members::find($request->id);
                $members->member_cat_id = $request->member_cat_id;
                $members->full_name = $request->full_name;
                $members->father_name = $request->father_name;
                $members->email = $request->email;
                $members->mobile_number = $request->mobile_number;
                $members->whatsapp_number = $request->whatsapp_number;
                $members->dob = $request->dob;
                $members->age = $request->age;
                $members->aadhar_card_no = $request->aadhar_card_no;
                $members->address = $request->address;
                $members->category_id = $request->category_id;
                $members->district_id = $request->district_id;
                $members->status = $request->status;

                if ($request->hasFile('aadhar_proof')) {
                    $request->validate([
                        'aadhar_proof' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                    ]);
    
                    $currentYear = date('Y');
                    $currentMonth = date('m');
                    $directoryPath = "uploads/media/{$currentYear}/{$currentMonth}";
    
                    $fileName = hexdec(uniqid()) . '.' . $request->aadhar_proof->getClientOriginalExtension();
                    $filePath = $request->file('aadhar_proof')->storeAs($directoryPath, $fileName, 'public');
                    $fileName = $request->file('aadhar_proof')->getClientOriginalName();
    
                    if ($members->aadhar_proof) {
                    
                        $media= Media::find($members->aadhar_proof);
                        if ($media->file_path) {
                            if(File::exists($media->file_path))
                            {
                                File::delete($media->file_path);
                            }
                        }
          
                        $media->file_type ='image' ;
                        $media->file_name = $fileName ;
                        $media->file_path = $filePath ;
                        $media->status =1 ;
                        $media->save();
                     }else{
                        $media = Media::create([
                            'file_type' => 'image',
                            'file_name' => $fileName,
                            'file_path' => $filePath,
                            'status' => 1,
                        ]);
        
                        $members->aadhar_proof = $media->id;
                    }
    
                    
                }
                if ($request->hasFile('profile_image')) {
                    $request->validate([
                        'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                    ]);
    
                    $currentYear = date('Y');
                    $currentMonth = date('m');
                    $directoryPath = "uploads/media/{$currentYear}/{$currentMonth}";
    
                    $fileName = hexdec(uniqid()) . '.' . $request->profile_image->getClientOriginalExtension();
                    $filePath = $request->file('profile_image')->storeAs($directoryPath, $fileName, 'public');
                    $fileName = $request->file('profile_image')->getClientOriginalName();


                    if ($members->profile_image) {
                    
                        $media= Media::find($members->profile_image);
                        if ($media->file_path) {
                            if(File::exists($media->file_path))
                            {
                                File::delete($media->file_path);
                            }
                        }
                        $media->file_type ='image' ;
                        $media->file_name = $fileName ;
                        $media->file_path = $filePath ;
                        $media->status = 1 ;
                        $media->save();
                     }else{
                        $media = Media::create([
                            'file_type' => 'image',
                            'file_name' => $fileName,
                            'file_path' => $filePath,
                            'status' => 1,
                        ]);
        
                        $members->profile_image = $media->id;
                    }
    
                }

                if ($members->save()) {
                    return redirect()->back()->with('success', 'Members Updated Successfully.');   
                }

                
                
            } catch (\Exception $e) {
                return redirect()->back()->withErrors($e->getMessage())->withInput();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $member = Members::find($id);
        if (!$member) {
            return redirect()->back()->withErrors(['error' => 'Member not found.'])->withInput();
        }
        if ($member) {
            $member->delete();

            return response()->json(['success' => 'Member Deleted Successfully']);
        } else {
            return response()->json(['error' => 'You cannot delete this catgory because it has associated members.'], 422);

        }
    }

    public function id_card(string $id)
    {
        $member= Members::find($id);

        return view('members.member.id_card',compact('member'));
        
    }

    public function get_category_data(Request $request){
        $member_category = MemberCategory::find($request->category_id);
        if($member_category){
            return response()->json($member_category);
        }else {
            return response()->json(['error' => 'Member Category Not found'], 422);
        }
    }


    public function make_payment(Request $request){
        $member = Members::find($request->member_id);
        if($member){
            $transaction_category_name = '';
            if(empty($member->subscription_end_date)){
                if($member->member_category->type == 'lifetime'){
                    $transaction_category_name = 'Life Membership';
                }elseif($member->member_category->type == 'renewal'){
                    $transaction_category_name = 'General Membership';
                }
            }else{
                if($member->member_category->type == 'renewal'){
                    $transaction_category_name = 'Renewal of Membership';
                }
            }

            $member_transaction = new MemberTransaction();
            $member_transaction->member_id = $member->id;
            $member_transaction->amount = $request->payment_amount;
            $member_transaction->payment_mode = $request->payment_mode;
            $member_transaction->transaction_id = $request->transaction_id;
            $member_transaction->remarks = $request->remarks;
            if ($request->hasFile('payment_proof')) {
                $request->validate([
                    'payment_proof' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                ]);

                $aadharMediaId = handleFileUpload($request->file('payment_proof'));
                $member_transaction->payment_proof = $aadharMediaId;
            }
            $res = $member_transaction->save();

            Transaction::create([
                'transaction_name' => 'Membership',
                'transaction_category_name' => $transaction_category_name,
                'amount' => $member_transaction->amount,
                'remarks' => $member_transaction->remarks,
                'transaction_type' => 'credit'
            ]);

            if($member->member_cat_id == 2){
                $member->subscription_end_date = Carbon::now()->addYears(100)->format('Y-m-d');
            }else{
                $member->subscription_end_date = Carbon::now()->addYear()->format('Y-m-d');
            }

            $member->status = 1;
            $member->update();

            if($res){
                return redirect()->back()->with('success', 'Payment Successfull.');
            }else{
                return redirect()->back()->with('error', 'Error.');
            }
        }else{
            return redirect()->back()->withErrors(['error' => 'Member not found.']);
        }
    }
}
