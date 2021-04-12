<?php
include('../../app/helpers/dashboard_page.php');
Dashboard_Page::headerTemplate('Portal Clientes');
?>

<script>

$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});

</script> 
 
<div id="contenido" class="container-fluid"> <!-- Seccion incluye todo el contenido del cuerpo la pagina -->
	<div id="fondo" class="container-fluid"> <!-- Seccion de cabecera con imagen de fondo-->
      	<div class="container">
	  		<h1 class="letraBlancaEspacio">Bienvenido al sistema de administradores</h1>
		  	<h3 class="letraBlancaIndex">SigmaQ</h3>
	  	</div>
    </div>	<!-- Cierra seccion de cabecera -->
	<div id="cartas" class="container-fluid"> <!-- Seccion de cartas estadisticas -->
		<div class="row"> <!-- Fila para ingresar las cartas estadisticas -->
    		<div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 espacioCartas"> 
        		<div class="card text-center">
            		<div id="cartaIndex" class="card-body fondoVerde">
                   	 	<div class="row">
                        	<div class="col-4">
                            	<img class="iconosEstadisticas" src="../../resources/img/iconPedidosEntregados.png" alt="tarjeta1">
                        	</div>
                        	<div class="col-8 alinearDerecha">
                            	<h5>100</h5>
                            	<p>Pedidos entregados</p>
                        	</div>
                    	</div>
            		</div>
            		<div class="card-footer text-muted pieCarta"></div>
        		</div>
    		</div>
    		<div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 espacioCartas">
        		<div class="card text-center">
            		<div id="cartaIndex" class="card-body fondoAnaranjado">
                    	<div class="row">
                        	<div class="col-4">
                            	<img class="iconosEstadisticas" src="../../resources/img/iconPlazosVencidos.png" alt="tarjeta2">
                        	</div>
                        	<div class="col-8 alinearDerecha">
                            	<h5>50</h5>
                            	<p>Plazos vencidos</p>
                        	</div>
                    	</div>
            		</div>
            		<div class="card-footer text-muted pieCarta"></div>
        		</div>
    		</div>
    		<div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 espacioCartas">
        		<div class="card text-center">
            		<div id="cartaIndex" class="card-body fondoRojo">
                    	<div class="row">
                        	<div class="col-4">
                            	<img class="iconosEstadisticas" src="../../resources/img/iconPedidosRestantes.png" alt="tarjeta3">
                        	</div>
                        	<div class="col-8 alinearDerecha">
                            	<h5>35</h5>
                            	<p>Pedidos restantes</p>
                        	</div>
                    	</div>
            		</div>
            		<div class="card-footer text-muted pieCarta"></div>
        		</div>
    		</div>
    		<div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 espacioCartas">
        		<div class="card text-center">
            		<div id="cartaIndex" class="card-body fondoAzul">
                    	<div class="row">
                        	<div class="col-4">
                            	<img class="iconosEstadisticas" src="../../resources/img/iconPedidosRegistrados.png" alt="tarjeta4">
                        	</div>
                        	<div class="col-8 alinearDerecha">
                            	<h5>150</h5>
                            	<p>Pedidos registrados</p>
                        	</div>
                    	</div>
            		</div>
            		<div class="card-footer text-muted pieCarta"></div>
        		</div>
    		</div>
		</div>
	</div> <!-- Cierra seccion de cartas estadisticas -->
	<div id="estadisticas" class="container-fluid"><!-- Seccion de estadisticas -->
		<div class="row"><!-- Fila para seccion estadisticas -->
			<div class="col-6"> <!-- Contenedor de grafica -->
				<div class="card">
  					<h5 class="card-header"></h5>
  					<div class="card-body centrar">
    					<img class="tamaño-grafica" src="../../resources/img/grafica.jpg" alt="">
  					</div>
				</div>
			</div> <!-- Cierra contenedor de grafica -->
			<div class="col-6"> <!-- Contenedor de tabla de usuarios que iniciaron sesion -->
				<div class="card">
  					<h5 class="card-header"></h5>
					  <div class="card-body">
					  	<table class="table table-striped">
  							<thead>
    							<tr>
      								<th scope="col">#</th>
      								<th scope="col">Usuario</th>
      								<th scope="col">Hora</th>
    							</tr>
  							</thead>
  							<tbody>
    						<tr>
      							<th scope="row">1</th>
      							<td>Castroll</td>
      							<td>11/04/2021 6:50pm</td>
    						</tr>
							<tr>
      							<th scope="row">3</th>
      							<td>Pacheco</td>
      							<td>11/04/2021 5:23pm</td>
    						</tr>
    						<tr>
      							<th scope="row">2</th>
      							<td>Moys</td>
     							<td>11/04/2021 4:23pm</td>
    						</tr>
  							</tbody>
						</table>
					</div>
				</div>
			</div> <!-- Cierra contenedor tabla de usuarios -->
		</div> <!-- Cierra fila de seccion estaditicas -->
	</div>	<!-- Cierra secion estadisticas -->
</div>	<!-- Cierra la seccion de contenido -->
<?php
Dashboard_Page::footerTemplate('../../resources/js/dashboard.js');
?>
