@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-sm-offset-2 col-sm-8">
    <div class="panel panel-default">
      <div class="panel-heading">
        NewMovie
      </div>

      <div class="pane-body">
        @include('common.errors')
        @include('common.errors')

        <form action="/movie" method="POST" class="form-horizontal">
          {{ csrf_field() }}

          <div class="form-group">
            <label for="tasl-name" class="col-sm-3 control-label">Movie</label>

            <div class="col-sm-6">
              <input type="text" name="name" id="book-name" class="form-control" value="{{old('book')}}">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
              <button type="submit" class="btn btn-default">
                <i class="fa fa-plus"></i>映画を追加する
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>

    @if(count($movies)>0)
    <div class="panel panel-default">
      <div class="panel-heading">
        映画一覧
      </div>

           <div class="panel-body">
        <table class="table table-striped task-table">
          <thead>
            <th>Movie</th>
            <th>&nbsp;</th>
          </thead>
          <tbody>
            @foreach ($movies as $movie)
            <tr>
              <td class="table-text">
                <div>{{$movie->title }}</div>
              </td>

              <!-- Task Delete Button -->
              <td>
                <form action="/movie/{{ $movie->id }}" method="POST">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}

                  <button type="submit" class="btn btn-danger">
                    <i class="fa fa-trash"></i>削除
                  </button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    @endif
  </div>
</div>
@endsection