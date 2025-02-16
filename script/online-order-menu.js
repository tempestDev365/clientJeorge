const menuData = [
    {
        category: "Starter",
        name: "MEXICAN BEEF NACHOS",
        description: "nacho chips, angus beef, cheese, pico de gallo, sour cream",
        price: 395
    },
    {
        category: "Starter",
        name: "STEAK FAJITAS",
        description: "USDA Ribeye, bell pepper, onion, tortilla, aioli, salsa",
        price: 425
    },
    {
        category: "Starter",
        name: "CHICKEN QUESADILLA",
        description: "tortilla, cheddar, mozzarella, chicken, mexican spices, salsa, cheese dip",
        price: 295
    },
    {
        category: "Starter",
        name: "MOZZARELLA STICKS",
        description: "mozzarella, bread crumbs, salsa",
        price: 315
    },
    {
        category: "Starter",
        name: "FISH AND CHIPS",
        description: "pacific dory, coated fries, tartar sauce",
        price: 365
    },
    {
        category: "Starter",
        name: "CRISPY FRIED ENOKI MUSHROOM",
        description: "enoki mushrooms, togarashi, sriracha",
        price: 335
    },
    {
        category: "Salad",
        name: "BURRATA PROSCIUTTO SALAD",
        description: "burrata, prosciutto crudo, rocket arrugula, balsamic glaze",
        price: 565
    },
    {
        category: "Salad",
        name: "CAESAR SALAD",
        description: "romaine lettuce, grilled chicken, poached egg, bacon, croutons, parmesan",
        price: 355
    },
    {
        category: "Salad",
        name: "CAPRESE SALAD",
        description: "fresh mozzarella, tomatoes, basil, olive oil, balsamic glaze",
        price: 375
    },
    {
        category: "Salad",
        name: "MANGO SUMMER SALAD",
        description: "mixed leaf lettuce, mango, cherry tomatoes,cucumber, mango dressing",
        price: 355
    },
    {
        category: "Solo",
        name: "USDA TENDERLOIN",
        description: "200g USDA Angus",
        price: 775
    },
    {
        category: "Solo",
        name: "USDA CHOICE ANGUS FLAT IRON",
        description: "200g | USDA Choice Angus",
        price: 775
    },
    {
        category: "Solo",
        name: "SLOW ROASTED US ANGUS BEEF",
        description: "8-hour slow cooked US Angus beef",
        price: 565
    },
    {
        category: "Main",
        name: "SLOW ROASTED US ANGUS BEEF",
        description: "8-hour slow cooked US Angus beef, mashed potatoes, french beans, cherry tomatoes, madagascar sauce",
        price: 835
    },
    {
        category: "Main",
        name: "OVEN BAKED BBQ BABY BACK RIBS",
        description: "4-hour oven baked baby back ribs, skillet corn medley, mashed potatoes, smoked bbq sauce",
        price: 645
    },
    {
        category: "Main",
        name: "GARLIC BRAISED ANGUS BEEF SHORT RIBS",
        description: "USDA Angus Choice Short ribs, kin, spiced maple, garlic confit, french beans, cherry tomato",
        price: 1345
    },
    {
        category: "Main",
        name: "HONEY SOY NORWEGIAN SALMON",
        description: "Norwegian salmon, mashed potatoes, honey soy glaze",
        price: 735
    },
    {
        category: "Main",
        name: "GRILLED PORK CHOPS IN CHIMICHURRI",
        description: "bone in pork chops, parsley, oregano, red wine, peppers, vinegar, olive oil, vegetable kebab",
        price: 585
    },
    {
        category: "Main",
        name: "CHICKEN FLORENTINE ROULADE",
        description: "chicken, spinach, cheddar, mozzarella, cream sauce ",
        price: 1345
    },
    {
        category: "Pizza",
        name: "PROSCIUTTO ARUGULA PIZZA",
        description: "stone-baked 10-inch pizza Napoletana, tomato sauce, mozzarella, prosciutto, arugula",
        price: 455
    },
    {
        category: "Pizza",
        name: "QUATTRO FORMAGGI PIZZA",
        description: "stone-baked 10-inch pizza Napoletana, tomato sauce, mozzarella, gouda, parmesan, gorgonzola",
        price: 455
    },
    {
        category: "Pizza",
        name: "PEPPERONI PIZZA",
        description: "stone-baked 10-inch pizza Napoletana, tomato sauce, mozzarella, salami piccante",
        price: 435
    },

    {
        category: "Pasta",
        name: "TRUFFLE CREAM PASTA",
        description: "truffle, heavy cream, parmesan",
        price: 375
    },
    {
        category: "Pasta",
        name: "SPAGHETTI AL TARTUFO ",
        description: "mushrooms, parmesan, black truffle sauce",
        price: 395
    },
    {
        category: "Pasta",
        name: "GRILLED CHICKEN PESTO",
        description: "chicken, basil, pine nuts, garlic",
        price: 385
    },
    {
        category: "Pasta",
        name: "CREAMY SEAFOOD PASTA",
        description: "shrimp, scallops, squid, parmesan, béchamel sauce",
        price: 415
    },
    {
        category: "Pasta",
        name: "GOCHUJANG PASTA",
        description: "angus beef strips, gochujang paste",
        price: 385
    },
    {
        category: "Dessert",
        name: "CEREAL TRES LECHES",
        description: "cereal, condensed milk, evaporated milk, full cream milk",
        price: 280
    },
    {
        category: "Dessert",
        name: "TIRAMISU",
        description: "lady fingers, mascarpone, eggs, coffee, cocoa",
        price: 230
    },
    {
        category: "Dessert",
        name: "AFFOGATO AL CAFFE",
        description: "espresso, vanilla ice cream",
        price: 180
    },
    {
        category: "Dessert",
        name: "RED VELVET",
        description: "egg, flour, sugar, butter, vanilla, milk, cream cheese, lemon",
        price: 165
    },

];

let cartCount = localStorage.getItem("cart-count") ? parseInt(localStorage.getItem("cart-count")) : 0;
document.getElementById("cart-count").textContent = cartCount;
updateCheckoutButton();


// Retrieve saved cart from local storage or initialize an empty cart
let cart = JSON.parse(localStorage.getItem("cart")) || [];
let subtotal = 0;

// Function to generate the menu dynamically
function generateMenu() {
    const menuContainer = document.getElementById("menu-list");
    menuContainer.innerHTML = "";

    // Get unique categories
    const categories = [...new Set(menuData.map(item => item.category))];

    categories.forEach(category => {
        // Create category title
        const categoryTitle = document.createElement("h2");
        categoryTitle.textContent = category;
        menuContainer.appendChild(categoryTitle);

        // Create a container for the menu items
        const itemsContainer = document.createElement("div");
        itemsContainer.classList.add("menu-items");

        // Display items for each category
        menuData.filter(item => item.category === category).forEach(item => {
            const menuItem = document.createElement("div");
            menuItem.classList.add("menu-card");

            menuItem.innerHTML = `
                        <div>
                            <h3>${item.name}</h3>
                            <p>${item.description}</p>
                            <div class="price">${item.price}</div>
                        </div>
                        <button class="add-btn" onclick="addToCart('${item.name}', ${item.price})">+</button>
                    `;

            itemsContainer.appendChild(menuItem);
        });

        menuContainer.appendChild(itemsContainer);
    });
}

// Function to add items to the cart
function addToCart(name, price) {
    let existingItem = cart.find(item => item.name === name);
    if (existingItem) {
        existingItem.quantity++

    } else {
        cart.push({ name, price, quantity: 1 });
    }
    cartCount++;
    document.getElementById("cart-count").textContent = cartCount;
    updateCheckoutButton();
    saveCart();
    updateCart();
}


// Function to remove items from the cart
function removeFromCart(index) {
    if (cart[index].quantity > 1) {
        cart[index].quantity--; // Reduce quantity

    } else {
        cart.splice(index, 1); // Remove item if quantity is 1
    }

    if (cartCount == 0) {
        cartCount = 0;
    } else {
        cartCount--;
        document.getElementById("cart-count").textContent = cartCount;

    }
    updateCheckoutButton();
    saveCart();
    updateCart();
}


// Function to update the cart UI
function updateCart() {
    const cartContainer = document.getElementById("cart-items");
    cartContainer.innerHTML = "";
    subtotal = 0;

    cart.forEach((item, index) => {
        subtotal += item.price * item.quantity;
        const cartItem = document.createElement("h1");
        cartItem.classList.add("cart-item");

        cartItem.innerHTML = `
            <div class="item-name">${item.name}</div>
            <div class="item-price">${item.price}</div>
            
            <div class="item-quantity">
            <button onclick="removeFromCart(${index})">-</button>
            <span class="quantity">${item.quantity}</span>
            <button onclick="addToCart('${item.name}', ${item.price})">+</button>
            </div>
        `;

        cartContainer.appendChild(cartItem);

    });

    // Update subtotal and total price (including service charge)
    console.log(cartCount);
    document.getElementById("subtotal-price").textContent = subtotal;
    // document.getElementById("total-price").textContent = subtotal + serviceCharge;
}

// Function to save the cart in local storage
function saveCart() {
    localStorage.setItem("cart", JSON.stringify(cart));
    localStorage.setItem("cart-count", cartCount);
}


// Function to handle checkout
function checkout() {
    if (cart.length === 0) {
        alert("Your cart is empty!");
        return;
    }
    alert(`Order placed successfully! Total: ${subtotal + serviceCharge}`);
  
    saveCart();
    updateCart();
}


function updateCheckoutButton() {
    const checkoutBtn = document.getElementById("checkout-btn");
    checkoutBtn.disabled = cartCount === 0;
}

// Initialize menu and cart display
generateMenu();
updateCart();