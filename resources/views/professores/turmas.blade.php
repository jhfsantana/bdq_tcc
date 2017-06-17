@extends('templates.professor.template')
    @section('head')
        <link rel="stylesheet" href="/css/global.css">
        <link rel="stylesheet" href="/css/formularios.css">
        <title>Lista de Alunos</title>
    @stop
    @section('content')
    <br>
    <br>
    <br>


        <fieldset>
            <legend>
                MINHAS TURMAS
            </legend>
            <div class="col-md-3">
                <input type="text" class="form-control" id="myInput" onkeyup="procurar()" placeholder="Buscar por ....." title="Digite sua busca aqui">
            </div>
            </br></br></br>
            <table id="alunos" class="table table-striped" cellspacing="0" width="100%">
                <thead style="background-color: #ccc; margin-top: 40px;">
                    <tr>
                        <th>ID</th>
                        <th>Turma</th>
                        <th>Disciplina</th>
                        <th>Alunos</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($professor->disciplinas as $disciplina)
                        @foreach($disciplina->turmas as $turma)
                            <tr>
                                <td>{{$turma->id}}</td>
                                <td>{{$turma->nome}}</td>
                                <td>{{$disciplina->nome}}</td>
                                @foreach($turma->alunos as $alunos)
                                <td>{{count($alunos)}}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </fieldset>
    @stop

 <script type="text/javascript">
    function procurar() {
      var input, filter, table, tr, td, td2, td3, i;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("alunos");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        td2 = tr[i].getElementsByTagName("td")[1];
        td3 = tr[i].getElementsByTagName("td")[2];

        if (td || td2 || td3) {
          if (td.innerHTML.toUpperCase().indexOf(filter) > -1 || td2.innerHTML.toUpperCase().indexOf(filter) > -1 || td3.innerHTML.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }       
      }
    }
 </script>