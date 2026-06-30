# Versionamento

Este projeto deve usar versionamento semântico quando começar a publicar tags no GitHub.

Formato recomendado:

```text
MAJOR.MINOR.PATCH
```

Exemplo:

```text
v0.1.0
```

## Regras

- Incrementar `PATCH` para correções pequenas e documentação.
- Incrementar `MINOR` para novas funcionalidades compatíveis.
- Incrementar `MAJOR` para mudanças incompatíveis em estrutura, instalação ou uso do template.

## Sugestão Inicial

Enquanto o projeto estiver em construção, usar versões `0.x`.

Primeira tag recomendada:

```text
v0.1.0
```

Essa tag pode representar o template inicial com:

- Laravel 13
- Jetstream
- Livewire
- idioma `pt_BR`
- AdminLTE 4
- documentação inicial

## Changelog

Toda tag publicada deve ter uma entrada correspondente no `CHANGELOG.md`.

Antes de criar uma tag:

```bash
npm run build
php artisan test
```

Depois:

```bash
git tag v0.1.0
git push origin v0.1.0
```
