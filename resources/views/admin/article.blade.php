@extends('adminMaster')

@section('content')
  <div class="row">
    <div class="col-md-6">
      <h3>Dodaj novo novico</h3>
      <form id="articleForm">
        <div class="form-group">
          <label for="nameOfStory">Ime zgodbe:</label>
          <input type="text" class="form-control" id="nameOfStory" placeholder="Naslov vsebine">
        </div>
        <div class="form-group">
          <label for="textContent">Vsebina:</label>
          <textarea name="textContent" id="textContent" class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Objavi</button>
      </form>
    </div>
    <div class="col-md-6" >
      <div id="displayArticles" class="col-md-12">
        <h2>Zgodovina novic:</h2>
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <td>Novica</td><td>Spremeni</td><td>Izbriši</td>
            </tr>
          </thead>
          <tbody class="artilceBody">
            @foreach($articles as $article)
              <tr>
                <td>
                  {{$article->title}}
                </td>
                <td>
                  <button type="button" class="btn btn-primary">Spremeni</button>
                </td>
                <td>
                  <button type="button" class="btn btn-danger">Izbriši</button>
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
</div>
@endsection

@section('script')
  <script type="text/javascript" src="/js/article.js"></script>
@endsection
