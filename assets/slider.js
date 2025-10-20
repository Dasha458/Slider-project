class SliderJS {
    constructor(selector) {
        this.container = document.querySelector(selector);
        
        if (!this.container) return;

        this.slidesWrapper = this.container.querySelector('.slides');
        this.slides = this.slidesWrapper ? this.slidesWrapper.querySelectorAll('img.slide') : [];

        if (this.slides.length === 0) {
            return;
        }

        this.index = 0;

        this.prevBtn = this.container.querySelector('.prev');
        this.nextBtn = this.container.querySelector('.next');
        
        this.slides.forEach((slide, i) => {
            slide.classList.remove('active');
            if (i === this.index) {
                slide.classList.add('active');
            }
        });

        this.addEventListeners();
    }

    addEventListeners() {
        if (this.nextBtn) {
            this.nextBtn.addEventListener('click', () => this.next());
        }
        if (this.prevBtn) {
            this.prevBtn.addEventListener('click', () => this.prev());
        }
    }

    next() {
        this.index = (this.index + 1) % this.slides.length;
        this.updateSlide();
    }

    prev() {
        this.index = (this.index - 1 + this.slides.length) % this.slides.length;
        this.updateSlide();
    }

    updateSlide() {
        this.slides.forEach(slide => slide.classList.remove('active'));
        this.slides[this.index].classList.add('active');
    }
}

window.addEventListener("load", () => {
    const slider = new SliderJS('#main-slider');
});