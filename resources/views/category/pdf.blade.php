<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <div class="float-right">
        <a href="{{ route('categoria.pdf') }}" class="btn btn-info btn-sm float-right"  data-placement="left">
            {{ __('Descargar PDF') }}
        </a>
    </div>
        <table class="table table-bordered table-striped" t>
            <thead class="thead">
                <tr>
                    <th>Id</th>
                    <th>Categoria</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        
                        <td>{{$category->id}} </td>
                        <td>{{ $category->Nombre }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</body>

</html>