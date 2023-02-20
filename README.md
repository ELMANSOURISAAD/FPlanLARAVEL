### FPlanLARAVEL Project

---

#### ✅ Requirement:
- PHP >= 8.0
- Docker & docker-compose

#### 📝 Copy the project variables :

`````bash
> cp .env.example .env
`````

#### 🗃️ Start the docker container:

````bash
> ./docky up -d
````
#### ➕ Install project dependencies :
````bash
> ./docky npm install

> ./docky composer install
````

#### 🏗️ Run Seeds to structure and fill the database :

````bash
> ./docky php artisan db:seed
````

#### ✨ Watch assets :

````bash
> ./docky npm run watch
````

## HAPPY CODING 🚀

### Contributors

This project exists thanks to all the people who volunteer their time to contribute!

<a href="https://github.com/ELMANSOURISAAD/FPlanLARAVEL/graphs/contributors">
  <img src="https://contrib.rocks/image?repo=ELMANSOURISAAD/FPlanLARAVEL" />
</a>

