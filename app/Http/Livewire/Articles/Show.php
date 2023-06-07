<?php

namespace App\Http\Livewire\Articles;

use App\Models\Article;
use App\Models\Category;
use App\Models\Department;
use App\Models\Family;
use Livewire\Component;

class Show extends Component
{
    public $sku;
    public $article;

    public $family;
    public $category;
    public $department;

    public function render()
    {
        return view('livewire.articles.show');
    }

    public function updatedSku($value)
    {
        if ($value) {
            $this->article = Article::showArticle($value);
            
            if ($this->article) {
                $this->family = Family::showFamiliy($this->article[0]->family_id);
                $this->category = Category::showCategory($this->family[0]->category_id);
                $this->department = Department::showDepartment($this->category[0]->department_id);
            }
            else{
                $this->reset('family', 'category', 'department', 'article');
            }
            
        }
    }
}
