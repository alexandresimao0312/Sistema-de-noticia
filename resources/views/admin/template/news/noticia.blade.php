@extends('admin.includes.leyout')
@section('main')
<div class="row" >
  <div class="col-md-12">
    <div class="card-header d-flex justify-content-between aling-items-center alert rounded">
      <h4 class="mb-0">Gerenciamento de Noticia </h4>
      <a href="{{ route("news.create") }}" class="btn btn-success btn-lg rounded"> <i class="bi bi-align-center"></i> Nova </i></a>
    </div>
    <div class="col-md-12">
      <div class="card">
        <div class="table-responsive pt-3">
          <table class="table table-striped project-orders-table">
            <!-- menu da nossa tabela -->
            <thead>
              <tr>
                <th class="ml-5">ID</th>
                <th>TiTULO</th>
                <th class="ml-5">IMAGEM</th>
                <th>CATEGORIA</th>
                <th>DATA da PUBLICAÇÃO</th>
                <th>ACTIONS</th>
              </tr>
            </thead>
            <!--Corpo da nossa tabela -->
            <tbody>
              @foreach ($news as $item)
              <tr>
                <td>{{$item->id}}</td>
                <td>{{str()->limit($item->titulo,30,'...')}}</td>
                <td>
                  @if (!empty($item->cover))
		           	<img src="/site/images/{{$item->cover}}" alt="" width="15px" height="15px">
		            @endif
                </td>
                <td>{{$item->category->titulo ?? "Não Existe"}}</td>
                <td>{{$item->created_at->format('d/m/Y á\s H\hi')}}</td>
                <td>
                  <div class="d-flex align-items-center">
                    <a href="{{route('news.edit', $item->id)}}"  class="btn btn-success btn-sm btn-icon-text mr-3">
                      Edit
                      <i class="typcn typcn-edit btn-icon-append"></i>                          
                    </a>
                    @can('acess')
                    <form action="{{route("news.destroy", $item->id)}}" method="post">
                      @csrf
                      @method('delete')
                      <button onclick="if(confirm('DESEJAS REALMENTE EXCLUIR ESTE REGISTRO??')) {this.form.submit()}" type="button" class="btn btn-danger btn-sm btn-icon-text">
                        Delete
                        <i class="typcn typcn-delete-outline btn-icon-append"></i>                          
                      </button>
                    </form> 
                    @endcan
                  </div>
                </td>
              </tr>  
              @endforeach
            </tbody>
          </table>
          {{$news->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection