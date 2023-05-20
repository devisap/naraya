<!DOCTYPE html>
<html lang="en">
@include('admin.template.head')

<body id="kt_body" class="bg-body">
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <div class="d-flex flex-column flex-lg-row-auto w-xl-600px positon-xl-relative"
                style="background-color: #F2C98A">
                <div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
                    <div class="d-flex flex-row-fluid flex-column text-center p-10 pt-lg-20">
                        <a href="#" class="py-9 mb-5">
                            <img alt="Logo" src="{{ asset('media/logos/akglobal.png') }}" class="h-60px" />
                        </a>
                        <h1 class="fw-bolder fs-2qx pb-5 pb-md-10" style="color: #986923;">Welcome to AK Global
                        </h1>
                        {{-- <p class="fw-bold fs-2" style="color: #986923;">Empowering Employees
                            <br />Enhancing Success
                        </p> --}}
                    </div>
                    <div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-350px"
                        style="background-image: url(media/illustrations/dozzy-1/2.png)"></div>
                </div>
            </div>
            <div class="d-flex flex-column flex-lg-row-fluid py-10">
                <div class="d-flex flex-center flex-column flex-column-fluid">
                    <div class="w-lg-500px p-10 p-lg-15 mx-auto">
                        <form class="form w-100" action="#">
                            <div class="text-center mb-10">
                                <h1 class="text-dark mb-3">Login to AK Global Admin</h1>
                            </div>
                            <div class="fv-row mb-10">
                                <label class="form-label fs-6 fw-bolder text-dark required">Username</label>
                                <input class="form-control form-control-lg form-control-solid" type="text"
                                    name="email" autocomplete="off" placeholder="Please Insert Username !" required/>
                            </div>
                            <div class="fv-row mb-10">
                                <div class="d-flex flex-stack mb-2">
                                    <label class="form-label fw-bolder text-dark fs-6 mb-0 required">Password</label>
                                </div>
                                <input class="form-control form-control-lg form-control-solid" type="password"
                                    name="password" autocomplete="off" placeholder="Please Insert Password !" required/>
                            </div>
                            <div class="text-center">
                                <button type="submit" id="" class="btn btn-lg btn-primary w-100 mb-5">
                                    <span class="indicator-label">Login</span>
                                    {{-- <span class="indicator-progress">Please Wait... --}}
                                        {{-- <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span> --}}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('js/scripts.bundle.js') }}"></script>
    {{-- <script src="{{ asset('js/custom/authentication/sign-in/general.js') }}"></script> --}}

</body>

</html>
