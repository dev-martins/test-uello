<h1 align="center">Test Ello</h1>

   <p>
   
   - [Sobre](#sobre)
   - [Preview](#preview)
   - [Funcionalidades](#funcionalidades)
   - [Como Usar](#como-usar)
   </p>

---

<h2 align="center">Sobre</h2>

Foi desenvolvido para subir arquivos CSV e gravar seus dados no banco MySQL.

</p>

---

<h2 align="center">Preview</h2>

   <p align="center">
      <img src="https://i.ibb.co/25XnGFF/image.png" width="400" alt="Preview">
   </p>

---

<h2 align="center">Funcionalidades</h2>
   
- Upload de arquivos CSV;
- Extrair suas informações para salvá-las no banco MySQL por meio de filas;

<h2 align="center">Como Usar</h2>

- Primeiro será necessário ter instalado:
   - git **(clonar o projeto)**
   - docker **(rodar o projeto)**
   - postman **(facilitar a execução o projeto)**

- Clone esse repositorio em uma pasta:

```sh
git clone https://github.com/dev-martins/test-uello.git test
```

- Entre no diretorio:

```sh
cd test
```

- execute o docker:

```sh
docker compose up -d --build
```

- rode as migrations
```sh
docker-compose exec -T base-ello php artisan migrate
```
- e após isso as seeders
  
```sh
docker-compose exec -T base-ello php artisan db:seed
```

- agora podemos colocar as filas para rodar
```sh
docker-compose exec -it base-ello php artisan queue:work --queue=freight-import
```

- agora no postman, podemos executar nessa [collection](https://documenter.getpostman.com/view/7646530/2s935vjzZE), passando hashs **uuid** para a aplicação

<p align="center">
      <img src="https://i.ibb.co/q7V72qN/image.png" width="150" alt="local log">
   </p>

- Para garantir que a aplicação está seguindo os requerimentos passados no testo como: **PSR1, PSR12** e **Tests**
```sh
docker-compose exec -T base-ello vendor/bin/phpcs
```
deve ter esse retorno
<p align="center">
      <img src="https://i.ibb.co/B4Cvxj2/image.png" width="150" alt="local log">
   </p>

---

Esse projeto foi desenvolvido por **[@Claudio Martins](https://www.linkedin.com/in/criar-site-martins/)**.

---

Se isso te ajudou, dê uma ⭐, isso vai me ajudar também!
😉

---

   <div align="center">

[![Linkedin Badge](https://img.shields.io/badge/-Claudio%20Martins-292929?style=flat-square&logo=Linkedin&logoColor=white&link=https://www.linkedin.com/in/criar-site-martins/)](https://www.linkedin.com/in/criar-site-martins/)

   </div>