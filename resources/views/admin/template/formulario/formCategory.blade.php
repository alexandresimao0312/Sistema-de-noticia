<div class="form-group" style="padding: 3%; margin: 0% 3% 1% 0%">
    <label for="exampleInputName1">Titulo da Categoria</label>
    <input type="text" class="form-control rounded" id="exampleInputName1" placeholder="Titulo" name="titulo" value="{{ $category->titulo ?? old('subtitulo')}}">
  </div>
