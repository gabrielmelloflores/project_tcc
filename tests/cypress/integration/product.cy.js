describe('Produtos', () => {
  it('create a product', () => {
    const produto = 'X-Frango';
    const produto2 = ' (sem salada)';
    cy.refreshDatabase();
    cy.login();

    //Cadastrar
    cy.visit('/produtos');
    cy.get(':nth-child(2) > .btn').click();
    cy.get(':nth-child(1) > .form-control').type(produto);
    cy.get(':nth-child(2) > .form-control').type('21');
    cy.get(':nth-child(3) > .form-control').type('xis');
    cy.get(':nth-child(4) > .form-control').type('15');
    cy.contains('button', 'Salvar').click();
    //Verificar Lista
    cy.contains(produto);

    //Editar
    cy.get('.edit > .material-icons').click();
    cy.get('.modal-content > .modal-body > :nth-child(1) > .form-control').type(produto2);
    cy.get('.modal-content > .modal-footer > .btn-success').click();
    //Verificar Lista
    cy.contains(produto + produto2);

    //Excluir
    cy.get('.delete > .material-icons').click();
    //Verificar Lista
    cy.contains(produto + produto2).should('not.exist');
  });
});