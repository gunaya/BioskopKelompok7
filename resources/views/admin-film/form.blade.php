<div class="form-group">
	<label for="nama_film">Judul</label>
	<input type="text" class="form-control"  name="nama_film" id="nama_film">
</div>
<div class="form-group">
	<label for="tahun_produksi">Tahun Rilis</label>
	<input type="text" class="form-control"  name="tahun_produksi" id="tahun_produksi">
</div>
<div class="form-group">
	<label for="direksi">Direksi</label>
	<input type="text" class="form-control"  name="direksi" id="direksi">
</div>
<div class="form-group">
	<label for="pemain">Pemeran</label>
	<input type="text" class="form-control"  name="pemain" id="pemain">
</div>
<div class="form-group">
	<label for="sinopsis">Sinopsis</label>
	<input type="text" class="form-control"  name="sinopsis" id="sinopsis">
</div>
<div class="form-group">
	<label for="bahasa">Bahasa</label>
	<input type="text" class="form-control"  name="bahasa" id="bahasa">
</div>
<div class="form-group">
	<label for="negara">Negara</label>
	<input type="text" class="form-control"  name="negara" id="negara">
</div>
<div class="form-group">
	<label for="id_genre">Genre</label>
	<select class="form-control" name="id_genre_film" id="id_genre_film">
	  	@foreach($genre_array as $item)
	      	<option value="{{$item->id_genre_film}}">{{$item->genre_film}}</option>
	    @endforeach
	</select>
</div>
<div class="form-group">
	<label for="id_kategori">Kategori</label>
	<select class="form-control"  name="id_kategori" id="id_kategori">
		@foreach($kategori_array as $item)
			<option value="{{$item->id_kategori}}">{{$item->kategori}}</option>
		@endforeach
	</select> 
</div>