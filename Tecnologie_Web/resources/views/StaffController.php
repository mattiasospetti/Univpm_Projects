<?php

namespace App\Http\Controllers;
use App\Models\Catalog;
use App\Models\Resources\Prodotto;
use App\Models\Resources\Categoria;
use App\Http\Requests\NewProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\DeleteProductsRequest;
use App\Http\Requests\NewSubCatRequest;
use App\Http\Requests\NewCatRequest;
use Illuminate\Support\Facades\Log;




class StaffController extends Controller {

    protected $_catalogModel;
    

    public function __construct() {
        $this->middleware('auth');
        $this->_catalogModel = new Catalog;
    }

    public function index() {
        return view('staff');
    }
    
    
    
    
    
    //Prodotto
    
    //Inserimento nuovo prodotto
    public function addProduct() {
        $prodCats = $this->_catalogModel->getProdsCats()->pluck('name', 'catId');
        return view('product.insert')
                        ->with('cats',$prodCats);
    }
    
    //Salvataggio nuovo prodotto
    public function storeProduct(NewProductRequest $request) {

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();//permette di estrarre il nome originale della foto caricata
        } else {
            $imageName = NULL;
        }
        $product = new Prodotto;
        $product->fill($request->validated());
        $product->image = $imageName;
        $product->save();

        if (!is_null($imageName)) {
            $destinationPath = public_path() . '/images/products'; //carichiamo la foto dentro la cartella apposita
            $image->move($destinationPath, $imageName);
        }
        return response()->json(['redirect' => route('staff')]);     
    }
    
    //Modifica prodotto
    public function editProduct($id) {
        $prodCats = $this->_catalogModel->getProdsCats()->pluck('name', 'catId');
        $prod=$this->_catalogModel->getProductByCode($id);
        return view('product.update')
                        ->with('cats',$prodCats)
                        ->with('product', $prod);
    }
    
    //Salvataggio prodotto modificato
    public function saveProduct(UpdateProductRequest $request, $id) {

        $product=$this->_catalogModel->getProductByCode($id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName(); 
            $destinationPath = public_path().'/images/products';
            $image->move($destinationPath, $imageName);
            $product->image = $imageName;          
        }       
        $product->update($request->validated());      
        $product->save();

        return response()->json(['redirect' => route('staff')]);     
    }
    
    //Eliminazione prodotto
    public function deleteProduct($id) {
        $prod=$this->_catalogModel->getProductByCode($id);
	$prod->delete();	
        return redirect() -> route('staff');
    }
    
    //Eliminazione più prodotti
    public function deleteProducts(DeleteProductsRequest $request) {  
        foreach ($request->input('products') as $r) {
          Log::info($r);
          $prod=$this->_catalogModel->getProductByCode($r);
          $prod->delete();         
        }
        return redirect() -> route('staff');
    }
    
    
    
    
    
    
    //Categorie
    
    //Inserimento categoria
    public function addCat() {        
        return view('cat.insertTopcat');                     
    }
    
    //salvataggio categoria
    public function storeCat(NewCatRequest $request) {
        $cat = new Categoria;
        $cat->fill($request->validated());
        $cat->parId=0;
        $cat->save();       
        return redirect() -> route('staff');  
    }
    
    
    //Inserimento sottocategoria
    public function addSubCat() {
        $TopCats = $this->_catalogModel->getTopCats()->pluck('name', 'catId');
        return view('subcat.insertcat')
                        ->with('cats',$TopCats);
    }
    
    //salvataggio nuova sottocategoria
    public function storeSubCat(NewSubCatRequest $request) {
        $subcat = new Categoria;
        $subcat->fill($request->validated());
        $subcat->save();     
        return response()->json(['redirect' => route('staff')]);    
    }
    
    
    
    
       
    
    //Visualizzazione prodotti da modificare
    public function showProds() {
        
	$prods = $this->_catalogModel->getAllProds();
        return view('product/showproductupdate')			
                    ->with('products', $prods);
    }
    
    //Visualizzazione prodotti da eliminare
    public function showProdsDelete() {
        
	$prods = $this->_catalogModel->getAllProds();
        return view('product/showproductdelete')			
                    ->with('products', $prods);
    }
    
    
    
 

    
}

