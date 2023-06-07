<?php

namespace App\Http\Livewire\Articles;

use App\Models\Article;
use App\Models\Category;
use App\Models\Department;
use App\Models\Family;
use Carbon\Carbon;
use Livewire\Component;

class Edit extends Component
{
    public $departments;
    public $categories = [];
    public $families = [];

    public $sku = '';
    public $discontinued;
    public $article;
    public $brand;
    public $model;
    public $stock;
    public $quantity;
    public $date_h;
    public $date_l;
    public $category;
    public $department;

    public $date;

    public function render()
    {
        $this->date = Carbon::now()->toDateString();
        return view('livewire.articles.edit');
    }

    public function updatedSku($value)
    {
        if ($value) {
            $article = Article::showArticle($value);
            dump($article);
            if ($article) {
                $this->discontinued = $article[0]->discontinued;
                $this->article = $article[0]->article;
                $this->brand = $article[0]->brand;
                $this->model = $article[0]->model;
                $this->stock = $article[0]->stock;
                $this->quantity = $article[0]->quantity;
                $this->date_h = $article[0]->date_high;
                $this->date_l = $article[0]->date_low;
            } else {
                $this->resetExcept('departments','sku');
            }
        }
        $this->reset('stock','quantity');
    }

    public function updatedDepartment($value)
    {
        if ($value) {
            $this->categories = Department::where('id', $value)->first()->categories;
        }
        else{
            $this->reset('categories', 'families');
        }
    }

    public function updatedCategory($value)
    {
        if ($value) {
            $this->families = Category::where('id', $value)->first()->families;
        }
    }

    public function upDiscontinued()
    {
        $this->discontinued  = $this->discontinued == 0 ; 
    }

    public function updatedQuantity($value)
    {
        if ($value) {
            if ($value > $this->stock ) {
                $this->quantity = $this->stock;
            }
        }
    }
}
