# 📝 Sistema de Cadastro e Login de Usuários - Laravel

Um sistema completo de autenticação de usuários desenvolvido com Laravel, incluindo funcionalidades de cadastro, login, edição de perfil e gerenciamento de sessões.

## 🚀 Funcionalidades

- ✅ **Cadastro de Usuários**: Formulário completo com validação
- ✅ **Sistema de Login**: Autenticação segura com sessões
- ✅ **Edição de Perfil**: Atualização de dados do usuário
- ✅ **Validação de Dados**: Validação tanto no frontend quanto no backend
- ✅ **Interface Responsiva**: Design moderno e adaptável
- ✅ **Mensagens de Feedback**: Alertas de sucesso e erro
- ✅ **Logout Seguro**: Encerramento de sessões

## 🛠️ Tecnologias Utilizadas

- **Backend**: Laravel (PHP)
- **Frontend**: HTML5, CSS3, JavaScript
- **Banco de Dados**: MySQL/SQLite
- **Estilização**: CSS customizado com gradientes e animações
- **Validação**: Laravel Validation + JavaScript

## 📋 Pré-requisitos

Antes de executar o projeto, certifique-se de ter instalado:

- PHP >= 8.0
- Composer
- MySQL ou SQLite
- Servidor web (Apache/Nginx) ou usar o servidor built-in do Laravel

## 🔧 Instalação

1. **Clone o repositório**
   ```bash
   git clone https://github.com/SelmaMonteiro/Cadastro_e_LoginUsuario-Laravel.git
   cd Cadastro_e_LoginUsuario-Laravel
   ```

2. **Instale as dependências**
   ```bash
   composer install
   ```

3. **Configure o ambiente**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure o banco de dados**
   - Edite o arquivo `.env` com suas credenciais do banco
   - Execute as migrations:
   ```bash
   php artisan migrate
   ```

5. **Inicie o servidor**
   ```bash
   php artisan serve
   ```

6. **Acesse a aplicação**
   - Abra seu navegador e vá para: `http://127.0.0.1:8000`

## 📱 Como Usar

### Página Inicial
- Acesse a página inicial com o logo personalizado
- Escolha entre "Fazer Login" ou "Cadastre-se"

### Cadastro de Usuário
1. Clique em "Cadastre-se"
2. Preencha todos os campos obrigatórios:
   - Nome completo
   - Email válido
   - Senha (mínimo 6 caracteres)
   - Confirmação de senha
3. Clique em "Cadastrar"

### Login
1. Clique em "Fazer Login"
2. Insira seu email e senha
3. Clique em "Entrar"

### Edição de Perfil
1. Após fazer login, acesse a área de edição
2. Atualize suas informações
3. Salve as alterações

## 🎨 Interface

O sistema possui uma interface moderna com:
- **Design responsivo** que se adapta a diferentes tamanhos de tela
- **Gradientes coloridos** para uma experiência visual atrativa
- **Animações suaves** nos botões e elementos interativos
- **Validação em tempo real** com feedback visual
- **Logo personalizado** na página inicial

## 📹 Demonstração

> **Vídeo de demonstração será adicionado em breve!**
> 
> Veja o projeto funcionando: [Link para o vídeo](URL_DO_VIDEO_AQUI)

## 📂 Estrutura do Projeto

```
├── app/
│   ├── Http/Controllers/
│   │   └── UserController.php
│   └── Models/
│       └── User.php
├── database/
│   └── migrations/
│       └── 2024_01_01_000000_create_users_table.php
├── public/
│   └── images/
│       └── avatar.svg
├── resources/
│   └── views/
│       ├── auth/
│       │   └── login.blade.php
│       ├── user/
│       │   ├── register.blade.php
│       │   └── edit.blade.php
│       └── home.blade.php
└── routes/
    └── web.php
```

## 🔒 Segurança

- **Validação de dados** no servidor e cliente
- **Hash de senhas** usando bcrypt
- **Proteção CSRF** em todos os formulários
- **Sanitização de inputs** para prevenir XSS
- **Sessões seguras** para autenticação

## 🤝 Contribuição

Contribuições são bem-vindas! Para contribuir:

1. Faça um fork do projeto
2. Crie uma branch para sua feature (`git checkout -b feature/AmazingFeature`)
3. Commit suas mudanças (`git commit -m 'Add some AmazingFeature'`)
4. Push para a branch (`git push origin feature/AmazingFeature`)
5. Abra um Pull Request

## 📝 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

## 👩‍💻 Autora

**Selma Monteiro**
- GitHub: [@SelmaMonteiro](https://github.com/SelmaMonteiro)
- LinkedIn: [Selma Monteiro](https://linkedin.com/in/selma-monteiro)

## 📞 Suporte

Se você encontrar algum problema ou tiver dúvidas, sinta-se à vontade para:
- Abrir uma [issue](https://github.com/SelmaMonteiro/Cadastro_e_LoginUsuario-Laravel/issues)
- Entrar em contato através do LinkedIn

---

⭐ Se este projeto foi útil para você, considere dar uma estrela no repositório!