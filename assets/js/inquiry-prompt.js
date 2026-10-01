/**
 * Enquiry prompt: 90 seconds of active time, after a scroll, once per visit.
 * A close is remembered for 7 days. A successful send is remembered for 30 days.
 */
(function () {
  "use strict";

  var panel = document.getElementById("inquiryPrompt");
  if (!panel) return;

  var form = document.getElementById("inquiryPromptForm");
  var closeBtn = document.getElementById("inquiryPromptClose");
  var statusEl = document.getElementById("inquiryPromptStatus");
  var submitBtn = document.getElementById("inquiryPromptSubmit");
  var turnstileHost = document.getElementById("inquiryPromptTurnstile");
  var waitMs = 90000;
  var visitKey = "qi-inquiry-prompt-visit";
  var memoryKey = "qi-inquiry-prompt-v1";
  var day = 24 * 60 * 60 * 1000;
  var visit = { ms: 0, scrolled: false, shown: false };
  var lastTick = 0;
  var timer = 0;
  var turnstileWidgetId = "";
  var opened = false;

  try {
    var savedVisit = JSON.parse(sessionStorage.getItem(visitKey) || "");
    if (savedVisit && typeof savedVisit === "object") {
      visit.ms = Number(savedVisit.ms) || 0;
      visit.scrolled = !!savedVisit.scrolled;
      visit.shown = !!savedVisit.shown;
    }
  } catch (e) {
    visit = { ms: 0, scrolled: false, shown: false };
  }

  function memoryUntil() {
    try {
      var saved = JSON.parse(localStorage.getItem(memoryKey) || "");
      if (saved && Number.isFinite(saved.until) && saved.until > Date.now()) return saved.until;
    } catch (e) {}
    return 0;
  }

  function remember(days) {
    try {
      localStorage.setItem(memoryKey, JSON.stringify({ until: Date.now() + days * day }));
    } catch (e) {}
  }

  function saveVisit() {
    try {
      sessionStorage.setItem(visitKey, JSON.stringify(visit));
    } catch (e) {}
  }

  function consentBlocking() {
    var banner = document.getElementById("analytics-consent");
    return !!(banner && !banner.hidden);
  }

  function pageCanScroll() {
    return document.documentElement.scrollHeight > window.innerHeight + 48;
  }

  function noteScroll() {
    if (window.scrollY > 40 || !pageCanScroll()) {
      visit.scrolled = true;
    }
  }

  function loadTurnstile() {
    if (!turnstileHost || turnstileWidgetId || !turnstileHost.getAttribute("data-sitekey")) return;
    function render() {
      if (turnstileWidgetId || !window.turnstile) return;
      turnstileWidgetId = window.turnstile.render(turnstileHost, {
        sitekey: turnstileHost.getAttribute("data-sitekey"),
        theme: "light",
        action: "inquiry",
      }) || "prompt";
    }
    if (window.turnstile) {
      render();
      return;
    }
    var existing = document.querySelector('script[src*="challenges.cloudflare.com/turnstile"]');
    if (existing) {
      var tries = 0;
      var wait = window.setInterval(function () {
        tries += 1;
        if (window.turnstile || tries > 25) {
          window.clearInterval(wait);
          render();
        }
      }, 200);
      return;
    }
    var script = document.createElement("script");
    script.src = "https://challenges.cloudflare.com/turnstile/v0/api.js?render=explicit";
    script.async = true;
    script.onload = render;
    document.head.appendChild(script);
  }

  function openPrompt() {
    if (opened || visit.shown || memoryUntil() || consentBlocking()) return;
    if (visit.ms < waitMs || !visit.scrolled) return;
    opened = true;
    visit.shown = true;
    saveVisit();
    window.clearInterval(timer);
    panel.hidden = false;
    loadTurnstile();
    var name = document.getElementById("promptName");
    if (name) name.focus();
  }

  function closePrompt(days) {
    panel.hidden = true;
    remember(days || 7);
    visit.shown = true;
    saveVisit();
    window.clearInterval(timer);
  }

  function setStatus(message, ok) {
    if (!statusEl) return;
    statusEl.textContent = message;
    statusEl.className = "form-status" + (message ? (ok ? " success" : " error") : "");
  }

  function setLoading(isLoading) {
    if (!submitBtn) return;
    submitBtn.disabled = !!isLoading;
    submitBtn.classList.toggle("is-loading", !!isLoading);
    var loadingEl = submitBtn.querySelector(".btn-loading");
    if (loadingEl) loadingEl.hidden = !isLoading;
  }

  function validate() {
    var name = form.querySelector('[name="name"]');
    var email = form.querySelector('[name="email"]');
    var message = form.querySelector('[name="message"]');
    var nameVal = name ? name.value.trim() : "";
    var emailVal = email ? email.value.trim() : "";
    var messageVal = message ? message.value.trim() : "";
    if (nameVal.length < 2) return "Please enter your name.";
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailVal)) return "Please enter a valid work email.";
    if (messageVal.length < 10) return "Please add a short note about the project (at least 10 characters).";
    return "";
  }

  function tick() {
    var now = Date.now();
    if (document.visibilityState === "visible") {
      if (lastTick) visit.ms += now - lastTick;
      lastTick = now;
    } else {
      lastTick = 0;
    }
    noteScroll();
    saveVisit();
    if (!consentBlocking()) openPrompt();
  }

  if (!visit.shown && !memoryUntil()) {
    noteScroll();
    lastTick = document.visibilityState === "visible" ? Date.now() : 0;
    timer = window.setInterval(tick, 1000);
    window.addEventListener("scroll", noteScroll, { passive: true });
    document.addEventListener("visibilitychange", function () {
      if (document.visibilityState === "visible") lastTick = Date.now();
      else lastTick = 0;
    });
    var banner = document.getElementById("analytics-consent");
    if (banner && window.MutationObserver) {
      new MutationObserver(function () {
        if (!consentBlocking()) openPrompt();
      }).observe(banner, { attributes: true, attributeFilter: ["hidden"] });
    }
  }

  if (closeBtn) {
    closeBtn.addEventListener("click", function () {
      closePrompt(7);
    });
  }

  document.addEventListener("keydown", function (event) {
    if (event.key === "Escape" && !panel.hidden) closePrompt(7);
  });

  if (form) {
    form.addEventListener("submit", function (event) {
      event.preventDefault();
      if (form.classList.contains("is-submitted")) return;
      var problem = validate();
      if (problem) {
        setStatus(problem, false);
        return;
      }
      var tokenField = form.querySelector('[name="cf-turnstile-response"]');
      if (turnstileHost && (!tokenField || !tokenField.value)) {
        setStatus("Please complete the security check and try again.", false);
        return;
      }
      var hp = form.querySelector('[name="qx_hp_field"]');
      if (hp) hp.value = "";
      setLoading(true);
      setStatus("", true);

      fetch(form.getAttribute("action") || "/form-handler", {
        method: "POST",
        body: new FormData(form),
        headers: { Accept: "application/json" },
      })
        .then(function (res) {
          return res.text().then(function (raw) {
            var data;
            try {
              data = JSON.parse(raw);
            } catch (e) {
              data = { success: false, message: "Unexpected server response. Please try again." };
            }
            return data;
          });
        })
        .then(function (data) {
          if (data.success && !data.ignored) {
            remember(30);
            visit.shown = true;
            saveVisit();
            form.classList.add("is-submitted");
            form.innerHTML =
              '<div class="form-success-card">' +
              "<h3>Thank you</h3>" +
              "<p>Your note has been received. We will reply within one business day.</p>" +
              "</div>";
            return;
          }
          if (window.turnstile && turnstileWidgetId) window.turnstile.reset(turnstileWidgetId);
          setStatus(data.message || "Something went wrong. Please try again.", false);
          setLoading(false);
        })
        .catch(function () {
          if (window.turnstile && turnstileWidgetId) window.turnstile.reset(turnstileWidgetId);
          setStatus("Network error. Please try again later.", false);
          setLoading(false);
        });
    });
  }
})();
