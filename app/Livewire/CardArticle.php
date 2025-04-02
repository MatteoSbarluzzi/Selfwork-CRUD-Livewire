<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;

class CardArticle extends Component
{
    public Article $article;

    public function render()
    {
        return view('livewire.card-article');
    }
}
