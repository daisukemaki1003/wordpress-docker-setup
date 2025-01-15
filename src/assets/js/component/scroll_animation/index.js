export const defaultAnime = ({ target }) => {
    target.animate({ opacity: [0, 1] }, { duration: 600, easing: 'cubic-bezier(0.55, 0, 1, 0.45)', fill: 'forwards' });
    target.animate([{ transform: 'translateY(50px)' }, { transform: 'translateY(0)' }], {
        duration: 1000,
        easing: 'cubic-bezier(0.16, 1, 0.3, 1)',
        delay: 100,
    });
};
export class scrollAnimations {
    config;
    constructor() {
        this.config = {
            root: null,
            rootMargin: '-10% 0px',
            thresholds: [0],
        };
    }
    createObserver(option) {
        const ob = new IntersectionObserver((en) => {
            for (const e of en) {
                const { isIntersecting, target } = e;
                if (isIntersecting) {
                    if (option.animation)
                        option.animation(e);
                    else
                        defaultAnime(e);
                    if (!option.infinite)
                        ob.unobserve(target);
                }
            }
        }, { ...this.config, ...option.config });
        return ob;
    }
    add(el, option = {}) {
        const ob = this.createObserver(option);
        if (el instanceof HTMLElement)
            ob.observe(el);
        else
            for (const e of Array.from(el))
                ob.observe(e);
    }
}
export default scrollAnimations;
