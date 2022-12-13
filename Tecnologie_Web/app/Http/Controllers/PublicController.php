<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use App\Models\Catalog;

class PublicController extends Controller {

    protected $_catalogModel;

    public function __construct() {
        $this->_catalogModel = new Catalog;
    }

    public function showCatalog1() {

        //Mac Categorie 
        $MacCats = $this->_catalogModel->getMacCats();

        //Prodotti in sconto di tutte le categorie, ordinati per sconto decrescente
        $prods = $this->_catalogModel->getProdsByCat($MacCats->map->only(['catId']), 4, 'desc', false);
        
        return view('welcome')
                        ->with('MacCategories', $MacCats)
                        ->with('products', $prods);
    }

    public function showCatalog2($macCatId) {

        //Categorie Top
        $macCats = $this->_catalogModel->getMacCats();

        //Categoria Top selezionata
        $selMacCat = $macCats->where('catId', $macCatId)->first();

        // Micro Categorie
        $micCats = $this->_catalogModel->getMacCatsByParId([$macCatId]);

        //Prodotti in sconto della categoria Top selezionata, ordinati per sconto decrescente 
        $prods = $this->_catalogModel->getProdsByCat([$macCatId], 4, 'desc', false);

        return view('welcome')
                        ->with('MacCategories', $macCats)
                        ->with('selectedMacCat', $selMacCat)
                        ->with('MicCategories', $micCats)
                        ->with('products', $prods);
        
    }

    public function showCatalog3($macCatId, $micCatId) {
        $macCats = $this->_catalogModel->getMacCats();
        $selMacCat = $macCats->where('catId', $macCatId)->first();
        $micCats = $this->_catalogModel->getMacCatsByParId([$macCatId]);
        $selMicCat = $micCats->where('catId', $micCatId)->first();
        $SubCats = $this->_catalogModel->getMicCatsByParId([$micCatId]);
        $prods = $this->_catalogModel->getProdsByCat([$micCatId]);
        return view('welcome')
                        ->with('MacCategories', $macCats)
                        ->with('selectedMacCat', $selMacCat)
                        ->with('selectedMicCat', $selMicCat)
                        ->with('MicCategories', $micCats)
                        ->with('products', $prods);
    }

    public function showCatalog4($macCatId, $micCatId, $CatId) {

        //Categorie Macro
        $macCats = $this->_catalogModel->getMacCats();
        //Categoria Macro selazionata
        $selMacCat = $macCats->where('catId', $macCatId)->first();
        // Categoria Micro
        $micCats = $this->_catalogModel->getCatsByParId([$MacCatId]);
        //Categoria Micro selazionata
        $selMicCat = $micCats->where('catId', $MacCatId)->first();
        // Prodotti della categoria selezionata, in sconto o meno
        $prods = $this->_catalogModel->getProdsByCat([$catId]);
        return view('catalog')
                        ->with('MacCategories', $macCats)
                        ->with('selectedTopCat', $selMacCat)
                        ->with('MicCategories', $micCats)
                        ->with('selectedMicCat', $selMicCats)
                        ->with('products', $prods);
    }

    /*public function search() {
        $MacCats = $this->_catalogModel->getMacCats();
        $prods = $this->_catalogModel->getProdsByCatSearch($MacCats->map->only(['catId']), 4, 'desc', false);
        return view('welcome')
                        ->with('MacCategories', $MacCats)
                        ->with('products', $prods);
    }*/

    public function search1() {
        if (Gate::denies('cannotSearch')){
        $MacCats = $this->_catalogModel->getMacCats();
        $prods = $this->_catalogModel->getProdsByCatSearch($MacCats->map->only(['catId']), 12, 'desc', false);
        return view('welcome')
                        ->with('MacCategories', $MacCats)
                        ->with('products', $prods);
    }
    }

    public function search2($macCatId) {
        if (Gate::denies('cannotSearch')){
        $macCats = $this->_catalogModel->getMacCats();



        //Categoria Top selezionata
        $selMacCat = $macCats->where('catId', $macCatId)->first();



        // Micro Categorie
        $micCats = $this->_catalogModel->getMacCatsByParId([$macCatId]);



        //Prodotti in sconto della categoria Top selezionata, ordinati per sconto decrescente 
        $prods = $this->_catalogModel->getProdsByCatSearch([$macCatId], 55, 'desc', false);



        return view('welcome')
                        ->with('MacCategories', $macCats)
                        ->with('selectedMacCat', $selMacCat)
                        ->with('MicCategories', $micCats)
                        ->with('products', $prods);
    }
    }

    public function search3($macCatId, $micCatId) {
        if (Gate::denies('cannotSearch')){
    
        //Categorie Macro
        $macCats = $this->_catalogModel->getMacCats();
        //Categoria Macro selezionata
        $selMacCat = $macCats->where('catId', $macCatId)->first();
        // Micro Categorie
        $micCats = $this->_catalogModel->getMacCatsByParId([$macCatId]);
        //Categoria Micro selezionata
        $selMicCat = $micCats->where('catId', $micCatId)->first();
        $SubCats = $this->_catalogModel->getMicCatsByParId([$micCatId]);
        // Prodotti della categoria selezionata, in sconto o meno     
        $prods = $this->_catalogModel->getProdsByCatSearch1([$micCatId], 55, 'desc', false);
        return view('welcome')
                        ->with('MacCategories', $macCats)
                        ->with('selectedMacCat', $selMacCat)
                        ->with('selectedMicCat', $selMicCat)
                        ->with('MicCategories', $micCats)
                        ->with('products', $prods);
    }
}

}
