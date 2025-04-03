<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditArticle extends Component
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

    public Article $article;
    public $imagePath;

    public function mount(Article $article)
    {
        $this->article = $article;
        $this->title = $article->title;
        $this->subtitle = $article->subtitle;
        $this->body = $article->body;
        $this->imagePath = $article->image;
    }

    public function updateArticle()
    {
        $this->validate();

        if ($this->image) {
            if ($this->imagePath) {
                Storage::delete('public/' . $this->imagePath);
            }

            $this->imagePath = $this->image->store('articles', 'public');
        }

        $this->article->update([
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'body' => $this->body,
            'image' => $this->imagePath,
        ]);

        $this->dispatch('articleUpdated');
        session()->flash('message', 'Articolo aggiornato correttamente');
    }

    public function removeImage()
    {
        if ($this->imagePath) {
            Storage::delete('public/' . $this->imagePath);
            $this->article->update(['image' => null]);
            $this->imagePath = null;
            session()->flash('message', 'Immagine rimossa con successo');

            $this->dispatch('articleUpdated');
        }
    }

    public function render()
    {
        return view('livewire.edit-article');
    }
}
