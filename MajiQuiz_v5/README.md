Após fazer pull/clonar projeto:  
1 - composer install  
2 - criar .env  
3 - php artisan key:generate  
4 - npm install  
5 - npx mix (é criada pasta public/css)

Depois correr "npm run dev" e "php artisan serve" e testar se fundo é cor de rosa.

Para continuar a editar a stylesheet há 2 opcoes:
- Editar em resources/sass/app.scss e fazer npx mix para que /public/css seja atualizado.
- Editar diretamente em /public/css (código da stylesheet está no final do ficheiro).