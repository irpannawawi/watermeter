<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>iofrm</title>
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="assets/dist/login/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/dist/login/css/fontawesome-all.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/dist/login/css/iofrm-style.css" />
    <link rel="stylesheet" type="text/css" href="assets/dist/login/css/iofrm-theme17.css" />
</head>

<body>
    <div class="form-body without-side">
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img src="assets/images/favicon.ico" alt="" />
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Login to account</h3>
                        <p>Access your Smart Water Meter with IoT</p>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <input class="form-control @error('email') is-invalid @enderror" type="text"
                                name="email" placeholder="E-mail Address" />
                            @error('email')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    {{ $message }}</div>
                            @enderror
                            <input class="form-control @error('password') is-invalid @enderror" type="password"
                                name="password" placeholder="Password" />
                            @error('password')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    {{ $message }}</div>
                            @enderror
                            <div class="form-button"><button id="submit" type="submit" class="ibtn">Login</button>
                                <a href="forget17.html">Forget password?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/dist/login/js/jquery.min.js"></script>
    <script src="assets/dist/login/js/popper.min.js"></script>
    <script src="assets/dist/login/js/bootstrap.min.js"></script>
    <script src="assets/dist/login/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- sweet alert --}}
    @if ($message = Session::get('success'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ $message }}',
            })
            Swal.fire(
                'Good job!',
                '{{ $message }}',
                'success'
            )
        </script>
    @endif
    @if ($message = Session::get('failed'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ $message }}',
            })
        </script>
    @endif
</body>

</html>
