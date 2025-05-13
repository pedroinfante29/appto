
<?= view('layout/header', ['title' => 'Usuarios']) ?>
<?= view('layout/navbar') ?>

	<!-- Page content -->


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Datatables</span> - Basic</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					<div class="header-elements d-none">
						<div class="d-flex justify-content-center">
							<a href="#" class="btn btn-link btn-float text-default"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
							<a href="#" class="btn btn-link btn-float text-default"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
							<a href="#" class="btn btn-link btn-float text-default"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
						</div>
					</div>
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<a href="datatable_basic.html" class="breadcrumb-item">Datatables</a>
							<span class="breadcrumb-item active">Basic</span>
						</div>

						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					<div class="header-elements d-none">
						<div class="breadcrumb justify-content-center">
							<a href="#" class="breadcrumb-elements-item">
								<i class="icon-comment-discussion mr-2"></i>
								Support
							</a>

							<div class="breadcrumb-elements-item dropdown p-0">
								<a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">
									<i class="icon-gear mr-2"></i>
									Settings
								</a>

								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Account security</a>
									<a href="#" class="dropdown-item"><i class="icon-statistics"></i> Analytics</a>
									<a href="#" class="dropdown-item"><i class="icon-accessibility"></i> Accessibility</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-gear"></i> All settings</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content">

            <div class="row">
					<div class="col-lg-6">
			            <div class="card">
							<div class="card-header header-elements-inline">
								<h6 class="card-title">Formulario de Registro</h6>
								<div class="header-elements">
									<div class="list-icons">
				                		<a class="list-icons-item" data-action="collapse"></a>
				                		<a class="list-icons-item" data-action="reload"></a>
				                		<a class="list-icons-item" data-action="remove"></a>
				                	</div>
			                	</div>
							</div>

			                <div class="card-body">
                            <form method="post" action="<?= base_url('users/save') ?>" class="mb-4">
                                <?= csrf_field() ?>
                                <h4>Registrar nuevo usuario</h4>
                                    <div class="form-group row">
                                        <div class="col-md-10">
                                            <input autocomplete="off" type="text" class="form-control"  name="tuser_nombre" class="form-control" placeholder="Nombre" required>
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <div class="col-md-10">
                                            <input autocomplete="off" type="email" class="form-control"  name="tuser_email" class="form-control" placeholder="Correo" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-10">
                                            <input autocomplete="off" type="password" class="form-control"  name="tuser_pass" class="form-control" placeholder="Contraseña (mín. 10)" required minlength="10">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-10">
                                            <button type="submit" class="btn btn-success">Registrar <i class="icon-user ml-2"></i></button>
                                        </div>
                                    </div>
                            </form>
			                </div>
			            </div>
					</div>
				</div>
				<!-- Basic datatable -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Lista de Usuarios</h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div>
					</div>
<!--
					<div class="card-body">
						The <code>Datos de usuarios</code> 
                        is a highly flexible tool, based upon the foundations of progressive enhancement, 
                        and will add advanced interaction controls to any HTML table. DataTables has most features enabled by default, 
                        so all you need to do to use it with your own tables is to call the construction function. 
                        Searching, ordering, paging etc goodness will be immediately added to the table, as shown in this example. 
                        <strong>Datatables support all available table styling.</strong>
					</div>
-->

					<table class="table datatable-basic">
						<thead>
							<tr>
								<th>Id</th>
								<th>Nombre</th>
								<th>Email</th>
								<th>Fecha Cración</th>
								<th>Estado</th>
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody>
                        <?php foreach ($users as $user): ?>
							<tr>
								<td><?= esc($user['tuser_id']) ?></td>
								<td><?= esc($user['tuser_nombre']) ?></td>
								<td><?= esc($user['tuser_email']) ?></td>
								<td><?= esc($user['tuser_fecha_creacion']) ?></td>
								<td><span class="badge badge-success">Active</span></td>
								<td class="text-center">
									<div class="list-icons">
										<div class="dropdown">
											<a href="#" class="list-icons-item" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>

											<div class="dropdown-menu dropdown-menu-right">
												<a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to .pdf</a>
												<a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to .csv</a>
												<a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to .doc</a>
											</div>
										</div>
									</div>
								</td>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				</div>

				<!-- /basic datatable -->

<?= view('layout/footer') ?>

