# Proyecto Biblioteca

Este proyecto fue desarrollado en entorno local con **XAMPP**.  
Para que funcione correctamente, en la URL se debe reemplazar `htdocs/` por `localhost/`.

## Descripción
Es un sistema básico de **biblioteca** donde se relacionan **HTML, CSS, PHP y MySQL**.  
Incluye varios formularios para gestionar autores, usuarios, libros y préstamos.  
No incluye login ni roles, es solo un prototipo académico para una mini biblioteca.

## Reglas importantes
- **No se puede guardar un préstamo** sin antes haber cargado datos en las tablas **Libros** y **Usuarios**.
- Para probar ciertos formularios, hay que cambiar la extensión de `.html` a `.php`.

## Instrucciones de uso
1. **Préstamos**  
   - Cambiar `form_prestamos.html` por `form_prestamos.php`.  
   - Así se podrá seleccionar un usuario al que se le presta un libro.
2. **Libros**  
   - Cambiar `formulario_libros.html` por `formulario_libros.php`.  
   - Así se podrá seleccionar un autor.  
   - Si no se selecciona ninguno → aparece error.
3. **Comprobación actual de formularios**:  
   - Usuarios ✔️  
   - Préstamos ✔️  
   - Autores ✔️  
   - Libros ✔️ (*no lo puse aún en carpeta porque es mucho código que debería modificar*)

## Cosas pendientes
- Agregar **modificar y eliminar** en los listados
- Revisar si `Lista_libros2.php` o `Lista_libros.php` cumplen funciones
- Crear un **index.php** para centralizar la navegación (actualmente hay que entrar archivo por archivo)
