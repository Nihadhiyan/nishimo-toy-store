// Category Button Working
document.addEventListener("DOMContentLoaded", () => {
  const categoriesButton = document.querySelector(".categoriesButton");
  const sidebar = document.querySelector(".side-bar");
  const body = document.querySelector("body");

  if (categoriesButton && sidebar && body) {
    body.style.transition = "all ease-in-out 0.3s";

    categoriesButton.addEventListener("click", () => {
      sidebar.classList.toggle("open");

      if (!sidebar.classList.contains("open")) {
        body.style.paddingTop = "0";
        body.style.paddingLeft = "0";
      } else {
        body.style.paddingTop = "60px";
        body.style.paddingLeft = "332px";
      }
    });
  }

  const addToCartButtons = document.querySelectorAll(".addToCartButton");

  addToCartButtons.forEach((button) => {
    button.addEventListener("click", () => {
      const productCard = button.closest(".product-card");

      const productName = productCard.querySelector(".product-name").innerText;
    });
  });
});
