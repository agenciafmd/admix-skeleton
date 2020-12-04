#!/bin/bash

echo "Vamos lá, primeiro preciso dos seus dados, OK?!"
echo

git_name=`git config user.name`;
git_email=`git config user.email`;

read -p "Qual o seu nome? ($git_name) " author_name
author_name=${author_name:-$git_name}

read -p "Qual o seu e-mail? ($git_email) " author_email
author_email=${author_email:-$git_email}

username_guess=${author_name//[[:blank:]]/}
username_guess=${username_guess,,}
read -p "Qual o seu usuário do github? ($username_guess): " author_username
author_username=${author_username:-$username_guess}

echo

echo "Legal $author_name, agora me conte um pouco sobre o pacote que estamos criando."
echo

current_directory=`pwd`
current_directory=`basename $current_directory`
#echo "Qual o nome dele?"
#echo "Lembrando que usamos o prefixo *admix-* para os que serão distribuidos e *local-* para os que ficarão no projeto"
#read -p "Ah! Não esqueça que devemos usar plural aqui ($current_directory): " package_name
#package_name=${package_name:-$current_directory}
package_name=$current_directory

read -p "Que nome vamos dar pra ele? Coloque no plural para ficar bonito [ex. Clientes]: " package_description
package_description=${package_description^}

#default_vendor="agenciafmd"
#read -p "E o vendor? Se quiser trocar o nome, agora é a hora, senão vamos de *$default_vendor* mesmo =): " vendor
#vendor=${vendor:-$default_vendor}
vendor="agenciafmd"

echo

echo "Maravilha, vamos seguindo!"
echo "Agora vamos para a nossa aplicação, me conte mais sobre ela"
echo

#default_namespace_vendor=${vendor^}
#read -p "Qual será o vendor namespace? O mais recomendado é *$default_namespace_vendor*, mas podemos usar o que você quiser: " namespace_vendor
#namespace_vendor=${namespace_vendor:-$default_namespace_vendor}
namespace_vendor=${vendor^}

default_namespace_skeleton_name=${package_name}
default_namespace_skeleton_name=${default_namespace_skeleton_name/admix-/}
default_namespace_skeleton_name=${default_namespace_skeleton_name/local-/}
default_namespace_skeleton_name=${default_namespace_skeleton_name^}
#read -p "Agora o namespace do pacote. O mais recomendado é *$default_namespace_skeleton_name*, mas podemos usar o que você quiser: " namespace_skeleton_name
#namespace_skeleton_name=${namespace_skeleton_name:-$default_namespace_skeleton_name}
namespace_skeleton_name=$default_namespace_skeleton_name

read -p "Qual será o nome da nossa *Model*, lembrando que temos que usar singular aqui: " skeleton_name
skeleton_name=${skeleton_name^}
skeleton_name_lower=${skeleton_name,,}

#read -p "O nome da *Model*, no plural agora =): " skeleton_name_plural
#skeleton_name_plural=${skeleton_name_plural^}
#skeleton_name_plural_lower=${skeleton_name_plural,,}
skeleton_name_plural=$namespace_skeleton_name
skeleton_name_plural_lower=${skeleton_name_plural,,}

echo

echo "Calminha Jovem, já estamos acabando."
echo

#read -p "Agora me passe o nome em *Português* para colocarmos no menu. No plural também por favor: " skeleton_friendly_name
#skeleton_friendly_name=${skeleton_friendly_name^}
skeleton_friendly_name=$package_description

read -p "Agora é a vez daquele icone esperto. Escolha um bem bonito em https://feathericons.com/ e volte com o nome aqui: " skeleton_icon
skeleton_icon=${skeleton_icon,,}

migration_date=$(date +"%Y_%m_%d_%H%M00")

echo

echo "Aeeee!!!!!"
echo

echo "Confirme os dados que vamos utilizar"
echo

echo "=================================="
echo "author_name: $author_name"
echo "author_username: $author_username"
echo "author_email: $author_email"
echo "vendor: $vendor"
echo "package_name: $package_name"
echo "package_description: $package_description"
echo "namespace_vendor: $namespace_vendor"
echo "namespace_skeleton_name: $namespace_skeleton_name"
echo "skeleton_name: $skeleton_name"
echo "skeleton_name_lower: $skeleton_name_lower"
echo "skeleton_name_plural: $skeleton_name_plural"
echo "skeleton_name_plural_lower: $skeleton_name_plural_lower"
echo "skeleton_friendly_name: $skeleton_friendly_name"
echo "skeleton_icon: $skeleton_icon"
echo "migration_date: $migration_date"
echo "=================================="

echo
echo "Bora começar os trabalhos"
echo "Vamos substituir todos os textos que temos pelo que inserimos ai em cima"
read -p "Tem certeza que deseja continuar? (n/y) " -n 1 -r

echo
if [[ ! $REPLY =~ ^[Yy]$ ]]
then
    [[ "$0" = "$BASH_SOURCE" ]] && exit 1 || return 1
fi

echo
echo "Removendo a pasta .git"

rm -rf .git
rm LICENSE.md
rm README.md

echo
echo "Substituindo as strings"

find . ! -name 'configure-skeleton.sh' -type f -exec sed -i -e "s/:author_name/$author_name/g" {} \;
find . ! -name 'configure-skeleton.sh' -type f -exec sed -i -e "s/:author_username/$author_username/g" {} \;
find . ! -name 'configure-skeleton.sh' -type f -exec sed -i -e "s/:author_email/$author_email/g" {} \;
find . ! -name 'configure-skeleton.sh' -type f -exec sed -i -e "s/:vendor/$vendor/g" {} \;
find . ! -name 'configure-skeleton.sh' -type f -exec sed -i -e "s/:package_name/$package_name/g" {} \;
find . ! -name 'configure-skeleton.sh' -type f -exec sed -i -e "s/:package_description/$package_description/g" {} \;
find . ! -name 'configure-skeleton.sh' -type f -exec sed -i -e "s/:namespace_vendor/$namespace_vendor/g" {} \;
find . ! -name 'configure-skeleton.sh' -type f -exec sed -i -e "s/:namespace_skeleton_name/$namespace_skeleton_name/g" {} \;
find . ! -name 'configure-skeleton.sh' -type f -exec sed -i -e "s/:skeleton_name_lower/$skeleton_name_lower/g" {} \;
find . ! -name 'configure-skeleton.sh' -type f -exec sed -i -e "s/:skeleton_name_plural_lower/$skeleton_name_plural_lower/g" {} \;
find . ! -name 'configure-skeleton.sh' -type f -exec sed -i -e "s/:skeleton_name_plural/$skeleton_name_plural/g" {} \;
find . ! -name 'configure-skeleton.sh' -type f -exec sed -i -e "s/:skeleton_name/$skeleton_name/g" {} \;
find . ! -name 'configure-skeleton.sh' -type f -exec sed -i -e "s/:skeleton_friendly_name/$skeleton_friendly_name/g" {} \;
find . ! -name 'configure-skeleton.sh' -type f -exec sed -i -e "s/:skeleton_icon/$skeleton_icon/g" {} \;
find . ! -name 'configure-skeleton.sh' -type f -exec sed -i -e "s/:migration_date/$migration_date/g" {} \;

echo

echo "Renomeando os arquivos"
echo

find . ! -name 'configure-skeleton.sh' -type f -iname "*:author_name*" -exec rename "s/:author_name/$author_name/g" '{}' \;
find . ! -name 'configure-skeleton.sh' -type f -iname "*:author_username*" -exec rename "s/:author_username/$author_username/g" '{}' \;
find . ! -name 'configure-skeleton.sh' -type f -iname "*:author_email*" -exec rename "s/:author_email/$author_email/g" '{}' \;
find . ! -name 'configure-skeleton.sh' -type f -iname "*:vendor*" -exec rename "s/:vendor/$vendor/g" '{}' \;
find . ! -name 'configure-skeleton.sh' -type f -iname "*:package_name*" -exec rename "s/:package_name/$package_name/g" '{}' \;
find . ! -name 'configure-skeleton.sh' -type f -iname "*:package_description*" -exec rename "s/:package_description/$package_description/g" '{}' \;
find . ! -name 'configure-skeleton.sh' -type f -iname "*:namespace_vendor*" -exec rename "s/:namespace_vendor/$namespace_vendor/g" '{}' \;
find . ! -name 'configure-skeleton.sh' -type f -iname "*:namespace_skeleton_name*" -exec rename "s/:namespace_skeleton_name/$namespace_skeleton_name/g" '{}' \;
find . ! -name 'configure-skeleton.sh' -type f -iname "*:skeleton_name_lower*" -exec rename "s/:skeleton_name_lower/$skeleton_name_lower/g" '{}' \;
find . ! -name 'configure-skeleton.sh' -type f -iname "*:skeleton_name_plural_lower*" -exec rename "s/:skeleton_name_plural_lower/$skeleton_name_plural_lower/g" '{}' \;
find . ! -name 'configure-skeleton.sh' -type f -iname "*:skeleton_name_plural*" -exec rename "s/:skeleton_name_plural/$skeleton_name_plural/g" '{}' \;
find . ! -name 'configure-skeleton.sh' -type f -iname "*:skeleton_name*" -exec rename "s/:skeleton_name/$skeleton_name/g" '{}' \;
find . ! -name 'configure-skeleton.sh' -type f -iname "*:skeleton_friendly_name*" -exec rename "s/:skeleton_friendly_name/$skeleton_friendly_name/g" '{}' \;
find . ! -name 'configure-skeleton.sh' -type f -iname "*:skeleton_icon*" -exec rename "s/:skeleton_icon/$skeleton_icon/g" '{}' \;
find . ! -name 'configure-skeleton.sh' -type f -iname "*:migration_date*" -exec rename "s/:migration_date/$migration_date/g" '{}' \;

echo "Prontinho, texto trocado e .git removido, me apagando em 3... 2... 1..."

rm -- "$0"
