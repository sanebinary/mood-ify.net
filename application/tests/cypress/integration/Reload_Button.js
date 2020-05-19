describe('Reload Button', () => {
    it('successfully load', () => {
        cy.visit('http://localhost:80') 
    }) 

    it('submit input with element map and "go to music lists" buttton', () => {
        cy.get('input').type('Ho Chi Minh')
        cy.get('form').submit()
    })

    it('redirect to music list', () => {
        cy.get('.top').click()
        cy.url().should('eq', 'http://localhost/city/?latitude=10.81667&longtitude=106.63333')
    })

    it('Check the reload button', () => {
        cy.get('.top').click()  //change the redirect link
        cy.url().should('eq', 'http://localhost/city/?latitude=10.81667&longtitude=106.63333')
    })
}) 