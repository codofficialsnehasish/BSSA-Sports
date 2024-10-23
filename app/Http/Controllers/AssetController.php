<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Transaction;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class AssetController extends Controller
{
    public function index(){
        $assets = Asset::all();
        return view('assets.index',compact('assets'));
    }

    public function create(){
        return view('assets.create');    
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'asset_name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:1',
            'remarks' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $asset = new Asset();
        $asset->title = $request->asset_name;
        $asset->amount = $request->amount;
        $asset->remarks = $request->remarks;
        $res = $asset->save();

        Transaction::create([
            'transaction_name' => $asset->title,
            'amount' => $asset->amount,
            'remarks' => $asset->remarks,
            'transaction_type' => 'credit'
        ]);

        if($res){
            return redirect()->back()->with('success', 'Asset Added Successfully.');
        }else{
            return redirect()->back()->withError(['error'=>'Asset Not Added.']);
        }
    }

    public function show(Asset $asset){
        
    }

    public function edit(string $id){
        $asset = Asset::find($id);
        if($asset){
            return view('assets.edit',compact('asset'));  
        }else{
            return redirect()->back()->withError(['error'=>'Asset Not Found.']);
        }
    }

    public function update(Request $request, string $id){
        $validator = Validator::make($request->all(), [
            'asset_name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'remarks' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $asset = Asset::find($id);
        $asset->title = $request->asset_name;
        $asset->amount = $request->amount;
        $asset->remarks = $request->remarks;
        $res = $asset->update();
        if($res){
            $transaction = Transaction::where('transaction_table_name','assets')->where('table_id',$asset->id)->first();
            $transaction->amount = $asset->amount;
            $transaction->remarks = $asset->remarks;
            $res = $transaction->update();

            if($res){
                return redirect()->back()->with('success', 'Asset Transaction Updated Successfully.');
            }else{
                return redirect()->back()->withError(['error'=>'Asset Transaction Not Updated.']);
            }
        }else{
            return redirect()->back()->withError(['error'=>'Expenses Not Updated.']);
        }
    }

    public function destroy(string $id)
    {
        $asset = Asset::find($id);
        if($asset){
            Transaction::where('transaction_table_name','assets')->where('table_id',$asset->id)->delete();
            $res = $asset->delete();
            if($res){
                return redirect()->back()->with('success', 'Asset Deleted Successfully.');
            }else{
                return redirect()->back()->withError(['error'=>'Asset Not Deleted.']);
            }
        }else{
            return redirect()->back()->withError(['error'=>'Asset Not Found.']);
        }
    }
}
