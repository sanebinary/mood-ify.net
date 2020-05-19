describe('The homepage funtion', () => {
    it('successfully load', () => {
        cy.visit('http://localhost:80') 
    }) 

    it('submit input with element map and "go to music lists" buttton', () => {
        cy.get('input').type('Ho Chi Minh')
        cy.get('form').submit()
    })

    it('check if longitude and latitude (without decimal) matched with the place', () => {

    })

    it('redirect to music list', () => {
        cy.get('.top').click()
        cy.url().should('eq', 'http://localhost/city/?latitude=10.81667&longtitude=106.63333')
    })

    it('Have 12 Music lists', () => {
        cy.get('.song-listing--item').should('have.length', 12)
    })

    it('Redirect to Spotify when clicked a list', () =>{
        cy.get('.song-listing--item').first().click()  //open spotify refuse to connect
    })
}) 