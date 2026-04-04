/*global dotclear */
'use strict';

dotclear.ready(() => {
  const msc = dotclear.getData('media-size-class');

  const posts = document.querySelectorAll('article.post, div.post');
  for (const post of posts) {
    for (const code of Object.entries(msc.list)) {
      const [key, value] = code;
      for (const type of msc.types) {
        const images = post.querySelectorAll(`img[src$="_${key}.${type}" i]`);
        for (const image of images) {
          image.classList.add(`${value}-img`);
        }
      }
    }
  }
});
