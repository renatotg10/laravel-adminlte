# Troubleshooting

Problemas comuns ao instalar, configurar ou executar este projeto.

## Erro no Build com OverlayScrollbars

Se o build falhar com erro dizendo que `./styles/overlayscrollbars.min.css` não é exportado pelo pacote `overlayscrollbars`, use o import correto:

```css
@import "overlayscrollbars/overlayscrollbars.css";
```

Evite:

```css
@import "overlayscrollbars/styles/overlayscrollbars.min.css";
```

O Vite respeita o campo `exports` do pacote, e esse caminho `.min.css` não é exportado na versão validada.

## AdminLTE sem Estilo

Confira se o layout do painel carrega os assets corretos:

```blade
@vite([
    'resources/css/bootstrap-app.css',
    'resources/js/bootstrap-app.js',
    'resources/css/adminlte.css',
    'resources/js/adminlte.js',
])
```

Depois rode:

```bash
npm run build
```

ou, durante o desenvolvimento:

```bash
npm run dev
```

## Menu Lateral Não Abre

Confira se o JavaScript do AdminLTE está carregado:

```text
resources/js/adminlte.js
```

Confira também se o botão da navbar usa o atributo esperado pelo AdminLTE:

```html
data-lte-toggle="sidebar"
```

## Estilos do Jetstream Afetando o AdminLTE

O layout AdminLTE não deve carregar os assets padrão do Jetstream:

```blade
@vite(['resources/css/app.css', 'resources/js/app.js'])
```

No painel, carregue apenas os assets separados do AdminLTE:

```blade
@vite([
    'resources/css/bootstrap-app.css',
    'resources/js/bootstrap-app.js',
    'resources/css/adminlte.css',
    'resources/js/adminlte.js',
])
```

Use Tailwind nas telas Jetstream/Auth/Profile e use Bootstrap/AdminLTE nas views dentro de `resources/views/adminlte`.

## Erro de Chave da Aplicação

Se aparecer erro de `APP_KEY`, gere uma nova chave:

```bash
php artisan key:generate
```

## Erro de Banco de Dados

Revise as configurações no `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_adminlte
DB_USERNAME=root
DB_PASSWORD=
```

Depois execute:

```bash
php artisan migrate
```

## Arquivos Alterados Não Refletem no Navegador

Limpe os caches do Laravel:

```bash
php artisan optimize:clear
```

Se estiver usando build de produção, gere novamente:

```bash
npm run build
```
