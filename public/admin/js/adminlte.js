var _typeof2="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e};!function(e,t){"object"===("undefined"==typeof exports?"undefined":_typeof2(exports))&&"undefined"!=typeof module?t(exports):"function"==typeof define&&define.amd?define(["exports"],t):t(e.adminlte={})}(this,function(e){"use strict";var t="function"==typeof Symbol&&"symbol"===_typeof2(Symbol.iterator)?function(e){return void 0===e?"undefined":_typeof2(e)}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":void 0===e?"undefined":_typeof2(e)},n=function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")},i=function(e){var t="ControlSidebar",i=e.fn[t],o={CONTROL_SIDEBAR:".control-sidebar",DATA_TOGGLE:'[data-widget="control-sidebar"]',MAIN_HEADER:".main-header"},r={CONTROL_SIDEBAR_OPEN:"control-sidebar-open",CONTROL_SIDEBAR_SLIDE:"control-sidebar-slide-open"},a={slide:!0},s=function(){function t(e,i){n(this,t),this._element=e,this._config=this._getConfig(i)}return t.prototype.show=function(){this._config.slide?e("body").removeClass(r.CONTROL_SIDEBAR_SLIDE):e("body").removeClass(r.CONTROL_SIDEBAR_OPEN)},t.prototype.collapse=function(){this._config.slide?e("body").addClass(r.CONTROL_SIDEBAR_SLIDE):e("body").addClass(r.CONTROL_SIDEBAR_OPEN)},t.prototype.toggle=function(){this._setMargin(),e("body").hasClass(r.CONTROL_SIDEBAR_OPEN)||e("body").hasClass(r.CONTROL_SIDEBAR_SLIDE)?this.show():this.collapse()},t.prototype._getConfig=function(t){return e.extend({},a,t)},t.prototype._setMargin=function(){e(o.CONTROL_SIDEBAR).css({top:e(o.MAIN_HEADER).outerHeight()})},t._jQueryInterface=function(n){return this.each(function(){var i=e(this).data("lte.control.sidebar");if(i||(i=new t(this,e(this).data()),e(this).data("lte.control.sidebar",i)),"undefined"===i[n])throw new Error(n+" is not a function");i[n]()})},t}();return e(document).on("click",o.DATA_TOGGLE,function(t){t.preventDefault(),s._jQueryInterface.call(e(this),"toggle")}),e.fn[t]=s._jQueryInterface,e.fn[t].Constructor=s,e.fn[t].noConflict=function(){return e.fn[t]=i,s._jQueryInterface},s}(jQuery),o=function(e){var t="Layout",i=e.fn[t],o={SIDEBAR:".main-sidebar",HEADER:".main-header",CONTENT:".content-wrapper",CONTENT_HEADER:".content-header",WRAPPER:".wrapper",CONTROL_SIDEBAR:".control-sidebar",LAYOUT_FIXED:".layout-fixed",FOOTER:".main-footer"},r={HOLD:"hold-transition",SIDEBAR:"main-sidebar",LAYOUT_FIXED:"layout-fixed"},a=function(){function t(e){n(this,t),this._element=e,this._init()}return t.prototype.fixLayoutHeight=function(){var t={window:e(window).height(),header:e(o.HEADER).outerHeight(),footer:e(o.FOOTER).outerHeight(),sidebar:e(o.SIDEBAR).height()},n=this._max(t);e(o.CONTENT).css("min-height",n-t.header),e(o.SIDEBAR).css("min-height",n-t.header)},t.prototype._init=function(){var t=this;e("body").removeClass(r.HOLD),this.fixLayoutHeight(),e(o.SIDEBAR).on("collapsed.lte.treeview expanded.lte.treeview collapsed.lte.pushmenu expanded.lte.pushmenu",function(){t.fixLayoutHeight()}),e(window).resize(function(){t.fixLayoutHeight()}),e("body, html").css("height","auto")},t.prototype._max=function(e){var t=0;return Object.keys(e).forEach(function(n){e[n]>t&&(t=e[n])}),t},t._jQueryInterface=function(n){return this.each(function(){var i=e(this).data("lte.layout");i||(i=new t(this),e(this).data("lte.layout",i)),n&&i[n]()})},t}();return e(window).on("load",function(){a._jQueryInterface.call(e("body"))}),e.fn[t]=a._jQueryInterface,e.fn[t].Constructor=a,e.fn[t].noConflict=function(){return e.fn[t]=i,a._jQueryInterface},a}(jQuery),r=function(e){var t="PushMenu",i=e.fn[t],o={COLLAPSED:"collapsed.lte.pushmenu",SHOWN:"shown.lte.pushmenu"},r={screenCollapseSize:768},a={TOGGLE_BUTTON:'[data-widget="pushmenu"]',SIDEBAR_MINI:".sidebar-mini",SIDEBAR_COLLAPSED:".sidebar-collapse",BODY:"body",OVERLAY:"#sidebar-overlay",WRAPPER:".wrapper"},s={SIDEBAR_OPEN:"sidebar-open",COLLAPSED:"sidebar-collapse",OPEN:"sidebar-open",SIDEBAR_MINI:"sidebar-mini"},c=function(){function t(i,o){n(this,t),this._element=i,this._options=e.extend({},r,o),e(a.OVERLAY).length||this._addOverlay()}return t.prototype.show=function(){e(a.BODY).addClass(s.OPEN).removeClass(s.COLLAPSED);var t=e.Event(o.SHOWN);e(this._element).trigger(t)},t.prototype.collapse=function(){e(a.BODY).removeClass(s.OPEN).addClass(s.COLLAPSED);var t=e.Event(o.COLLAPSED);e(this._element).trigger(t)},t.prototype.toggle=function(){var t=void 0;t=e(window).width()>=this._options.screenCollapseSize?!e(a.BODY).hasClass(s.COLLAPSED):e(a.BODY).hasClass(s.OPEN),t?this.collapse():this.show()},t.prototype._addOverlay=function(){var t=this,n=e("<div />",{id:"sidebar-overlay"});n.on("click",function(){t.collapse()}),e(a.WRAPPER).append(n)},t._jQueryInterface=function(n){return this.each(function(){var i=e(this).data("lte.pushmenu");i||(i=new t(this),e(this).data("lte.pushmenu",i)),n&&i[n]()})},t}();return e(document).on("click",a.TOGGLE_BUTTON,function(t){t.preventDefault();var n=t.currentTarget;"pushmenu"!==e(n).data("widget")&&(n=e(n).closest(a.TOGGLE_BUTTON)),c._jQueryInterface.call(e(n),"toggle")}),e.fn[t]=c._jQueryInterface,e.fn[t].Constructor=c,e.fn[t].noConflict=function(){return e.fn[t]=i,c._jQueryInterface},c}(jQuery),a=function(e){var t="Treeview",i=e.fn[t],o={SELECTED:"selected.lte.treeview",EXPANDED:"expanded.lte.treeview",COLLAPSED:"collapsed.lte.treeview",LOAD_DATA_API:"load.lte.treeview"},r={LI:".nav-item",LINK:".nav-link",TREEVIEW_MENU:".nav-treeview",OPEN:".menu-open",DATA_WIDGET:'[data-widget="treeview"]'},a={LI:"nav-item",LINK:"nav-link",TREEVIEW_MENU:"nav-treeview",OPEN:"menu-open"},s={trigger:r.DATA_WIDGET+" "+r.LINK,animationSpeed:300,accordion:!0},c=function(){function t(e,i){n(this,t),this._config=i,this._element=e}return t.prototype.init=function(){this._setupListeners()},t.prototype.expand=function(t,n){var i=this,s=e.Event(o.EXPANDED);if(this._config.accordion){var c=n.siblings(r.OPEN).first(),u=c.find(r.TREEVIEW_MENU).first();this.collapse(u,c)}t.slideDown(this._config.animationSpeed,function(){n.addClass(a.OPEN),e(i._element).trigger(s)})},t.prototype.collapse=function(t,n){var i=this,s=e.Event(o.COLLAPSED);t.slideUp(this._config.animationSpeed,function(){n.removeClass(a.OPEN),e(i._element).trigger(s),t.find(r.OPEN+" > "+r.TREEVIEW_MENU).slideUp(),t.find(r.OPEN).removeClass(a.OPEN)})},t.prototype.toggle=function(t){var n=e(t.currentTarget),i=n.next();if(i.is(r.TREEVIEW_MENU)){t.preventDefault();var o=n.parents(r.LI).first();o.hasClass(a.OPEN)?this.collapse(e(i),o):this.expand(e(i),o)}},t.prototype._setupListeners=function(){var t=this;e(document).on("click",this._config.trigger,function(e){t.toggle(e)})},t._jQueryInterface=function(n){return this.each(function(){var i=e(this).data("lte.treeview"),o=e.extend({},s,e(this).data());i||(i=new t(e(this),o),e(this).data("lte.treeview",i)),"init"===n&&i[n]()})},t}();return e(window).on(o.LOAD_DATA_API,function(){e(r.DATA_WIDGET).each(function(){c._jQueryInterface.call(e(this),"init")})}),e.fn[t]=c._jQueryInterface,e.fn[t].Constructor=c,e.fn[t].noConflict=function(){return e.fn[t]=i,c._jQueryInterface},c}(jQuery),s=function(e){var i="Widget",o=e.fn[i],r={EXPANDED:"expanded.lte.widget",COLLAPSED:"collapsed.lte.widget",REMOVED:"removed.lte.widget"},a={DATA_REMOVE:'[data-widget="remove"]',DATA_COLLAPSE:'[data-widget="collapse"]',CARD:".card",CARD_HEADER:".card-header",CARD_BODY:".card-body",CARD_FOOTER:".card-footer",COLLAPSED:".collapsed-card"},s={COLLAPSED:"collapsed-card"},c={animationSpeed:"normal",collapseTrigger:a.DATA_COLLAPSE,removeTrigger:a.DATA_REMOVE},u=function(){function i(t,o){n(this,i),this._element=t,this._parent=t.parents(a.CARD).first(),this._settings=e.extend({},c,o)}return i.prototype.collapse=function(){var t=this;this._parent.children(a.CARD_BODY+", "+a.CARD_FOOTER).slideUp(this._settings.animationSpeed,function(){t._parent.addClass(s.COLLAPSED)});var n=e.Event(r.COLLAPSED);this._element.trigger(n,this._parent)},i.prototype.expand=function(){var t=this;this._parent.children(a.CARD_BODY+", "+a.CARD_FOOTER).slideDown(this._settings.animationSpeed,function(){t._parent.removeClass(s.COLLAPSED)});var n=e.Event(r.EXPANDED);this._element.trigger(n,this._parent)},i.prototype.remove=function(){this._parent.slideUp();var t=e.Event(r.REMOVED);this._element.trigger(t,this._parent)},i.prototype.toggle=function(){if(this._parent.hasClass(s.COLLAPSED))return void this.expand();this.collapse()},i.prototype._init=function(t){var n=this;this._parent=t,e(this).find(this._settings.collapseTrigger).click(function(){n.toggle()}),e(this).find(this._settings.removeTrigger).click(function(){n.remove()})},i._jQueryInterface=function(n){return this.each(function(){var o=e(this).data("lte.widget");o||(o=new i(e(this),o),e(this).data("lte.widget","string"==typeof n?o:n)),"string"==typeof n&&n.match(/remove|toggle/)?o[n]():"object"===(void 0===n?"undefined":t(n))&&o._init(e(this))})},i}();return e(document).on("click",a.DATA_COLLAPSE,function(t){t&&t.preventDefault(),u._jQueryInterface.call(e(this),"toggle")}),e(document).on("click",a.DATA_REMOVE,function(t){t&&t.preventDefault(),u._jQueryInterface.call(e(this),"remove")}),e.fn[i]=u._jQueryInterface,e.fn[i].Constructor=u,e.fn[i].noConflict=function(){return e.fn[i]=o,u._jQueryInterface},u}(jQuery);e.ControlSidebar=i,e.Layout=o,e.PushMenu=r,e.Treeview=a,e.Widget=s,Object.defineProperty(e,"__esModule",{value:!0})});