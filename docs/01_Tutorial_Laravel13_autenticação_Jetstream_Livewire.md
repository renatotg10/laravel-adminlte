# Tutorial - Laravel 13 com autenticação por login

Neste tutorial iremos criar um projeto em Laravel 13 com o pacote de atutenticação Jetstream + Livewire.

---

## 🧰 1. Pré-requisitos

Instale e configure o **Laragon** (disponível em: [https://laragon.org](https://laragon.org/)).

Durante a instalação, ele configura automaticamente:

- Apache + MySQL/MariaDB + PHP;
- Composer;
- Mailpit (para testes de e-mail);
- Node.js + NPM

Após a instalação, abra o **Laragon** e inicie os serviços:

> Menu → Start All
> 

Você deve ver:

```
[√] Apache running
[√] MySQL running
```

---

## ⚙️ 2. Criar o projeto Laravel 13 no Laragon

1. No terminal do Laragon (Menu → Terminal ou botão direito → Terminal).
2. Entre na pasta `www`:
    
    ```bash
    cd C:\laragon\www
    ```
    
3. Crie o projeto:
    
    ```bash
    composer create-project laravel/laravel meu_projeto_laravel
    ```
    
4. Após a instalação, pare o servidor Apache e inicie o servidor Apache novamente, então, no navegador a acesse:
    
    ```
    http://meu_projeto_Laravel13.test
    ```
    
    💡 O Laragon cria automaticamente um VirtualHost com domínio .test.
    

---

## 🧱 3. Configurar o `.env`

Abra o arquivo `.env` (na raiz do projeto) e configure:

```
APP_NAME="Meu Sistema"
APP_ENV=local
APP_URL=http://meu_projeto_Laravel13.test

APP_TIMEZONE=America/Sao_Paulo

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

### Configurar o horário oficial de Brasília na aplicação

Abra o arquivo `config/app.php` (na raiz do projeto) e substitua a linha abaixo:

```
'timezone' => 'UTC',
```

por isso:

```
'timezone' => env('APP_TIMEZONE', 'UTC'),
```

---

## ⚡ 4. Instalar o Jetstream

No terminal dentro da pasta do projeto:

```bash
composer require laravel/jetstream
```

Agora instale com **Livewire**:

```bash
php artisan jetstream:install livewire
```

---

## 🧩 5. Instalar dependências do frontend

O Laragon normalmente já traz o Node.js configurado.
Se não tiver, baixe e instale o [Node.js LTS](https://nodejs.org/).

Depois execute:

```bash
npm install
npm run build
```

---

## 🗃️ 6. Rodar as migrações

Crie as tabelas padrão:

```bash
php artisan migrate
```

Será solicitado a confirmação se deseja criar o banco de dados (caso ainda não tenha criado), informe "Yes" ou apenas pressione Enter que a resposta padrão já é "Yes".

Isso criará o banco de dados e as tabelas users, sessions, password_reset_tokens, etc.

---

## 🔑 7. Testar autenticação

Acesse:
👉 [http://meu_projeto_Laravel13.test/register](http://meu_projeto_laravel12.test/register)

Você verá a tela de registro do Jetstream.
Cadastre um usuário e teste login/logout.

---

## 🔒 8. Ativar recursos extras (opcional)

Edite `config/jetstream.php` e habilite o que quiser:

```php
'features' => [
    Features::profilePhotos(),
],
```

Depois rode novamente:

```bash
php artisan migrate
```

---

## 🇧🇷 9. Traduzir para português (pt_BR)

Instale o pacote de idiomas:

```bash
composer require laravel-lang/common --dev
```

Adicione o idioma:

```bash
php artisan lang:add pt_BR
```

No arquivo `.env` altere as váriaveis de ambiente referente ao idioma para:

```php
APP_LOCALE=pt_BR
APP_FALLBACK_LOCALE=pt_BR
APP_FAKER_LOCALE=pt_BR
```

---

## 📧 10. Testar envio de e-mails com **Mailpit** do Laragon

### ✅ Mailpit vem pronto no Laragon!

Para usá-lo:

1. No painel do Laragon → clique em **Menu → Mail → Start Mailpit**
2. Isso abrirá o painel web do Mailpit em:
👉 [http://localhost:8025](http://localhost:8025/)
3. Configure o `.env` assim:

```
MAIL_MAILER=smtp
MAIL_HOST=127.0.0.1
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="noreply@meusistema.com"
MAIL_FROM_NAME="${APP_NAME}"
```

Agora, qualquer e-mail enviado pelo Laravel aparecerá automaticamente no painel do Mailpit.

### 🔍 Teste o envio

Para testar rapidamente, execute no terminal:

```bash
php artisan tinker
```

E dentro dele:

```php
Mail::raw('Teste de envio com Mailpit no Laragon', function($msg){
    $msg->to('teste@exemplo.com')->subject('Teste Mailpit');
});
```

Depois acesse `http://localhost:8025` e verifique a mensagem recebida 🎉

Outra forma de testar o envio de e-mail, na tela de login, clique "Esqueceu sua senha" e informe o e-mail do seu usuário cadastrado no sistema e clique em "Redefinir", será enviado o e-mail no Mailpit.

Acesse novamente `http://localhost:8025` e irá visualizar o e-mail de Redefinição de sua senha, clique no link e faça a redefinição de sua senha para testar.

---

## 🎨 11. Personalizar Layout

O arquivo base está em:

```
resources/views/layouts/app.blade.php
```

O layout padrão usa **TailwindCSS**.
Você pode substituir por **Bootstrap 5** se quiser, basta editar o layout e o `vite.config.js`.

---

## 🧰 12. Comandos úteis

| Ação | Comando |
| --- | --- |
| Iniciar servidor (opcional, Laragon já serve) | `php artisan serve` |
| Compilar assets (produção) | `npm run build` |
| Compilar assets (dev) | `npm run dev` |
| Criar componente Livewire | `php artisan make:livewire NomeDoComponente` |
| Limpar cache | `php artisan optimize:clear` |

---

## 🎉 Resultado

Com isso você terá:

- Laravel 13 totalmente funcional;
- Jetstream + Livewire (autenticação, perfil, 2FA, etc.);
- Servidor local automático via Laragon;
- Teste de e-mails instantâneo com Mailpit.

---

## 📚 Referências:

- **Pesquisa do ChatGPT Laravel 13 Jetstream e Livewire:** [https://chatgpt.com/share/68fc349d-717c-8011-96dd-6a791f5aff15](https://chatgpt.com/share/68fc349d-717c-8011-96dd-6a791f5aff15)