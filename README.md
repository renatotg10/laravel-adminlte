# Laravel AdminLTE

Projeto inicial em Laravel 13 com autenticação, idioma `pt_BR` e painel administrativo já configurados.

A ideia deste repositório é servir como base para novos sistemas: basta clonar, configurar o `.env`, instalar as dependências e começar o desenvolvimento.

Repositório: [renatotg10/laravel-adminlte](https://github.com/renatotg10/laravel-adminlte.git)

## Stack

- Laravel 13
- Jetstream
- Livewire
- Sanctum
- Tailwind CSS, usado pelo Jetstream
- AdminLTE 4
- Bootstrap 5
- Font Awesome
- OverlayScrollbars
- Vite
- Idioma `pt_BR`

## Requisitos

- PHP 8.3 ou superior
- Composer
- Node.js e NPM
- MySQL/MariaDB ou outro banco suportado pelo Laravel

Em ambiente local no Windows, o projeto foi pensado para uso com Laragon.

## Como Usar

Clone o repositório:

```bash
git clone https://github.com/renatotg10/laravel-adminlte.git
cd laravel-adminlte
```

Instale as dependências PHP:

```bash
composer install
```

Crie o arquivo de ambiente:

```bash
cp .env.example .env
```

No Windows PowerShell, se preferir:

```powershell
Copy-Item .env.example .env
```

Gere a chave da aplicação:

```bash
php artisan key:generate
```

Configure no `.env` o nome da aplicação, URL e banco de dados:

```env
APP_NAME="Meu Sistema"
APP_URL=http://laravel-adminlte.test
APP_LOCALE=pt_BR
APP_FALLBACK_LOCALE=pt_BR
APP_TIMEZONE=America/Sao_Paulo

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_adminlte
DB_USERNAME=root
DB_PASSWORD=
```

Execute as migrations:

```bash
php artisan migrate
```

Instale as dependências JavaScript:

```bash
npm install
```

Compile os assets:

```bash
npm run build
```

Para desenvolvimento, rode:

```bash
npm run dev
```

Em outro terminal, rode o Laravel:

```bash
php artisan serve
```

Acesse:

```text
http://127.0.0.1:8000
```

Painel AdminLTE:

```text
http://127.0.0.1:8000/admin
```

## Usando com Laragon

Se o projeto estiver dentro de `C:\laragon\www\laravel-adminlte`, reinicie o Apache no Laragon e acesse:

```text
http://laravel-adminlte.test
```

Caso use outro nome de pasta, ajuste o `APP_URL` no `.env`.

## Estrutura do Painel

Os assets do AdminLTE ficam separados dos assets padrão do Laravel/Jetstream:

```text
resources/css/bootstrap-app.css
resources/js/bootstrap-app.js
resources/css/adminlte.css
resources/js/adminlte.js
```

O layout base do painel está em:

```text
resources/views/layouts/adminlte.blade.php
```

A tela inicial do painel está em:

```text
resources/views/adminlte/dashboard.blade.php
```

As partials principais ficam em:

```text
resources/views/adminlte/partials/navbar.blade.php
resources/views/adminlte/partials/sidebar.blade.php
```

## Documentação

Os tutoriais usados para montar este projeto estão em:

```text
docs/01_Tutorial_Laravel13_autenticação_Jetstream_Livewire.md
docs/02_Tutorial_Instalacao_AdminLTE4_Laravel13.md
```

O primeiro tutorial cria o projeto base com Jetstream e Livewire.
O segundo instala e configura o AdminLTE 4.

## Versões Validadas

- `laravel/framework`: 13.x
- `laravel/jetstream`: 5.5.x
- `livewire/livewire`: 3.6.x
- `vite`: 8.1.0
- `laravel-vite-plugin`: 3.1.0
- `admin-lte`: 4.0.2
- `bootstrap`: 5.3.8
- `@fortawesome/fontawesome-free`: 7.3.0
- `overlayscrollbars`: 2.16.0

## Observações

- O Jetstream continua usando os assets padrão `resources/css/app.css` e `resources/js/app.js`.
- O AdminLTE usa arquivos separados para evitar conflito com Tailwind.
- Este projeto não usa Vue.js.
- O caminho correto do CSS do OverlayScrollbars é `overlayscrollbars/overlayscrollbars.css`.

## Licença

Este projeto segue a licença MIT.
