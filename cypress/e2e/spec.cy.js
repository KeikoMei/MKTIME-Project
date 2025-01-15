describe('MKTIME Tests', () => {
  const baseUrl = 'http://localhost:8080/codespace/MKTIME/';

  // Test the landing page
  it('Loads the homepage successfully', () => {
      cy.visit(baseUrl); // Go to home
      cy.contains('Welcome to MKTIME'); 
  });

  //Test  Login
  it('Logs in successfully', () => {
      cy.visit(`${baseUrl}/login.php`); // go to the login page

      // Fill in the login form
      cy.get('input[name="email"]').type('test@test'); 
      cy.get('input[name="pass"]').type('test'); 

      // Submit the form
      cy.get('button[type="submit"]').click();

      // Verify successful login
      cy.contains('Welcome, Test User'); 
      cy.url().should('not.include', '/login'); // the user is redirected
  });

  // Test Login error handling
  it('Shows error for invalid credentials', () => {
    cy.visit(`${baseUrl}/login.php`); // go to the login page

    // Fill in the login form with invalid data
    cy.get('input[name="email"]').type('invalid@example.com');
    cy.get('input[name="pass"]').type('wrongpassword');

    // Submit the form
    cy.get('button[type="submit"]').click();

    // Verify error message is displayed
    cy.contains('Email address and password not found.'); 
  });

  //Test the Navigation Bar
  it('Navigates using the navbar links', () => {
      cy.visit(baseUrl); // Go to the homepage
      cy.get('.nav-item.dropdown').contains('Our Collection').click();
      cy.get('.dropdown-item').contains('All products').click(); // Click on "Products"

      cy.get('input[name="email"]').type('test@test'); 
      cy.get('input[name="pass"]').type('test'); 

      // Submit the form
      cy.get('button[type="submit"]').click();


      cy.url().should('include', '/products'); // Ensure the URL is correct
      cy.contains('Our Products'); // Verify the page content
  });

  // Test Add to Cart
  it('Adds a product to the basket', () => {
    cy.visit(`${baseUrl}/products.php`); // Visit the products page

    cy.get('input[name="email"]').type('test@test'); 
    cy.get('input[name="pass"]').type('test'); 

    // Submit the form
    cy.get('button[type="submit"]').click();
    cy.get('.btn').contains('Add to basket').first().click(); // Click the first "Add to Cart" button
    cy.get('.card-text').should('contain', 'has been added to your basket'); // Verify success message
  });

  // Test Cart Functionality
  it('Shows items in the basket', () => {
    cy.visit(`${baseUrl}/products.php`); // Visit the products page
    cy.get('input[name="email"]').type('test@test'); 
    cy.get('input[name="pass"]').type('test'); 

    // Submit the form
    cy.get('button[type="submit"]').click();
    cy.get('.btn').contains('Add to basket').first().click(); // Click the first "Add to Cart" button
    cy.visit(`${baseUrl}/basket.php`); // Visit the basket page
    cy.contains('Your Shopping Basket'); // Ensure the cart page loads
    cy.get('table').should('exist'); // Check for the presence of the basket table
    cy.get('table').find('tr').its('length').should('be.gte', 2); // Ensure at least one product is in the cart
  });

  // Test Checkout Process
  it('Processes checkout successfully', () => {
    cy.visit(`${baseUrl}/products.php`); // Visit the products page
    cy.get('input[name="email"]').type('test@test'); 
    cy.get('input[name="pass"]').type('test'); 

    // Submit the form
    cy.get('button[type="submit"]').click();
    cy.get('.btn').contains('Add to basket').first().click(); // Click the first "Add to Cart" button
    cy.visit(`${baseUrl}/basket.php`); // Visit the basket page
    cy.get('.btn').contains('Checkout Now').click(); // Click the first "Add to Cart" button
    cy.contains('Thank You for Your Order!'); // Verify order confirmation message
  });

});