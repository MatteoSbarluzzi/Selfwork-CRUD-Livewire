<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

class CreateArticle extends Component
{
    use WithFileUploads;

    #[Validate('required', message: 'Il titolo è obbligatorio')]
    #[Validate('min:5', message: 'Il titolo è troppo corto')]
    public $title;

    #[Validate('required|min:3')]
    public $subtitle;

    #[Validate('required|min:3')]
    public $body;

    #[Validate('nullable|image|max:2048')]
    public $image;

    public function store()
    { 
        $this->validate();

        $imagePath = $this->image ? $this->image->store('articles', 'public') : null;

        Article::create([
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'body' => $this->body,
            'image' => $imagePath,
        ]);

        $this->reset();

        session()->flash('message', 'Articolo creato correttamente');
    }

    protected function clearForm()
    {
        $this->title = "";
        $this->subtitle = "";
        $this->body = "";
        $this->image = null;
    }

    public function render()
    {
        return view('livewire.create-article');
    }
}
