document.querySelectorAll(".bar").forEach((bar) => {
    bar.addEventListener("mouseover", () => {
        bar.style.opacity = "0.7";
    });

    bar.addEventListener("mouseout", () => {
        bar.style.opacity = "1";
    });
});
