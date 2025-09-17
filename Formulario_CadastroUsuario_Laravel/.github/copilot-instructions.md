# Copilot Instructions for Cadastro de Usuário Laravel

## Visão Geral
Este projeto é um formulário de cadastro de usuário construído com Laravel 9, focado em uma experiência moderna de front-end e validação via AJAX. O fluxo principal é o cadastro de novos usuários, sem autenticação ou persistência em banco de dados por padrão.

## Estrutura Principal
- **app/Http/Controllers/UserController.php**: Controlador central para exibir e processar o formulário de cadastro.
- **resources/views/user/register.blade.php**: View Blade com HTML, CSS customizado e JavaScript para submissão AJAX.
- **routes/web.php**: Define as rotas '/' e '/cadastro' para exibir o formulário e processar o POST.
- **config/**: Configurações padrão do Laravel, com locale e timezone ajustados para o Brasil.

## Fluxo de Cadastro
- O formulário é exibido em `/` ou `/cadastro`.
- Submissão é feita via AJAX para `/cadastro`.
- Validação ocorre no backend (UserController@register) e retorna JSON.
- Mensagens de sucesso/erro são exibidas dinamicamente na view.

## Convenções e Padrões
- **Validação**: Utiliza `$request->validate()` no controller. Campos obrigatórios: first_name, last_name, username, email, password (com confirmação).
- **Retorno**: Sempre JSON, com chaves `success`, `message` e `data`.
- **Internacionalização**: Locale padrão `pt_BR` e timezone `America/Sao_Paulo` (ver `config/app.php`).
- **Front-end**: CSS customizado no próprio Blade. Não usa frameworks JS externos.

## Comandos Essenciais
- Instalar dependências: `composer install`
- Rodar servidor local: `php artisan serve`
- Gerar chave: `php artisan key:generate`
- Rodar migrations (se existirem): `php artisan migrate`

## Dicas para Agentes AI
- **Não há autenticação, banco ou modelos configurados por padrão.**
- Para adicionar persistência, crie um Model/Migration para User e ajuste o controller.
- Para internacionalização, utilize arquivos em `resources/lang/`.
- Para testes, utilize PHPUnit (`php artisan test`).
- O fluxo de cadastro é totalmente desacoplado de autenticação padrão do Laravel.

## Exemplos de Padrão
- **Rota:**
  ```php
  Route::post('/cadastro', [UserController::class, 'register'])->name('user.register');
  ```
- **Validação:**
  ```php
  $request->validate([
    'first_name' => 'required|string|max:255',
    // ...
  ]);
  ```
- **Resposta JSON:**
  ```php
  return response()->json([
    'success' => true,
    'data' => [...]
  ]);
  ```

## Pontos de Atenção
- O projeto está preparado para customização rápida, mas não segue o fluxo completo de autenticação Laravel.
- O front-end espera respostas JSON específicas para exibir mensagens.
- Não há README.md detalhado; consulte este arquivo para instruções de arquitetura e fluxo.
