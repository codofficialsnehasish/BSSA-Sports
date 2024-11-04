<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Transaction;
use App\Models\AssetsCategory;
use App\Models\Categories;
use App\Models\TournamentCategory;
use Illuminate\Http\Request;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

use Illuminate\Support\Facades\Validator;

class AssetController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:Delete Asset', only: ['destroy']),
            new Middleware('permission:Edit Asset', only: ['edit','update']),
            new Middleware('permission:Create Asset', only: ['create','store']),
            new Middleware('permission:View Asset', only: ['index','show','invoice']),
        ];
    }

    public function index(){
        $assets = Asset::orderBy('id','desc')->get();
        return view('assets.index',compact('assets'));
    }

    public function create(){
        $categories = Categories::where('is_visible',1)->get();  
        $tournament_categorys = TournamentCategory::where('status',1)->get();
        $assets_categorys = AssetsCategory::where('visiblity',1)->get();
        return view('assets.create',compact('assets_categorys','tournament_categorys'));    
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
        $asset->memo_no = $request->memo_no;
        $asset->assets_category_id = $request->asset_name;
        $asset->amount = $request->amount;
        $asset->remarks = $request->remarks;
        $res = $asset->save();

        if(!empty($request->tournament_category_id)){
            $tournament_category = TournamentCategory::find($request->tournament_category_id);
            if($tournament_category){
                Transaction::create([
                    'transaction_name' => $tournament_category->name,
                    'transaction_category_name' => $asset->category->name,
                    'amount' => $asset->amount,
                    'remarks' => $asset->remarks,
                    'transaction_type' => 'credit'
                ]);
            }
        }else{
            Transaction::create([
                'transaction_name' => $asset->category->name,
                'amount' => $asset->amount,
                'remarks' => $asset->remarks,
                'transaction_type' => 'credit'
            ]);
        }

        if($res){
            return redirect()->back()->with('success', 'Asset Added Successfully.');
        }else{
            return redirect()->back()->withError(['error'=>'Asset Not Added.']);
        }
    }

    public function show(Asset $asset){
        
    }

    public function invoice(string $id){
        $asset = Asset::find($id);
        if($asset){
            return view('assets.invoice',compact('asset'));  
        }else{
            return redirect()->back()->withError(['error'=>'Asset Not Found.']);
        }
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
        $asset->assets_category_id = $request->asset_name;
        $asset->amount = $request->amount;
        $asset->remarks = $request->remarks;
        $res = $asset->update();
        if($res){
            // $transaction = Transaction::where('transaction_table_name','assets')->where('table_id',$asset->id)->first();
            // $transaction->amount = $asset->amount;
            // $transaction->remarks = $asset->remarks;
            // $res = $transaction->update();

            if($res){
                return redirect()->back()->with('success', 'Asset Updated Successfully.');
            }else{
                return redirect()->back()->withError(['error'=>'Asset Not Updated.']);
            }
        }else{
            return redirect()->back()->withError(['error'=>'Asset Not Updated.']);
        }
    }

    public function destroy(string $id)
    {
        $asset = Asset::find($id);
        if($asset){
            // Transaction::where('transaction_table_name','assets')->where('table_id',$asset->id)->delete();
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
