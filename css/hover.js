document.addEventListener('DOMContentLoaded', () => {
    const images = document.querySelectorAll('.images');
    const largeImage = document.getElementById('largeImage');

    images.forEach(image => {
        // On mouseover, apply the hover effect
        image.addEventListener('mouseover', () => {
            image.style.transition = 'transform 0.3s ease, box-shadow 0.3s ease, border 0.3s ease';
            image.style.transform = 'scale(1.50) rotate(3deg)'; bv// Enlarge and rotate
            image.style.boxShadow = '0 8px 16px rgba(0, 0, 0, 0.3)'; // Add shadow
            image.style.border = '3px solid #3498db'; // Add blue border
        });

        // On mouseout, remove the hover effect
        image.addEventListener('mouseout', () => {
            image.style.transform = 'scale(1) rotate(0deg)'; // Reset size and rotation
            image.style.boxShadow = 'none'; // Remove shadow
            image.style.border = 'none'; // Remove border
        });

        image.addEventListener('click', () => {
            const largeSrc = `../images/${image.id}.png`; // Get the large image id from the image name
            largeImage.src = largeSrc; // Update the large image source
        }); 
    });

    
});



