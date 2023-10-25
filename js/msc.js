window.addEventListener('load', () => {
  document.querySelectorAll('article.post, div.post').forEach((element) => {
    const sizes = {
      t: 'thumbnail',
      sq: 'square',
      s: 'small',
      m: 'medium',
    };
    const types = ['jpg', 'png', 'webp', 'avif'];

    Object.entries(sizes).forEach((size) => {
      const [key, value] = size;
      types.forEach((type) => {
        const pattern = `img[src$=\"_${key}.${type}\"]`;
        const images = element.querySelectorAll(pattern);
        if (images.length) {
          images.forEach((image) => {
            image.classList.add(`${value}-img`);
          });
        }
      });
    });
  });
});
