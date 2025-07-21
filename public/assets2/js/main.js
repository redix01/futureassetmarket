// Sidebar Toggle
var el = document.getElementById("wrapper");
var toggleButton = document.getElementById("menu-toggle");

toggleButton.onclick = function () {
  el.classList.toggle("toggled");
};

// Sidebar Dropdown toggle
document.addEventListener("DOMContentLoaded", function () {
  // Handle stock dropdown toggle
  const stockDropdownToggle = document.querySelector('.stock-dropdown-toggle');
  if (stockDropdownToggle) {
    stockDropdownToggle.addEventListener("click", function (e) {
      e.preventDefault();
      const submenu = document.getElementById('stockSubmenu');
      const isExpanded = this.getAttribute('aria-expanded') === 'true';
      
      if (isExpanded) {
        // Close the dropdown
        this.setAttribute('aria-expanded', 'false');
        submenu.classList.remove('show');
        submenu.style.maxHeight = '0';
        submenu.style.opacity = '0';
      } else {
        // Open the dropdown
        this.setAttribute('aria-expanded', 'true');
        submenu.classList.add('show');
        submenu.style.maxHeight = submenu.scrollHeight + 'px';
        submenu.style.opacity = '1';
      }
    });
  }

  // Handle other sidebar dropdowns
  document.querySelectorAll(".sidebar .nav-link:not(.stock-dropdown-toggle)").forEach(function (element) {
    element.addEventListener("click", function (e) {
      let nextEl = element.nextElementSibling;
      let parentEl = element.parentElement;
      if (nextEl && nextEl.classList.contains('collapse')) {
        e.preventDefault();
        let mycollapse = new bootstrap.Collapse(nextEl);

        if (nextEl.classList.contains("show")) {
          mycollapse.hide();
        } else {
          mycollapse.show();
          // find other submenus with class=show
          var opened_submenu =
            parentEl.parentElement.querySelector(".submenu.show");
          // if it exists, then close all of them
          if (opened_submenu) {
            new bootstrap.Collapse(opened_submenu);
          }
        }
      }
      if (nextEl && nextEl.classList.contains("show")) {
        element.classList.add("opened");
      } else {
        element.classList.remove("opened");
      }
    });
  });

  // Handle active state for stock dropdown parent
  const stockSubmenu = document.getElementById('stockSubmenu');
  if (stockSubmenu) {
    const activeSubmenuItem = stockSubmenu.querySelector('.nav-link.active');
    if (activeSubmenuItem) {
      const stockDropdownToggle = document.querySelector('.stock-dropdown-toggle');
      if (stockDropdownToggle) {
        stockDropdownToggle.classList.add('active');
        stockDropdownToggle.setAttribute('aria-expanded', 'true');
        stockSubmenu.classList.add('show');
        stockSubmenu.style.maxHeight = stockSubmenu.scrollHeight + 'px';
        stockSubmenu.style.opacity = '1';
      }
    }
  }
});

// Get Current Date
const currentDate = new Date();
const formattedDate = currentDate.toLocaleDateString("en-US", {
  month: "short",
  day: "numeric",
  year: "numeric",
});
const dateSpan = document.getElementById("date");
if (dateSpan) {
  dateSpan.innerHTML = formattedDate;
}

$(document).ready(function () {
  $("#select").niceSelect();
});

// Checkbox check all box
let checkbox = document.getElementById("select_all");
if (checkbox) {
  checkbox.addEventListener("change", function () {
    let allcheckbox = document.querySelectorAll(".check");
    for (let checkbox of allcheckbox) {
      checkbox.checked = this.checked;
    }
  });
}

// OTP input
const inputs = document.querySelectorAll(".otp-input");
if (inputs) {
  for (let i = 0; i < inputs.length; i++) {
    inputs[i].addEventListener("input", function () {
      if (this.value.length === this.maxLength) {
        if (i < inputs.length - 1) {
          inputs[i + 1].focus();
        } else {
          inputs[i].blur();
        }
      }
    });
  }
}
