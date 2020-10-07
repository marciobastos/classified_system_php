<?php require 'pages/header.php'; ?>
<?php
require 'classes/anuncios.class.php';
require 'classes/usuarios.class.php';
require 'classes/categorias.class.php';
$a = new Anuncios();
$u = new Usuarios();
$c = new Categorias();

$filtros = array(
	'categoria' => '',
	'preco' => '',
	'estado' => ''
);
if(isset($_GET['filtros'])) {
	$filtros = $_GET['filtros'];
}

$total_anuncios = $a->getTotalAnuncios($filtros);
$total_usuarios = $u->getTotalUsuarios();

$p = 1;
if(isset($_GET['p']) && !empty($_GET['p'])) {
	$p = addslashes($_GET['p']);
}
// numero de anúncios por página
$por_pagina = 3;
$total_paginas = ceil($total_anuncios / $por_pagina);

$anuncios = $a->getUltimosAnuncios($p, $por_pagina, $filtros);
$categorias = $c->getLista();
?>

<div class="main-carousel">
	  <div id="myCarousel" class="carousel slide" data-ride="carousel">
	    <!-- Indicators -->
	    <ol class="carousel-indicators">
	      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	      <li data-target="#myCarousel" data-slide-to="1"></li>
	      <li data-target="#myCarousel" data-slide-to="2"></li>
	      <li data-target="#myCarousel" data-slide-to="3"></li>
	    </ol>

	 <!--   <div class="col-xs-3">
	    	                 <a href="<?php //echo $sr['url']; ?>">
	    	       <img src="<?php //echo BASE_URL?>/partner-images/<?php //echo $sr['name']?>" />
	    	                        </a>
	    	                  </div> -->

	    <!-- Wrapper for slides -->
	    <div class="carousel-inner" role="listbox">

	    	<?php foreach($anuncios as $key=>$slider) { ?> 

	    	        <div class="item <?php echo ($key == 0) ? "active" : ""; ?> ">
	    	            <img src="assets/images/anuncios/<?php  echo $slider['url']; ?>" height="100%" height="200" alt="Image of every carousel"/>
	    	            <div class="carousel-caption">
	          				<h3>Chania</h3>
	          				<p>The atmosphere in Chania has a touch of Florence and Venice.</p>
	        			</div>
	    	        </div>

	    	<?php } ?>

	   
	  
		
	    </div>

	    <!-- Left and right controls -->
	    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			  <span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			  <span class="sr-only">Next</span>
			</a>
	    
	  </div>
	</div>
	<!-- end carousel -->
<div class="container-fluid">
	<!--<div class="jumbotron">
		<h2>Nós temos hoje <?php //echo $total_anuncios; ?> anúncios.</h2>
		<p>E mais de <?php //echo $total_usuarios; ?> usuários cadastrados.</p>
	</div> -->

	<div class="row">
		<div class="col-sm-4">
			<h4>Pesquisa Avançada</h4>
			<form method="GET">
				<div class="form-group">
					<label for="categoria">Categoria:</label>
					<select id="categoria" name="filtros[categoria]" class="form-control">
						<option>Selecione</option>
						<?php foreach($categorias as $cat): ?>
						<option value="<?php echo $cat['id']; ?>" <?php echo ($cat['id']==$filtros['categoria'])?'selected="selected"':''; ?>><?php echo utf8_encode($cat['nome']); ?></option>
						<?php endforeach; ?>
					</select>
				</div>

				<div class="form-group">
					<label for="preco">Preço:</label>
					<select id="preco" name="filtros[preco]" class="form-control">
						<option></option>
						<option value="0-50" <?php echo ($filtros['preco']=='0-50')?'selected="selected"':''; ?>>R$ 0 - 50</option>
						<option value="51-100" <?php echo ($filtros['preco']=='51-100')?'selected="selected"':''; ?>>R$ 51 - 100</option>
						<option value="101-200" <?php echo ($filtros['preco']=='101-200')?'selected="selected"':''; ?>>R$ 101 - 200</option>
						<option value="201-500" <?php echo ($filtros['preco']=='201-500')?'selected="selected"':''; ?>>R$ 201 - 500</option>
					</select>
				</div>

				<div class="form-group">
					<label for="estado">Estado de Conservação:</label>
					<select id="estado" name="filtros[estado]" class="form-control">
						<option></option>
						<option value="0" <?php echo ($filtros['estado']=='0')?'selected="selected"':''; ?>>Ruim</option>
						<option value="1" <?php echo ($filtros['estado']=='1')?'selected="selected"':''; ?>>Bom</option>
						<option value="2" <?php echo ($filtros['estado']=='2')?'selected="selected"':''; ?>>Ótimo</option>
					</select>
				</div>

				<div class="form-group">
					<input type="submit" class="btn btn-info" value="Buscar" />
				</div>
			</form>

		</div>
		<div class="col-sm-8">
			<h4>Últimos Anúncios</h4>
			<table class="table table-striped">
				<tbody>
					<?php if($anuncios): ?>
					<?php foreach($anuncios as $anuncio): ?>
					<tr>
						<td>
							<?php if(!empty($anuncio['url'])): ?>
							<img src="assets/images/anuncios/<?php echo $anuncio['url']; ?>" height="100" border="0" />
							<?php else: ?>
							<img src="assets/images/default.jpg" height="100" border="0" />
							<?php endif; ?>
						</td>
						<td>
							<a href="produto.php?id=<?php echo $anuncio['id']; ?>"><?php echo $anuncio['titulo']; ?></a><br/>
							<?php echo utf8_encode($anuncio['categoria']); ?>
						</td>
						<td>R$ <?php echo number_format($anuncio['valor'], 2, ',', '.'); ?></td>
					</tr>
					<?php endforeach; ?>
					<?php else: ?>
						<p>Nenhum resultado encontrado!</p>
					<?php endif; ?>
				</tbody>
			</table>

			<ul class="pagination">
				<?php for($q=1;$q<=$total_paginas;$q++): ?>
				<li class="<?php echo ($p==$q)?'active':''; ?>"><a href="index.php?p=<?php echo $q; ?>"><?php echo $q; ?></a></li>
				<?php endfor; ?>
			</ul>
		</div>
	</div>


	</div>

<?php require 'pages/footer.php'; ?>