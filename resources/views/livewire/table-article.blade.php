<div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Titolo</th>
                            <th scope="col">Sottotitolo</th>
                            <th scope="col">Immagine</th>
                            <th scope="col">Gestisci</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article)
                            <tr wire:key="article-{{ $article->id }}">
                                <th scope="row">{{ $article->id }}</th>
                                <td>{{ $article->title }}</td>
                                <td>{{ $article->subtitle }}</td>
                                <td>
                                    @if ($article->image)
                                        <img src="{{ asset('storage/' . $article->image) }}"
                                            alt="Anteprima immagine"
                                            style="height: 60px; width: auto;"
                                            class="img-thumbnail">
                                    @else
                                        <span class="text-muted">Nessuna</span>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('article.show', compact('article')) }}">Mostra</a>
                                    <a class="btn btn-warning" href="{{ route('article.edit', compact('article')) }}">Modifica</a>
                                    <button wire:click="destroy({{ $article->id }})" class="btn btn-danger">Elimina</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
