### FPlanLARAVEL Project

---

#### ✅ Requirement:
- PHP >= 8.0
- Docker & docker-compose

#### 📝 Copy the project variables :

`````bash
> cp .env.example .env
`````
#### ➕ Install project dependencies :

````bash
> npm install && composer install
````

#### 🗃️ Start the MYSQL container:

````bash
> docker-compose up -d
````

#### 🏗️ Run Seeds to structure and fill the database :

````bash
> php artisan db:seed
````

#### ✨ Watch assets & Run the server (in separated terminal):

````bash
> npm run watch
> php artisan serve
````

## HAPPY CODING 🚀

### Contributors

This project exists thanks to all the people who volunteer their time to contribute!

<a href="https://github.com/ELMANSOURISAAD/FPlanLARAVEL/graphs/contributors">
  <img src="https://contrib.rocks/image?repo=ELMANSOURISAAD/FPlanLARAVEL" />
</a>

