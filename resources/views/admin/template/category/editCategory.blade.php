@extends('admin.includes.leyout')

@section('main')
@if (session()->has('success'))
<div class="alert alert-success" role="alert">
  {{session('success')}}
</div>
@endif

    @if ($errors->any())
    <div class="alert alert-danger" role="alert">

      Não Foi Possivel Realizar Essa Operação :
      <ul class="mt-2 mb-0">
        @foreach ($errors->all() as $error)
        <li>{{ $error }} </li>
        @endforeach
      </ul>
    </div>
    @endif  
    <div class="card-body">
      <div class="card-header d-flex justify-content-between aling-items-center alert rounded">
        <h4 class="card-title">Atualizar Categoria</h4>
        <a href="{{route("categoria.index")}}" class="btn btn-primary btn-lg rounded"><i class="bi bi-backspace"> Voltar </i></a>
      </div>
<div class="row">
   <div class="col-12 grid-margin stretch-card">
  <div class="card">
      <form class="forms-sample" action="{{route("categoria.update", $category->id)}}" method="post">
        @csrf
        @method('PUT')
          @include('admin.template.formulario.formCategory')
          <button type="submit" class="btn btn-primary mr-2" style="padding: 2%; margin: 0% 2% 2% 2%">Atualizar Categoria</button>
      </form>
    </div>
  </div>
</div>
@endsection
