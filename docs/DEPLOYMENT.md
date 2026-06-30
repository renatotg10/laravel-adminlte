# Deploy

Este guia resume os passos básicos para publicar um projeto derivado deste template.

## Preparação

No servidor, clone o projeto:

```bash
git clone https://github.com/renatotg10/laravel-adminlte.git
cd laravel-adminlte
```

Instale as dependências PHP:

```bash
composer install --no-dev --optimize-autoloader
```

Instale as dependências JavaScript e compile os assets:

```bash
npm install
npm run build
```

## Ambiente

Crie o `.env`:

```bash
cp .env.example .env
```

Configure os valores principais:

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://seudominio.com
APP_LOCALE=pt_BR
APP_FALLBACK_LOCALE=pt_BR
APP_TIMEZONE=America/Sao_Paulo
```

Configure também banco de dados, e-mail, filas, cache e sessão conforme o ambiente.

Gere a chave da aplicação:

```bash
php artisan key:generate
```

## Banco de Dados

Execute as migrations:

```bash
php artisan migrate --force
```

## Cache de Produção

Após configurar o ambiente:

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

Se alterar `.env`, rotas ou views, limpe e recrie os caches:

```bash
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## Permissões

Garanta permissão de escrita nestes diretórios:

```text
storage/
bootstrap/cache/
```

## Servidor Web

O document root deve apontar para:

```text
public/
```

Nunca exponha a raiz do projeto diretamente no servidor web.
