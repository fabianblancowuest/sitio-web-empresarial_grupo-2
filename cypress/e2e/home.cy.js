describe('Pruebas de la página de inicio', () => {
  beforeEach(() => {
    // Esto se ejecuta antes de cada prueba (visitar la página)
    cy.visit('http://127.0.0.1:8000')
  })

  // --- PRUEBA 1 (La que ya tenías) ---
  it('Debería cargar la sección de contacto correctamente', () => {
    cy.contains('¡Hablemos!').should('be.visible')
    cy.get('form').should('exist')
  })

  // --- PRUEBA 2 (La nueva para tu demo de mañana) ---
  it('Debería mostrar el menú de navegación y el botón principal', () => {
    // 1. Verifica que los enlaces del menú superior existan
    cy.contains('Proyectos').should('be.visible')
    cy.contains('Equipo').should('be.visible')
    cy.contains('Contacto').should('be.visible')

    // 2. Verifica que el botón de llamada a la acción esté visible
    cy.contains('Ver todos los proyectos').should('be.visible')
  })
})