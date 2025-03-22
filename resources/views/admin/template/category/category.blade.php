@extends('admin.includes.leyout')
@section('main')
<div class="row" >
  <div class="col-md-12">
    <div class="card-header d-flex justify-content-between aling-items-center alert rounded">
      <h4 class="mb-0">Categoria Cadastrada </h4>
      <a href="{{ route("categoria.create") }}" class="btn btn-success btn-lg rounded"> <i class="bi bi-align-center"></i> Nova </i></a>
    </div>
    <div class="col-md-12">
      <div class="card">
        <div class="table-responsive pt-3">
          <table class="table table-striped project-orders-table">
            <!-- menu da nossa tabela -->
            <thead>
              <tr>
                <th class="ml-5">ID</th>
                <th>Titulo</th>
                <th>Data de Publicação</th>
                <th>Actions</th>
              </tr>
            </thead>
            <!--Corpo da nossa tabela -->
            <tbody>
              @foreach ($category as $item)
              <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->titulo}}</td>
                <td>{{$item->created_at->format('d/m/Y á\s H\hi')}}</td>
                <td>
                  <div class="d-flex align-items-center">
                    <a href="{{route('categoria.edit', $item->id)}}"  class="btn btn-success btn-sm btn-icon-text mr-3">
                      Edit
                      <i class="typcn typcn-edit btn-icon-append"></i>                          
                    </a>
                    <form action="{{route("categoria.destroy", $item->id)}}" method="post">
                      @csrf
                      @method('delete')
                      <button onclick="if(confirm('DESEJAS REALMENTE EXCLUIR ESTE REGISTRO??')) {this.form.submit()}" type="button" class="btn btn-danger btn-sm btn-icon-text">
                        Delete
                        <i class="typcn typcn-delete-outline btn-icon-append"></i>                          
                      </button>
                    </form>
                  </div>
                </td>
              </tr>  
              @endforeach
            </tbody>
          </table>
          {{$category->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection