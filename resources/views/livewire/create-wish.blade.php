<div>
    <label for="sampleInput">Nama</label>
    <input wire:model="name" class="u-fullwidth" type="text" value="" placeholder="Nama anda" name="name" required>
    @error('name')
    <div class="alert-box alert-box--error">
        <p>{{ $message }}</p>
        <span class="alert-box__close"></span>
    </div>
    @enderror

    <label for="exampleMessage">Hadir / Berhalangan</label>
    <select wire:model="hadir" class="u-fullwidth" name="hadir" required>
        <option selected>Choose One</option>
        <option value="1">Hadir</option>
        <option value="0">Berhalangan</option>
    </select>
    @error('hadir')
    <div class="alert-box alert-box--error">
        <p>{{ $message }}</p>
        <span class="alert-box__close"></span>
    </div>
    @enderror

    <label for="exampleMessage">Ucapan & doa restu</label>
    <textarea wire:model="comment" class="u-fullwidth" placeholder="Ucapan anda" name="comment" required></textarea>
    @error('comment')
    <div class="alert-box alert-box--error">
        <p>{{ $message }}</p>
        <span class="alert-box__close"></span>
    </div>
    @enderror
    <button wire:click="createWish" class="btn--primary u-fullwidth">Kirim Ucapan</button>
</div>