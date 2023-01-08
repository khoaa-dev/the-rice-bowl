<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Food;
use App\Models\FoodCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::orderBy('id', 'DESC')->paginate(10);
        foreach ($foods as $food) {
            $food->category = FoodCategory::where('id', $food->category_id)->first();
        }
        $i = 0;
        return view('admin.food.index')->with('foods', $foods)->with('i', $i);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = FoodCategory::all();
        return view('admin.food.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $food = new Food;
        $food->name = $request->name;
        $food->price = $request->price;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('public/front-end/images/', $fileName);
            $food->image = 'public/front-end/images/' . $fileName;
        }
        $food->category_id = $request->categoryId;
        $food->save();

        return back()->with('status', 'Thêm mới thành công!');
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
    public function edit($id)
    {
        $food = Food::find($id);
        $food->category = FoodCategory::where('id', $food->category_id)->first();
        $categories = FoodCategory::all();
        return view('admin.food.edit')->with('food', $food)
            ->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $food = Food::find($id);
        $food->name = $request->name;
        $food->price = $request->price;
        if ($request->hasFile('image')) {
            $destination = 'public/front-end/images/' . $food->image;
            if (Storage::exists($destination)) {
                Storage::delete($destination);
            }
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('public/front-end/images/', $fileName);
            $food->image = 'public/front-end/images/' . $fileName;
        }
        $food->category_id = $request->categoryId;
        $food->save();

        return back()->with('status', 'Cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $food = Food::find($id);
        $destination = 'public/front-end/images/' . $food->image;
        if (Storage::exists($destination)) {
            Storage::delete($destination);
        }

        try {
            $food->delete();
        } catch (Exception $exception) {
            return back()->with('status', 'Không thể xóa món ăn này!');
        }

        return back()->with('status', 'Xóa món ăn thành công!');
    }
}
