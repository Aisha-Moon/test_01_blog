<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryFormRequest;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {    //option 1
        $data['categories']=Category::all();
        return view('backend.category.index', $data);

        //option 2
        // $categories=Category::all();
        // return view('backend.category.index',['categories'=>$categories]);

        //option 3
        // $categories=Category::all();
        // return view('backend.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryFormRequest $request)
    {
        $request->validated();
    //    dd($request->all());
    // $request->validate([
    // 'name' => 'required|max:255',
    // 'description' => 'required',
    //     ],[
    //         'name.required'=>"Name must be filled up",
    //         'description.required'=>"Description must be filled up",
    //     ]);
        $data['name'] = $request->name;
        $data['description'] = $request->description;
        Category::create([
            'name'=>$request->name,
            'description'=>$request->description,
        ]);
        //option 1
        // $request->session()->flash('success', 'Category created successfull.');
        //option 2
        // session()->flash('success', 'Category created successfull.');
        //option 3
        // Session::flash('success', 'Category created successfull.');
        // return redirect()->route('categories.index');

        

        return redirect()->route('categories.index')->with('success','Category created successfull');

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {   //option 1

        $data['category'] = $category;
        return view('backend.category.show', $data);

      //option 2

        // return view('backend.category.show', ['category'=>$category]);

      //option 3
        return view('backend.category.show', compact('$category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //option 1

        $data['category'] = $category;
        return view('backend.category.edit', $data);

      //option 2

        // return view('backend.category.edit', ['category'=>$category]);

      //option 3
        // return view('backend.category.edit', compact('$category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryFormRequest $request, Category $category)
    {

        $request->validated();
        //option 1
       //    dd($request->all());
        $data['name'] = $request->name;
        $data['description'] = $request->description;
        $category -> update($data);
        return redirect()->route('categories.index');
 //option 2
        // Category::where ('id',$category->id)->update([
        //     'name'=>$request->name,
        //     'description'=>$request->description,
        // ]);

        // return redirect()->route('categories.index');
     //option 3
        // $category->update($request->all());  
        // return redirect()->route('categories.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
         return redirect()->route('categories.index');

    }
}
