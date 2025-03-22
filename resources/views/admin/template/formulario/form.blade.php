<div class="form-group" style="padding: 3%; margin: 0% 3% 1% 0%">
    <label for="exampleInputName1">Titulo</label>
    <input type="text" class="form-control rounded" id="exampleInputName1" placeholder="Titulo" name="titulo" value="{{ $news->titulo ?? old('titulo')}}">
  </div>
  <div class="form-group" style="padding: 3%; margin: 0% 3% 1% 0%">
    <label for="exampleInputEmail3">Resumo do Titulo</label>
    <input type="text" class="form-control rounded" id="exampleInputEmail3" placeholder="sub-titulo" name="subtitulo" value="{{ $news->subtitulo ?? old('subtitulo')}}">
  </div>
  <div class="form-group" style="padding: 3%; margin: 0% 3% 1% 0%">
    <label for="exampleSelectGender">Categoria</label>
      <select class="form-control rounded" id="exampleSelectGender" name="category_id">
        @foreach ($categoria as $item)
        <option value="{{$item->id}}" {{ isset($news) && $item->id === $news->category_id ? "selected='selected'" : "" }}>{{$item->titulo}}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-3" style="padding: 3%; margin: 0% 3% 1% 0%">
    <label for="formFile" class="form-label">Seleciona uma imagem</label>
    <input type="file" name="cover" id="formFile" class="form-control" value="{{ $news->cover ?? old('cover')}}">
    </div>
  <div class="form-group" style="padding: 3%; margin: 0%">
    <label for="exampleTextarea1">Texto</label>
    <textarea class="form-control" id="exampleTextarea1" rows="4" name="text">{{ $news->text ?? old('text')}}</textarea>
  </div>
  