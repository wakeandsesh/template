<!doctype html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Hello, world!</title>
</head>
<body class="d-flex flex-column">

    <header class="sticky-top">

        {{ menu('top_menu', 'bootstrap4') }}
    </header>
    <main>
        @yield('content')
    </main>
    <footer class="bg-dark mt-auto">
        <div class="container">
            <h4>Test</h4>
        </div>
    </footer>

    <!-- Modal -->
    <div class="modal fade" id="top_formModal" tabindex="-1" role="dialog" aria-labelledby="top_formModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="top_formModalLabel">Обратная связь</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" id="contact_form" novalidate>
                        @csrf
                        <div class="form-group">
                            <label for="username">Имя пользователя</label>
                            <input type="text" name="username" class="form-control" id="username" aria-describedby="Ваше имя" required>
                            <div class="invalid-feedback">
                                Введите имя
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone">Ваш телефон</label>
                            <input type="text" name="phone" class="form-control phone" id="phone" required >
                            <div class="invalid-feedback">
                                Введите телефон
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" id="contact_form_btn">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{!! asset('js/app.js') !!}">
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
<script>
    $(document).ready(function(){
        $('.phone').mask('+38(000)-000-00-00', {placeholder: "+38(___)-___-__-__"});
        $('#contact_form').on('submit', function(e){
            e.preventDefault();

            $("#contact_form_btn").attr("disabled", true);

            $.ajax({
                url: '/send/contact_form',
                type: 'POST',
                contentType: false,
                processData: false,
                data: new FormData(this),
                success: function(msg){
                    console.log(msg);
                    if(msg == 'error') {
                        swal.fire({
                            timer: 3500,
                            title: 'Ошибка',
                            icon: 'error',
                            showConfirmButton: false,
                        });
                    } else {
                        $("#contact_form_btn").attr("disabled", false);
                        $('#contact_form')[0].reset();
                        swal.fire({
                            timer: 3500,
                            title: 'Отправлено.',
                            icon: 'success',
                            showConfirmButton: false,
                        });
                    }
                }
            });
        });
    });
</script>
</body>
</html>
