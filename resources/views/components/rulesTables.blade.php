<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>
        <th scope="col">Rendi {{$rule}}</th>
        <th scope="col">oppure</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($ruleRequest as $user)
              <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                @switch($rule)
                    @case('Admin')
                          <td>
                              <a href="{{route('adminCheck', compact('user'))}}" class="btn btn-success">Accetta</a>
                          </td>
                          <td>
                              <a href="{{route('adminCheckFalse', compact('user'))}}" class="btn btn-danger">Rifiuta</a>
                          </td>
                        @break
                    @case('Revisore')
                          <td>
                              <a href="{{route('revisoreCheck', compact('user'))}}" class="btn btn-success">Accetta</a>
                          </td>
                          <td>
                              <a href="{{route('revisoreCheck', compact('user'))}}" class="btn btn-danger">Rifiuta</a>
                          </td>
                        @break
                    @case('Scrittore')
                          <td>
                              <a href="{{route('scrittoreCheck', compact('user'))}}" class="btn btn-success">Accetta</a>
                          </td>
                          <td>
                              <a href="{{route('scrittoreCheck', compact('user'))}}" class="btn btn-danger">Rifiuta</a>
                          </td>
                        @break
                @endswitch
              </tr>
        @endforeach
    </tbody>
</table>