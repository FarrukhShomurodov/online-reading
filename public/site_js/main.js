/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/main.js":
/*!******************************!*\
  !*** ./resources/js/main.js ***!
  \******************************/
/***/ (() => {

$(window).on('load', function () {
  $('#preloader').fadeOut(300, function () {
    $('main').fadeIn(300);
  });
});
$(document).ready(function () {
  $('.menu-icon').on('click', function () {
    $('.menu-mobile-active').addClass('active');
    $('body').addClass('no-scroll');
  });
  $('.close-menu').on('click', function () {
    $('.menu-mobile-active').removeClass('active');
    $('body').removeClass('no-scroll');
  });
  $('.search-icon-mobile').on('click', function () {
    $('.search-mobile').toggleClass('search-container-mobile');
  });
  $('.search').on('focus', function () {
    $('.search-icon').css('filter', 'invert(79%) sepia(78%) saturate(1862%) hue-rotate(330deg) brightness(106%) contrast(103%)');
    $('.cross-icon').css('display', 'block');
  });
  $('.search').on('blur', function () {
    setTimeout(function () {
      $('.search-icon').css('filter', 'invert(68%) sepia(0%) saturate(13%) hue-rotate(166deg) brightness(91%) contrast(89%)');
      $('.cross-icon').css('display', 'none');
    }, 100);
    $('.cross-icon').click(function () {
      $('.search').val('');
    });
  });
  document.querySelector('.custom-select').addEventListener('click', function () {
    document.querySelector('.custom-select-options').classList.toggle('show');
  });
  document.querySelectorAll('.custom-select-option').forEach(function (option) {
    option.addEventListener('click', function () {
      var selectedOption = option.textContent.trim();
      var selectedFlag = option.querySelector('img').src;
      var customSelect = option.closest('.custom-select');
      var selectedTextContainer = customSelect.querySelector('.custom-select-selected');
      selectedTextContainer.textContent = selectedOption;
      var existingFlag = selectedTextContainer.querySelector('.selected-flag');
      if (existingFlag) {
        existingFlag.remove();
      }
      var flagImg = document.createElement('img');
      flagImg.src = selectedFlag;
      flagImg.alt = selectedOption;
      flagImg.classList.add('selected-flag');
      selectedTextContainer.insertBefore(flagImg, selectedTextContainer.firstChild);
    });
  });

  // Phone mask
  var phoneInput = $('.phone');
  phoneInput.on('focus', function () {
    if (!$(this).val().startsWith('+ 998')) {
      $(this).val('+ 998 ');
    }
  });
  phoneInput.mask('+ 998 (00) 000 00 00', {
    placeholder: '+ 998 (__) ___ __ __',
    clearIfNotMatch: true
  });
  phoneInput.on('blur', function () {
    if ($(this).val() === '+ 998 ') {
      $(this).val('');
    }
  });
  var inputs = $('.sms-code-input');
  inputs.on('input', function () {
    var $this = $(this);
    var value = $this.val();
    if (!/^\d$/.test(value)) {
      $this.val('');
      return;
    }
    var nextInput = $this.next('.sms-code-input');
    if (nextInput.length) {
      nextInput.focus();
    }
  });
  inputs.on('keydown', function (e) {
    var $this = $(this);
    if (e.key === 'Backspace' && !$this.val()) {
      var prevInput = $this.prev('.sms-code-input');
      if (prevInput.length) {
        prevInput.focus();
      }
    }
  });
  $('.login-link').on('click', function (event) {
    event.preventDefault();
    $('#auth-popup').css('display', 'flex');
  });
  $('.close-popup').on('click', function () {
    $('#auth-popup').css('display', 'none');
  });
  $('#register').on('click', function (event) {
    event.preventDefault();
    $('.register').css('display', 'block');
    $('.login').css('display', 'none');
  });
  $('#login').on('click', function (event) {
    event.preventDefault();
    $('.login').css('display', 'block');
    $('.register').css('display', 'none');
  });
  $(".star").on("click", function () {
    var rating = $(this).data("value");
    $("#ratting").val(rating);
    $(".star").removeClass("selected");
    $(this).addClass("selected");
    $(this).nextAll(".star").addClass("selected");
  });
  $("#hideAlert").on("click", function () {
    $('.review-alert').fadeOut(300);
  });
  $('#reviewText').on('input', function () {
    var maxLength = 600;
    var remaining = maxLength - $(this).val().length;
    $('#charCount').text("".concat(remaining));
  });
});

/***/ }),

/***/ "./resources/css/main-content.css":
/*!****************************************!*\
  !*** ./resources/css/main-content.css ***!
  \****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/css/room.css":
/*!********************************!*\
  !*** ./resources/css/room.css ***!
  \********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/css/style.css":
/*!*********************************!*\
  !*** ./resources/css/style.css ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/css/auth.css":
/*!********************************!*\
  !*** ./resources/css/auth.css ***!
  \********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/css/book-info.css":
/*!*************************************!*\
  !*** ./resources/css/book-info.css ***!
  \*************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/css/contacts.css":
/*!************************************!*\
  !*** ./resources/css/contacts.css ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/css/genres-book.css":
/*!***************************************!*\
  !*** ./resources/css/genres-book.css ***!
  \***************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/css/header.css":
/*!**********************************!*\
  !*** ./resources/css/header.css ***!
  \**********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/site_js/main": 0,
/******/ 			"css/header": 0,
/******/ 			"css/genres-book": 0,
/******/ 			"css/contacts": 0,
/******/ 			"css/book-info": 0,
/******/ 			"css/auth": 0,
/******/ 			"css/style": 0,
/******/ 			"css/room": 0,
/******/ 			"css/main-content": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/header","css/genres-book","css/contacts","css/book-info","css/auth","css/style","css/room","css/main-content"], () => (__webpack_require__("./resources/js/main.js")))
/******/ 	__webpack_require__.O(undefined, ["css/header","css/genres-book","css/contacts","css/book-info","css/auth","css/style","css/room","css/main-content"], () => (__webpack_require__("./resources/css/auth.css")))
/******/ 	__webpack_require__.O(undefined, ["css/header","css/genres-book","css/contacts","css/book-info","css/auth","css/style","css/room","css/main-content"], () => (__webpack_require__("./resources/css/book-info.css")))
/******/ 	__webpack_require__.O(undefined, ["css/header","css/genres-book","css/contacts","css/book-info","css/auth","css/style","css/room","css/main-content"], () => (__webpack_require__("./resources/css/contacts.css")))
/******/ 	__webpack_require__.O(undefined, ["css/header","css/genres-book","css/contacts","css/book-info","css/auth","css/style","css/room","css/main-content"], () => (__webpack_require__("./resources/css/genres-book.css")))
/******/ 	__webpack_require__.O(undefined, ["css/header","css/genres-book","css/contacts","css/book-info","css/auth","css/style","css/room","css/main-content"], () => (__webpack_require__("./resources/css/header.css")))
/******/ 	__webpack_require__.O(undefined, ["css/header","css/genres-book","css/contacts","css/book-info","css/auth","css/style","css/room","css/main-content"], () => (__webpack_require__("./resources/css/main-content.css")))
/******/ 	__webpack_require__.O(undefined, ["css/header","css/genres-book","css/contacts","css/book-info","css/auth","css/style","css/room","css/main-content"], () => (__webpack_require__("./resources/css/room.css")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/header","css/genres-book","css/contacts","css/book-info","css/auth","css/style","css/room","css/main-content"], () => (__webpack_require__("./resources/css/style.css")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;