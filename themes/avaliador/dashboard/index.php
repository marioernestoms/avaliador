<?php 
/**
 * The main template file.
 *
 * @package Divi-Child
 * @author marioernestoms
 */

get_header(); ?>

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

				<div class="row">
					<div class="col-sm-6 col-lg-3">

							<!--Registered User-->
							<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
							<div class="panel media pad-all">
								<div class="media-left">
									<span class="icon-wrap icon-wrap-xs bg-success">
										<i class="fa fa-bullhorn fa-2x" aria-hidden="true"></i>
									</span>
								</div>

								<div class="media-body">
									<p class="text-2x mar-no text-semibold">75</p>
									<p class="text-muted mar-no">Jeit.ins criados</p>
								</div>
							</div>
							<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

						</div>

						<div class="col-sm-6 col-lg-3">

							<!--New Order-->
							<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
							<div class="panel media pad-all">
								<div class="media-left">
									<span class="icon-wrap icon-wrap-xs bg-info">
										<i class="fa fa-eye fa-2x" aria-hidden="true"></i>
									</span>
								</div>

								<div class="media-body">
									<p class="text-2x mar-no text-semibold">1.020</p>
									<p class="text-muted mar-no">Visualizações</p>
								</div>
							</div>
							<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

						</div>

						<div class="col-sm-6 col-lg-3">

							<!--Comments-->
							<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
							<div class="panel media pad-all">
								<div class="media-left">
									<span class="icon-wrap icon-wrap-xs bg-warning">
										<i class="fa fa-hand-pointer-o fa-2x" aria-hidden="true"></i>
									</span>
								</div>

								<div class="media-body">
									<p class="text-2x mar-no text-semibold">122</p>
									<p class="text-muted mar-no">Clicks CTA</p>
								</div>
							</div>
							<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

						</div>

						<div class="col-sm-6 col-lg-3">

							<!--Sales-->
							<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
							<div class="panel media pad-all">
								<div class="media-left">
									<span class="icon-wrap icon-wrap-xs bg-danger">
										<i class="fa fa-line-chart fa-2x" aria-hidden="true"></i>
									</span>
								</div>

								<div class="media-body">
									<p class="text-2x mar-no text-semibold">11,9%</p>
									<p class="text-muted mar-no">de Conversão</p>
								</div>
							</div>
							<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

						</div>
					</div>
					<!--===================================================-->
					<!--End Tiles - Bright Version-->

					<div class="row">
						<div class="col-xs-12">
							<div class="panel">
								<div class="panel-heading">
									<div class="panel-control">
										<a class="fa fa-question-circle fa-lg fa-fw unselectable add-tooltip" href="#" data-original-title="<h4 class='text-thin'>Information</h4><p style='width:150px'>This is an information bubble to help the user.</p>" data-html="true" title=""></a>
									</div>
									<h3 class="panel-title">Melhores Jeit.ins</h3>
								</div>

								<!--Data Table-->
								<!--===================================================-->
								<div class="panel-body">
									<div class="table-responsive">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>Jeit.ins</th>
													<th>Visualizações</th>
													<th>Clicks CTA</th>
													<th>% de Conversão</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td><strong>Post Thais TEDx</strong></td>
													<td><i class="fa fa-eye"></i> 314</span></td>
													<td>87</td>
													<td>11,9%</td>
												</tr>
												<tr>
													<td><strong>Post prisão Sérgio Cabral</strong></td>
													<td><i class="fa fa-eye"></i> 124</span></td>
													<td>32</td>
												   	<td>11,9%</td>
												</tr>
												<tr>
													<td><strong>Post Blog Ana Maria Braga</strong></td>
													<td><i class="fa fa-eye"></i> 45</span></td>
													<td>12</td>
													<td>11,9%</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
								<!--===================================================-->
								<!--End Data Table-->

							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-xs-12">
							<div class="panel">
								<div class="panel-heading">
									<div class="panel-control">
										<a class="fa fa-question-circle fa-lg fa-fw unselectable add-tooltip" href="#" data-original-title="<h4 class='text-thin'>Information</h4><p style='width:150px'>This is an information bubble to help the user.</p>" data-html="true" title=""></a>
									</div>
									<h3 class="panel-title">Melhores CTAs</h3>
								</div>

								<!--Data Table-->
								<!--===================================================-->
								<div class="panel-body">
									<div class="table-responsive">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>CTAs</th>
													<th>Visualizações</th>
													<th>Clicks CTA</th>
													<th>% de Conversão</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td><strong>Link Whatsapp</strong></td>
													<td><i class="fa fa-eye"></i> 314</span></td>
													<td>211</td>
													<td>11,9%</td>
												</tr>
												<tr>
													<td><strong>Captura de e-mail</strong></td>
													<td><i class="fa fa-eye"></i> 124</span></td>
													<td>121</td>
												   	<td>11,9%</td>
												</tr>
												<tr>
													<td><strong>Saída produto e-commerce</strong></td>
													<td><i class="fa fa-eye"></i> 45</span></td>
													<td>34</td>
													<td>11,9%</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
								<!--===================================================-->
								<!--End Data Table-->

							</div>
						</div>
					</div>
				</div>
				
			</div>

		</div>
		
	</div>

<?php get_footer(); ?>
