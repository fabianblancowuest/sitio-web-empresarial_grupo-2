describe('Pruebas de la página de inicio', () => {
  beforeEach(() => {
    // 1. Visita la página web donde está corriendo tu proyecto local de Laravel
    cy.visit('http://127.0.0.1:8000')
  })

  it('Debería cargar la sección de contacto correctamente', () => {
    // 2. Comprueba que el título "¡Hablemos!" esté visible en la pantalla
    cy.contains('¡Hablemos!').should('be.visible')

    // 3. Comprueba que el formulario de contacto esté presente
    cy.get('form').should('exist')
  })
})