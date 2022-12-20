@extends('layouts.app')

@section('content')

<div class="page-content">
	<div class="container-fluid">
		<!-- start page title -->
		<div class="row">
			<div class="col-12">
				<div class="page-title-box d-sm-flex align-items-center justify-content-between">
					<h4 class="mb-sm-0">Form User</h4>
					<div class="page-title-right">
						<ol class="breadcrumb m-0">
							<li class="breadcrumb-item">
								<a href="javascript: void(0);">Home</a>
							</li>
							<li class="breadcrumb-item active">Form User</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		<!-- end page title -->
		
		<div class="row">
			<div class="col-lg-12">
                
				<div class="card">
					
					<div class="card-body">
						<ul class="nav nav-tabs mb-3" role="tablist" style="margin-bottom: 1px !important;">
							<li class="nav-item">
								<a class="nav-link active" data-bs-toggle="tab" href="#halaman1" role="tab" aria-selected="true">
									Form User
								</a>
							</li>
							<!-- <li class="nav-item">
								<a class="nav-link" data-bs-toggle="tab" href="#halaman2" role="tab" aria-selected="false">
									Halaman 2
								</a>
							</li> -->
							
						</ul>
						<div class="tab-content  text-muted" style="padding: 1%; border: solid 1px #e6e6eb;">
                            <div class="tab-pane active" id="halaman1" role="tabpanel">
								<div class="row">
									<div class="col-lg-6">
										<div class="row">
											<div class="col-md-6">
												<label for="validationCustomUsername" class="form-label">Username</label>
												<div class="input-group input-group-sm has-validation">
													<input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required="">
													
												</div>
											</div>
											<div class="col-md-6">
												<label for="validationCustomUsername" class="form-label">Username</label>
												<div class="input-group  input-group-sm has-validation">
													<span class="input-group-text" id="inputGroupPrepend">@</span>
													<input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required="">
													<div class="invalid-feedback">
														Please choose a username.
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-6">

									</div>
								</div>
							</div>
                            <!-- <div class="tab-pane" id="halaman2" role="tabpanel">
								
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
		
	</div>
	<!-- container-fluid --></div>
@endsection

@push('ajax')
        
        
    <script type="text/javascript">
        
    </script>
@endpush
