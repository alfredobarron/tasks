
# 📝 Tasks API

API RESTful desarrollada en Laravel para la gestión de tareas, diseñada siguiendo buenas prácticas de programación orientada a objetos, arquitectura limpia (Services/Repositories) y contenedores Docker.

---

## 🚀 Objetivo

Evaluar la capacidad técnica para estructurar, implementar y documentar una API funcional utilizando:

- Laravel
- MySQL
- Docker
- Git
- Principios SOLID / POO

---

## 📦 Tecnologías

- PHP 8.x
- Laravel (LTS)
- MySQL 8
- Docker y docker-compose
- phpMyAdmin (opcional)
- POO: Form Requests, Services, Repositories

---

## 📚 Modelo: `Tarea`

| Campo          | Tipo      | Reglas                         |
|----------------|-----------|-------------------------------|
| id             | int       | Auto-incremental              |
| titulo         | string    | Requerido                     |
| descripcion    | text      | Opcional                      |
| completada     | boolean   | Default: false                |
| fecha_limite   | date      | Obligatoria, debe ser futura  |
| created_at     | timestamp | Auto generado                 |
| updated_at     | timestamp | Auto generado                 |

---

## 📖 Endpoints

| Método | Endpoint           | Descripción                    |
|--------|--------------------|--------------------------------|
| GET    | /api/tareas        | Listar todas las tareas        |
| POST   | /api/tareas        | Crear una nueva tarea          |
| PUT    | /api/tareas/{id}   | Actualizar una tarea existente |
| DELETE | /api/tareas/{id}   | Eliminar una tarea             |

---

## ⚙️ Instalación y uso

### 1. Clonar el repositorio

```
git clone https://github.com/alfredobarron/tasks
cd tasks
```

### 2. Copiar archivo `.env` y configurar

```
cp .env.example .env
```

Asegúrate de usar los siguientes valores:

```
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=secret
```

### 3. Levantar servicios con Docker

```
docker-compose up -d --build
```

### 4. Instalar dependencias y generar clave

```
docker exec -it laravel-app composer install
docker exec -it laravel-app php artisan key:generate
```

### 5. Ejecutar migraciones y seeders

```
docker exec -it laravel-app php artisan migrate --seed
```

---

## 🔍 Accesos

- API: http://localhost:8000/api/tareas
- phpMyAdmin: http://localhost:8080  
  - Servidor: db  
  - Usuario: laravel  
  - Contraseña: secret

---

## 📂 Estructura del Proyecto

- app/Http/Requests → Validaciones (FormRequest)
- app/Repositories → Lógica de persistencia
- app/Services → Lógica de negocio
- routes/api.php → Rutas tipo RESTful
- database/seeders → Carga de datos iniciales

---

## ✅ Buenas prácticas aplicadas

- Código limpio y desacoplado (Controller → Service → Repository)
- Separación de capas
- Validación centralizada con FormRequest
- Uso de migraciones y seeders
- Entorno reproducible con Docker
- Respuestas en formato JSON y status HTTP adecuados
- Commits descriptivos

---

## 🔁 Pruebas con Postman y cURL

### 📬 GET: Listar tareas

**cURL**

```
curl -X GET http://localhost:8000/api/tareas
```

**Postman**

- Método: GET  
- URL: http://localhost:8000/api/tareas

---

### 🆕 POST: Crear tarea

**cURL**

```
curl -X POST http://localhost:8000/api/tareas \
-H "Content-Type: application/json" \
-d '{"titulo": "Nueva tarea", "descripcion": "Descripción opcional", "fecha_limite": "2025-12-31"}'
```

**Postman**

- Método: POST  
- URL: http://localhost:8000/api/tareas  
- Body → raw → JSON:

```
{
  "titulo": "Nueva tarea",
  "descripcion": "Descripción opcional",
  "fecha_limite": "2025-12-31"
}
```

---

### ✏️ PUT: Actualizar tarea

**cURL**

```
curl -X PUT http://localhost:8000/api/tareas/1 \
-H "Content-Type: application/json" \
-d '{"titulo": "Tarea actualizada", "completada": true}'
```

**Postman**

- Método: PUT  
- URL: http://localhost:8000/api/tareas/1  
- Body → raw → JSON:

```
{
  "titulo": "Tarea actualizada",
  "completada": true
}
```

---

### ❌ DELETE: Eliminar tarea

**cURL**

```
curl -X DELETE http://localhost:8000/api/tareas/1
```

**Postman**

- Método: DELETE  
- URL: http://localhost:8000/api/tareas/1

---

## 👤 Autor

Desarrollado por **Alfredo Barrón**  
Contacto: alfredobarronc@gmail.com  
GitHub: [@alfredobarron](https://github.com/alfredobarron)

---

## 📝 Licencia

Este proyecto es privado y para fines de evaluación técnica.
