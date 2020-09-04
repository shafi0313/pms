<!-- Sidebar -->
<div class="sidebar">
	<div class="sidebar-background"></div>
	<div class="sidebar-wrapper scrollbar-inner">
		<div class="sidebar-content">
			{{-- <div class="user">
				<div class="avatar-sm float-left mr-2">
					<img src="{{asset('backend/assets/img/profile.jpg')}}" alt="..." class="avatar-img rounded-circle">
				</div>
				<div class="info">
					<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
						<span>
							Hizrian
							<span class="user-level">Administrator</span>
							<span class="caret"></span>
						</span>
					</a>
					<div class="clearfix"></div>

					<div class="collapse in" id="collapseExample">
						<ul class="nav">
							<li>
								<a href="#profile">
									<span class="link-collapse">My Profile</span>
								</a>
							</li>
							<li>
								<a href="#edit">
									<span class="link-collapse">Edit Profile</span>
								</a>
							</li>
							<li>
								<a href="#settings">
									<span class="link-collapse">Settings</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
            </div> --}}

			<ul class="nav">
				<li class="nav-item active">
                    <a href="{{ route('admin.dashboard') }}">
						<i class="fas fa-home"></i>
						<p>Dashboard</p>
						{{-- <span class="badge badge-count">5</span> --}}
					</a>
                </li>

				<li class="nav-section">
					<span class="sidebar-mini-icon">
						<i class="fa fa-ellipsis-h"></i>
					</span>
					<h4 class="text-section">Components</h4>
                </li>

                <li class="nav-item">
					<a data-toggle="collapse" href="#specialist">
						<i class="fas fa-user-md"></i>
						<p>Doctor</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="specialist">
						<ul class="nav nav-collapse">
							<li>
                            <a href="{{ route('specialist.index') }}">
									<span class="sub-item">Doctor Specialist</span>
								</a>
							</li>
							<li>
								<a href="{{ route('doctor.index') }}">
									<span class="sub-item">Doctor</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="nav-item">
                <a href="{{ route('admin.user') }}">
                        <i class="fas fa-users-cog"></i>
						<p>Users</p>
					</a>
                </li>

                <li class="nav-item">
                    <a data-toggle="collapse" href="#medicine">
                        <i class="fas fa-pills"></i>
                        <p>Medicine</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="medicine">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('medicine.index') }}">
                                    <span class="sub-item">Medicine List</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('medicine.create') }}">
                                    <span class="sub-item">Add Medicine</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a data-toggle="collapse" href="#patients">
                        <i class="fas fa-user"></i>
                        <p>Patients</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="patients">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('patients.index') }}">
                                    <span class="sub-item">Patients List</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('patients.create') }}">
                                    <span class="sub-item">Add Patient</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#appointment">
                        <i class="far fa-calendar-check"></i>
                        <p>Appointments</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="appointment">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('appointment.patient') }}">
                                    <span class="sub-item">Add Appointment</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('appointment.show') }}">
                                    <span class="sub-item">Show Appointment</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>



				<li class="nav-item">
					<a data-toggle="collapse" href="#prescription">
						<i class="fas fa-pen-square"></i>
						<p>Prescription</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="prescription">
						<ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('prescription.index') }}">
									<span class="sub-item">Show prescription</span>
								</a>
							</li>
							<li>
                                <a href="{{ route('prescription.appointment') }}">
									<span class="sub-item">Create prescription</span>
								</a>
							</li>
						</ul>
					</div>
                </li>


				<li class="nav-item">
					<a data-toggle="collapse" href="#submenu">
						<i class="fas fa-bars"></i>
						<p>Menu Levels</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="submenu">
						<ul class="nav nav-collapse">
							<li>
								<a data-toggle="collapse" href="#subnav1">
									<span class="sub-item">Level 1</span>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="subnav1">
									<ul class="nav nav-collapse subnav">
										<li>
											<a href="#">
												<span class="sub-item">Level 2</span>
											</a>
										</li>
										<li>
											<a href="#">
												<span class="sub-item">Level 2</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li>
								<a data-toggle="collapse" href="#subnav2">
									<span class="sub-item">Level 1</span>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="subnav2">
									<ul class="nav nav-collapse subnav">
										<li>
											<a href="#">
												<span class="sub-item">Level 2</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li>
								<a href="#">
									<span class="sub-item">Level 1</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
			</ul>
		</div>
	</div>
</div>
<!-- End Sidebar -->
