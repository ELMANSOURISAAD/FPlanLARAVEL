### FPlanLARAVEL Project

---

#### ✅ Requirement:
- PHP >= 8.0
- Docker & docker-compose

#### 📝 Copy the project variables :

`````bash
    cp .env.example .env
`````
#### ➕ Install project dependencies :

````bash
    npm install && composer install
````

#### 🗃️ Start the MYSQL container:

````bash
    docker-compose up -d
````

#### 🏗️ Run Seeds to structure and fill the database :

````bash
    php artisan db:seed
````
## HAPPY CODING 🚀
