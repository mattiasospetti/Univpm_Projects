<?php

namespace App\Models;

use App\Models\Resources\Category;
use App\Models\Resources\Product;

class Catalog {

    public function getMacCats() {
        return Category::where('parId', 0)->get();
    }

    public function getMacCatsByParId($macId) {
        return Category::whereIn('parId', $macId)->get();
    }

    public function getMicCatsByParId($micId) {
        return Category::whereIn('parId', $micId)->get();
    }

    // Estrae i prodotti della categoria/e $catId (tutti o solo quelli in sconto), eventualmente ordinati
    public function getProdsByCat($micId, $paged = 6, $order = null, $discounted = false) {

        $prods = Product::whereIn('catId', $micId)
                ->orWhereHas('prodCat', function ($query) use ($micId) {
            $query->whereIn('parId', $micId);
        });
        if ($discounted) {
            $prods = $prods->where('discounted', true);
        }
        if (!is_null($order)) {
            $prods = $prods->orderBy('discountPerc', $order);
        }
        return $prods->paginate($paged);
    }

    public function getProdsByCatSearch($micId, $paged = 6, $order = null, $discounted = false) {
        $query = $_GET['query'];
        $prods = Product::whereIn('catId', $micId)
                        ->orWhereHas('prodCat', function ($query) use ($micId) {
                            $query->whereIn('parId', $micId);
                        })->where('descLong', 'like', '%' . $query . '%');
        if ($discounted) {
            $prods = $prods->where('discounted', true);
        }
        if (!is_null($order)) {
            $prods = $prods->orderBy('discountPerc', $order);
        }
        return $prods->paginate($paged);
    }
    
    public function getProdsByCatSearch1($micId, $paged = 6, $order = null, $discounted = false) {
        $query = $_GET['query'];
        $prods = Product::whereIn('catId', $micId)->where('descLong', 'like', '%' . $query . '%')
                        ->orWhereHas('prodCat', function ($query) use ($micId) {
                            $query->whereIn('parId', $micId);
                        });
        if ($discounted) {
            $prods = $prods->where('discounted', true);
        }
        if (!is_null($order)) {
            $prods = $prods->orderBy('discountPerc', $order);
        }
        return $prods->paginate($paged);
    }
}
