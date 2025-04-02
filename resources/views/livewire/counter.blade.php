<div>
    <div class="container my-4">
        <div class="row">
            <div class="col-12">
                <h2>Sono un componente Livewire</h2>
            </div>
        </div>
    </div>

    <div class="display-3">{{ $count }}</div>

    <button wire:click="increment" class="btn btn-primary">+</button>
    <button wire:click="decrement" class="btn btn-danger">-</button>
    <button wire:click="incrementByNum({{ $myNum }})" class="btn btn-info">+{{ $myNum }}</button>
    <button wire:click="decrementByNum({{ $myNum }})" class="btn btn-warning">-{{ $myNum }}</button>
</div>
