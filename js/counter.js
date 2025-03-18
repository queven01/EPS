function animateCountUp(element, start, end, duration) {
    let startTime = null;
    const step = (timestamp) => {
        if (!startTime) startTime = timestamp;
        const progress = Math.min((timestamp - startTime) / duration, 1);
        const currentNumber = Math.floor(progress * (end - start) + start);
        element.textContent = currentNumber.toLocaleString(); // Format with commas
        if (progress < 1) {
            requestAnimationFrame(step);
        } else {
            element.textContent = end.toLocaleString(); // Ensure exact final number
        }
    };
    requestAnimationFrame(step);
}

// Detect when elements come into view
function handleIntersection(entries, observer) {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            const el = entry.target;
            const targetNumber = parseInt(el.dataset.count, 10);
            animateCountUp(el, 0, targetNumber, 2000); // 2000ms duration
            observer.unobserve(el); // Stop observing after animation
        }
    });
}

// Observe elements with class "count-up"
document.addEventListener("DOMContentLoaded", () => {
    const observer = new IntersectionObserver(handleIntersection, { threshold: 0.5 });
    document.querySelectorAll(".count-up").forEach((el) => {
        observer.observe(el);
    });
});
