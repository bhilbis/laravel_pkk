require('./bootstrap');
window.axios = require('axios'); // Menambahkan ini untuk memastikan Axios dapat diakses secara global

    function updateQuantity(productId, action) {
        axios.post(`/cart/update-quantity/${productId}`, { action: action })
            .then(response => {
                location.reload(); // Muat ulang halaman setelah update
            })
            .catch(error => {
                console.error('Error updating quantity:', error);
            });
    }
    
    function removeProduct(productId) {
        axios.post(`/cart/remove-product/${productId}`)
            .then(response => {
                location.reload(); // Muat ulang halaman setelah menghapus
            })
            .catch(error => {
                console.error('Error removing product:', error);
            });
    }
