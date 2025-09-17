new WOW().init();
  var swiper = new Swiper(".eventSlider", {
    slidesPerView: 3,
    centeredSlides: true,
    loop: true,
    spaceBetween: 20,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true
    },
    breakpoints: {
      0: { slidesPerView: 1 },
      576: { slidesPerView: 2 },
      768: { slidesPerView: 3 },
      992: { slidesPerView: 3 }
    }
  });


const header = document.getElementById("mainHeader");
    const stickyPoint = header.offsetTop; // distance from top
    window.addEventListener("scroll", () => {
      if (window.scrollY > stickyPoint) {
        header.classList.add("fixed");
      } else {
        header.classList.remove("fixed");
      }
});




// Rotate chevron icon on mobile collapse open/close
  $('.feature-header.d-md-none').on('click', function() {
    const icon = $(this).find('.rotate');
    const target = $($(this).data('target'));
    target.on('shown.bs.collapse', function() { icon.addClass('open'); });
    target.on('hidden.bs.collapse', function() { icon.removeClass('open'); });
  });

  
  Fancybox.bind("[data-fancybox]", {
    Thumbs: {
      autoStart: false
    }
  });

  document.querySelectorAll('.filter-buttons button').forEach(button => {
    button.addEventListener('click', function() {
      // Remove active class from all buttons
      document.querySelectorAll('.filter-buttons button').forEach(btn => btn.classList.remove('active'));
      this.classList.add('active');

      const filterValue = this.getAttribute('data-filter');
      document.querySelectorAll('.grid-item').forEach(item => {
        if (filterValue === 'all' || item.classList.contains(filterValue)) {
          item.style.display = 'block';
        } else {
          item.style.display = 'none';
        }
      });
    });
  });

  