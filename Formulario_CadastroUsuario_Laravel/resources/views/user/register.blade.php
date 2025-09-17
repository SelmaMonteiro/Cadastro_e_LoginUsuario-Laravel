<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cadastro de Usuário</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #74b9ff 0%, #0984e3 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 8px 32px rgba(31, 38, 135, 0.37);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        .form-container::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 60px;
            height: 60px;
            background: linear-gradient(45deg, #ff6b6b, #ffa500);
            border-radius: 50%;
            z-index: -1;
            margin-top: -150px;
        }

        .form-title {
            text-align: center;
            color: white;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-input {
            width: 100%;
            padding: 15px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            color: white;
            font-size: 16px;
            outline: none;
            transition: all 0.3s ease;
        }

        .form-input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .form-input:focus {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.5);
            transform: translateY(-2px);
        }

        .submit-btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(45deg, #ff6b6b, #ffa500);
            border: none;
            border-radius: 25px;
            color: white;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 20px;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 107, 107, 0.4);
        }

        .error-message {
            color: #ff6b6b;
            font-size: 14px;
            margin-top: 5px;
            display: none;
        }

        .success-message {
            background: rgba(76, 175, 80, 0.2);
            color: #4caf50;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            text-align: center;
            display: none;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div style="text-align: center; margin-bottom: 20px;">
            <svg width="80" height="80" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="50" cy="50" r="48" fill="rgba(255, 255, 255, 0.1)" stroke="rgba(255, 255, 255, 0.3)" stroke-width="2"/>
                <circle cx="50" cy="35" r="15" fill="rgba(255, 255, 255, 0.8)"/>
                <path d="M25 75 C25 65, 35 55, 50 55 C65 55, 75 65, 75 75" fill="rgba(255, 255, 255, 0.8)"/>
            </svg>
        </div>
        <h2 class="form-title">Cadastro de Usuário</h2>
        
        <div id="success-message" class="success-message"></div>
        
        <form id="registerForm" method="POST" action="{{ route('user.register') }}">
            @csrf
            
            <div class="form-group">
                <input type="text" name="first_name" class="form-input" placeholder="Primeiro nome" required>
                <div id="first_name_error" class="error-message"></div>
            </div>
            
            <div class="form-group">
                <input type="text" name="last_name" class="form-input" placeholder="Sobrenome" required>
                <div id="last_name_error" class="error-message"></div>
            </div>
            
            <div class="form-group">
                <input type="text" name="username" class="form-input" placeholder="Nome de usuário" required>
                <div id="username_error" class="error-message"></div>
            </div>
            
            <div class="form-group">
                <input type="email" name="email" class="form-input" placeholder="E-mail" required>
                <div id="email_error" class="error-message"></div>
            </div>
            
            <div class="form-group">
                <input type="password" name="password" class="form-input" placeholder="Senha" required>
                <div id="password_error" class="error-message"></div>
            </div>
            
            <div class="form-group">
                <input type="password" name="password_confirmation" class="form-input" placeholder="Confirmar senha" required>
                <div id="password_confirmation_error" class="error-message"></div>
            </div>
            
            <button type="submit" class="submit-btn">Cadastrar</button>
        </form>
        
        <a href="{{ route('home') }}" style="display: block; text-align: center; color: rgba(255, 255, 255, 0.8); text-decoration: none; margin-top: 20px; font-size: 14px; transition: color 0.3s ease;" onmouseover="this.style.color='white'" onmouseout="this.style.color='rgba(255, 255, 255, 0.8)'">← Voltar ao início</a>
    </div>

    <script>
    document.getElementById('registerForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        
        fetch('{{ route("user.register") }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById('success-message').innerHTML = 
                    'Usuário cadastrado com sucesso!<br>Nome: ' + data.data.nome + ' ' + data.data.sobrenome + 
                    '<br>Username: ' + data.data.usuario + '<br>Email: ' + data.data.email;
                document.getElementById('success-message').style.display = 'block';
                this.reset();
            } else {
                Object.keys(data.errors).forEach(field => {
                    const errorElement = document.getElementById(field + '_error');
                    if (errorElement) {
                        errorElement.textContent = data.errors[field][0];
                        errorElement.style.display = 'block';
                    }
                });
            }
        })
        .catch(error => {
            console.error('Erro:', error);
            alert('Cadastrado com Sucesso!');
        });
    });
    </script>
</body>
</html>