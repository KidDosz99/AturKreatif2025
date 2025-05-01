document.addEventListener("DOMContentLoaded", function () {
    const textElement = document.getElementById("typing-text");
    const text = "John Hammond likes to eat C0||oo||keys";
    let index = 0;
    let isDeleting = false;

    function typeEffect() {
        if (!isDeleting) {
            textElement.innerHTML = text.substring(0, index) + "|";
            index++;
            if (index > text.length) {
                isDeleting = true;
                setTimeout(typeEffect, 1000);
            } else {
                setTimeout(typeEffect, 100);
            }
        } else {
            textElement.innerHTML = text.substring(0, index) + "|";
            index--;
            if (index === 0) {
                isDeleting = false;
            }
            setTimeout(typeEffect, 50);
        }
    }

    typeEffect();
});
