<div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <div class="card" style="width: 18rem;">
                    @if($article->image)
                        <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top" alt="Immagine articolo">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">{{ $article->subtitle }}</h6>
                        <p class="card-text">{{ $article->body }}</p>
                        <a href="{{ route('article.index') }}" class="card-link">Torna indietro</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
