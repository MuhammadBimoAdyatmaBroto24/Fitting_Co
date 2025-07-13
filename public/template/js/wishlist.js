document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.wishlist-toggle').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const productSlug = this.dataset.productSlug;
            const url = `/wishlist/${productSlug}`;
            const isAdding = !this.classList.contains('active'); // Check if currently active (meaning it's in wishlist)

            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    if (isAdding) {
                        this.classList.add('active');
                        alert('Product added to wishlist!');
                    } else {
                        this.classList.remove('active');
                        alert('Product removed from wishlist!');
                    }
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while updating wishlist.');
            });
        });
    });
});
