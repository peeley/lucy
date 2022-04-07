//Followed tutorial created by: Tyler Potts
//link: https://www.youtube.com/watch?v=ckJ7gdIeebc&t=780s
window.onload = () => {
    pageTransition();
}

function pageTransition(){
    const transition_el = document.querySelector('.transition');
    const anchors = document.querySelectorAll('a');
    const animation_time = 100; //in ms
    setTimeout(() => {
        transition_el.classList.remove('is-active');
    }, animation_time);

    anchors.forEach( anchor => {
        anchor.addEventListener('click', e => {
            e.preventDefault();
            let target = e.target.href;
            transition_el.classList.add('is-active');
            setTimeout(() => {
                window.location.href = target;
            }, animation_time);
        });
    })
}