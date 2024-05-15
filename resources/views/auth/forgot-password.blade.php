<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <style>
        body {
            background-color: #3498db;
        }
    </style>
</head>
<body>
    <div class="form-gap"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <br>
                        <div class="text-center">
                            <br>
                            <br>
                            <h3><i class="fa fa-lock fa-4x"></i></h3>
                            <h2 class="text-center">Esqueceu sua senha?</h2>
                            <p>Você pode resetar sua senha aqui!</p>
                            <div class="panel-body">
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                                    Esqueceu sua senha? Sem problemas. Basta nos informar o seu endereço de e-mail e enviaremos um link de redefinição de senha por e-mail, que permitirá que você escolha uma nova senha
                                    </div>
                                    <!-- Session Status -->
                                    <div class="mb-4">
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                    </div>
                                    <!-- Email Address -->
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus>
                                        @error('email')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-lg btn-primary btn-block">Enviar solicitação</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
