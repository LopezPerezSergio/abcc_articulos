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

    public $department;
    public $category;
    public $family;

    public $date;

    public function mount()
    {
        if ($this->sku) {
            $article = Article::showArticle($this->sku);

            if ($article) {
                $this->discontinued = $article[0]->discontinued;
                $this->article = $article[0]->article;
                $this->brand = $article[0]->brand;
                $this->model = $article[0]->model;
                $this->stock = $article[0]->stock;
                $this->quantity = $article[0]->quantity;
                $this->date_h = $article[0]->date_high;
                $this->date_l = $article[0]->date_low;

                $family_article = Family::showFamiliy($article[0]->family_id);
                $category_article = Category::showCategory($family_article[0]->category_id);
                $department_article = Department::showDepartment($category_article[0]->department_id);

                $this->department = $department_article[0]->id;
                $this->category = $category_article[0]->id;
                $this->family = $family_article[0]->id;

                $this->categories = Category::showCategories($this->department);
                $this->families = Family::showFamilies($this->category);
            }
        }
    }

    public function render()
    {
        $this->date = Carbon::now()->toDateString();
        return view('livewire.articles.edit');
    }

    public function updatedSku($value)
    {
        if ($value) {
            $article = Article::showArticle($value);
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
    }

    public function updatedDepartment($value)
    {
        $this->reset('categories', 'families');

        if ($value) {
            $this->categories = Department::where('id', $value)->first()->categories;
        }
    }

    public function updatedCategory($value)
    {
        $this->reset('families');
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
