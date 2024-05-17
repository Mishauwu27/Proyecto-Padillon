document.addEventListener('DOMContentLoaded', function () {
    if (document.getElementById('product-list')) {
        fetch('php/fetch_products.php')
            .then(response => response.json())
            .then(products => {
                const productList = document.getElementById('product-list');
                products.forEach(product => {
                    const productElement = document.createElement('div');
                    productElement.className = 'product';
                    productElement.innerHTML = `
                        <img src="${product.image_url}" alt="${product.name}">
                        <h3>${product.name}</h3>
                        <p>${product.description}</p>
                        <p>$${product.price}</p>
                    `;
                    productList.appendChild(productElement);
                });
            });
    }
});
