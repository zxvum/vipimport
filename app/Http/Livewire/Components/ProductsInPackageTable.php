<?php

namespace App\Http\Livewire\Components;

use App\Models\OrderProduct;
use Livewire\Component;

class ProductsInPackageTable extends Component
{
    public $products_modal = false;
    public $orders_modal = false;

    public $products = [];
    public $orders = [];

    public function openProductsModal(){
        $this->products_modal = true;
        $this->products = OrderProduct::all();
    }

    public function render()
    {
        return view('livewire.components.products-in-package-table');
    }
}
