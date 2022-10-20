### Plataforma CMS beta para BH

#### Local Setup

- Se debe tener Mysql y un servidor (ej; Apache) previamente instalado
- Clonar repo al ambiente local
- Iniciar servidor y mysql
- Configurar host, user y password de ser necesario en el archivo `config > db.php`

### Production

- El CMS se encuentra como demo [AQUI](https://bh-news-backend.herokuapp.com/index.php)
- A fines prácticos, las credenciales de acceso son a@a.com > admin123

#### Notas:

- CMS realizado con PHP, de forma rápida. La aplicación cuenta con un primitivo módulo de autenticación y operaciones elementales CRUD
- Cuenta con una API consumida por el front para la publicación de artículos

#### Deudas técnicas:

Debido al corto tiempo (24hs), esta aplicación debe ser mejorada. Algunos puntos a considerar son:

- Mejora de seguridad en autenticación
- Migración a OOP y PDO
- Sanitización de DB
- Configuración MVC
- Refactorización
