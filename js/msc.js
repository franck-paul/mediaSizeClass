window.addEventListener('load', () => {
  const posts = document.querySelectorAll('article.post, div.post');
  for (const post of posts) {
    const sizes = [
      ['t', 'thumbnail'],
      ['sq', 'square'],
      ['s', 'small'],
      ['m', 'medium'],
    ];
    const types = ['jpg', 'jpeg', 'png', 'webp', 'avif'];
    for (const size of sizes) {
      const [key, value] = size;
      for (const type of types) {
        const pattern = `img[src$="_${key}.${type}"]`;
        const images = post.querySelectorAll(pattern);
        for (const image of images) {
          image.classList.add(`${value}-img`);
        }
      }
    }
  }
});
