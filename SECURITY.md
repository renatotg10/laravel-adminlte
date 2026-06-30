# Segurança

Este projeto é um template inicial para aplicações Laravel 13 com Jetstream, Livewire e AdminLTE 4.

## Versões Suportadas

Enquanto o projeto estiver na fase inicial, apenas a versão mais recente da branch principal deve receber correções.

| Versão | Suporte |
| --- | --- |
| `main` | Sim |
| versões antigas sem tag | Não |

## Boas Práticas

- Nunca versionar o arquivo `.env`.
- Gerar uma nova `APP_KEY` em cada projeto clonado.
- Revisar `APP_DEBUG=false` antes de publicar em produção.
- Configurar corretamente permissões de `storage/` e `bootstrap/cache/`.
- Manter dependências PHP e NPM atualizadas.
- Usar HTTPS em produção.
- Configurar permissões de usuários, roles e acessos conforme a regra de negócio do projeto derivado.

## Reporte de Vulnerabilidades

Se encontrar uma vulnerabilidade neste template, abra uma issue privada ou entre em contato pelo GitHub:

```text
https://github.com/renatotg10/laravel-adminlte
```

Não publique detalhes sensíveis antes de existir uma correção disponível.
