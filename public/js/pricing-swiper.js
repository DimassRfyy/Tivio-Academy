const swiper = new Swiper('.swiper', {
    spaceBetween: 20,
    slidesOffsetAfter: 20,
    slidesOffsetBefore: 20,
    slidesPerView: "auto",
    autoplay: {
        delay: 3500,
        disableOnInteraction: false,
    },
    centerInsufficientSlides: true,
    loop: true,
});