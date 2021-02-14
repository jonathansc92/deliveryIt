<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Endpoints

- http://127.0.0.1:8000/api/corredoresProvas (get/post)
- http://127.0.0.1:8000/api/corredoresProvas/{id} (put/delete/get)
- http://127.0.0.1:8000/api/provas (get/post)
- http://127.0.0.1:8000/api/provas/{id} (put/delete/get)
- http://127.0.0.1:8000/api/resultados (get/post)
- http://127.0.0.1:8000/api/resultados/{id} (put/delete/get)
- http://127.0.0.1:8000/api/corredores (get/post)
- http://127.0.0.1:8000/api/corredores/{id} (put/delete/get)
- http://127.0.0.1:8000/api/classificacao/prova/{id} (get)
- http://127.0.0.1:8000/api/classificacao/prova/{id}/{idade} (get). Exemplo http://127.0.0.1:8000/api/classificacao/prova/1/18
ou para pegar um intervalo entre uma idade e outra http://127.0.0.1:8000/api/classificacao/prova/1/18-25

## Tests

- vendor\bin\phpunit --filter lista_corredores_provas
- vendor\bin\phpunit --filter can_create_corredores_provas
- vendor\bin\phpunit --filter can_update_corredores_provas
- vendor\bin\phpunit --filter can_delete_corredores_provas
- vendor\bin\phpunit --filter can_show_corredores_provas
- vendor\bin\phpunit --filter lista_provas
- vendor\bin\phpunit --filter can_create_provas
- vendor\bin\phpunit --filter can_update_provas
- vendor\bin\phpunit --filter can_delete_provas
- vendor\bin\phpunit --filter can_show_provas
- vendor\bin\phpunit --filter lista_resultados
- vendor\bin\phpunit --filter can_create_resultados
- vendor\bin\phpunit --filter can_update_resultados
- vendor\bin\phpunit --filter can_delete_resultados
- vendor\bin\phpunit --filter can_show_resultados
- vendor\bin\phpunit --filter lista_corredores
- vendor\bin\phpunit --filter can_create_corredores
- vendor\bin\phpunit --filter can_update_corredores
- vendor\bin\phpunit --filter can_delete_corredores
- vendor\bin\phpunit --filter can_show_corredores
- vendor\bin\phpunit --filter lista_classificacao
- vendor\bin\phpunit --filter lista_classificacao_por_idade
