document.addEventListener('DOMContentLoaded', () => {

  /* ===================================================
     STICKY NAVBAR
  =================================================== */
  const navbar = document.getElementById('navbar');

  window.addEventListener('scroll', () => {
    if (window.scrollY > 40) {
      navbar.style.boxShadow = '0 2px 20px rgba(0,0,0,0.1)';
      navbar.style.padding = '0';
    } else {
      navbar.style.boxShadow = '0 2px 15px rgba(0,0,0,0.05)';
    }
  });

  /* ===================================================
     MOBILE NAVIGATION
  =================================================== */
  const hamburger = document.getElementById('hamburger');
  const navMenu = document.getElementById('navMenu');
  const navLinks = document.querySelectorAll('.nav-link');

  hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('active');
    navMenu.classList.toggle('active');
  });

  navLinks.forEach(link => {
    link.addEventListener('click', () => {
      hamburger.classList.remove('active');
      navMenu.classList.remove('active');
    });
  });

  /* ===================================================
     SMOOTH SCROLL
  =================================================== */
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      const targetId = this.getAttribute('href');
      const target = document.querySelector(targetId);
      if (target) {
        e.preventDefault();
        const offset = 80;
        const top = target.getBoundingClientRect().top + window.pageYOffset - offset;
        window.scrollTo({ top, behavior: 'smooth' });
      }
    });
  });

  /* ===================================================
     REVEAL ON SCROLL
  =================================================== */
  const revealEls = document.querySelectorAll('.reveal');

  const revealObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('active');
        revealObserver.unobserve(entry.target);
      }
    });
  }, {
    threshold: 0.15,
    rootMargin: '0px 0px -50px 0px'
  });

  revealEls.forEach(el => revealObserver.observe(el));

  /* ===================================================
     ACCORDION FAQ
  =================================================== */
  const accordionItems = document.querySelectorAll('.accordion-item');

  accordionItems.forEach(item => {
    const header = item.querySelector('.accordion-header');
    const content = item.querySelector('.accordion-content');

    header.addEventListener('click', () => {
      const isActive = item.classList.contains('active');

      // close all
      accordionItems.forEach(other => {
        other.classList.remove('active');
        other.querySelector('.accordion-content').style.maxHeight = null;
        other.querySelector('.accordion-icon').textContent = '+';
      });

      // open clicked one if it wasn't already open
      if (!isActive) {
        item.classList.add('active');
        content.style.maxHeight = content.scrollHeight + 'px';
        item.querySelector('.accordion-icon').textContent = '×';
      }
    });
  });

  /* ===================================================
     BACK TO TOP
  =================================================== */
  const backToTop = document.getElementById('backToTop');

  window.addEventListener('scroll', () => {
    if (window.scrollY > 400) {
      backToTop.classList.add('show');
    } else {
      backToTop.classList.remove('show');
    }
  });

  backToTop.addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });

  /* ===================================================
     RATING PRODUK (KLIK BINTANG DI PRODUCT CARD)
  =================================================== */
  const rateWidgets = document.querySelectorAll('.rate-stars');

  function paintStars(widget, value) {
    widget.querySelectorAll('span').forEach(star => {
      star.classList.toggle('active', Number(star.dataset.value) <= value);
    });
  }

  function lockWidget(widget, infoEl, average, count, justVoted) {
    widget.classList.add('voted');
    paintStars(widget, Math.round(average));
    infoEl.textContent = justVoted
      ? `Terima kasih! Rata-rata ${average} (${count} rating)`
      : `Rata-rata ${average} dari ${count} rating`;
  }

  async function loadAverage(widget, infoEl, produk) {
    try {
      const res = await fetch('/api/product-rating');
      const result = await res.json();
      if (result.success) {
        const found = result.data.find(item => item.produk === produk);
        if (found) {
          paintStars(widget, Math.round(found.average));
          infoEl.textContent = `Rata-rata ${found.average} dari ${found.count} rating`;
        }
      }
    } catch (err) {
      console.error(err);
    }
  }

  rateWidgets.forEach(widget => {
    const produk = widget.dataset.produk;
    const infoEl = widget.nextElementSibling; // <p class="rate-info">
    const storageKey = 'nauliwear_product_rated_' + produk;
    const stars = Array.from(widget.querySelectorAll('span'));

    // kalau browser ini udah pernah kasih rating buat produk ini, kunci widgetnya
    const alreadyVoted = localStorage.getItem(storageKey);

    loadAverage(widget, infoEl, produk).then(() => {
      if (alreadyVoted) {
        widget.classList.add('voted');
      }
    });

    if (alreadyVoted) return;

    stars.forEach(star => {
      star.addEventListener('mouseenter', () => {
        if (!widget.classList.contains('voted')) {
          paintStars(widget, Number(star.dataset.value));
        }
      });

      star.addEventListener('click', async () => {
        if (widget.classList.contains('voted')) return;

        const value = Number(star.dataset.value);
        widget.classList.add('voted'); // cegah klik dobel selagi request jalan

        try {
          const res = await fetch('/api/product-rating', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ produk, rating: value })
          });
          const result = await res.json();

          if (result.success) {
            localStorage.setItem(storageKey, String(value));
            const avgRes = await fetch('/api/product-rating');
            const avgResult = await avgRes.json();
            const found = avgResult.success
              ? avgResult.data.find(item => item.produk === produk)
              : null;
            lockWidget(widget, infoEl, found ? found.average : value, found ? found.count : 1, true);
          } else {
            widget.classList.remove('voted');
            infoEl.textContent = result.message || 'Gagal mengirim rating.';
          }
        } catch (err) {
          console.error(err);
          widget.classList.remove('voted');
          infoEl.textContent = 'Gagal menghubungi server, coba lagi.';
        }
      });
    });
  });

});
