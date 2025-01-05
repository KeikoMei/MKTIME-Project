-- Insert sample rows into the products table

INSERT INTO products (item_name, item_desc, item_img, item_price, category)
VALUES 
    -- Men's Watches
    ('Classic Chrono', 'A timeless chronograph for every occasion.', 'classic_chrono.jpg', 299.99, 'Men'),
    ('Sporty Diver', 'A rugged dive watch with unmatched durability.', 'sporty_diver.jpg', 199.99, 'Men'),
    ('Elegant Gold', 'A luxurious gold-plated timepiece.', 'elegant_gold.jpg', 499.99, 'Men'),

    -- Women's Watches
    ('Rose Blossom', 'A delicate watch with a rose gold finish.', 'rose_blossom.jpg', 249.99, 'Women'),
    ('Minimalist Silver', 'A sleek, minimalist silver watch.', 'minimalist_silver.jpg', 179.99, 'Women'),
    ('Pearl Elegance', 'A classy watch with a pearl-inlaid dial.', 'pearl_elegance.jpg', 399.99, 'Women');
