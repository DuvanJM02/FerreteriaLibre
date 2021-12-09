<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;

class VendorController extends Controller
{

    public $storeId;
    public $nameStore;
    public $locationStore;
    public $phoneStore;
    public $emailStore;
    public $description;
    public $user;

    // public function index(){
    //     $vendedor = User::paginate();

    //     return view('producto.index', compact('proyectos'));
    // }

    // public function create(){
    //     return view('producto.crear-producto');
    // }

    public function store(Request $request)
    {

        $storeId = $request->storeId;
        $nameStore = $request->nameStore;
        $locationStore = $request->locationStore;
        $phoneStore = $request->phoneStore;
        $emailStore = $request->emailStore;
        $description = $request->description;

        $request->validate([
            'userId' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'phone' => 'required',
            'location' => 'required',
            'birthday' => 'required'
        ]);

        if ($storeId || $nameStore || $locationStore || $phoneStore || $emailStore || $description) {

            $request->validate([
                'storeId' => 'required',
                'nameStore' => 'required',
                'emailStore' => 'required|email',
                'phoneStore' => 'required',
                'locationStore' => 'required',
                'description' => 'required'
            ]);

            $tienda = new Store();

            $tienda->storeId = $storeId;
            $tienda->name = $nameStore;
            $tienda->location = $locationStore;
            $tienda->phone = $phoneStore;
            $tienda->email = $emailStore;
            $tienda->description = $description;

            $tienda->save();

            $vendedor = new User();

            $vendedor->userId = $request->userId;
            $vendedor->name = $request->name;
            $vendedor->email = $request->email;
            $vendedor->password = bcrypt($request->password);
            $vendedor->phone = $request->phone;
            $vendedor->role = 'Vendedor';
            $vendedor->location = $request->location;
            $vendedor->birthday = $request->birthday;
            $vendedor->storeId = $storeId;

            // $vendedor->name = $request->name;
            // $vendedor->category = $request->category;
            // $vendedor->description = $request->description;

            $vendedor->save();
        } else {

            $vendedor = new User();

            $vendedor->userId = $request->userId;
            $vendedor->name = $request->name;
            $vendedor->email = $request->email;
            $vendedor->password = bcrypt($request->password);
            $vendedor->phone = $request->phone;
            $vendedor->role = 'Vendedor';
            $vendedor->location = $request->location;
            $vendedor->birthday = $request->birthday;

            $vendedor->save();
        }
        // $vendedor = User::create($request->all()); 

        return redirect()->route('dashboard');
    }

    // public function show(Proyecto $producto){
    //     return view('producto.show', compact('producto'));
    // }

    // public function edit(Proyecto $producto){
    //     return view('producto.edit', compact('producto'));
    // }

    // public function update(Request $request, Proyecto $producto){
    //     $request->validate([
    //         'name' => 'required',
    //         'category' => 'required',
    //         'description' => 'required'
    //     ]);

    //     /*$producto->name = $request->name;
    //     $producto->category = $request->category;
    //     $producto->description = $request->description;

    //     $producto->save();*/

    //     $producto->update($request->all());

    //     return redirect()->route('productos.show', $producto);
    // }

    // public function destroy(Proyecto $producto){
    //     $producto->delete();

    //     return redirect()->route('productos.index');
    // }

    public function loginVendor(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $email = $request->email;
        $pass = $request->password;

        $user = User::where('email', $email)->first();

        // if($user->password == $pass){
        //     return redirect()->route('dashboard-vendor', $user);
        // }

        // return "Datos $user->name";

         return view('dashboard-vendor', compact('user'));

        // return redirect()->route('dashboard-vendor');
    }
}
