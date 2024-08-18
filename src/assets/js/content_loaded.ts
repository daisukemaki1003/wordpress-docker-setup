import scrollAnimations from './component/scroll_animation'
import anime from './component/anime'

export default () => {
    new scrollAnimations().add(document.querySelectorAll('[data-anim-elm]'))
    anime()
}