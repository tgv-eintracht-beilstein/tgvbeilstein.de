/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */


(function() {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages
        var mobileNavigation, mobileNavigationOpen, mobileNavigationClose,
          openFn, closeFn;

        mobileNavigation = document.getElementById('mobile-navigation');
        mobileNavigationOpen = document.getElementById(
          'mobile-navigation-open');
        mobileNavigationClose = document.getElementById(
          'mobile-navigation-close');

        openFn = function() {
          mobileNavigation.classList.add('active');
        };

        closeFn = function() {
          mobileNavigation.classList.remove('active');
        };

        mobileNavigationOpen.addEventListener('click', function() {
          openFn();
        });

        mobileNavigationClose.addEventListener('click', function() {
          closeFn();
        });
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {

      }
    },
    // About us page, note the change from about-us to about_us.
    'geschaeftsstelle': {
      init: function() {
        var overlayEl, mapEl, onFn, offFn;

        overlayEl = document.getElementById('overlay');
        mapEl = document.getElementById('map');

        onFn = function(cssClass) {
          cssClass = cssClass || 'scrolloff';
          mapEl.classList.add(cssClass);
        };

        offFn = function(cssClass) {
          cssClass = cssClass || 'scrolloff';
          mapEl.classList.remove(cssClass);
        };

        onFn();
        overlayEl.addEventListener('onmouseup', function() {
          onFn();
        });
        overlayEl.addEventListener('mousedown', function() {
          offFn();
        });
        overlayEl.addEventListener('mouseleave', function() {
          onFn();
        });
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');
      document.body.className.replace(/-/g, '_').split(/\s+/).forEach(
        function(classnm) {
          UTIL.fire(classnm);
          UTIL.fire(classnm, 'finalize');
        });
      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  document.addEventListener("DOMContentLoaded", UTIL.loadEvents);
})(); // Fully reference jQuery after this point.
