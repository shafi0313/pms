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
				<li class="nav-item {{$p=='da'?'active':''}}">
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

            @role('admin')
                <li class="nav-item {{$p=='user'?'active':''}}">
					<a data-toggle="collapse" href="#submenu">
						<i class="fas fa-users-cog"></i>
						<p>Admin</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="submenu">
						<ul class="nav nav-collapse">
							<li>
								<a data-toggle="collapse" href="#subnav1">
									<span class="sub-item">User Management</span>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="subnav1">
									<ul class="nav nav-collapse subnav">
										<li>
											<a href="{{ route('users.index') }}">
												<span class="sub-item">Show User</span>
											</a>
										</li>
										<li>
											<a href="{{ route('users.create') }}">
												<span class="sub-item">Add User</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li>
								<a data-toggle="collapse" href="#subnav2">
									<span class="sub-item">User Permission</span>
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
							{{-- <li>
								<a href="#">
									<span class="sub-item">Level 1</span>
								</a>
							</li> --}}
						</ul>
					</div>
                </li>
            @endrole





                {{-- <li class="nav-item {{$p=='user'?'active':''}}">
					<a data-toggle="collapse" href="#user">
						<i class="fas fa-users-cog"></i>
						<p>User Management</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="user">
						<ul class="nav nav-collapse">
							<li>
                                <a href="{{ route('users.index') }}">
									<span class="sub-item">Show User</span>
								</a>
							</li>
							<li>
								<a href="{{ route('users.create') }}">
									<span class="sub-item">Add User</span>
								</a>
							</li>
						</ul>
					</div>
                </li> --}}

                @role('admin|counter')
                <li class="nav-item {{$p=='doctor'?'active':''}}">
					<a data-toggle="collapse" href="#doctor">
						<i class="fas fa-user-md"></i>
						<p>Doctor</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="doctor">
						<ul class="nav nav-collapse">
							<li>
                            <a href="{{ route('doctor.index') }}">
									<span class="sub-item">Show Doctor</span>
								</a>
							</li>
							<li>
								<a href="{{ route('doctor.create') }}">
									<span class="sub-item">Add Doctor</span>
								</a>
							</li>
						</ul>
					</div>
                </li>
                @endrole

                <li class="nav-item {{$p=='tools'?'active':''}}">
					<a data-toggle="collapse" href="#tools">
						<i class="fas fa-tools"></i>
						<p>Tools</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="tools">
						<ul class="nav nav-collapse">
							<li>
                                <a href="{{ route('specialist.index') }}">
                                    <i class="fas fa-notes-medical"></i>
                                    <p>Doctor Specialist</p>
                                </a>
							</li>
							<li>
								<a href="{{ route('medicine.index') }}">
                                    <i class="fas fa-pills"></i>
                                    <p>Medicine</p>
                                </a>
                            </li>
                            <li>
								<a href="{{ route('test-cat.index') }}">
                                    <i class="fas fa-microscope"></i>
                                    <p>Test Category</p>
                                </a>
                            </li>
                            <li>
								<a href="{{ route('doctor_chamber.index') }}">
                                    <i class="fas fa-clinic-medical"></i>
                                    <p>Doctor Chamber</p>
                                </a>
							</li>
						</ul>
					</div>
                </li>

				{{-- <li class="nav-item">
                <a href="{{ route('admin.user') }}">
                        <i class="fas fa-users-cog"></i>
						<p>Users</p>
					</a>
                </li> --}}

                {{-- <li class="nav-item {{$p=='ds'?'active':''}}">
                    <a href="{{ route('specialist.index') }}">
                        <i class="fas fa-notes-medical"></i>
                        <p>Doctor Specialist</p>
                    </a>
                </li>

                <li class="nav-item {{$p=='medicine'?'active':''}}">
                    <a href="{{ route('medicine.index') }}">
                        <i class="fas fa-pills"></i>
                        <p>Medicine</p>
                    </a>
                </li>

                <li class="nav-item {{$p=='medical_test'?'active':''}}">
                    <a href="{{ route('medical_test.index') }}">
                        <i class="fas fa-microscope"></i>
                        <p>Test Category</p>
                    </a>
                </li> --}}

                <li class="nav-item {{$p=='patients'?'active':''}}">
                    <a data-toggle="collapse" href="#patients">
                        <i class="fas fa-user-injured"></i>
                        <p>Patients</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="patients">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('patients.index') }}">
                                    <span class="sub-item">Show Patients</span>
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

                <li class="nav-item {{$p=='appoinments'?'active':''}}">
                    <a data-toggle="collapse" href="#appointment">
                        <i class="far fa-calendar-check"></i>
                        <p>Appointments</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="appointment">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('appointments.index') }}">
                                    <span class="sub-item">Show Appointment</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('appointment.patient') }}">
                                    <span class="sub-item">Add Appointment</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item {{$p=='patient_test'?'active':''}}">
					<a data-toggle="collapse" href="#patient_test">
						<i class="fas fa-vials"></i>
						<p>Patient Test</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="patient_test">
						<ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('patient_test.index') }}">
									<span class="sub-item">Show Test</span>
								</a>
							</li>
							<li>
                                <a href="{{ route('patient_test.appointment') }}">
									<span class="sub-item">Add Patient Test</span>
								</a>
							</li>
						</ul>
					</div>
                </li>

				<li class="nav-item {{$p=='prescription'?'active':''}}">
					<a data-toggle="collapse" href="#prescription">
						<i class="fas fa-file-prescription"></i>
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
									<span class="sub-item">Appointments</span>
								</a>
							</li>
						</ul>
					</div>
                </li>

                @role('admin|counter')
                <li class="nav-item {{$p=='visitor'?'active':''}}">
                    <a class="dropdown-item" href="{{ route('VisitorInfo') }}" >
                        <i class="fas fa-user-secret"></i>
                        <p>Visitor Info</p>
                    </a>
                </li>
                @endrole

                <li class="nav-item">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>

				{{-- <li class="nav-item">
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
				</li> --}}
			</ul>
		</div>
	</div>
</div>
<!-- End Sidebar -->






