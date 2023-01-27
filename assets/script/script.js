setTimeout(function() {
    let imgArticle = document.querySelectorAll('.imgArticle');
    
    let imgCarousel1 = document.querySelector('.imgCarousel1');
    let imgCarousel2 = document.querySelector('.imgCarousel2');
    let imgCarousel3 = document.querySelector('.imgCarousel3');
    
    imgCarousel1.src = imgArticle[0].currentSrc;
    imgCarousel2.src = imgArticle[1].currentSrc;
    imgCarousel3.src = imgArticle[2].currentSrc;

let linkArticle = document.querySelectorAll('.title');


    let linkCarousel1 = document.querySelector('.linkCarousel1');
    let linkCarousel2 = document.querySelector('.linkCarousel2');
    let linkCarousel3 = document.querySelector('.linkCarousel3');

    linkCarousel1.href = linkArticle[0].href;
    linkCarousel1.innerHTML = linkArticle[0].innerHTML;

    linkCarousel2.href = linkArticle[1].href;
    linkCarousel2.innerHTML = linkArticle[1].innerHTML;

    linkCarousel3.href = linkArticle[2].href;
    linkCarousel3.innerHTML = linkArticle[2].innerHTML;

}, 500);

