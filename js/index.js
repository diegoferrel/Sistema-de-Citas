window.addEventListener("load",()=>{
    document.querySelectorAll(".nosotros").forEach(nosotros =>{
        nosotros.classList.add("fade")

    }) 
})

const servicios = document.querySelectorAll('.serviciosSpec .fade-in');

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            servicios.forEach((el, index) => {
                el.style.transitionDelay = `${index * 0.15}s`;
                el.classList.add('visible');
            });
            observer.disconnect();
        }
    });
}, {
    threshold: 0.3
});

servicios.forEach(el => observer.observe(el));
