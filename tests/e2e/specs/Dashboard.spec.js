// https://docs.cypress.io/api/introduction/api.html

describe('Vérifie que les dashboards sont là', () => {
  it('Visite l\'accueil et check les cards des dashboards', () => {
    cy.server()
    cy.route({
      method: 'GET',
      url: 'api/v1/dashboards',
    }).as('apiListeDashboards')
    cy.visit('/');
    //Vérifie le retour de l'api
    cy.wait('@apiListeDashboards').then((xhr) => {
      expect(xhr.status).to.equal(200)
    })
    cy.get('.card').should('not.empty')
  });
});

describe('Charge un dashboard', () => {
  it('Visite un dashboard et vérifie son affichage', () => {
    cy.server()
    cy.route({
      method: 'GET',
      url: 'api/v1/dashboard/1',
    }).as('apiDashboard')
    cy.visit('#/dashboard/1');
    //Vérifie le retour de l'api
    cy.wait('@apiDashboard').then((xhr) => {
      expect(xhr.status).to.equal(200)
    })
    cy.get('#dashboard').should('exist')
  });
  it('Vérifie le chargement des colonnes/cartes et modifie un nom de colonne au hasard', () => {
    cy.server()
    cy.route({
      method: 'PUT',
      url: 'api/v1/dashboard/column',
    }).as('updateColumn')
    cy.visit('#/dashboard/1');
    cy.get('#dashboard-list').should('exist')
    let column = cy.get('.column')
    column.should('exist')
    //test du click sur le nom de la colonne
    column.each(($el, index, $list) => {
      cy.get($el).find('h3.has-text-weight-bold').click()
      let input = cy.get($el).find('input')
      //Aléatoirement on modifie le nom 
      if(Math.random() < 0.5){
        input.type('*').blur()
        cy.wait('@updateColumn').then((xhr) => {
          expect(xhr.status).to.equal(201)
        })
      }
      
    })
  });
  it('Ajoute une colonne au dashboard', async () => {
    cy.server()
    cy.route({
      method: "POST",
      url: 'api/v1/dashboard/column'
    }).as('addColumnDashboard')
    cy.visit('#/dashboard/1');
    cy.get('#add_column_dashboard').click()
    cy.wait('@addColumnDashboard').then((xhr) => {
      expect(xhr.status).to.equal(201)
    })
  })
  it('Affiche la modal du formulaire des cartes', async () => {
    cy.server()
    cy.route({
      method: 'GET',
      url: 'api/v1/dashboard/1',
    }).as('apiDashboard')
    cy.visit('#/dashboard/1');
    cy.wait('@apiDashboard').then((xhr) => {
      expect(xhr.status).to.equal(200)
    })
    let column = cy.get('.column').first()
    column.find('.add_card_column').click()
    cy.get('.is-active').should('exist')
  })
});
