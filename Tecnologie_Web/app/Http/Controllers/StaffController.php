<?php

namespace App\Http\Controllers;

use App\Models\Resources\Product;
use App\Http\Requests\NewProductRequest;
use App\Http\Requests\ModifyProductRequest;
use App\Models\Staff;
use App\Models\Catalog;
use App\Http\Requests\NewCategoryRequest;
use App\Models\Resources\Category;
use Illuminate\Support\Facades\File;

class StaffController extends Controller {

    protected $_staffModel;
    protected $_catalogModel;

    public function __construct() {
        $this->middleware('can:isStaff');
        $this->_staffModel = new Staff;
        $this->_catalogModel = new Catalog;
    }

    public function index() {
        return view('staff');
    }

    public function addProduct() {
        $prodCats = $this->_staffModel->getProdsCats()->pluck('name', 'catId');
        return view('product.inserimento')
                        ->with('cats', $prodCats);
    }

    public function storeProduct(NewProductRequest $request) {

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
        } else {
            $imageName = NULL;
        }

        $product = new Product;
        $product->fill($request->validated());
        $product->image = $imageName;
        $product->save();

        if (!is_null($imageName)) {
            $destinationPath = public_path() . '/images/products';
            $image->move($destinationPath, $imageName);
        };

        return response()->json(['redirect' => route('staff')]);
    }

    public function showProducts() {
        $MacCats = $this->_catalogModel->getMacCats();

        $prods = $this->_catalogModel->getProdsByCat($MacCats->map->only(['catId']), 8, 'desc', false);

        return view('product.showProducts')
                        ->with('MacCategories', $MacCats)
                        ->with('products', $prods);
    }

    public function deleteProduct($prodId) {
        $product = Product::where('prodId', $prodId);
        if ($product->first()->image != null) {
            $imagepath = public_path("images/products/{$product->first()->image}");
            File::delete($imagepath);
        }
        $product->delete();
        return redirect()->route('showProducts');
    }

    public function editProduct($prodId) {
        $product = Product::where('prodId', $prodId)->get()->first();
        $prodCats = $this->_staffModel->getProdsCats()->pluck('name', 'catId');
        $discounted = $this->_staffModel->getDiscounted();
        return view('product.modificaProdotto')
                        ->with('product', $product)
                        ->with('cats', $prodCats)
                        ->with('discounted', $discounted);
    }

    public function confermamodifica($prodId, ModifyProductRequest $request) {
        $product = Product::where('prodId', $prodId)->get()->first();
        if ($request->hasFile('image')) {
            $imagepath = public_path("images/products/{$product->image}");
            File::delete($imagepath);
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
        } else {
            $imageName = $product->image;
            $image = null;
        }

        $product->fill($request->validated());
        $product->image = $imageName;
        $product->save();

        if (!is_null($imageName) && !is_null($image)) {
            $destinationPath = public_path() . '/images/products';
            $image->move($destinationPath, $imageName);
        };

        return response()->json(['redirect' => route('staff')]);
    }

    public function insertcatform() {
        $macro = Category::where('parId', '0')->pluck('name','catId');
        return view('gestionestaff.inserisciCategoria')
        ->with('macro', $macro);
    }

    public function insertcat(NewCategoryRequest $request) {
        
         if ($request->input('sceltaCat') == '1') {
            $category = new Category;
            $category->fill($request->validated());
            $category->image = null;
            $category->parId = $request->input('sceltaMic');
            $category->save();
         }
        if ($request->input('sceltaCat') == '0') {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = $image->getClientOriginalName();
            } else {
                $imageName = NULL;
            }

            $category = new Category;
            $category->fill($request->validated());
            $category->image = $imageName;
            $category->parId = 0;
            $category->save();


            if (!is_null($imageName)) {
                $destinationPath = public_path() . '/css/images';
                $image->move($destinationPath, $imageName);
            };
        }

        return redirect()->action('StaffController@index');
    }


}
