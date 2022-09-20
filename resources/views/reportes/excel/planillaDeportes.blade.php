<!DOCTYPE html>
<html lang="en">
	<head>
		<style>
		 	@font-face {
		        font-family: 'Vibes';
		        src: url("https://fonts.googleapis.com/css?family=Great+Vibes") format('truetype');
		        font-weight: normal;
		        font-style: normal;
		    }
			html { 
					display:flex;margin-top: 30px,
					margin-bottom: 30px;
					/*font-family: 'Arial';*/
				}
				.page-break {
				    page-break-after: always;
				}
			body{
				font-family: Arial, sans-serif;
			}
			
		</style>
	</head>
	<body>
		<table  style="width:100%">
			<thead>
				<th width="300px" style="font-size: 10px">DEPARTAMENTO VI-EDUCACIÓN <br>
					COLEGIO MILITAR "CNL. GUALBERTO VILLARROEL" <br>
					<u>BOLIVIA</u>
				</th>
				<th></th>
				<th></th>
			</thead>
		</table>
		<table  style="width:100%">
			<thead>
				<tr>
					<th></th>
					<th>PLANILLA DE CALIFICACIONES DEL AREA DE ENTRENAMIENTO FÍSICO MILITAR</th>
					<th></th>
				</tr>
				<tr>
					<th></th>
					<th>EVALUACIÓN {{$planilla[0]->curso_detalle }}</th>
					<th></th>
				</tr>
			</thead>
		</table>
		<table style="border-collapse: collapse" border="1" >
			<thead style="font-size: 9px">
				<tr>
					<th rowspan="3" style="text-align: center">No.-</th>
					<th rowspan="3" style="text-align: center">GRADO</th>
					<th rowspan="3" style="text-align: center">ARMA</th>
					<th rowspan="3" style="text-align: center">APELLIDOS Y NOMBRES</th>
					<th rowspan="3" style="text-align: center">SEXO</th>
					<th colspan="4" rowspan="2" style="text-align: center">CONTEXTURA FISICA</th>
					<th colspan="8" style="text-align: center">PRUEBAS BÁSICAS</th>
					<th colspan="10" style="text-align: center">PRUEBAS COMPLEMENTARIAS</th>
					<th rowspan="3" style="text-align: center">PROMEDIO GENERAL</th>
					<th rowspan="3" style="text-align: center">OBS.</th>
				</tr>
				<tr>
					
					<th colspan="2" style="text-align: center">FLEXIONES</th>
					<th colspan="2" style="text-align: center">ABDOMINALES</th>
					<th colspan="2" style="text-align: center">AEROBICA</th>
					<th colspan="2" style="text-align: center">VELOCIDAD</th>
					<th colspan="2" style="text-align: center">FLEXIONES BARRA</th>
					<th colspan="2" style="text-align: center">ASCENSO CUERDA</th>
					<th colspan="2" style="text-align: center">NATACION</th>
					<th colspan="4" style="text-align: center">CRUCE DEL JARDIN DE OBS</th>
					
				</tr>				
				<tr>
					<th>PESO</th>
					<th>TALLA</th>
					<th>CONT. FIS.</th>
					<th>NOTA</th>
					<!--FLEXIONES-->
					<th>CANT</th>
					<th>NOTA</th>
					<!--ABDOMINALES-->
					<th>CANT</th>
					<th>NOTA</th>
					<!--AEROBICA-->
					<th>TIEMPO</th>
					<th>NOTA</th>
					<!--VELOCIDAD-->
					<th>TIEMPO</th>
					<th>NOTA</th>
					<!--FLEXIONES BARRA-->
					<th>CANT</th>
					<th>NOTA</th>
					<!--ASCENSO A CUERDA-->
					<th>ALTURA</th>
					<th>NOTA</th>
					<!--NATACION-->
					<th>TIEMPO</th>
					<th>NOTA</th>
					<!--CRUCE DE JARDON DE OBSTACULOS-->
					<th>TIEMPO</th>
					<th>NOTA</th>
					<th>OBST.</th>
					<th>NOTA</th>			
				</tr>
			</thead>
			<tbody style="font-size: 9px">
				@php
					$nro = 0;
				@endphp
				@foreach($planilla as $cadete)
				@php
					$nro = $nro+1;
				@endphp
				<tr>
					<td style="text-align: center">{{ $nro }}</td>
					<td style="text-align: center">{{ $cadete->grad_abr.' '.$cadete->curso_abr }}</td>
					<td>{{ $cadete->arma_abr }}</td>
					<td>{{ $cadete->cad_ap_paterno.' '.$cadete->cad_ap_materno.' '.$cadete->cad_nombres }}</td>
					<td style="text-align: center">{{ $cadete->cad_sexo }}</td>
					<td>{{ $cadete->evdpte_peso }}</td>
					<td style="text-align: center">{{ $cadete->evdpte_talla }}</td>
					<td>{{ $cadete->evdpte_evpes_tipo }}</td>
					@if($cadete->evdpte_nota_pt < 50.99)
					<td style="background: #F4A6D9">{{ $cadete->evdpte_nota_pt }}</td>
					@else
					<td>{{ $cadete->evdpte_nota_pt }}</td>
					@endif
					<td style="text-align: center">{{ $cadete->evdpte_cant_flex }}</td>
					@if($cadete->evdpte_nota_flex < 50.99)
					<td style="background: #F4A6D9">{{ $cadete->evdpte_nota_flex }}</td>
					@else
					<td>{{ $cadete->evdpte_nota_flex }}</td>
					@endif
					<td style="text-align: center">{{ $cadete->evdpte_cant_abd }}</td>
					@if($cadete->evdpte_nota_abd < 50.99)
					<td style="background: #F4A6D9">{{ $cadete->evdpte_nota_abd }}</td>
					@else
					<td>{{ $cadete->evdpte_nota_abd }}</td>
					@endif
					<td style="text-align: center">{{ $cadete->evdpte_tiempo_aero }}</td>
					@if($cadete->evdpte_nota_aero < 50.99)
					<td style="background: #F4A6D9">{{ $cadete->evdpte_nota_aero }}</td>
					@else
					<td>{{ $cadete->evdpte_nota_aero }}</td>
					@endif
					<td style="text-align: center">{{ $cadete->evdpte_tiempo_vel }}</td>
					@if($cadete->evdpte_nota_vel < 50.99)
					<td style="background: #F4A6D9">{{ $cadete->evdpte_nota_vel }}</td>
					@else
					<td>{{ $cadete->evdpte_nota_vel }}</td>
					@endif
					<td style="text-align: center">{{ $cadete->evdpte_cant_barra }}</td>
					@if($cadete->evdpte_nota_barra < 50.99)
					<td style="background: #F4A6D9">{{ $cadete->evdpte_nota_barra }}</td>
					@else
					<td>{{ $cadete->evdpte_nota_barra }}</td>
					@endif
					<td style="text-align: center">{{ $cadete->evdpte_altura_cuerda }}</td>
					@if($cadete->evdpte_nota_cuerda < 50.99)
					<td style="background: #F4A6D9">{{ $cadete->evdpte_nota_cuerda }}</td>
					@else
					<td>{{ $cadete->evdpte_nota_cuerda }}</td>
					@endif
					<td style="text-align: center">{{ $cadete->evdpte_tiempo_nata }}</td>
					@if($cadete->evdpte_nota_nata < 50.99)
					<td style="background: #F4A6D9">{{ $cadete->evdpte_nota_nata }}</td>
					@else
					<td>{{ $cadete->evdpte_nota_nata }}</td>
					@endif
					<td style="text-align: center">{{ $cadete->evdpte_tiempo_jobs }}</td>
					@if($cadete->evdpte_nota_tiempo_jobs < 50.99)
					<td style="background: #F4A6D9">{{ $cadete->evdpte_nota_tiempo_jobs }}</td>
					@else
					<td>{{ $cadete->evdpte_nota_tiempo_jobs }}</td>
					@endif
					<td style="text-align: center">{{ $cadete->evdpte_cant_jobs }}</td>
					@if($cadete->evdpte_nota_ponderacion_jobs < 50.99)
					<td style="background: #F4A6D9">{{ $cadete->evdpte_nota_ponderacion_jobs }}</td>
					@else
					<td>{{ $cadete->evdpte_nota_ponderacion_jobs }}</td>
					@endif
					@if($cadete->evdpte_prom_final < 50.99)
					<td style="background: #F4A6D9; text-align: center">{{ $cadete->evdpte_prom_final }}</td>
					@else
					<td style="text-align: center">{{ $cadete->evdpte_prom_final }}</td>
					@endif
					<td>{{ $cadete->evdpte_observacion }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>

				
	</body>
</html>


