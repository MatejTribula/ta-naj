<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function product()
    {
        return view('admin.product');
    }

    public function uploadProduct(Request $request)
    {
        $data = new product;

        $image = $request->file;
        $imagename = time() . '.' . $image->getClientOriginalExtension();

        $request->file->move('productimage', $imagename);

        $data->image = $imagename;

        //last word is name from the input
        $data->title = $request->title;
        $data->type = $request->type;
        $data->color = $request->color;
        $data->price = $request->price;
        $data->description = $request->desc;
        $data->quantity = $request->quantity;


        $data->save();

        return redirect()->back()->with('message', 'Product Added Successfully');
    }



    public function showProducts()
    {
        $data = product::all();

        return view('admin.show-products', compact('data'));
    }


    public function deleteProduct($id)
    {
        $data = product::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Product Deleted Successfully');
    }

    public function updateView($id)
    {
        $data = product::find($id);
        return view('admin.update-view', compact('data'));
    }



    public function updateProduct(Request $request, $id)
    {
        $data = product::find($id);

        $image = $request->file;

        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $request->file->move('productimage', $imagename);

            $data->image = $imagename;
        }

        //last word is name from the input
        $data->title = $request->title;
        $data->type = $request->type;
        $data->color = $request->color;
        $data->price = $request->price;
        $data->description = $request->desc;
        $data->quantity = $request->quantity;


        $data->save();

        return redirect()->back()->with('message', 'Product Updated Successfully');
    }



    public function showOrders()
    {
        $data = Order::all();

        return view('admin.show-orders', compact('data'));
    }
}
