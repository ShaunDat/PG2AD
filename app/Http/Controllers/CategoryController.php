<?php

namespace App\Http\Controllers;
use App\Model\Category;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     function __construct()
    {
        $this->middleware('role:training|trainer');
    }

    public function index()
    {
        //  $category = Category::orderBy('id','DESC')->paginate();
        $category = Category::latest()->get();
        return view('category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'string|required',
        ]);
        $data=$request->all();

        // $create = Category::create($request->all());
        $create=Category::create($data);
        if ($create){
            return redirect(route('category.index'))->with('success', 'Category create successfully');
        }
        return back()->with('warning', 'Category could not be create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        // //  return view('category.edit', compact('category'));
        // $category=Category::find($id);
        // if(!$category){
        //     request()->session()->flash('error','Category not found');
        // }
        // return view('category.edit');

        return view('category.edit',compact('category'));

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Category $category)
    {
       
        // $category=Category::find($id);
        // $this->validate($request,[
        //     'title'=>'string|required',
        // ]);
        // $data=$request->all();
       
        // $status=$category->fill($data)->save();
        // if($status){
        //     request()->session()->flash('success','category successfully updated');
        // }
        // else{
        //     request()->session()->flash('error','Error, Please try again');
        // }
        // return redirect()->route('category.index');

        $request->validate([
            'title' => 'required|unique:categories,title,'. $category->id,
        ]);

        $update = $category->update($request->all());

        if ($update){
            return redirect(route('category.index'))->with('success', 'Category update successfully');
        }
        return back()->with('warning', 'Category could not be update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // if ($category->attendances->count() > 0){
        //     return back()->with('warning', 'Not allow to delete');
        // }

        // if ($category->delete()){
        //     return back()->with('success', 'Category delete successfully');
        // }
        // return back()->with('warning', 'category could not be delete');

        $category=Category::find($id);
        if($category){
            $status=$category->delete();
            if($status){
                request()->session()->flash('success','Category successfully deleted');
            }
            else{
                request()->session()->flash('error','Error, Please try again');
            }
            return redirect()->route('category.index');
        }
        else{
            request()->session()->flash('error','Category not found');
            return redirect()->back();
        }
    }
    
}
