
## Esqueleto maroto dos pacotes do admix

Primeiro clone este repositorio dentro de `/packages/agenciafmd/:package_name` do seu projeto e remova o `.git` 

Agora é preciso trocar estas variaveis do pacote que clonamos

 - `:author_name` (example: 'Irineu Junior')
 - `:author_email` (example: 'irineu@fmd.ag')
 - `:author_username` (example: 'irineujunior')
 - `:package_name` (example: 'local-skeleton' - plural)
 - `:package_description` (example: 'F&MD - Skeleton')
 - `:vendor` (example: 'agenciafmd')
 - `:namespace_vendor` (example: 'Agenciafmd')
 - `:namespace_skeleton_name` (example: 'Skeleton' - plural)
 - `:skeleton_name` (example: 'Skeleton' - singular)
 - `:skeleton_name_plural` (example: 'Skeleton' - plural)
 - `:skeleton_friendly_name` (example: 'Esqueleto' - plural)
 - `:skeleton_icon` (example: 'package' - https://feathericons.com/)

>**Caso queira distribuir este pacote para os coleguinhas.**
>
>Por **convenção**, trabalhamos com o prefixo **local-** para os projetos locais e **admix-** para os projetos que vamos compartilhar
>
>Clone este repositorio fora do seu projeto (ex. ~/code/packages/agenciafmd/admix-skeleton) e remova a pasta `.git`
>
>Crie um [novo repositório](https://github.com/organizations/agenciafmd/repositories/new)
>
>Siga as instruções marotas para a publicação


Para usarmos o pacote que acabamos de criar, adicionamos no nosso `composer.json`
 
Na seção `require` 

```
":vendor/:package_name": "*",
```

Na seção `repositories`

```
"repositories": [
    {
        "type": "path",
        "url": "packages/:vendor/:package_name"
    },
]
```

Agora é só rodar o `composer update` e seguir com o desenvolvimento
 
**Assim que concluir, remova tudo que temos daqui pra cima**

**Se o pacote for local, podemos remover este arquivo por completo** 


## F&MD - :package_description

[Área Administrativa](https://github.com/:vendor/:package_name/raw/master/docs/screenshot.png "Área Administrativa")

[![Downloads](https://img.shields.io/packagist/dt/:vendor/:package_name.svg?style=flat-square)](https://packagist.org/packages/:vendor/:package_name)
[![Licença](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)

- Aqui entra aquela descrição extremamente curta e descolada do pacote

## Instalação

```bash
composer require :vendor/:package_name:dev-master
```

## Configuração


## Uso


## Customização


## Segurança

Caso encontre alguma falha de segurança, por favor, envie um email para :author_email ao invés de abrir uma issue

## Creditos

- [:author_name](https://github.com/:author_username)

## Licença

Licença MIT. [Clique aqui](LICENSE.md) para mais detalhes