let hamburgerButton = document.querySelector(".hamburger");
let ul = document.querySelector(".navlink");

hamburgerButton.addEventListener("click", function () {
  if (ul.classList.contains("hidden")) {
    ul.classList.remove("hidden");
  } else {
    ul.classList.add("hidden");
  }
});






const scrollToTopBtn = document.getElementById("scrollToTopBtn");

window.addEventListener("scroll", function () {
  const progressBar = document.querySelector(".progress");

  const contentHeight = document.body.scrollHeight - window.innerHeight;
  const scrolled = window.pageYOffset || document.documentElement.scrollTop;
  const progress = scrolled / contentHeight;

  scrollToTopBtn.style.display = progress > 0.1 ? "block" : "none";

  progressBar.style.width = progress * 100 + "%";
});

scrollToTopButton.addEventListener("click", function () {
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
});
