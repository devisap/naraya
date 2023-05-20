<!DOCTYPE html>
<html lang="en">
@include('admin.template.head')

<body id="kt_body"
    class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed"
    style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
    <div class="d-flex flex-column flex-root">
        <div class="page d-flex flex-row flex-column-fluid">
			@include('admin.template.sidebar')
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                @include('admin.template.header')
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <div class="post d-flex flex-column-fluid" id="kt_post">
                        <div id="kt_content_container" class="container-xxl">
                            <div class="row justify-content-end mb-6">
                                <div class="col-2">
                                    <label class="form-label">Month</label>
                                    <select class="form-select" data-control="select2">
                                        <option value="1">January</option>
                                        <option value="2">March</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label class="form-label">Year</label>
                                    <select class="form-select" data-control="select2">
                                        <option value="1">2022</option>
                                        <option value="2">2023</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-rounded table-striped gy-5 gs-5" id="tabelKaryawan">
                                        <thead>
                                            <tr class="text-dark fw-bolder">
                                                <th>No.</th>
                                                <th>Name</th>
                                                <th>Country</th>
                                                <th>No. Passport</th>
                                                <th>Expired Passport Date</th>
                                                <th>Date of Issue Permit</th>
                                                <th>Expired Permit Date</th>
                                                <th>Payment Date</th>
												<th>Status Passport</th>
												<th>Status Permit</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Divky Saputra</td>
                                                <td>India</td>
                                                <td>C9719020</td>
                                                <td>30 March 2023</td>
                                                <td>12 May 2023</td>
                                                <td>12 May 2024</td>
                                                <td>12 May 2023</td>
												<td><span class="badge badge-danger">Expired</span></td>
												{{-- <td><span class="badge badge-warning">Almost Expired</span></td> --}}
												<td><span class="badge badge-danger">Expired</span></td>
                                                <td class="">
                                                    <a href="" title="Detail Karyawan" data-bs-toggle="modal"
                                                        data-bs-target="#mdl_detKaryawan" data-id=""
                                                        class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm mdl_detKaryawan me-1">
                                                        <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <rect opacity="0.3" x="2" y="2"
                                                                    width="20" height="20" rx="10"
                                                                    fill="currentColor" />
                                                                <rect x="11" y="17" width="7"
                                                                    height="2" rx="1"
                                                                    transform="rotate(-90 11 17)" fill="currentColor" />
                                                                <rect x="11" y="9" width="2"
                                                                    height="2" rx="1"
                                                                    transform="rotate(-90 11 9)"
                                                                    fill="currentColor" />
                                                            </svg></span>
                                                    </a>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('admin.template.footer')
            </div>
        </div>
    </div>
    @include('admin.template.script')

    <div class="modal fade" tabindex="-1" id="mdl_detKaryawan">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="mb-3">Employee Details</h3>

                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                    rx="10" fill="currentColor" />
                                <rect x="7" y="15.3137" width="12" height="2" rx="1"
                                    transform="rotate(-45 7 15.3137)" fill="currentColor" />
                                <rect x="8.41422" y="7" width="12" height="2" rx="1"
                                    transform="rotate(45 8.41422 7)" fill="currentColor" />
                            </svg></span>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
								<div class="form-group">
									<h6>Name</h6>
									<p>Divky Satria</p>
								</div>
							</div>
							<div class="col">
								<div class="form-group">
									<h6>Country</h6>
									<p>India</p>
								</div>
							</div>
                        </div>
                        <div class="row">
							<div class="col">
								<div class="form-group">
									<h6>No. Passport</h6>
									<p>C9719020</p>
								</div>
							</div>
							<div class="col">
								<div class="form-group">
									<h6>Expired Passport Date</h6>
									<p>30 Maret 2033</p>
								</div>
							</div>
                        </div>
                        <div class="row">
							<div class="col">
								<div class="form-group">
									<h6>Date of Issue Permit</h6>
									<p>12 Mei 2023</p>
								</div>
							</div>
							<div class="col">
								<div class="form-group">
									<h6>Expired Permit Date</h6>
									<p>12 Mei 2024</p>
								</div>
							</div>
                        </div>
                        <div class="row">
							<div class="col">
								<div class="form-group">
									<h6>Payment Date</h6>
									<p>12 Mei 2023</p>
								</div>
							</div>
							<div class="col">
								<div class="form-group">
									<h6>Payment Amount</h6>
									<p>MYR 200</p>
								</div>
							</div>
                        </div>
						<div class="row">
							<div class="col">
								<div class="form-group">
									<h6>CIDB</h6>
									<p>5123 2312 1212 2345</p>
								</div>
							</div>
							<div class="col">
								<div class="form-group">
									<h6>Perkeso</h6>
									<p>C871 1234 4567</p>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="form-group">
									<h6>Insurance</h6>
									<p>W910 3032 0100 010</p>
								</div>
							</div>
							<div class="col">
								<div class="form-group">
									<h6>Status Passport</h6>
									<p><span class="badge badge-danger">Expired</span></p>
								</div>
							</div>
						</div>
                        <div class="row">
                            <div class="col">
								<div class="form-group">
									<h6>Status Permit</h6>
									<p><span class="badge badge-danger">Expired</span></p>
								</div>
							</div>
                        </div>

						<label class="fw-bold">Foto Passport</label>
                        <div class="me-7 mb-4 text-center">
                            <div class="">
                                <img alt="image" src="{{ asset('media/passport/passport.jpg') }}" style="max-width: 430px; min-width:430px;" />
                            </div>
                        </div>
						<label class="fw-bold">Foto</label>
                        <div class="me-7 mb-4 text-center">
                            <div class="">
                                <img alt="image" src="{{ asset('media/passport/foto.jpg') }}" style="max-width: 430px; min-width:300px; max-height: 300px; min-height: 280px;" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script>
    $('#tabelKaryawan').dataTable({
        "language": {
            "lengthMenu": "Show _MENU_",
            "zeroRecords": "Tidak ada data",
            "info": "Menampilkan _PAGE_ dari _PAGES_ Halaman",
            "infoEmpty": "Tidak ada data",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "search": "Search",
            "paginate": {
                "previous": "Previous",
                "next": "Next"
            },

        },
        "dom": "<'row'" +
            "<'col-sm-6 d-flex align-items-center justify-content-start'l>" +
            "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
            ">" +
            "<'table-responsive'tr>" +

            "<'row'" +
            "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
            "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
            ">"
    });
</script>
