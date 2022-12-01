describe('Authentication', () => {

  it.only('provide feedback for invalid login credentials', () => {
    cy.refreshDatabase();

    cy.visit('/login');

    cy.get('#email').type('foo@example.com');
    cy.get('#password').type('password');
    cy.contains('button', 'Entrar').click();
    cy.contains('Essas credenciais não foram encontradas em nossos registros.');
  });

  it('signs a user in', () => {
    cy.refreshDatabase();

    cy.create('App\\Models\\User', {email:'gabriel@example.com'});
    cy.visit('/login');

    cy.get('#email').type('gabriel@example.com');
    cy.get('#password').type('password');
    cy.contains('button', 'Entrar').click();
    cy.assertRedirect('/comanda');
  })

  it('visit the dashboard', function(){
    cy.login();
    cy.visit('/comanda').assertRedirect('/login');
  });

});