describe('The Home Page', () => {
    it('successfully load', () => {
      cy.visit('http://localhost:80') 
    }) 
  
    it('click successful', () => {
      cy.get('.city-find-form--input').click()
    })
  
    it('submit form success', () => {
      cy.get('form').submit()
    })
  })