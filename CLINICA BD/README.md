# Proyecto Clínica

Este proyecto fue desarrollado en entorno local con **XAMPP**.  
Para que funcione correctamente, en la URL se debe reemplazar `htdocs/` por `localhost/`.

## Descripción
Es un sistema de gestión clínica con **PHP y MySQL**, que permite administrar pacientes, profesionales y sus historias clínicas.

## Funcionalidades
- Registro de **pacientes**
- Registro de **profesionales** (con especialidad)
- Registro de **historias clínicas** por paciente
- Carga de **detalles** dentro de cada historia clínica
- Vista del doctor con:
  - Datos personales del paciente
  - Historia clínica completa
  - Opción de agregar detalles

## Instrucciones de uso
1. **Historias clínicas**  
   - Cambiar `hc.html` por `hc.php`.  
   - Solo así se podrá seleccionar el paciente correspondiente.
2. **Profesionales**  
   - Cambiar `form_profesional.html` por `form_profesional.php`.  
   - Solo así se podrá seleccionar una especialidad.
3. **Vista del doctor**  
   - Cambiar `vista_doctor.html` por `vista_doctor.php`.  
   - Permite ver datos del paciente, su historia clínica y agregar detalles.  
   - ⚠️ Si no se selecciona un paciente → no muestra nada.

## Limitaciones actuales
- No se puede buscar un paciente en el listado si **no tiene historia clínica registrada** previamente.
