

<form action="{{ route('product.search') }}">
<div class="bgput" style="position: absolute; display: inline-block;">
    <input type="text" name="q" vclass="putin" value="{{ request()->q ?? '' }}"   placeholder="   rechercher un médicament" style=" box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1); margin-right: 9px; margin-top: -15px; font-size: 20px; border-radius: 25px; width: 350px; border: 2px; color: var(--bs-gray-700);  padding: 8px 5px 8px 4px; margin-left: 600px;  background-color: var(--bs-gray-200);">
  <button type="submit" style="border:0px;"><img class="icone" src="{{ asset('image/chercher.png')}}" width="25px;" alt="photo" style="position: absolute; margin-left: -60px;  margin-right:-10px;  margin-top:-20px;"></button>
</div>
</form>

