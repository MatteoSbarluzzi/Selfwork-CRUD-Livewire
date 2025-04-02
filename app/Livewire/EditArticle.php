<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;

class EditArticle extends Component
{

    #[Validate('required', message: 'Il titolo è obbligatorio')]
    #[Validate('min:5', message: 'Il titolo è troppo corto')]
    public $title;

    #[Validate('required|min:3')]
    public $subtitle;

    #[Validate('required|min:3')]
    public $body;

    public $article;

    public function mount($article)
    {
        $this->article = $article;
        $this->title = $article->title;
        $this->subtitle = $article->subtitle;
        $this->body = $article->body;
    }

    public function updateArticle()
    { 
        $this->validate();

        $this->article->update([

            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'body' => $this->body,
        ]);

        $this->reset();

        session()->flash('message', 'Articolo aggiornato correttamente');
    }

    public function render()
    {
        
        return view('livewire.edit-article');
    }
}
