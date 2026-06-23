# Historias de Usuario — CodeBridge

---

## HU-01: Solicitud de proyecto desde el panel del cliente

**Como** cliente logueado,
**quiero** solicitar un nuevo proyecto desde mi panel
**para** que la empresa reciba mi pedido y pueda contactarme.

### Tareas

- [ ] Agregar botón "Solicitar proyecto" en el dashboard del cliente
- [ ] Crear modal con formulario (título + descripción, correo autocompletado)
- [ ] Crear ruta y controlador para almacenar la orden (`POST /cliente/proyectos`)
- [ ] Enviar email de notificación a `codebridgefsa@gmail.com` al crear la orden

---

## HU-02: Conversación entre cliente y empresa por proyecto

**Como** cliente,
**quiero** ver todas las respuestas de la empresa en mi panel y poder responder
**para** tener un historial de la comunicación.

### Tareas

- [ ] Crear migración y modelo `OrderMessage`
- [ ] Agregar relación `messages()` al modelo `Order`
- [ ] En panel cliente: hacer cada orden expandible con el hilo de mensajes
- [ ] Agregar input para responder desde el panel del cliente
- [ ] Agregar ruta `POST /cliente/proyectos/{order}/mensajes`

---

## HU-03: Gestión de proyectos desde el panel admin

**Como** administrador,
**quiero** ver los proyectos solicitados, responder a los clientes y cambiar el estado del proyecto
**para** gestionar el flujo de trabajo.

### Tareas

- [ ] Agregar método `show` en `Admin\OrderController` con vista de detalle
- [ ] Mostrar información del proyecto, estado actual y conversación completa
- [ ] Agregar formulario para cambiar estado (pendiente → en_progreso → completado/cancelado)
- [ ] Agregar input para responder al cliente desde el panel admin
- [ ] Agregar botón "Ver" en la tabla de pedidos del admin

---

## HU-04: Corrección de seeders para usuarios verificados

**Como** desarrollador,
**quiero** que los usuarios de prueba estén pre-verificados
**para** agilizar el testing.

### Tareas

- [ ] Agregar `email_verified_at => now()` en `UserSeeder` para admin, developer y cliente
