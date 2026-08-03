/**
 * Quantum Infoway — Home interactions
 */
(function () {
  "use strict";

  var reducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  var header = document.getElementById("siteHeader");
  var nav = document.getElementById("mainNav");
  var navToggle = document.getElementById("navToggle");
  var navLinks = document.querySelectorAll(".nav-link");

  /* ---------- Premium page loader ---------- */
  var loader = document.getElementById("pageLoader");
  var revealReady = false;
  var startReveals = null;

  function finishLoader() {
    document.body.classList.remove("is-loading");
    document.body.classList.add("is-loaded");
    document.documentElement.classList.remove("preload");
    if (loader) {
      loader.classList.add("is-done");
      setTimeout(function () {
        if (loader && loader.parentNode) loader.parentNode.removeChild(loader);
      }, 600);
    }
    if (typeof startReveals === "function" && !revealReady) {
      revealReady = true;
      startReveals();
    }
  }

  if (reducedMotion || !loader) {
    finishLoader();
  } else {
    var loaderStart = performance.now();
    var minShow = 900;
    var hide = function () {
      var elapsed = performance.now() - loaderStart;
      var wait = Math.max(0, minShow - elapsed);
      setTimeout(finishLoader, wait);
    };
    if (document.readyState === "complete") {
      hide();
    } else {
      window.addEventListener("load", hide);
      setTimeout(hide, 2200);
    }
  }

  /* Sticky header glass on scroll */
  function onScrollHeader() {
    if (!header) return;
    header.classList.toggle("scrolled", window.scrollY > 24);
  }
  window.addEventListener("scroll", onScrollHeader, { passive: true });
  onScrollHeader();

  /* Mobile nav */
  if (navToggle && nav) {
    navToggle.addEventListener("click", function () {
      var open = nav.classList.toggle("open");
      navToggle.setAttribute("aria-expanded", open ? "true" : "false");
    });

    nav.querySelectorAll("a").forEach(function (link) {
      link.addEventListener("click", function () {
        nav.classList.remove("open");
        navToggle.setAttribute("aria-expanded", "false");
      });
    });
  }

  /* Active nav by section */
  var sections = document.querySelectorAll("main section[id]");
  function updateActiveNav() {
    var current = "";
    var offset = (header ? header.offsetHeight : 80) + 40;
    sections.forEach(function (section) {
      if (window.scrollY >= section.offsetTop - offset) {
        current = section.id;
      }
    });
    navLinks.forEach(function (link) {
      var href = link.getAttribute("href") || "";
      link.classList.toggle("active", href === "#" + current);
    });
  }
  window.addEventListener("scroll", updateActiveNav, { passive: true });
  updateActiveNav();

  /* Side scroll rail */
  var rail = document.getElementById("scrollRail");
  var railDots = document.getElementById("scrollRailDots");
  var railFill = document.getElementById("scrollRailFill");
  var railLabels = {
    home: "Home",
    trust: "Trust",
    services: "Build",
    "ai-services": "AI",
    "support-services": "Support",
    portfolio: "Work",
    tech: "Tech",
    reviews: "Reviews",
    "why-us": "Why Us",
    contact: "Contact",
    "contact-hero": "Home",
    consultation: "Consult",
    "contact-form": "Form",
    "service-hero": "Home",
    difference: "Compare",
    process: "Process",
    capabilities: "Build",
    stack: "Stack",
    work: "Work",
    guide: "Guide",
    faq: "FAQ",
    "service-cta": "CTA",
  };

  if (rail && railDots && sections.length) {
    sections.forEach(function (section) {
      var id = section.id;
      var btn = document.createElement("button");
      btn.type = "button";
      btn.className = "scroll-rail-dot";
      btn.setAttribute("data-section", id);
      btn.setAttribute("data-label", railLabels[id] || id);
      btn.setAttribute("aria-label", "Go to " + (railLabels[id] || id));
      btn.addEventListener("click", function () {
        section.scrollIntoView({ behavior: reducedMotion ? "auto" : "smooth", block: "start" });
      });
      railDots.appendChild(btn);
    });

    var railButtons = railDots.querySelectorAll(".scroll-rail-dot");

    function updateRail() {
      var offset = (header ? header.offsetHeight : 80) + 40;
      var current = "";
      sections.forEach(function (section) {
        if (window.scrollY >= section.offsetTop - offset) {
          current = section.id;
        }
      });
      railButtons.forEach(function (btn) {
        btn.classList.toggle("active", btn.getAttribute("data-section") === current);
      });
      if (railFill) {
        var max = document.documentElement.scrollHeight - window.innerHeight;
        var pct = max > 0 ? (window.scrollY / max) * 100 : 0;
        railFill.style.height = pct + "%";
      }
    }

    window.addEventListener("scroll", updateRail, { passive: true });
    window.addEventListener("resize", updateRail, { passive: true });
    updateRail();
  }

  /* Scroll reveal — starts after loader so priming animations play cleanly */
  var revealEls = document.querySelectorAll(".reveal");
  startReveals = function () {
    if (reducedMotion || !("IntersectionObserver" in window)) {
      revealEls.forEach(function (el) {
        el.classList.add("visible");
      });
      return;
    }
    var revealObs = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add("visible");
            revealObs.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.12, rootMargin: "0px 0px -48px 0px" }
    );
    revealEls.forEach(function (el) {
      revealObs.observe(el);
    });
  };
  if (document.body.classList.contains("is-loaded") && !revealReady) {
    revealReady = true;
    startReveals();
  }

  /* Animated counters */
  var statCards = document.querySelectorAll("[data-target]");
  function animateCounter(card) {
    var numberEl = card.querySelector(".stat-number");
    if (!numberEl) return;
    var target = parseInt(card.getAttribute("data-target"), 10) || 0;
    var duration = 1600;
    var start = performance.now();
    card.classList.add("is-ticking");

    function tick(now) {
      var progress = Math.min((now - start) / duration, 1);
      var eased = 1 - Math.pow(1 - progress, 3);
      numberEl.textContent = Math.floor(target * eased);
      if (progress < 1) {
        requestAnimationFrame(tick);
      } else {
        numberEl.textContent = target;
        card.classList.remove("is-ticking");
      }
    }
    requestAnimationFrame(tick);
  }

  if (statCards.length && "IntersectionObserver" in window) {
    var counterObs = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            animateCounter(entry.target);
            counterObs.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.4 }
    );
    statCards.forEach(function (card) {
      counterObs.observe(card);
    });
  } else {
    statCards.forEach(animateCounter);
  }

  /* Testimonials slider */
  var track = document.getElementById("testimonialTrack");
  var prevBtn = document.getElementById("prevReview");
  var nextBtn = document.getElementById("nextReview");
  var dotsWrap = document.getElementById("reviewDots");

  if (track && dotsWrap) {
    var cards = Array.from(track.children);
    var index = 0;
    var autoTimer;

    cards.forEach(function (_, i) {
      var dot = document.createElement("button");
      dot.type = "button";
      dot.setAttribute("aria-label", "Go to review " + (i + 1));
      if (i === 0) dot.classList.add("active");
      dot.addEventListener("click", function () {
        goTo(i);
        restartAuto();
      });
      dotsWrap.appendChild(dot);
    });

    function goTo(i) {
      index = (i + cards.length) % cards.length;
      track.classList.add("is-switching");
      track.style.transform = "translateX(-" + index * 100 + "%)";
      Array.from(dotsWrap.children).forEach(function (dot, di) {
        dot.classList.toggle("active", di === index);
      });
      cards.forEach(function (card, ci) {
        card.classList.toggle("is-active", ci === index);
      });
      setTimeout(function () {
        track.classList.remove("is-switching");
      }, 280);
    }

    function next() {
      goTo(index + 1);
    }
    function prev() {
      goTo(index - 1);
    }

    if (nextBtn) nextBtn.addEventListener("click", function () { next(); restartAuto(); });
    if (prevBtn) prevBtn.addEventListener("click", function () { prev(); restartAuto(); });

    function restartAuto() {
      clearInterval(autoTimer);
      autoTimer = setInterval(next, 5500);
    }
    restartAuto();
    if (cards[0]) cards[0].classList.add("is-active");

    var slider = document.getElementById("testimonials");
    if (slider) {
      slider.addEventListener("mouseenter", function () { clearInterval(autoTimer); });
      slider.addEventListener("mouseleave", restartAuto);
    }
  }

  /* Inquiry form AJAX — homepage + contact page */
  var form =
    document.getElementById("contactPageForm") ||
    document.getElementById("inquiryForm");
  var statusEl =
    document.getElementById("contactFormStatus") ||
    document.getElementById("formStatus");
  var submitBtn =
    document.getElementById("contactSubmitBtn") ||
    document.getElementById("submitBtn");

  function fieldOf(targetForm, name) {
    return targetForm.querySelector('[name="' + name + '"]');
  }

  function fieldHost(field) {
    return field ? field.parentElement : null;
  }

  function clearFieldErrors(targetForm) {
    var invalids = targetForm.querySelectorAll(".is-invalid");
    for (var i = 0; i < invalids.length; i++) {
      invalids[i].classList.remove("is-invalid");
      invalids[i].removeAttribute("aria-invalid");
    }
    var errors = targetForm.querySelectorAll(".field-error");
    for (var j = 0; j < errors.length; j++) {
      errors[j].textContent = "";
      errors[j].hidden = true;
    }
  }

  function markFieldError(field, message) {
    if (!field) return;
    field.classList.add("is-invalid");
    field.setAttribute("aria-invalid", "true");

    var host = fieldHost(field);
    if (!host) return;

    var err = null;
    if (host) {
      var kids = host.children;
      for (var i = 0; i < kids.length; i++) {
        if (kids[i].classList && kids[i].classList.contains("field-error")) {
          err = kids[i];
          break;
        }
      }
    }
    if (!err) {
      err = document.createElement("span");
      err.className = "field-error";
      err.setAttribute("role", "alert");
      host.appendChild(err);
    }
    err.textContent = message || "Please check this field.";
    err.hidden = false;
  }

  function validateInquiryForm(targetForm) {
    clearFieldErrors(targetForm);

    var nameField = fieldOf(targetForm, "name");
    var emailField = fieldOf(targetForm, "email");
    var phoneField = fieldOf(targetForm, "phone");
    var messageField = fieldOf(targetForm, "message");
    var companyField = fieldOf(targetForm, "company");
    var countryField = fieldOf(targetForm, "country");

    var name = nameField ? nameField.value.trim() : "";
    var email = emailField ? emailField.value.trim() : "";
    var phone = phoneField ? phoneField.value.trim() : "";
    var message = messageField ? messageField.value.trim() : "";
    var company = companyField ? companyField.value.trim() : "";
    var country = countryField ? countryField.value.trim() : "";

    var firstInvalid = null;
    var summary = "";

    function fail(field, msg) {
      markFieldError(field, msg);
      if (!firstInvalid) {
        firstInvalid = field;
        summary = msg;
      }
    }

    if (name.length < 2) {
      fail(nameField, "Please enter your name (at least 2 characters).");
    } else if (name.length > 120) {
      fail(nameField, "Name must be 120 characters or fewer.");
    }

    if (!email) {
      fail(emailField, "Please enter your email address.");
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
      fail(emailField, "Please enter a valid email address.");
    } else if (email.length > 190) {
      fail(emailField, "Email must be 190 characters or fewer.");
    }

    if (phone && !/^[\d\s+\-()]{7,20}$/.test(phone)) {
      fail(phoneField, "Please enter a valid phone number.");
    }

    if (company.length > 120) {
      fail(companyField, "Company must be 120 characters or fewer.");
    }

    if (country.length > 80) {
      fail(countryField, "Country must be 80 characters or fewer.");
    }

    if (message.length < 10) {
      fail(messageField, "Please enter a message (at least 10 characters).");
    } else if (message.length > 5000) {
      fail(messageField, "Message must be 5000 characters or fewer.");
    }

    if (firstInvalid && typeof firstInvalid.focus === "function") {
      firstInvalid.focus();
      if (typeof firstInvalid.scrollIntoView === "function") {
        firstInvalid.scrollIntoView({ behavior: reducedMotion ? "auto" : "smooth", block: "center" });
      }
    }

    return summary;
  }

  function applyServerFieldErrors(targetForm, errors) {
    if (!errors || typeof errors !== "object") return;
    var first = null;
    Object.keys(errors).forEach(function (key) {
      var field = fieldOf(targetForm, key);
      markFieldError(field, errors[key]);
      if (!first && field) first = field;
    });
    if (first && typeof first.focus === "function") {
      first.focus();
    }
  }

  function setButtonLoading(isLoading) {
    if (!submitBtn) return;
    submitBtn.disabled = !!isLoading;
    submitBtn.classList.toggle("is-loading", !!isLoading);
    submitBtn.setAttribute("aria-busy", isLoading ? "true" : "false");
  }

  function showFormSuccess(targetForm, message) {
    var isContact = targetForm.id === "contactPageForm";
    var safeMessage = String(
      message || "Your inquiry has been received. We will contact you shortly."
    )
      .replace(/&/g, "&amp;")
      .replace(/</g, "&lt;")
      .replace(/>/g, "&gt;")
      .replace(/"/g, "&quot;");

    targetForm.classList.add("is-submitted");
    targetForm.setAttribute("aria-live", "polite");
    targetForm.innerHTML =
      '<div class="form-success-card">' +
        '<div class="form-success-icon" aria-hidden="true"></div>' +
        (isContact ? '<span class="form-success-badge">Inquiry received</span>' : "") +
        "<h3>Thank you!</h3>" +
        "<p>" + safeMessage + "</p>" +
        '<p class="form-success-meta">A confirmation email is on its way. Our team usually replies within one business day.</p>' +
      "</div>";
  }

  function showStatus(msg, ok) {
    if (!statusEl) return;
    statusEl.textContent = msg;
    statusEl.className = "form-status " + (ok ? "success" : "error");
  }

  if (form) {
    form.addEventListener("input", function (e) {
      var t = e.target;
      if (!t || !t.name) return;
      if (!t.classList.contains("is-invalid")) return;
      t.classList.remove("is-invalid");
      t.removeAttribute("aria-invalid");
      var host = fieldHost(t);
      var err = null;
      if (host) {
        var kids = host.children;
        for (var i = 0; i < kids.length; i++) {
          if (kids[i].classList && kids[i].classList.contains("field-error")) {
            err = kids[i];
            break;
          }
        }
      }
      if (err) {
        err.textContent = "";
        err.hidden = true;
      }
      if (statusEl && statusEl.classList.contains("error")) {
        statusEl.textContent = "";
        statusEl.className = "form-status";
      }
    });

    form.addEventListener("submit", async function (e) {
      e.preventDefault();
      if (form.classList.contains("is-submitted")) return;

      if (statusEl) {
        statusEl.textContent = "";
        statusEl.className = "form-status";
      }

      var clientError = validateInquiryForm(form);
      if (clientError) {
        showStatus(clientError, false);
        return;
      }

      setButtonLoading(true);

      try {
        var hp = form.querySelector('[name="qx_hp_field"]');
        if (hp) hp.value = "";

        var formData = new FormData(form);
        var endpoint = form.getAttribute("action") || '/form-handler';
        var res = await fetch(endpoint, {
          method: "POST",
          body: formData,
          headers: { Accept: "application/json" },
        });
        var raw = await res.text();
        var data;
        try {
          data = JSON.parse(raw);
        } catch (parseErr) {
          data = { success: false, message: "Unexpected server response. Please try again." };
        }

        if (data.success && !data.ignored) {
          showFormSuccess(
            form,
            data.message || "Your inquiry has been received. We will contact you shortly."
          );
        } else {
          applyServerFieldErrors(form, data.errors);
          showStatus(data.message || "Something went wrong. Please try again.", false);
          setButtonLoading(false);
        }
      } catch (err) {
        showStatus("Network error. Please try again later.", false);
        setButtonLoading(false);
      }
    });
  }

  /* Scroll progress bar */
  var progressBar = document.getElementById("scrollProgress");
  if (progressBar) {
    var updateProgress = function () {
      var max = document.documentElement.scrollHeight - window.innerHeight;
      var pct = max > 0 ? (window.scrollY / max) * 100 : 0;
      progressBar.style.width = pct + "%";
    };
    window.addEventListener("scroll", updateProgress, { passive: true });
    window.addEventListener("resize", updateProgress, { passive: true });
    updateProgress();
  }

  /* Back to top */
  var backToTop = document.getElementById("backToTop");
  if (backToTop) {
    window.addEventListener(
      "scroll",
      function () {
        backToTop.classList.toggle("show", window.scrollY > 600);
      },
      { passive: true }
    );
    backToTop.addEventListener("click", function () {
      window.scrollTo({ top: 0, behavior: reducedMotion ? "auto" : "smooth" });
    });
  }

  /* Hero orbs mouse parallax */
  var heroSection = document.getElementById("home");
  var orbs = document.querySelectorAll(".hero-orbs .orb");
  if (heroSection && orbs.length && !reducedMotion) {
    heroSection.addEventListener("mousemove", function (e) {
      var rect = heroSection.getBoundingClientRect();
      var relX = (e.clientX - rect.left) / rect.width - 0.5;
      var relY = (e.clientY - rect.top) / rect.height - 0.5;
      orbs.forEach(function (orb, i) {
        var depth = (i + 1) * 14;
        orb.style.marginLeft = relX * depth + "px";
        orb.style.marginTop = relY * depth + "px";
      });
    });
    heroSection.addEventListener("mouseleave", function () {
      orbs.forEach(function (orb) {
        orb.style.marginLeft = "0px";
        orb.style.marginTop = "0px";
      });
    });
  }

  /* 3D tilt on cards */
  var tiltCards = document.querySelectorAll(".service-card, .diff-card");
  if (!reducedMotion && matchMedia("(hover: hover) and (pointer: fine)").matches) {
    tiltCards.forEach(function (card) {
      card.classList.add("tilt");
      var raf = null;

      card.addEventListener("mousemove", function (e) {
        if (raf) return;
        raf = requestAnimationFrame(function () {
          var rect = card.getBoundingClientRect();
          var px = (e.clientX - rect.left) / rect.width - 0.5;
          var py = (e.clientY - rect.top) / rect.height - 0.5;
          card.style.transform =
            "perspective(800px) rotateX(" + (-py * 7) + "deg) rotateY(" + (px * 7) + "deg) translateY(-6px)";
          raf = null;
        });
      });

      card.addEventListener("mouseleave", function () {
        card.style.transform = "";
      });
    });
  }

  /* Navbar dropdowns — hover stay + click for touch */
  var dropItems = document.querySelectorAll(".nav-item[data-dropdown]");
  var hoverCloseTimer = null;

  dropItems.forEach(function (item) {
    var trigger = item.querySelector(".drop-trigger");
    if (!trigger) return;

    item.addEventListener("mouseenter", function () {
      if (window.matchMedia("(max-width: 768px)").matches) return;
      clearTimeout(hoverCloseTimer);
      dropItems.forEach(function (other) {
        if (other !== item) {
          other.classList.remove("open");
          var ot = other.querySelector(".drop-trigger");
          if (ot) ot.setAttribute("aria-expanded", "false");
        }
      });
      item.classList.add("open");
      trigger.setAttribute("aria-expanded", "true");
    });

    item.addEventListener("mouseleave", function () {
      if (window.matchMedia("(max-width: 768px)").matches) return;
      clearTimeout(hoverCloseTimer);
      hoverCloseTimer = setTimeout(function () {
        item.classList.remove("open");
        trigger.setAttribute("aria-expanded", "false");
      }, 180);
    });

    trigger.addEventListener("click", function (e) {
      e.stopPropagation();
      var isOpen = item.classList.contains("open");
      dropItems.forEach(function (other) {
        other.classList.remove("open");
        var t = other.querySelector(".drop-trigger");
        if (t) t.setAttribute("aria-expanded", "false");
      });
      if (!isOpen) {
        item.classList.add("open");
        trigger.setAttribute("aria-expanded", "true");
      }
    });
  });

  document.addEventListener("click", function () {
    clearTimeout(hoverCloseTimer);
    dropItems.forEach(function (item) {
      item.classList.remove("open");
      var t = item.querySelector(".drop-trigger");
      if (t) t.setAttribute("aria-expanded", "false");
    });
  });

  /* Hero H1 — AI phrase rotator */
  var headlineRotator = document.getElementById("headlineRotator");
  if (headlineRotator) {
    var aiWords = [
      "AI-Native",
      "AI-Centric",
      "AI-Powered",
      "AI-First",
      "AI-Driven",
    ];
    if (reducedMotion) {
      headlineRotator.textContent = aiWords[0];
    } else {
      var aiIdx = 0;
      var aiChar = aiWords[0].length;
      var aiDeleting = false;

      var aiTypeTick = function () {
        var word = aiWords[aiIdx];
        if (!aiDeleting) {
          aiChar++;
          if (aiChar >= word.length) {
            aiChar = word.length;
            aiDeleting = true;
            headlineRotator.textContent = word;
            setTimeout(aiTypeTick, 2000);
            return;
          }
        } else {
          aiChar--;
          if (aiChar <= 0) {
            aiDeleting = false;
            aiIdx = (aiIdx + 1) % aiWords.length;
            aiChar = 0;
          }
        }
        headlineRotator.textContent = aiWords[aiIdx].slice(0, aiChar);
        setTimeout(aiTypeTick, aiDeleting ? 45 : 85);
      };

      setTimeout(aiTypeTick, 1600);
    }
  }

  /* Hero typewriter word rotator */
  var rotator = document.getElementById("wordRotator");
  if (rotator) {
    var words = [
      "Web Applications",
      "Mobile Apps",
      "Agentic AI",
      "AI Integrations",
      "E-Commerce Stores",
      "UX/UI Experiences",
      "Custom Software",
    ];
    if (reducedMotion) {
      rotator.textContent = words[0];
    } else {
      var wordIdx = 0;
      var charIdx = words[0].length;
      var deleting = false;

      var typeTick = function () {
        var word = words[wordIdx];
        if (!deleting) {
          charIdx++;
          if (charIdx >= word.length) {
            charIdx = word.length;
            deleting = true;
            rotator.textContent = word;
            setTimeout(typeTick, 1800);
            return;
          }
        } else {
          charIdx--;
          if (charIdx <= 0) {
            deleting = false;
            wordIdx = (wordIdx + 1) % words.length;
            charIdx = 0;
          }
        }
        rotator.textContent = words[wordIdx].slice(0, charIdx);
        setTimeout(typeTick, deleting ? 40 : 80);
      };

      setTimeout(typeTick, 2800);
    }
  }

  /* Hero rising particles */
  var particlesWrap = document.getElementById("heroParticles");
  if (particlesWrap && !reducedMotion) {
    for (var p = 0; p < 18; p++) {
      var dot = document.createElement("span");
      var size = 3 + Math.random() * 5;
      dot.style.width = size + "px";
      dot.style.height = size + "px";
      dot.style.left = Math.random() * 100 + "%";
      dot.style.setProperty("--drift", Math.random() * 80 - 40 + "px");
      dot.style.animationDuration = 9 + Math.random() * 10 + "s";
      dot.style.animationDelay = -(Math.random() * 18) + "s";
      particlesWrap.appendChild(dot);
    }
  }

  /* Soft parallax — hero orbs wrap + dark band media (keeps orb float intact) */
  if (!reducedMotion && matchMedia("(pointer: fine)").matches) {
    var parallaxRaf = null;
    var orbsWrap = document.querySelector(".hero-orbs");
    var darkBands = document.querySelectorAll(".dark-band");
    function onParallaxScroll() {
      if (parallaxRaf) return;
      parallaxRaf = requestAnimationFrame(function () {
        parallaxRaf = null;
        var vh = window.innerHeight || 1;
        if (orbsWrap && heroSection) {
          var heroRect = heroSection.getBoundingClientRect();
          var heroP = Math.max(-1, Math.min(1, heroRect.top / vh));
          orbsWrap.style.transform = "translate3d(0, " + (heroP * 28).toFixed(1) + "px, 0)";
        }
        darkBands.forEach(function (band) {
          var rect = band.getBoundingClientRect();
          if (rect.bottom < 0 || rect.top > vh) return;
          var p = (rect.top / vh) * 22;
          band.style.setProperty("--band-shift", p.toFixed(2) + "px");
        });
      });
    }
    window.addEventListener("scroll", onParallaxScroll, { passive: true });
    onParallaxScroll();
  }

  /* Auto-stagger reveal children + checklist / tech chips */
  document
    .querySelectorAll(".service-grid, .diff-grid, .stats-strip, .reveal-stagger, .contact-steps, .cap-grid, .work-grid, .compare-panel, .process-track")
    .forEach(function (grid) {
      Array.from(grid.children).forEach(function (child, i) {
        child.style.setProperty("--stagger-i", String(i));
        if (!child.classList.contains("reveal")) return;
        var delay = Math.min(i * 0.09, 0.54);
        child.style.transitionDelay = delay + "s";
        setTimeout(function () {
          child.style.transitionDelay = "0s";
        }, (delay + 1.2) * 1000);
      });
    });

  document.querySelectorAll(".check-list, .contact-highlights").forEach(function (list) {
    Array.from(list.children).forEach(function (li, i) {
      li.style.setProperty("--li", String(i));
    });
  });

  document.querySelectorAll(".tech-grid .tech-chip").forEach(function (chip, i) {
    chip.style.setProperty("--chip-i", String(i));
  });

  /* Hero CTA magnetic micro-move */
  if (!reducedMotion && matchMedia("(hover: hover) and (pointer: fine)").matches) {
    document.querySelectorAll(".hero-actions .btn").forEach(function (btn) {
      btn.addEventListener("mousemove", function (e) {
        var rect = btn.getBoundingClientRect();
        var x = (e.clientX - rect.left) / rect.width - 0.5;
        var y = (e.clientY - rect.top) / rect.height - 0.5;
        btn.style.transform = "translate(" + (x * 6) + "px, " + (y * 4 - 2) + "px)";
      });
      btn.addEventListener("mouseleave", function () {
        btn.style.transform = "";
      });
    });
  }
  /* Customer Success Stories — sticky stack with eased cover */
  var stackRoot = document.getElementById("casesStack");
  if (stackRoot && !reducedMotion) {
    var stackItems = Array.from(stackRoot.querySelectorAll(".cases-stack-item"));
    var stackRaf = null;

    function easeOutCubic(t) {
      return 1 - Math.pow(1 - t, 3);
    }

    function updateCaseStack() {
      stackRaf = null;
      var stickyTop = (header ? header.offsetHeight : 78) + 20;
      var topIndex = 0;

      stackItems.forEach(function (item, i) {
        var card = item.querySelector(".case-card");
        if (!card) return;

        var next = stackItems[i + 1];
        var progress = 0;

        if (next) {
          var nextTop = next.getBoundingClientRect().top;
          var coverRange = Math.max(card.offsetHeight * 0.9, 220);
          progress = (stickyTop + coverRange - nextTop) / coverRange;
          progress = Math.max(0, Math.min(1, progress));
          progress = easeOutCubic(progress);
        }

        item.style.setProperty("--stack-p", progress.toFixed(3));
        item.classList.toggle("is-covered", progress > 0.85);
        if (progress < 0.55) topIndex = i;
      });

      stackItems.forEach(function (item, i) {
        item.classList.toggle("is-top", i === topIndex);
      });
    }

    function onStackScroll() {
      if (stackRaf) return;
      stackRaf = requestAnimationFrame(updateCaseStack);
    }

    window.addEventListener("scroll", onStackScroll, { passive: true });
    window.addEventListener("resize", onStackScroll, { passive: true });
    updateCaseStack();
  }

  /* FAQ accordion — ensure single-open feel on service pages */
  document.querySelectorAll(".faq-list").forEach(function (list) {
    list.querySelectorAll("details.faq-item").forEach(function (item) {
      item.addEventListener("toggle", function () {
        if (!item.open) return;
        list.querySelectorAll("details.faq-item").forEach(function (other) {
          if (other !== item) other.open = false;
        });
      });
    });
  });

  /* Service page card sliders — capabilities, work, guide */
  function svcSlidesPerView() {
    if (window.innerWidth <= 640) return 1;
    if (window.innerWidth <= 1024) return 2;
    return 3;
  }

  function initSvcCardSlider(track) {
    if (!track || track.dataset.sliderReady === "1") return;
    var slides = Array.from(track.children).filter(function (el) {
      return el.nodeType === 1 && !el.classList.contains("svc-slider-controls");
    });
    if (slides.length < 2) return;

    track.dataset.sliderReady = "1";

    var wrap = document.createElement("div");
    wrap.className = "svc-slider";
    var viewport = document.createElement("div");
    viewport.className = "svc-slider-viewport";

    track.parentNode.insertBefore(wrap, track);
    wrap.appendChild(viewport);
    viewport.appendChild(track);
    track.classList.add("svc-slider-track");

    var controls = document.createElement("div");
    controls.className = "svc-slider-controls";
    controls.innerHTML =
      '<button type="button" class="ctrl-btn svc-slider-prev" aria-label="Previous">' +
      '<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 18l-6-6 6-6"/></svg>' +
      "</button>" +
      '<div class="dots" role="tablist" aria-label="Slides"></div>' +
      '<button type="button" class="ctrl-btn svc-slider-next" aria-label="Next">' +
      '<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>' +
      "</button>";
    wrap.appendChild(controls);

    var prevBtn = controls.querySelector(".svc-slider-prev");
    var nextBtn = controls.querySelector(".svc-slider-next");
    var dotsWrap = controls.querySelector(".dots");
    var index = 0;
    var autoTimer;
    var spv = svcSlidesPerView();

    function maxIndex() {
      spv = svcSlidesPerView();
      track.style.setProperty("--spv", String(spv));
      return Math.max(0, slides.length - spv);
    }

    function buildDots() {
      dotsWrap.innerHTML = "";
      var max = maxIndex();
      var count = max + 1;
      for (var i = 0; i < count; i++) {
        (function (di) {
          var dot = document.createElement("button");
          dot.type = "button";
          dot.setAttribute("aria-label", "Go to slide group " + (di + 1));
          if (di === index) dot.classList.add("active");
          dot.addEventListener("click", function () {
            goTo(di);
            restartAuto();
          });
          dotsWrap.appendChild(dot);
        })(i);
      }
    }

    function goTo(i) {
      var max = maxIndex();
      index = Math.max(0, Math.min(i, max));
      var slide = slides[0];
      var gap = parseFloat(window.getComputedStyle(track).gap) || 0;
      var slideW = slide.getBoundingClientRect().width;
      var offset = index * (slideW + gap);
      track.classList.add("is-switching");
      track.style.transform = "translateX(-" + offset + "px)";
      Array.from(dotsWrap.children).forEach(function (dot, di) {
        dot.classList.toggle("active", di === index);
      });
      if (prevBtn) prevBtn.disabled = index <= 0;
      if (nextBtn) nextBtn.disabled = index >= max;
      setTimeout(function () {
        track.classList.remove("is-switching");
      }, 280);
    }

    function next() {
      var max = maxIndex();
      goTo(index >= max ? 0 : index + 1);
    }
    function prev() {
      var max = maxIndex();
      goTo(index <= 0 ? max : index - 1);
    }

    if (nextBtn) nextBtn.addEventListener("click", function () { next(); restartAuto(); });
    if (prevBtn) prevBtn.addEventListener("click", function () { prev(); restartAuto(); });

    function restartAuto() {
      clearInterval(autoTimer);
      if (reducedMotion) return;
      autoTimer = setInterval(next, 5200);
    }

    buildDots();
    goTo(0);
    restartAuto();

    wrap.addEventListener("mouseenter", function () { clearInterval(autoTimer); });
    wrap.addEventListener("mouseleave", restartAuto);

    var resizeTimer;
    window.addEventListener("resize", function () {
      clearTimeout(resizeTimer);
      resizeTimer = setTimeout(function () {
        buildDots();
        goTo(Math.min(index, maxIndex()));
      }, 150);
    });
  }

  document
    .querySelectorAll(
      ".page-service .cap-grid, .page-service .work-grid, .page-service .guide-block, .page-service .related-strip"
    )
    .forEach(function (grid) {
      var kids = Array.from(grid.children).filter(function (el) {
        return el.nodeType === 1;
      });
      if (kids.length >= 2) initSvcCardSlider(grid);
    });

  /* Work card media image rotator */
  document.querySelectorAll(".page-service .work-media").forEach(function (media) {
    var imgs = Array.from(media.querySelectorAll("img"));
    if (imgs.length < 2 || media.dataset.sliderReady === "1") return;
    media.dataset.sliderReady = "1";
    media.classList.add("is-slider");
    var dots = document.createElement("div");
    dots.className = "work-media-dots";
    var idx = 0;
    imgs.forEach(function (img, i) {
      img.classList.toggle("is-active", i === 0);
      var b = document.createElement("button");
      b.type = "button";
      b.setAttribute("aria-label", "Image " + (i + 1));
      if (i === 0) b.classList.add("active");
      b.addEventListener("click", function () {
        idx = i;
        show();
      });
      dots.appendChild(b);
    });
    media.appendChild(dots);

    function show() {
      imgs.forEach(function (img, i) {
        img.classList.toggle("is-active", i === idx);
      });
      Array.from(dots.children).forEach(function (d, i) {
        d.classList.toggle("active", i === idx);
      });
    }

    if (!reducedMotion) {
      setInterval(function () {
        idx = (idx + 1) % imgs.length;
        show();
      }, 3400);
    }
  });
})();
