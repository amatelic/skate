@extends('adminMaster')

@section('content')
  <div class="row">
    <div class="form-group">
      @if(count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
              <li>{{ $error}}</li>
            @endforeach
          </ul>
        </div>
      @endif
    </div>
    <div class="col-md-6">
      <h3>Dodaj novo novico</h3>
      <form method="POST" id="articleForm" action="/admin/articles">
        {!! csrf_field() !!}
        <div class="form-group">
          <label for="nameOfStory">Ime zgodbe:</label>
          <input type="text" class="form-control" id="nameOfStory" name="title" placeholder="Naslov vsebine">
        </div>
        <div class="form-group">
          <label for="textContent">Vsebina:</label>
          <textarea name="body" id="textContent" class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Objavi</button>
      </form>
    </div>
    @if(Auth::user()->isAdmin())
      <div class="col-md-6" >
        <div id="displayArticles" class="col-md-12">
          <h2>Zgodovina novic:</h2>
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <td>Novica</td><td>Spremeni</td><td>Izbriši</td>
              </tr>
            </thead>

            <p class="bg-warning">
              Spreminanje novic je se v izdelavi zato se ne dela
            </p>
            <tbody class="artilceBody">
              @foreach($articles as $article)
                <tr>
                  <td>
                    {{$article->title}}
                  </td>
                  <td>
                    <button disabled type="button" data-id="{{$article->id}}" class="btn btn-primary change-article">Spremeni</button>
                  </td>
                  <td>
                    <button type="button" data-id="{{$article->id}}" class="btn btn-danger delete-article">Izbriši</button>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <nav>
          <ul class="pagination">
              @for($i=1; $i <=$lenght ; $i++)
                @if($i == 1)
                <li class="active">
                  <span>{{$i}}</span>
                </li>
                @else
                <li>
                  <span>{{$i}}</span>
                </li>
                @endif
              @endfor
          </ul>
        </nav>
        </div>
      </div>
    @endif
</div>
@endsection

@section('script')
  <script type="text/javascript" src="/js/article.js"></script>
@endsection
