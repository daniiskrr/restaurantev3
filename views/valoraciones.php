<!DOCTYPE html>
<html>
<body>
<body class="bg-black">
<section class="container-xxl text-center mt-5">
<h2 class="tituloh2 text-center container-xxl fs-3 text-color1">FILTROS VALORACIONES</h2>
<form class="form-registro" action="" name="registrar" method="post">	
	<label for="nota">Filtrar por nota:</label>
	<select id="nota" name="nota">
		<option value="" selected>No</option>
		<option id="1" value="1">1</option>
		<option id="2" value="2">2</option>
		<option id="3" value="3">3</option>
		<option id="4" value="4">4</option>
		<option id="5" value="5">5</option>
	</select>
	<label for="orden">Ordenar:</label>
	<select id="filtro" name="filtro">
		<option value="ascendente">Ascendente</option>
		<option value="descendente">Descendente</option>
	</select>
</form>
</section>

<section class="container-xxl text-center mt-5">
  <h2 class="tituloh2 text-center container-xxl fs-3 text-color1">VALORACIONES</h2>
  <div id="valoraciones">
    <table id="valoraciones-table">
      <thead>
        <tr>
          <th style="width: 15%">Número de pedido</th>
          <th style="width: 20%">Nombre y Apellido</th>
          <th style="width: 50%">Comentario</th>
          <th style="width: 15%">Valoración</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
</section>
<section class="container-xxl text-center mt-5">
<h2 class="tituloh2 text-center container-xxl fs-3 text-color1">AÑADIR VALORACIÓN</h2>
<?php if(isset($_SESSION['usuario'])){ ?>
<form class="form-registro" action="" name="registrar" method="post">
	<label for="nombre">Numero de pedido:</label>
	<select id="pedido" name="pedido">
    <option value="">Selecciona un pedido</option>
    <?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>
    <option value='<?php echo $fila['id_pedido'] ?>'><?php echo $fila['id_pedido'] ?></option>
	<?php } ?>
  </select>
	<label for="nombre">Nombre:</label>
	<input type="text" id="nombre" name="nombre" required>
	<label for="apellido">Apellido:</label>
	<input type="text" id="apellido" name="apellido" required>
	<label for="comentario">Comentario:</label>
	<textarea id="comentario" name="comentario" required></textarea><br><br>
	<label for="valoracion">Valoración:</label>
	<div class="star-rating">
		<label for="star-1">1</label>
		<label for="star-2">2</label>
		<label for="star-3">3</label>
		<label for="star-4">4</label>
		<label for="star-5">5</label>
	</div>
	<div class="star-rating2">
		<input type="radio" id="star-1" name="valoracion" value="1" required>
		<input type="radio" id="star-2" name="valoracion" value="2" required>
		<input type="radio" id="star-3" name="valoracion" value="3" required>
		<input type="radio" id="star-4" name="valoracion" value="4" required>
		<input type="radio" id="star-5" name="valoracion" value="5" required>
	</div>
<input type="hidden" name="botonregistro">
<button class="registro" name="valoracion" type="button" onclick="enviarResena()"> Añadir Valoración </button>
</form>
<?php }else{  ?> 
	<p class="text-center text-color2 mt-5 fs-3">Para poder introducir una reseña debes estar logueado</p>
	<p class="text-center text-color2 fs-3">Sentimos las molestias ocasionadas</p>
<?php }       ?> 
</section>
<script src="<?=base_url?>assets/js/valoraciones.js"></script>
</body>
</html>