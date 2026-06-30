# Tutorial - Documentação e Versionamento do Projeto

Este documento explica a finalidade da documentação criada neste repositório e apresenta uma visão prática sobre versionamento de projetos e sistemas.

O objetivo não é criar burocracia. A ideia é manter informações importantes registradas para que o projeto possa ser entendido, evoluído, publicado e reutilizado com segurança.

---

## 1. Por Que Documentar

Documentação ajuda a responder perguntas que aparecem com frequência durante o desenvolvimento:

- Como o projeto está organizado?
- Como instalar e executar?
- Como publicar em produção?
- Quais versões foram usadas?
- O que mudou entre uma versão e outra?
- Como resolver erros comuns?
- O que ainda precisa ser feito?
- Quais cuidados de segurança devem ser observados?

Em um projeto usado como base para outros sistemas, isso é ainda mais importante. Quem clonar o repositório precisa entender rapidamente o que já está pronto e qual caminho seguir para iniciar um novo projeto.

---

## 2. Documentos Criados

### `README.md`

É a porta de entrada do projeto.

Deve explicar:

- o que é o projeto;
- qual stack ele usa;
- como clonar;
- como instalar;
- como configurar o `.env`;
- como rodar em desenvolvimento;
- onde encontrar a documentação complementar.

Normalmente é o primeiro arquivo lido no GitHub.

### `CHANGELOG.md`

Registra as mudanças relevantes do projeto.

Serve para responder:

- o que foi adicionado;
- o que foi alterado;
- o que foi corrigido;
- o que foi removido;
- em qual versão uma mudança entrou.

Esse arquivo é útil principalmente quando o projeto começa a ter tags e releases.

### `SECURITY.md`

Explica cuidados de segurança e como reportar vulnerabilidades.

Mesmo sendo um template, este arquivo é útil porque lembra pontos importantes:

- não versionar `.env`;
- gerar nova `APP_KEY` em projetos clonados;
- desativar debug em produção;
- manter dependências atualizadas;
- usar HTTPS em produção.

### `docs/ARCHITECTURE.md`

Descreve a arquitetura geral do projeto.

Neste repositório, ele explica como convivem:

- Laravel;
- Jetstream;
- Livewire;
- Tailwind;
- AdminLTE;
- Bootstrap;
- Vite.

Também ajuda a entender por que os assets do AdminLTE ficam separados dos assets padrão do Jetstream.

### `docs/DEPLOYMENT.md`

Documenta o processo de publicação em produção.

Deve conter comandos e cuidados como:

- `composer install --no-dev --optimize-autoloader`;
- `npm run build`;
- configuração do `.env`;
- migrations;
- cache de configuração, rotas e views;
- permissões de `storage/` e `bootstrap/cache/`;
- uso da pasta `public/` como document root.

### `docs/ROADMAP.md`

Registra ideias e próximos passos.

Ajuda a separar:

- o que já existe;
- o que pode ser feito em breve;
- o que fica para depois;
- o que está fora do escopo.

No caso deste projeto, o roadmap evita transformar o template em um sistema cheio de regras específicas.

### `docs/TROUBLESHOOTING.md`

Reúne problemas comuns e suas soluções.

Exemplos:

- erro no build do OverlayScrollbars;
- AdminLTE sem estilo;
- menu lateral que não abre;
- erro de `APP_KEY`;
- problema de conexão com banco;
- cache impedindo alterações de aparecerem.

Esse documento economiza tempo quando o mesmo erro aparece novamente.

### `docs/VERSIONING.md`

Explica como o projeto deve ser versionado.

Ele define a lógica de tags, releases e incremento de versões.

Este terceiro tutorial complementa esse documento com uma explicação mais ampla sobre alpha, beta, release candidate e release final.

---

## 3. Por Que Manter Esses Documentos

Documentação desatualizada atrapalha mais do que ajuda. Por isso, cada documento deve ser mantido junto com as mudanças do projeto.

Regras simples:

- mudou a instalação: atualizar `README.md`;
- mudou arquitetura ou estrutura de pastas: atualizar `ARCHITECTURE.md`;
- mudou processo de deploy: atualizar `DEPLOYMENT.md`;
- corrigiu erro recorrente: atualizar `TROUBLESHOOTING.md`;
- criou tag ou release: atualizar `CHANGELOG.md`;
- mudou política de versão: atualizar `VERSIONING.md`;
- decidiu próximos passos: atualizar `ROADMAP.md`;
- identificou cuidado de segurança: atualizar `SECURITY.md`.

Não é necessário escrever textos longos. O importante é manter informação útil, atual e fácil de consultar.

---

## 4. O Que É Versionamento

Versionamento é a prática de identificar estados do projeto por números ou nomes.

Exemplo:

```text
v0.1.0
v0.2.0
v1.0.0
v1.1.0
v1.1.1
```

Essas versões ajudam a saber:

- qual estado do projeto está estável;
- quando uma funcionalidade entrou;
- se uma atualização pode quebrar algo;
- qual versão deve ser usada como base para outro projeto.

---

## 5. Versionamento Semântico

Uma forma comum de versionar é o SemVer, ou versionamento semântico.

Formato:

```text
MAJOR.MINOR.PATCH
```

Exemplo:

```text
1.4.2
```

Onde:

- `MAJOR`: muda quando há quebra de compatibilidade;
- `MINOR`: muda quando há nova funcionalidade compatível;
- `PATCH`: muda quando há correção compatível.

Exemplos práticos:

```text
1.0.0 -> primeira versão estável
1.1.0 -> nova funcionalidade sem quebrar o uso atual
1.1.1 -> correção pequena
2.0.0 -> mudança incompatível com a versão 1.x
```

---

## 6. Versões 0.x

Antes de um projeto ser considerado estável, é comum usar versões `0.x`.

Exemplo:

```text
v0.1.0
v0.2.0
v0.3.0
```

Isso indica que o projeto ainda está em fase inicial e pode mudar bastante.

Para este repositório, uma primeira tag adequada seria:

```text
v0.1.0
```

Ela pode representar o template inicial com Laravel 13, Jetstream, Livewire, `pt_BR`, AdminLTE 4 e documentação básica.

---

## 7. Alpha, Beta, RC e Release

Além dos números, uma versão pode indicar estágio de maturidade.

### Alpha

Versão inicial, ainda instável.

Usada quando:

- a ideia principal já existe;
- ainda faltam partes importantes;
- mudanças grandes podem acontecer;
- não é recomendada para produção.

Exemplo:

```text
v0.1.0-alpha.1
```

### Beta

Versão mais completa, mas ainda em teste.

Usada quando:

- a maior parte das funcionalidades está pronta;
- o projeto precisa de validação;
- ainda podem existir bugs;
- a estrutura geral já está mais definida.

Exemplo:

```text
v0.1.0-beta.1
```

### Release Candidate

Também chamada de `RC`.

É uma candidata à versão final.

Usada quando:

- não há novas funcionalidades previstas para aquela versão;
- o foco é testar e corrigir problemas;
- se nenhum erro importante aparecer, ela vira release final.

Exemplo:

```text
v1.0.0-rc.1
```

### Release Final

É a versão considerada pronta para uso.

Exemplo:

```text
v1.0.0
```

Nesse ponto, o projeto deve ter documentação coerente, instalação validada e comportamento estável.

---

## 8. Exemplos de Linha de Evolução

Um projeto pode evoluir assim:

```text
v0.1.0-alpha.1
v0.1.0-alpha.2
v0.1.0-beta.1
v0.1.0-rc.1
v0.1.0
v0.2.0
v1.0.0
```

Para um template como este, uma evolução simples pode ser:

```text
v0.1.0
v0.2.0
v0.3.0
v1.0.0
```

Não é obrigatório usar alpha, beta e RC em todos os projetos. Eles são mais úteis quando há várias pessoas testando ou quando a versão será usada por terceiros.

---

## 9. Tags e Releases no GitHub

Uma tag marca um ponto específico do histórico Git.

Exemplo:

```bash
git tag v0.1.0
git push origin v0.1.0
```

No GitHub, uma release pode ser criada a partir dessa tag.

A release deve explicar:

- o que foi adicionado;
- o que foi alterado;
- o que foi corrigido;
- se há alguma instrução especial de atualização.

O conteúdo da release pode ser baseado no `CHANGELOG.md`.

---

## 10. Quando Atualizar a Versão

Atualize a versão quando houver um conjunto relevante de mudanças.

Exemplos:

- documentação inicial concluída: `v0.1.0`;
- proteção da rota `/admin` adicionada: `v0.2.0`;
- componentes Blade administrativos adicionados: `v0.3.0`;
- template considerado estável para reutilização: `v1.0.0`;
- correção pequena após `v1.0.0`: `v1.0.1`.

Evite criar uma nova versão para cada commit pequeno. A versão deve representar um marco útil.

---

## 11. Fluxo Recomendado Para Este Projeto

Para este repositório, um fluxo simples é suficiente:

1. Fazer alterações no projeto.
2. Atualizar documentação relacionada.
3. Rodar build e testes.
4. Atualizar `CHANGELOG.md`.
5. Criar commit.
6. Criar tag quando a mudança representar um marco.
7. Criar release no GitHub usando o changelog como base.

Comandos úteis:

```bash
npm run build
php artisan test
git status
git add .
git commit -m "docs: atualiza documentação do projeto"
git tag v0.1.0
git push origin main
git push origin v0.1.0
```

---

## 12. Resumo

A documentação criada neste projeto existe para facilitar manutenção, reutilização e evolução do template.

O versionamento existe para marcar estados importantes do projeto e dar clareza sobre estabilidade, compatibilidade e histórico.

Para este repositório, o mais importante é manter:

- README claro;
- changelog atualizado;
- tutoriais reproduzíveis;
- guia de deploy confiável;
- troubleshooting com erros reais;
- versionamento simples e consistente.
