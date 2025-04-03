<div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">

                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <form class="shadow p-4 rounded-3 bg-light" wire:submit.prevent="updateArticle" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo Articolo</label>
                        <input wire:model.debounce.1000ms="title" type="text" class="form-control" id="title">
                        @error('title') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="subtitle" class="form-label">Sottotitolo Articolo</label>
                        <input wire:model="subtitle" type="text" class="form-control" id="subtitle">
                        @error('subtitle') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="body" class="form-label">Corpo Articolo</label>
                        <textarea wire:model="body" class="form-control" id="body" cols="30" rows="10"></textarea>
                        @error('body') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Immagine (facoltativa)</label>
                        <input wire:model="image" type="file" class="form-control" id="image">
                        @error('image') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    @if ($image)
                        <div class="mb-3">
                            <label class="form-label">Anteprima nuova immagine:</label><br>
                            <img src="{{ $image->temporaryUrl() }}" class="img-fluid rounded shadow" style="max-height: 200px;">
                        </div>
                    @elseif ($imagePath)
                        <div class="mb-3">
                            <label class="form-label">Immagine attuale:</label><br>
                            <img src="{{ asset('storage/' . $imagePath) }}" class="img-fluid rounded shadow" style="max-height: 200px;">
                            <button wire:click="removeImage" type="button" class="btn btn-sm btn-outline-danger mt-2">
                                Rimuovi immagine
                            </button>
                        </div>
                    @endif

                    <button type="submit" class="btn btn-primary">Aggiorna Articolo</button>
                </form>
            </div>
        </div>
    </div>
</div>
