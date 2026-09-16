(() => {
  'use strict';
  const key = 'qi-analytics-consent-v1';
  const lifetime = 180 * 24 * 60 * 60 * 1000;
  const production = ['quantuminfoway.com', 'www.quantuminfoway.com'].includes(location.hostname);
  let choice = null;
  let loaded = false;
  let previousFocus = null;
  try {
    const saved = JSON.parse(localStorage.getItem(key));
    if (saved && ['granted', 'denied'].includes(saved.value) &&
        Number.isFinite(saved.time) && Date.now() >= saved.time && Date.now() - saved.time < lifetime) choice = saved.value;
  } catch (_) { /* Storage is optional; ask again when unavailable. */ }

  function apply(value) {
    if (!production) return;
    if (value === 'granted' && !loaded) {
      window.clarity = window.clarity || function () { (window.clarity.q = window.clarity.q || []).push(arguments); };
      window.clarity('consentv2', { analytics_Storage: 'granted', ad_Storage: 'denied' });
      const script = document.createElement('script');
      script.async = true;
      script.src = 'https://www.clarity.ms/tag/yj2bt544nc';
      document.head.appendChild(script);
      loaded = true;
    } else if (loaded) {
      window.clarity('consentv2', { analytics_Storage: value, ad_Storage: 'denied' });
    }
  }

  const banner = document.getElementById('analytics-consent');
  const preferences = document.getElementById('cookie-preferences');
  if (!banner || !preferences) return;
  const status = document.getElementById('consent-status');
  function show(focus) {
    banner.hidden = false;
    if (focus) {
      previousFocus = document.activeElement;
      banner.querySelector('button').focus();
    }
  }
  preferences.addEventListener('click', () => show(true));
  banner.querySelectorAll('[data-consent]').forEach(button => {
    button.addEventListener('click', () => {
      choice = button.dataset.consent;
      try { localStorage.setItem(key, JSON.stringify({ value: choice, time: Date.now() })); } catch (_) {}
      apply(choice);
      banner.hidden = true;
      status.textContent = choice === 'granted' ? 'Analytics accepted. You can change this in Cookie preferences.' : 'Analytics declined. You can change this in Cookie preferences.';
      if (previousFocus) { previousFocus.focus(); previousFocus = null; }
    });
  });
  window.addEventListener('storage', event => {
    if (event.key !== key && event.key !== null) return;
    let value = null;
    try {
      const saved = JSON.parse(event.newValue);
      if (saved && ['granted', 'denied'].includes(saved.value) && Date.now() >= saved.time && Date.now() - saved.time < lifetime) value = saved.value;
    } catch (_) {}
    choice = value;
    apply(choice || 'denied');
    banner.hidden = choice !== null;
  });
  if (choice) apply(choice);
  else show(false);
})();
