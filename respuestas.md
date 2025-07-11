# respuestas.md

## Laravel y PHP (POO)

1. **Explica el ciclo de vida de una petición en Laravel.**  
   Una petición en Laravel sigue estos pasos:
   - Entra por `public/index.php`.
   - Se carga el autoload y el kernel (`App\Http\Kernel`).
   - Se resuelven middlewares globales y de ruta.
   - Se enruta la petición (`routes/web.php` o `routes/api.php`).
   - Se ejecuta el controlador o cierre asociado.
   - Se retorna una respuesta (`Response`), que puede ser JSON, HTML, etc.
   - Laravel la envía al navegador.

2. **Diferencias entre `hasOne`, `hasMany`, `belongsTo`, `belongsToMany`.**  
   - `hasOne`: Relación 1:1 (ej. un usuario tiene un perfil).  
   - `hasMany`: Relación 1:N (ej. un usuario tiene muchos posts).  
   - `belongsTo`: Inversa de `hasOne` o `hasMany`. (ej. un post pertenece a un usuario).  
   - `belongsToMany`: Relación N:N con tabla pivote (ej. usuarios y roles).

3. **¿Qué es un Service Provider y para qué sirve?**  
   Es una clase que registra servicios en el contenedor de Laravel. Se utiliza para enlazar clases, configurar dependencias y extender funcionalidades. Se registran en `config/app.php`.

4. **¿Cómo implementarías el patrón Repository en Laravel?**  
   - Crear una interfaz `UserRepositoryInterface`.  
   - Implementar la lógica en `UserRepository`.  
   - Registrar la implementación en un Service Provider.  
   - Inyectar la interfaz donde se necesite.

5. **Ventajas de PHP orientado a objetos frente a estructurado.**  
   - Reutilización de código mediante clases.  
   - Mejor organización y mantenimiento.  
   - Encapsulamiento y abstracción.  
   - Facilita la aplicación de principios SOLID.

## MySQL

6. **¿Qué índices usarías para búsquedas por cliente y fecha?**  
   - Índice compuesto: `(cliente_id, fecha)` si las búsquedas usan ambos.  
   - O individuales si se filtran por separado.  
   - Considerar índices `BTREE` para ordenación y rangos de fecha.

7. **Diferencia entre `INNER JOIN`, `LEFT JOIN` y `RIGHT JOIN`.**  
   - `INNER JOIN`: Registros coincidentes en ambas tablas.  
   - `LEFT JOIN`: Todos los de la izquierda + coincidencias de la derecha.  
   - `RIGHT JOIN`: Todos los de la derecha + coincidencias de la izquierda.

8. **¿Cómo harías una migración sin downtime?**  
   - Evitar operaciones bloqueantes como `ALTER TABLE`.  
   - Usar migraciones en pasos pequeños.  
   - Crear nueva tabla o columna, poblarla, luego renombrar.  
   - Usar herramientas como `pt-online-schema-change`.

## API REST

9. **Verbos HTTP y su uso en CRUD.**  
   - `GET`: Leer recursos.  
   - `POST`: Crear nuevos recursos.  
   - `PUT`: Reemplazar recursos existentes.  
   - `PATCH`: Modificar parcialmente un recurso.  
   - `DELETE`: Eliminar recursos.

10. **Diferencias entre códigos HTTP:**
   - `200 OK`: Todo correcto, respuesta con datos.  
   - `201 Created`: Recurso creado correctamente.  
   - `204 No Content`: Todo bien, pero sin contenido de respuesta.  
   - `400 Bad Request`: Datos inválidos del cliente.  
   - `401 Unauthorized`: No autenticado.  
   - `403 Forbidden`: Autenticado pero sin permisos.  
   - `500 Internal Server Error`: Error del servidor.

11. **¿Cómo versionarías una API en Laravel?**  
   - Prefijo en rutas (`/api/v1/usuarios`).  
   - Carpetas por versión en controladores (`App\Http\Controllers\Api\V1`).  
   - Middleware para gestionar versiones si es necesario.

## Docker

12. **Diferencia entre imagen y contenedor.**  
   - Imagen: Plantilla inmutable con instrucciones para crear contenedores.  
   - Contenedor: Instancia en ejecución de una imagen.

13. **¿Cómo harías un entorno Laravel en Docker?**  
   - Dockerfile para PHP con extensiones necesarias.  
   - Imagen de MySQL/PostgreSQL.  
   - `docker-compose.yml` para definir servicios.  
   - Montar el código en un volumen.  
   - Usar Laravel Sail o entorno personalizado.

14. **3 buenas prácticas en un Dockerfile PHP.**  
   - Usar imágenes específicas y ligeras (`php:8.3-fpm-alpine`).  
   - Evitar instalar paquetes innecesarios.  
   - Usar multistage builds para separar entorno de desarrollo y producción.

## Git

15. **Flujo de trabajo con Git.**  
   - `main/master`: Producción.  
   - `develop`: Integración.  
   - Branches para features (`feature/login`), bugs (`bugfix/123`) y releases.  
   - Pull Requests y revisión de código.

16. **¿Qué es `git rebase` y cuándo se usa?**  
   Reescribe la base de un branch sobre otro. Se usa para:
   - Limpiar historial antes de hacer merge.  
   - Actualizar tu feature branch desde `develop` sin generar commits de merge.

17. **¿Cómo resolverías un conflicto complejo?**  
   - Leer bien el conflicto (`<<<<<<< HEAD`).  
   - Usar `git status` y herramientas como `git mergetool`.  
   - Probar el resultado después del merge.  
   - Confirmar con `git add` y `git rebase --continue` o `git commit`.

## Pruebas automatizadas

18. **¿Qué diferencias existen entre pruebas unitarias, pruebas de integración y pruebas end-to-end?**  
   - Unitarias: Prueban funciones/clases aisladas.  
   - Integración: Prueban módulos conectados entre sí (ej. DB y servicios).  
   - End-to-End: Simulan la experiencia completa del usuario.

19. **¿Cómo organizarías los tests en una aplicación Laravel?**  
   - `tests/Unit` para lógica interna.  
   - `tests/Feature` para rutas, controladores, middleware.  
   - Carpeta por dominio o módulo si el proyecto es grande.

20. **Herramientas y frameworks para pruebas en proyectos PHP.**  
   - PHPUnit (Laravel por defecto).  
   - PestPHP (más legible y expresivo).  
   - Mockery para mocks.  
   - Laravel Dusk para pruebas E2E.  
   - Faker para datos de prueba.

21. **¿Qué estrategias utilizas para mantener alta la cobertura sin sacrificar mantenibilidad?**  
   - TDD o cubrir lo más crítico.  
   - Evitar probar código que no tiene lógica propia (getters/setters).  
   - Usar tests parametrizados y reutilizar helpers.  
   - Revisión constante y análisis con herramientas de cobertura (`Xdebug`, `Infection`).

22. **¿Qué opinas sobre el uso de mocks en pruebas unitarias? ¿Cuándo los utilizas?**  
   Son útiles para aislar dependencias externas. Los uso cuando:
   - No quiero hacer llamadas reales a servicios externos o DB.  
   - Necesito simular respuestas específicas.  
   - Estoy probando lógica de control más que integración.