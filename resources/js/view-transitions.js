//Followed tutorial created by: Tyler Potts
//link: https://www.youtube.com/watch?v=ckJ7gdIeebc&t=780s
window.onload = () => {
    const transition_el = document.querySelector('.transition');
    const anchors = document.querySelectorAll('a');
    const animation_time = 200; //in ms
    setTimeout(() => {
        transition_el.classList.remove('is-active');
    }, animation_time);

    for (let i = 0; i < anchors.length; i++) {
        const anchor = anchors[i];
        anchor.addEventListener('click', e => {
            e.preventDefault();
            let target = e.target.href;

            transition_el.classList.add('is-active');

            setTimeout(() => {
                window.location.href = target;
            }, animation_time);
        });
    }
}