


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>

<script type="text/javascript" src="/js/bootstrap.js"></script>



<!-- SCRIPTS DO ANGULAR -->
<script src="angular/core/angular.min.js"></script>
<script src="angular/core/angular-animate.min.js"></script>
<script src="angular/core/angular-aria.min.js"></script>
<script src="angular/core/angular-material.min.js"></script>
<script src="angular/core/angular-messages.min.js"></script>
<script src="angular/core/angular-touch.min.js"></script>

<!-- Angular Application Scripts Load  -->
<script src="{{ asset('angular/app.js') 							}}"></script>
<script src="{{ asset('angular/controller/ProfessorController.js')  }}"></script>
<script src="{{ asset('angular/controller/DisciplinaController.js') }}"></script>
<script src="{{ asset('angular/controller/TurmaController.js') 		}}"></script>
<script src="{{ asset('angular/controller/AlunoController.js') 		}}"></script>
<script src="{{ asset('angular/controller/AdminController.js') 		}}"></script>
<script src="{{ asset('angular/controller/QuestaoController.js') 	}}"></script>
<!--Script para pagination-->
<script src="angular/libs/ui-bootstrap/ui-bootstrap-tpls-2.4.0.js"></script>

<!-- importando os servicos  -->

<script src="angular/services/professorAPIService.js"></script>
<script src="angular/services/turmaAPIService.js"></script>
<script src="angular/services/alunoAPIService.js"></script>
<script src="angular/services/disciplinaAPIService.js"></script>
<script src="angular/services/adminAPIService.js"></script>
<script src="angular/services/questaoAPIService.js"></script>



<script src="/js/sweetalert.min.js"></script>
<script src="/js/indexGlobal.js"></script>
