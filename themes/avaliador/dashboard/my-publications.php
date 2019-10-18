<?php 
/**
 * Template Name: Minhas Publicações
 *
 * @package Divi-Child
 * @author marioernestoms
 */

get_header( 'dashboard' ); ?>

	<div class="wrapper">
		<!-- Sidebar Holder -->
		<?php require( 'template-parts/sidebar-left.php' ) ?>

		<!-- Page Content Holder -->
		<div id="content">

			<nav class="navbar">
				<div class="container-fluid">
						<?php require( 'template-parts/navbar-top.php' ) ?>
				</div>     
			</nav>

			<div class="col-lg-12">
				<div class="row">
					<?php require( 'template-parts/page-title.php' ) ?>
				</div>

				<div class="panel">
					<!--Data Table-->
					<!--===================================================-->
					<div class="panel-body">
						<div class="pad-btm form-inline">
							<div class="row">
								<div class="col-sm-6 table-toolbar-left">
									<button id="demo-btn-addrow" class="btn btn-purple btn-labeled fa fa-plus">Adicionar Jeit.in</button>
								</div>
								<div class="col-sm-6 table-toolbar-right">
									<div class="form-group">
										<input id="demo-input-search2" type="text" placeholder="Search" class="form-control" autocomplete="off">
									</div>
								</div>
							</div>
						</div>
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Nome</th>
										<th>Call to Action</th>
										<th>Visualizações</th>
										<th>Clicks CTA</th>
										<th>% de Conversão</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><a class="btn-link" href="#"> Nome</a></td>
										<td>Whatsapp</td>
										<td><i class="fa fa-eye"></i> 1023</span></td>
										<td>230</td>
										<td>13,4%</td>
										<td>
											<button class="btn btn-warning btn-labeled fa fa-pencil-square-o fa-lg mar-rgt" type="submit">Editar</button>
											<button class="btn btn-danger btn-labeled fa fa-trash fa-lg" type="reset">Arquivar</button>
										</td>
									</tr>
									<tr>
										<td><a class="btn-link" href="#"> Nome</a></td>
										<td>Link</td>
										<td><i class="fa fa-eye"></i> 1023</td>
										<td>230</td>
										<td>13,4%</td>
										<td>
											<button class="btn btn-warning btn-labeled fa fa-pencil-square-o fa-lg mar-rgt" type="submit">Editar</button>
											<button class="btn btn-danger btn-labeled fa fa-trash fa-lg" type="reset">Arquivar</button>
										</td>
									</tr>
									<tr>
										<td><a class="btn-link" href="#"> Nome</a></td>
										<td>E-Commerce</td>
										<td><i class="fa fa-eye"></i> 1023</td>
										<td>230</td>
										<td>13,4%</td>
										<td>
											<button class="btn btn-warning btn-labeled fa fa-pencil-square-o fa-lg mar-rgt" type="submit">Editar</button>
											<button class="btn btn-danger btn-labeled fa fa-trash fa-lg" type="reset">Arquivar</button>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<!--===================================================-->
					<!--End Data Table-->
				
				</div>
				
				<div class="row">

					<h2>My Customers</h2>

					<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

					<table id="myTable">
					<tr class="header">
						<th style="width:60%;">Name</th>
						<th style="width:40%;">Country</th>
					</tr>
					<tr>
						<td>Alfreds Futterkiste</td>
						<td>Germany</td>
					</tr>
					<tr>
						<td>Berglunds snabbkop</td>
						<td>Sweden</td>
					</tr>
					<tr>
						<td>Island Trading</td>
						<td>UK</td>
					</tr>
					<tr>
						<td>Koniglich Essen</td>
						<td>Germany</td>
					</tr>
					<tr>
						<td>Laughing Bacchus Winecellars</td>
						<td>Canada</td>
					</tr>
					<tr>
						<td>Magazzini Alimentari Riuniti</td>
						<td>Italy</td>
					</tr>
					<tr>
						<td>North/South</td>
						<td>UK</td>
					</tr>
					<tr>
						<td>Paris specialites</td>
						<td>France</td>
					</tr>
					</table>

					<script>
					function myFunction() {
					var input, filter, table, tr, td, i;
					input = document.getElementById("myInput");
					filter = input.value.toUpperCase();
					table = document.getElementById("myTable");
					tr = table.getElementsByTagName("tr");
					for (i = 0; i < tr.length; i++) {
						td = tr[i].getElementsByTagName("td")[0];
						if (td) {
						if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
							tr[i].style.display = "";
						} else {
							tr[i].style.display = "none";
						}
						}       
					}
					}
					</script>
				</div>

			</div>

		</div>
		
	</div>

<?php get_footer( 'dashboard' ); ?>
