# Arquitetura

Este repositório é um projeto base em Laravel 13 com autenticação Jetstream/Livewire, idioma `pt_BR` e AdminLTE 4 configurado.

O objetivo é servir como ponto de partida para novos sistemas, mantendo a autenticação padrão do Laravel separada do painel administrativo.

## Visão Geral

- Laravel concentra rotas, controllers, models, migrations e regras da aplicação.
- Jetstream + Livewire fornecem autenticação, sessão, perfil de usuário e telas padrão.
- AdminLTE 4 fornece o layout do painel administrativo.
- Vite compila assets JavaScript e CSS.
- Tailwind continua sendo usado pelo Jetstream.
- Bootstrap/AdminLTE ficam em arquivos separados para evitar conflito visual com Tailwind.
- As telas de autenticação e perfil usam componentes Jetstream/Tailwind modernizados.
- O painel `/admin` usa AdminLTE/Bootstrap e inclui um dashboard starter.

## Assets

Assets padrão do Laravel/Jetstream:

```text
resources/css/app.css
resources/js/app.js
```

Assets do AdminLTE:

```text
resources/css/bootstrap-app.css
resources/js/bootstrap-app.js
resources/css/adminlte.css
resources/js/adminlte.js
```

Esses arquivos são registrados em `vite.config.js` e carregados no layout do painel.

## Views

Layout principal do AdminLTE:

```text
resources/views/layouts/adminlte.blade.php
```

Tela inicial do painel:

```text
resources/views/adminlte/dashboard.blade.php
```

Partials do painel:

```text
resources/views/adminlte/partials/navbar.blade.php
resources/views/adminlte/partials/sidebar.blade.php
```

## Rotas

A rota `/admin` carrega o painel AdminLTE inicial.

A rota `/dashboard` continua vinculada ao fluxo autenticado do Jetstream, mas redireciona para `/admin`.

O painel `/admin` deve permanecer protegido pelo middleware de autenticação do Jetstream.

## Decisões Técnicas

- O projeto não usa Vue.js.
- O CSS do OverlayScrollbars deve ser importado por `overlayscrollbars/overlayscrollbars.css`.
- O AdminLTE não deve carregar `resources/css/app.css` quando o objetivo for evitar influência do Tailwind no painel.
- Novos módulos administrativos devem reaproveitar o layout `layouts.adminlte`.
- Views do painel devem usar classes AdminLTE/Bootstrap, como `card`, `row`, `col-*`, `btn`, `badge`, `table`, `small-box` e `list-group`.
- Views do Jetstream, autenticação e perfil podem usar Tailwind, pois pertencem ao fluxo padrão da aplicação.
