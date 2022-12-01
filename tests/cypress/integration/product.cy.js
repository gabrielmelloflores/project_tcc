describe('Produtos', () => {
  it('create a product', () => {
    cy.refreshDatabase();
    cy.login();

    cy.visit('/produtos');
    cy.get(':nth-child(2) > .btn').click();
    cy.get(':nth-child(1) > .form-control').type('X-file'+i);
    cy.get(':nth-child(2) > .form-control').type('21');
    cy.get(':nth-child(3) > .form-control').type('xis');
    cy.get(':nth-child(4) > .form-control').type('15');
    cy.contains('button', 'Salvar').click();
    

  });
});