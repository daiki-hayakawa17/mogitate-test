<div>
    @if($image)
    <div class="preview">
        <img src="{{ $image->temporaryUrl() }}">
    </div>
    @endif

    <input type="file" wire:model="image" name="image" accept="image/png, image/jpeg">

    
</div>
@error('image')<span class="form__error">{{$message}}</span>@enderror
