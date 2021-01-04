// describe('A feature', () => {
    
//     context('a portion of that feature', () => {
        
//         it('works', () => {

//         });

//     })
// })


describe('Blog', () => {
    beforeEach(() => {
        cy.log('hello world');
        cy.refreshDatabase();
    });

    it('show all posts', () => {
        cy.create('App\\Models\\Post',1, {
            title: 'My First Post'
        });

        cy.php('App\\Models\\Post::count()').then(count => {
            cy.log('The count of posts is ' + count);
        });

        // cy.visit('/blog', {
        //     failOnStatusCode: false
        // }).contains('My First Post');
    });

    it('creates a post', () => {

    });
})

