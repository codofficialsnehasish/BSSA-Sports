<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ClassesController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:Create Class', only: ['create','store']),
            new Middleware('permission:View Class', only: ['index','show']),
            new Middleware('permission:Edit Class', only: ['edit','update']),
            new Middleware('permission:Delete Class', only: ['destroy']),
        ];
    }


    public function index()
    {
        $classes = Classes::all();
        return view('classes.index',compact('classes'));
    }

    public function create()
    {
        return view('classes.create');
    }

    public function store(Request $request)
    {
        $class = new Classes();
        $class->name = $request->class_name;
        $class->status = $request->status;
        $res = $class->save();

        if($res){
            return back()->with(['success'=>'Class Created Successfully']);
        }else{
            return back()->withErrors(['error'=>'Class Not Created']);
        }
    }

    public function show(Classes $classes)
    {
        //
    }

    public function edit(string $id)
    {
        $class = Classes::find($id);
        return view('classes.edit',compact('class'));
    }

    public function update(Request $request, string $id)
    {
        $class = Classes::find($id);
        $class->name = $request->class_name;
        $class->status = $request->status;
        $res = $class->update();

        if($res){
            return back()->with(['success'=>'Class Updated Successfully']);
        }else{
            return back()->withErrors(['error'=>'Class Not Updated']);
        }
    }

    public function destroy(Classes $classes)
    {
        $class = Classes::find($id);
        if($class){
            $res = $class->delete();

            if($res){
                return back()->with(['success'=>'Class Deleted Successfully']);
            }else{
                return back()->withErrors(['error'=>'Class Not Deleted']);
            }
        }else{
            return back()->withErrors(['error'=>'Class not found']);
        }
    }
}
