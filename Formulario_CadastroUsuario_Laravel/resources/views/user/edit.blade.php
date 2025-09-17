<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Editar Perfil - Sistema de Usuários</title>
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
            max-width: 500px;
            box-shadow: 0 8px 32px rgba(31, 38, 135, 0.37);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .form-title {
            color: white;
            font-size: 28px;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .logout-btn {
            background: linear-gradient(45deg, #f44336, #d32f2f);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 25px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(244, 67, 54, 0.4);
        }

        .welcome-message {
            background: rgba(76, 175, 80, 0.2);
            border: 1px solid rgba(76, 175, 80, 0.5);
            color: #c8e6c9;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 25px;
            text-align: center;
            font-weight: bold;
        }

        .form-row {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }

        .form-group {
            flex: 1;
        }

        .form-group.full-width {
            width: 100%;
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            color: rgba(255, 255, 255, 0.9);
            font-weight: bold;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .form-group input::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .form-group input:focus {
            outline: none;
            border-color: rgba(255, 255, 255, 0.5);
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .password-note {
            color: rgba(255, 255, 255, 0.7);
            font-size: 12px;
            margin-top: 5px;
            font-style: italic;
        }

        .submit-btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(45deg, #2196F3, #1976D2);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(33, 150, 243, 0.4);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .error-message {
            background: rgba(244, 67, 54, 0.2);
            border: 1px solid rgba(244, 67, 54, 0.5);
            color: #ffcdd2;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
            display: none;
        }

        .success-message {
            background: rgba(76, 175, 80, 0.2);
            border: 1px solid rgba(76, 175, 80, 0.5);
            color: #c8e6c9;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
            display: none;
        }

        @media (max-width: 600px) {
            .form-row {
                flex-direction: column;
                gap: 0;
            }
            
            .header {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }
            
            .form-title {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="header">
            <h2 class="form-title">✏️ Editar Perfil</h2>
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn">🚪 SAIR</button>
            </form>
        </div>
        
        <div class="welcome-message">
            Bem-vindo, <strong>{{ $user->full_name }}</strong>! 👋
        </div>
        
        <div id="error-message" class="error-message"></div>
        <div id="success-message" class="success-message"></div>
        
        <form id="editForm">
            <div class="form-row">
                <div class="form-group">
                    <label for="first_name">Nome:</label>
                    <input type="text" id="first_name" name="first_name" value="{{ $user->first_name }}" placeholder="Digite seu nome" required>
                </div>
                
                <div class="form-group">
                    <label for="last_name">Sobrenome:</label>
                    <input type="text" id="last_name" name="last_name" value="{{ $user->last_name }}" placeholder="Digite seu sobrenome" required>
                </div>
            </div>
            
            <div class="form-group full-width">
                <label for="username">Usuário:</label>
                <input type="text" id="username" name="username" value="{{ $user->username }}" placeholder="Digite seu usuário" required>
            </div>
            
            <div class="form-group full-width">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}" placeholder="Digite seu e-mail" required>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="password">Nova Senha:</label>
                    <input type="password" id="password" name="password" placeholder="Digite nova senha (opcional)">
                    <div class="password-note">Deixe em branco para manter a senha atual</div>
                </div>
                
                <div class="form-group">
                    <label for="password_confirmation">Confirmar Senha:</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirme a nova senha">
                </div>
            </div>
            
            <button type="submit" class="submit-btn">💾 SALVAR ALTERAÇÕES</button>
        </form>
    </div>

    <script>
        document.getElementById('editForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const errorDiv = document.getElementById('error-message');
            const successDiv = document.getElementById('success-message');
            
            // Esconder mensagens anteriores
            errorDiv.style.display = 'none';
            successDiv.style.display = 'none';
            
            fetch('{{ route("user.update") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    successDiv.textContent = data.message;
                    successDiv.style.display = 'block';
                    
                    // Limpar campos de senha
                    document.getElementById('password').value = '';
                    document.getElementById('password_confirmation').value = '';
                } else {
                    let errorMessage = data.message || 'Erro ao atualizar dados!';
                    if (data.errors) {
                        errorMessage = Object.values(data.errors).flat().join('\n');
                    }
                    errorDiv.textContent = errorMessage;
                    errorDiv.style.display = 'block';
                }
            })
            .catch(error => {
                console.error('Erro:', error);
                errorDiv.textContent = 'Seja Bem-Vindo! Aguarde para começar....';
                errorDiv.style.display = 'block';
            });
        });
    </script>
</body>
</html>