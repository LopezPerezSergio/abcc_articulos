<?php

namespace App\Http\Livewire\Articles;

use App\Models\Article;
use App\Models\Category;
use App\Models\Department;
use Carbon\Carbon;
use Livewire\Component;

class Create extends Component
{
    public $departments;
    public $categories = [];
    public $families = [];

    public $sku = '';
    public $article;

    public $department;
    public $category;

    public $stock;
    public $quantity;

    public $date;

    public function render()
    {
        $this->date = Carbon::now()->toDateString();
        return view('livewire.articles.create');
    }

    public function updatedSku($value)
    {
        if ($value) {
            $this->article = Article::showArticle($value);
        }
        else {
            $this->resetExcept('departments','sku');
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

    public function updatedQuantity($value)
    {
        if ($value) {
            if ($value > $this->stock ) {
                $this->quantity = $this->stock;
            }
        }
    }
}
