# ModuText - Gestión de Residuos Textiles

ModuText es una plataforma web para la gestión de residuos textiles, permitiendo a los usuarios solicitar retiros de telas y gestionar direcciones de recolección.

Este proyecto fue desarrollado como trabajo colaborativo con los estudiantes Victor y Luna.

## Características

- Registro e inicio de sesión de usuarios
- Solicitud de retiro de telas
- Gestión de direcciones de recolección
- Visualización de estadísticas (kilos recolectados, huella de carbono)
- Formulario de contacto

## Tecnologías utilizadas

- PHP 7.4+
- MySQL
- HTML5, CSS3, JavaScript
- Bootstrap 5
- SweetAlert2
- PHPMailer

## Instalación Local

1. Clona este repositorio
2. Configura un servidor web con soporte para PHP y MySQL (como XAMPP, WAMP o un servidor local)
3. Importa la base de datos desde el archivo SQL correspondiente
4. Configura las credenciales de la base de datos en `conexion.php`
5. Configura las credenciales de correo electrónico en los archivos correspondientes

## Configuración Requerida

Para ejecutar esta aplicación, necesitarás configurar:

1. Base de datos MySQL:
   - Host: localhost:3307
   - Usuario: root
   - Contraseña: (vacía o la que tengas configurada)
   - Nombre de la base de datos: modutex

2. Credenciales de correo electrónico:
   - Archivo: `enviar_correo.php` y `procesar_retiro.php`
   - Usuario: drackracer@gmail.com
   - Contraseña: iyphkooslbxszvsc (usar contraseña de aplicación para Gmail)

## Seguridad

- Todas las entradas de usuario son sanitizadas
- Se utilizan declaraciones preparadas para prevenir inyecciones SQL
- Las contraseñas se almacenan con hash usando password_hash()
- Validación de RUT chileno implementada

## Contribuciones

Las contribuciones son bienvenidas. Por favor, abre un issue para discutir cambios antes de enviar un pull request.

## Licencia

Este proyecto está licenciado bajo la Licencia MIT.