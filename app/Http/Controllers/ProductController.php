<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Faker\Core\File;
use Faker\Provider\File as ProviderFile;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'size' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'state' => 'required',
            'vendorId' => 'required',
            'photo' => 'required|image|mimes:jpg,jpeg,png,svg|max:2048',
            'portada1' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'portada2' => 'image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'portada3' => 'image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->category = $request->category;
        $product->description = $request->description;
        $product->size = $request->size;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->state = $request->state;
        $product->vendorId = $request->vendorId;

        $image = $request->file('photo');
        $nameFoto = time() . '.' . $image->getClientOriginalExtension();
        $destino = public_path('/images/products');
        $request->photo->move($destino, $nameFoto);

        $product->photo_path = '/images/products/' . $nameFoto;

        $image = $request->file('photo');
        $nameFoto = time() . '.' . $image->getClientOriginalExtension();
        $destino = public_path('/images/products/portadas/'.$request->vendorId);
        $request->portada1->move($destino, $nameFoto);

        $product->portada1 = '/images/products/portadas/' . $request->vendorId . '/' . $nameFoto;

        if ($request->portada2) {
            $image = $request->file('photo');
            $nameFoto = time() . '_2' . '.' . $image->getClientOriginalExtension();
            $destino = public_path('/images/products/portadas/'.$request->vendorId);
            $request->portada2->move($destino, $nameFoto);

            $product->portada2 = '/images/products/portadas/' . $request->vendorId . '/' . $nameFoto;
        }

        if ($request->portada3) {
            $image = $request->file('photo');
            $nameFoto = time() . '_3' . '.' . $image->getClientOriginalExtension();
            $destino = public_path('/images/products/portadas/'.$request->vendorId);
            $request->portada3->move($destino, $nameFoto);

            $product->portada3 = '/images/products/portadas/' . $request->vendorId . '/' . $nameFoto;
        }

        if ($request->storeId) {
            $product->storeId = $request->storeId;
        }

        // dd('si se subió');
        $product->save();

        return redirect()->route('dashboard');
    }

    public function showProducts(Product $product)
    {
        return view('vendors.vendor-view', compact('product'));
    }

    public function showProductsIndex(Product $products)
    {
        $products = Product::paginate();

        return view('product.show', compact('products'));
    }

    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
        // return view('product.edit');
    }

    public function show(Product $product)
    {
        return view('product.show', compact('product'));
        // return view('product.edit');
    }

    public function update(Request $request, Product $product){
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'size' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'vendorId' => 'required',
            'photo' => 'image|mimes:jpg,jpeg,png,svg|max:2048',
            'portada1' => 'image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'portada2' => 'image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'portada3' => 'image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        if ($request->photo) {
            unlink(public_path($product->photo_path));

            $image = $request->file('photo');
            $nameFoto = time() . '.' . $image->getClientOriginalExtension();
            $destino = public_path('/images/products');
            $request->photo->move($destino, $nameFoto);

            $request->photo = '/images/products/' . $nameFoto;
            $product->photo_path = $request->photo;
        }

        // if ($request->portada1) {
        //     unlink(public_path($product->portada1));

        //     $image = $request->file('portada1');
        //     $nameFoto = time() . '.' . $image->getClientOriginalExtension();
        //     $destino = public_path('/images/products/portadas/'.$request->vendorId);
        //     $request->photo->move($destino, $nameFoto);

        //     $request->portada1 = '/images/products/portadas/' . $request->vendorId . '/' . $nameFoto;
        //     $product->portada1 = $request->portada1;
        // }

        // if ($request->portada2) {
        //     $image = $request->file('photo');
        //     $nameFoto = time() . '_2' . '.' . $image->getClientOriginalExtension();
        //     $destino = public_path('/images/products/portadas/'.$request->vendorId);
        //     $request->portada2->move($destino, $nameFoto);

        //     $request->portada2 = '/images/products/portadas/' . $request->vendorId . '/' . $nameFoto;
        //     $product->portada2 = $request->portada2;
        // }

        // if ($request->portada3) {
        //     $image = $request->file('photo');
        //     $nameFoto = time() . '_3' . '.' . $image->getClientOriginalExtension();
        //     $destino = public_path('/images/products/portadas/'.$request->vendorId);
        //     $request->portada3->move($destino, $nameFoto);

        //     $product->portada3 = '/images/products/portadas/' . $request->vendorId . '/' . $nameFoto;
        // }

        if ($request->storeId) {
            $request->storeId = $request->storeId;
        }

        $product->update($request->all());

        return redirect()->route('dashboard');
    }

    public function search(User $user, Product $products, Request $request)
    {
        $products = Product::where('name', 'like', '%' . $request->search . '%' )->where('vendorId', $user->userId)->get();

        return view('vendors.search', compact('products'));
    }

    public function searchProduct(Product $products, Request $request)
    {
        $products = Product::where('name', 'like', '%' . $request->search . '%' )->where('state', 1)->get();

        return view('product.search', compact('products'));
    }

    public function destroy(Product $product){
        unlink(public_path($product->photo_path));
        unlink(public_path($product->portada1));

        if ($product->portada2) {
            unlink(public_path($product->portada2));
        }

        if($product->portada3){
            unlink(public_path($product->portada3));
        }

        $product->delete();
        return redirect()->route('dashboard');
    }
}
