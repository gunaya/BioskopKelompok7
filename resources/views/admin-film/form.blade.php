<div class="form-group">
	<label for="nama_film">Judul</label>
	<input type="text" class="form-control"  name="nama_film" id="nama_film">
</div>
<div class="form-group">
    <label for="tahun_produksi">Tahun Rilis</label>
    <div class='input-group date datetimepicker1' id='datetimepicker1'>
        <input type='text' class="form-control" id='tahun_produksi' name="tahun_produksi" />
        <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
        </span>
    </div>
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
	<textarea class="form-control" name="sinopsis" id="sinopsis" rows="3" style="max-height:100px;min-height:100px; resize: none"></textarea>
</div>
<div class="form-group">
	<label for="bahasa">Bahasa</label>
	<select class="form-control"  name="bahasa" id="bahasa">
		<option value="indonesia">Indonesia</option>
		<option value="inggris">Inggris</option>
		<option value="rusia">Rusia</option>
		<option value="jepang">Jepang</option>
		<option value="cina">Cina</option>
		<option value="melayu">Melayu</option>
	</select>
</div>
<div class="form-group">
	<label for="negara">Negara</label>
	<select class="form-control"  name="negara" id="negara">
		<option value="indonesia">Indonesia</option>
		<option value="inggris">Inggris</option>
		<option value="rusia">Rusia</option>
		<option value="jepang">Jepang</option>
		<option value="cina">Cina</option>
		<option value="melayu">Melayu</option>
	</select>
</div>
<div class="form-group">
	<label for="image">Image</label>
	<input type="file" class="form-control" name="image" id="image">
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
