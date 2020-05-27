<!-- Common Pages -->
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<h1>Admin Control Panel</h1>
				</section>

				<!-- Main content -->
				<section class="content">
					<!-- Your Page Content Here -->
					<div class="box box-primary">
						<div class="box-header">
							<i class="fa fa-th-list"></i>
							<h3 class="box-title">Distributor Details</h3>
						</div>
						<?php $attr = array(
							'name' => 'form',
							'role' => 'form',
							'method' => 'post'
						);
						echo form_open($formlink, $attr); ?>
							<div class="box-body">
								<div class="form-group col-md-3">
									<label>First Name</label>
									<input type="text" class="form-control" name="firstName" id="firstName">
								</div>
								<div class="form-group col-md-3">
									<label>Last Name</label>
									<input type="text" class="form-control" name="lastName" id="lastName">
								</div>
								<div class="form-group col-md-3">
									<label>Contact Number</label>
									<input type="number" class="form-control" name="contactNmber" id="contactNmber">
								</div>
								<div class="form-group col-md-3">
									<label>Email Id</label>
									<input type="email" class="form-control" name="email" id="email">
								</div>
								<br/>
								<div class="form-group col-md-3">
									<label>Date of Birth</label>
									<input class="form-control" name="dob" id="dob" type="date">
								</div>
								<div class="form-group col-md-3">
									<label>Gender</label>
									<div class="row m-t-5">
										<div class="col-xs-6">
											<input type="radio" name="gender" id="gender" value="Male" checked=""> Male
										</div>
										<div class="col-xs-6">
											<input type="radio" class="col-xs-6" name="gender" id="gender" value="Female"> Female
										</div>
									</div>
								</div>
								<div class="form-group col-md-3">
								 	<label>Height (cm)</label>
								 	<input type="text" class="form-control" name="height" id="height">
								</div>
								<div class="form-group col-md-3">
								 	<label>Weight(Kg)</label>
								 	<input type="text" class="form-control" name="height" id="height">
								</div>
								<div class="clearfix"></div>
								<hr/>
								<div class="form-group col-md-4">
								 	<label>Do you smoke?</label>
									<div class="form-control">
										<div class="col-xs-6 no-padding">
											<input type="radio" name="smoke" id="smoke" value="yes" checked=""> Yes
										</div>
										<div class="col-xs-6 no-padding">
											<input type="radio" name="smoke" id="smoke" value="no"> No
										</div>
									</div>
								</div>
								<div class="form-group col-md-4">
									<label>Do you been denied coverage?</label><br/>
									<div class="form-control">
										<div class="col-xs-6 no-padding">
											<input type="radio" name="coverage" id="coverage" value="yes" checked=""> Yes
										</div>
										<div class="col-xs-6 no-padding">
											<input type="radio" name="coverage" id="coverage" value="no"> No
										</div>
									</div>
								</div>
								<div class="form-group col-md-4">
								 	<label>Add a spouse/child?</label>
								 	<input type="text" class="form-control" name="spouse" id="spouse">
								</div>
								<div class="clearfix"></div>
								<hr/>
								<div class="form-group col-md-3">
								 	<label>Have you been hospitalized?</label>
								 	<div class="form-control">
										<div class="col-xs-6 no-padding">
											<input type="radio" name="hospitalized" id="hospitalized" value="yes" checked=""> Yes
										</div>
										<div class="col-xs-6 no-padding">
											<input type="radio" name="hospitalized" id="hospitalized" value="no"> No
										</div>
									</div>
								</div>
								<div class="form-group col-md-3">
								 	<label>Are you expecting parent?</label>
								 	<div class="form-control">
										<div class="col-xs-6 no-padding">
											<input type="radio" name="expectingParent" id="expectingParent" value="yes" checked=""> Yes
										</div>
										<div class="col-xs-6 no-padding">
											<input type="radio" name="expectingParent" id="expectingParent" value="no"> No
										</div>
									</div>
								</div>
								<div class="form-group col-md-3">
									<label>Any pre-existing conditions?</label>
									<input type="text" class="form-control" name="preExistingConditions" id="preExistingConditions">
								</div>
								<div class="form-group col-md-3">
									<label>Desired Coverage?</label>
									<input type="text" class="form-control" name="desiredCoverage" id="desiredCoverage">
								</div>
								<div class="clearfix"></div>
								<hr/>
								<div class="form-group col-md-4">
									<label>Annual Household Income</label>
									<input type="text" class="form-control" name="annualHouseholdIncome" id="annualHouseholdIncome">
								</div>
								<div class="form-group col-md-4">
									<label>Household Size</label>
									<input type="text" class="form-control" name="householdSize" id="householdSize">
								</div>
								<div class="form-group col-md-4">
									<label>Are you currently insured?</label>
									<input type="text" class="form-control" name="currentlyInsured" id="currentlyInsured">
								</div>
								
								<div class="form-group col-md-9">
									<label>Address</label>
									<textarea class="form-control" name="address" id="address" rows="3"></textarea>
								</div>
								<div class="form-group col-md-3">
									<label>City</label>
									<input type="text" class="form-control" name="city" id="city">
									<label>Pin Code</label>
									<input type="number" class="form-control" name="pincode" id="pincode">
								</div>
							</div>
							<div class="box-footer">
								<div class="col-md-12">
									<?php echo form_submit('submit', 'Submit', 'class="btn btn-primary fl-right"'); ?>
								</div>
							</div>
						<?php echo form_close();?>
					</div>
				</section>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->