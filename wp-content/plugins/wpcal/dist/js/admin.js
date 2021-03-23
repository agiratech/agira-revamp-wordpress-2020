/******/ (function(modules) { // webpackBootstrap
/******/ 	// install a JSONP callback for chunk loading
/******/ 	function webpackJsonpCallback(data) {
/******/ 		var chunkIds = data[0];
/******/ 		var moreModules = data[1];
/******/ 		var executeModules = data[2];
/******/
/******/ 		// add "moreModules" to the modules object,
/******/ 		// then flag all "chunkIds" as loaded and fire callback
/******/ 		var moduleId, chunkId, i = 0, resolves = [];
/******/ 		for(;i < chunkIds.length; i++) {
/******/ 			chunkId = chunkIds[i];
/******/ 			if(Object.prototype.hasOwnProperty.call(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 				resolves.push(installedChunks[chunkId][0]);
/******/ 			}
/******/ 			installedChunks[chunkId] = 0;
/******/ 		}
/******/ 		for(moduleId in moreModules) {
/******/ 			if(Object.prototype.hasOwnProperty.call(moreModules, moduleId)) {
/******/ 				modules[moduleId] = moreModules[moduleId];
/******/ 			}
/******/ 		}
/******/ 		if(parentJsonpFunction) parentJsonpFunction(data);
/******/
/******/ 		while(resolves.length) {
/******/ 			resolves.shift()();
/******/ 		}
/******/
/******/ 		// add entry modules from loaded chunk to deferred list
/******/ 		deferredModules.push.apply(deferredModules, executeModules || []);
/******/
/******/ 		// run deferred modules when all chunks ready
/******/ 		return checkDeferredModules();
/******/ 	};
/******/ 	function checkDeferredModules() {
/******/ 		var result;
/******/ 		for(var i = 0; i < deferredModules.length; i++) {
/******/ 			var deferredModule = deferredModules[i];
/******/ 			var fulfilled = true;
/******/ 			for(var j = 1; j < deferredModule.length; j++) {
/******/ 				var depId = deferredModule[j];
/******/ 				if(installedChunks[depId] !== 0) fulfilled = false;
/******/ 			}
/******/ 			if(fulfilled) {
/******/ 				deferredModules.splice(i--, 1);
/******/ 				result = __webpack_require__(__webpack_require__.s = deferredModule[0]);
/******/ 			}
/******/ 		}
/******/
/******/ 		return result;
/******/ 	}
/******/
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// object to store loaded and loading chunks
/******/ 	// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 	// Promise = chunk loading, 0 = chunk loaded
/******/ 	var installedChunks = {
/******/ 		"admin": 0
/******/ 	};
/******/
/******/ 	var deferredModules = [];
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "https://localhost:8080/";
/******/
/******/ 	var jsonpArray = window["wpcalMainWebpackJsonp"] = window["wpcalMainWebpackJsonp"] || [];
/******/ 	var oldJsonpFunction = jsonpArray.push.bind(jsonpArray);
/******/ 	jsonpArray.push = webpackJsonpCallback;
/******/ 	jsonpArray = jsonpArray.slice();
/******/ 	for(var i = 0; i < jsonpArray.length; i++) webpackJsonpCallback(jsonpArray[i]);
/******/ 	var parentJsonpFunction = oldJsonpFunction;
/******/
/******/
/******/ 	// add entry module to deferred list
/******/ 	deferredModules.push([0,"chunk-vendors","chunk-common"]);
/******/ 	// run deferred modules when ready
/******/ 	return checkDeferredModules();
/******/ })
/************************************************************************/
/******/ ({

/***/ 0:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("ad9c");


/***/ }),

/***/ "0131":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "02a3":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "03d0":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_InlineRadioSelector_vue_vue_type_style_index_0_id_32d5feb0_lang_css_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("f27a");
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_InlineRadioSelector_vue_vue_type_style_index_0_id_32d5feb0_lang_css_scoped_true___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_InlineRadioSelector_vue_vue_type_style_index_0_id_32d5feb0_lang_css_scoped_true___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_InlineRadioSelector_vue_vue_type_style_index_0_id_32d5feb0_lang_css_scoped_true___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "07f5":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_wf_stylesheet_css_vue_type_style_index_1_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("3f56");
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_wf_stylesheet_css_vue_type_style_index_1_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_wf_stylesheet_css_vue_type_style_index_1_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_wf_stylesheet_css_vue_type_style_index_1_lang_css___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "0d24":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "0d8b":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "1132":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "1505":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "2260":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ServiceFormEditView_vue_vue_type_style_index_0_id_114eca6a_lang_css_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("6ce5");
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ServiceFormEditView_vue_vue_type_style_index_0_id_114eca6a_lang_css_scoped_true___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ServiceFormEditView_vue_vue_type_style_index_0_id_114eca6a_lang_css_scoped_true___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ServiceFormEditView_vue_vue_type_style_index_0_id_114eca6a_lang_css_scoped_true___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "2a61":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ServiceFormStep3_vue_vue_type_style_index_0_id_23488004_lang_css_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("4cf0");
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ServiceFormStep3_vue_vue_type_style_index_0_id_23488004_lang_css_scoped_true___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ServiceFormStep3_vue_vue_type_style_index_0_id_23488004_lang_css_scoped_true___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ServiceFormStep3_vue_vue_type_style_index_0_id_23488004_lang_css_scoped_true___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "3bf5":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "3db8":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "3f56":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "4477":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ColorSelector_vue_vue_type_style_index_0_id_13a331cc_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("f3b6");
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ColorSelector_vue_vue_type_style_index_0_id_13a331cc_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ColorSelector_vue_vue_type_style_index_0_id_13a331cc_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ColorSelector_vue_vue_type_style_index_0_id_13a331cc_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "4753":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_TimeRange1ToN_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("02a3");
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_TimeRange1ToN_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_TimeRange1ToN_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_TimeRange1ToN_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "4ce0":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ServiceInviteeQuestions_vue_vue_type_style_index_1_id_03427841_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("ca06");
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ServiceInviteeQuestions_vue_vue_type_style_index_1_id_03427841_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ServiceInviteeQuestions_vue_vue_type_style_index_1_id_03427841_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ServiceInviteeQuestions_vue_vue_type_style_index_1_id_03427841_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "4cf0":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "4f67":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "4fc3":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_admin_app_css_vue_type_style_index_2_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("ac1b");
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_admin_app_css_vue_type_style_index_2_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_admin_app_css_vue_type_style_index_2_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_admin_app_css_vue_type_style_index_2_lang_css___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "524c":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ServiceAvailabilityCal_vue_vue_type_style_index_1_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("0d8b");
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ServiceAvailabilityCal_vue_vue_type_style_index_1_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ServiceAvailabilityCal_vue_vue_type_style_index_1_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ServiceAvailabilityCal_vue_vue_type_style_index_1_lang_css___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "5536":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_admin_settings_css_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("a95d");
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_admin_settings_css_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_admin_settings_css_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_admin_settings_css_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "59fb":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_admin_service_bookings_css_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("c6fa");
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_admin_service_bookings_css_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_admin_service_bookings_css_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_admin_service_bookings_css_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "5b43":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_AlertAdminToUpdateProfile_vue_vue_type_style_index_0_id_6cdd2802_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("1505");
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_AlertAdminToUpdateProfile_vue_vue_type_style_index_0_id_6cdd2802_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_AlertAdminToUpdateProfile_vue_vue_type_style_index_0_id_6cdd2802_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_AlertAdminToUpdateProfile_vue_vue_type_style_index_0_id_6cdd2802_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "5fd4":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ServiceInviteeQuestions_vue_vue_type_style_index_0_id_03427841_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("8b89");
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ServiceInviteeQuestions_vue_vue_type_style_index_0_id_03427841_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ServiceInviteeQuestions_vue_vue_type_style_index_0_id_03427841_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ServiceInviteeQuestions_vue_vue_type_style_index_0_id_03427841_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "6155":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_OnBoardingCheckList_vue_vue_type_style_index_0_id_3a2ea342_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("863f");
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_OnBoardingCheckList_vue_vue_type_style_index_0_id_3a2ea342_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_OnBoardingCheckList_vue_vue_type_style_index_0_id_3a2ea342_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_OnBoardingCheckList_vue_vue_type_style_index_0_id_3a2ea342_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "6ce5":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "704d":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "7178":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_SettingAccountSignupLogin_vue_vue_type_style_index_0_id_429e40b8_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("3db8");
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_SettingAccountSignupLogin_vue_vue_type_style_index_0_id_429e40b8_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_SettingAccountSignupLogin_vue_vue_type_style_index_0_id_429e40b8_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_SettingAccountSignupLogin_vue_vue_type_style_index_0_id_429e40b8_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "7c3d":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_OnOffSlider_vue_vue_type_style_index_0_id_94b82392_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("d1bc");
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_OnOffSlider_vue_vue_type_style_index_0_id_94b82392_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_OnOffSlider_vue_vue_type_style_index_0_id_94b82392_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_OnOffSlider_vue_vue_type_style_index_0_id_94b82392_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "7f09":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_SettingIntegrations_vue_vue_type_style_index_1_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("3bf5");
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_SettingIntegrations_vue_vue_type_style_index_1_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_SettingIntegrations_vue_vue_type_style_index_1_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_SettingIntegrations_vue_vue_type_style_index_1_lang_css___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "80f7":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ServiceList_vue_vue_type_style_index_0_id_01aecee4_lang_css_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("de9d");
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ServiceList_vue_vue_type_style_index_0_id_01aecee4_lang_css_scoped_true___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ServiceList_vue_vue_type_style_index_0_id_01aecee4_lang_css_scoped_true___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ServiceList_vue_vue_type_style_index_0_id_01aecee4_lang_css_scoped_true___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "863f":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "8b89":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "9719":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ServiceAvailabilityCal_vue_vue_type_style_index_0_id_7066fc36_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("1132");
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ServiceAvailabilityCal_vue_vue_type_style_index_0_id_7066fc36_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ServiceAvailabilityCal_vue_vue_type_style_index_0_id_7066fc36_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ServiceAvailabilityCal_vue_vue_type_style_index_0_id_7066fc36_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "a128":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "a550":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "a95d":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "ac1b":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "ad9c":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
// ESM COMPAT FLAG
__webpack_require__.r(__webpack_exports__);

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.array.iterator.js
var es_array_iterator = __webpack_require__("e260");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.promise.js
var es_promise = __webpack_require__("e6cf");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.object.assign.js
var es_object_assign = __webpack_require__("cca6");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.promise.finally.js
var es_promise_finally = __webpack_require__("a79d");

// CONCATENATED MODULE: ./src/utils/client_end_admin.js
window.__wpcal_client_end = "admin";
/* harmony default export */ var client_end_admin = ({
  __dummy_cliend_end: "admin"
});
// EXTERNAL MODULE: ./node_modules/vue/dist/vue.runtime.esm.js
var vue_runtime_esm = __webpack_require__("2b0e");

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js?{"cacheDirectory":"node_modules/.cache/vue-loader","cacheIdentifier":"23115053-vue-loader-template"}!./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/AdminApp.vue?vue&type=template&id=df9321ec&
var AdminAppvue_type_template_id_df9321ec_render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',{style:(_vm.main_styles),attrs:{"id":"wpcal_admin_app"}},[_c('IconFillSVG'),(_vm.is_settings_loaded)?_c('router-view'):_vm._e(),_c('OnBoardingCheckList'),_c('PricingCompareModal')],1)}
var staticRenderFns = []


// CONCATENATED MODULE: ./src/AdminApp.vue?vue&type=template&id=df9321ec&

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js?{"cacheDirectory":"node_modules/.cache/vue-loader","cacheIdentifier":"23115053-vue-loader-template"}!./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/components/admin/OnBoardingCheckList.vue?vue&type=template&id=3a2ea342&scoped=true&
var OnBoardingCheckListvue_type_template_id_3a2ea342_scoped_true_render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('span',[(
        _vm.display_in == 'settings_calendars' &&
          _vm.is_show_todo_notice('add_calendar_account')
      )?_c('div',{staticStyle:{"background-color":"rgb(228, 233, 245)","border":"1px dashed rgb(86, 123, 243)","padding":"10px","border-radius":"5px","margin-bottom":"20px","display":"inline-block"}},[_vm._v(" You can, optionally, connect your Google Calendar account to sync your events. "),_c('a',{staticStyle:{"margin-left":"10px"},attrs:{"type":"button"},on:{"click":function($event){return _vm.dismiss_todo('add_calendar_account')}}},[_vm._v(" Dismiss ")])]):_vm._e(),(
        _vm.display_in == 'settings_integrations' &&
          _vm.is_show_todo_notice('add_meeting_app')
      )?_c('div',{staticStyle:{"background-color":"rgb(228, 233, 245)","border":"1px dashed rgb(86, 123, 243)","padding":"10px","border-radius":"5px","margin-bottom":"20px","display":"inline-block"}},[_vm._v(" Connect your meeting app accounts to use them as locations. When you invitees book with you, we'll email them the meeting links. "),_c('a',{staticStyle:{"margin-left":"10px"},attrs:{"type":"button"},on:{"click":function($event){return _vm.dismiss_todo('add_meeting_app')}}},[_vm._v(" Dismiss ")])]):_vm._e(),(_vm.display_in == 'admin_all' && _vm.is_show_onboarding_checklist)?_c('div',{staticClass:"ob-checklist-cont"},[_c('div',{staticClass:"hdr"},[_c('div',{staticClass:"ln1"},[_vm._v(_vm._s(_vm.T__("Let's get you started...")))]),_c('div',{staticClass:"ln2"},[_vm._v(_vm._s(_vm.T__("Setup your booking in 2 easy steps")))])]),_c('ul',[_c('li',{class:[_vm.todo_class('add_calendar_account')]},[_c('router-link',{attrs:{"to":"/settings/calendars"}},[_vm._v(_vm._s(_vm.T__("Connect calendar account")))])],1),_c('li',{class:[_vm.todo_class('add_meeting_app')]},[_c('router-link',{attrs:{"to":"/settings/integrations"}},[_vm._v(_vm._s(_vm.T__("Connect meeting app account")))])],1)])]):_vm._e()])}
var OnBoardingCheckListvue_type_template_id_3a2ea342_scoped_true_staticRenderFns = []


// CONCATENATED MODULE: ./src/components/admin/OnBoardingCheckList.vue?vue&type=template&id=3a2ea342&scoped=true&

// EXTERNAL MODULE: ./node_modules/axios/index.js
var axios = __webpack_require__("bc3a");
var axios_default = /*#__PURE__*/__webpack_require__.n(axios);

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js??ref--12-0!./node_modules/thread-loader/dist/cjs.js!./node_modules/babel-loader/lib!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/components/admin/OnBoardingCheckList.vue?vue&type=script&lang=js&
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ var OnBoardingCheckListvue_type_script_lang_js_ = ({
  name: "OnBoardingCheckList",
  props: {
    display_in: {
      type: String,
      default: "admin_all"
    }
  },
  computed: {
    is_show_onboarding_checklist: function is_show_onboarding_checklist() {
      var _this$onboarding_chec;

      if (this.$store.getters.get_license_info === null) {
        //propably not data not loaded
        return false;
      }

      if (this._isEmpty(this.$store.getters.get_license_info)) {
        //initial setup not done, another page gonna ask admin for login
        return false;
      }

      if (!this.onboarding_checklist_notice) {
        return false;
      }

      if (((_this$onboarding_chec = this.onboarding_checklist_notice) === null || _this$onboarding_chec === void 0 ? void 0 : _this$onboarding_chec.status) && this.onboarding_checklist_notice.status == "dismissed") {
        return false;
      }

      return true;
    },
    onboarding_checklist_notice: function onboarding_checklist_notice() {
      var current_admin_notices = this.$store.getters.get_current_admin_notices;

      if (current_admin_notices == null) {
        //not yet loaded
        return false;
      }

      if (current_admin_notices === null || current_admin_notices === void 0 ? void 0 : current_admin_notices.onboarding_checklist) {
        return current_admin_notices === null || current_admin_notices === void 0 ? void 0 : current_admin_notices.onboarding_checklist;
      }

      return false;
    },
    onboarding_checklist_details: function onboarding_checklist_details() {
      var _this$onboarding_chec2;

      var onboarding_checklist_details = (_this$onboarding_chec2 = this.onboarding_checklist_notice) === null || _this$onboarding_chec2 === void 0 ? void 0 : _this$onboarding_chec2.details;
      return onboarding_checklist_details;
    }
  },
  methods: {
    todo_class: function todo_class(todo) {
      var _this$onboarding_chec3, _this$onboarding_chec4;

      if (((_this$onboarding_chec3 = this.onboarding_checklist_details) === null || _this$onboarding_chec3 === void 0 ? void 0 : _this$onboarding_chec3[todo]) == "completed" || ((_this$onboarding_chec4 = this.onboarding_checklist_details) === null || _this$onboarding_chec4 === void 0 ? void 0 : _this$onboarding_chec4[todo]) == "dismissed") {
        return "completed";
      }

      return "";
    },
    is_show_todo_notice: function is_show_todo_notice(todo) {
      var _this$onboarding_chec5, _this$onboarding_chec6, _this$onboarding_chec7;

      if (!((_this$onboarding_chec5 = this.onboarding_checklist_details) === null || _this$onboarding_chec5 === void 0 ? void 0 : _this$onboarding_chec5[todo])) {
        return false;
      }

      if (((_this$onboarding_chec6 = this.onboarding_checklist_details) === null || _this$onboarding_chec6 === void 0 ? void 0 : _this$onboarding_chec6[todo]) == "completed" || ((_this$onboarding_chec7 = this.onboarding_checklist_details) === null || _this$onboarding_chec7 === void 0 ? void 0 : _this$onboarding_chec7[todo]) == "dismissed") {
        return false;
      }

      return true;
    },
    dismiss_todo: function dismiss_todo(todo) {
      var _this = this;

      var wpcal_request = {};
      var action = "update_admin_notices";
      var onboarding_checklist_notice = this.clone_deep(this.onboarding_checklist_notice);
      onboarding_checklist_notice.details[todo] = "dismissed";
      wpcal_request[action] = {
        onboarding_checklist: onboarding_checklist_notice
      };
      var action2 = "get_admin_notices";
      wpcal_request[action2] = "dummy__";
      var post_data = {
        action: "wpcal_process_admin_ajax_request",
        wpcal_request: wpcal_request
      };
      axios_default.a.post(window.wpcal_ajax.ajax_url, post_data).then(function (response) {
        _this.notify_single_action_result(response.data[action], {
          success_msg: _this.T__("Successfully dismissed.")
        });

        if (response.data[action2].status === "success" && response.data[action2].hasOwnProperty("current_admin_notices")) {
          _this.$store.commit("set_store_by_obj", {
            current_admin_notices: response.data[action2].current_admin_notices
          });
        }
      }).catch(function (error) {
        console.log(error);
      });
    }
  }
});
// CONCATENATED MODULE: ./src/components/admin/OnBoardingCheckList.vue?vue&type=script&lang=js&
 /* harmony default export */ var admin_OnBoardingCheckListvue_type_script_lang_js_ = (OnBoardingCheckListvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/components/admin/OnBoardingCheckList.vue?vue&type=style&index=0&id=3a2ea342&scoped=true&lang=css&
var OnBoardingCheckListvue_type_style_index_0_id_3a2ea342_scoped_true_lang_css_ = __webpack_require__("6155");

// EXTERNAL MODULE: ./node_modules/vue-loader/lib/runtime/componentNormalizer.js
var componentNormalizer = __webpack_require__("2877");

// CONCATENATED MODULE: ./src/components/admin/OnBoardingCheckList.vue






/* normalize component */

var component = Object(componentNormalizer["a" /* default */])(
  admin_OnBoardingCheckListvue_type_script_lang_js_,
  OnBoardingCheckListvue_type_template_id_3a2ea342_scoped_true_render,
  OnBoardingCheckListvue_type_template_id_3a2ea342_scoped_true_staticRenderFns,
  false,
  null,
  "3a2ea342",
  null
  
)

/* harmony default export */ var OnBoardingCheckList = (component.exports);
// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js?{"cacheDirectory":"node_modules/.cache/vue-loader","cacheIdentifier":"23115053-vue-loader-template"}!./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/components/admin/PricingCompareModal.vue?vue&type=template&id=1dcb5696&
var PricingCompareModalvue_type_template_id_1dcb5696_render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',[_c('modal',{staticStyle:{"z-index":"9999"},attrs:{"name":"pricing_compare_modal","width":'700px',"height":"auto","scrollable":true,"adaptive":true}},[_c('PricingStrongerTogether')],1)],1)}
var PricingCompareModalvue_type_template_id_1dcb5696_staticRenderFns = []


// CONCATENATED MODULE: ./src/components/admin/PricingCompareModal.vue?vue&type=template&id=1dcb5696&

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js?{"cacheDirectory":"node_modules/.cache/vue-loader","cacheIdentifier":"23115053-vue-loader-template"}!./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/components/admin/PricingStrongerTogether.vue?vue&type=template&id=34bd2deb&scoped=true&
var PricingStrongerTogethervue_type_template_id_34bd2deb_scoped_true_render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _vm._m(0)}
var PricingStrongerTogethervue_type_template_id_34bd2deb_scoped_true_staticRenderFns = [function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',{staticClass:"covid-consent-cont-table-plus"},[_c('div',{staticStyle:{"text-align":"center","display":"flex","width":"100%"}},[_c('div',{staticStyle:{"padding-right":"20px","padding-top":"10px"}},[_vm._v("🚨")]),_c('div',{staticStyle:{"flex":"1"}},[_vm._v(" To help you schedule meetings remotely, we are offering "),_c('strong',[_vm._v("all paid features 100% FREE")]),_vm._v(" exclusively for use during the COVID-19 crisis. ")]),_c('div',{staticStyle:{"padding-left":"20px","padding-top":"10px"}},[_vm._v("🚨")])]),_c('table',[_c('tr',[_c('td'),_c('td',[_vm._v("Free forever")]),_c('td',[_vm._v("Plus & Pro plans")]),_c('td',[_vm._v(" Stronger, Together! Plan "),_c('div',{staticStyle:{"background-color":"#fff200","font-size":"11px","font-weight":"normal","margin-top":"5px"}},[_vm._v(" All paid features 100% Free during Covid-19 crisis ")])])]),_c('tr',[_c('td',[_vm._v("Number of websites you can use the plugin on")]),_c('td',[_vm._v("Unlimited")]),_c('td',[_vm._v("Upto 5 sites")]),_c('td',[_vm._v("Unlimited")])]),_c('tr',[_c('td',[_vm._v("Number of active Event Types")]),_c('td',[_vm._v("1 active event type")]),_c('td',[_vm._v("Unlimited")]),_c('td',[_vm._v("Unlimited")])]),_c('tr',[_c('td',[_vm._v("Unlimited event scheduling by invitees")]),_c('td',[_c('span',{staticClass:"check"})]),_c('td',[_c('span',{staticClass:"check"})]),_c('td',[_c('span',{staticClass:"check"})])]),_c('tr',[_c('td',[_vm._v("Number of WP admins who can create an event type")]),_c('td',[_vm._v("1 admin per site")]),_c('td',[_vm._v("Upto 10 admins per site")]),_c('td',[_vm._v("Upto 10 admins per site")])]),_c('tr',[_c('td',[_vm._v("Number of connected calendar accounts")]),_c('td',[_vm._v("1 calendar account per user")]),_c('td',[_vm._v("Unlimited calendar accounts per user")]),_c('td',[_vm._v("Unlimited calendar accounts per user")])]),_c('tr',[_c('td',[_vm._v("Google Calendar integration")]),_c('td',[_c('span',{staticClass:"check"})]),_c('td',[_c('span',{staticClass:"check"})]),_c('td',[_c('span',{staticClass:"check"})])]),_c('tr',[_c('td',[_vm._v("Zoom, GoToMeeting, Google Meet integrations")]),_c('td',[_c('span',{staticClass:"check"})]),_c('td',[_c('span',{staticClass:"check"})]),_c('td',[_c('span',{staticClass:"check"})])]),_c('tr',[_c('td',[_vm._v("Additional questions")]),_c('td',[_vm._v("1")]),_c('td',[_vm._v(" Unlimited ")]),_c('td',[_vm._v(" Unlimited ")])]),_c('tr',[_c('td',[_vm._v("Brand customization")]),_c('td'),_c('td',[_c('span',{staticClass:"check"})]),_c('td',[_c('span',{staticClass:"check"})])])]),_c('div',{staticStyle:{"text-align":"right"}},[_c('a',{attrs:{"href":"https://wpcal.io/?utm_source=wpcal_plugin&utm_medium=stronger_together_dialog#pricing","target":"_blank"}},[_vm._v("See Pricing for more Premium features ↗")])])])}]


// CONCATENATED MODULE: ./src/components/admin/PricingStrongerTogether.vue?vue&type=template&id=34bd2deb&scoped=true&

// EXTERNAL MODULE: ./src/components/admin/PricingStrongerTogether.vue?vue&type=style&index=0&id=34bd2deb&scoped=true&lang=css&
var PricingStrongerTogethervue_type_style_index_0_id_34bd2deb_scoped_true_lang_css_ = __webpack_require__("f648");

// CONCATENATED MODULE: ./src/components/admin/PricingStrongerTogether.vue

var script = {}



/* normalize component */

var PricingStrongerTogether_component = Object(componentNormalizer["a" /* default */])(
  script,
  PricingStrongerTogethervue_type_template_id_34bd2deb_scoped_true_render,
  PricingStrongerTogethervue_type_template_id_34bd2deb_scoped_true_staticRenderFns,
  false,
  null,
  "34bd2deb",
  null
  
)

/* harmony default export */ var PricingStrongerTogether = (PricingStrongerTogether_component.exports);
// CONCATENATED MODULE: ./src/utils/event_bus.js

/* harmony default export */ var event_bus = (new vue_runtime_esm["default"]());
// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js??ref--12-0!./node_modules/thread-loader/dist/cjs.js!./node_modules/babel-loader/lib!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/components/admin/PricingCompareModal.vue?vue&type=script&lang=js&
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ var PricingCompareModalvue_type_script_lang_js_ = ({
  components: {
    PricingStrongerTogether: PricingStrongerTogether
  },
  mounted: function mounted() {
    var _this = this;

    event_bus.$on("show-pricing-compare-modal", function (payload) {
      _this.$modal.show("pricing_compare_modal");
    });
  }
});
// CONCATENATED MODULE: ./src/components/admin/PricingCompareModal.vue?vue&type=script&lang=js&
 /* harmony default export */ var admin_PricingCompareModalvue_type_script_lang_js_ = (PricingCompareModalvue_type_script_lang_js_); 
// CONCATENATED MODULE: ./src/components/admin/PricingCompareModal.vue





/* normalize component */

var PricingCompareModal_component = Object(componentNormalizer["a" /* default */])(
  admin_PricingCompareModalvue_type_script_lang_js_,
  PricingCompareModalvue_type_template_id_1dcb5696_render,
  PricingCompareModalvue_type_template_id_1dcb5696_staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* harmony default export */ var PricingCompareModal = (PricingCompareModal_component.exports);
// EXTERNAL MODULE: ./src/assets/images/IconFillSVG.vue + 2 modules
var IconFillSVG = __webpack_require__("93fb");

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js??ref--12-0!./node_modules/thread-loader/dist/cjs.js!./node_modules/babel-loader/lib!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/AdminApp.vue?vue&type=script&lang=js&
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//



/* harmony default export */ var AdminAppvue_type_script_lang_js_ = ({
  components: {
    OnBoardingCheckList: OnBoardingCheckList,
    PricingCompareModal: PricingCompareModal,
    IconFillSVG: IconFillSVG["a" /* default */]
  },
  computed: {
    is_settings_loaded: function is_settings_loaded() {
      return !this._isEmpty(this.$store.getters.get_general_settings);
    },
    main_styles: function main_styles() {
      var styles = {};
      var general_setting = this.$store.getters.get_general_settings;

      if (general_setting.hasOwnProperty("hide_premium_info_badges") && general_setting.hide_premium_info_badges == "0") {
        styles["--hidePremiumInfoBadge"] = "block";
      }

      return styles;
    }
  },
  methods: {
    check_and_handle_license_info: function check_and_handle_license_info() {
      if (this.$store.getters.get_license_info === null) {
        //propably not data not loaded
        return;
      }

      if (this._isEmpty(this.$store.getters.get_license_info)) {
        //initial setup not done, ask admin for login
        this.$router.push("/settings/account/login");
      }
    }
  },
  watch: {
    "$store.getters.get_license_info": function $storeGettersGet_license_info() {
      this.check_and_handle_license_info();
    }
  },
  created: function created() {
    this.$store.dispatch("init");
  }
});
// CONCATENATED MODULE: ./src/AdminApp.vue?vue&type=script&lang=js&
 /* harmony default export */ var src_AdminAppvue_type_script_lang_js_ = (AdminAppvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/AdminApp.vue?vue&type=style&index=0&lang=scss&
var AdminAppvue_type_style_index_0_lang_scss_ = __webpack_require__("eec2");

// EXTERNAL MODULE: ./src/assets/fonts/wf-stylesheet.css?vue&type=style&index=1&lang=css&
var wf_stylesheetvue_type_style_index_1_lang_css_ = __webpack_require__("07f5");

// EXTERNAL MODULE: ./src/assets/css/admin_app.css?vue&type=style&index=2&lang=css&
var admin_appvue_type_style_index_2_lang_css_ = __webpack_require__("4fc3");

// CONCATENATED MODULE: ./src/AdminApp.vue








/* normalize component */

var AdminApp_component = Object(componentNormalizer["a" /* default */])(
  src_AdminAppvue_type_script_lang_js_,
  AdminAppvue_type_template_id_df9321ec_render,
  staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* harmony default export */ var AdminApp = (AdminApp_component.exports);
// EXTERNAL MODULE: ./node_modules/regenerator-runtime/runtime.js
var runtime = __webpack_require__("96cf");

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/esm/asyncToGenerator.js
var asyncToGenerator = __webpack_require__("1da1");

// EXTERNAL MODULE: ./node_modules/vue-router/dist/vue-router.esm.js
var vue_router_esm = __webpack_require__("8c4f");

// EXTERNAL MODULE: ./node_modules/vuex/dist/vuex.esm.js
var vuex_esm = __webpack_require__("2f62");

// EXTERNAL MODULE: ./src/store/common_module.js
var common_module = __webpack_require__("cdab");

// CONCATENATED MODULE: ./src/store/admin.js


vue_runtime_esm["default"].use(vuex_esm["a" /* default */]);

/* harmony default export */ var admin = (new vuex_esm["a" /* default */].Store({
  strict: true,
  modules: {
    common: common_module["a" /* default */]
  },
  state: {
    client_end: "admin",
    store: {
      license_info: null,
      current_admin_details: {},
      current_admin_notices: null,
      wpcal_site_urls: {}
    }
  },
  mutations: {
    set_license_info: function set_license_info(state, value) {
      state.store.license_info = value;
    },
    set_store_by_obj: function set_store_by_obj(state, value_obj) {
      for (var prop in value_obj) {
        if (state.store.hasOwnProperty(prop)) {
          state.store[prop] = value_obj[prop];
        }
      }
    }
  },
  getters: {
    // get_client: state => state.client,
    // get_store: state => state.store,
    get_license_info: function get_license_info(state) {
      return state.store.license_info;
    },
    get_current_admin_details: function get_current_admin_details(state) {
      return state.store.current_admin_details;
    },
    get_current_admin_notices: function get_current_admin_notices(state) {
      return state.store.current_admin_notices;
    },
    get_wpcal_site_urls: function get_wpcal_site_urls(state) {
      return state.store.wpcal_site_urls;
    }
  },
  actions: {}
}));
// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js?{"cacheDirectory":"node_modules/.cache/vue-loader","cacheIdentifier":"23115053-vue-loader-template"}!./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/views/admin/ServiceList.vue?vue&type=template&id=01aecee4&scoped=true&
var ServiceListvue_type_template_id_01aecee4_scoped_true_render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',[_c('div',[_c('div',{staticClass:"page-title-cont"},[_c('h1',{staticClass:"wp-heading-inline"},[_vm._v("WPCal.io - "+_vm._s(_vm.T__("Event Types")))]),_c('router-link',{staticClass:"page-title-action",attrs:{"to":"/event-type/add"}},[_vm._v(_vm._s(_vm.T__("+ Create New Event Type")))]),_c('PremiumInfoBadge',{staticStyle:{"margin":"-2px 0 0 10px"}},[_c('em',[_vm._v("Free: 1 active event type"),_c('br'),_vm._v("Plus: Unlimited")])]),_c('AdminHeaderRight')],1),_c('div',{staticClass:"service-list-cont"},_vm._l((_vm.service_list_final),function(service,index){
var _obj, _obj$1;
return _c('div',{key:index,staticClass:"service-list-single",class:( _obj = {}, _obj['clr-' + service.color] = true, _obj.inactive = service.status == -1, _obj )},[_c('h4',[_c('a',{attrs:{"href":'#/event-type/edit/' + service.id}},[_vm._v(_vm._s(service.name))])]),_c('div',{staticClass:"et-edit-link"},[_c('a',{attrs:{"href":'#/event-type/edit/' + service.id},on:{"click":function($event){return _vm.toggle_service_menu(service.id)}}},[_vm._v(_vm._s(_vm.T__("EDIT")))])]),_c('span',{class:( _obj$1 = {}, _obj$1['service_overflow_options_' + service.id] = true, _obj$1 )},[_c('a',{staticClass:"overflow-btn",staticStyle:{"float":"right"},on:{"click":function($event){return _vm.toggle_service_menu(service.id)}}}),_c('span',{staticClass:"overflow-options",class:{
              hidden: _vm.menu_open_service_id != service.id
            }},[_c('a',{staticClass:"menu-item",staticStyle:{"color":"rgb(232, 70, 83)"},on:{"click":function($event){return _vm.may_show_service_status_change_dialog(-2, service)}}},[_vm._v(_vm._s(_vm.T__("Delete this Event Type")))]),_c('hr'),_c('div',{staticClass:"menu-item",staticStyle:{"display":"flex"}},[_c('span',{staticStyle:{"color":"#7c7d9c !important","font-size":"13px"}},[_vm._v(_vm._s(_vm.T__("On/Off")))]),(service.status == 1 || service.status == -1)?_c('OnOffSlider',{staticStyle:{"margin-left":"auto"},attrs:{"name":service.id,"true_value":"1","false_value":"-1"},on:{"prop-slider-value-changed":function($event){return _vm.may_show_service_status_change_dialog($event, service)}},model:{value:(service.status),callback:function ($$v) {_vm.$set(service, "status", $$v)},expression:"service.status"}}):_vm._e()],1)])]),_c('div',{staticClass:"et-meta"},[_vm._v(" "+_vm._s(_vm._f("mins_to_str")(service.duration))+", "+_vm._s(_vm._f("relationship_type_str")(service.relationship_type))+" ")]),(service.post_details.link)?_c('div',{staticStyle:{"display":"flex","margin-top":"auto"}},[_c('a',{staticClass:"view-booking-page",attrs:{"href":service.post_details.link,"target":"_blank"}},[_vm._v(_vm._s(_vm.T__("View Booking Page")))]),_c('div',{staticStyle:{"margin-left":"auto"}},[_c('img',{staticStyle:{"border-radius":"50%"},attrs:{"src":_vm.$store.getters.get_current_admin_details.profile_picture,"width":"30","title":'This event type is available only for ' +
                  _vm.$store.getters.get_current_admin_details.display_name +
                  '.'}})])]):_vm._e()])}),0)]),_c('v-dialog'),(_vm.sample_real_service_details && _vm.sample_real_service_details.name)?_c('AlertAdminToUpdateProfile',{attrs:{"service_details":_vm.sample_real_service_details}}):_vm._e()],1)}
var ServiceListvue_type_template_id_01aecee4_scoped_true_staticRenderFns = []


// CONCATENATED MODULE: ./src/views/admin/ServiceList.vue?vue&type=template&id=01aecee4&scoped=true&

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js?{"cacheDirectory":"node_modules/.cache/vue-loader","cacheIdentifier":"23115053-vue-loader-template"}!./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/components/form_elements/OnOffSlider.vue?vue&type=template&id=94b82392&scoped=true&
var OnOffSlidervue_type_template_id_94b82392_scoped_true_render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',{staticClass:"slider"},[_c('input',{directives:[{name:"model",rawName:"v-model",value:(_vm.slider_value),expression:"slider_value"}],staticClass:"slider-checkbox",attrs:{"type":"checkbox","id":'slider_' + _vm.name,"true-value":_vm.true_value,"false-value":_vm.false_value},domProps:{"checked":Array.isArray(_vm.slider_value)?_vm._i(_vm.slider_value,null)>-1:_vm._q(_vm.slider_value,_vm.true_value)},on:{"change":function($event){var $$a=_vm.slider_value,$$el=$event.target,$$c=$$el.checked?(_vm.true_value):(_vm.false_value);if(Array.isArray($$a)){var $$v=null,$$i=_vm._i($$a,$$v);if($$el.checked){$$i<0&&(_vm.slider_value=$$a.concat([$$v]))}else{$$i>-1&&(_vm.slider_value=$$a.slice(0,$$i).concat($$a.slice($$i+1)))}}else{_vm.slider_value=$$c}}}}),_c('label',{staticClass:"slider-label",attrs:{"for":'slider_' + _vm.name}},[_c('span',{staticClass:"slider-inner"}),_c('span',{staticClass:"slider-circle"})])])}
var OnOffSlidervue_type_template_id_94b82392_scoped_true_staticRenderFns = []


// CONCATENATED MODULE: ./src/components/form_elements/OnOffSlider.vue?vue&type=template&id=94b82392&scoped=true&

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js??ref--12-0!./node_modules/thread-loader/dist/cjs.js!./node_modules/babel-loader/lib!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/components/form_elements/OnOffSlider.vue?vue&type=script&lang=js&
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ var OnOffSlidervue_type_script_lang_js_ = ({
  name: "OnOffSlider",
  model: {
    prop: "prop_slider_value",
    event: "prop-slider-value-changed"
  },
  props: {
    prop_slider_value: {
      type: String
    },
    name: {
      type: String
    },
    true_value: {},
    false_value: {}
  },
  computed: {
    slider_value: {
      get: function get() {
        return this.prop_slider_value;
      },
      set: function set(new_value) {
        this.$emit("prop-slider-value-changed", new_value);
      }
    }
  }
});
// CONCATENATED MODULE: ./src/components/form_elements/OnOffSlider.vue?vue&type=script&lang=js&
 /* harmony default export */ var form_elements_OnOffSlidervue_type_script_lang_js_ = (OnOffSlidervue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/components/form_elements/OnOffSlider.vue?vue&type=style&index=0&id=94b82392&scoped=true&lang=css&
var OnOffSlidervue_type_style_index_0_id_94b82392_scoped_true_lang_css_ = __webpack_require__("7c3d");

// CONCATENATED MODULE: ./src/components/form_elements/OnOffSlider.vue






/* normalize component */

var OnOffSlider_component = Object(componentNormalizer["a" /* default */])(
  form_elements_OnOffSlidervue_type_script_lang_js_,
  OnOffSlidervue_type_template_id_94b82392_scoped_true_render,
  OnOffSlidervue_type_template_id_94b82392_scoped_true_staticRenderFns,
  false,
  null,
  "94b82392",
  null
  
)

/* harmony default export */ var OnOffSlider = (OnOffSlider_component.exports);
// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js?{"cacheDirectory":"node_modules/.cache/vue-loader","cacheIdentifier":"23115053-vue-loader-template"}!./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/components/admin/AlertAdminToUpdateProfile.vue?vue&type=template&id=6cdd2802&scoped=true&
var AlertAdminToUpdateProfilevue_type_template_id_6cdd2802_scoped_true_render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return (_vm.is_current_admin_profile_needs_an_update)?_c('div',[_c('modal',{staticStyle:{"z-index":"9999"},attrs:{"name":"alert_admin_to_update_profile_modal","width":'600px',"height":'auto',"adaptive":true}},[_c('div',{staticStyle:{"text-align":"center","padding":"20px"}},[_c('div',{staticStyle:{"font-size":"16px","font-weight":"500"}},[_vm._v(" "+_vm._s(_vm.T__("Booking Widget Info Preview"))+" ")]),_c('div',{staticClass:"gravatar-name-onboarding"},[_c('img',{attrs:{"src":_vm.admin_details.profile_picture}}),_c('div',{staticClass:"display-name"},[_vm._v(_vm._s(_vm.admin_details.display_name))]),(_vm.service_details.name)?_c('div',{staticClass:"event-type-name"},[_vm._v(" "+_vm._s(_vm.service_details.name)+" ")]):_vm._e(),(_vm.service_details.duration)?_c('div',{staticClass:"event-type-duration"},[_vm._v(" "+_vm._s(_vm._f("mins_to_str")(_vm.service_details.duration))+" ")]):_vm._e()]),_c('div',{staticStyle:{"font-size":"16px","margin-bottom":"20px","line-height":"1.6em"}},[_vm._v(" "+_vm._s(_vm.T__("Want to change your Avatar or Display name?"))+" "),_c('br'),_vm._v(" "+_vm._s(_vm.T__("Go to"))+" "),_c('router-link',{staticStyle:{"font-size":"16px"},attrs:{"to":"/settings/profile"}},[_vm._v(_vm._s(_vm.T__("Settings › Profile"))+" ")])],1),_c('a',{on:{"click":_vm.dismiss_notice}},[_vm._v(_vm._s(_vm.T__("Nope, everything looks good")))])])]),_c('a',{staticStyle:{"display":"none"},on:{"click":_vm.check_and_show_alert_to_admin}},[_vm._v("Lorem ipsum... Admin profile check")])],1):_vm._e()}
var AlertAdminToUpdateProfilevue_type_template_id_6cdd2802_scoped_true_staticRenderFns = []


// CONCATENATED MODULE: ./src/components/admin/AlertAdminToUpdateProfile.vue?vue&type=template&id=6cdd2802&scoped=true&

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js??ref--12-0!./node_modules/thread-loader/dist/cjs.js!./node_modules/babel-loader/lib!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/components/admin/AlertAdminToUpdateProfile.vue?vue&type=script&lang=js&


//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ var AlertAdminToUpdateProfilevue_type_script_lang_js_ = ({
  props: {
    service_details: {}
  },
  computed: {
    is_current_admin_profile_needs_an_update: function is_current_admin_profile_needs_an_update() {
      if (this._isEmpty(this.admin_details)) {
        return false;
      }

      var admin_details = this.admin_details;

      if (!admin_details.id) {
        return false;
      }

      var current_admin_notices = this.$store.getters.get_current_admin_notices;

      if (current_admin_notices == null) {
        //not yet loaded
        return false;
      }

      if (current_admin_notices.hasOwnProperty("alert_admin_to_update_profile_for_name_v2") && current_admin_notices.alert_admin_to_update_profile_for_name_v2.hasOwnProperty("status") && current_admin_notices.alert_admin_to_update_profile_for_name_v2.status == "dismissed") {
        return false;
      }

      return true;
    },
    admin_details: function admin_details() {
      return this.$store.getters.get_current_admin_details;
    }
  },
  methods: {
    show_alert_admin_to_update_profile_modal: function show_alert_admin_to_update_profile_modal() {
      this.$modal.show("alert_admin_to_update_profile_modal");
    },
    check_and_show_alert_to_admin: function check_and_show_alert_to_admin() {
      var _this = this;

      return Object(asyncToGenerator["a" /* default */])( /*#__PURE__*/regeneratorRuntime.mark(function _callee() {
        return regeneratorRuntime.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                _context.next = 2;
                return _this.$store.dispatch("get_settings_and_defaults", {
                  background_call: true
                });

              case 2:
                //to get latest data and show alert.
                if (_this.is_current_admin_profile_needs_an_update) {
                  _this.show_alert_admin_to_update_profile_modal();
                }

              case 3:
              case "end":
                return _context.stop();
            }
          }
        }, _callee);
      }))();
    },
    dismiss_notice: function dismiss_notice() {
      var _this2 = this;

      this.$modal.hide("alert_admin_to_update_profile_modal");
      var wpcal_request = {};
      var action = "update_admin_notices";
      wpcal_request[action] = {
        alert_admin_to_update_profile_for_name_v2: {
          status: "dismissed"
        }
      };
      var action2 = "get_admin_notices";
      wpcal_request[action2] = "dummy__";
      var post_data = {
        action: "wpcal_process_admin_ajax_request",
        wpcal_request: wpcal_request
      };
      axios_default.a.post(window.wpcal_ajax.ajax_url, post_data).then(function (response) {
        //console.log(response);
        _this2.notify_single_action_result(response.data[action], {
          success_msg: _this2.T__("Successfully dismissed.")
        });

        if (response.data[action2].status === "success" && response.data[action2].hasOwnProperty("current_admin_notices")) {
          _this2.$store.commit("set_store_by_obj", {
            current_admin_notices: response.data[action2].current_admin_notices
          });
        }
      }).catch(function (error) {
        console.log(error);
      });
    }
  },
  mounted: function mounted() {
    var _this3 = this;

    setTimeout(function () {
      return _this3.check_and_show_alert_to_admin();
    }, 1000);
  }
});
// CONCATENATED MODULE: ./src/components/admin/AlertAdminToUpdateProfile.vue?vue&type=script&lang=js&
 /* harmony default export */ var admin_AlertAdminToUpdateProfilevue_type_script_lang_js_ = (AlertAdminToUpdateProfilevue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/components/admin/AlertAdminToUpdateProfile.vue?vue&type=style&index=0&id=6cdd2802&scoped=true&lang=css&
var AlertAdminToUpdateProfilevue_type_style_index_0_id_6cdd2802_scoped_true_lang_css_ = __webpack_require__("5b43");

// CONCATENATED MODULE: ./src/components/admin/AlertAdminToUpdateProfile.vue






/* normalize component */

var AlertAdminToUpdateProfile_component = Object(componentNormalizer["a" /* default */])(
  admin_AlertAdminToUpdateProfilevue_type_script_lang_js_,
  AlertAdminToUpdateProfilevue_type_template_id_6cdd2802_scoped_true_render,
  AlertAdminToUpdateProfilevue_type_template_id_6cdd2802_scoped_true_staticRenderFns,
  false,
  null,
  "6cdd2802",
  null
  
)

/* harmony default export */ var AlertAdminToUpdateProfile = (AlertAdminToUpdateProfile_component.exports);
// EXTERNAL MODULE: ./node_modules/core-js/modules/es.array.index-of.js
var es_array_index_of = __webpack_require__("c975");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.function.name.js
var es_function_name = __webpack_require__("b0c0");

// CONCATENATED MODULE: ./src/utils/admin_service_status_toggle_mixin.js



var admin_service_status_toggle_mixin = {
  methods: {
    may_show_service_status_change_dialog: function may_show_service_status_change_dialog(status, service) {
      var _this = this;

      var allowed_status = [1, -1, -2, "1", "-1", "-2"];

      if (allowed_status.indexOf(status) == -1) {
        return;
      }

      if (this.$options.name == "ServiceList" && status != 1) {
        this.toggle_service_menu(service.id);
      }

      var delete_disable_str = "<ul class='bull'><li>" + this.T__("Exisiting bookings will NOT be affected.") + "</li><li>" + this.T__("New booking and rescheduling will NOT be allowed.") + "</li><li>" + this.T__("Cancellation will be allowed.") + "</li></ul>";
      var status_action_str = this.T__("turn on");
      var button_str = this.T__("Turn On");
      var detail_str = "";

      if (status == -1) {
        status_action_str = this.T__("turn off");
        button_str = '<span style="color: #ff7600;">' + this.T__("Turn Off") + "</span>";
        detail_str = delete_disable_str;
      } else if (status == -2) {
        status_action_str = "delete";
        button_str = '<strong style="color: #ff0000;">' + this.T__("Delete") + "</strong>";
        detail_str = delete_disable_str;
      } else if (status == 1) {
        this.change_service_status(status, service);
        return;
      }

      this.$modal.show("dialog", {
        title: this.T__("Alert"),
        text: this.Tsprintf(
        /* translators: 1: turn on off 2: html-tag-open 3: html-tag-open 4: event type name */
        this.T__("Are you sure, do you want to %1$s the %2$s %4$s %3$s event type?"), status_action_str, "<strong>", "</strong>", service.name) + " <br > " + detail_str,
        buttons: [{
          title: button_str,
          handler: function handler() {
            _this.change_service_status(status, service);

            _this.$modal.hide("dialog");
          }
        }, {
          title: this.T__("Cancel"),
          default: true,
          // Will be triggered by default if 'Enter' pressed.
          handler: function handler() {
            _this.load_page();

            _this.$modal.hide("dialog");
          }
        }]
      });
    },
    change_service_status: function change_service_status(status, service) {
      var _this2 = this;

      var wpcal_request = {};
      var action_update_status = "update_service_status_of_current_admin";
      wpcal_request[action_update_status] = {
        service_id: service.id,
        status: status
      };
      var action_get_services = "get_services_of_current_admin";

      if (this.$options.name == "ServiceList") {
        wpcal_request[action_get_services] = {
          dummy__: ""
        };
      }

      var action_edit_service = "edit_service";

      if (this.$options.name == "ServiceForm") {
        wpcal_request[action_edit_service] = {
          service_id: this.service_id
        };
      }

      var post_data = {
        action: "wpcal_process_admin_ajax_request",
        wpcal_request: wpcal_request
      };
      axios_default.a.post(window.wpcal_ajax.ajax_url, post_data).then(function (response) {
        //console.log(response);
        if (response.data && response.data[action_update_status].hasOwnProperty("status")) {//alert(response.data[action_update_status].status);
        }

        if (_this2.$options.name == "ServiceList") {
          if (response.data && response.data[action_get_services].hasOwnProperty("service_list")) {
            _this2.service_list = response.data[action_get_services].service_list;
          }
        }

        if (_this2.$options.name == "ServiceForm") {
          if (response.data && response.data[action_edit_service].hasOwnProperty("service_data")) {
            _this2.form = response.data[action_edit_service].service_data;
            _this2.saved_form = _this2.clone_deep(_this2.form);
          }
        }
      }).catch(function (error) {
        console.log(error);
      });
    }
  }
};
// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js??ref--12-0!./node_modules/thread-loader/dist/cjs.js!./node_modules/babel-loader/lib!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/views/admin/ServiceList.vue?vue&type=script&lang=js&
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//




/* harmony default export */ var ServiceListvue_type_script_lang_js_ = ({
  name: "ServiceList",
  mixins: [admin_service_status_toggle_mixin],
  components: {
    OnOffSlider: OnOffSlider,
    AlertAdminToUpdateProfile: AlertAdminToUpdateProfile
  },
  data: function data() {
    return {
      document_title: this.T__("Event Types"),
      service_list: {},
      menu_open_service_id: null
    };
  },
  computed: {
    service_list_final: function service_list_final() {
      if (!Array.isArray(this.service_list) || !this.service_list.length) {
        return [];
      }

      var service_list_tmp = this.clone_deep(this.service_list);
      service_list_tmp.sort(function (a, b) {
        return b.id - a.id;
      }); //latest first - decending

      return service_list_tmp;
    },
    sample_real_service_details: function sample_real_service_details() {
      var service_details = null;

      if (Array.isArray(this.service_list_final) && this.service_list_final.length) {
        for (var service_key in this.service_list_final) {
          if (this.service_list_final[service_key].status == "1") {
            service_details = this.clone_deep(this.service_list_final[service_key]);
            break;
          }
        }

        if (!service_details) {
          //If non of the service is active
          service_details = this.clone_deep(this.service_list_final[0]);
        }
      }

      return service_details;
    }
  },
  methods: {
    load_page: function load_page() {
      var _this = this;

      var action = "get_services_of_current_admin";
      var wpcal_request = {};
      wpcal_request[action] = {
        dummy__: ""
      };
      var post_data = {
        action: "wpcal_process_admin_ajax_request",
        wpcal_request: wpcal_request
      };
      axios_default.a.post(window.wpcal_ajax.ajax_url, post_data).then(function (response) {
        //console.log(response);
        if (response.data && response.data[action].hasOwnProperty("service_list")) {
          _this.service_list = response.data[action].service_list;
        }
      }).catch(function (error) {
        console.log(error);
      });
    },
    toggle_service_menu: function toggle_service_menu(service_id) {
      var _this2 = this;

      this.menu_open_service_id = this.menu_open_service_id == service_id ? null : service_id;

      if (this.menu_open_service_id) {
        setTimeout(function () {
          _this2.on_click_outside(".service_overflow_options_" + service_id, function () {
            if (_this2.menu_open_service_id == service_id) {
              _this2.menu_open_service_id = null;
            }
          });
        }, 100);
      }
    }
  },
  mounted: function mounted() {
    this.load_page();
  }
});
// CONCATENATED MODULE: ./src/views/admin/ServiceList.vue?vue&type=script&lang=js&
 /* harmony default export */ var admin_ServiceListvue_type_script_lang_js_ = (ServiceListvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/views/admin/ServiceList.vue?vue&type=style&index=0&id=01aecee4&lang=css&scoped=true&
var ServiceListvue_type_style_index_0_id_01aecee4_lang_css_scoped_true_ = __webpack_require__("80f7");

// CONCATENATED MODULE: ./src/views/admin/ServiceList.vue






/* normalize component */

var ServiceList_component = Object(componentNormalizer["a" /* default */])(
  admin_ServiceListvue_type_script_lang_js_,
  ServiceListvue_type_template_id_01aecee4_scoped_true_render,
  ServiceListvue_type_template_id_01aecee4_scoped_true_staticRenderFns,
  false,
  null,
  "01aecee4",
  null
  
)

/* harmony default export */ var ServiceList = (ServiceList_component.exports);
// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js?{"cacheDirectory":"node_modules/.cache/vue-loader","cacheIdentifier":"23115053-vue-loader-template"}!./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/views/admin/ServiceForm.vue?vue&type=template&id=590f9aea&
var ServiceFormvue_type_template_id_590f9aea_render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',[_c('div',{staticClass:"page-title-cont"},[_c('h1',{staticClass:"wp-heading-inline"},[_vm._v("WPCal.io - "+_vm._s(_vm.page_title))]),_c('AdminHeaderRight')],1),_c('div',{class:{
      'create-event-type': _vm.view == 'add',
      'edit-event-type': _vm.view == 'edit'
    }},[_c('div',{staticClass:"steps-main",class:{ 'step-last': _vm.view == 'add' && _vm.tabs_flow.steps[2].form }},[(_vm.view == 'add')?_c('div',[_c('div',{staticClass:"validation_errors_cont"}),_c('ServiceFormStep1',{attrs:{"$v":_vm.$v,"step":_vm.tabs_flow.steps[0],"view":_vm.view,"form":_vm.form},on:{"validate-may-navigate-or-submit":function($event){return _vm.validate_may_navigate_or_submit($event)},"set-active-step-and-toggle":_vm.set_active_step_and_toggle}}),_c('ServiceFormStep2',{attrs:{"$v":_vm.$v,"step":_vm.tabs_flow.steps[1],"view":_vm.view,"form":_vm.form,"create_or_update_btn_is_enabled":_vm.create_or_update_btn_is_enabled},on:{"validate-may-navigate-or-submit":function($event){return _vm.validate_may_navigate_or_submit($event)},"set-active-step-and-toggle":_vm.set_active_step_and_toggle}}),_c('ServiceFormStep3',{attrs:{"$v":_vm.$v,"step":_vm.tabs_flow.steps[2],"view":_vm.view,"form":_vm.form,"create_or_update_btn_is_enabled":_vm.create_or_update_btn_is_enabled},on:{"validate-may-navigate-or-submit":function($event){return _vm.validate_may_navigate_or_submit($event)}}})],1):_vm._e(),(_vm.view == 'edit')?_c('div',[_c('div',{staticClass:"validation_errors_cont"})]):_vm._e(),(_vm.view == 'edit')?_c('ServiceFormEditView',{attrs:{"$v":_vm.$v,"view":_vm.view,"service_id":_vm.service_id,"form":_vm.form,"saved_form":_vm.saved_form,"edit_view":_vm.edit_view,"create_or_update_btn_is_enabled":_vm.create_or_update_btn_is_enabled},on:{"submit-form":function($event){return _vm.validate_may_navigate_or_submit($event)},"save-questions":function($event){return _vm.form_submit()},"edit-view-toggle-steps":function($event){return _vm.edit_view_toggle_steps($event)},"change-service-status":function($event){return _vm.may_show_service_status_change_dialog($event, {
            id: _vm.service_id,
            name: _vm.saved_form.name
          })}}}):_vm._e()],1)]),_c('v-dialog'),_c('AdminInfoLine',{attrs:{"timezone":_vm.saved_form.timezone,"info_slugs":_vm.view == 'edit'
        ? [
            'booking_default_reminder_email',
            'timings_in_timezone',
            'ownership_single_event_type'
          ]
        : ['ownership_single_event_type']}})],1)}
var ServiceFormvue_type_template_id_590f9aea_staticRenderFns = []


// CONCATENATED MODULE: ./src/views/admin/ServiceForm.vue?vue&type=template&id=590f9aea&

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js?{"cacheDirectory":"node_modules/.cache/vue-loader","cacheIdentifier":"23115053-vue-loader-template"}!./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/components/admin/ServiceFormStep1.vue?vue&type=template&id=83e7af8a&scoped=true&
var ServiceFormStep1vue_type_template_id_83e7af8a_scoped_true_render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',[_c('div',{directives:[{name:"show",rawName:"v-show",value:(_vm.step.form),expression:"step.form"}],staticClass:"step-single form active"},[_c('div',{staticClass:"step-title"},[_vm._v(_vm._s(_vm.T__("Select Invitee Type")))]),_c('div',{staticClass:"form",on:{"submit":function($event){$event.preventDefault();}}},[_c('form-row',{attrs:{"validator":_vm.$v.form.relationship_type}},[_c('ul',{staticClass:"selector block"},[_c('li',[_c('input',{directives:[{name:"model",rawName:"v-model",value:(_vm.form.relationship_type),expression:"form.relationship_type"}],attrs:{"type":"radio","id":"one-on-one","value":"1to1"},domProps:{"checked":_vm._q(_vm.form.relationship_type,"1to1")},on:{"change":function($event){return _vm.$set(_vm.form, "relationship_type", "1to1")}}}),_c('label',{attrs:{"for":"one-on-one"}},[_c('div',{staticClass:"txt-h4"},[_vm._v(_vm._s(_vm.T__("One-on-One")))]),_c('div',{staticClass:"txt-help"},[_vm._v(" "+_vm._s(_vm.T__("Allow invitees to book individual slots with you."))+" ")])])]),_c('li',{staticClass:"disabled"},[_c('input',{attrs:{"type":"radio","id":"invitee-group","disabled":""}}),_c('label',{attrs:{"for":"invitee-group"}},[_c('div',{staticClass:"txt-h4"},[_vm._v(" "+_vm._s(_vm.T__("Group"))+" "),_c('span',{staticClass:"tag"},[_vm._v(_vm._s(_vm.T__("COMING SOON")))])]),_c('div',{staticClass:"txt-help"},[_vm._v(" "+_vm._s(_vm.T__( "Allow multiple invitees to book the same slot. Useful for tours, webinars, classes, workshops, etc." ))+" ")])])])])]),_c('div',{staticClass:"form-row"},[_c('button',{staticClass:"wpc-btn primary lg",attrs:{"type":"button"},on:{"click":function($event){return _vm.$emit('validate-may-navigate-or-submit', 1)}}},[_vm._v(" "+_vm._s(_vm.T__("Continue"))+" ")])])],1)]),_c('div',{directives:[{name:"show",rawName:"v-show",value:(_vm.step.summary),expression:"step.summary"}],staticClass:"step-single summary"},[_c('div',{staticClass:"step-title"},[_c('span',[_vm._v(_vm._s(_vm.T__("Invitees type")))]),_c('a',{on:{"click":function($event){return _vm.$emit('set-active-step-and-toggle', 1)}}},[_vm._v(_vm._s(_vm.T__("EDIT")))])]),_c('div',{staticClass:"step-summary-content"},[_vm._v(_vm._s(_vm.T__("One-on-One")))])])])}
var ServiceFormStep1vue_type_template_id_83e7af8a_scoped_true_staticRenderFns = []


// CONCATENATED MODULE: ./src/components/admin/ServiceFormStep1.vue?vue&type=template&id=83e7af8a&scoped=true&

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js??ref--12-0!./node_modules/thread-loader/dist/cjs.js!./node_modules/babel-loader/lib!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/components/admin/ServiceFormStep1.vue?vue&type=script&lang=js&
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ var ServiceFormStep1vue_type_script_lang_js_ = ({
  name: "ServiceFormStep1",
  props: {
    view: {
      type: String
    },
    step: {
      type: Object,
      required: true
    },
    form: {
      type: Object,
      required: true
    },
    $v: {}
  },
  mounted: function mounted() {
    if (this.view == "add") {
      this.$props.step.summary = true;
    }
  }
});
// CONCATENATED MODULE: ./src/components/admin/ServiceFormStep1.vue?vue&type=script&lang=js&
 /* harmony default export */ var admin_ServiceFormStep1vue_type_script_lang_js_ = (ServiceFormStep1vue_type_script_lang_js_); 
// CONCATENATED MODULE: ./src/components/admin/ServiceFormStep1.vue





/* normalize component */

var ServiceFormStep1_component = Object(componentNormalizer["a" /* default */])(
  admin_ServiceFormStep1vue_type_script_lang_js_,
  ServiceFormStep1vue_type_template_id_83e7af8a_scoped_true_render,
  ServiceFormStep1vue_type_template_id_83e7af8a_scoped_true_staticRenderFns,
  false,
  null,
  "83e7af8a",
  null
  
)

/* harmony default export */ var ServiceFormStep1 = (ServiceFormStep1_component.exports);
// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js?{"cacheDirectory":"node_modules/.cache/vue-loader","cacheIdentifier":"23115053-vue-loader-template"}!./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/components/admin/ServiceFormStep2.vue?vue&type=template&id=5f73c678&
var ServiceFormStep2vue_type_template_id_5f73c678_render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',[_c('div',{directives:[{name:"show",rawName:"v-show",value:(_vm.step.upcoming),expression:"step.upcoming"}],staticClass:"step-single upcoming"},[_c('div',{staticClass:"step-title"},[_vm._v(_vm._s(_vm.T__("Event type details")))])]),_c('div',{directives:[{name:"show",rawName:"v-show",value:(_vm.step.form),expression:"step.form"}],staticClass:"step-single form active",attrs:{"id":'service_form_step' + _vm.step.id}},[_c('div',{staticClass:"step-title"},[_vm._v(_vm._s(_vm.T__("Event Type Details")))]),_c('div',{staticClass:"form",on:{"submit":function($event){$event.preventDefault();}}},[_c('form-row',{attrs:{"validator":_vm.$v.form.name}},[_c('label',{attrs:{"for":"form_name"}},[_vm._v(" "+_vm._s(_vm.T__("Event type name"))+" "),_c('abbr',{staticClass:"required",attrs:{"title":"required"}},[_vm._v("*")]),_c('em',[_vm._v(_vm._s(_vm.T__("required")))])]),_c('span',{staticClass:"txt-help"},[_vm._v(" "+_vm._s(_vm.T__( "The event type name will be visible to your invitees. Enter something that will guide them through the booking process. Eg. Consultation call with John." ))+" ")]),_c('input',{directives:[{name:"model",rawName:"v-model",value:(_vm.form.name),expression:"form.name"}],ref:"service_name",attrs:{"id":"form_name","type":"text"},domProps:{"value":(_vm.form.name)},on:{"blur":function($event){return _vm.$v.form.name.$touch()},"input":function($event){if($event.target.composing){ return; }_vm.$set(_vm.form, "name", $event.target.value)}}})]),(_vm.view == 'add')?_c('div',{staticClass:"form-row"},[_c('label',{staticStyle:{"cursor":"default"},attrs:{"for":"form_unique_link"}},[_vm._v(" "+_vm._s(_vm.T__("Event type booking page"))+" ")]),_c('span',{staticClass:"txt-help"},[_vm._v(" "+_vm._s(_vm.T__( "A page will be created and the booking widget will be added to it. You can manage it after creating this event type." ))+" ")])]):_vm._e(),_c('form-row',[_c('label',[_vm._v(" "+_vm._s(_vm.T__("Location (online & offline)"))+" "),_c('em',[_vm._v(_vm._s(_vm.T__("optional")))])]),_c('span',{staticClass:"txt-help"},[_vm._v(" "+_vm._s(_vm.T__( "Use this to specify how and where both parties will connect at the scheduled time. This will be displayed in the booking screen." ))+" ")]),_c('AdminLocationSelector',{model:{value:(_vm.form.locations),callback:function ($$v) {_vm.$set(_vm.form, "locations", $$v)},expression:"form.locations"}})],1),_c('form-row',{attrs:{"validator":_vm.$v.form.descr}},[_c('label',{attrs:{"for":"form_descr"}},[_vm._v(" "+_vm._s(_vm.T__("Description/Instructions"))+" "),_c('em',[_vm._v(_vm._s(_vm.T__("optional")))])]),_c('span',{staticClass:"txt-help"},[_vm._v(" "+_vm._s(_vm.T__( "Use this to provide a short description of your event. This will be displayed in the booking screen." ))+" ")]),_c('textarea',{directives:[{name:"model",rawName:"v-model",value:(_vm.form.descr),expression:"form.descr"}],attrs:{"id":"form_descr"},domProps:{"value":(_vm.form.descr)},on:{"input":function($event){if($event.target.composing){ return; }_vm.$set(_vm.form, "descr", $event.target.value)}}})]),_c('form-row',{attrs:{"validator":_vm.$v.form.color}},[_c('label',[_vm._v(" "+_vm._s(_vm.T__("Event type color"))+" "),_c('em',[_vm._v(_vm._s(_vm.T__("required")))])]),_c('ColorSelector',{attrs:{"form":_vm.form,"color_prop":"color"}})],1),_c('div',{staticClass:"form-row"},[(_vm.view == 'add')?_c('button',{staticClass:"wpc-btn primary lg",attrs:{"type":"button"},on:{"click":function($event){return _vm.$emit('validate-may-navigate-or-submit', 2)}}},[_vm._v(" "+_vm._s(_vm.T__("Continue"))+" ")]):(_vm.view == 'edit')?_c('button',{staticClass:"wpc-btn primary lg",attrs:{"type":"button","disabled":!_vm.create_or_update_btn_is_enabled},on:{"click":function($event){return _vm.$emit('submit-form', 2)}}},[_vm._v(" "+_vm._s(_vm.T__("Save"))+" ")]):_vm._e(),(_vm.view == 'edit')?_c('button',{staticClass:"wpc-btn tert-link sm mt10 center",attrs:{"type":"button"},on:{"click":function($event){return _vm.$emit('edit-view-toggle-steps')}}},[_vm._v(" "+_vm._s(_vm.T__("Cancel"))+" ")]):_vm._e()])],1)]),_c('div',{directives:[{name:"show",rawName:"v-show",value:(_vm.step.summary),expression:"step.summary"}],staticClass:"step-single summary"},[_c('div',{staticClass:"step-title"},[_c('span',[_vm._v(_vm._s(_vm.T__("Event type details")))]),_c('a',{on:{"click":function($event){return _vm.$emit('set-active-step-and-toggle', 2)}}},[_vm._v(_vm._s(_vm.T__("EDIT")))])]),_c('div',{staticClass:"step-summary-content"},[_c('div',[_vm._v(_vm._s(_vm.form.name))]),(_vm.form.locations.length)?_c('div',[_c('span',{staticStyle:{"display":"flex"},domProps:{"innerHTML":_vm._f("locations_summary")(_vm.form.locations)}})]):_vm._e()])])])}
var ServiceFormStep2vue_type_template_id_5f73c678_staticRenderFns = []


// CONCATENATED MODULE: ./src/components/admin/ServiceFormStep2.vue?vue&type=template&id=5f73c678&

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js?{"cacheDirectory":"node_modules/.cache/vue-loader","cacheIdentifier":"23115053-vue-loader-template"}!./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/components/form_elements/ColorSelector.vue?vue&type=template&id=13a331cc&scoped=true&
var ColorSelectorvue_type_template_id_13a331cc_scoped_true_render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',[_c('ul',{staticClass:"event-type-colors"},_vm._l((_vm.colors),function(val,index){return _c('li',{key:index},[_c('input',{directives:[{name:"model",rawName:"v-model",value:(_vm.form[_vm.color_prop]),expression:"form[color_prop]"}],attrs:{"type":"radio","id":'clr-' + index,"name":"event-type-clr"},domProps:{"value":val,"checked":_vm._q(_vm.form[_vm.color_prop],val)},on:{"change":function($event){return _vm.$set(_vm.form, _vm.color_prop, val)}}}),_c('label',{class:'clr-' + val,attrs:{"for":'clr-' + index}})])}),0)])}
var ColorSelectorvue_type_template_id_13a331cc_scoped_true_staticRenderFns = []


// CONCATENATED MODULE: ./src/components/form_elements/ColorSelector.vue?vue&type=template&id=13a331cc&scoped=true&

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js??ref--12-0!./node_modules/thread-loader/dist/cjs.js!./node_modules/babel-loader/lib!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/components/form_elements/ColorSelector.vue?vue&type=script&lang=js&
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ var ColorSelectorvue_type_script_lang_js_ = ({
  props: {
    form: {},
    color_prop: {}
  },
  data: function data() {
    return {
      colors: ["chill", "sunflower", "nephritis", "carrot", "belize", "alizarin", "wisteria", "prunus", "midnightblue", "concrete"]
    };
  }
});
// CONCATENATED MODULE: ./src/components/form_elements/ColorSelector.vue?vue&type=script&lang=js&
 /* harmony default export */ var form_elements_ColorSelectorvue_type_script_lang_js_ = (ColorSelectorvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/components/form_elements/ColorSelector.vue?vue&type=style&index=0&id=13a331cc&scoped=true&lang=css&
var ColorSelectorvue_type_style_index_0_id_13a331cc_scoped_true_lang_css_ = __webpack_require__("4477");

// CONCATENATED MODULE: ./src/components/form_elements/ColorSelector.vue






/* normalize component */

var ColorSelector_component = Object(componentNormalizer["a" /* default */])(
  form_elements_ColorSelectorvue_type_script_lang_js_,
  ColorSelectorvue_type_template_id_13a331cc_scoped_true_render,
  ColorSelectorvue_type_template_id_13a331cc_scoped_true_staticRenderFns,
  false,
  null,
  "13a331cc",
  null
  
)

/* harmony default export */ var ColorSelector = (ColorSelector_component.exports);
// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js?{"cacheDirectory":"node_modules/.cache/vue-loader","cacheIdentifier":"23115053-vue-loader-template"}!./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/components/form_elements/AdminLocationSelector.vue?vue&type=template&id=f092bcbc&
var AdminLocationSelectorvue_type_template_id_f092bcbc_render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',[_c('div',{staticClass:"form-row",staticStyle:{"margin-bottom":"0"}},[_c('div',{directives:[{name:"drag-and-drop",rawName:"v-drag-and-drop:options",value:(
        _vm.selected_locations.length > 1
          ? _vm.selected_locations_drag_drop_options
          : {}
      ),expression:"\n        selected_locations.length > 1\n          ? selected_locations_drag_drop_options\n          : {}\n      ",arg:"options"}],key:_vm.selected_locations.length > 1 ? 100 : 0,staticClass:"mbox cal-accs",staticStyle:{"margin-bottom":"0"}},[_c('div',{staticClass:"set-locations-cont",on:{"reordered":_vm.reorder_selected_locations}},_vm._l((_vm.selected_locations),function(selected_location,index){
      var _obj;
return _c('div',{key:index,staticClass:"set-locations-single",class:( _obj = {}, _obj['location_' + selected_location.type] = true, _obj['del-alert'] =  _vm.show_delete_alert(index), _obj ),attrs:{"data-id":index}},[_c('div',{class:{ 'reorder-handle': _vm.selected_locations.length > 1 }}),_c('div',{staticClass:"txt-h5"},[_vm._v(" "+_vm._s(_vm._f("location_name_by_type")(selected_location.type))+" "),(_vm.is_having_edit_options(selected_location))?_c('a',{staticStyle:{"float":"right","margin-right":"30px"},on:{"click":function($event){return _vm.may_show_popup_form(selected_location, 'edit', index)}}},[_vm._v(_vm._s(_vm.T__("EDIT")))]):_vm._e()]),_c('div',{staticClass:"icon-delete",on:{"click":function($event){_vm.remove_from_selected_locations(index);
              _vm.set_mouseover(index, false);},"mouseover":function($event){return _vm.set_mouseover(index, true)},"mouseleave":function($event){return _vm.set_mouseover(index, false)}}}),(
              _vm.is_tp_service_account_added(selected_location.type) !== false
            )?_c('div',{staticClass:"txt-help"},[_vm._v(" "+_vm._s(_vm.get_meta_data_for_location(selected_location))+" ")]):_vm._e(),(
              _vm.is_tp_service_account_added(selected_location.type) === false
            )?_c('div',{staticClass:"txt-help",staticStyle:{"margin-top":"5px","color":"#ea1919"}},[_vm._v(" "+_vm._s(_vm.Tsprintf( /* translators: %s: app name */ _vm.T__( "%s is not connected. Until you do, it will not show up in Booking widget." ), _vm.$options.filters.location_name_by_type(selected_location.type) ))+" "),(selected_location.type == 'googlemeet_meeting')?_c('span',{domProps:{"innerHTML":_vm._s(
                _vm.Tsprintf(
                  /* translators: 1: html-tag-open 2: html-tag-close */
                  _vm.T__(
                    'Go to %1$sCalendar settings%2$s connect a calendar account (if not done already), and set "Add Bookings to..." calendar.'
                  ),
                  '<a href="admin.php?page=wpcal_admin#/settings/calendars" target="_blank" style="text-decoration:underline">',
                  '</a>'
                )
              )}}):_c('span',{domProps:{"innerHTML":_vm._s(
                _vm.Tsprintf(
                  /* translators: 1: html-tag-open 2: html-tag-close */
                  _vm.T__(
                    'Go to the %1$sIntegrations%2$s page to connect it now.'
                  ),
                  '<a href="admin.php?page=wpcal_admin#/settings/integrations" target="_blank" style="text-decoration:underline">',
                  '</a>'
                )
              )}})]):_vm._e()])}),0),(_vm.selected_locations.length)?_c('span',{staticClass:"txt-help",staticStyle:{"padding-top":"0","padding-bottom":"5px"}},[_vm._v(_vm._s(_vm.T__( "You can give more location options from which your invitees can choose one." )))]):_vm._e(),(!_vm.show_add_location_list)?_c('button',{staticClass:"wpc-btn secondary md full-width",attrs:{"disabled":!_vm.enable_add_new_location,"title":!_vm.enable_add_new_location
            ? this.T__('You can add only upto 10 locations.')
            : ''},on:{"click":function($event){_vm.show_add_location_list = true}}},[_vm._v(" "+_vm._s(_vm.T__("+ Add Location"))+" ")]):_vm._e(),(_vm.show_add_location_list)?_c('div',[_c('div',{staticClass:"txt-h5 caps"},[_vm._v(_vm._s(_vm.T__("Add a Location")))]),_c('ul',{staticClass:"selector block compact location"},_vm._l((_vm.all_locations_final),function(location,index2){return _c('li',{key:index2},[_c('label',{class:'location_' + location.type,on:{"click":function($event){return _vm.add_to_selected_locations(location)}}},[_c('div',{staticClass:"txt-h5"},[_vm._v(" "+_vm._s(_vm._f("location_name_by_type")(location.type))+" ")]),_c('div',{staticClass:"txt-help"},[_vm._v(" "+_vm._s(_vm._f("location_short_descr_by_type")(location.type))+" ")])])])}),0)]):_vm._e()])]),_c('modal',{staticStyle:{"z-index":"9999"},attrs:{"name":"location_advance_modal","adaptive":true,"height":"auto","width":"360px"},on:{"before-close":_vm.location_advance_modal_on_before_close}},[_c('div',{staticClass:"mbox bg-light shadow mb0"},[_c('div',{staticStyle:{"font-size":"16px","text-align":"center","margin-bottom":"10px","padding":"5px 0"}},[_vm._v(" "+_vm._s(_vm._f("location_name_by_type")(_vm.current_popup_location.type))+" ")]),(_vm.current_popup_location.form)?_c('div',[(_vm.current_popup_location.form.hasOwnProperty('who_calls'))?_c('form-row',{attrs:{"validator":_vm.$v.current_popup_location.form.who_calls}},[_c('ul',{staticClass:"selector block mt10 "},[_c('li',[_c('input',{directives:[{name:"model",rawName:"v-model",value:(_vm.current_popup_location.form.who_calls),expression:"current_popup_location.form.who_calls"}],attrs:{"type":"radio","id":"who_calls_admin","name":"who_calls","value":"admin"},domProps:{"checked":_vm._q(_vm.current_popup_location.form.who_calls,"admin")},on:{"change":function($event){return _vm.$set(_vm.current_popup_location.form, "who_calls", "admin")}}}),_c('label',{attrs:{"for":"who_calls_admin"}},[_c('div',{staticClass:"txt-h5"},[_vm._v(_vm._s(_vm.T__("I will call my invitee")))]),_c('div',{staticClass:"txt-help",staticStyle:{"padding-top":"0"}},[_vm._v(" "+_vm._s(_vm.T__( "We'll ask your invitee’s phone number before scheduling." ))+" ")])])]),_c('li',[_c('input',{directives:[{name:"model",rawName:"v-model",value:(_vm.current_popup_location.form.who_calls),expression:"current_popup_location.form.who_calls"}],attrs:{"type":"radio","id":"who_calls_invitee","name":"who_calls","value":"invitee"},domProps:{"checked":_vm._q(_vm.current_popup_location.form.who_calls,"invitee")},on:{"focus":function($event){return _vm.ref_focus('location_txt')},"click":function($event){return _vm.ref_focus('location_txt')},"change":function($event){return _vm.$set(_vm.current_popup_location.form, "who_calls", "invitee")}}}),_c('label',{attrs:{"for":"who_calls_invitee"}},[_c('div',{staticClass:"txt-h5"},[_vm._v(" "+_vm._s(_vm.T__("My invitee should call me"))+" ")]),_c('div',{staticClass:"txt-help",staticStyle:{"padding-top":"0"}},[_vm._v(" "+_vm._s(_vm.T__( "We'll provide your number after the call has been scheduled." ))+" ")])])])])]):_vm._e(),(_vm.popup_show_location_field)?_c('form-row',{attrs:{"validator":_vm.$v.current_popup_location.form.location},scopedSlots:_vm._u([{key:"after",fn:function(){return [_c('span',{staticClass:"txt-help"},[_vm._v(" "+_vm._s(_vm.location_help_txt)+" ")])]},proxy:true}],null,false,1695413433)},[_c('label',{staticStyle:{"font-size":"14px"},attrs:{"for":"location_txt"}},[_vm._v(_vm._s(_vm.location_feild_label))]),_c('input',{directives:[{name:"model",rawName:"v-model",value:(_vm.current_popup_location.form.location),expression:"current_popup_location.form.location"}],ref:"location_txt",attrs:{"type":"text","id":"location_txt","maxlength":_vm.get_maxlength_from_validation(
                _vm.$v.current_popup_location.form.location
              )},domProps:{"value":(_vm.current_popup_location.form.location)},on:{"change":function($event){return _vm.$v.current_popup_location.form.location.$touch()},"input":function($event){if($event.target.composing){ return; }_vm.$set(_vm.current_popup_location.form, "location", $event.target.value)}}}),(_vm.current_popup_location.type != 'phone')?_c('CharLeft',{attrs:{"maxlength":_vm.get_maxlength_from_validation(
                _vm.$v.current_popup_location.form.location
              ),"input_text":_vm.current_popup_location.form.location}}):_vm._e()],1):_vm._e(),(_vm.current_popup_location.form.hasOwnProperty('location_extra'))?_c('span',[_c('div',{staticClass:"form-row"},[(!_vm.show_location_extra_field)?_c('a',{on:{"click":function($event){_vm.show_location_extra_field = true;
                _vm.ref_focus('location_extra');}}},[_vm._v(" "+_vm._s(_vm.T__("+ Add additional info"))+" ")]):_vm._e()]),(_vm.show_location_extra_field)?_c('form-row',{attrs:{"validator":_vm.$v.current_popup_location.form.location_extra}},[_c('label',{staticStyle:{"font-size":"14px"},attrs:{"for":"location_extra"}},[_vm._v(_vm._s(_vm.T__("Location additional info")))]),_c('span',{staticClass:"txt-help",staticStyle:{"padding-top":"0","padding-bottom":"5px"}},[_vm._v(" "+_vm._s(_vm.location_extra_help_txt)+" ")]),_c('textarea',{directives:[{name:"model",rawName:"v-model",value:(_vm.current_popup_location.form.location_extra),expression:"current_popup_location.form.location_extra"}],ref:"location_extra",attrs:{"type":"text","id":"location_extra","maxlength":_vm.get_maxlength_from_validation(
                  _vm.$v.current_popup_location.form.location_extra
                )},domProps:{"value":(_vm.current_popup_location.form.location_extra)},on:{"change":function($event){return _vm.$v.current_popup_location.form.location_extra.$touch()},"input":function($event){if($event.target.composing){ return; }_vm.$set(_vm.current_popup_location.form, "location_extra", $event.target.value)}}}),_vm._v(" "),_c('CharLeft',{attrs:{"maxlength":_vm.get_maxlength_from_validation(
                  _vm.$v.current_popup_location.form.location_extra
                ),"input_text":_vm.current_popup_location.form.location_extra}})],1):_vm._e()],1):_vm._e(),_c('button',{staticClass:"wpc-btn primary md mt20",attrs:{"type":"button"},on:{"click":_vm.save_current_popup_location}},[_vm._v(" "+_vm._s(_vm.current_popup_location_action == "add" ? "Add Location" : "Update")+" ")])],1):_vm._e()])])],1)}
var AdminLocationSelectorvue_type_template_id_f092bcbc_staticRenderFns = []


// CONCATENATED MODULE: ./src/components/form_elements/AdminLocationSelector.vue?vue&type=template&id=f092bcbc&

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.array.find-index.js
var es_array_find_index = __webpack_require__("c740");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.array.splice.js
var es_array_splice = __webpack_require__("a434");

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/esm/createForOfIteratorHelper.js
var createForOfIteratorHelper = __webpack_require__("b85c");

// EXTERNAL MODULE: ./node_modules/vue-draggable/lib/vue-draggable.js
var vue_draggable = __webpack_require__("d8c5");

// EXTERNAL MODULE: ./node_modules/vuelidate/lib/validators/index.js
var validators = __webpack_require__("b5ae");

// EXTERNAL MODULE: ./src/utils/common_func.js
var common_func = __webpack_require__("d1ff");

// CONCATENATED MODULE: ./src/utils/admin_tp_locations_state_mixin.js

var admin_tp_locations_state_mixin = {
  data: function data() {
    return {
      tp_locations: {},
      is_tp_locations_loaded: false,
      tp_locations_refresh_interval_instance: null
    };
  },
  computed: {
    is_tp_service_account_added: function is_tp_service_account_added() {
      var _this = this;

      return function (location_type) {
        if (location_type !== "zoom_meeting" && location_type !== "gotomeeting_meeting" && location_type !== "googlemeet_meeting") {
          return null;
        }

        if (!_this.is_tp_locations_loaded) {
          return true; //till loading - to avoid showing accounts not connected
        }

        if (_this.tp_locations.hasOwnProperty(location_type)) {
          return _this.tp_locations[location_type].is_connected;
        }

        return false;
      };
    },
    googlemeet_meeting_is_account_connected: function googlemeet_meeting_is_account_connected() {
      if (this.tp_locations.hasOwnProperty("googlemeet_meeting")) {
        return this.tp_locations["googlemeet_meeting"].is_connected;
      }

      return null;
    },
    googlemeet_meeting_account_email: function googlemeet_meeting_account_email() {
      return this.tp_locations && this.tp_locations.googlemeet_meeting && this.tp_locations.googlemeet_meeting.account_email ? this.tp_locations.googlemeet_meeting.account_email : "";
    }
  },
  methods: {
    load_tp_locations_of_current_admin: function load_tp_locations_of_current_admin() {
      var _this2 = this;

      var background = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : false;
      var wpcal_request = {};
      var action = "get_tp_locations_details_for_current_admin";
      wpcal_request[action] = "dummy__";
      var post_data = {
        action: "wpcal_process_admin_ajax_request",
        wpcal_request: wpcal_request
      };
      var axios_options = {};

      if (background) {
        axios_options = {
          params: {
            _remove_options_before_call: {
              background_call: true
            }
          }
        };
      }

      axios_default.a.post(window.wpcal_ajax.ajax_url, post_data, axios_options).then(function (response) {
        if (response.data && response.data[action].hasOwnProperty("tp_locations")) {
          // for (let key in response.data[action].tp_locations) {
          //   console.log(key, response.data[action].tp_locations[key]);
          //   this.$set(
          //     this.tp_locations,
          //     key,
          //     response.data[action].tp_locations[key]
          //   );
          // }
          _this2.tp_locations = response.data[action].tp_locations;
        }

        _this2.is_tp_locations_loaded = true;
      }).catch(function (error) {
        console.log(error);
      });
    }
  },
  mounted: function mounted() {
    var _this3 = this;

    setTimeout(function () {
      _this3.load_tp_locations_of_current_admin();

      var tp_locations_refresh_interval_instance = setInterval(function () {
        if (document.hasFocus()) {
          _this3.load_tp_locations_of_current_admin(true);
        }
      }, 5000);

      _this3.$store.commit("set_tp_locations_refresh_interval_instance", tp_locations_refresh_interval_instance); //using Vuex instead of this.tp_locations_refresh_interval_instance because it is not updating properly, when this code wrapped with setTimeout sometimes 700 ms it works, better use Vuex

    }, 100);
  },
  beforeDestroy: function beforeDestroy() {
    clearInterval(this.$store.getters.get_tp_locations_refresh_interval_instance);
    this.$store.commit("set_tp_locations_refresh_interval_instance", null);
  }
};
// EXTERNAL MODULE: ./src/components/form_elements/CharLeft.vue + 4 modules
var CharLeft = __webpack_require__("84af");

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js??ref--12-0!./node_modules/thread-loader/dist/cjs.js!./node_modules/babel-loader/lib!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/components/form_elements/AdminLocationSelector.vue?vue&type=script&lang=js&




//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//






/* harmony default export */ var AdminLocationSelectorvue_type_script_lang_js_ = ({
  mixins: [admin_tp_locations_state_mixin],
  components: {
    CharLeft: CharLeft["a" /* default */]
  },
  directives: {
    dragAndDrop: vue_draggable["VueDraggableDirective"]
  },
  model: {
    prop: "locations",
    event: "locations-value-changed"
  },
  props: {
    locations: {
      type: Array
    }
  },
  data: function data() {
    return {
      all_locations: [{
        type: "physical",
        limit: -1,
        count: 0,
        show: true,
        form: {
          location: "",
          location_extra: ""
        }
      }, {
        type: "phone",
        limit: 1,
        count: 0,
        show: true,
        form: {
          who_calls: "admin",
          //admin - outbound, invitee - inbound so admin should provide number
          location: ""
        }
      }, {
        type: "googlemeet_meeting",
        limit: 1,
        count: 0,
        show: true
      }, {
        type: "zoom_meeting",
        limit: 1,
        count: 0,
        show: true
      }, {
        type: "gotomeeting_meeting",
        limit: 1,
        count: 0,
        show: true
      }, {
        type: "custom",
        limit: -1,
        count: 0,
        show: true,
        form: {
          location: "",
          location_extra: ""
        }
      }, {
        type: "ask_invitee",
        limit: 1,
        count: 0,
        show: true,
        form: {
          location: "",
          location_extra: ""
        }
      }],
      show_add_location_list: false,
      current_popup_location: {},
      current_popup_location_action: "",
      current_popup_location_index: null,
      show_location_extra_field: false,
      selected_locations_drag_drop_options: {
        dropzoneSelector: ".set-locations-cont",
        draggableSelector: ".set-locations-single",
        handlerSelector: ".reorder-handle",
        reactivityEnabled: true,
        multipleDropzonesItemsDraggingEnabled: false,
        showDropzoneAreas: true
      },
      delete_alert_index: null
    };
  },
  validations: {
    current_popup_location: {
      type: {
        required: validators["required"]
      },
      form: {
        required: Object(validators["requiredIf"])(function () {
          var types_required_form = ["physical", "phone", "custom", "ask_invitee"];
          return types_required_form.indexOf(this.current_popup_location.type) !== -1;
        }),
        who_calls: {
          required: Object(validators["requiredIf"])(function () {
            if (this.current_popup_location.type === "phone") {
              return true;
            }

            return false;
          }),
          who_calls_in_array: Object(common_func["m" /* in_array */])(["admin", "invitee"])
        },
        location: {
          required: Object(validators["requiredIf"])(function () {
            var types_required_location = ["physical", "custom"];

            if (types_required_location.indexOf(this.current_popup_location.type) !== -1) {
              return true;
            } else if (this.current_popup_location.type === "phone" && this.current_popup_location.form.who_calls === "invitee") {
              return true;
            }

            return false;
          }),
          max_char_length_500: Object(validators["maxLength"])(500)
        },
        location_extra: {
          max_char_length_500: Object(validators["maxLength"])(500)
        }
      }
    }
  },
  computed: {
    selected_locations: {
      get: function get() {
        return this.locations;
      },
      set: function set(new_value) {
        this.$emit("locations-value-changed", new_value);
      }
    },
    all_locations_with_stats: function all_locations_with_stats() {
      var list = this.clone_deep(this.all_locations);

      var _iterator = Object(createForOfIteratorHelper["a" /* default */])(this.selected_locations),
          _step;

      try {
        var _loop = function _loop() {
          var selected_location = _step.value;
          var list_index = list.findIndex(function (list_item) {
            return list_item.type === selected_location.type;
          });

          if (list_index != -1) {
            list[list_index].count++;

            if (list[list_index].limit > -1 && list[list_index].limit <= list[list_index].count) {
              list[list_index].show = false;
            } else {
              list[list_index].show = true;
            }
          }
        };

        for (_iterator.s(); !(_step = _iterator.n()).done;) {
          _loop();
        }
      } catch (err) {
        _iterator.e(err);
      } finally {
        _iterator.f();
      }

      return list;
    },
    all_locations_final: function all_locations_final() {
      var list = [];

      for (var index in this.all_locations_with_stats) {
        if (this.all_locations_with_stats[index].show) list.push(this.all_locations_with_stats[index]);
      }

      return list;
    },
    enable_add_new_location: function enable_add_new_location() {
      return this.selected_locations.length < 10;
    },
    location_feild_label: function location_feild_label() {
      var label = this.T__("Location");

      if (this.current_popup_location.type == "custom") {
        label = this.T__("Enter a location of your choice");
      } else if (this.current_popup_location.type == "phone") {
        label = this.T__("Enter your phone number");
      }

      return label;
    },
    popup_show_location_field: function popup_show_location_field() {
      var show_location = false;

      if (this.current_popup_location.type == "physical" || this.current_popup_location.type == "custom") {
        show_location = true;
      } else if (this.current_popup_location.type == "phone" && this.current_popup_location.form && this.current_popup_location.form.who_calls == "invitee") {
        show_location = true;
      }

      return show_location;
    },
    location_help_txt: function location_help_txt() {
      if (this.current_popup_location.type == "phone") {
        return this.T__("Please enter phone number with country code. E.g.") + " +1 555 555 1234";
      }

      return "";
    },
    location_extra_help_txt: function location_extra_help_txt() {
      if (this.current_popup_location.type == "physical" || this.current_popup_location.type == "custom") {
        return this.T__("This will be shown to the invitee AFTER the booking is confirmed.");
      } else if (this.current_popup_location.type == "ask_invitee") {
        return this.T__("You can use this to guide the invitee. The text you enter here will be displayed below the location text field.");
      }

      return "";
    }
  },
  methods: {
    add_to_selected_locations: function add_to_selected_locations(location) {
      var new_location = {};
      new_location.type = location.type;

      if (location.hasOwnProperty("form") && location.form) {
        new_location.form = this.clone_deep(location.form);
      }

      this.may_show_popup_form(new_location, "add");
      this.show_add_location_list = false;
    },
    remove_from_selected_locations: function remove_from_selected_locations(index) {
      this.show_add_location_list = false;
      this.selected_locations.splice(index, 1);
    },
    may_show_popup_form: function may_show_popup_form(location, action) {
      var index = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : null;
      location = this.clone_deep(location);

      if (action != "add" && action != "edit") {
        return;
      }

      if (action == "edit" && isNaN(index)) {
        return;
      }

      if (!this.is_having_edit_options(location)) {
        if (action == "add") {
          this.selected_locations.push(location);
        } else if (action == "edit") {
          this.selected_locations[index] = location;
        }

        return;
      }

      this.$v["current_popup_location"].$reset();
      this.current_popup_location = location;
      this.current_popup_location_action = action;
      this.current_popup_location_index = index;

      if (this.current_popup_location.form && this.current_popup_location.form.hasOwnProperty("location_extra") && this.current_popup_location.form.location_extra) {
        this.show_location_extra_field = true;
      }

      this.$modal.show("location_advance_modal");

      if (this.current_popup_location.type == "physical" || this.current_popup_location.type == "custom") {
        this.ref_focus("location_txt");
      }
    },
    save_current_popup_location: function save_current_popup_location() {
      var action = this.current_popup_location_action;
      var index = this.current_popup_location_index;
      this.$v["current_popup_location"].$touch(); //trigger validation

      if (this.$v.current_popup_location.$anyError) {
        return;
      }

      if (action == "add") {
        this.selected_locations.push(this.current_popup_location);
      } else if (action == "edit") {
        this.selected_locations[index] = this.current_popup_location;
      }

      this.$modal.hide("location_advance_modal");
    },
    is_having_edit_options: function is_having_edit_options(location) {
      if (location.hasOwnProperty("form") && location.form) {
        return true;
      }

      return false;
    },
    reset_current_popup_location: function reset_current_popup_location() {
      this.current_popup_location = {};
      this.current_popup_location_action = "";
      this.current_popup_location_index = null;
      this.show_location_extra_field = false;
    },
    location_advance_modal_on_before_close: function location_advance_modal_on_before_close() {
      this.reset_current_popup_location();
    },
    get_meta_data_for_location: function get_meta_data_for_location(location) {
      if (!this.is_having_edit_options(location)) {
        return this.$options.filters.location_short_descr_by_type(location.type);
      }

      var meta = "";

      if (location.type === "phone" && location.form.hasOwnProperty("who_calls") && location.form.who_calls) {
        meta += location.form.who_calls == "admin" ? this.T__("I will call my invitee") : this.T__("My invitee should call me at ");

        if (location.form.who_calls == "invitee" && location.form.hasOwnProperty("location") && location.form.location) {
          meta += location.form.location;
        }
      }

      if (location.type !== "phone" && location.form && location.form.hasOwnProperty("location") && location.form.location) {
        meta += location.form.location;
      }

      if (location.form && location.form.hasOwnProperty("location_extra") && location.form.location_extra) {
        meta += " " + this.T__("(more info)");
      }

      return meta ? meta : this.$options.filters.location_short_descr_by_type(location.type);
    },
    reorder_selected_locations: function reorder_selected_locations(event) {
      var move_item_old_index = event.detail.ids[0];
      var move_item_new_index = event.detail.index;
      var moved_item = this.selected_locations.splice(move_item_old_index, 1);
      var final_item_new_index = move_item_old_index < move_item_new_index ? move_item_new_index - 1 : move_item_new_index; // console.log(
      //   move_item_old_index,
      //   "to",
      //   move_item_new_index,
      //   "final",
      //   final_item_new_index
      // );

      this.selected_locations.splice(final_item_new_index, 0, moved_item[0]);
    },
    show_delete_alert: function show_delete_alert(index) {
      return this.delete_alert_index === index;
    },
    set_mouseover: function set_mouseover(index, is_hover) {
      if (is_hover) {
        this.delete_alert_index = index;
      } else {
        this.delete_alert_index = null;
      }
    }
  }
});
// CONCATENATED MODULE: ./src/components/form_elements/AdminLocationSelector.vue?vue&type=script&lang=js&
 /* harmony default export */ var form_elements_AdminLocationSelectorvue_type_script_lang_js_ = (AdminLocationSelectorvue_type_script_lang_js_); 
// CONCATENATED MODULE: ./src/components/form_elements/AdminLocationSelector.vue





/* normalize component */

var AdminLocationSelector_component = Object(componentNormalizer["a" /* default */])(
  form_elements_AdminLocationSelectorvue_type_script_lang_js_,
  AdminLocationSelectorvue_type_template_id_f092bcbc_render,
  AdminLocationSelectorvue_type_template_id_f092bcbc_staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* harmony default export */ var AdminLocationSelector = (AdminLocationSelector_component.exports);
// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js??ref--12-0!./node_modules/thread-loader/dist/cjs.js!./node_modules/babel-loader/lib!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/components/admin/ServiceFormStep2.vue?vue&type=script&lang=js&

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ var ServiceFormStep2vue_type_script_lang_js_ = ({
  name: "ServiceFormStep2",
  components: {
    ColorSelector: ColorSelector,
    AdminLocationSelector: AdminLocationSelector
  },
  props: {
    view: {
      type: String
    },
    step: {
      type: Object,
      required: true
    },
    form: {
      type: Object,
      required: true
    },
    create_or_update_btn_is_enabled: {},
    $v: {}
  },
  data: function data() {
    return {};
  },
  methods: {
    auto_focus_form_element: function auto_focus_form_element() {
      var _this = this;

      if (this.view == "add" && !this.form.name && this.$refs.service_name) {
        setTimeout(function () {
          _this.$refs.service_name.focus();
        }, 50);
      }
    }
  },
  watch: {
    "step.form": function stepForm(new_value) {
      if (new_value) {
        this.auto_focus_form_element();
      }
    }
  },
  mounted: function mounted() {
    if (this.view == "add") {
      this.$props.step.summary = true;
    }
  }
});
// CONCATENATED MODULE: ./src/components/admin/ServiceFormStep2.vue?vue&type=script&lang=js&
 /* harmony default export */ var admin_ServiceFormStep2vue_type_script_lang_js_ = (ServiceFormStep2vue_type_script_lang_js_); 
// CONCATENATED MODULE: ./src/components/admin/ServiceFormStep2.vue





/* normalize component */

var ServiceFormStep2_component = Object(componentNormalizer["a" /* default */])(
  admin_ServiceFormStep2vue_type_script_lang_js_,
  ServiceFormStep2vue_type_template_id_5f73c678_render,
  ServiceFormStep2vue_type_template_id_5f73c678_staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* harmony default export */ var ServiceFormStep2 = (ServiceFormStep2_component.exports);
// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js?{"cacheDirectory":"node_modules/.cache/vue-loader","cacheIdentifier":"23115053-vue-loader-template"}!./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/components/admin/ServiceFormStep3.vue?vue&type=template&id=23488004&scoped=true&
var ServiceFormStep3vue_type_template_id_23488004_scoped_true_render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',[_c('div',{directives:[{name:"show",rawName:"v-show",value:(_vm.step.upcoming),expression:"step.upcoming"}],staticClass:"step-single upcoming"},[_c('div',{staticClass:"step-title"},[_vm._v(" "+_vm._s(_vm.T__("Event type duration & timings"))+" ")])]),_c('div',{directives:[{name:"show",rawName:"v-show",value:(_vm.step.form),expression:"step.form"}],staticClass:"step-single form active",attrs:{"id":'service_form_step' + _vm.step.id}},[_c('div',{staticClass:"step-title"},[_vm._v(" "+_vm._s(_vm.T__("Event Type Duration & Timings"))+" ")]),_c('div',{staticClass:"form"},[_c('form-row',{attrs:{"validator":_vm.$v.form.duration}},[_c('label',[_vm._v(_vm._s(_vm.T__("Event duration")))]),_c('span',{staticClass:"txt-help pt0"},[_vm._v(_vm._s(_vm.T__("Define how long the event will last.")))]),_c('InlineRadioSelector',{attrs:{"element_settings":_vm.event_duration_element_setting,"form":_vm.form,"$v":_vm.$v}})],1),_c('form-row',{attrs:{"validator":_vm.$v.form.default_availability_details.date_range_type}},[_c('label',[_vm._v(_vm._s(_vm.T__("When can this event be booked?")))]),_c('span',{staticClass:"txt-help pt0"},[_vm._v(_vm._s(_vm.T__("Select a time range within which this event can be booked.")))]),_c('ul',{staticClass:"selector block mt10"},[_c('li',[_c('input',{directives:[{name:"model",rawName:"v-model",value:(_vm.form.default_availability_details.date_range_type),expression:"form.default_availability_details.date_range_type"}],attrs:{"type":"radio","id":"days-into-future","name":"event-can-be-booked","value":"relative"},domProps:{"checked":_vm._q(_vm.form.default_availability_details.date_range_type,"relative")},on:{"change":function($event){return _vm.$set(_vm.form.default_availability_details, "date_range_type", "relative")}}}),_c('label',{attrs:{"for":"days-into-future"}},[_c('div',{staticClass:"txt-h5"},[_c('input',{directives:[{name:"model",rawName:"v-model",value:(_vm.show_relative_date_range),expression:"show_relative_date_range"}],staticStyle:{"width":"50px","height":"33px","text-align":"center","margin":"-9px 7px -7px 0px"},attrs:{"type":"number"},domProps:{"value":(_vm.show_relative_date_range)},on:{"blur":function($event){return _vm.$v.form.default_availability_details.date_misc.$touch()},"focus":function($event){_vm.form.default_availability_details.date_range_type =
                      'relative'},"input":function($event){if($event.target.composing){ return; }_vm.show_relative_date_range=$event.target.value}}}),_vm._v(_vm._s(_vm.T__("rolling days into the future"))+" ")])])]),_c('li',[_c('input',{directives:[{name:"model",rawName:"v-model",value:(_vm.form.default_availability_details.date_range_type),expression:"form.default_availability_details.date_range_type"}],attrs:{"type":"radio","id":"within-date-range","name":"event-can-be-booked","value":"from_to"},domProps:{"checked":_vm._q(_vm.form.default_availability_details.date_range_type,"from_to")},on:{"focus":function($event){_vm.form.default_availability_details.date_range_type !==
                  'from_to' &&
                  _vm.ref_click('default_availability_details_from_date_input')},"change":function($event){return _vm.$set(_vm.form.default_availability_details, "date_range_type", "from_to")}}}),_c('label',{attrs:{"for":"__unknown__"},on:{"click":function($event){_vm.form.default_availability_details.date_range_type = 'from_to'}}},[_c('div',{staticClass:"txt-h5"},[_vm._v(_vm._s(_vm.T__("Within a date range")))]),_c('div',{staticClass:"date-range-selector cf"},[_c('div',{staticClass:"col50"},[_c('div',[_c('div',{staticClass:"label txt-help"},[_vm._v(_vm._s(_vm.T__("FROM")))]),_c('v-date-picker',{attrs:{"locale":this.$store.getters.get_site_locale.replace('_', '-'),"popover":{
                        visibility: 'click'
                      },"masks":{ input: ['YYYY-MM-DD'] }},model:{value:(_vm.default_availability_details_from_date_obj),callback:function ($$v) {_vm.default_availability_details_from_date_obj=$$v},expression:"default_availability_details_from_date_obj"}},[_c('input',{ref:"default_availability_details_from_date_input",attrs:{"type":"text","readonly":"","placeholder":"M d, YYYY"},domProps:{"value":_vm.$options.filters.wpcal_format_date_style1(
                            _vm.default_availability_details_from_date
                          )}})])],1)]),_c('div',{staticClass:"col50"},[_c('div',[_c('div',{staticClass:"label txt-help"},[_vm._v(_vm._s(_vm.T__("TO")))]),_c('v-date-picker',{attrs:{"locale":this.$store.getters.get_site_locale.replace('_', '-'),"popover":{
                        visibility: 'click'
                      },"masks":{ input: ['YYYY-MM-DD'] },"min-date":_vm.default_availability_details_from_date_obj},model:{value:(_vm.default_availability_details_to_date_obj),callback:function ($$v) {_vm.default_availability_details_to_date_obj=$$v},expression:"default_availability_details_to_date_obj"}},[_c('input',{ref:"default_availability_details_to_date_input",attrs:{"type":"text","readonly":"","placeholder":"M d, YYYY"},domProps:{"value":_vm.$options.filters.wpcal_format_date_style1(
                            _vm.default_availability_details_to_date
                          )}})])],1)])])])]),_c('li',[_c('input',{directives:[{name:"model",rawName:"v-model",value:(_vm.form.default_availability_details.date_range_type),expression:"form.default_availability_details.date_range_type"}],attrs:{"type":"radio","id":"indefinitely","name":"event-can-be-booked","value":"infinite"},domProps:{"checked":_vm._q(_vm.form.default_availability_details.date_range_type,"infinite")},on:{"change":function($event){return _vm.$set(_vm.form.default_availability_details, "date_range_type", "infinite")}}}),_c('label',{attrs:{"for":"indefinitely"}},[_c('div',{staticClass:"txt-h5"},[_vm._v(_vm._s(_vm.T__("Indefinitely")))]),_c('div',{staticClass:"txt-help"},[_vm._v(" "+_vm._s(_vm.T__("Invitees can book slots indefinitely into the future"))+" ")])])])]),_c('form-row',{attrs:{"validator":_vm.$v.form.default_availability_details.date_misc}}),_c('form-row',{attrs:{"validator":_vm.$v.form.default_availability_details.from_date}}),_c('form-row',{attrs:{"validator":_vm.$v.form.default_availability_details.to_date}})],1),_c('form-row',[_c('label',[_vm._v(_vm._s(_vm.T__("Availability for this event type")))]),_c('span',{staticClass:"txt-help pt0"},[_vm._v(_vm._s(_vm.T__("Set your availability specifically for this event type.")))]),_c('div',{staticClass:"mbox",staticStyle:{"margin-top":"10px"}},[_c('form-row',{attrs:{"validator":_vm.$v.form.default_availability_details.periods}},[_c('div',{staticClass:"txt-h5 caps"},[_vm._v(" "+_vm._s(_vm.T__("Available hours"))+" ")]),_c('TimeRange1ToN',{staticClass:"time-range-selector",attrs:{"$v":_vm.$v.form.default_availability_details.periods},model:{value:(_vm.form.default_availability_details.periods),callback:function ($$v) {_vm.$set(_vm.form.default_availability_details, "periods", $$v)},expression:"form.default_availability_details.periods"}})],1),_c('hr'),_c('form-row',{attrs:{"validator":_vm.$v.form.default_availability_details.day_index_list}},[_c('div',{staticClass:"txt-h5 caps"},[_vm._v(" "+_vm._s(_vm.T__("Available days"))+" ")]),_c('WeekDaysSelector',{model:{value:(_vm.form.default_availability_details.day_index_list),callback:function ($$v) {_vm.$set(_vm.form.default_availability_details, "day_index_list", $$v)},expression:"form.default_availability_details.day_index_list"}})],1),_c('hr'),_c('form-row',{staticStyle:{"margin-bottom":"0"},attrs:{"validator":_vm.$v.form.timezone}},[_c('div',{staticClass:"txt-h5 caps"},[_vm._v(" "+_vm._s(_vm.T__("Time zone"))+" ")]),_c('TimeZoneSelector',{attrs:{"use_as":'form_tz'},model:{value:(_vm.form.timezone),callback:function ($$v) {_vm.$set(_vm.form, "timezone", $$v)},expression:"form.timezone"}})],1)],1)]),_c('form-row',{attrs:{"validator":_vm.$v.form.display_start_time_every}},[_c('label',[_vm._v(" "+_vm._s(_vm.T__("Show start times every:"))+" ")]),_c('div',{staticClass:"txt-help"},[_vm._v(" "+_vm._s(_vm.T__("Show your available hours in blocks of:"))+" ")]),_c('InlineRadioSelector',{attrs:{"element_settings":_vm.display_start_time_every_element_setting,"form":_vm.form,"$v":_vm.$v}})],1),_c('a',{staticStyle:{"font-size":"14px"},on:{"click":function($event){_vm.show_advance_options = !_vm.show_advance_options}}},[_vm._v(_vm._s(_vm.show_advance_options_txt))]),_c('div',{directives:[{name:"show",rawName:"v-show",value:(_vm.show_advance_options),expression:"show_advance_options"}]},[_c('ul',{staticClass:"mbox avail-advanced-options"},[_c('li',[_c('form-row',{attrs:{"validator":_vm.$v.form.max_booking_per_day}},[_c('div',{staticClass:"txt-h5 caps"},[_vm._v(" "+_vm._s(_vm.T__("Max bookings per day"))+" ")]),_c('div',{staticClass:"txt-help",staticStyle:{"margin-bottom":"10px"}},[_vm._v(" "+_vm._s(_vm.T__( "Limit the number of bookings for this event type per day. Leave blank for no limit." ))+" ")]),_c('input',{directives:[{name:"model",rawName:"v-model",value:(_vm.form.max_booking_per_day),expression:"form.max_booking_per_day"}],attrs:{"type":"text","placeholder":"No limit"},domProps:{"value":(_vm.form.max_booking_per_day)},on:{"blur":function($event){return _vm.$v.form.max_booking_per_day.$touch()},"input":function($event){if($event.target.composing){ return; }_vm.$set(_vm.form, "max_booking_per_day", $event.target.value)}}})])],1),_c('li',[_c('div',{staticClass:"txt-h5 caps"},[_vm._v(" "+_vm._s(_vm.T__("Minimum Scheduling Notice"))+" ")]),_c('div',{staticClass:"custom-radio-cont"},[_c('label',{staticStyle:{"font-size":"13px"}},[_c('input',{directives:[{name:"model",rawName:"v-model",value:(_vm.form.min_schedule_notice.type),expression:"form.min_schedule_notice.type"}],staticStyle:{"float":"left","margin-right":"7px","margin-top":"-1px"},attrs:{"type":"radio","name":"min_schedule_notice_type","value":"none"},domProps:{"checked":_vm._q(_vm.form.min_schedule_notice.type,"none")},on:{"change":function($event){return _vm.$set(_vm.form.min_schedule_notice, "type", "none")}}}),_vm._v(" "+_vm._s(_vm.T__("None"))+" ")]),_c('label',{staticStyle:{"font-size":"13px"}},[_c('input',{directives:[{name:"model",rawName:"v-model",value:(_vm.form.min_schedule_notice.type),expression:"form.min_schedule_notice.type"}],staticStyle:{"float":"left","margin-right":"7px","margin-top":"-1px","margin-bottom":"20px"},attrs:{"type":"radio","name":"min_schedule_notice_type","value":"units"},domProps:{"checked":_vm._q(_vm.form.min_schedule_notice.type,"units")},on:{"change":function($event){return _vm.$set(_vm.form.min_schedule_notice, "type", "units")}}}),_vm._v(" "+_vm._s(_vm.T__("Prevent booking of slots less than"))+" "),_c('div',{staticStyle:{"padding-left":"22px","padding-top":"4px"}},[_c('input',{directives:[{name:"model",rawName:"v-model",value:(_vm.form.min_schedule_notice.time_units),expression:"form.min_schedule_notice.time_units"}],staticStyle:{"width":"78px","padding":"3px 5px","margin-top":"-8px","font-size":"13px"},attrs:{"type":"number"},domProps:{"value":(_vm.form.min_schedule_notice.time_units)},on:{"focus":function($event){_vm.form.min_schedule_notice.type = 'units'},"blur":function($event){return _vm.$v.form.min_schedule_notice.time_units.$touch()},"input":function($event){if($event.target.composing){ return; }_vm.$set(_vm.form.min_schedule_notice, "time_units", $event.target.value)}}}),_c('select',{directives:[{name:"model",rawName:"v-model",value:(_vm.form.min_schedule_notice.time_units_in),expression:"form.min_schedule_notice.time_units_in"}],staticStyle:{"width":"auto","margin-top":"-3px"},on:{"focus":function($event){_vm.form.min_schedule_notice.type = 'units'},"change":function($event){var $$selectedVal = Array.prototype.filter.call($event.target.options,function(o){return o.selected}).map(function(o){var val = "_value" in o ? o._value : o.value;return val}); _vm.$set(_vm.form.min_schedule_notice, "time_units_in", $event.target.multiple ? $$selectedVal : $$selectedVal[0])}}},[_c('option',{attrs:{"value":"mins"}},[_vm._v(_vm._s(_vm.T__("mins")))]),_c('option',{attrs:{"value":"hrs","selected":""}},[_vm._v(_vm._s(_vm.T__("hrs")))]),_c('option',{attrs:{"value":"days"}},[_vm._v(_vm._s(_vm.T__("days")))])]),_vm._v(" "+_vm._s(_vm.T_x("away.", "Prevent booking of slots less than _ away"))+" ")]),_c('form-row',{attrs:{"validator":_vm.$v.form.min_schedule_notice.time_units}})],1),_c('label',{staticStyle:{"font-size":"13px","margin-bottom":"1px"}},[_c('input',{directives:[{name:"model",rawName:"v-model",value:(_vm.form.min_schedule_notice.type),expression:"form.min_schedule_notice.type"}],staticStyle:{"float":"left","margin-right":"7px","margin-top":"-1px","margin-bottom":"20px"},attrs:{"type":"radio","name":"min_schedule_notice_type","id":"min_schedule_notice_type_time_days_before","value":"time_days_before"},domProps:{"checked":_vm._q(_vm.form.min_schedule_notice.type,"time_days_before")},on:{"change":function($event){return _vm.$set(_vm.form.min_schedule_notice, "type", "time_days_before")}}}),_vm._v(" "+_vm._s(_vm.T__("Prevent all bookings after"))+" ")]),_c('div',{staticClass:"prevent-bookings-after-timepicker",staticStyle:{"display":"flex","align-items":"center"}},[_c('TimePicker',{on:{"time-picker-opened":function($event){_vm.form.min_schedule_notice.type = 'time_days_before'}},model:{value:(_vm.form.min_schedule_notice.days_before_time),callback:function ($$v) {_vm.$set(_vm.form.min_schedule_notice, "days_before_time", $$v)},expression:"form.min_schedule_notice.days_before_time"}}),_c('span',{staticStyle:{"margin-left":"3px"}},[_vm._v(",")]),_c('select',{directives:[{name:"model",rawName:"v-model",value:(_vm.form.min_schedule_notice.days_before),expression:"form.min_schedule_notice.days_before"}],staticStyle:{"width":"auto","margin-left":"5px"},on:{"focus":function($event){_vm.form.min_schedule_notice.type = 'time_days_before'},"change":function($event){var $$selectedVal = Array.prototype.filter.call($event.target.options,function(o){return o.selected}).map(function(o){var val = "_value" in o ? o._value : o.value;return val}); _vm.$set(_vm.form.min_schedule_notice, "days_before", $event.target.multiple ? $$selectedVal : $$selectedVal[0])}}},_vm._l(([0, 1, 2, 3, 4, 5, 6, 7]),function(val,index){return _c('option',{key:index,domProps:{"value":val}},[_vm._v(_vm._s(val))])}),0),_c('label',{staticStyle:{"font-size":"13px","padding-left":"3px"},attrs:{"for":"min_schedule_notice_type_time_days_before"}},[_vm._v(" "+_vm._s(_vm.T_n( "day before.", "days before.", _vm.form.min_schedule_notice.days_before ))+" ")])],1),_c('form-row',{attrs:{"validator":_vm.$v.form.min_schedule_notice.days_before_time}})],1)]),_c('li',[_c('div',{staticClass:"txt-h5 caps"},[_vm._v(" "+_vm._s(_vm.T__("Event Buffers"))+" ")]),_c('div',{staticClass:"txt-help",staticStyle:{"margin-bottom":"10px"}},[_vm._v(" "+_vm._s(_vm.T__( "Set aside preparation, rest or travel time before or after events. For example, if you define a 5-minute buffer before your events, we will make sure you have 5 minutes of free time before your scheduled events." ))+" ")]),_c('div',{staticClass:"col-main cf"},[_c('div',{staticClass:"col50"},[_c('div',{staticClass:"label txt-help",staticStyle:{"padding-bottom":"5px"}},[_vm._v(" "+_vm._s(_vm.T__("BEFORE EVENT"))+" ")]),_c('select',{directives:[{name:"model",rawName:"v-model",value:(_vm.form.event_buffer_before),expression:"form.event_buffer_before"}],on:{"change":[function($event){var $$selectedVal = Array.prototype.filter.call($event.target.options,function(o){return o.selected}).map(function(o){var val = "_value" in o ? o._value : o.value;return val}); _vm.$set(_vm.form, "event_buffer_before", $event.target.multiple ? $$selectedVal : $$selectedVal[0])},function($event){return _vm.$v.form.event_buffer_before.$touch()}]}},_vm._l((_vm.event_buffer_before_element_setting.options),function(option,index){return _c('option',{key:index,domProps:{"value":option.value}},[_vm._v(_vm._s(option.text))])}),0)]),_c('div',{staticClass:"col50"},[_c('div',{staticClass:"label txt-help",staticStyle:{"padding-bottom":"5px"}},[_vm._v(" "+_vm._s(_vm.T__("AFTER EVENT"))+" ")]),_c('select',{directives:[{name:"model",rawName:"v-model",value:(_vm.form.event_buffer_after),expression:"form.event_buffer_after"}],on:{"change":[function($event){var $$selectedVal = Array.prototype.filter.call($event.target.options,function(o){return o.selected}).map(function(o){var val = "_value" in o ? o._value : o.value;return val}); _vm.$set(_vm.form, "event_buffer_after", $event.target.multiple ? $$selectedVal : $$selectedVal[0])},function($event){return _vm.$v.form.event_buffer_after.$touch()}]}},[_vm._v("> "),_vm._l((_vm.event_buffer_after_element_setting.options),function(option,index){return _c('option',{key:index,domProps:{"value":option.value}},[_vm._v(_vm._s(option.text))])})],2)])]),_c('form-row',{attrs:{"validator":_vm.$v.form.event_buffer_before}}),_c('form-row',{attrs:{"validator":_vm.$v.form.event_buffer_after}})],1)])]),_c('div',{staticClass:"form-row"},[_c('div',{staticClass:"txt-help mt10",staticStyle:{"padding-bottom":"10px"}},[_vm._v(" "+_vm._s(_vm.T__( "You can configure your event type further after creating it." ))+" ")]),(_vm.view == 'add')?_c('button',{staticClass:"wpc-btn primary lg",attrs:{"type":"button","disabled":!_vm.create_or_update_btn_is_enabled},on:{"click":function($event){return _vm.$emit('validate-may-navigate-or-submit', 3)}}},[_vm._v(" "+_vm._s(_vm.T__("Create Event Type"))+" ")]):(_vm.view == 'edit')?_c('button',{staticClass:"wpc-btn primary lg",attrs:{"type":"button","disabled":!_vm.create_or_update_btn_is_enabled},on:{"click":function($event){return _vm.$emit('submit-form', 3)}}},[_vm._v(" "+_vm._s(_vm.T__("Save"))+" ")]):_vm._e(),(_vm.view == 'edit')?_c('button',{staticClass:"wpc-btn tert-link sm mt10 center",attrs:{"type":"button"},on:{"click":function($event){return _vm.$emit('edit-view-toggle-steps')}}},[_vm._v(" "+_vm._s(_vm.T__("Cancel"))+" ")]):_vm._e()])],1)])])}
var ServiceFormStep3vue_type_template_id_23488004_scoped_true_staticRenderFns = []


// CONCATENATED MODULE: ./src/components/admin/ServiceFormStep3.vue?vue&type=template&id=23488004&scoped=true&

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.regexp.exec.js
var es_regexp_exec = __webpack_require__("ac1f");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.string.replace.js
var es_string_replace = __webpack_require__("5319");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.string.trim.js
var es_string_trim = __webpack_require__("498a");

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js?{"cacheDirectory":"node_modules/.cache/vue-loader","cacheIdentifier":"23115053-vue-loader-template"}!./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/components/form_elements/InlineRadioSelector.vue?vue&type=template&id=32d5feb0&scoped=true&
var InlineRadioSelectorvue_type_template_id_32d5feb0_scoped_true_render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',[_c('ul',{staticClass:"selector inline time mt10 with-custom",class:_vm.element_settings.style_class},[_vm._l((_vm.element_settings.options),function(option,index){return _c('li',{key:index},[_c('input',{directives:[{name:"model",rawName:"v-model",value:(_vm.form[_vm.element_settings.name]),expression:"form[element_settings.name]"}],attrs:{"type":"radio","id":'duration-' + _vm.element_settings.name + '-' + option.value + '-min',"name":_vm.element_settings.name},domProps:{"value":option.value,"checked":_vm._q(_vm.form[_vm.element_settings.name],option.value)},on:{"change":[function($event){return _vm.$set(_vm.form, _vm.element_settings.name, option.value)},_vm.load_custom_value]}}),_c('label',{attrs:{"for":'duration-' + _vm.element_settings.name + '-' + option.value + '-min'}},[_vm._v(" "+_vm._s(option.text)+" "),_c('span',[_vm._v(_vm._s(_vm.T__("min")))])])])}),(_vm.element_settings.custom_option)?_c('li',{staticClass:"custom-duration"},[_c('input',{attrs:{"type":"radio","name":_vm.element_settings.name},domProps:{"checked":_vm.custom_checked}}),_c('label',{attrs:{"for":'custom-duration--' + _vm.element_settings.name + ''}},[_c('input',{attrs:{"type":"number","id":'custom-duration--' + _vm.element_settings.name + '',"placeholder":_vm.custom_value_focus === true ? '' : '-'},domProps:{"value":_vm.get_custom_value},on:{"focus":_vm.custom_value_on_focus,"blur":function($event){_vm.custom_value_focus = false;
            _vm.$v && _vm.$v.form[_vm.element_settings.name]
              ? _vm.$v.form[_vm.element_settings.name].$touch()
              : '';},"input":_vm.debounce_set_custom_value}}),_c('span',[_vm._v(_vm._s(_vm.T__("custom min")))])])]):_vm._e()],2)])}
var InlineRadioSelectorvue_type_template_id_32d5feb0_scoped_true_staticRenderFns = []


// CONCATENATED MODULE: ./src/components/form_elements/InlineRadioSelector.vue?vue&type=template&id=32d5feb0&scoped=true&

// EXTERNAL MODULE: ./node_modules/lodash-es/debounce.js + 1 modules
var debounce = __webpack_require__("85b1");

// EXTERNAL MODULE: ./node_modules/lodash-es/findIndex.js + 3 modules
var findIndex = __webpack_require__("1c8f");

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js??ref--12-0!./node_modules/thread-loader/dist/cjs.js!./node_modules/babel-loader/lib!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/components/form_elements/InlineRadioSelector.vue?vue&type=script&lang=js&

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ var InlineRadioSelectorvue_type_script_lang_js_ = ({
  name: "InlineRadioSelector",
  props: {
    element_settings: {
      type: Object,
      required: true
    },
    form: {
      type: Object,
      required: true
    },
    $v: {}
  },
  data: function data() {
    return {
      custom_value: "",
      custom_value_focus: false
    };
  },
  computed: {
    get_custom_value: function get_custom_value() {
      return isNaN(this.custom_value) ? "" : this.custom_value;
    },
    custom_checked: function custom_checked() {
      return this.custom_value !== "" ? true : false;
    }
  },
  methods: {
    set_custom_value: function set_custom_value($event) {
      this.custom_value = parseInt($event.target.value);
      this.form[this.element_settings.name] = this.custom_value;
      this.load_custom_value();
    },
    debounce_set_custom_value: Object(debounce["a" /* default */])(function ($event) {
      this.set_custom_value($event);
    }, 500),
    custom_value_on_focus: function custom_value_on_focus($event) {
      this.custom_value_focus = true;
      this.set_custom_value($event);
    },
    load_custom_value: function load_custom_value() {
      if (Object(findIndex["a" /* default */])(this.element_settings.options, {
        value: parseInt(this.form[this.element_settings.name])
      }) == -1) {
        this.custom_value = this.form[this.element_settings.name];
      } else {
        this.custom_value = "";
      }
    }
  },
  created: function created() {
    this.load_custom_value();
  }
});
// CONCATENATED MODULE: ./src/components/form_elements/InlineRadioSelector.vue?vue&type=script&lang=js&
 /* harmony default export */ var form_elements_InlineRadioSelectorvue_type_script_lang_js_ = (InlineRadioSelectorvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/components/form_elements/InlineRadioSelector.vue?vue&type=style&index=0&id=32d5feb0&lang=css&scoped=true&
var InlineRadioSelectorvue_type_style_index_0_id_32d5feb0_lang_css_scoped_true_ = __webpack_require__("03d0");

// CONCATENATED MODULE: ./src/components/form_elements/InlineRadioSelector.vue






/* normalize component */

var InlineRadioSelector_component = Object(componentNormalizer["a" /* default */])(
  form_elements_InlineRadioSelectorvue_type_script_lang_js_,
  InlineRadioSelectorvue_type_template_id_32d5feb0_scoped_true_render,
  InlineRadioSelectorvue_type_template_id_32d5feb0_scoped_true_staticRenderFns,
  false,
  null,
  "32d5feb0",
  null
  
)

/* harmony default export */ var InlineRadioSelector = (InlineRadioSelector_component.exports);
// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js?{"cacheDirectory":"node_modules/.cache/vue-loader","cacheIdentifier":"23115053-vue-loader-template"}!./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/components/form_elements/TimeRange1ToN.vue?vue&type=template&id=4d525254&
var TimeRange1ToNvue_type_template_id_4d525254_render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',[_vm._l((_vm.value),function(period,index){return _c('div',{key:index,staticStyle:{"margin-bottom":"5px"}},[_c('div',{staticClass:"date-range-selector cf",class:{
        multiple: _vm.value.length > 1,
        'del-alert': _vm.show_delete_alert(index)
      }},[_c('div',{staticClass:"col50"},[_c('div',[_c('div',{staticClass:"label txt-help",class:{
              'has-error':
                _vm.$v &&
                _vm.$v.$each &&
                _vm.$v.$each.$iter[index].from_time.$dirty &&
                _vm.$v.$each.$iter[index].from_time.$error
            }},[_vm._v(" "+_vm._s(_vm.T__("FROM"))+" ")]),_c('TimePicker',{model:{value:(period.from_time),callback:function ($$v) {_vm.$set(period, "from_time", $$v)},expression:"period.from_time"}})],1)]),(_vm.value.length > 1)?_c('div',{staticClass:"icon-delete",on:{"click":function($event){_vm.value.splice(index, 1);
          _vm.set_mouseover(index, false);},"mouseover":function($event){return _vm.set_mouseover(index, true)},"mouseleave":function($event){return _vm.set_mouseover(index, false)}}}):_vm._e(),_c('div',{staticClass:"col50"},[_c('div',[_c('div',{staticClass:"label txt-help",class:{
              'has-error':
                _vm.$v &&
                _vm.$v.$each &&
                _vm.$v.$each.$iter[index].to_time.$dirty &&
                _vm.$v.$each.$iter[index].to_time.$error
            }},[_vm._v(" "+_vm._s(_vm.T__("TO"))+" ")]),_c('TimePicker',{model:{value:(period.to_time),callback:function ($$v) {_vm.$set(period, "to_time", $$v)},expression:"period.to_time"}})],1)])]),(_vm.$v && _vm.$v.$each && _vm.$v.$each.$iter[index])?_c('form-row',{attrs:{"validator":_vm.$v.$each.$iter[index].from_time}}):_vm._e(),(_vm.$v && _vm.$v.$each && _vm.$v.$each.$iter[index])?_c('form-row',{attrs:{"validator":_vm.$v.$each.$iter[index].to_time}}):_vm._e()],1)}),(_vm.can_show_add_period)?_c('a',{staticClass:"mt5",on:{"click":_vm.add_new_range}},[_vm._v(_vm._s(_vm.T__("+ Add another period")))]):_vm._e()],2)}
var TimeRange1ToNvue_type_template_id_4d525254_staticRenderFns = []


// CONCATENATED MODULE: ./src/components/form_elements/TimeRange1ToN.vue?vue&type=template&id=4d525254&

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js?{"cacheDirectory":"node_modules/.cache/vue-loader","cacheIdentifier":"23115053-vue-loader-template"}!./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/components/form_elements/TimePicker.vue?vue&type=template&id=d63cd724&
var TimePickervue_type_template_id_d63cd724_render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('span',[_c('vue-timepicker',{attrs:{"format":_vm.time_format,"hide-clear-button":"","auto-scroll":"","advanced-keyboard":"","minute-interval":_vm.minute_interval},on:{"change":_vm.handle_picker_change,"open":function($event){return _vm.$emit('time-picker-opened')}},model:{value:(_vm.time_data),callback:function ($$v) {_vm.time_data=$$v},expression:"time_data"}})],1)}
var TimePickervue_type_template_id_d63cd724_staticRenderFns = []


// CONCATENATED MODULE: ./src/components/form_elements/TimePicker.vue?vue&type=template&id=d63cd724&

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.array.join.js
var es_array_join = __webpack_require__("a15b");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.string.split.js
var es_string_split = __webpack_require__("1276");

// EXTERNAL MODULE: ./node_modules/date-fns/esm/format/index.js + 25 modules
var format = __webpack_require__("b166");

// EXTERNAL MODULE: ./node_modules/vue2-timepicker/src/vue-timepicker.vue + 4 modules
var vue_timepicker = __webpack_require__("fea2");

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js??ref--12-0!./node_modules/thread-loader/dist/cjs.js!./node_modules/babel-loader/lib!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/components/form_elements/TimePicker.vue?vue&type=script&lang=js&



//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ var TimePickervue_type_script_lang_js_ = ({
  name: "TimePicker",
  components: {
    VueTimepicker: vue_timepicker["a" /* default */]
  },
  model: {
    prop: "time",
    event: "time-changed"
  },
  props: {
    time: {
      type: String
    }
  },
  computed: {
    time_data: {
      get: function get() {
        var time = this.time;
        var time_obj_return = {
          HH: "",
          hh: "",
          mm: "",
          a: ""
        };
        this.$store.getters.get_general_settings; //having this.$store.getters.get_general_settings absolutely required for reactivity, or else 17:00 becomes 5am when toggle 12hrs and 24hrs. Especially in setting page.

        if (time) {
          if (time == "::00" || time == "::") {
            return time_obj_return;
          }

          var time_parts = time.split(":");
          time_parts[0] = time_parts[0] ? time_parts[0] : "00";
          time_parts[1] = time_parts[1] ? time_parts[1] : "00";
          time_parts[2] = time_parts[2] ? time_parts[2] : "00";
          time = time_parts.join(":"); //need to validate the incoming format

          var time_obj = this.date_parse("2000-01-01 " + time);
          time_obj_return = {
            HH: Object(format["a" /* default */])(time_obj, "HH"),
            hh: Object(format["a" /* default */])(time_obj, "hh"),
            mm: Object(format["a" /* default */])(time_obj, "mm"),
            a: Object(format["a" /* default */])(time_obj, "a").toLocaleLowerCase()
          };
        }

        return time_obj_return;
      },
      set: function set(new_value) {
        new_value;
      }
    },
    time_format: function time_format() {
      var format = "HH:mm";
      var get_general_settings = this.$store.getters.get_general_settings;

      if (get_general_settings && get_general_settings.hasOwnProperty("time_format") && get_general_settings.time_format === "12hrs") {
        format = "hh:mm a";
      }

      return format;
    },
    minute_interval: function minute_interval() {
      var _this$time_data;

      var interval = 5;

      if (!((_this$time_data = this.time_data) === null || _this$time_data === void 0 ? void 0 : _this$time_data.mm)) {
        return interval;
      }

      interval = this.time_data.mm % 5 ? 1 : interval;
      return interval;
    }
  },
  methods: {
    handle_picker_change: function handle_picker_change(event) {
      var t = event.data;
      var final = t.HH + ":" + t.mm + ":00";
      this.$emit("time-changed", final);
    }
  }
});
// CONCATENATED MODULE: ./src/components/form_elements/TimePicker.vue?vue&type=script&lang=js&
 /* harmony default export */ var form_elements_TimePickervue_type_script_lang_js_ = (TimePickervue_type_script_lang_js_); 
// CONCATENATED MODULE: ./src/components/form_elements/TimePicker.vue





/* normalize component */

var TimePicker_component = Object(componentNormalizer["a" /* default */])(
  form_elements_TimePickervue_type_script_lang_js_,
  TimePickervue_type_template_id_d63cd724_render,
  TimePickervue_type_template_id_d63cd724_staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* harmony default export */ var TimePicker = (TimePicker_component.exports);
// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js??ref--12-0!./node_modules/thread-loader/dist/cjs.js!./node_modules/babel-loader/lib!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/components/form_elements/TimeRange1ToN.vue?vue&type=script&lang=js&
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ var TimeRange1ToNvue_type_script_lang_js_ = ({
  name: "TimeRange1ToN",
  components: {
    TimePicker: TimePicker
  },
  props: {
    $v: {},
    value: {
      type: Array,
      required: true
    },
    hide_add_period_on_no_periods: {
      default: "0"
    },
    disable_multiple: {
      type: Boolean,
      default: false
    }
  },
  data: function data() {
    return {
      delete_alert_index: null
    };
  },
  computed: {
    hide_add_period_on_no_periods_check: function hide_add_period_on_no_periods_check() {
      return this.hide_add_period_on_no_periods == "1" && this.value.length == 0;
    },
    can_show_add_period: function can_show_add_period() {
      return this.disable_multiple === false && !this.hide_add_period_on_no_periods_check;
    }
  },
  methods: {
    add_new_range: function add_new_range() {
      var new_range = {
        from_time: "",
        to_time: ""
      };
      this.value.push(new_range);
    },
    show_delete_alert: function show_delete_alert(index) {
      return this.delete_alert_index === index;
    },
    set_mouseover: function set_mouseover(index, is_hover) {
      if (is_hover) {
        this.delete_alert_index = index;
      } else {
        this.delete_alert_index = null;
      }
    }
  }
});
// CONCATENATED MODULE: ./src/components/form_elements/TimeRange1ToN.vue?vue&type=script&lang=js&
 /* harmony default export */ var form_elements_TimeRange1ToNvue_type_script_lang_js_ = (TimeRange1ToNvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/components/form_elements/TimeRange1ToN.vue?vue&type=style&index=0&lang=css&
var TimeRange1ToNvue_type_style_index_0_lang_css_ = __webpack_require__("4753");

// CONCATENATED MODULE: ./src/components/form_elements/TimeRange1ToN.vue






/* normalize component */

var TimeRange1ToN_component = Object(componentNormalizer["a" /* default */])(
  form_elements_TimeRange1ToNvue_type_script_lang_js_,
  TimeRange1ToNvue_type_template_id_4d525254_render,
  TimeRange1ToNvue_type_template_id_4d525254_staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* harmony default export */ var TimeRange1ToN = (TimeRange1ToN_component.exports);
// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js?{"cacheDirectory":"node_modules/.cache/vue-loader","cacheIdentifier":"23115053-vue-loader-template"}!./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/components/form_elements/WeekDaysSelector.vue?vue&type=template&id=48cce514&scoped=true&
var WeekDaysSelectorvue_type_template_id_48cce514_scoped_true_render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',[_c('ul',{staticClass:"selector block apply-multiple-days"},_vm._l((_vm.weekdays),function(day,index){return _c('li',{key:index,attrs:{"title":day.full_day}},[_c('input',{directives:[{name:"model",rawName:"v-model",value:(_vm.selected_days),expression:"selected_days"}],attrs:{"type":"checkbox","id":'multiple-' + day.index,"name":"apply-multiple-days"},domProps:{"value":day.index,"checked":Array.isArray(_vm.selected_days)?_vm._i(_vm.selected_days,day.index)>-1:(_vm.selected_days)},on:{"change":[function($event){var $$a=_vm.selected_days,$$el=$event.target,$$c=$$el.checked?(true):(false);if(Array.isArray($$a)){var $$v=day.index,$$i=_vm._i($$a,$$v);if($$el.checked){$$i<0&&(_vm.selected_days=$$a.concat([$$v]))}else{$$i>-1&&(_vm.selected_days=$$a.slice(0,$$i).concat($$a.slice($$i+1)))}}else{_vm.selected_days=$$c}},function($event){return _vm.$emit('change-prop-selected-days', _vm.selected_days)}]}}),_c('label',{attrs:{"for":'multiple-' + day.index}},[_vm._v(_vm._s(day.mini_day))])])}),0)])}
var WeekDaysSelectorvue_type_template_id_48cce514_scoped_true_staticRenderFns = []


// CONCATENATED MODULE: ./src/components/form_elements/WeekDaysSelector.vue?vue&type=template&id=48cce514&scoped=true&

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js??ref--12-0!./node_modules/thread-loader/dist/cjs.js!./node_modules/babel-loader/lib!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/components/form_elements/WeekDaysSelector.vue?vue&type=script&lang=js&
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ var WeekDaysSelectorvue_type_script_lang_js_ = ({
  model: {
    prop: "prop_selected_days",
    event: "change-prop-selected-days"
  },
  props: {
    prop_selected_days: {
      type: Array
    }
  },
  data: function data() {
    return {
      weekdays: common_func["w" /* weekdays_list */],
      selected_days: []
    };
  },
  watch: {
    prop_selected_days: function prop_selected_days(new_value) {
      this.selected_days = new_value;
    }
  },
  mounted: function mounted() {
    this.selected_days = this.prop_selected_days;
  }
});
// CONCATENATED MODULE: ./src/components/form_elements/WeekDaysSelector.vue?vue&type=script&lang=js&
 /* harmony default export */ var form_elements_WeekDaysSelectorvue_type_script_lang_js_ = (WeekDaysSelectorvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/components/form_elements/WeekDaysSelector.vue?vue&type=style&index=0&id=48cce514&scoped=true&lang=css&
var WeekDaysSelectorvue_type_style_index_0_id_48cce514_scoped_true_lang_css_ = __webpack_require__("e98d");

// CONCATENATED MODULE: ./src/components/form_elements/WeekDaysSelector.vue






/* normalize component */

var WeekDaysSelector_component = Object(componentNormalizer["a" /* default */])(
  form_elements_WeekDaysSelectorvue_type_script_lang_js_,
  WeekDaysSelectorvue_type_template_id_48cce514_scoped_true_render,
  WeekDaysSelectorvue_type_template_id_48cce514_scoped_true_staticRenderFns,
  false,
  null,
  "48cce514",
  null
  
)

/* harmony default export */ var WeekDaysSelector = (WeekDaysSelector_component.exports);
// EXTERNAL MODULE: ./src/components/form_elements/TimeZoneSelector.vue + 4 modules
var TimeZoneSelector = __webpack_require__("e268");

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js??ref--12-0!./node_modules/thread-loader/dist/cjs.js!./node_modules/babel-loader/lib!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/components/admin/ServiceFormStep3.vue?vue&type=script&lang=js&



//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//






/* harmony default export */ var ServiceFormStep3vue_type_script_lang_js_ = ({
  name: "ServiceFormStep3",
  props: {
    view: {
      type: String
    },
    step: {
      type: Object,
      required: true
    },
    form: {
      type: Object,
      required: true
    },
    create_or_update_btn_is_enabled: {},
    $v: {}
  },
  components: {
    InlineRadioSelector: InlineRadioSelector,
    TimeRange1ToN: TimeRange1ToN,
    WeekDaysSelector: WeekDaysSelector,
    TimeZoneSelector: TimeZoneSelector["a" /* default */],
    TimePicker: TimePicker
  },
  data: function data() {
    return {
      show_advance_options: false,
      event_duration_element_setting: {
        name: "duration",
        options: [{
          value: 15,
          text: 15
        }, {
          value: 30,
          text: 30
        }, {
          value: 45,
          text: 45
        }, {
          value: 60,
          text: 60
        }],
        custom_option: true,
        style_class: []
      },
      display_start_time_every_element_setting: {
        name: "display_start_time_every",
        options: [{
          value: 15,
          text: 15
        }, {
          value: 30,
          text: 30
        }, {
          value: 45,
          text: 45
        }, {
          value: 60,
          text: 60
        }],
        custom_option: true,
        style_class: [] //"avail-increments"

      },
      event_buffer_before_element_setting: {
        name: "event_buffer_before",
        options: [{
          value: 0,
          text: "0 " + this.T_x("min", "mintue")
        }, {
          value: 5,
          text: "5 " + this.T_x("min", "mintue")
        }, {
          value: 10,
          text: "10 " + this.T_x("min", "mintue")
        }, {
          value: 15,
          text: "15 " + this.T_x("min", "mintue")
        }, {
          value: 30,
          text: "30 " + this.T_x("min", "mintue")
        }, {
          value: 45,
          text: "45 " + this.T_x("min", "mintue")
        }, {
          value: 60,
          text: "1 " + this.T_x("hr", "hour")
        }, {
          value: 90,
          text: "1 " + this.T_x("hr", "hour") + // intentional line break, i18n search replace
          " 30 " + this.T_x("min", "mintue")
        }, {
          value: 120,
          text: "2 " + this.T_x("hr", "hour")
        }, {
          value: 150,
          text: "2 hr 30 " + this.T_x("min", "mintue")
        }, {
          value: 180,
          text: "3 " + this.T_x("hr", "hour")
        }],
        selected_value: 30
      },
      event_buffer_after_element_setting: {
        name: "event_buffer_after",
        options: [{
          value: 0,
          text: "0 " + this.T_x("min", "mintue")
        }, {
          value: 5,
          text: "5 " + this.T_x("min", "mintue")
        }, {
          value: 10,
          text: "10 " + this.T_x("min", "mintue")
        }, {
          value: 15,
          text: "15 " + this.T_x("min", "mintue")
        }, {
          value: 30,
          text: "30 " + this.T_x("min", "mintue")
        }, {
          value: 45,
          text: "45 " + this.T_x("min", "mintue")
        }, {
          value: 60,
          text: "1 " + this.T_x("hr", "hour")
        }, {
          value: 90,
          text: "1 " + this.T_x("hr", "hour") + // intentional line break, i18n search replace
          " 30 " + this.T_x("min", "mintue")
        }, {
          value: 120,
          text: "2 " + this.T_x("hr", "hour")
        }, {
          value: 150,
          text: "2 " + this.T_x("hr", "hour") + // intentional line break, i18n search replace
          " 30 " + this.T_x("min", "mintue")
        }, {
          value: 180,
          text: "3 " + this.T_x("hr", "hour")
        }],
        selected_value: 30
      }
    };
  },
  computed: {
    show_advance_options_txt: function show_advance_options_txt() {
      return this.show_advance_options ? this.T__("- Hide Advanced options") : this.T__("+ Show Advanced options");
    },
    show_relative_date_range: {
      // getter
      get: function get() {
        var misc_value = this.form.default_availability_details.date_misc;

        if (this.form.default_availability_details.date_range_type === "relative" && misc_value) {
          var show_misc_value = misc_value.replace(/^\+((\d)*)D$/gm, function (x, y) {
            return y;
          });
          return show_misc_value;
        }

        return "";
      },
      // setter
      set: function set(new_value) {
        new_value = new_value.trim();

        if (new_value.length > 0) {
          this.form.default_availability_details.date_misc = "+" + new_value + "D";
        } else {
          this.form.default_availability_details.date_misc = "";
        }
      }
    },
    default_availability_details_from_date_obj: {
      get: function get() {
        if (this.default_availability_details_from_date) {
          var parsed_date = this.date_parse(this.default_availability_details_from_date);
          return parsed_date;
        }

        return "";
      },
      set: function set(new_value) {
        if (this.form.default_availability_details.date_range_type == "from_to") {
          this.form.default_availability_details.from_date = this.$options.filters.wpcal_format_std_date(new_value);
        }
      }
    },
    default_availability_details_to_date_obj: {
      get: function get() {
        if (this.default_availability_details_to_date) {
          var parsed_date = this.date_parse(this.default_availability_details_to_date);
          return parsed_date;
        }

        return "";
      },
      set: function set(new_value) {
        if (this.form.default_availability_details.date_range_type == "from_to") {
          this.form.default_availability_details.to_date = this.$options.filters.wpcal_format_std_date(new_value);
        }
      }
    },
    default_availability_details_from_date: {
      get: function get() {
        return this.form.default_availability_details.date_range_type == "from_to" ? this.form.default_availability_details.from_date : "";
      },
      set: Object(debounce["a" /* default */])(function (new_value) {
        this.form.default_availability_details.from_date = new_value;
      }, 1500)
    },
    default_availability_details_to_date: {
      get: function get() {
        return this.form.default_availability_details.date_range_type == "from_to" ? this.form.default_availability_details.to_date : "";
      },
      set: Object(debounce["a" /* default */])(function (new_value) {
        this.form.default_availability_details.to_date = new_value;
      }, 1500)
    }
  },
  mounted: function mounted() {
    var _this = this;

    this.$root.$on("show-advance-options", function () {
      _this.show_advance_options = true;
    });
  }
});
// CONCATENATED MODULE: ./src/components/admin/ServiceFormStep3.vue?vue&type=script&lang=js&
 /* harmony default export */ var admin_ServiceFormStep3vue_type_script_lang_js_ = (ServiceFormStep3vue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/components/admin/ServiceFormStep3.vue?vue&type=style&index=0&id=23488004&lang=css&scoped=true&
var ServiceFormStep3vue_type_style_index_0_id_23488004_lang_css_scoped_true_ = __webpack_require__("2a61");

// CONCATENATED MODULE: ./src/components/admin/ServiceFormStep3.vue






/* normalize component */

var ServiceFormStep3_component = Object(componentNormalizer["a" /* default */])(
  admin_ServiceFormStep3vue_type_script_lang_js_,
  ServiceFormStep3vue_type_template_id_23488004_scoped_true_render,
  ServiceFormStep3vue_type_template_id_23488004_scoped_true_staticRenderFns,
  false,
  null,
  "23488004",
  null
  
)

/* harmony default export */ var ServiceFormStep3 = (ServiceFormStep3_component.exports);
// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js?{"cacheDirectory":"node_modules/.cache/vue-loader","cacheIdentifier":"23115053-vue-loader-template"}!./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/components/admin/ServiceFormEditView.vue?vue&type=template&id=114eca6a&scoped=true&
var ServiceFormEditViewvue_type_template_id_114eca6a_scoped_true_render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',{staticClass:"col-cont"},[_c('div',{staticClass:"col"},[(_vm.edit_view.step2.summary)?_c('div',{staticClass:"mbox"},[_c('div',{staticStyle:{"float":"right","display":"flex"}},[(_vm.saved_form.status == 1 || _vm.saved_form.status == -1)?_c('OnOffSlider',{staticStyle:{"margin-left":"auto","margin-right":"10px"},attrs:{"name":_vm.saved_form.id,"true_value":"1","false_value":"-1"},on:{"prop-slider-value-changed":function($event){return _vm.$emit('change-service-status', $event)}},model:{value:(_vm.saved_form.status),callback:function ($$v) {_vm.$set(_vm.saved_form, "status", $$v)},expression:"saved_form.status"}}):_vm._e(),_c('a',{on:{"click":function($event){return _vm.$emit('edit-view-toggle-steps', _vm.edit_view.step2)}}},[_vm._v(_vm._s(_vm.T__("EDIT")))])],1),_c('div',{staticClass:"txt-h4"},[_vm._v(_vm._s(_vm.T__("Event type details")))]),_c('div',{staticClass:"form-step-meta"},[_c('div',{staticStyle:{"font-size":"14px","padding-top":"10px","margin-bottom":"10px"}},[_vm._v(" "+_vm._s(_vm.T__("Event type name:"))+" "+_vm._s(_vm.saved_form.name)+" ")]),_c('div',{staticStyle:{"margin-bottom":"10px"}},[_vm._v(" "+_vm._s(_vm.T__("Invitee type:"))+" "+_vm._s(_vm._f("relationship_type_str")(_vm.saved_form.relationship_type))+" ")]),_c('div',{staticStyle:{"padding-bottom":"10px","display":"flex"}},[_vm._v(" "+_vm._s(_vm.T__("Location:"))+" "),(_vm.saved_form.locations.length)?_c('span',{staticStyle:{"display":"flex","padding":"0 5px"},domProps:{"innerHTML":_vm._f("locations_summary")(_vm.saved_form.locations)}}):_vm._e(),(!_vm.saved_form.locations.length)?_c('span',{staticStyle:{"display":"flex","padding":"0 5px"}},[_vm._v(" "+_vm._s(_vm.T__("Not set")))]):_vm._e()]),_c('div',{staticStyle:{"margin-bottom":"10px"}},[_vm._v(" "+_vm._s(_vm.T__("Short code:"))+" "),_c('input',{staticClass:"shortCode",attrs:{"onClick":"this.select();","type":"text","spellcheck":"false"},domProps:{"value":'[wpcal id=' + _vm.service_id + ']'}}),_c('img',{staticClass:"serviceEditViewOwnerPic",staticStyle:{"border-radius":"50%","float":"right"},attrs:{"src":_vm.$store.getters.get_current_admin_details.profile_picture,"width":"30","title":'This event type is available only for ' +
                _vm.$store.getters.get_current_admin_details.display_name +
                '.'}})]),_c('div',[_vm._v(_vm._s(_vm.saved_form.descr))]),_c('hr'),_c('div',{staticStyle:{"display":"flex"}},[(_vm.saved_form.post_id)?_c('div',[_c('a',{attrs:{"href":'post.php?post=' + _vm.saved_form.post_id + '&action=edit',"target":"_blank"}},[_vm._v(_vm._s(_vm.T__("Edit Booking Page"))+" "),_c('span',{staticStyle:{"font-size":"11px","font-weight":"600"}},[_vm._v("↗")])])]):_vm._e(),(_vm.saved_form.post_details.link)?_c('div',{staticStyle:{"margin-left":"auto","margin-right":"12px"}},[_c('a',{attrs:{"href":_vm.saved_form.post_details.link,"target":"_blank"}},[_vm._v(_vm._s(_vm.T__("View Booking Page"))+" "),_c('span',{staticStyle:{"font-size":"11px","font-weight":"600"}},[_vm._v("↗")])])]):_vm._e()])])]):_vm._e(),(_vm.edit_view.step2.form)?_c('ServiceFormStep2',{attrs:{"$v":_vm.$v,"view":_vm.view,"step":{ id: 2, upcoming: false, summary: false, form: true },"form":_vm.form,"create_or_update_btn_is_enabled":_vm.create_or_update_btn_is_enabled},on:{"submit-form":function($event){return _vm.$emit('submit-form', $event)},"edit-view-toggle-steps":function($event){return _vm.$emit('edit-view-toggle-steps', _vm.edit_view.step2)}}}):_vm._e(),(_vm.edit_view.step3.summary)?_c('div',{staticClass:"mbox"},[_c('div',{staticStyle:{"float":"right"}},[_c('a',{on:{"click":function($event){return _vm.$emit('edit-view-toggle-steps', _vm.edit_view.step3)}}},[_vm._v(_vm._s(_vm.T__("EDIT")))])]),_c('div',{staticClass:"txt-h4"},[_vm._v(_vm._s(_vm.T__("Event type duration & timings")))]),_c('div',{staticClass:"form-step-meta mt10"},[_c('div',{staticStyle:{"margin-bottom":"10px"}},[_vm._v(" "+_vm._s(_vm.T__("Date range:"))+" "+_vm._s(_vm.service_date_range_summary)+" ")]),_c('div',{staticStyle:{"margin-bottom":"10px"}},[_c('div',[_vm._v(" "+_vm._s(_vm.T__("Event duration:"))+" "+_vm._s(_vm._f("mins_to_str")(_vm.saved_form.duration))+" ")]),_c('div',[_vm._v(" "+_vm._s(_vm.T__("Show start times every:"))+" "+_vm._s(_vm._f("mins_to_str")(_vm.saved_form.display_start_time_every))+" ")])]),_c('div',{staticStyle:{"text-decoration":"underline"}},[_vm._v(" "+_vm._s(_vm.T__("Availability for this event type"))+" ")]),_c('div',[_vm._v(" "+_vm._s(_vm.T__("Available hours:"))+" "),_c('div',{staticStyle:{"display":"inline-grid"}},_vm._l((_vm.saved_form
                .default_availability_details.periods),function(period,index){return _c('div',{key:index},[_vm._v(" "+_vm._s(_vm._f("wpcal_format_time_only")(period.from_time,_vm.time_format))+" - "+_vm._s(_vm._f("wpcal_format_time_only")(period.to_time,_vm.time_format))+" ")])}),0)]),_c('div',{staticStyle:{"margin-bottom":"10px"}},[_vm._v(" "+_vm._s(_vm.T__("Available days:"))+" "),_c('span',[_vm._v(" "+_vm._s(_vm._f("wpcal_format_weekdays_summary")(_vm.saved_form.default_availability_details.day_index_list))+" ")])]),_c('div',{staticStyle:{"margin-bottom":"10px"}},[_vm._v(" "+_vm._s(_vm.T__("Time zone:"))+" "),_c('span',[_vm._v(" "+_vm._s(_vm._f("wpcal_format_tz")(_vm.saved_form.timezone))+" ")])]),_c('div',[_c('div',{staticStyle:{"text-decoration":"underline"}},[_vm._v(" "+_vm._s(_vm.T__("Advanced settings"))+" ")]),_c('div',[_vm._v(" "+_vm._s(_vm.T__("Max bookings per day"))+": "+_vm._s(_vm.saved_form.max_booking_per_day ? _vm.saved_form.max_booking_per_day : "No limit")+" ")]),_c('div',[_vm._v(" "+_vm._s(_vm.T__("Minimum Scheduling Notice"))+": "),(_vm.saved_form.min_schedule_notice.type == 'none')?_c('span',[_vm._v(_vm._s(_vm.T__("None")))]):_vm._e(),(_vm.saved_form.min_schedule_notice.type == 'units')?_c('span',[_vm._v(" "+_vm._s(_vm.Tsprintf( /* translators: 1: int 2: mins or hours or days */ _vm.T__("Prevent booking of slots less than %1$s %2$s away."), this.saved_form.min_schedule_notice.time_units, this.saved_form.min_schedule_notice.time_units_in ))+" ")]):_vm._e(),(_vm.saved_form.min_schedule_notice.type == 'time_days_before')?_c('span',[_vm._v(" "+_vm._s(_vm.Tsprintf( /* translators: 1: time HH:mm 2: int */ _vm.T_n( "Prevent all bookings after %1$s %2$s day before.", "Prevent all bookings after %1$s %2$s days before.", this.saved_form.min_schedule_notice.days_before ), this.$options.filters.wpcal_format_time_only( this.saved_form.min_schedule_notice.days_before_time, _vm.time_format ) + (_vm.time_format == "HH:mm" ? " " + _vm.T__("hrs") : ""), this.saved_form.min_schedule_notice.days_before ))+" ")]):_vm._e()]),_c('div',[_vm._v(" "+_vm._s(_vm.T__("Event buffers"))+": "),(
                !_vm.saved_form.event_buffer_before &&
                  !_vm.saved_form.event_buffer_after
              )?_c('span',[_vm._v(" "+_vm._s(_vm.T__("None"))+" ")]):_vm._e(),(_vm.saved_form.event_buffer_before)?_c('span',[_vm._v(_vm._s(_vm.Tsprintf( /* translators: 1: int min or int hr int min */ _vm.T__("%1$s before event"), this.$options.filters.mins_to_str( this.saved_form.event_buffer_before ) )))]):_vm._e(),(
                _vm.saved_form.event_buffer_before &&
                  _vm.saved_form.event_buffer_after
              )?_c('span',[_vm._v(" & ")]):_vm._e(),(_vm.saved_form.event_buffer_after)?_c('span',[_vm._v(_vm._s(_vm.Tsprintf( /* translators: 1: int min or int hr int min */ _vm.T__("%1$s after event"), this.$options.filters.mins_to_str( this.saved_form.event_buffer_after ) )))]):_vm._e()])])]),_c('button',{staticClass:"wpc-btn secondary md mt20",staticStyle:{"width":"100%"},attrs:{"type":"button"},on:{"click":_vm.show_service_availability_modal}},[_vm._v(" "+_vm._s(_vm.T__("Set custom hours for specific days/dates"))+" ")]),_c('modal',{staticStyle:{"z-index":"9999"},attrs:{"name":"service_availability_modal","width":'950px',"height":'80%',"adaptive":true},on:{"before-close":_vm.service_availability_modal_before_close}},[_c('ServiceAvailabilityCal',{ref:"service_availability_modal_contents",attrs:{"timezone":_vm.saved_form.timezone}})],1)],1):_vm._e(),(_vm.edit_view.step3.form)?_c('ServiceFormStep3',{attrs:{"$v":_vm.$v,"view":_vm.view,"step":{ id: 3, upcoming: false, summary: false, form: true },"form":_vm.form,"create_or_update_btn_is_enabled":_vm.create_or_update_btn_is_enabled},on:{"submit-form":function($event){return _vm.$emit('submit-form', $event)},"edit-view-toggle-steps":function($event){return _vm.$emit('edit-view-toggle-steps', _vm.edit_view.step3)}}}):_vm._e(),_c('div',{staticClass:"mbox"},[_c('div',{staticClass:"form-step-meta",domProps:{"innerHTML":_vm._s(
          _vm.Tsprintf(
            /* translators: 1: html-tag-open 2: html-tag-close 3: email */
            _vm.T__(
              'New booking, rescheduling and cancellation notifications will be sent to %1$s %3$s %2$s (your WP admin email)'
            ),
            '<span style="color:#131336">',
            '</span>',
            _vm.$store.getters.get_current_admin_details.email
          )
        )}})])],1),_c('div',{staticClass:"col"},[_c('div',{staticStyle:{"font-size":"16px","font-weight":"500","margin":"0px 0 10px","display":"flex"}},[_vm._v(" "+_vm._s(_vm.T__("Additional Options"))+" "),_c('PremiumInfoBadge',{staticStyle:{"margin":"-6px 0 0 10px"}},[_c('em',[_vm._v("Free: 1 question"),_c('br'),_vm._v("Plus: Unlimited")])])],1),_c('ServiceInviteeQuestions',{on:{"save-questions":function($event){return _vm.$emit('save-questions', $event)}},model:{value:(_vm.form.invitee_questions),callback:function ($$v) {_vm.$set(_vm.form, "invitee_questions", $$v)},expression:"form.invitee_questions"}})],1),(_vm.saved_form.name)?_c('AlertAdminToUpdateProfile',{attrs:{"service_details":_vm.saved_form}}):_vm._e()],1)}
var ServiceFormEditViewvue_type_template_id_114eca6a_scoped_true_staticRenderFns = []


// CONCATENATED MODULE: ./src/components/admin/ServiceFormEditView.vue?vue&type=template&id=114eca6a&scoped=true&

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js?{"cacheDirectory":"node_modules/.cache/vue-loader","cacheIdentifier":"23115053-vue-loader-template"}!./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/components/admin/ServiceAvailabilityCal.vue?vue&type=template&id=7066fc36&scoped=true&
var ServiceAvailabilityCalvue_type_template_id_7066fc36_scoped_true_render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('span',[(_vm.events != null)?_c('vue-cal',{ref:"vuecal",staticClass:"vuecal--blue-theme",staticStyle:{"align-self":"stretch"},attrs:{"default-view":"month","hide-view-selector":"","events":_vm.events,"disable-views":['years', 'year', 'week', 'day'],"time":false,"min-date":_vm.cal_min_date,"max-date":_vm.cal_max_date,"events-on-month-view":true,"on-event-click":_vm.cal_event_trigger_show_edit_date_availability},on:{"cell-click":function($event){return _vm.cal_cell_trigger_show_edit_date_availability('cell-click', $event)},"view-change":_vm.process_calendar_month_move_event}}):_vm._e(),_c('div',{directives:[{name:"show",rawName:"v-show",value:(_vm.show_edit_date_availability_popup),expression:"show_edit_date_availability_popup"}],staticStyle:{"z-index":"10000","width":"360px"},attrs:{"id":"edit_date_availability"}},[_c('div',{staticClass:"popper_arrow",attrs:{"data-popper-arrow":""}}),_c('div',{directives:[{name:"show",rawName:"v-show",value:(_vm.show_edit_date_availability),expression:"show_edit_date_availability"}],staticClass:"mbox bg-light shadow edit-availability"},[_c('div',{staticClass:"txt-h4 bold center mb20 mt10"},[_vm._v(" "+_vm._s(_vm.T__("Edit Availability"))+" ")]),(
          _vm.current_customizing_availability_date_details &&
            _vm.current_customizing_availability_date_details.is_available == 0
        )?_c('div',[_c('div',{staticClass:"unavailable"},[_vm._v(_vm._s(_vm.T__("Unavailable")))]),_c('button',{staticClass:"wpc-btn secondary sm mt10 center",attrs:{"disabled":!_vm.current_date_popup_action_btns_is_enabled},on:{"click":function($event){return _vm.update_customizes_date_availability(
              'this_day_available_use_previous_periods'
            )}}},[_vm._v(" "+_vm._s(_vm.Tsprintf( /* translators: %s: date */ _vm.T__("Set as available on %s"), _vm.apply_to_this_date ))+" ")])]):_vm._e(),(_vm.current_customizing_availability_date_details)?_c('TimeRange1ToN',{attrs:{"hide_add_period_on_no_periods":"1"},model:{value:(_vm.current_customizing_availability_date_details.periods),callback:function ($$v) {_vm.$set(_vm.current_customizing_availability_date_details, "periods", $$v)},expression:"current_customizing_availability_date_details.periods"}}):_vm._e(),(
          _vm.current_customizing_availability_date_details &&
            _vm.current_customizing_availability_date_details.is_available == 1
        )?_c('button',{staticClass:"wpc-btn secondary sm mt10 center",attrs:{"disabled":!_vm.current_date_popup_action_btns_is_enabled},on:{"click":function($event){return _vm.update_customizes_date_availability('this_day_unavailable')}}},[_vm._v(" "+_vm._s(_vm.Tsprintf( /* translators: %s: date */ _vm.T__("Set as unavailable on %s"), _vm.apply_to_this_date ))+" ")]):_vm._e(),(_vm.current_customizing_availability_date_details)?_c('span',[_c('button',{staticClass:"wpc-btn primary md mt20 full-width",attrs:{"disabled":!_vm.current_date_popup_action_btns_is_enabled},on:{"click":function($event){return _vm.update_customizes_date_availability('this_date_only')}}},[_vm._v(" "+_vm._s(_vm.Tsprintf( /* translators: %s: date */ _vm.T__("Apply to %s only"), _vm.apply_to_this_date ))+" ")]),_c('button',{staticClass:"wpc-btn primary md mt10 full-width",attrs:{"disabled":!_vm.current_date_popup_action_btns_is_enabled},on:{"click":function($event){return _vm.update_customizes_date_availability('this_day_from_this_date')}}},[_vm._v(" "+_vm._s(_vm.Tsprintf( /* translators: 1: weekday 2: date */ _vm.T__("Apply to all %1$s from %2$s"), _vm.apply_to_all_days, _vm.apply_from_this_date ))+" ")]),_c('button',{staticClass:"wpc-btn secondary-link md mt10 center",attrs:{"disabled":!_vm.current_date_popup_action_btns_is_enabled},on:{"click":_vm.show_apply_to_multiple_dates_by_date}},[_vm._v(" "+_vm._s(_vm.T__("Apply to multiple..."))+" ")])]):_vm._e(),_c('button',{staticClass:"wpc-btn tert-link sm mt20 center",on:{"click":_vm.close_edit_date_availability_popup_by_date}},[_vm._v(" "+_vm._s(_vm.T__("Cancel"))+" ")])],1),_c('div',{directives:[{name:"show",rawName:"v-show",value:(_vm.show_apply_to_multiple_dates),expression:"show_apply_to_multiple_dates"}],staticClass:"mbox bg-light shadow edit-availability",staticStyle:{"z-index":"10001"},attrs:{"id":"apply_to_multiple_dates"}},[_c('div',{staticClass:"txt-h4 center mb20 mt10"},[_c('div',{staticClass:"icon-back",on:{"click":_vm.back_to_show_edit_date_availability}}),_vm._v(" "+_vm._s(_vm.T__("Apply to multiple..."))+" ")]),_c('ul',{staticClass:"selector apply-multiple inline time mt10 mb10"},[_c('li',[_c('input',{directives:[{name:"model",rawName:"v-model",value:(_vm.popup_edit_availability_form.apply_multiple_dates_days),expression:"popup_edit_availability_form.apply_multiple_dates_days"}],attrs:{"type":"radio","id":"multiple-dates","name":"apply_multiple_dates_days","value":"dates"},domProps:{"checked":_vm._q(_vm.popup_edit_availability_form.apply_multiple_dates_days,"dates")},on:{"change":function($event){return _vm.$set(_vm.popup_edit_availability_form, "apply_multiple_dates_days", "dates")}}}),_c('label',{attrs:{"for":"multiple-dates"}},[_vm._v(_vm._s(_vm.T__("dates")))])]),_c('li',[_c('input',{directives:[{name:"model",rawName:"v-model",value:(_vm.popup_edit_availability_form.apply_multiple_dates_days),expression:"popup_edit_availability_form.apply_multiple_dates_days"}],attrs:{"type":"radio","id":"repeating-days","name":"apply_multiple_dates_days","value":"days"},domProps:{"checked":_vm._q(_vm.popup_edit_availability_form.apply_multiple_dates_days,"days")},on:{"change":function($event){return _vm.$set(_vm.popup_edit_availability_form, "apply_multiple_dates_days", "days")}}}),_c('label',{attrs:{"for":"repeating-days"}},[_vm._v(_vm._s(_vm.T__("repeating days of the week")))])])]),(
          _vm.popup_edit_availability_form.apply_multiple_dates_days === 'dates'
        )?_c('div',[_c('v-date-picker',{ref:"multiple_dates_picker",staticStyle:{"width":"100%"},attrs:{"mode":"multiple","is-inline":"","locale":this.$store.getters.get_site_locale.replace('_', '-'),"value":"current_customizing_availability_date","min-date":_vm.apply_multipe_date_picker_min_date,"max-date":_vm.apply_multipe_date_picker_max_date},on:{"dayclick":_vm.log},model:{value:(_vm.popup_edit_availability_form.selected_dates),callback:function ($$v) {_vm.$set(_vm.popup_edit_availability_form, "selected_dates", $$v)},expression:"popup_edit_availability_form.selected_dates"}}),_c('div',{directives:[{name:"show",rawName:"v-show",value:(_vm.dates_selected_meta_txt),expression:"dates_selected_meta_txt"}],staticStyle:{"text-align":"center","padding-top":"5px"}},[_vm._v(" "+_vm._s(_vm.Tsprintf( /* translators: 1: int */ _vm.T__("%1$s selected"), _vm.dates_selected_meta_txt ))+" • "),_c('a',{on:{"click":function($event){_vm.popup_edit_availability_form.selected_dates = []}}},[_vm._v(_vm._s(_vm.T__("Clear")))])]),_c('button',{staticClass:"wpc-btn primary md mt20 full-width",attrs:{"disabled":!_vm.current_date_popup_action_btns_is_enabled},on:{"click":function($event){return _vm.update_customizes_date_availability('apply_to_selected_dates')}}},[_vm._v(" "+_vm._s(_vm.T__("Apply"))+" ")])],1):_vm._e(),(
          _vm.popup_edit_availability_form.apply_multiple_dates_days === 'days'
        )?_c('div',[_c('WeekDaysSelector',{model:{value:(_vm.popup_edit_availability_form.apply_multiple_days),callback:function ($$v) {_vm.$set(_vm.popup_edit_availability_form, "apply_multiple_days", $$v)},expression:"popup_edit_availability_form.apply_multiple_days"}}),_c('button',{staticClass:"wpc-btn primary md mt20 full-width",attrs:{"disabled":!_vm.current_date_popup_action_btns_is_enabled},on:{"click":function($event){return _vm.update_customizes_date_availability('apply_to_selected_days')}}},[_vm._v(" Apply to selected day(s) from "+_vm._s(_vm.apply_from_this_date)+" ")])],1):_vm._e(),_c('button',{staticClass:"wpc-btn tert-link sm mt20 center",on:{"click":_vm.back_to_show_edit_date_availability}},[_vm._v(" "+_vm._s(_vm.T__("Cancel"))+" ")])])]),_c('div',{staticStyle:{"padding":"10px","margin-top":"-35px"}},[_c('AdminInfoLine',{staticStyle:{"margin":"0","width":"auto"},attrs:{"info_slug":"timings_in_timezone","timezone":_vm.timezone}})],1)],1)}
var ServiceAvailabilityCalvue_type_template_id_7066fc36_scoped_true_staticRenderFns = []


// CONCATENATED MODULE: ./src/components/admin/ServiceAvailabilityCal.vue?vue&type=template&id=7066fc36&scoped=true&

// EXTERNAL MODULE: ./node_modules/@babel/runtime/helpers/esm/typeof.js
var esm_typeof = __webpack_require__("53ca");

// EXTERNAL MODULE: ./node_modules/vue-cal/dist/vuecal.common.js
var vuecal_common = __webpack_require__("7fa7");
var vuecal_common_default = /*#__PURE__*/__webpack_require__.n(vuecal_common);

// EXTERNAL MODULE: ./node_modules/vue-cal/dist/vuecal.css
var vuecal = __webpack_require__("b55b");

// EXTERNAL MODULE: ./node_modules/@popperjs/core/lib/popper.js + 50 modules
var popper = __webpack_require__("39c3");

// EXTERNAL MODULE: ./node_modules/lodash-es/cloneDeep.js + 29 modules
var cloneDeep = __webpack_require__("5c8a");

// EXTERNAL MODULE: ./node_modules/lodash-es/map.js
var map = __webpack_require__("ce69");

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js??ref--12-0!./node_modules/thread-loader/dist/cjs.js!./node_modules/babel-loader/lib!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/components/admin/ServiceAvailabilityCal.vue?vue&type=script&lang=js&

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//








/* harmony default export */ var ServiceAvailabilityCalvue_type_script_lang_js_ = ({
  components: {
    VueCal: vuecal_common_default.a,
    TimeRange1ToN: TimeRange1ToN,
    WeekDaysSelector: WeekDaysSelector
  },
  props: {
    timezone: {
      type: String
    }
  },
  data: function data() {
    return {
      service_availability_data: null,
      events: null,
      show_edit_date_availability_popup: false,
      show_edit_date_availability: false,
      show_apply_to_multiple_dates: false,
      current_customizing_availability_date: null,
      current_customizing_availability_date_formatted: null,
      current_customizing_availability_date_details: null,
      popup_instance: null,
      popup_edit_availability_form: {
        apply_multiple_dates_days: "dates",
        apply_multiple_days: [],
        selected_dates: []
      },
      can_load_availability_for_calendar_month_move_event: false,
      current_calendar_month: {},
      current_date_popup_action_btns_is_enabled: true
    };
  },
  computed: {
    cal_min_date: function cal_min_date() {
      if (!this.service_availability_data || !this.service_availability_data.availability_date_ranges || !this.service_availability_data.availability_date_ranges.current_available_from_date) {
        return "";
      }

      return this.service_availability_data.availability_date_ranges.current_available_from_date;
    },
    cal_max_date: function cal_max_date() {
      if (!this.service_availability_data || !this.service_availability_data.availability_date_ranges || !this.service_availability_data.availability_date_ranges.current_available_to_date) {
        return "";
      }

      return this.service_availability_data.availability_date_ranges.current_available_to_date;
    },
    apply_multipe_date_picker_min_date: function apply_multipe_date_picker_min_date() {
      //to restrict selectable dates
      if (!this.service_availability_data || !this.service_availability_data.availability_date_ranges || !this.service_availability_data.availability_date_ranges.current_available_from_date) {
        return undefined;
      }

      return this.service_availability_data.availability_date_ranges.current_available_from_date;
    },
    apply_multipe_date_picker_max_date: function apply_multipe_date_picker_max_date() {
      //to restrict selectable dates
      if (!this.service_availability_data || !this.service_availability_data.availability_date_ranges || !this.service_availability_data.availability_date_ranges.current_available_to_date) {
        return undefined;
      }

      return this.service_availability_data.availability_date_ranges.current_available_to_date;
    },
    apply_to_this_date: function apply_to_this_date() {
      if (!this.current_customizing_availability_date || typeof this.current_customizing_availability_date.getMonth !== "function") {
        return "";
      }

      return Object(format["a" /* default */])(this.current_customizing_availability_date, "d MMM");
    },
    apply_from_this_date: function apply_from_this_date() {
      return this.apply_to_this_date;
    },
    apply_to_all_days: function apply_to_all_days() {
      if (!this.current_customizing_availability_date || typeof this.current_customizing_availability_date.getMonth !== "function") {
        return "";
      }

      return Object(format["a" /* default */])(this.current_customizing_availability_date, "EEEE") + "s";
    },
    dates_selected_meta_txt: function dates_selected_meta_txt() {
      var len = this.popup_edit_availability_form.selected_dates.length;
      var txt = "";

      if (len) {
        txt = this.Tsprintf(
        /* translators: %s: int */
        this.T_n("%s day", "%s days", len), len);
      }

      return txt;
    } // Following commented because - admin end not going to translated - also default english not working

    /*
    vue_cal_locale() {
      let site_locale = this.$store.getters.get_site_locale;
      site_locale = site_locale.toLowerCase();
       let default_locale = "";
       let available_locale = [
        "ar",
        "bg",
        "bn",
        "bs",
        "ca",
        "cs",
        "da",
        "de",
        "el",
        "es",
        "fa",
        "fr",
        "he",
        "hr",
        "hu",
        "id",
        "is",
        "it",
        "ja",
        "ka",
        "ko",
        "lt",
        "nl",
        "no",
        "pl",
        "pt-br",
        "ro",
        "ru",
        "sk",
        "sl",
        "sr",
        "sv",
        "tr",
        "uk",
        "vi",
        "zh-cn",
        "zh-hk"
      ];
       if (available_locale.indexOf(site_locale) !== -1) {
        return site_locale;
      }
      let site_locale_parts = site_locale.split("_"); //from site it comes with _
      if (available_locale.indexOf(site_locale_parts[0]) !== -1) {
        return site_locale_parts[0];
      }
      return default_locale;
    }*/

  },
  mounted: function mounted() {
    // Following commented because - admin end not going to translated - also default english not working
    // if (this.vue_cal_locale) {
    //   require("vue-cal/dist/i18n/" + this.vue_cal_locale + ".js");
    // }
    this.show_service_availability_cal();
  },
  methods: {
    show_service_availability_cal: function show_service_availability_cal() {
      var _this = this;

      var action = "edit_service_availability";
      var wpcal_request = {};
      wpcal_request[action] = {
        service_id: this.$route.params.service_id
      };
      var post_data = {
        action: "wpcal_process_admin_ajax_request",
        wpcal_request: wpcal_request
      };
      axios_default.a.post(window.wpcal_ajax.ajax_url, post_data).then(function (response) {
        // response = wpcal_clean_and_parse_json_response(response);
        //console.log(response);
        //alert(response.data.status);
        if (response.data[action] && response.data[action].status == "success") {
          _this.service_availability_data = response.data[action].service_availability_data;
          _this.events = response.data[action].service_availability_data.dates_availability_for_cal;
          setTimeout(function () {
            if (_this.$refs.vuecal) {
              _this.$refs.vuecal.switchView("month", _this.date_parse(_this.cal_min_date)); //switch over to first available date

            }

            _this.can_load_availability_for_calendar_month_move_event = true; //hackish fix to avoid inital calendar view change event and one after initial load
          }, 100);
        }
      }).catch(function (error) {
        console.log(error);
      });
    },
    process_calendar_month_move_event: function process_calendar_month_move_event(event_values) {
      var month = Object(format["a" /* default */])(event_values.startDate, "LL");
      var year = Object(format["a" /* default */])(event_values.startDate, "yyyy");
      this.current_calendar_month = {
        month: month,
        year: year
      };
      this.load_service_availability_by_calendar_view(this.current_calendar_month);
      this.close_edit_date_availability_popup_by_date();
    },
    load_service_availability_by_calendar_view: function load_service_availability_by_calendar_view(current_calendar_month) {
      var _this2 = this;

      if (!this.can_load_availability_for_calendar_month_move_event || !current_calendar_month || Object(esm_typeof["a" /* default */])(current_calendar_month) !== "object" || !current_calendar_month.hasOwnProperty("month")) {
        return;
      }

      var action = "edit_service_availability_by_month";
      var wpcal_request = {};
      wpcal_request[action] = {
        service_id: this.$route.params.service_id,
        current_month_view: current_calendar_month
      };
      var post_data = {
        action: "wpcal_process_admin_ajax_request",
        wpcal_request: wpcal_request
      };
      axios_default.a.post(window.wpcal_ajax.ajax_url, post_data).then(function (response) {
        // response = wpcal_clean_and_parse_json_response(response);
        //console.log(response);
        //alert(response.data.status);
        _this2.handle_load_service_availability_by_calendar_view_response(response);
      }).catch(function (error) {
        console.log(error);
      });
    },
    handle_load_service_availability_by_calendar_view_response: function handle_load_service_availability_by_calendar_view_response(response) {
      var action = "edit_service_availability_by_month";

      if (response.data[action] && response.data[action].status == "success" && response.data[action].service_availability_data && response.data[action].service_availability_data.dates_availability_for_cal) {
        this.service_availability_data = response.data[action].service_availability_data;
        this.events = response.data[action].service_availability_data.dates_availability_for_cal;
      }
    },
    // eslint-disable-next-line no-unused-vars
    cal_event_trigger_show_edit_date_availability: function cal_event_trigger_show_edit_date_availability(event, e) {
      var _this3 = this;

      //console.log(event, e);
      var formatted_date = Object(format["a" /* default */])(event.startDate, "yyyy-MM-dd");
      this.current_customizing_availability_date = event.startDate;
      this.current_customizing_availability_date_formatted = formatted_date;
      setTimeout(function () {
        //setTimeout used  const element = document.querySelector(".vuecal__cell--selected"); will have right element
        _this3.show_edit_date_availability_popup_by_date();
      }, 10);
    },
    cal_cell_trigger_show_edit_date_availability: function cal_cell_trigger_show_edit_date_availability(name, event) {
      //console.log(name, event);
      if (!event) {
        //unexpectedly this calls twice per click, 2nd time null coming
        return;
      }

      var formatted_date = Object(format["a" /* default */])(event, "yyyy-MM-dd");
      this.current_customizing_availability_date = event;
      this.current_customizing_availability_date_formatted = formatted_date;
      this.show_edit_date_availability_popup_by_date();
    },
    show_edit_date_availability_popup_by_date: function show_edit_date_availability_popup_by_date() {
      var _multiple_dates_picke, _multiple_dates_picke2;

      this.show_edit_date_availability_popup = true;
      this.show_edit_date_availability = true;
      this.show_apply_to_multiple_dates = false;
      this.current_date_popup_action_btns_is_enabled = true; //console.log(typeof this.current_customizing_availability_date);

      this.current_customizing_availability_date_details = Object(cloneDeep["a" /* default */])(this.service_availability_data.dates_availability[this.current_customizing_availability_date_formatted]);
      var multiple_dates_picker = this.$refs.multiple_dates_picker;
      multiple_dates_picker === null || multiple_dates_picker === void 0 ? void 0 : (_multiple_dates_picke = multiple_dates_picker.$refs) === null || _multiple_dates_picke === void 0 ? void 0 : (_multiple_dates_picke2 = _multiple_dates_picke.calendar) === null || _multiple_dates_picke2 === void 0 ? void 0 : _multiple_dates_picke2.move(this.current_customizing_availability_date);
      this.show_edit_date_availability = true;
      var element = document.querySelector(".vuecal__cell--selected");
      var tooltip = document.querySelector("#edit_date_availability");

      if (this.popup_instance !== null) {
        this.popup_instance.destroy();
        this.popup_instance = null;
      }

      this.reset_popup_edit_availability_form(); // Pass the button, the tooltip, and some options, and Popper will do the
      // magic positioning for you:

      this.popup_instance = Object(popper["a" /* createPopper */])(element, tooltip, {
        placement: "auto",
        modifiers: [{
          name: "offset",
          options: {
            offset: [0, 10]
          }
        }]
      });
    },
    show_apply_to_multiple_dates_by_date: function show_apply_to_multiple_dates_by_date() {
      this.show_edit_date_availability = false;
      this.show_apply_to_multiple_dates = true;

      if (this.popup_instance) {
        this.popup_instance.update();
      }
    },
    back_to_show_edit_date_availability: function back_to_show_edit_date_availability() {
      this.show_edit_date_availability = true;
      this.show_apply_to_multiple_dates = false;

      if (this.popup_instance) {
        this.popup_instance.update();
      }
    },
    close_edit_date_availability_popup_by_date: function close_edit_date_availability_popup_by_date() {
      this.show_edit_date_availability_popup = false;
    },
    update_customizes_date_availability: function update_customizes_date_availability(do_) {
      var _this4 = this;

      //validation pending
      this.current_date_popup_action_btns_is_enabled = false;
      var action_request_data = {};

      if (do_ == "this_day_unavailable") {
        action_request_data["is_available"] = 0;
        action_request_data["apply_to_days_or_dates"] = "dates";
        action_request_data["dates"] = [this.current_customizing_availability_date_formatted];
      } else if (do_ == "this_day_available_use_previous_periods") {
        action_request_data["is_available"] = 1;
        action_request_data["use_previous_periods"] = "1";
        action_request_data["apply_to_days_or_dates"] = "dates";
        action_request_data["dates"] = [this.current_customizing_availability_date_formatted];
      } else if (do_ == "this_date_only") {
        action_request_data["apply_to_days_or_dates"] = "dates";
        action_request_data["dates"] = [this.current_customizing_availability_date_formatted];
      } else if (do_ == "this_day_from_this_date") {
        action_request_data["apply_to_days_or_dates"] = "days";
        action_request_data["day_index_list"] = [Object(format["a" /* default */])(this.current_customizing_availability_date, "i")];
        action_request_data["from_date"] = this.current_customizing_availability_date_formatted;
      } else if (do_ == "apply_to_selected_dates") {
        action_request_data["apply_to_days_or_dates"] = "dates";
        action_request_data["dates"] = Object(map["a" /* default */])(this.popup_edit_availability_form.selected_dates, this.format_date);
      } else if (do_ == "apply_to_selected_days") {
        action_request_data["apply_to_days_or_dates"] = "days";
        action_request_data["day_index_list"] = this.popup_edit_availability_form.apply_multiple_days;
        action_request_data["from_date"] = this.current_customizing_availability_date_formatted;
      }

      if (do_ !== "this_day_unavailable" && do_ !== "this_day_available_use_previous_periods") {
        action_request_data["is_available"] = this.current_customizing_availability_date_details.is_available;

        if (this.current_customizing_availability_date_details.is_available == 1) {
          action_request_data["periods"] = this.clone_deep(this.current_customizing_availability_date_details.periods);
        }
      }

      var action1 = "customize_service_availability";
      var action2 = "edit_service_availability_by_month";
      var wpcal_request = {};
      wpcal_request[action1] = {
        service_id: this.$route.params.service_id,
        request_data: action_request_data
      };
      wpcal_request[action2] = {
        service_id: this.$route.params.service_id,
        current_month_view: this.current_calendar_month
      };
      var post_data = {
        action: "wpcal_process_admin_ajax_request",
        wpcal_request: wpcal_request
      };
      axios_default.a.post(window.wpcal_ajax.ajax_url, post_data).then(function (response) {
        // response = wpcal_clean_and_parse_json_response(response);
        //console.log(response);
        //alert(response.data.status);
        if (response.data[action1]) {
          //console.log(response.data[action1].status);
          _this4.notify_single_action_result(response.data[action1], {
            success_msg: "Settings saved.",
            validation_errors: {
              //to get feal of normal toast instead of inline
              target: "",
              zindex: "99999"
            }
          });

          if (response.data[action1].status === "success") {
            _this4.close_edit_date_availability_popup_by_date();
          }
        }

        _this4.handle_load_service_availability_by_calendar_view_response(response);
      }).catch(function (error) {
        console.log(error);
      }).then(function () {
        _this4.current_date_popup_action_btns_is_enabled = true;
      });
    },
    // get_periods_to_prefill_while_marking_available() {
    //   //validation pending
    //   let date = this.current_customizing_availability_date_formatted;
    //   let action = "get_periods_for_prefill_for_marking_available";
    //   let wpcal_request = {};
    //   wpcal_request[action] = {
    //     service_id: this.$route.params.service_id,
    //     date: date
    //   };
    //   let post_data = {
    //     action: "wpcal_process_admin_ajax_request",
    //     wpcal_request: wpcal_request
    //   };
    //
    //   axios
    //     .post(window.wpcal_ajax.ajax_url, post_data)
    //     .then(response => {
    //       // response = wpcal_clean_and_parse_json_response(response);
    //       console.log(response);
    //       //alert(response.data.status);
    //       if (
    //         response.data[action] &&
    //         response.data[action].availability_data
    //       ) {
    //         this.current_customizing_availability_date_details.periods =
    //           response.data[action].availability_data.periods;
    //         this.current_customizing_availability_date_details.is_available =
    //           "1";
    //       }
    //     })
    //     .catch(error => {
    //       console.log(error);
    //     });
    // },
    reset_popup_edit_availability_form: function reset_popup_edit_availability_form() {
      this.popup_edit_availability_form.apply_multiple_dates_days = "dates";
      this.popup_edit_availability_form.apply_multiple_days = [];
      this.popup_edit_availability_form.selected_dates = [];
    },
    log: function log(d) {
      console.log(d);
    },
    format_date: function format_date(date_obj) {
      return Object(format["a" /* default */])(date_obj, "yyyy-MM-dd");
    }
  }
});
// CONCATENATED MODULE: ./src/components/admin/ServiceAvailabilityCal.vue?vue&type=script&lang=js&
 /* harmony default export */ var admin_ServiceAvailabilityCalvue_type_script_lang_js_ = (ServiceAvailabilityCalvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/components/admin/ServiceAvailabilityCal.vue?vue&type=style&index=0&id=7066fc36&scoped=true&lang=css&
var ServiceAvailabilityCalvue_type_style_index_0_id_7066fc36_scoped_true_lang_css_ = __webpack_require__("9719");

// EXTERNAL MODULE: ./src/components/admin/ServiceAvailabilityCal.vue?vue&type=style&index=1&lang=css&
var ServiceAvailabilityCalvue_type_style_index_1_lang_css_ = __webpack_require__("524c");

// CONCATENATED MODULE: ./src/components/admin/ServiceAvailabilityCal.vue







/* normalize component */

var ServiceAvailabilityCal_component = Object(componentNormalizer["a" /* default */])(
  admin_ServiceAvailabilityCalvue_type_script_lang_js_,
  ServiceAvailabilityCalvue_type_template_id_7066fc36_scoped_true_render,
  ServiceAvailabilityCalvue_type_template_id_7066fc36_scoped_true_staticRenderFns,
  false,
  null,
  "7066fc36",
  null
  
)

/* harmony default export */ var ServiceAvailabilityCal = (ServiceAvailabilityCal_component.exports);
// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js?{"cacheDirectory":"node_modules/.cache/vue-loader","cacheIdentifier":"23115053-vue-loader-template"}!./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/components/admin/ServiceInviteeQuestions.vue?vue&type=template&id=03427841&scoped=true&
var ServiceInviteeQuestionsvue_type_template_id_03427841_scoped_true_render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',[_c('div',{staticClass:"mbox"},[_c('div',{staticClass:"txt-h5 caps"},[_vm._v(_vm._s(_vm.T__("Invitee Questions")))]),_c('div',{staticClass:"txt-help"},[_vm._v(" "+_vm._s(_vm.T__( "Invitees will be asked to fill out their full name and email to book this event." ))+" ")]),_c('div',{staticClass:"form-row"},[_c('div',{staticClass:"txt-h5 mt20"},[_vm._v(_vm._s(_vm.T__("Full Name")))]),_c('input',{attrs:{"type":"text","readonly":""}})]),_c('div',{staticClass:"form-row"},[_c('div',{staticClass:"txt-h5 mt20"},[_vm._v(_vm._s(_vm.T__("Email")))]),_c('input',{attrs:{"type":"text","readonly":""}})]),_c('div',{directives:[{name:"drag-and-drop",rawName:"v-drag-and-drop:options",value:(
        _vm.questions.length > 1 ? _vm.questions_drag_drop_options : {}
      ),expression:"\n        questions.length > 1 ? questions_drag_drop_options : {}\n      ",arg:"options"}],key:_vm.questions.length > 1 ? 100 : 0},[_c('div',{attrs:{"id":"question_answers_cont"},on:{"reordered":_vm.reorder_selected_question}},_vm._l((_vm.questions),function(question,index){return _c('div',{key:index,staticClass:"form-row invitee-question",class:{
            hover: _vm.question_mouseover_index === index,
            disabled: !question.is_enabled || question.is_enabled == 0
          },attrs:{"id":'question_index_' + index,"data-id":index},on:{"mouseover":function($event){_vm.question_mouseover_index = index},"mouseleave":function($event){_vm.question_mouseover_index = null}}},[_c('hr'),_c('div',{staticClass:"txt-h5"},[_c('div',{class:{ 'reorder-handle': _vm.questions.length > 1 }}),_c('a',{staticClass:"edit-question-link",on:{"click":function($event){return _vm.edit_question(index)}}},[_vm._v(_vm._s(_vm.T__("EDIT")))]),_c('span',{staticClass:"pre question_title"},[_vm._v(_vm._s(question.question))])]),(question.answer_type == 'textarea')?_c('textarea',{staticClass:"answer_type_input",attrs:{"readonly":""}}):_vm._e(),_vm._v(" "),(
              question.answer_type == 'input_text' ||
                question.answer_type == 'input_phone'
            )?_c('input',{attrs:{"type":"text","readonly":""}}):_vm._e()])}),0)]),_c('hr',{staticStyle:{"margin-top":"0"}}),_c('button',{staticClass:"wpc-btn secondary md",staticStyle:{"width":"100%"},attrs:{"type":"button","id":"add_question","disabled":!_vm.can_active_add_question_btn},on:{"click":_vm.add_question}},[_vm._v(" "+_vm._s(_vm.T__("+ Add Question"))+" ")])]),_c('div',{directives:[{name:"show",rawName:"v-show",value:(_vm.can_show_edit_question_popup),expression:"can_show_edit_question_popup"}],staticStyle:{"z-index":"10000","width":"360px"},attrs:{"id":"edit_question_popup"}},[_c('div',{staticClass:"mbox shadow"},[_c('div',{staticClass:"popper_arrow",attrs:{"data-popper-arrow":""}}),_c('div',{staticClass:"txt-h5 bold",staticStyle:{"display":"flex"}},[_vm._v(" "+_vm._s(this.current_edit_question_index == "new" ? this.T__("Add") : this.T__("Edit"))+" "+_vm._s(_vm.T__("Question"))+" "),_c('OnOffSlider',{attrs:{"name":"current_edit_question_is_enabled","true_value":"1","false_value":"0"},model:{value:(_vm.current_edit_question.is_enabled),callback:function ($$v) {_vm.$set(_vm.current_edit_question, "is_enabled", $$v)},expression:"current_edit_question.is_enabled"}}),(this.current_edit_question_index != 'new')?_c('div',{staticClass:"delete",on:{"click":_vm.show_delete_confirmation}},[_vm._v(" "+_vm._s(_vm.T__("Delete question"))+" ")]):_vm._e()],1),_c('div',{staticClass:"form-row"},[_c('div',{staticClass:"txt-h5 mt20"},[_vm._v(_vm._s(_vm.T__("Answer type")))]),_c('form-row',{attrs:{"validator":_vm.$v.current_edit_question.answer_type}},[_c('select',{directives:[{name:"model",rawName:"v-model",value:(_vm.current_edit_question.answer_type),expression:"current_edit_question.answer_type"}],on:{"change":[function($event){var $$selectedVal = Array.prototype.filter.call($event.target.options,function(o){return o.selected}).map(function(o){var val = "_value" in o ? o._value : o.value;return val}); _vm.$set(_vm.current_edit_question, "answer_type", $event.target.multiple ? $$selectedVal : $$selectedVal[0])},function($event){return _vm.$v.current_edit_question.answer_type.$touch()}]}},[_c('option',{attrs:{"value":"textarea"}},[_vm._v(_vm._s(_vm.T__("Multi-line")))]),_c('option',{attrs:{"value":"input_text"}},[_vm._v(_vm._s(_vm.T__("Single-line")))]),_c('option',{attrs:{"value":"input_phone"}},[_vm._v(_vm._s(_vm.T__("Phone")))])])]),_c('div',{staticClass:"txt-h5 mt20"},[_vm._v(_vm._s(_vm.T__("Question")))]),_c('form-row',{attrs:{"validator":_vm.$v.current_edit_question.question}},[_c('textarea',{directives:[{name:"model",rawName:"v-model",value:(_vm.current_edit_question.question),expression:"current_edit_question.question"}],domProps:{"value":(_vm.current_edit_question.question)},on:{"blur":function($event){return _vm.$v.current_edit_question.question.$touch()},"input":function($event){if($event.target.composing){ return; }_vm.$set(_vm.current_edit_question, "question", $event.target.value)}}})]),_c('label',[_c('input',{directives:[{name:"model",rawName:"v-model",value:(_vm.current_edit_question.is_required),expression:"current_edit_question.is_required"}],attrs:{"type":"checkbox","true-value":"1","false-value":"0"},domProps:{"checked":Array.isArray(_vm.current_edit_question.is_required)?_vm._i(_vm.current_edit_question.is_required,null)>-1:_vm._q(_vm.current_edit_question.is_required,"1")},on:{"change":function($event){var $$a=_vm.current_edit_question.is_required,$$el=$event.target,$$c=$$el.checked?("1"):("0");if(Array.isArray($$a)){var $$v=null,$$i=_vm._i($$a,$$v);if($$el.checked){$$i<0&&(_vm.$set(_vm.current_edit_question, "is_required", $$a.concat([$$v])))}else{$$i>-1&&(_vm.$set(_vm.current_edit_question, "is_required", $$a.slice(0,$$i).concat($$a.slice($$i+1))))}}else{_vm.$set(_vm.current_edit_question, "is_required", $$c)}}}}),_vm._v(_vm._s(_vm.T__("Required")))]),_c('div',{staticClass:"txt-h5 mt20"},[_vm._v(_vm._s(_vm.T__("Answer")))]),(_vm.current_edit_question.answer_type == 'textarea')?_c('textarea',{attrs:{"readonly":""}}):_vm._e(),_vm._v(" "),(
            _vm.current_edit_question.answer_type == 'input_text' ||
              _vm.current_edit_question.answer_type == 'input_phone'
          )?_c('input',{attrs:{"type":"text","readonly":""}}):_vm._e(),_c('button',{staticClass:"wpc-btn primary md mt20 full-width",on:{"click":_vm.save_question}},[_vm._v(" "+_vm._s(_vm.T__("Done"))+" ")]),_c('button',{staticClass:"wpc-btn tert-link sm mt10 center",on:{"click":_vm.reset_current_question_and_hide_edit_question_popup}},[_vm._v(" "+_vm._s(_vm.T__("Cancel"))+" ")])],1)])]),_c('v-dialog',{staticStyle:{"z-index":"10001"}})],1)}
var ServiceInviteeQuestionsvue_type_template_id_03427841_scoped_true_staticRenderFns = []


// CONCATENATED MODULE: ./src/components/admin/ServiceInviteeQuestions.vue?vue&type=template&id=03427841&scoped=true&

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.number.constructor.js
var es_number_constructor = __webpack_require__("a9e3");

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.number.is-integer.js
var es_number_is_integer = __webpack_require__("8ba4");

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js??ref--12-0!./node_modules/thread-loader/dist/cjs.js!./node_modules/babel-loader/lib!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/components/admin/ServiceInviteeQuestions.vue?vue&type=script&lang=js&




//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//





/* harmony default export */ var ServiceInviteeQuestionsvue_type_script_lang_js_ = ({
  components: {
    OnOffSlider: OnOffSlider
  },
  directives: {
    dragAndDrop: vue_draggable["VueDraggableDirective"]
  },
  model: {
    prop: "invitee_questions",
    event: "invitee-questions-changed"
  },
  props: {
    invitee_questions: {
      type: Object,
      default: function _default() {
        return {
          questions: []
        };
      }
    }
  },
  data: function data() {
    return {
      can_show_edit_question_popup: false,
      edit_question_popup_instance: null,
      current_edit_question: {},
      current_edit_question_index: false,
      default_question: {
        is_enabled: "1",
        is_required: "0",
        question: this.T__("Please share anything that will help prepare for our meeting."),
        answer_type: "textarea"
      },
      question_mouseover_index: null,
      questions_drag_drop_options: {
        dropzoneSelector: "#question_answers_cont",
        draggableSelector: ".invitee-question",
        handlerSelector: ".reorder-handle",
        reactivityEnabled: true,
        multipleDropzonesItemsDraggingEnabled: false,
        showDropzoneAreas: true
      }
    };
  },
  validations: {
    current_edit_question: {
      is_enabled: {
        required: validators["required"],
        must_be_1_or_0: common_func["q" /* must_be_1_or_0 */]
      },
      is_required: {
        required: validators["required"],
        must_be_1_or_0: common_func["q" /* must_be_1_or_0 */]
      },
      question: {
        required: validators["required"]
      },
      answer_type: {
        required: validators["required"],
        answer_type_in_array: Object(common_func["m" /* in_array */])(["textarea", "input_text", "input_phone"])
      }
    }
  },
  computed: {
    can_active_add_question_btn: function can_active_add_question_btn() {
      if (!this.invitee_questions || Object(esm_typeof["a" /* default */])(this.invitee_questions) !== "object" || !this.invitee_questions.hasOwnProperty("questions") || !Array.isArray(this.invitee_questions.questions)) {
        //these checks are used because computed property calls even before "created" lifecycle
        return false;
      }

      return this.invitee_questions.questions.length < 10; //return true;
    },
    questions: function questions() {
      if (!this.invitee_questions || Object(esm_typeof["a" /* default */])(this.invitee_questions) !== "object" || !this.invitee_questions.hasOwnProperty("questions")) {
        return [];
      }

      return this.invitee_questions.questions;
    }
  },
  methods: {
    add_question: function add_question() {
      //if (this.invitee_questions.questions.length == 0) {
      this.current_edit_question_index = "new";
      this.current_edit_question = this.clone_deep(this.default_question);

      if (this.invitee_questions.questions.length >= 1) {
        this.current_edit_question.question = "";
      }

      this.$v.current_edit_question.$reset();
      this.show_edit_question_popup(); //}
    },
    edit_question: function edit_question(index) {
      if (Object(esm_typeof["a" /* default */])(this.invitee_questions.questions[index]) === "object") {
        this.current_edit_question_index = index;
        this.current_edit_question = this.clone_deep(this.invitee_questions.questions[index]);
        this.$v.current_edit_question.$reset();
        this.show_edit_question_popup(index);
      }
    },
    delete_question: function delete_question() {
      if (Number.isInteger(this.current_edit_question_index)) {
        this.invitee_questions.questions.splice(this.current_edit_question_index, 1);
      } else if (this.current_edit_question_index === "new") {
        this.current_edit_question = {};
      }

      this.$emit("invitee-questions-changed", this.invitee_questions);
      this.$emit("save-questions");
      this.reset_current_question_and_hide_edit_question_popup();
    },
    save_question: function save_question() {
      this.$v.current_edit_question.$touch();

      if (this.$v.current_edit_question.$anyError) {
        this.scroll_to_first_validation_error();
        return false;
      }

      if (Number.isInteger(this.current_edit_question_index)) {
        this.invitee_questions.questions[this.current_edit_question_index] = this.current_edit_question;
      } else if (this.current_edit_question_index === "new") {
        this.invitee_questions.questions.push(this.current_edit_question);
      }

      this.$emit("invitee-questions-changed", this.invitee_questions);
      this.$emit("save-questions");
      this.reset_current_question_and_hide_edit_question_popup();
    },
    show_delete_confirmation: function show_delete_confirmation() {
      var _this = this;

      var button_str = '<strong style="color: #ff0000;">' + this.T__("Delete") + "</strong>";
      this.$modal.show("dialog", {
        title: this.T__("Alert"),
        text: this.Tsprintf(
        /* translators: 1: html-tag-open 2: html-tag-close */
        this.T__("Are you sure, do you want to %1$sdelete%2$s this question?"), "<strong>", "</strong>"),
        buttons: [{
          title: button_str,
          handler: function handler() {
            _this.delete_question();

            _this.$modal.hide("dialog");
          }
        }, {
          title: "Cancel",
          default: true,
          // Will be triggered by default if 'Enter' pressed.
          handler: function handler() {
            _this.$modal.hide("dialog");
          }
        }]
      });
    },
    show_edit_question_popup: function show_edit_question_popup() {
      var q_index = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;
      var element_selector = "#add_question";

      if (q_index !== null) {
        element_selector = "#question_index_" + q_index;
      }

      this.can_show_edit_question_popup = true;
      var element = document.querySelector(element_selector);
      var tooltip = document.querySelector("#edit_question_popup");

      if (this.edit_question_popup_instance !== null) {
        this.edit_question_popup_instance.destroy();
        this.edit_question_popup_instance = null;
      }

      this.edit_question_popup_instance = Object(popper["a" /* createPopper */])(element, tooltip, {
        placement: "right",
        modifiers: [{
          name: "offset",
          options: {
            offset: [0, 20]
          }
        }]
      });
    },
    hide_edit_question_popup: function hide_edit_question_popup() {
      this.can_show_edit_question_popup = false;
    },
    reset_current_question_and_hide_edit_question_popup: function reset_current_question_and_hide_edit_question_popup() {
      this.hide_edit_question_popup();
      this.current_edit_question_index = false;
      this.current_edit_question = {};
    },
    reorder_selected_question: function reorder_selected_question(event) {
      var _this2 = this;

      var move_item_old_index = event.detail.ids[0];
      var move_item_new_index = event.detail.index;
      var moved_item = this.invitee_questions.questions.splice(move_item_old_index, 1);
      var final_item_new_index = move_item_old_index < move_item_new_index ? move_item_new_index - 1 : move_item_new_index; // console.log(
      //   move_item_old_index,
      //   "to",
      //   move_item_new_index,
      //   "final",
      //   final_item_new_index
      // );

      this.invitee_questions.questions.splice(final_item_new_index, 0, moved_item[0]);
      this.$nextTick(function () {
        _this2.$emit("save-questions");
      });
    } // normalise_empty_invitee_questions() {
    //   if (
    //     !this.invitee_questions ||
    //     typeof this.invitee_questions !== "object" ||
    //     !this.invitee_questions.hasOwnProperty("questions") ||
    //     !Array.isArray(this.invitee_questions.questions)
    //   ) {
    //     let default_invitee_questions = { questions: [] };
    //     this.$emit("invitee-questions-changed", default_invitee_questions);
    //   }
    // }

  }
});
// CONCATENATED MODULE: ./src/components/admin/ServiceInviteeQuestions.vue?vue&type=script&lang=js&
 /* harmony default export */ var admin_ServiceInviteeQuestionsvue_type_script_lang_js_ = (ServiceInviteeQuestionsvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/components/admin/ServiceInviteeQuestions.vue?vue&type=style&index=0&id=03427841&scoped=true&lang=css&
var ServiceInviteeQuestionsvue_type_style_index_0_id_03427841_scoped_true_lang_css_ = __webpack_require__("5fd4");

// EXTERNAL MODULE: ./src/components/admin/ServiceInviteeQuestions.vue?vue&type=style&index=1&id=03427841&scoped=true&lang=css&
var ServiceInviteeQuestionsvue_type_style_index_1_id_03427841_scoped_true_lang_css_ = __webpack_require__("4ce0");

// CONCATENATED MODULE: ./src/components/admin/ServiceInviteeQuestions.vue







/* normalize component */

var ServiceInviteeQuestions_component = Object(componentNormalizer["a" /* default */])(
  admin_ServiceInviteeQuestionsvue_type_script_lang_js_,
  ServiceInviteeQuestionsvue_type_template_id_03427841_scoped_true_render,
  ServiceInviteeQuestionsvue_type_template_id_03427841_scoped_true_staticRenderFns,
  false,
  null,
  "03427841",
  null
  
)

/* harmony default export */ var ServiceInviteeQuestions = (ServiceInviteeQuestions_component.exports);
// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js??ref--12-0!./node_modules/thread-loader/dist/cjs.js!./node_modules/babel-loader/lib!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/components/admin/ServiceFormEditView.vue?vue&type=script&lang=js&


//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//






/* harmony default export */ var ServiceFormEditViewvue_type_script_lang_js_ = ({
  name: "ServiceFormEditView",
  components: {
    ServiceFormStep2: ServiceFormStep2,
    ServiceFormStep3: ServiceFormStep3,
    ServiceAvailabilityCal: ServiceAvailabilityCal,
    ServiceInviteeQuestions: ServiceInviteeQuestions,
    AlertAdminToUpdateProfile: AlertAdminToUpdateProfile,
    OnOffSlider: OnOffSlider
  },
  props: {
    view: {
      type: String
    },
    edit_view: {
      type: Object
    },
    form: {
      type: Object,
      required: true
    },
    saved_form: {
      type: Object
    },
    service_id: {},
    create_or_update_btn_is_enabled: {},
    $v: {}
  },
  computed: {
    service_date_range_summary: function service_date_range_summary() {
      var default_availability_details = this.saved_form.default_availability_details;

      if (default_availability_details.date_range_type === "relative") {
        var misc_value = default_availability_details.date_misc;
        var show_misc_value = misc_value.replace(/^\+((\d)*)D$/gm, function (x, y) {
          return y;
        });
        return this.Tsprintf(
        /* translators: %s: int */
        this.T__("%s rolling days into the future"), show_misc_value);
      } else if (default_availability_details.date_range_type == "from_to") {
        var from_date_str = this.$options.filters.wpcal_format_std_date(default_availability_details.from_date);
        var to_date_str = this.$options.filters.wpcal_format_std_date(default_availability_details.to_date);
        return this.Tsprintf(
        /* translators: 1: date 2: date */
        this.T__("From %1$s to %2$s"), from_date_str, to_date_str);
      } else if (default_availability_details.date_range_type == "infinite") {
        return this.T__("Indefinitely");
      }

      return "";
    }
  },
  methods: {
    show_service_availability_modal: function show_service_availability_modal() {
      this.$modal.show("service_availability_modal");
    },
    service_availability_modal_before_close: function service_availability_modal_before_close(event) {
      var child = this.$refs.service_availability_modal_contents;

      if (child.show_edit_date_availability_popup) {
        child.close_edit_date_availability_popup_by_date();
        event.stop();
      }
    }
  }
});
// CONCATENATED MODULE: ./src/components/admin/ServiceFormEditView.vue?vue&type=script&lang=js&
 /* harmony default export */ var admin_ServiceFormEditViewvue_type_script_lang_js_ = (ServiceFormEditViewvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/components/admin/ServiceFormEditView.vue?vue&type=style&index=0&id=114eca6a&lang=css&scoped=true&
var ServiceFormEditViewvue_type_style_index_0_id_114eca6a_lang_css_scoped_true_ = __webpack_require__("2260");

// CONCATENATED MODULE: ./src/components/admin/ServiceFormEditView.vue






/* normalize component */

var ServiceFormEditView_component = Object(componentNormalizer["a" /* default */])(
  admin_ServiceFormEditViewvue_type_script_lang_js_,
  ServiceFormEditViewvue_type_template_id_114eca6a_scoped_true_render,
  ServiceFormEditViewvue_type_template_id_114eca6a_scoped_true_staticRenderFns,
  false,
  null,
  "114eca6a",
  null
  
)

/* harmony default export */ var ServiceFormEditView = (ServiceFormEditView_component.exports);
// EXTERNAL MODULE: ./node_modules/lodash-es/isEqual.js
var isEqual = __webpack_require__("32e8");

// CONCATENATED MODULE: ./src/utils/on_before_leave_alert_if_unsaved_mixin.js

var on_before_leave_alert_if_unsaved_mixin_on_before_leave_alert_if_unsaved = function on_before_leave_alert_if_unsaved(saved_form_str, unsaved_form_str) {
  return {
    methods: {
      oblaiu_is_form_dirty: function oblaiu_is_form_dirty() {
        if (!this[saved_form_str] || !this[unsaved_form_str]) {
          return false;
        }

        var is_form_and_saved_form_are_equal = Object(isEqual["a" /* default */])(this[saved_form_str], this[unsaved_form_str]);

        return !is_form_and_saved_form_are_equal;
      },
      oblaiu_on_before_unload: function oblaiu_on_before_unload(e) {
        if (this.oblaiu_is_form_dirty() && !this.oblaiu_confirm_leave()) {
          // Cancel the event
          e.preventDefault(); // Chrome requires returnValue to be set

          e.returnValue = "";
        }
      },
      oblaiu_confirm_leave: function oblaiu_confirm_leave() {
        var form_closing = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : false;
        var msg = "Hey wait! You have unsaved changes. \nClick Ok to discard your changes and leave, or \nclick Cancel to stay in this page.";

        if (form_closing) {
          msg = "Hey wait! You have unsaved changes. \nClick Ok to discard your changes and continue, or \nclick Cancel to stay in this section.";
        }

        return window.confirm(msg);
      }
    },
    created: function created() {
      window.addEventListener("beforeunload", this.oblaiu_on_before_unload);
    },
    beforeDestroy: function beforeDestroy() {
      window.removeEventListener("beforeunload", this.oblaiu_on_before_unload);
    },
    beforeRouteLeave: function beforeRouteLeave(to, from, next) {
      // If the form is not dirty or the user confirmed they want to lose unsaved changes,
      // continue to next view
      if (this.skip_leaving_warining || !this.oblaiu_is_form_dirty() || this.oblaiu_confirm_leave()) {
        next();
      } else {
        // Cancel navigation
        next(false);
      }
    }
  };
};
// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js??ref--12-0!./node_modules/thread-loader/dist/cjs.js!./node_modules/babel-loader/lib!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/views/admin/ServiceForm.vue?vue&type=script&lang=js&



//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//










/* harmony default export */ var ServiceFormvue_type_script_lang_js_ = ({
  name: "ServiceForm",
  mixins: [on_before_leave_alert_if_unsaved_mixin_on_before_leave_alert_if_unsaved("saved_form", "form"), admin_service_status_toggle_mixin],
  props: {
    msg: String
  },
  components: {
    ServiceFormStep1: ServiceFormStep1,
    ServiceFormStep2: ServiceFormStep2,
    ServiceFormStep3: ServiceFormStep3,
    ServiceFormEditView: ServiceFormEditView
  },
  data: function data() {
    return {
      view: "",
      service_id: null,
      form: {
        name: "",
        status: "",
        locations: [],
        descr: "",
        post_id: "",
        color: "",
        relationship_type: "",
        timezone: "",
        duration: "30",
        display_start_time_every: "15",
        max_booking_per_day: "",
        min_schedule_notice: {
          type: "units",
          time_units: "4",
          time_units_in: "hrs",
          days_before_time: "00:00:00",
          days_before: 0
        },
        event_buffer_before: 0,
        event_buffer_after: 0,
        invitee_questions: {
          questions: []
        },
        default_availability_details: {
          date_range_type: "relative",
          from_date: "",
          to_date: "",
          date_misc: "+60D",
          periods: [],
          day_index_list: []
        },
        post_details: {
          status: "",
          link: ""
        }
      },
      saved_form: this.clone_deep(this.form),
      //to avoid console error on initial rendering.
      tabs_flow: {
        active_step_id: 1,
        steps: [{
          id: 1,
          form: true,
          summary: false,
          upcoming: false
        }, {
          id: 2,
          form: false,
          summary: false,
          upcoming: true
        }, {
          id: 3,
          form: false,
          summary: false,
          upcoming: true
        }]
      },
      edit_view: {
        step2: {
          //Event type details
          id: 2,
          summary: true,
          form: false
        },
        step3: {
          //Event type duration &amp; timings
          id: 3,
          summary: true,
          form: false
        }
      },
      create_or_update_btn_is_enabled: true,
      skip_leaving_warining: false,
      service_name_last_saved: ""
    };
  },
  validations: {
    form: {
      name: {
        required: validators["required"]
      },
      // locations: "",
      // descr: "",
      // post_id: "",
      color: {
        required: validators["required"]
      },
      relationship_type: {
        required: validators["required"]
      },
      timezone: {
        required: validators["required"]
      },
      duration: {
        required: validators["required"],
        integer: validators["integer"],
        between_duration: Object(validators["between"])(1, 1440)
      },
      display_start_time_every: {
        required: validators["required"],
        integer: validators["integer"],
        between_display_start_time_every: Object(validators["between"])(1, 1440)
      },
      max_booking_per_day: {
        integer: validators["integer"],
        between_max_booking_per_day: Object(validators["between"])(1, 1440)
      },
      min_schedule_notice: {
        //type: "units",
        time_units: {
          integer: validators["integer"],
          required: Object(validators["requiredIf"])(function () {
            return this.form.min_schedule_notice.type === "units";
          })
        },
        //time_units_in: "hrs",
        days_before_time: {
          valid_time: common_func["v" /* valid_time */],
          required: Object(validators["requiredIf"])(function () {
            return this.form.min_schedule_notice.type === "time_days_before";
          })
        } //days_before: 1

      },
      event_buffer_before: {
        integer: validators["integer"],
        between_event_buffer_before: Object(validators["between"])(0, 300)
      },
      event_buffer_after: {
        integer: validators["integer"],
        between_event_buffer_before: Object(validators["between"])(0, 300)
      },
      // invitee_questions: {
      //   questions: []
      // },
      default_availability_details: {
        date_range_type: {
          required: validators["required"]
        },
        date_misc: {
          required: Object(validators["requiredIf"])(function () {
            return this.form.default_availability_details.date_range_type === "relative";
          })
        },
        from_date: {
          required: Object(validators["requiredIf"])(function () {
            return this.form.default_availability_details.date_range_type === "from_to";
          }),
          valid_date: common_func["u" /* valid_date */]
        },
        to_date: {
          required: Object(validators["requiredIf"])(function () {
            return this.form.default_availability_details.date_range_type === "from_to";
          }),
          valid_date: common_func["u" /* valid_date */],
          min_date: Object(common_func["o" /* min_date_as */])("from_date")
        },
        // : "",
        // date_misc: "+60D",
        periods: {
          required: validators["required"],
          minLength: Object(validators["minLength"])(1),
          check_periods_collide: common_func["g" /* check_periods_collide */],
          $each: {
            from_time: {
              required: validators["required"],
              valid_time: common_func["v" /* valid_time */]
            },
            to_time: {
              required: validators["required"],
              valid_time: common_func["v" /* valid_time */],
              min_time: Object(common_func["p" /* min_time_as */])("from_time")
            }
          }
        },
        day_index_list: {
          required: validators["required"],
          subset_working_days: Object(common_func["r" /* subset */])([1, 2, 3, 4, 5, 6, 7])
        }
      }
    },
    step1: ["form.relationship_type"],
    step2: ["form.name", "form.color"],
    step3: ["form.duration", "form.display_start_time_every", "form.timezone", "form.max_booking_per_day", "form.min_schedule_notice.time_units", "form.min_schedule_notice.days_before_time", "form.event_buffer_before", "form.event_buffer_after", "form.default_availability_details.date_range_type", "form.default_availability_details.date_misc", "form.default_availability_details.from_date", "form.default_availability_details.to_date", "form.default_availability_details.periods", "form.default_availability_details.day_index_list"],
    step3_advance_options: ["form.max_booking_per_day", "form.min_schedule_notice.time_units", "form.min_schedule_notice.days_before_time", "form.event_buffer_before", "form.event_buffer_after"]
  },
  computed: {
    page_title: function page_title() {
      var title = this.T__("Create New Event Type");

      if (this.$route.name == "service_edit") {
        title = this.T__("Event Type - ") + this.saved_form.name;
      }

      return title;
    },
    document_title: function document_title() {
      var title = this.T__("Create New Event Type");

      if (this.$route.name == "service_edit") {
        var _this$saved_form;

        title = "";

        if ((_this$saved_form = this.saved_form) === null || _this$saved_form === void 0 ? void 0 : _this$saved_form.name) {
          title = this.saved_form.name + " ‹ ";
        }

        title += this.T__("Event Type");
      }

      return title;
    }
  },
  methods: {
    set_active_step: function set_active_step(step_id) {
      this.tabs_flow.active_step_id = step_id;
    },
    toggle_steps: function toggle_steps() {
      for (var i in this.tabs_flow.steps) {
        if (this.tabs_flow.active_step_id == this.tabs_flow.steps[i].id) {
          this.tabs_flow.steps[i].form = true;
          this.tabs_flow.steps[i].summary = false;
          this.tabs_flow.steps[i].upcoming = false;
        } else if (this.tabs_flow.active_step_id < this.tabs_flow.steps[i].id) {
          this.tabs_flow.steps[i].form = false;
          this.tabs_flow.steps[i].summary = false;
          this.tabs_flow.steps[i].upcoming = true;
        } else if (this.tabs_flow.active_step_id > this.tabs_flow.steps[i].id) {
          this.tabs_flow.steps[i].form = false;
          this.tabs_flow.steps[i].summary = true;
          this.tabs_flow.steps[i].upcoming = false;
        }
      }
    },
    edit_view_toggle_steps: function edit_view_toggle_steps(step) {
      if (!step.form) {
        //currently close, check any other form is open, if so try to close -accordian style(one open at a time)
        var other_step_id = step.id == 2 ? 3 : 2;

        if (this.edit_view["step" + other_step_id].form) {
          if (this.oblaiu_is_form_dirty()) {
            if (this.oblaiu_confirm_leave(true)) {
              this.form = this.clone_deep(this.saved_form);
            } else {
              return;
            }
          }

          this.edit_view["step" + other_step_id].form = false;
          this.edit_view["step" + other_step_id].summary = true;
          this.$v["step" + other_step_id].$reset();
        }
      } else {
        if (this.oblaiu_is_form_dirty()) {
          this.form = this.clone_deep(this.saved_form);
        }
      }

      step.summary = !step.summary;
      step.form = !step.form;
      this.$v["step" + step.id].$reset();

      if (step.form) {
        //form opened
        this.scroll_to_if_not_in_view_port("#service_form_step" + step.id);
      }
    },
    set_active_step_and_toggle: function set_active_step_and_toggle(step_id) {
      this.set_active_step(step_id);
      this.toggle_steps();
    },
    edit_view_form_submit: function edit_view_form_submit() {
      this.form_submit();
    },
    edit_view_reset: function edit_view_reset() {
      this.edit_view.step2.summary = true;
      this.edit_view.step2.form = false;
      this.edit_view.step3.summary = true;
      this.edit_view.step3.form = false;
    },
    validate_may_navigate_or_submit: function validate_may_navigate_or_submit(step_id) {
      if (this.view == "add") {
        if (step_id == 1 || step_id == 2 || step_id == 3) {
          this.$v["step" + step_id].$touch(); //trigger validation

          if (step_id == 3) {
            if (this.$v.step3_advance_options.$anyError) {
              this.$root.$emit("show-advance-options");
            }
          }

          if (!this.$v["step" + step_id].$anyError) {
            if (step_id == 1 || step_id == 2) {
              var next_step_id = step_id + 1;
              this.set_active_step_and_toggle(next_step_id);
            } else if (step_id == 3) {
              this.form_submit();
            }
          } else {
            this.scroll_to_first_validation_error();
          }
        }
      } else if (this.view == "edit") {
        if (step_id == 2 || step_id == 3) {
          this.$v["step" + step_id].$touch(); //trigger validation

          if (step_id == 3) {
            if (this.$v.step3_advance_options.$anyError) {
              this.$root.$emit("show-advance-options");
            }
          }

          if (!this.$v["step" + step_id].$anyError) {
            this.edit_view_form_submit();
          } else {
            this.scroll_to_first_validation_error();
          }
        }
      }
    },
    load_page: function load_page() {
      if (this.$route.name == "service_add") {
        this.load_add_page();
      } else if (this.$route.name == "service_edit") {
        this.load_edit_page();
      }
    },
    load_add_page: function load_add_page() {
      var _this = this;

      return Object(asyncToGenerator["a" /* default */])( /*#__PURE__*/regeneratorRuntime.mark(function _callee() {
        var general_setting;
        return regeneratorRuntime.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                Object.assign(_this.$data, _this.$options.data.apply(_this)); //re-initilize data in Vue

                _this.view = "add";
                general_setting = _this.$store.getters.get_general_settings;

                if (general_setting.hasOwnProperty("working_hours")) {
                  _this.form.default_availability_details.periods.push(general_setting.working_hours);
                }

                if (general_setting.hasOwnProperty("working_days")) {
                  _this.form.default_availability_details.day_index_list = _this.clone_deep(general_setting.working_days);
                }

                if (general_setting.hasOwnProperty("timezone")) {
                  _this.form.timezone = _this.clone_deep(general_setting.timezone);
                }

                _this.saved_form = _this.clone_deep(_this.form); //here saved_form is default form data

              case 7:
              case "end":
                return _context.stop();
            }
          }
        }, _callee);
      }))();
    },
    load_edit_page: function load_edit_page() {
      var _this2 = this;

      Object.assign(this.$data, this.$options.data.apply(this)); //re-initilize data in Vue

      this.view = "edit";
      this.service_id = this.$route.params.service_id;
      var action = "edit_service";
      var wpcal_request = {};
      wpcal_request[action] = {
        service_id: this.service_id
      };
      var post_data = {
        action: "wpcal_process_admin_ajax_request",
        wpcal_request: wpcal_request
      };
      axios_default.a.post(window.wpcal_ajax.ajax_url, post_data).then(function (response) {
        //console.log(response);
        if (response.data && response.data[action].hasOwnProperty("service_data")) {
          _this2.form = response.data[action].service_data;
          _this2.saved_form = _this2.clone_deep(_this2.form);
        }
      }).catch(function (error) {
        console.log(error);
      });
    },
    form_submit: function form_submit() {
      var _this3 = this;

      return Object(asyncToGenerator["a" /* default */])( /*#__PURE__*/regeneratorRuntime.mark(function _callee2() {
        var action, form_data, wpcal_request, action_edit_service, post_data;
        return regeneratorRuntime.wrap(function _callee2$(_context2) {
          while (1) {
            switch (_context2.prev = _context2.next) {
              case 0:
                _this3.clear_validation_errors_cont();

                _this3.create_or_update_btn_is_enabled = false;

                if (_this3.$route.name == "service_add") {
                  action = "add_service";
                } else if (_this3.$route.name == "service_edit") {
                  action = "update_service";
                }

                form_data = _this3.clone_deep(_this3.form);

                if (form_data.hasOwnProperty("invitee_questions") && form_data.invitee_questions.hasOwnProperty("questions") && form_data.invitee_questions.questions.length === 0) {
                  form_data.invitee_questions["__questions_count"] = 0; //workaround to post this array if 'questions' is empty, currently that is only key
                }

                wpcal_request = {};
                wpcal_request[action] = {
                  service_id: _this3.service_id,
                  service_data: form_data
                };
                action_edit_service = "edit_service";

                if (_this3.$route.name == "service_edit") {
                  wpcal_request[action_edit_service] = {
                    service_id: _this3.service_id
                  };

                  _this3.log_service_name_last_saved();
                }

                post_data = {
                  action: "wpcal_process_admin_ajax_request",
                  wpcal_request: wpcal_request
                };
                _context2.next = 12;
                return axios_default.a.post(window.wpcal_ajax.ajax_url, post_data).then(function (response) {
                  //console.log(response);
                  //alert(response.data[action].status);
                  var success_msg = _this3.T__("Event type updated successfully.");

                  if (action === "add_service") {
                    success_msg = _this3.T__("Event type added successfully.");
                  }

                  _this3.notify_single_action_result(response.data[action], {
                    success_msg: success_msg
                  });

                  if (_this3.$route.name == "service_add") {
                    if (response.data && response.data[action].status == "success" && response.data[action].hasOwnProperty("service_id")) {
                      _this3.skip_leaving_warining = true;
                      var service_id = response.data[action].service_id;

                      _this3.$router.push("/event-type/edit/" + service_id);
                    }
                  }

                  if (_this3.$route.name == "service_edit") {
                    if (response.data && response.data[action].status === "success") {
                      var current_submitted_step_id = _this3.edit_view.step2.form ? 2 : _this3.edit_view.step3.form ? 3 : "";

                      if (current_submitted_step_id) {
                        _this3.scroll_to_if_not_in_view_port("#service_form_step" + current_submitted_step_id);
                      }

                      _this3.edit_view_reset();
                    }
                  }

                  if (response.data && response.data.hasOwnProperty(action_edit_service) && response.data[action_edit_service].hasOwnProperty("service_data")) {
                    _this3.form = response.data[action_edit_service].service_data;
                    _this3.saved_form = _this3.clone_deep(_this3.form);

                    _this3.may_alert_to_update_booking_page_on_service_name_change();
                  }
                }).catch(function (error) {
                  console.log(error);
                }).then(function () {
                  _this3.create_or_update_btn_is_enabled = true;
                });

              case 12:
              case "end":
                return _context2.stop();
            }
          }
        }, _callee2);
      }))();
    },
    log_service_name_last_saved: function log_service_name_last_saved() {
      if (this.view != "edit") {
        return;
      }

      this.service_name_last_saved = this.saved_form.name;
    },
    may_alert_to_update_booking_page_on_service_name_change: function may_alert_to_update_booking_page_on_service_name_change() {
      if (this.view != "edit") {
        return;
      }

      if (this.service_name_last_saved != this.saved_form.name) {
        this.$modal.show("dialog", {
          title: this.T__("The new Event Type Name has been saved!"),
          text: this.Tsprintf(
          /* translators: 1: html-tag-open 2: html-tag-close */
          this.T__("Please note that this will not change the booking page title. If you want to change that, you can do so here - %1$sEdit Booking Page %2$s"), '<a style="font-size:14px;" href="post.php?post=' + this.saved_form.post_id + '&action=edit" target="_blank">', '<span style="font-size:11px; font-weight:600; position: absolute; margin: 2px;">&nearr;</span></a>'),
          buttons: [{
            title: this.T__("Ok"),
            default: true // Will be triggered by default if 'Enter' pressed.

          }]
        });
      }
    }
  },
  created: function created() {
    this.load_page();
  },
  mounted: function mounted() {
    //console.log(this.$route);
    //this.set_active_step(3);
    this.toggle_steps();
  },
  watch: {
    //eslint-disable-next-line
    "$route.name": function $routeName() {
      //console.log(new_route_name, old_route_name);
      this.load_page();
    },
    document_title: function document_title() {
      this.$store.dispatch("set_document_title", this.document_title);
    }
  }
});
// CONCATENATED MODULE: ./src/views/admin/ServiceForm.vue?vue&type=script&lang=js&
 /* harmony default export */ var admin_ServiceFormvue_type_script_lang_js_ = (ServiceFormvue_type_script_lang_js_); 
// CONCATENATED MODULE: ./src/views/admin/ServiceForm.vue





/* normalize component */

var ServiceForm_component = Object(componentNormalizer["a" /* default */])(
  admin_ServiceFormvue_type_script_lang_js_,
  ServiceFormvue_type_template_id_590f9aea_render,
  ServiceFormvue_type_template_id_590f9aea_staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* harmony default export */ var ServiceForm = (ServiceForm_component.exports);
// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js?{"cacheDirectory":"node_modules/.cache/vue-loader","cacheIdentifier":"23115053-vue-loader-template"}!./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/views/admin/ServiceBookings.vue?vue&type=template&id=49fdc9b1&
var ServiceBookingsvue_type_template_id_49fdc9b1_render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',[_c('div',[_c('div',{staticClass:"page-title-cont"},[_c('h1',{staticClass:"wp-heading-inline"},[_vm._v("WPCal.io - "+_vm._s(_vm.T__("My Bookings")))]),_c('AdminHeaderRight')],1),_c('div',{staticClass:"se-cont"},[_c('ul',{staticClass:"se-nav"},[_c('li',{class:{ active: _vm.tabs_view.upcoming },on:{"click":function($event){return _vm.switch_tabs('upcoming')}}},[_vm._v(" "+_vm._s(_vm.T__("UPCOMING"))+" ")]),_c('li',{class:{ active: _vm.tabs_view.past },on:{"click":function($event){return _vm.switch_tabs('past')}}},[_vm._v(" "+_vm._s(_vm.T__("PAST"))+" ")]),_c('li',{class:{ active: _vm.tabs_view.custom },on:{"click":function($event){return _vm.switch_tabs('custom')}}},[_vm._v(" "+_vm._s(_vm.T__("CUSTOM"))+" ")])]),(_vm.tabs_view.upcoming)?_c('div',[_c('ServiceBookingList',{attrs:{"booking_list_type":'upcoming',"booking_details":_vm.upcoming_bookings},on:{"load-more":function($event){return _vm.load_more($event)},"remove-booking":function($event){return _vm.remove_booking($event)}}})],1):_vm._e(),(_vm.tabs_view.past)?_c('div',[_c('ServiceBookingList',{attrs:{"booking_list_type":'past',"booking_details":_vm.past_bookings},on:{"load-more":function($event){return _vm.load_more($event)}}})],1):_vm._e(),(_vm.tabs_view.custom)?_c('div',[_c('div',{staticStyle:{"padding":"10px","border-bottom":"1px solid #b1b6d1","text-align":"right"}},[_c('form-row',[_c('div',[_c('label',{staticStyle:{"width":"100%","display":"block","font-size":"12px","margin-bottom":"3px"},attrs:{"for":"booking_search_text"}},[_vm._v(" "+_vm._s(_vm.T__("Search by Invitee email, Invitee name or Booking ID")))]),_c('input',{directives:[{name:"model",rawName:"v-model",value:(_vm.custom_filters.text),expression:"custom_filters.text"}],staticStyle:{"width":"180px"},attrs:{"id":"booking_search_text","type":"search","name":"booking_search_text"},domProps:{"value":(_vm.custom_filters.text)},on:{"input":function($event){if($event.target.composing){ return; }_vm.$set(_vm.custom_filters, "text", $event.target.value)}}}),_c('button',{staticClass:"wpc-btn primary md",staticStyle:{"width":"100px"},attrs:{"type":"button"},on:{"click":_vm.search_bookings}},[_vm._v(" "+_vm._s(_vm.T__("Search"))+" ")])])])],1),_c('ServiceBookingList',{attrs:{"booking_list_type":'custom',"booking_details":_vm.custom_bookings},on:{"load-more":function($event){return _vm.load_more($event)}}})],1):_vm._e()]),_c('TimeZoneSelector')],1),_c('AdminInfoLine',{staticClass:"mt10",attrs:{"info_slug":"ownership_my_bookings"}})],1)}
var ServiceBookingsvue_type_template_id_49fdc9b1_staticRenderFns = []


// CONCATENATED MODULE: ./src/views/admin/ServiceBookings.vue?vue&type=template&id=49fdc9b1&

// EXTERNAL MODULE: ./node_modules/core-js/modules/es.array.concat.js
var es_array_concat = __webpack_require__("99af");

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js?{"cacheDirectory":"node_modules/.cache/vue-loader","cacheIdentifier":"23115053-vue-loader-template"}!./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/components/admin/ServiceBookingList.vue?vue&type=template&id=96f56fa0&scoped=true&
var ServiceBookingListvue_type_template_id_96f56fa0_scoped_true_render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',[(_vm.booking_details.bookings.length == 0 && _vm.booking_details.eol)?_c('div',{staticClass:"empty-booking-cont"},[(_vm.booking_list_type == 'upcoming')?_c('span',[_vm._v(_vm._s(_vm.T__("You have no Upcoming bookings."))+" "+_vm._s(_vm.T__("Time to chill...")))]):_vm._e(),(_vm.booking_list_type == 'past')?_c('span',[_vm._v(_vm._s(_vm.T__("There are no past bookings.")))]):_vm._e(),(_vm.booking_list_type == 'custom')?_c('span',[_vm._v(_vm._s(_vm.T__("There are no bookings for your search criteria.")))]):_vm._e()]):_vm._e(),_c('div',{staticClass:"all-days-cont"},[_vm._l((_vm.booking_details_for_view),function(date_grouped_bookings,index){return _c('div',{key:index,staticClass:"day-cont"},[_c('div',{staticClass:"date-cont"},[_vm._v(" "+_vm._s(_vm._f("wpcal_unix_to_sw_sm_sd_if_fy")(date_grouped_bookings.group_date,_vm.tz))),_c('br'),_c('span',[_vm._v(_vm._s(_vm._f("wpcal_unix_to_relative_day")(date_grouped_bookings.group_date,_vm.tz)))])]),_c('div',{staticClass:"events-cont"},_vm._l((date_grouped_bookings.bookings),function(booking,index2){
var _obj;
return _c('div',{key:index2,staticClass:"single-event-cont",class:( _obj = {
            expanded: _vm.is_booking_expanded(booking.id)
          }, _obj['clr-' + booking.service_details.color] = true, _obj )},[_c('div',{staticClass:"event-summary"},[_c('div',{staticClass:"event-slot"},[_c('span',{attrs:{"title":_vm.$options.filters.wpcal_unix_to_time(
                    booking.booking_from_time,
                    _vm.tz,
                    _vm.time_format
                  ) +
                    ' ' +
                    _vm.$options.filters.wpcal_unix_to_sw_sm_sd_if_fy(
                      booking.booking_from_time,
                      _vm.tz
                    )}},[_vm._v(_vm._s(_vm._f("wpcal_unix_to_time")(booking.booking_from_time,_vm.tz, _vm.time_format)))]),_vm._v(" - "),_c('span',{attrs:{"title":_vm.$options.filters.wpcal_unix_to_time(
                    booking.booking_to_time,
                    _vm.tz,
                    _vm.time_format
                  ) +
                    ' ' +
                    _vm.$options.filters.wpcal_unix_to_sw_sm_sd_if_fy(
                      booking.booking_to_time,
                      _vm.tz
                    )}},[_vm._v(_vm._s(_vm._f("wpcal_unix_to_time")(booking.booking_to_time,_vm.tz, _vm.time_format)))])]),_c('div',{staticClass:"event-invitee-type"},[_c('span',{domProps:{"innerHTML":_vm._s(
                  _vm.Tsprintf(
                    /* translators: 1: html-tag-open 2: html-tag-close 3: invitee name */
                    _vm.T__('%1$s %3$s %2$s with you.'),
                    '<strong>',
                    '</strong>',
                    booking.invitee_name
                  )
                )}}),_c('br'),_vm._v(" "+_vm._s(_vm.T__("Event Type:"))+" "),_c('strong',[_vm._v(_vm._s(booking.service_details.name))])]),_c('div',{staticClass:"show-link"},[_c('a',{on:{"click":function($event){return _vm.toggle_expand_booking(booking.id)}}},[_vm._v(" "+_vm._s(_vm.T__("DETAILS")))]),_c('br'),_c('span',{staticClass:"created-date"},[_vm._v(_vm._s(_vm.T__("created"))+" "+_vm._s(_vm._f("wpcal_unix_to_sm_sd_if_fy")(booking.updated_ts,_vm.tz)))])])]),_c('div',{staticClass:"event-detailed"},[_c('div',{staticClass:"actions-cont"},[(
                  _vm.booking_list_type === 'upcoming' ||
                    (_vm.booking_list_type === 'custom' &&
                      booking.booking_to_time > _vm.cutoff_time)
                )?_c('div',[_c('a',{staticClass:"btn reschedule",on:{"click":function($event){return _vm.show_service_booking_modal(booking)}}},[_vm._v(_vm._s(_vm.T__("Reschedule")))]),_c('a',{staticClass:"btn cancel",on:{"click":function($event){return _vm.show_cancel_confirmation(booking)}}},[_vm._v(_vm._s(_vm.T__("Cancel")))])]):_vm._e(),_c('a',{attrs:{"href":'#/event-type/edit/' + booking.service_id,"target":"_blank"}},[_vm._v(_vm._s(_vm.T__("Edit Event Type")))]),_c('br'),_c('a',{on:{"click":function($event){return _vm.show_service_booking_modal_for_schedule_invitee_again(
                    booking
                  )}}},[_vm._v(_vm._s(_vm.T__("Schedule Invitee Again")))])]),_c('div',{staticClass:"event-meta"},[_c('div',[_c('span',{staticStyle:{"color":"#7c7d9c","font-size":"13px"}},[_vm._v(_vm._s(_vm.T__("NAME")))]),_c('br'),_vm._v(_vm._s(booking.invitee_name)+" ")]),_c('div',[_c('span',{staticStyle:{"color":"#7c7d9c","font-size":"13px"}},[_vm._v(_vm._s(_vm.T__("EMAIL")))]),_c('br'),_vm._v(_vm._s(booking.invitee_email)+" ")]),_c('div',{staticStyle:{"padding-right":"10px","box-sizing":"border-box"}},[_c('span',{staticStyle:{"color":"#7c7d9c","font-size":"13px"}},[_vm._v(_vm._s(_vm.T__("LOCATION")))]),_c('br'),_c('LocationAdvanced',{attrs:{"type":"display_user_after_booking_location","location_details":booking.location,"booking_details":booking}})],1),_c('div',[_c('span',{staticStyle:{"color":"#7c7d9c","font-size":"13px"}},[_vm._v(_vm._s(_vm.T__("INVITEE TIME ZONE")))]),_c('br'),_vm._v(_vm._s(_vm._f("wpcal_format_tz")(booking.invitee_tz))+" ")])]),_c('div',{staticClass:"event-survey"},_vm._l((booking.invitee_question_answers),function(question,index){return _c('div',{key:index,staticClass:"form-row"},[_c('div',{staticClass:"txt-h5 pre",staticStyle:{"color":"#7c7d9c","margin-bottom":"5px"}},[_vm._v(" "+_vm._s(question.question)+" ")]),_c('div',{staticClass:"pre"},[_vm._v(_vm._s(question.answer))])])}),0)])])}),0)])}),(_vm.booking_details.page > -1 && !_vm.booking_details.eol)?_c('div',{staticStyle:{"width":"100%","text-align":"center","cursor":"pointer"},on:{"click":function($event){return _vm.$emit('load-more', _vm.booking_list_type)}}},[_vm._v(" "+_vm._s(_vm.T__("Load more"))+" ")]):_vm._e()],2),_c('v-dialog'),_c('modal',{staticStyle:{"z-index":"9999"},attrs:{"name":"service_booking_modal","width":"1200px","height":"auto","scrollable":true,"adaptive":true},on:{"closed":function($event){_vm.reschedule_booking = {}}}},[(_vm.reschedule_booking.hasOwnProperty('id'))?_c('Booking',{attrs:{"admin_end_booking_type":"reschedule","admin_end_service_id":_vm.reschedule_booking.service_id,"admin_end_old_booking_unique_link":_vm.reschedule_booking.unique_link},on:{"booking-rescheduled":function($event){return _vm.handle_rescheduled_booking($event)}}}):(_vm.schedule_invitee_again.hasOwnProperty('id'))?_c('Booking',{attrs:{"admin_end_booking_type":"new","admin_end_service_id":_vm.schedule_invitee_again.service_id,"admin_end_old_booking_unique_link":_vm.schedule_invitee_again.unique_link,"admin_end_is_schedule_invitee_again":true},on:{"booking-added":function($event){return _vm.handle_schedule_invitee_again_booking($event)}}}):_vm._e()],1)],1)}
var ServiceBookingListvue_type_template_id_96f56fa0_scoped_true_staticRenderFns = []


// CONCATENATED MODULE: ./src/components/admin/ServiceBookingList.vue?vue&type=template&id=96f56fa0&scoped=true&

// EXTERNAL MODULE: ./src/views/user/Booking.vue + 17 modules
var Booking = __webpack_require__("eb8b");

// EXTERNAL MODULE: ./src/components/LocationAdvanced.vue + 4 modules
var LocationAdvanced = __webpack_require__("2f7b");

// EXTERNAL MODULE: ./node_modules/lodash-es/sortBy.js + 14 modules
var sortBy = __webpack_require__("d66c");

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js??ref--12-0!./node_modules/thread-loader/dist/cjs.js!./node_modules/babel-loader/lib!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/components/admin/ServiceBookingList.vue?vue&type=script&lang=js&



//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
 //user view is imported here




/* harmony default export */ var ServiceBookingListvue_type_script_lang_js_ = ({
  components: {
    Booking: Booking["a" /* default */],
    LocationAdvanced: LocationAdvanced["a" /* default */]
  },
  props: {
    booking_list_type: {
      type: String,
      required: true
    },
    booking_details: {
      type: Object
    }
  },
  data: function data() {
    return {
      expanded_bookings: [],
      reschedule_booking: {},
      schedule_invitee_again: {},
      cutoff_time: 0
    };
  },
  computed: {
    booking_details_for_view: function booking_details_for_view() {
      var __tmp = [];

      var _iterator = Object(createForOfIteratorHelper["a" /* default */])(this.booking_details.bookings),
          _step;

      try {
        for (_iterator.s(); !(_step = _iterator.n()).done;) {
          var booking = _step.value;
          var new_date = this.$options.filters.wpcal_unix_to_unix_only_date(booking.booking_from_time, this.tz);

          var _index = Object(findIndex["a" /* default */])(__tmp, {
            group_date: new_date
          });

          if (_index == -1) {
            _index = __tmp.length;
            __tmp[_index] = {
              group_date: new_date,
              bookings: []
            };
          }

          __tmp[_index]["bookings"].push(booking);
        }
      } catch (err) {
        _iterator.e(err);
      } finally {
        _iterator.f();
      }

      if (this.booking_list_type === "past") {
        var _iterator2 = Object(createForOfIteratorHelper["a" /* default */])(__tmp),
            _step2;

        try {
          for (_iterator2.s(); !(_step2 = _iterator2.n()).done;) {
            var date_grouped_bookings = _step2.value;
            date_grouped_bookings.bookings = Object(sortBy["a" /* default */])(date_grouped_bookings.bookings, ["booking_from_time"]);
          }
        } catch (err) {
          _iterator2.e(err);
        } finally {
          _iterator2.f();
        }
      }

      return __tmp;
    }
  },
  methods: {
    is_booking_expanded: function is_booking_expanded(booking_id) {
      return this.expanded_bookings.indexOf(booking_id) !== -1;
    },
    toggle_expand_booking: function toggle_expand_booking(booking_id) {
      if (this.is_booking_expanded(booking_id)) {
        var index = this.expanded_bookings.indexOf(booking_id);
        this.expanded_bookings.splice(index, 1);
      } else {
        this.expanded_bookings.push(booking_id);
      }
    },
    show_cancel_confirmation: function show_cancel_confirmation(booking) {
      var _this = this;

      //console.log("show confirm?");
      var dialog_text_from_to_time_str = this.$options.filters.wpcal_unix_to_from_to_time_full_date_day_tz(booking.booking_from_time, booking.booking_to_time, this.tz, this.time_format);
      var dialog_text = this.Tsprintf(
      /* translators: 1: html-tag 2: from and to date time 3: invitee name 4: email */
      this.T__("Are you sure you want to Cancel this Booking? %1$s %1$s At %2$s %1$s with %3$s (%4$s)"), "<br>", dialog_text_from_to_time_str, booking.invitee_name, booking.invitee_email);
      this.$modal.show("dialog", {
        title: this.T__("Alert!"),
        text: dialog_text,
        buttons: [{
          title: this.T__("Yes, Cancel the booking"),
          handler: function handler() {
            _this.cancel_booking(booking);

            _this.$modal.hide("dialog");
          }
        }, {
          title: this.T__("No"),
          default: true // Will be triggered by default if 'Enter' pressed.

        }]
      });
    },
    cancel_booking: function cancel_booking(booking) {
      var _this2 = this;

      var wpcal_request = {};
      var action = "cancel_booking";
      wpcal_request[action] = {
        booking_id: booking.id
      };
      var post_data = {
        action: "wpcal_process_admin_ajax_request",
        wpcal_request: wpcal_request
      };
      axios_default.a.post(window.wpcal_ajax.ajax_url, post_data).then(function (response) {
        //console.log(response);
        //alert(response.data[action].status);
        if (response.data[action].status == "success") {
          _this2.$emit("remove-booking", {
            booking_id: booking.id,
            booking_list_type: _this2.booking_list_type
          });

          _this2.$modal.hide("dialog");
        }
      }).catch(function (error) {
        console.log(error);
      }).then(function () {
        _this2.$store.dispatch("run_booking_background_tasks_by_unique_link", {
          unique_link: booking.unique_link
        });
      });
    },
    show_service_booking_modal: function show_service_booking_modal(booking) {
      this.reschedule_booking = this.clone_deep(booking);
      this.$modal.show("service_booking_modal");
    },
    handle_rescheduled_booking: function handle_rescheduled_booking(info) {
      this.reschedule_booking = {};
      this.$emit("remove-booking", {
        booking_unique_link: info.old_booking.unique_link,
        booking_list_type: this.booking_list_type
      });
      this.$modal.hide("service_booking_modal");
      this.show_rescheduled_information(info);
    },
    show_rescheduled_information: function show_rescheduled_information(info) {
      var dialog_text = "<div>" + this.T__("Booking successfully rescheduled.") + "</div>"; // dialog_text +=
      //   '<div style="float:left;width:300px;word-wrap: break-word;">Old Booking' +
      //   JSON.stringify(info.old_booking) +
      //   "</div>";
      // dialog_text +=
      //   '<div style="float:left;width:300px;word-wrap: break-word;">New Booking' +
      //   JSON.stringify(info.new_booking) +
      //   "</div>";

      this.$modal.show("dialog", {
        title: this.T__("Booking Rescheduled"),
        text: dialog_text,
        buttons: [{
          title: "Ok",
          default: true // Will be triggered by default if 'Enter' pressed.

        }],
        width: "610px"
      });
    },
    show_service_booking_modal_for_schedule_invitee_again: function show_service_booking_modal_for_schedule_invitee_again(booking) {
      this.schedule_invitee_again = this.clone_deep(booking);
      this.$modal.show("service_booking_modal");
    },
    handle_schedule_invitee_again_booking: function handle_schedule_invitee_again_booking() {
      this.schedule_invitee_again = {};
      this.$modal.hide("service_booking_modal");
      this.$modal.show("dialog", {
        title: this.T__("Info"),
        text: this.T__("Booking added.")
      });
    }
  },
  beforeUpdate: function beforeUpdate() {
    this.cutoff_time = Math.round(new Date().getTime() / 1000);
  }
});
// CONCATENATED MODULE: ./src/components/admin/ServiceBookingList.vue?vue&type=script&lang=js&
 /* harmony default export */ var admin_ServiceBookingListvue_type_script_lang_js_ = (ServiceBookingListvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/components/admin/ServiceBookingList.vue?vue&type=style&index=0&id=96f56fa0&scoped=true&lang=css&
var ServiceBookingListvue_type_style_index_0_id_96f56fa0_scoped_true_lang_css_ = __webpack_require__("f70a");

// CONCATENATED MODULE: ./src/components/admin/ServiceBookingList.vue






/* normalize component */

var ServiceBookingList_component = Object(componentNormalizer["a" /* default */])(
  admin_ServiceBookingListvue_type_script_lang_js_,
  ServiceBookingListvue_type_template_id_96f56fa0_scoped_true_render,
  ServiceBookingListvue_type_template_id_96f56fa0_scoped_true_staticRenderFns,
  false,
  null,
  "96f56fa0",
  null
  
)

/* harmony default export */ var ServiceBookingList = (ServiceBookingList_component.exports);
// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js??ref--12-0!./node_modules/thread-loader/dist/cjs.js!./node_modules/babel-loader/lib!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/views/admin/ServiceBookings.vue?vue&type=script&lang=js&





//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//





/* harmony default export */ var ServiceBookingsvue_type_script_lang_js_ = ({
  components: {
    ServiceBookingList: ServiceBookingList,
    TimeZoneSelector: TimeZoneSelector["a" /* default */]
  },
  data: function data() {
    return {
      document_title: "My Bookings",
      view_base_timing: Object(format["a" /* default */])(new Date(), "t"),
      upcoming_bookings: {
        page: -1,
        eol: false,
        bookings: []
      },
      past_bookings: {
        page: -1,
        eol: false,
        bookings: []
      },
      custom_bookings: {
        page: -1,
        eol: false,
        bookings: []
      },
      tabs_view: {
        upcoming: true,
        past: false,
        custom: false
      },
      custom_filters: {
        text: ""
      }
    };
  },
  // validations: {
  //   custom_filters: {
  //     text: { required }//validation not required, commented
  //   }
  // },
  methods: {
    switch_tabs: function switch_tabs(list_type) {
      if (list_type === "upcoming") {
        this.tabs_view.upcoming = true;
        this.tabs_view.past = false;
        this.tabs_view.custom = false;

        if (this.upcoming_bookings.page == -1 && this.upcoming_bookings.eol == false) {
          this.get_bookings("upcoming");
        }
      } else if (list_type === "past") {
        this.tabs_view.upcoming = false;
        this.tabs_view.past = true;
        this.tabs_view.custom = false;

        if (this.past_bookings.page == -1 && this.past_bookings.eol == false) {
          this.get_bookings("past");
        }
      } else if (list_type === "custom") {
        this.tabs_view.upcoming = false;
        this.tabs_view.past = false;
        this.tabs_view.custom = true; //this.$v.custom_filters.$reset();
      }
    },
    load_more: function load_more(list_type) {
      if (list_type !== "upcoming" && list_type !== "past" && list_type !== "custom") {
        return;
      }

      if (!this[list_type + "_bookings"].eol) {
        var requested_page = this[list_type + "_bookings"].page + 1;
        this.get_bookings(list_type, requested_page);
      }
    },
    load_bookings_page: function load_bookings_page() {
      this.get_bookings("upcoming");
    },
    get_bookings: function get_bookings(list_type) {
      var _this = this;

      var requested_page = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 0;

      if (list_type !== "upcoming" && list_type !== "past" && list_type !== "custom") {
        return false;
      }

      var wpcal_request = {};
      var action = "get_" + list_type + "_bookings";
      var data_name = list_type + "_bookings";
      var options = {
        view_base_timing: this.view_base_timing,
        page: requested_page
      };

      if (list_type === "custom") {
        options = {
          filters: this.custom_filters,
          page: requested_page
        };
      }

      wpcal_request[action] = {
        options: options
      };
      var post_data = {
        action: "wpcal_process_admin_ajax_request",
        wpcal_request: wpcal_request
      };
      axios_default.a.post(window.wpcal_ajax.ajax_url, post_data).then(function (response) {
        if (response.data && response.data[action].hasOwnProperty("bookings_data")) {
          if (list_type == "custom" && response.data[action].bookings_data.page == 0) {
            _this[data_name].bookings = [];
          }

          _this[data_name].bookings = _this[data_name].bookings.concat(response.data[action].bookings_data.bookings);
          _this[data_name].page = response.data[action].bookings_data.page;
          _this[data_name].eol = response.data[action].bookings_data.eol;
        }
      }).catch(function (error) {
        console.log(error);
      });
    },
    search_bookings: function search_bookings() {
      //reset custom_bookings
      this.custom_bookings.page = -1;
      this.custom_bookings.eol = false;
      this.custom_bookings.bookings = []; // //validate
      // this.$v.custom_filters.$touch(); //trigger validation
      // if (this.$v.custom_filters.$anyError) {
      //   this.scroll_to_first_validation_error();
      //   return;
      // }

      if (!this.custom_filters.text.trim()) {
        //if no text return
        return;
      } //all ok - go head and search


      this.get_bookings("custom");
    },
    set_view_base_timing: function set_view_base_timing() {
      this.view_base_timing = Object(format["a" /* default */])(new Date(), "t");
    },
    remove_booking: function remove_booking(booking_remove_details) {
      if (booking_remove_details.booking_list_type !== "upcoming") {
        return false;
      }

      var result_index;

      if (booking_remove_details.hasOwnProperty("booking_id")) {
        var booking_id = booking_remove_details.booking_id;
        result_index = this.upcoming_bookings.bookings.findIndex(function (_booking) {
          return _booking.id == booking_id;
        });
      } else if (booking_remove_details.hasOwnProperty("booking_unique_link")) {
        var booking_unique_link = booking_remove_details.booking_unique_link;
        result_index = this.upcoming_bookings.bookings.findIndex(function (_booking) {
          return _booking.unique_link == booking_unique_link;
        });
      }

      if (result_index !== -1) {
        this.upcoming_bookings.bookings.splice(result_index, 1);
      }
    }
  },
  mounted: function mounted() {
    if (this.$route.name == "booking_custom_by_id") {
      if (typeof this.$route.params.booking_id === "string") {
        var booking_id = this.$route.params.booking_id.trim();

        if (booking_id) {
          this.custom_filters.text = booking_id;
          this.switch_tabs("custom");
          this.search_bookings();
          return;
        }
      }
    }

    this.set_view_base_timing();
    this.load_bookings_page();
  }
});
// CONCATENATED MODULE: ./src/views/admin/ServiceBookings.vue?vue&type=script&lang=js&
 /* harmony default export */ var admin_ServiceBookingsvue_type_script_lang_js_ = (ServiceBookingsvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/assets/css/admin_service_bookings.css?vue&type=style&index=0&lang=css&
var admin_service_bookingsvue_type_style_index_0_lang_css_ = __webpack_require__("59fb");

// CONCATENATED MODULE: ./src/views/admin/ServiceBookings.vue






/* normalize component */

var ServiceBookings_component = Object(componentNormalizer["a" /* default */])(
  admin_ServiceBookingsvue_type_script_lang_js_,
  ServiceBookingsvue_type_template_id_49fdc9b1_render,
  ServiceBookingsvue_type_template_id_49fdc9b1_staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* harmony default export */ var ServiceBookings = (ServiceBookings_component.exports);
// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js?{"cacheDirectory":"node_modules/.cache/vue-loader","cacheIdentifier":"23115053-vue-loader-template"}!./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/views/admin/SettingGeneral.vue?vue&type=template&id=4407ddd6&
var SettingGeneralvue_type_template_id_4407ddd6_render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',[_c('div',[_c('div',{staticClass:"page-title-cont"},[_c('h1',{staticClass:"wp-heading-inline"},[_vm._v("WPCal.io - "+_vm._s(_vm.T__("Settings")))]),_c('AdminHeaderRight')],1),_c('SettingsMenu'),_c('div',{staticClass:"col-cont settings-cont"},[_c('div',{staticClass:"col"},[_c('div',{staticClass:"form"},[_c('div',{staticClass:"validation_errors_cont"}),_c('div',{staticClass:"setting-group-title"},[_vm._v(_vm._s(_vm.T__("Default settings")))]),_c('form-row',{attrs:{"validator":_vm.$v.form.working_hours}},[_c('label',[_vm._v(_vm._s(_vm.T__("Default Working Hours")))]),_c('TimeRange1ToN',{attrs:{"disable_multiple":true},model:{value:(_vm.working_hours),callback:function ($$v) {_vm.working_hours=$$v},expression:"working_hours"}}),_c('span',{staticClass:"txt-help"},[_vm._v(_vm._s(_vm.T__( "Changing this will not affect existing event types but only newly-created event types." )))])],1),_c('form-row',{attrs:{"validator":_vm.$v.form.working_hours.from_time}}),_c('form-row',{attrs:{"validator":_vm.$v.form.working_hours.to_time}}),_c('form-row',{attrs:{"validator":_vm.$v.form.working_days}},[_c('label',[_vm._v(_vm._s(_vm.T__("Default Working Days")))]),_c('WeekDaysSelector',{model:{value:(_vm.form.working_days),callback:function ($$v) {_vm.$set(_vm.form, "working_days", $$v)},expression:"form.working_days"}}),_c('span',{staticClass:"txt-help"},[_vm._v(_vm._s(_vm.T__( "Changing this will not affect existing event types but only newly-created event types." )))])],1),_c('form-row',{attrs:{"validator":_vm.$v.form.timezone}},[_c('label',[_vm._v(_vm._s(_vm.T__("Default Time Zone")))]),_c('TimeZoneSelector',{attrs:{"use_as":'form_tz'},model:{value:(_vm.form.timezone),callback:function ($$v) {_vm.$set(_vm.form, "timezone", $$v)},expression:"form.timezone"}}),_c('span',{staticClass:"txt-help"},[_vm._v(_vm._s(_vm.T__( "Changing this will not affect existing event types but only newly-created event types." )))])],1),_c('form-row',{attrs:{"validator":_vm.$v.form.time_format}},[_c('label',[_vm._v(_vm._s(_vm.T__("Time Format")))]),_c('ul',{staticClass:"selector inline time"},[_c('li',[_c('input',{directives:[{name:"model",rawName:"v-model",value:(_vm.form.time_format),expression:"form.time_format"}],attrs:{"type":"radio","id":"time-format-12h","name":"time-format","value":"12hrs"},domProps:{"checked":_vm._q(_vm.form.time_format,"12hrs")},on:{"blur":function($event){return _vm.$v.form.time_format.$touch()},"change":function($event){return _vm.$set(_vm.form, "time_format", "12hrs")}}}),_c('label',{attrs:{"for":"time-format-12h"}},[_vm._v(" 12 "),_c('span',[_vm._v(_vm._s(_vm.T_x("hr", "time hour")))])])]),_c('li',[_c('input',{directives:[{name:"model",rawName:"v-model",value:(_vm.form.time_format),expression:"form.time_format"}],attrs:{"type":"radio","id":"time-format-24h","name":"time-format","value":"24hrs"},domProps:{"checked":_vm._q(_vm.form.time_format,"24hrs")},on:{"blur":function($event){return _vm.$v.form.time_format.$touch()},"change":function($event){return _vm.$set(_vm.form, "time_format", "24hrs")}}}),_c('label',{attrs:{"for":"time-format-24h"}},[_vm._v(" 24 "),_c('span',[_vm._v(_vm._s(_vm.T_x("hr", "time hour")))])])])]),_c('span',{staticClass:"txt-help"},[_vm._v(_vm._s(_vm.T__( "This will be used for both admin end and for the invitee in the booking widget." )))])]),_c('hr'),_c('div',{staticClass:"setting-group-title",staticStyle:{"display":"flex"}},[_vm._v(" "+_vm._s(_vm.T__("Branding"))+" "),_c('PremiumInfoBadge',{staticStyle:{"margin":"-4px 0 0 10px"}},[_c('em',[_vm._v("This feature is included"),_c('br'),_vm._v("in the PRO plan.")])])],1),_c('form-row',{attrs:{"validator":_vm.$v.form.branding_color}},[_c('label',[_vm._v(_vm._s(_vm.T__("Brand color")))]),_c('div',{staticStyle:{"display":"flex"}},[_c('input',{directives:[{name:"model",rawName:"v-model",value:(_vm.form.branding_color),expression:"form.branding_color"}],staticStyle:{"width":"90px"},attrs:{"type":"text","placeholder":"#567bf3"},domProps:{"value":(_vm.form.branding_color)},on:{"keyup":_vm.may_prefix_with_hash,"blur":function($event){return _vm.$v.form.branding_color.$touch()},"input":function($event){if($event.target.composing){ return; }_vm.$set(_vm.form, "branding_color", $event.target.value)}}}),_c('div',{staticStyle:{"height":"40px","width":"40px","border-radius":"5px","border":"1px solid #b1b6d1","margin-left":"5px"},style:({ 'background-color': _vm.brand_color_or_default })}),_c('div',{staticStyle:{"height":"40px","width":"40px","border-radius":"5px","border":"1px solid #b1b6d1","margin-left":"5px","background-color":"#fff","overflow":"hidden"}},[_c('div',{staticStyle:{"opacity":"0.1","width":"40px","height":"40px"},style:({ 'background-color': _vm.brand_color_or_default })})])]),_c('span',{staticClass:"txt-help"},[_vm._v(_vm._s(_vm.T__( "This color will be used as the accent color in the booking widget. We will automatically use a lighter shade as the background on certain elements." )))])]),_c('form-row',{attrs:{"validator":_vm.$v.form.branding_font}},[_c('label',[_vm._v(_vm._s(_vm.T__("Brand font")))]),_c('label',{staticClass:"label-cb"},[_c('input',{directives:[{name:"model",rawName:"v-model",value:(_vm.form.branding_font),expression:"form.branding_font"}],attrs:{"type":"checkbox","true-value":"inherit","false-value":""},domProps:{"checked":Array.isArray(_vm.form.branding_font)?_vm._i(_vm.form.branding_font,null)>-1:_vm._q(_vm.form.branding_font,"inherit")},on:{"change":function($event){var $$a=_vm.form.branding_font,$$el=$event.target,$$c=$$el.checked?("inherit"):("");if(Array.isArray($$a)){var $$v=null,$$i=_vm._i($$a,$$v);if($$el.checked){$$i<0&&(_vm.$set(_vm.form, "branding_font", $$a.concat([$$v])))}else{$$i>-1&&(_vm.$set(_vm.form, "branding_font", $$a.slice(0,$$i).concat($$a.slice($$i+1))))}}else{_vm.$set(_vm.form, "branding_font", $$c)}}}}),_vm._v(" "+_vm._s(_vm.T__("Use the website's default font for the booking widget.")))])]),_c('hr'),_c('form-row',{attrs:{"validator":_vm.$v.form.use_wp_mail}},[_c('div',{staticClass:"setting-group-title",staticStyle:{"display":"flex"}},[_vm._v(" "+_vm._s(_vm.T__("Email"))+" "),_c('PremiumInfoBadge',{staticStyle:{"margin":"-4px 0 0 10px"}},[_c('em',[_vm._v("This feature is included"),_c('br'),_vm._v("in the PRO plan.")])])],1),_c('span',{staticClass:"txt-help",staticStyle:{"margin-bottom":"5px"}},[_vm._v("We send all notification emails through our servers for better deliverability. If you have set up your own reliable system, you can choose to use WP Mailer (optionally, along with an SMTP plugin) instead.")]),_c('label',{staticClass:"label-cb"},[_c('input',{directives:[{name:"model",rawName:"v-model",value:(_vm.form.use_wp_mail),expression:"form.use_wp_mail"}],attrs:{"type":"checkbox","true-value":"1","false-value":"0"},domProps:{"checked":Array.isArray(_vm.form.use_wp_mail)?_vm._i(_vm.form.use_wp_mail,null)>-1:_vm._q(_vm.form.use_wp_mail,"1")},on:{"change":[function($event){var $$a=_vm.form.use_wp_mail,$$el=$event.target,$$c=$$el.checked?("1"):("0");if(Array.isArray($$a)){var $$v=null,$$i=_vm._i($$a,$$v);if($$el.checked){$$i<0&&(_vm.$set(_vm.form, "use_wp_mail", $$a.concat([$$v])))}else{$$i>-1&&(_vm.$set(_vm.form, "use_wp_mail", $$a.slice(0,$$i).concat($$a.slice($$i+1))))}}else{_vm.$set(_vm.form, "use_wp_mail", $$c)}},_vm.may_alert_already_scheduled_mails]}}),_vm._v(" "+_vm._s(_vm.T__("I understand. Use WP Mailer instead.")))])]),_c('hr'),_c('form-row',{attrs:{"validator":_vm.$v.form.hide_premium_info_badges}},[_c('div',{staticClass:"setting-group-title"},[_vm._v(_vm._s(_vm.T__("Other")))]),_c('label',{staticClass:"label-cb"},[_c('input',{directives:[{name:"model",rawName:"v-model",value:(_vm.form.hide_premium_info_badges),expression:"form.hide_premium_info_badges"}],attrs:{"type":"checkbox","true-value":"1","false-value":"0"},domProps:{"checked":Array.isArray(_vm.form.hide_premium_info_badges)?_vm._i(_vm.form.hide_premium_info_badges,null)>-1:_vm._q(_vm.form.hide_premium_info_badges,"1")},on:{"change":function($event){var $$a=_vm.form.hide_premium_info_badges,$$el=$event.target,$$c=$$el.checked?("1"):("0");if(Array.isArray($$a)){var $$v=null,$$i=_vm._i($$a,$$v);if($$el.checked){$$i<0&&(_vm.$set(_vm.form, "hide_premium_info_badges", $$a.concat([$$v])))}else{$$i>-1&&(_vm.$set(_vm.form, "hide_premium_info_badges", $$a.slice(0,$$i).concat($$a.slice($$i+1))))}}else{_vm.$set(_vm.form, "hide_premium_info_badges", $$c)}}}}),_vm._v(" "+_vm._s(_vm.T__("Hide the 'Premium Feature' badge")))])]),_c('div',{staticClass:"form-row"},[_c('button',{staticClass:"wpc-btn primary lg mt20",staticStyle:{"width":"100%"},attrs:{"type":"button","disabled":!_vm.save_btn_is_enabled},on:{"click":_vm.form_submit}},[_vm._v(" "+_vm._s(_vm.T__("Save"))+" ")])])],1),_c('AdminInfoLine',{attrs:{"info_slug":"ownership_settings_general"}})],1)])],1),_c('v-dialog')],1)}
var SettingGeneralvue_type_template_id_4407ddd6_staticRenderFns = []


// CONCATENATED MODULE: ./src/views/admin/SettingGeneral.vue?vue&type=template&id=4407ddd6&

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js?{"cacheDirectory":"node_modules/.cache/vue-loader","cacheIdentifier":"23115053-vue-loader-template"}!./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/components/admin/SettingsMenu.vue?vue&type=template&id=1ee96384&
var SettingsMenuvue_type_template_id_1ee96384_render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',{attrs:{"id":"nav"}},[_c('router-link',{attrs:{"to":"/settings"}},[_vm._v(_vm._s(_vm.T__("General")))]),_vm._v(" • "),_c('router-link',{attrs:{"to":"/settings/profile"}},[_vm._v(_vm._s(_vm.T__("Profile")))]),_vm._v(" • "),_c('router-link',{attrs:{"to":"/settings/calendars"}},[_vm._v(_vm._s(_vm.T__("Calendars")))]),_vm._v(" • "),_c('router-link',{attrs:{"to":"/settings/integrations"}},[_vm._v(_vm._s(_vm.T__("Integrations")))]),_vm._v(" • "),_c('router-link',{attrs:{"to":"/settings/admins"}},[_vm._v(_vm._s(_vm.T__("Admins")))]),_vm._v(" • "),_c('router-link',{attrs:{"to":"/settings/account"}},[_vm._v(_vm._s(_vm.T__("Plan")))])],1)}
var SettingsMenuvue_type_template_id_1ee96384_staticRenderFns = []


// CONCATENATED MODULE: ./src/components/admin/SettingsMenu.vue?vue&type=template&id=1ee96384&

// CONCATENATED MODULE: ./src/components/admin/SettingsMenu.vue

var SettingsMenu_script = {}


/* normalize component */

var SettingsMenu_component = Object(componentNormalizer["a" /* default */])(
  SettingsMenu_script,
  SettingsMenuvue_type_template_id_1ee96384_render,
  SettingsMenuvue_type_template_id_1ee96384_staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* harmony default export */ var SettingsMenu = (SettingsMenu_component.exports);
// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js??ref--12-0!./node_modules/thread-loader/dist/cjs.js!./node_modules/babel-loader/lib!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/views/admin/SettingGeneral.vue?vue&type=script&lang=js&

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//








/* harmony default export */ var SettingGeneralvue_type_script_lang_js_ = ({
  mixins: [on_before_leave_alert_if_unsaved_mixin_on_before_leave_alert_if_unsaved("saved_form", "form")],
  components: {
    SettingsMenu: SettingsMenu,
    TimeRange1ToN: TimeRange1ToN,
    WeekDaysSelector: WeekDaysSelector,
    TimeZoneSelector: TimeZoneSelector["a" /* default */]
  },
  data: function data() {
    return {
      document_title: this.T__("General ‹ Settings"),
      working_hours_array_: [],
      save_btn_is_enabled: true,
      form: this.clone_deep(this.$store.getters.get_general_settings) // form: {
      //   working_hours: {
      //     from_time: "",
      //     to_time: ""
      //   },
      //   working_days: [],
      //   time_format: "24hrs"
      // }

    };
  },
  validations: {
    form: {
      working_hours: {
        from_time: {
          required: validators["required"],
          valid_time: common_func["v" /* valid_time */]
        },
        to_time: {
          required: validators["required"],
          valid_time: common_func["v" /* valid_time */],
          min_time: Object(common_func["p" /* min_time_as */])("from_time")
        }
      },
      working_days: {
        subset_working_days: Object(common_func["r" /* subset */])([1, 2, 3, 4, 5, 6, 7])
      },
      time_format: {
        required: validators["required"],
        time_format_in_array: Object(common_func["m" /* in_array */])(["12hrs", "24hrs"])
      },
      branding_color: {
        valid_color: common_func["t" /* valid_color */]
      },
      branding_font: {
        branding_font_in_array: Object(common_func["m" /* in_array */])(["inherit", ""])
      },
      use_wp_mail: {
        use_wp_mail_in_array: Object(common_func["m" /* in_array */])(["1", "0"])
      },
      hide_premium_info_badges: {
        hide_premium_info_badges_in_array: Object(common_func["m" /* in_array */])(["1", "0"])
      }
    }
  },
  computed: {
    working_hours: function working_hours() {
      this.$set(this.working_hours_array_, 0, this.form.working_hours);
      return this.working_hours_array_;
    },
    brand_color_or_default: function brand_color_or_default() {
      return this.form.branding_color ? this.form.branding_color : "#567bf3";
    },
    saved_form: function saved_form() {
      return this.clone_deep(this.$store.getters.get_general_settings);
    } // form() {
    //   return this.clone_deep(this.$store.getters.get_general_settings);
    // }

  },
  methods: {
    load_page: function load_page() {// let action = "get_general_settings";
      // let wpcal_request = {};
      // wpcal_request[action] = {
      //   dummy__: ""
      // };
      // let post_data = {
      //   action: "wpcal_process_admin_ajax_request",
      //   wpcal_request: wpcal_request
      // };
      // axios
      //   .post(window.wpcal_ajax.ajax_url, post_data)
      //   .then(response => {
      //     console.log(response);
      //     if (
      //       response.data &&
      //       response.data[action].hasOwnProperty("general_settings")
      //     ) {
      //       this.form = response.data[action].general_settings;
      //       console.log(this.form);
      //     }
      //   })
      //   .catch(error => {
      //     console.log(error);
      //   });
      //console.log(this.$store.getters.get_general_settings);
      //this.form = this.$store.getters.get_general_settings;
      //this.form = Object.assign({}, this.$store.getters.get_general_settings);
    },
    form_submit: function form_submit() {
      var _this = this;

      this.clear_validation_errors_cont();
      this.$v.form.$touch();

      if (this.$v.form.$anyError) {
        this.scroll_to_first_validation_error();
        return false;
      }

      this.save_btn_is_enabled = false;
      var action_update_general_settings = "update_general_settings";
      var wpcal_request = {};
      wpcal_request[action_update_general_settings] = {
        general_settings: this.form
      };
      var action_get_general_settings = "get_general_settings";
      wpcal_request[action_get_general_settings] = {
        dummy__: ""
      };
      var post_data = {
        action: "wpcal_process_admin_ajax_request",
        wpcal_request: wpcal_request
      };
      axios_default.a.post(window.wpcal_ajax.ajax_url, post_data).then(function (response) {
        //console.log(response);
        _this.notify_single_action_result(response.data[action_update_general_settings], {
          success_msg: _this.T__("Settings saved.")
        });

        if (response.data && response.data[action_get_general_settings].hasOwnProperty("general_settings")) {
          var general_settings = response.data[action_get_general_settings].general_settings;

          _this.$store.commit("set_general_settings", general_settings);
        }
      }).catch(function (error) {
        console.log(error);
      }).then(function () {
        _this.save_btn_is_enabled = true;
      });
    },
    may_prefix_with_hash: function may_prefix_with_hash() {
      var color = this.form.branding_color;
      color = color.trim();

      if (color.length && color.charAt(0) !== "#") {
        color = "#" + color;
        this.form.branding_color = color;
      }
    },
    may_alert_already_scheduled_mails: function may_alert_already_scheduled_mails() {
      if (this.form.use_wp_mail == this.saved_form.use_wp_mail) {
        return;
      }

      this.$modal.show("dialog", {
        title: this.T__("Alert!"),
        text: this.T__("The emails which are already scheduled will go as per old setting."),
        buttons: [{
          title: this.T__("Ok"),
          default: true // Will be triggered by default if 'Enter' pressed.

        }]
      });
    }
  },
  watch: {
    "$store.getters.get_general_settings": function $storeGettersGet_general_settings() {
      this.form = this.clone_deep(this.$store.getters.get_general_settings);
      this.$v.form.$reset();
    }
  },
  created: function created() {
    this.load_page();
  }
});
// CONCATENATED MODULE: ./src/views/admin/SettingGeneral.vue?vue&type=script&lang=js&
 /* harmony default export */ var admin_SettingGeneralvue_type_script_lang_js_ = (SettingGeneralvue_type_script_lang_js_); 
// CONCATENATED MODULE: ./src/views/admin/SettingGeneral.vue





/* normalize component */

var SettingGeneral_component = Object(componentNormalizer["a" /* default */])(
  admin_SettingGeneralvue_type_script_lang_js_,
  SettingGeneralvue_type_template_id_4407ddd6_render,
  SettingGeneralvue_type_template_id_4407ddd6_staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* harmony default export */ var SettingGeneral = (SettingGeneral_component.exports);
// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js?{"cacheDirectory":"node_modules/.cache/vue-loader","cacheIdentifier":"23115053-vue-loader-template"}!./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/views/admin/SettingProfile.vue?vue&type=template&id=3550b7ae&
var SettingProfilevue_type_template_id_3550b7ae_render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',[_c('div',[_c('div',{staticClass:"page-title-cont"},[_c('h1',{staticClass:"wp-heading-inline"},[_vm._v(" WPCal.io - "+_vm._s(_vm.T__("Profile Settings"))+" ")]),_c('AdminHeaderRight')],1),_c('SettingsMenu'),_c('div',{staticClass:"col-cont settings-cont"},[_c('div',{staticClass:"col"},[_c('div',{staticClass:"form"},[_c('div',{staticClass:"validation_errors_cont"}),_c('form-row',{attrs:{"validator":_vm.$v.profile_settings.first_name}},[_c('label',[_vm._v(_vm._s(_vm.T__("First name"))),_c('abbr',{staticClass:"required",attrs:{"title":"required"}},[_vm._v("*")]),_c('em',[_vm._v(_vm._s(_vm.T__("required")))])]),_c('input',{directives:[{name:"model",rawName:"v-model",value:(_vm.profile_settings.first_name),expression:"profile_settings.first_name"}],attrs:{"type":"text"},domProps:{"value":(_vm.profile_settings.first_name)},on:{"input":function($event){if($event.target.composing){ return; }_vm.$set(_vm.profile_settings, "first_name", $event.target.value)}}})]),_c('form-row',{attrs:{"validator":_vm.$v.profile_settings.last_name}},[_c('label',[_vm._v(_vm._s(_vm.T__("Last name"))),_c('abbr',{staticClass:"required",attrs:{"title":"required"}},[_vm._v("*")]),_c('em',[_vm._v(_vm._s(_vm.T__("required")))])]),_c('input',{directives:[{name:"model",rawName:"v-model",value:(_vm.profile_settings.last_name),expression:"profile_settings.last_name"}],attrs:{"type":"text"},domProps:{"value":(_vm.profile_settings.last_name)},on:{"input":function($event){if($event.target.composing){ return; }_vm.$set(_vm.profile_settings, "last_name", $event.target.value)}}})]),_c('form-row',{attrs:{"validator":_vm.$v.profile_settings.display_name}},[_c('label',[_vm._v(_vm._s(_vm.T__("Display name"))),_c('abbr',{staticClass:"required",attrs:{"title":"required"}},[_vm._v("*")]),_c('em',[_vm._v(_vm._s(_vm.T__("required")))])]),_c('input',{directives:[{name:"model",rawName:"v-model",value:(_vm.profile_settings.display_name),expression:"profile_settings.display_name"}],attrs:{"type":"text"},domProps:{"value":(_vm.profile_settings.display_name)},on:{"input":function($event){if($event.target.composing){ return; }_vm.$set(_vm.profile_settings, "display_name", $event.target.value)}}})]),_c('form-row',{attrs:{"validator":_vm.$v.profile_settings.display_name}},[_c('label',[_vm._v(_vm._s(_vm.T__("Avatar"))),_c('abbr',{staticClass:"required",attrs:{"title":"required"}},[_vm._v("*")]),_c('em',[_vm._v(_vm._s(_vm.T__("required")))])]),_c('div',{staticStyle:{"display":"flex","align-items":"center","margin-bottom":"30px"}},[_c('div',[_c('img',{staticStyle:{"border-radius":"50%","border":"3px solid #fff","box-shadow":"0 0 0 1px #b1b6d1"},attrs:{"src":_vm.avatar_details.url,"width":_vm.avatar_details.width}}),(_vm.avatar_details.is_gravatar)?_c('div',{staticStyle:{"font-size":"11px","font-style":"italic","color":"#7c7d9c","text-align":"center","position":"absolute","width":"81px"}},[_vm._v(" "+_vm._s(_vm.T__("Your Gravatar"))+" ")]):_vm._e()]),_c('div',{staticStyle:{"margin-left":"10px"}},[_c('a',{staticStyle:{"padding":"10px"},on:{"click":_vm.open_media_lib}},[_vm._v(_vm._s(_vm.T__("Change Pic")))]),(!_vm.avatar_details.is_gravatar)?_c('a',{staticStyle:{"padding":"10px"},on:{"click":_vm.use_gravatar}},[_vm._v(_vm._s(_vm.T__("Use my Gravatar")))]):_vm._e()])])]),_c('div',{staticClass:"form-row"},[_c('button',{staticClass:"wpc-btn primary lg mt20",staticStyle:{"width":"100%"},attrs:{"type":"button","disabled":!_vm.save_btn_is_enabled},on:{"click":_vm.form_submit}},[_vm._v(" "+_vm._s(_vm.T__("Save"))+" ")])])],1),_c('AdminInfoLine',{attrs:{"info_slug":"ownership_settings_profile"}})],1)])],1)])}
var SettingProfilevue_type_template_id_3550b7ae_staticRenderFns = []


// CONCATENATED MODULE: ./src/views/admin/SettingProfile.vue?vue&type=template&id=3550b7ae&

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js??ref--12-0!./node_modules/thread-loader/dist/cjs.js!./node_modules/babel-loader/lib!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/views/admin/SettingProfile.vue?vue&type=script&lang=js&
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//




/* harmony default export */ var SettingProfilevue_type_script_lang_js_ = ({
  mixins: [on_before_leave_alert_if_unsaved_mixin_on_before_leave_alert_if_unsaved("saved_profile_settings", "profile_settings")],
  components: {
    SettingsMenu: SettingsMenu
  },
  data: function data() {
    return {
      profile_settings: {
        first_name: "",
        last_name: "",
        display_name: "",
        avatar_attachment_id: ""
      },
      saved_profile_settings: this.clone_deep(this.profile_settings),
      //to avoid console error on initial rendering.
      avatar_details: {},
      is_refresh_avatar: false,
      save_btn_is_enabled: true
    };
  },
  validations: {
    profile_settings: {
      first_name: {
        required: validators["required"]
      },
      last_name: {
        required: validators["required"]
      },
      display_name: {
        required: validators["required"]
      }
    }
  },
  methods: {
    open_media_lib: function open_media_lib(e) {
      var this_v = this;
      e.preventDefault();
      var image = wp.media({
        title: this.T__("Upload Image"),
        // mutiple: true if you want to upload multiple files at once
        multiple: false
      }).open().on("select", function (e) {
        // This will return the selected image from the Media Uploader, the result is an object
        var uploaded_image = image.state().get("selection").first(); // We convert uploaded_image to a JSON object to make accessing it easier
        // Output to the console uploaded_image
        //console.log("here we go", uploaded_image);

        this_v.is_refresh_avatar = true;
        this_v.profile_settings.avatar_attachment_id = uploaded_image.id; //.toJSON().url;
        // Let's assign the url value to the input field
        //$("#image_url").val(image_url);
      });
    },
    get_avatar_attachment: function get_avatar_attachment(attachment_id) {
      var _this = this;

      var wpcal_request = {};
      var action_get_avatar_attachment = "get_admin_avatar_override_of_current_admin";
      wpcal_request[action_get_avatar_attachment] = {
        override_attachment_id: attachment_id
      };
      var post_data = {
        action: "wpcal_process_admin_ajax_request",
        wpcal_request: wpcal_request
      };
      axios_default.a.post(window.wpcal_ajax.ajax_url, post_data).then(function (response) {
        var _response$data$action;

        if (((_response$data$action = response.data[action_get_avatar_attachment]) === null || _response$data$action === void 0 ? void 0 : _response$data$action.status) == "success") {
          _this.is_refresh_avatar = false;
          _this.avatar_details = response.data[action_get_avatar_attachment].avatar_details;
        }
      }).catch(function (error) {
        console.log(error);
      });
    },
    use_gravatar: function use_gravatar() {
      this.is_refresh_avatar = true;
      this.profile_settings.avatar_attachment_id = "";
    },
    load_page: function load_page() {
      var _this2 = this;

      var wpcal_request = {};
      var action_get_profile_settings = "get_admin_profile_settings_of_current_admin";
      wpcal_request[action_get_profile_settings] = "dummy__";
      var action_get_avatar = "get_admin_avatar_of_current_admin";
      wpcal_request[action_get_avatar] = "dummy__";
      var post_data = {
        action: "wpcal_process_admin_ajax_request",
        wpcal_request: wpcal_request
      };
      axios_default.a.post(window.wpcal_ajax.ajax_url, post_data).then(function (response) {
        var _response$data$action2, _response$data$action3;

        if (((_response$data$action2 = response.data[action_get_profile_settings]) === null || _response$data$action2 === void 0 ? void 0 : _response$data$action2.status) == "success") {
          _this2.profile_settings = response.data[action_get_profile_settings].profile_settings;
          _this2.saved_profile_settings = _this2.clone_deep(_this2.profile_settings);
        }

        if (((_response$data$action3 = response.data[action_get_avatar]) === null || _response$data$action3 === void 0 ? void 0 : _response$data$action3.status) == "success") {
          _this2.is_refresh_avatar = false;
          _this2.avatar_details = response.data[action_get_avatar].avatar_details;
        }
      }).catch(function (error) {
        console.log(error);
      });
    },
    form_submit: function form_submit() {
      var _this3 = this;

      this.clear_validation_errors_cont();
      this.$v.profile_settings.$touch();

      if (this.$v.profile_settings.$anyError) {
        this.scroll_to_first_validation_error();
        return false;
      }

      this.save_btn_is_enabled = false;
      var wpcal_request = {};
      var action_update_profile_settings = "update_admin_profile_settings_of_current_admin";
      wpcal_request[action_update_profile_settings] = {
        profile_settings: this.profile_settings
      };
      var action_get_profile_settings = "get_admin_profile_settings_of_current_admin";
      wpcal_request[action_get_profile_settings] = "dummy__";
      var action_get_avatar = "get_admin_avatar_of_current_admin";
      wpcal_request[action_get_avatar] = "dummy__";
      var post_data = {
        action: "wpcal_process_admin_ajax_request",
        wpcal_request: wpcal_request
      };
      axios_default.a.post(window.wpcal_ajax.ajax_url, post_data).then(function (response) {
        var _response$data$action4, _response$data$action5;

        //console.log(response);
        _this3.notify_single_action_result(response.data[action_update_profile_settings], {
          success_msg: _this3.T__("Settings saved.")
        });

        if (((_response$data$action4 = response.data[action_get_profile_settings]) === null || _response$data$action4 === void 0 ? void 0 : _response$data$action4.status) == "success") {
          _this3.profile_settings = response.data[action_get_profile_settings].profile_settings;
          _this3.saved_profile_settings = _this3.clone_deep(_this3.profile_settings);
        }

        if (((_response$data$action5 = response.data[action_get_avatar]) === null || _response$data$action5 === void 0 ? void 0 : _response$data$action5.status) == "success") {
          _this3.is_refresh_avatar = false;
          _this3.avatar_details = response.data[action_get_avatar].avatar_details;
        }
      }).catch(function (error) {
        console.log(error);
      }).then(function () {
        _this3.save_btn_is_enabled = true;
      });
    }
  },
  watch: {
    "profile_settings.avatar_attachment_id": function profile_settingsAvatar_attachment_id(new_value, old_value) {
      if (this.is_refresh_avatar) {
        this.get_avatar_attachment(new_value);
      }
    }
  },
  mounted: function mounted() {
    this.load_page();
  }
});
// CONCATENATED MODULE: ./src/views/admin/SettingProfile.vue?vue&type=script&lang=js&
 /* harmony default export */ var admin_SettingProfilevue_type_script_lang_js_ = (SettingProfilevue_type_script_lang_js_); 
// CONCATENATED MODULE: ./src/views/admin/SettingProfile.vue





/* normalize component */

var SettingProfile_component = Object(componentNormalizer["a" /* default */])(
  admin_SettingProfilevue_type_script_lang_js_,
  SettingProfilevue_type_template_id_3550b7ae_render,
  SettingProfilevue_type_template_id_3550b7ae_staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* harmony default export */ var SettingProfile = (SettingProfile_component.exports);
// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js?{"cacheDirectory":"node_modules/.cache/vue-loader","cacheIdentifier":"23115053-vue-loader-template"}!./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/views/admin/SettingCalendars.vue?vue&type=template&id=5ea4d3c0&
var SettingCalendarsvue_type_template_id_5ea4d3c0_render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',[_c('div',[_c('div',{staticClass:"page-title-cont"},[_c('h1',{staticClass:"wp-heading-inline"},[_vm._v("WPCal.io - "+_vm._s(_vm.T__("Settings")))]),_c('AdminHeaderRight')],1),_c('SettingsMenu'),_c('OnBoardingCheckList',{attrs:{"display_in":"settings_calendars"}}),_c('div',{staticClass:"col-cont settings-cont"},[_c('div',{staticClass:"col"},[_c('div',{staticClass:"form"},[_c('div',{staticClass:"form-row"},[_c('label',{staticStyle:{"display":"flex"}},[_vm._v(_vm._s(_vm.T__("My calendar accounts"))+" "),_c('PremiumInfoBadge',{staticStyle:{"margin":"-4px 0px 0px 10px"}},[_c('em',[_vm._v("Free: 1 calendar account"),_c('br'),_vm._v("Plus: Unlimited")])])],1),_c('div',{staticClass:"mbox cal-accs"},[_c('div',{staticClass:"connected-accounts-cont"},_vm._l((_vm.calendar_accounts),function(calendar_account,index){
var _obj;
return _c('div',{key:index,staticClass:"connected-account",class:( _obj = {}, _obj[calendar_account.provider] = true, _obj['del-alert'] =  _vm.show_delete_highlight(
                      'disconnect_highlight_calendar_account_index',
                      index
                    ), _obj )},[_c('div',{staticClass:"txt-h5"},[_vm._v(" "+_vm._s(_vm._f("calendar_provider_name")(calendar_account.provider))+" "),_c('div',{staticStyle:{"float":"right"}},[_c('a',{staticStyle:{"color":"#e84653","float":"right","font-size":"12px"},on:{"click":function($event){return _vm.show_disconnect_confirmation(calendar_account)},"mouseover":function($event){return _vm.set_mouseover_on_delete(
                            'disconnect_highlight_calendar_account_index',
                            index,
                            true
                          )},"mouseleave":function($event){return _vm.set_mouseover_on_delete(
                            'disconnect_highlight_calendar_account_index',
                            index,
                            false
                          )}}},[_vm._v(_vm._s(_vm.T__("Disconnect")))]),_c('span',{staticStyle:{"float":"right","padding":"0 3px"}},[_vm._v("·")]),_c('span',{staticClass:"status ",class:{
                          enabled: calendar_account.status == '1',
                          disabled: calendar_account.status != '1'
                        },staticStyle:{"float":"right"}},[_vm._v(_vm._s(calendar_account.status == "1" ? _vm.T__("Connected") : _vm.T__("Disconnected")))])])]),_c('div',{staticClass:"txt-help"},[_vm._v(" "+_vm._s(calendar_account.account_email)+" ")])])}),0),(!_vm.show_add_calandar_account_list)?_c('button',{staticClass:"wpc-btn secondary md full-width",on:{"click":function($event){_vm.show_add_calandar_account_list = true}}},[_vm._v(" "+_vm._s(_vm.T__("+ Add Calendar Account"))+" ")]):_vm._e(),(_vm.show_add_calandar_account_list)?_c('div',[_c('div',{staticClass:"txt-h5 caps"},[_vm._v(" "+_vm._s(_vm.T__("Select your calendar app"))+" ")]),_c('ul',{staticClass:"selector block cal_apps"},[_c('li',[_c('label',{staticClass:"google_calendar",on:{"click":function($event){return _vm.add_calendar_account('google_calendar')}}},[_vm._v("Google Calendar")])]),_c('li',{staticClass:"disabled"},[_c('label',{staticClass:"office365_calendar"},[_c('em',[_vm._v("Office 365")]),_c('span',[_vm._v(_vm._s(_vm.T__("COMING SOON")))])])]),_c('li',{staticClass:"disabled"},[_c('label',{staticClass:"exchange_calendar"},[_c('em',[_vm._v("Exchange Calendar")]),_c('span',[_vm._v(_vm._s(_vm.T__("COMING SOON")))])])]),_c('li',{staticClass:"disabled"},[_c('label',{staticClass:"outlook_calendar"},[_c('em',[_vm._v("Outlook Plug-in")]),_c('span',[_vm._v(_vm._s(_vm.T__("COMING SOON")))])])]),_c('li',{staticClass:"disabled"},[_c('label',{staticClass:"icloud_calendar"},[_c('em',[_vm._v("iCloud Calendar")]),_c('span',[_vm._v(_vm._s(_vm.T__("COMING SOON")))])])])])]):_vm._e()])])]),_c('AdminInfoLine',{attrs:{"info_slug":"ownership_settings_calendars"}})],1),_c('div',{staticClass:"col"},[_c('div',{staticClass:"form"},[_c('div',{staticClass:"form-row"},[_c('label',[_vm._v(_vm._s(_vm.T__("Configuration")))]),_c('ul',{staticClass:"mbox",staticStyle:{"margin-top":"0"}},[_c('li',[_c('div',[_c('div',{staticClass:"txt-h5 caps"},[_vm._v(" "+_vm._s(_vm.T__("Add bookings to..."))+" ")]),_c('div',{staticClass:"txt-help"},[_vm._v(" "+_vm._s(_vm.T__( "Set the calendar you would like to add new bookings to as they're scheduled." ))+" ")]),_c('div',{staticClass:"cal-list cf p10 border-all border-round mt10",on:{"click":_vm.show_choose_add_bookings_to_calendar_modal}},[(
                        _vm.calendar_accounts.hasOwnProperty(
                          _vm.add_bookings_to_calendar_account_id
                        )
                      )?_c('div',[_vm._v(" "+_vm._s(_vm.T__("Add to"))+" "),_c('span',{staticClass:"cal-provider",class:_vm.calendar_accounts[
                            _vm.add_bookings_to_calendar_account_id
                          ].provider},[_vm._v(" "+_vm._s(_vm.calendar_accounts[ _vm.add_bookings_to_calendar_account_id ].account_email)),_c('a',{staticClass:"fl-rt"},[_vm._v(_vm._s(_vm.T__("EDIT")))])]),_c('ul',{staticClass:"bull"},[_c('li',[_vm._v(_vm._s(_vm.add_bookings_to_calendar.name))])])]):_c('div',[_vm._v(" "+_vm._s(_vm.T__("No calendar is choosen."))),_c('a',{staticClass:"fl-rt"},[_vm._v(_vm._s(_vm.T__("EDIT")))])])]),_c('div',{staticClass:"txt-help mt5"},[_vm._v(" "+_vm._s(_vm.T__( "This has to be set for Google Meet to work. When set, invitations and notifications will be sent to the invitee directly from your Google Calendar account." ))+" ")]),_c('modal',{staticStyle:{"z-index":"9999"},attrs:{"name":"choose_add_bookings_to_calendar_modal","height":"auto","width":"360px"},on:{"before-close":function($event){_vm.can_show_choose_add_bookings_to_calendar_modal = false}}},[(_vm.can_show_choose_add_bookings_to_calendar_modal)?_c('div',{staticClass:"mbox bg-light shadow mb0"},[_c('div',{staticClass:"form"},[_c('div',{staticClass:"form-row"},[_c('label',{staticStyle:{"text-align":"center"}},[_vm._v("Which calendar should we add"),_c('br'),_vm._v("new events to?")]),_c('ul',{staticClass:"selector block mt10 add-to-cal"},[_vm._l((_vm.calendar_accounts),function(calendar_account,index){return _c('li',{key:index},[_c('input',{directives:[{name:"model",rawName:"v-model",value:(
                                  _vm.tmp_edit_add_bookings_to_calendar_account_id
                                ),expression:"\n                                  tmp_edit_add_bookings_to_calendar_account_id\n                                "}],attrs:{"type":"radio","id":'add-to-cal-opt' + index,"name":"add_bookings_to_calendar_account"},domProps:{"value":calendar_account.id,"checked":_vm._q(
                                  _vm.tmp_edit_add_bookings_to_calendar_account_id
                                ,calendar_account.id)},on:{"change":[function($event){_vm.tmp_edit_add_bookings_to_calendar_account_id
                                =calendar_account.id},_vm.choose_default_calendar_for_add_bookings_to]}}),_c('label',{class:calendar_account.provider,attrs:{"for":'add-to-cal-opt' + index}},[_vm._v(" "+_vm._s(calendar_account.account_email))])])}),_c('li',[_c('input',{directives:[{name:"model",rawName:"v-model",value:(
                                  _vm.tmp_edit_add_bookings_to_calendar_account_id
                                ),expression:"\n                                  tmp_edit_add_bookings_to_calendar_account_id\n                                "}],attrs:{"type":"radio","id":"add-to-cal-dont","name":"add_bookings_to_calendar_account","value":"no"},domProps:{"checked":_vm._q(
                                  _vm.tmp_edit_add_bookings_to_calendar_account_id
                                ,"no")},on:{"change":function($event){_vm.tmp_edit_add_bookings_to_calendar_account_id
                                ="no"}}}),_c('label',{attrs:{"for":"add-to-cal-dont"}},[_vm._v(_vm._s(_vm.T__("Do not add new bookings to any calendar")))])])],2)])]),(
                          _vm.calendar_accounts.hasOwnProperty(
                            _vm.tmp_edit_add_bookings_to_calendar_account_id
                          )
                        )?_c('div',[_c('div',{staticStyle:{"font-size":"14px","margin":"20px 0 5px"}},[_vm._v(" "+_vm._s(_vm.T__("Add to Calendar"))+" ")]),_c('select',{directives:[{name:"model",rawName:"v-model",value:(_vm.tmp_edit_add_bookings_to_calendar_id),expression:"tmp_edit_add_bookings_to_calendar_id"}],on:{"change":function($event){var $$selectedVal = Array.prototype.filter.call($event.target.options,function(o){return o.selected}).map(function(o){var val = "_value" in o ? o._value : o.value;return val}); _vm.tmp_edit_add_bookings_to_calendar_id=$event.target.multiple ? $$selectedVal : $$selectedVal[0]}}},_vm._l((this
                              .calendar_accounts[
                              _vm.tmp_edit_add_bookings_to_calendar_account_id
                            ].calendars),function(calendar,index){return _c('option',{key:index,attrs:{"disabled":calendar.is_writable == '0'},domProps:{"value":calendar.id}},[_vm._v(_vm._s(calendar.name))])}),0)]):_vm._e(),_c('button',{staticClass:"wpc-btn primary md mt20",attrs:{"type":"button"},on:{"click":_vm.update_add_bookings_to_calendar_id}},[_vm._v(" "+_vm._s(_vm.T__("Update"))+" ")])]):_vm._e()])],1)]),_c('li',[_c('div',[_c('div',{staticClass:"txt-h5 caps"},[_vm._v(" "+_vm._s(_vm.T__("Check for conflicts"))+" ")]),_c('div',{staticClass:"txt-help"},[_vm._v(" "+_vm._s(_vm.T__( "Set the calendar(s) to check and exclude slots already scheduled outside WPCal." ))+" ")]),_c('div',[_vm._l((_vm.conflict_calendar_accounts),function(calendar_account,index){return _c('div',{key:index,staticClass:"cal-list cf p10 border-all border-round mt10",on:{"click":function($event){_vm.conflict_calendar_account_id = calendar_account.id;
                        _vm.show_choose_conflict_calendars_modal();}}},[_c('div',[_vm._v(" Check "),_c('span',{staticClass:"cal-provider",class:calendar_account.provider},[_vm._v(" "+_vm._s(calendar_account.account_email)),_c('a',{staticClass:"fl-rt"},[_vm._v(_vm._s(_vm.T__("EDIT")))])]),_vm._l((calendar_account.calendars),function(calendar,index2){return _c('div',{key:index2},[_c('ul',{staticClass:"bull"},[_c('li',[_vm._v(_vm._s(calendar.name))])])])})],2)])}),(_vm._isEmpty(_vm.conflict_calendar_accounts))?_c('div',{staticClass:"cal-list cf p10 border-all border-round mt10",on:{"click":_vm.show_choose_conflict_calendars_modal}},[_c('div',[_vm._v(" "+_vm._s(_vm.T__("No calendar is choosen."))+" "),_c('a',{staticClass:"fl-rt"},[_vm._v(_vm._s(_vm.T__("EDIT")))])])]):_vm._e()],2),_c('modal',{staticStyle:{"z-index":"9999"},attrs:{"name":"choose_conflict_calendars_modal","height":"auto","width":"360px"},on:{"before-close":function($event){_vm.can_show_choose_conflict_calendars_modal = false}}},[(_vm.can_show_choose_conflict_calendars_modal)?_c('div',{staticClass:"mbox bg-light shadow"},[_c('div',{staticClass:"form"},[_c('div',{staticClass:"form-row"},[_c('label',{staticClass:"mb10",staticStyle:{"text-align":"center"}},[_vm._v(_vm._s(_vm.T__("Check for conflicts in...")))]),(_vm.calendar_accounts)?_c('select',{directives:[{name:"model",rawName:"v-model",value:(_vm.tmp_edit_conflict_calendar_account_id),expression:"tmp_edit_conflict_calendar_account_id"}],on:{"change":function($event){var $$selectedVal = Array.prototype.filter.call($event.target.options,function(o){return o.selected}).map(function(o){var val = "_value" in o ? o._value : o.value;return val}); _vm.tmp_edit_conflict_calendar_account_id=$event.target.multiple ? $$selectedVal : $$selectedVal[0]}}},_vm._l((this
                                .calendar_accounts),function(calendar_account,index){return _c('option',{key:index,domProps:{"value":calendar_account.id}},[_vm._v(_vm._s(calendar_account.account_email))])}),0):_vm._e(),_c('div',{staticStyle:{"font-size":"14px","margin":"20px 0 5px"}},[_vm._v(" "+_vm._s(_vm.T__("Check these calendars for conflicts"))+" ")]),(_vm.tmp_edit_conflict_calendar_account_id)?_c('div',[_c('ul',{staticClass:"selector block mt10 check-conflicts"},_vm._l((_vm.calendar_accounts[
                                  _vm.tmp_edit_conflict_calendar_account_id
                                ].calendars),function(calendar,index){return _c('li',{key:index},[_c('input',{directives:[{name:"model",rawName:"v-model",value:(_vm.tmp_edit_conflict_calendar_ids),expression:"tmp_edit_conflict_calendar_ids"}],attrs:{"type":"checkbox","id":'check-conflicts-opt' + index},domProps:{"value":calendar.id,"checked":Array.isArray(_vm.tmp_edit_conflict_calendar_ids)?_vm._i(_vm.tmp_edit_conflict_calendar_ids,calendar.id)>-1:(_vm.tmp_edit_conflict_calendar_ids)},on:{"change":function($event){var $$a=_vm.tmp_edit_conflict_calendar_ids,$$el=$event.target,$$c=$$el.checked?(true):(false);if(Array.isArray($$a)){var $$v=calendar.id,$$i=_vm._i($$a,$$v);if($$el.checked){$$i<0&&(_vm.tmp_edit_conflict_calendar_ids=$$a.concat([$$v]))}else{$$i>-1&&(_vm.tmp_edit_conflict_calendar_ids=$$a.slice(0,$$i).concat($$a.slice($$i+1)))}}else{_vm.tmp_edit_conflict_calendar_ids=$$c}}}}),_c('label',{attrs:{"for":'check-conflicts-opt' + index}},[_vm._v(_vm._s(calendar.name))])])}),0)]):_vm._e(),_c('button',{staticClass:"wpc-btn primary md mt20",attrs:{"type":"button"},on:{"click":_vm.update_conflict_calendar_ids}},[_vm._v(" "+_vm._s(_vm.T__("Update"))+" ")])])])]):_vm._e()])],1)])])])])])])],1),_c('v-dialog')],1)}
var SettingCalendarsvue_type_template_id_5ea4d3c0_staticRenderFns = []


// CONCATENATED MODULE: ./src/views/admin/SettingCalendars.vue?vue&type=template&id=5ea4d3c0&

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js??ref--12-0!./node_modules/thread-loader/dist/cjs.js!./node_modules/babel-loader/lib!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/views/admin/SettingCalendars.vue?vue&type=script&lang=js&


//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//



/* harmony default export */ var SettingCalendarsvue_type_script_lang_js_ = ({
  components: {
    SettingsMenu: SettingsMenu,
    OnBoardingCheckList: OnBoardingCheckList
  },
  props: {
    connect_status: {
      type: String,
      default: null
    },
    connected_calendar_account_id: {
      type: String,
      default: null
    }
  },
  data: function data() {
    return {
      document_title: "Calendars ‹ Settings",
      show_add_calandar_account_list: false,
      calendar_accounts: [],
      can_show_choose_add_bookings_to_calendar_modal: false,
      can_show_choose_conflict_calendars_modal: false,
      add_bookings_to_calendar_account_id: "no",
      add_bookings_to_calendar_id: "",
      tmp_edit_add_bookings_to_calendar_account_id: "no",
      tmp_edit_add_bookings_to_calendar_id: "",
      conflict_calendar_ids: [],
      conflict_calendar_account_id: "",
      tmp_edit_conflict_calendar_ids: [],
      tmp_edit_conflict_calendar_account_id: "",
      disconnect_highlight_calendar_account_index: null,
      connect_status_notified: false
    };
  },
  computed: {
    add_bookings_to_calendar: function add_bookings_to_calendar() {
      if (this.add_bookings_to_calendar_account_id && this.add_bookings_to_calendar_id) {
        if (this.calendar_accounts.hasOwnProperty(this.add_bookings_to_calendar_account_id) && this.calendar_accounts[this.add_bookings_to_calendar_account_id].calendars.hasOwnProperty(this.add_bookings_to_calendar_id)) {
          return this.calendar_accounts[this.add_bookings_to_calendar_account_id].calendars[this.add_bookings_to_calendar_id];
        }
      }

      return {};
    },
    conflict_calendar_accounts: function conflict_calendar_accounts() {
      var conflict_calendar_accounts = {};

      for (var calendar_account_id in this.calendar_accounts) {
        for (var calendar_id in this.calendar_accounts[calendar_account_id].calendars) {
          if (this.conflict_calendar_ids.indexOf(calendar_id) !== -1) {
            if (!conflict_calendar_accounts.hasOwnProperty(calendar_account_id)) {
              conflict_calendar_accounts[calendar_account_id] = Object.assign({}, this.calendar_accounts[calendar_account_id]);
              conflict_calendar_accounts[calendar_account_id].calendars = {};
            }

            conflict_calendar_accounts[calendar_account_id].calendars[calendar_id] = this.calendar_accounts[calendar_account_id].calendars[calendar_id];
          }
        }
      }

      return conflict_calendar_accounts;
    },
    enable_add_new_calendar_account: function enable_add_new_calendar_account() {
      // let count = Object.keys(this.calendar_accounts).length;
      // if (count >= 6) {
      //   return false;
      // }
      return true;
    }
  },
  methods: {
    add_calendar_account: function add_calendar_account(provider) {
      if (provider === "google_calendar") {
        window.location = "admin.php?page=wpcal_admin&wpcal_action=add_calendar_account&provider=google_calendar";
      }
    },
    load_page: function load_page() {
      var _this = this;

      var action = "get_calendar_accounts_details_of_current_admin";
      var wpcal_request = {};
      wpcal_request[action] = {
        dummy__: ""
      };
      var action2 = "get_add_bookings_to_calendar_of_current_admin";
      wpcal_request[action2] = {
        dummy__: ""
      };
      var action3 = "get_conflict_calendar_ids_of_current_admin";
      wpcal_request[action3] = {
        dummy__: ""
      };
      var post_data = {
        action: "wpcal_process_admin_ajax_request",
        wpcal_request: wpcal_request
      };
      axios_default.a.post(window.wpcal_ajax.ajax_url, post_data).then(function (response) {
        var connect_status_notified = _this.connect_status_notified;
        Object.assign(_this.$data, _this.$options.data.apply(_this)); //re-initilize data in Vue - this required as we are using this function to after update

        _this.connect_status_notified = connect_status_notified; //console.log(response);

        if (response.data && response.data[action].hasOwnProperty("calendar_accounts_details")) {
          _this.calendar_accounts = response.data[action].calendar_accounts_details;

          if (Object(esm_typeof["a" /* default */])(response.data[action2]) == "object" && response.data[action2].hasOwnProperty("add_bookings_to_calendar") && response.data[action2].add_bookings_to_calendar && response.data[action2].add_bookings_to_calendar.hasOwnProperty("calendar_id")) {
            _this.add_bookings_to_calendar_id = response.data[action2].add_bookings_to_calendar.calendar_id;
            _this.add_bookings_to_calendar_account_id = response.data[action2].add_bookings_to_calendar.calendar_account_id;
          }

          _this.conflict_calendar_ids = response.data[action3].conflict_calendar_ids;

          _this.set_default_conflict_calendar_account_id();

          _this.handle_connect_result();
        }
      }).catch(function (error) {
        console.log(error);
      });
    },
    handle_connect_result: function handle_connect_result() {
      if (!this.connect_status || !this.connected_calendar_account_id) {
        return;
      }

      if (this.connect_status_notified) {
        return;
      }

      if (this.connect_status === "connected" && !this._isEmpty(this.calendar_accounts)) {
        for (var index in this.calendar_accounts) {
          if (this.calendar_accounts[index].id != this.connected_calendar_account_id) {
            continue;
          }

          var success_msg = this.Tsprintf(
          /* translators: 1: html-tag-open 2: html-tag-close 3: tp provider 4: account email */
          this.T__("Your %1$s %3$s %2$s account %1$s %4$s %2$s is succesfully connected."), "<strong>", "</strong>", this.$options.filters.calendar_provider_name(this.calendar_accounts[index].provider), this.calendar_accounts[index].account_email);
          var success_title = "Ok";
          this.$toast.success(success_msg, success_title, {}); //resetting to avoid duplicate notifications

          this.connect_status_notified = true;
          break;
        }
      }
    },
    update_add_bookings_to_calendar_id: function update_add_bookings_to_calendar_id() {
      var _this2 = this;

      var add_bookings_to_calendar_id = this.tmp_edit_add_bookings_to_calendar_id;

      if (this.tmp_edit_add_bookings_to_calendar_account_id == "no") {
        add_bookings_to_calendar_id = "no";
      }

      var action = "update_add_bookings_to_calendar_id_for_current_admin";
      var wpcal_request = {};
      wpcal_request[action] = {
        add_bookings_to_calendar_id: add_bookings_to_calendar_id
      };
      var post_data = {
        action: "wpcal_process_admin_ajax_request",
        wpcal_request: wpcal_request
      };
      axios_default.a.post(window.wpcal_ajax.ajax_url, post_data).then(function (response) {
        //console.log(response);
        _this2.notify_single_action_result(response.data[action], {
          success_msg: "Settings saved."
        });

        if (response.data && response.data[action].hasOwnProperty("status")) {
          _this2.load_page();
        }
      }).catch(function (error) {
        console.log(error);
      });
      this.$modal.hide("choose_add_bookings_to_calendar_modal");
    },
    update_conflict_calendar_ids: function update_conflict_calendar_ids() {
      var _this3 = this;

      var action = "update_conflict_calendar_ids_for_current_admin";
      var wpcal_request = {};
      wpcal_request[action] = {
        conflict_calendar_ids: this.tmp_edit_conflict_calendar_ids,
        conflict_calendar_ids_length: this.tmp_edit_conflict_calendar_ids.length
      };
      var post_data = {
        action: "wpcal_process_admin_ajax_request",
        wpcal_request: wpcal_request
      };
      axios_default.a.post(window.wpcal_ajax.ajax_url, post_data).then(function (response) {
        //console.log(response);
        _this3.notify_single_action_result(response.data[action], {
          success_msg: _this3.T__("Settings saved.")
        });

        if (response.data && response.data[action].hasOwnProperty("status")) {
          _this3.load_page();

          if (response.data && response.data[action].status === "success") {
            _this3.sync_all_calendar_api();
          }
        }
      }).catch(function (error) {
        console.log(error);
      });
      this.$modal.hide("choose_conflict_calendars_modal");
    },
    disconnect_calendar_by_id: function disconnect_calendar_by_id(calendar_account) {
      var _this4 = this;

      var force = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;
      var action = "disconnect_calendar_by_id_for_current_admin";
      var wpcal_request = {};
      wpcal_request[action] = {
        calendar_account_id: calendar_account.id,
        provider: calendar_account.provider,
        force: force === true ? "force_remove" : ""
      };
      var post_data = {
        action: "wpcal_process_admin_ajax_request",
        wpcal_request: wpcal_request
      };
      axios_default.a.post(window.wpcal_ajax.ajax_url, post_data).then(function (response) {
        //console.log(response);
        _this4.notify_single_action_result(response.data[action], {
          success_msg: _this4.T__("Calendar is disconnected successfully.")
        });

        if (!force && response.data[action] && response.data[action].hasOwnProperty("status") && response.data[action].status == "error") {
          setTimeout(function () {
            _this4.show_disconnect_confirmation(calendar_account, true);
          }, 1000);
        }

        _this4.load_page();
      }).catch(function (error) {
        console.log(error);
      });
    },
    show_disconnect_confirmation: function show_disconnect_confirmation(calendar_account) {
      var _this5 = this;

      var force = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;
      var dialog_text;
      var yes_button_title;

      if (force) {
        dialog_text = this.Tsprintf(
        /* translators: 1: html-tag 2: html-tag-open 3: html-tag-close 4: account email */
        this.T__("Oops! Error while disconnecting the account. %1$s Do want to %2$sforce-disconnect%3$s the %1$s %2$s %4$s %3$s account?"), "<br>", "<strong>", "</strong>", calendar_account.account_email);
        yes_button_title = this.T__("Yes, force-disconnect it.");
      } else {
        dialog_text = this.Tsprintf(
        /* translators: 1: html-tag 2: html-tag-open 3: html-tag-close 4: account email */
        this.T__("Are you sure you want to disconnect the %1$s %2$s %4$s %3$s account?"), "<br>", "<strong>", "</strong>", calendar_account.account_email);
        yes_button_title = this.T__("Yes, disconnect it.");
      }

      this.$modal.show("dialog", {
        title: this.T__("Alert!"),
        text: dialog_text,
        buttons: [{
          title: yes_button_title,
          handler: function handler() {
            _this5.disconnect_calendar_by_id(calendar_account, force);

            _this5.$modal.hide("dialog");
          }
        }, {
          title: this.T__("No, Cancel."),
          default: true // Will be triggered by default if 'Enter' pressed.

        }]
      });
    },
    show_choose_add_bookings_to_calendar_modal: function show_choose_add_bookings_to_calendar_modal() {
      this.tmp_edit_add_bookings_to_calendar_account_id = this.add_bookings_to_calendar_account_id;
      this.tmp_edit_add_bookings_to_calendar_id = this.add_bookings_to_calendar_id;
      this.can_show_choose_add_bookings_to_calendar_modal = true;
      this.$modal.show("choose_add_bookings_to_calendar_modal");
    },
    show_choose_conflict_calendars_modal: function show_choose_conflict_calendars_modal() {
      this.tmp_edit_conflict_calendar_account_id = this.conflict_calendar_account_id;
      this.tmp_edit_conflict_calendar_ids = this.conflict_calendar_ids;
      this.can_show_choose_conflict_calendars_modal = true;
      this.$modal.show("choose_conflict_calendars_modal");
    },
    set_default_conflict_calendar_account_id: function set_default_conflict_calendar_account_id() {
      for (var calendar_account_id in this.calendar_accounts) {
        if (this.conflict_calendar_ids.length == 0) {
          this.conflict_calendar_account_id = calendar_account_id;
          break;
        }

        for (var calendar_id in this.calendar_accounts[calendar_account_id].calendars) {
          if (this.conflict_calendar_ids.indexOf(calendar_id) !== -1) {
            this.conflict_calendar_account_id = calendar_account_id;
            return;
          }
        }
      }
    },
    choose_default_calendar_for_add_bookings_to: function choose_default_calendar_for_add_bookings_to() {
      if (!this.tmp_edit_add_bookings_to_calendar_account_id || this.tmp_edit_add_bookings_to_calendar_account_id == "no") {
        return;
      }

      if (this.tmp_edit_add_bookings_to_calendar_id) {
        //check calendar_id belongs to calendar_account_id
        if (this.is_calendar_id_belongs_to_calendar_account_id(this.tmp_edit_add_bookings_to_calendar_id, this.tmp_edit_add_bookings_to_calendar_account_id)) {
          return;
        }

        this.tmp_edit_add_bookings_to_calendar_id = "";
      }

      if (!this.calendar_accounts[this.tmp_edit_add_bookings_to_calendar_account_id] || !this.calendar_accounts[this.tmp_edit_add_bookings_to_calendar_account_id].calendars) {
        return;
      }

      var first_calendar_id;

      for (var index in this.calendar_accounts[this.tmp_edit_add_bookings_to_calendar_account_id].calendars) {
        var calendar = this.calendar_accounts[this.tmp_edit_add_bookings_to_calendar_account_id].calendars[index];

        if (calendar.is_writable == "1") {
          first_calendar_id = calendar.id;
        }

        if (calendar.is_primary == "1") {
          this.tmp_edit_add_bookings_to_calendar_id = calendar.id;
          return;
        }
      }

      if (first_calendar_id) {
        this.tmp_edit_add_bookings_to_calendar_id = first_calendar_id;
        return;
      }

      return;
    },
    is_calendar_id_belongs_to_calendar_account_id: function is_calendar_id_belongs_to_calendar_account_id(calendar_id, calendar_account_id) {
      var _this$calendar_accoun;

      var is_exists = (_this$calendar_accoun = this.calendar_accounts[calendar_account_id]) === null || _this$calendar_accoun === void 0 ? void 0 : _this$calendar_accoun.calendars.hasOwnProperty(calendar_id);
      return is_exists ? true : false;
    },
    sync_all_calendar_api: function sync_all_calendar_api() {
      var _this6 = this;

      //current admin only
      //postpone manage_background_task
      this.$store.dispatch("manage_background_task", {
        initial_time_out: 30000 //30 secs

      });
      var action = "sync_all_calendar_api_for_current_admin";
      var wpcal_request = {};
      wpcal_request[action] = "dummy__";
      var post_data = {
        action: "wpcal_process_admin_ajax_request",
        wpcal_request: wpcal_request
      };
      axios_default.a.post(window.wpcal_ajax.ajax_url, post_data, {
        params: {
          _remove_options_before_call: {
            background_call: true
          }
        }
      }).then(function (response) {
        _this6.load_page();
      }).catch(function (error) {
        console.log(error);
      });
    }
  },
  mounted: function mounted() {
    var _this7 = this;

    this.load_page();
    setTimeout(function () {
      _this7.sync_all_calendar_api(); //Improve later - might create freq calls - should be rare admins visiting this page

    }, 1000);
  }
});
// CONCATENATED MODULE: ./src/views/admin/SettingCalendars.vue?vue&type=script&lang=js&
 /* harmony default export */ var admin_SettingCalendarsvue_type_script_lang_js_ = (SettingCalendarsvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/assets/css/admin_settings.css?vue&type=style&index=0&lang=css&
var admin_settingsvue_type_style_index_0_lang_css_ = __webpack_require__("5536");

// EXTERNAL MODULE: ./src/views/admin/SettingCalendars.vue?vue&type=style&index=1&lang=css&
var SettingCalendarsvue_type_style_index_1_lang_css_ = __webpack_require__("fbbe");

// CONCATENATED MODULE: ./src/views/admin/SettingCalendars.vue







/* normalize component */

var SettingCalendars_component = Object(componentNormalizer["a" /* default */])(
  admin_SettingCalendarsvue_type_script_lang_js_,
  SettingCalendarsvue_type_template_id_5ea4d3c0_render,
  SettingCalendarsvue_type_template_id_5ea4d3c0_staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* harmony default export */ var SettingCalendars = (SettingCalendars_component.exports);
// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js?{"cacheDirectory":"node_modules/.cache/vue-loader","cacheIdentifier":"23115053-vue-loader-template"}!./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/views/admin/SettingIntegrations.vue?vue&type=template&id=1355211b&
var SettingIntegrationsvue_type_template_id_1355211b_render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',[_c('div',[_c('div',{staticClass:"page-title-cont"},[_c('h1',{staticClass:"wp-heading-inline"},[_vm._v("WPCal.io - "+_vm._s(_vm.T__("Settings")))]),_c('AdminHeaderRight')],1),_c('SettingsMenu'),_c('OnBoardingCheckList',{attrs:{"display_in":"settings_integrations"}}),_c('div',{staticClass:"col-cont settings-cont"},[_c('div',{staticClass:"col"},[_c('div',{staticClass:"form"},[_c('div',{staticClass:"form-row"},[_c('label',[_vm._v(_vm._s(_vm.T__("Web conferencing apps")))]),(_vm.tp_accounts.length > 0)?_c('span',{staticClass:"txt-help",staticStyle:{"margin-bottom":"10px"}},[_vm._v(_vm._s(_vm.T__( "After connecting your web conferencing app account below, you should edit your existing event types or create a new one and add the app as a location to use it for your bookings." )))]):_vm._e(),_c('div',{staticClass:"mbox loc-integration-accs"},[_c('div',{staticClass:"set-locations-cont"},[_c('div',{staticClass:"set-locations-single location_googlemeet_meeting"},[_c('div',{staticClass:"txt-h5",class:{
                      loading:
                        _vm.googlemeet_meeting_is_account_connected === null
                    }},[_vm._v(" "+_vm._s(_vm._f("tp_provider_name")("googlemeet_meeting"))+" "),(_vm.googlemeet_meeting_is_account_connected != null)?_c('span',{staticClass:"status",class:{
                        enabled: _vm.googlemeet_meeting_is_account_connected,
                        disabled: !_vm.googlemeet_meeting_is_account_connected
                      }},[_vm._v(_vm._s(_vm.googlemeet_meeting_is_account_connected ? _vm.T__("Connected") : _vm.T__("Disconnected")))]):_vm._e()]),_c('div',{staticClass:"txt-help",staticStyle:{"margin-bottom":"5px"}},[_vm._v(" "+_vm._s(_vm.googlemeet_meeting_account_email)+" ")]),_c('div',{staticClass:"txt-help"},[(_vm.googlemeet_meeting_is_account_connected === true)?_c('span',[_vm._v(" "+_vm._s(_vm.T__( "As long as a Google Calendar account is connected, this cannot be disconnected. If you do not want to use Google Meet for your bookings, you can simply not add it as a location in your event types." ))+" ")]):_vm._e(),(_vm.googlemeet_meeting_is_account_connected === false)?_c('span',{domProps:{"innerHTML":_vm._s(
                        _vm.Tsprintf(
                          /* translators: 1: html-tag-open 2: html-tag-close */
                          _vm.T__(
                            'This will be connected when you connect a calendar account (%1$s Settings › Calendars %2$s), and set a "Add Bookings to..." calendar.'
                          ),
                          '<a href="admin.php?page=wpcal_admin#/settings/calendars">',
                          '</a>'
                        )
                      )}}):_vm._e()])]),_vm._l((_vm.tp_accounts),function(tp_account,index){
                      var _obj;
return _c('div',{key:index,staticClass:"set-locations-single",class:( _obj = {}, _obj['location_' + tp_account.provider] = true, _obj['del-alert'] =  _vm.show_delete_highlight(
                      'disconnect_highlight_tp_account_index',
                      index
                    ), _obj )},[_c('div',{staticClass:"txt-h5"},[_vm._v(" "+_vm._s(_vm._f("tp_provider_name")(tp_account.provider))+" "),_c('div',{staticStyle:{"float":"right"}},[_c('a',{staticStyle:{"color":"#e84653","float":"right","font-size":"12px"},on:{"click":function($event){return _vm.show_disconnect_confirmation(tp_account)},"mouseover":function($event){return _vm.set_mouseover_on_delete(
                            'disconnect_highlight_tp_account_index',
                            index,
                            true
                          )},"mouseleave":function($event){return _vm.set_mouseover_on_delete(
                            'disconnect_highlight_tp_account_index',
                            index,
                            false
                          )}}},[_vm._v(_vm._s(_vm.T__("Disconnect")))]),_c('span',{staticStyle:{"float":"right","padding":"0 3px"}},[_vm._v(" · ")]),_c('span',{staticClass:"status ",class:{
                          enabled: tp_account.status == '1',
                          disabled: tp_account.status != '1'
                        }},[_vm._v(_vm._s(tp_account.status == "1" ? _vm.T__("Connected") : _vm.T__("Disconnected")))])])]),_c('div',{staticClass:"txt-help"},[_vm._v(" "+_vm._s(tp_account.tp_account_email)+" ")])])})],2),(!_vm.show_add_tp_account_list)?_c('button',{staticClass:"wpc-btn secondary md full-width",attrs:{"disabled":!_vm.enable_add_new_tp_account,"title":!_vm.enable_add_new_tp_account
                    ? this.T__('You have added all available apps.')
                    : ''},on:{"click":function($event){_vm.show_add_tp_account_list = true}}},[_vm._v(" "+_vm._s(_vm.T__("+ Add an App"))+" ")]):_vm._e(),(_vm.show_add_tp_account_list)?_c('div',[_c('div',{staticClass:"txt-h5 caps"},[_vm._v(" "+_vm._s(_vm.T__("Select your web conferencing app"))+" ")]),_c('ul',{staticClass:"selector block compact location"},_vm._l((_vm.tp_accounts_add_list_final),function(tp_account_add_item,index2){return _c('li',{key:index2},[_c('label',{class:'location_' + tp_account_add_item.provider,on:{"click":function($event){return _vm.add_tp_account(tp_account_add_item.provider)}}},[_c('div',{staticClass:"txt-h5"},[_vm._v(" "+_vm._s(_vm._f("tp_provider_name")(tp_account_add_item.provider))+" ")]),_c('div',{staticClass:"txt-help",staticStyle:{"padding-top":"0"}},[_vm._v(" "+_vm._s(_vm.T__("Web conferencing"))+" ")])])])}),0)]):_vm._e()])])]),_c('AdminInfoLine',{attrs:{"info_slug":"ownership_settings_integrations"}})],1)])],1),_c('v-dialog')],1)}
var SettingIntegrationsvue_type_template_id_1355211b_staticRenderFns = []


// CONCATENATED MODULE: ./src/views/admin/SettingIntegrations.vue?vue&type=template&id=1355211b&

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js??ref--12-0!./node_modules/thread-loader/dist/cjs.js!./node_modules/babel-loader/lib!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/views/admin/SettingIntegrations.vue?vue&type=script&lang=js&

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//




/* harmony default export */ var SettingIntegrationsvue_type_script_lang_js_ = ({
  mixins: [admin_tp_locations_state_mixin],
  components: {
    SettingsMenu: SettingsMenu,
    OnBoardingCheckList: OnBoardingCheckList
  },
  props: {
    connect_status: {
      type: String,
      default: null
    },
    connected_tp_account_id: {
      type: String,
      default: null
    }
  },
  data: function data() {
    return {
      document_title: this.T__("Integrations ‹ Settings"),
      show_add_tp_account_list: false,
      tp_accounts: [],
      tp_accounts_add_list: [{
        provider: "zoom_meeting",
        limit: 1,
        count: 0,
        show: true
      }, {
        provider: "gotomeeting_meeting",
        limit: 1,
        count: 0,
        show: true
      }],
      disconnect_highlight_tp_account_index: null,
      connect_status_notified: false
    };
  },
  computed: {
    tp_accounts_add_list_with_stats: function tp_accounts_add_list_with_stats() {
      var _this = this;

      var list = this.clone_deep(this.tp_accounts_add_list);

      var _loop = function _loop(index) {
        var tp_account = _this.tp_accounts[index];
        var list_index = list.findIndex(function (list_item) {
          return list_item.provider === tp_account.provider;
        });

        if (list_index != undefined) {
          list[list_index].count++;

          if (list[list_index].limit <= list[list_index].count) {
            list[list_index].show = false;
          }
        }
      };

      for (var index in this.tp_accounts) {
        _loop(index);
      }

      return list;
    },
    tp_accounts_add_list_final: function tp_accounts_add_list_final() {
      var list = [];

      for (var index in this.tp_accounts_add_list_with_stats) {
        if (this.tp_accounts_add_list_with_stats[index].show) list.push(this.tp_accounts_add_list_with_stats[index]);
      }

      return list;
    },
    enable_add_new_tp_account: function enable_add_new_tp_account() {
      var is_enable = this.tp_accounts_add_list_final.length > 0;
      return is_enable;
    }
  },
  methods: {
    add_tp_account: function add_tp_account(provider) {
      if (provider === "zoom_meeting" || provider === "gotomeeting_meeting") {
        window.location = "admin.php?page=wpcal_admin&wpcal_action=add_tp_account&provider=" + provider;
      }
    },
    load_page: function load_page() {
      var _this2 = this;

      var action = "get_tp_accounts_of_current_admin";
      var wpcal_request = {};
      wpcal_request[action] = {
        dummy__: ""
      };
      var post_data = {
        action: "wpcal_process_admin_ajax_request",
        wpcal_request: wpcal_request
      };
      axios_default.a.post(window.wpcal_ajax.ajax_url, post_data).then(function (response) {
        Object.assign(_this2.$data, _this2.$options.data.apply(_this2)); //re-initilize data in Vue - this required as we are using this function to after update
        //console.log(response);

        if (response.data && response.data[action].hasOwnProperty("tp_accounts")) {
          _this2.tp_accounts = response.data[action].tp_accounts;
        }

        _this2.handle_connect_result();

        _this2.check_auth_for_tp_accounts();
      }).catch(function (error) {
        console.log(error);
      });
    },
    handle_connect_result: function handle_connect_result() {
      var _this3 = this;

      if (!this.connect_status || !this.connected_tp_account_id) {
        return;
      }

      if (this.connect_status_notified) {
        return;
      }

      if (this.connect_status === "connected" && this.tp_accounts.length) {
        for (var index in this.tp_accounts) {
          if (this.tp_accounts[index].id != this.connected_tp_account_id) {
            continue;
          }

          var success_msg = this.Tsprintf(
          /* translators: 1: html-tag-open 2: html-tag-close 3: tp provider 4: account email */
          this.T__("Your %1$s %3$s %2$s account %1$s %4$s %2$s is succesfully connected."), "<strong>", "</strong>", this.$options.filters.tp_provider_name(this.tp_accounts[index].provider), this.tp_accounts[index].tp_account_email);
          var success_title = "Ok";
          this.$toast.success(success_msg, success_title, {}); //show a popup message

          this.$modal.show("dialog", {
            title: this.T__("Alert!"),
            text: this.Tsprintf(
            /* translators: 1: html-tag-open 2: html-tag-close */
            this.T__("To use a web conferencing app for your bookings, you should edit your existing %1$s event types %2$s or create a new one and add the connected app as a location."), '<a href="#/event-types" style="font-size:14px;">', "</a>"),
            buttons: [{
              title: "Ok",
              default: true,
              // Will be triggered by default if 'Enter' pressed.
              handler: function handler() {
                _this3.$modal.hide("dialog");
              }
            }]
          }); //resetting to avoid duplicate notifications

          this.connect_status_notified = true;
          break;
        }
      }
    },
    show_disconnect_confirmation: function show_disconnect_confirmation(tp_account) {
      var _this4 = this;

      var force = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;
      var dialog_text;
      var yes_button_title;

      if (force) {
        dialog_text = this.Tsprintf(
        /* translators: 1: html-tag 2: html-tag-open 3: html-tag-close 4: tp provider 5: account email */
        this.T__("Oops! Error while disconnecting the account. %1$s Do want to %2$sforce-disconnect%3$s the %1$s %2$s %4$s - %5$s %3$s account?"), "<br>", "<strong>", "</strong>", this.$options.filters.tp_provider_name(tp_account.provider), tp_account.tp_account_email); //"Oops! Error while disconnecting the account. <br>Do want to <strong>force-disconnect</strong> the <br>";

        yes_button_title = this.T__("Yes, force-disconnect it.");
      } else {
        dialog_text = this.Tsprintf(
        /* translators: 1: html-tag 2: html-tag-open 3: html-tag-close 4: tp provider name 5: account email */
        this.T__("Are you sure you want to disconnect the %1$s %2$s %4$s - %5$s %3$s account?"), "<br>", "<strong>", "</strong>", this.$options.filters.tp_provider_name(tp_account.provider), tp_account.tp_account_email);
        yes_button_title = this.T__("Yes, disconnect it.");
      }

      this.$modal.show("dialog", {
        title: this.T__("Alert!"),
        text: dialog_text,
        buttons: [{
          title: yes_button_title,
          handler: function handler() {
            _this4.disconnect_tp_account_by_id(tp_account, force);

            _this4.$modal.hide("dialog");
          }
        }, {
          title: this.T__("No, Cancel."),
          default: true // Will be triggered by default if 'Enter' pressed.

        }]
      });
    },
    disconnect_tp_account_by_id: function disconnect_tp_account_by_id(tp_account) {
      var _this5 = this;

      var force = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;
      var action = "disconnect_tp_account_by_id_for_current_admin";
      var wpcal_request = {};
      wpcal_request[action] = {
        tp_account_id: tp_account.id,
        provider: tp_account.provider,
        force: force === true ? "force_remove" : ""
      };
      var action_get_tp_accounts = "get_tp_accounts_of_current_admin";
      wpcal_request[action_get_tp_accounts] = "dummy__";
      var post_data = {
        action: "wpcal_process_admin_ajax_request",
        wpcal_request: wpcal_request
      };
      axios_default.a.post(window.wpcal_ajax.ajax_url, post_data).then(function (response) {
        //console.log(response);
        _this5.notify_single_action_result(response.data[action], {
          success_msg: _this5.T__("Account is disconnected successfully.")
        });

        if (!force && response.data[action] && response.data[action].hasOwnProperty("status") && response.data[action].status == "error") {
          setTimeout(function () {
            _this5.show_disconnect_confirmation(tp_account, true);
          }, 1000);
        }

        if (response.data && response.data[action_get_tp_accounts].hasOwnProperty("tp_accounts")) {
          _this5.tp_accounts = response.data[action_get_tp_accounts].tp_accounts;
        }
      }).catch(function (error) {
        console.log(error);
      });
    },
    check_auth_for_tp_accounts: function check_auth_for_tp_accounts() {
      var _this6 = this;

      var wpcal_request = {};
      var action_check_auth = "check_auth_if_fails_remove_tp_accounts_for_current_admin";
      wpcal_request[action_check_auth] = "dummy__";
      var action_get_tp_accounts = "get_tp_accounts_of_current_admin";
      wpcal_request[action_get_tp_accounts] = "dummy__";
      var post_data = {
        action: "wpcal_process_admin_ajax_request",
        wpcal_request: wpcal_request
      };
      axios_default.a.post(window.wpcal_ajax.ajax_url, post_data, {
        params: {
          _remove_options_before_call: {
            background_call: true
          }
        }
      }).then(function (response) {
        //console.log(response);
        if (response.data[action_check_auth] && response.data[action_check_auth].hasOwnProperty("status") && response.data[action_check_auth].status == "error") {
          _this6.notify_single_action_result(response.data[action_check_auth], {
            success_msg: "Account checked successfully.",
            timeout: false
          });
        }

        if (response.data && response.data[action_get_tp_accounts].hasOwnProperty("tp_accounts")) {
          _this6.tp_accounts = response.data[action_get_tp_accounts].tp_accounts;
        }
      }).catch(function (error) {
        console.log(error);
      });
    },
    show_googlemeet_meeting_know_more_dialog: function show_googlemeet_meeting_know_more_dialog() {
      this.$modal.show("dialog", {
        title: this.T__("Alert!"),
        text: "Google Hangout/Meet will work only with Google Calendar.<br> ",
        buttons: [{
          title: this.T__("Ok"),
          default: true // Will be triggered by default if 'Enter' pressed.

        }]
      });
    } // sync_all_tp_api() {
    //   //current admin only
    //   //postpone manage_background_task
    //   this.$store.dispatch("manage_background_task", {
    //     initial_time_out: 30000 //30 secs
    //   });
    //   let action = "sync_all_tp_api_for_current_admin";
    //   let wpcal_request = {};
    //   wpcal_request[action] = "dummy__";
    //   let post_data = {
    //     action: "wpcal_process_admin_ajax_request",
    //     wpcal_request: wpcal_request
    //   };
    //   axios
    //     .post(window.wpcal_ajax.ajax_url, post_data, {
    //       params: { _remove_options_before_call: { background_call: true } }
    //     })
    //     .then(response => {
    //       this.load_page();
    //     })
    //     .catch(error => {
    //       console.log(error);
    //     });
    // }

  },
  mounted: function mounted() {
    this.load_page(); // setTimeout(() => {
    //   this.sync_all_tp_api(); //Improve later - might create freq calls - should be rare admins visiting this page
    // }, 1000);
  }
});
// CONCATENATED MODULE: ./src/views/admin/SettingIntegrations.vue?vue&type=script&lang=js&
 /* harmony default export */ var admin_SettingIntegrationsvue_type_script_lang_js_ = (SettingIntegrationsvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/views/admin/SettingIntegrations.vue?vue&type=style&index=1&lang=css&
var SettingIntegrationsvue_type_style_index_1_lang_css_ = __webpack_require__("7f09");

// CONCATENATED MODULE: ./src/views/admin/SettingIntegrations.vue







/* normalize component */

var SettingIntegrations_component = Object(componentNormalizer["a" /* default */])(
  admin_SettingIntegrationsvue_type_script_lang_js_,
  SettingIntegrationsvue_type_template_id_1355211b_render,
  SettingIntegrationsvue_type_template_id_1355211b_staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* harmony default export */ var SettingIntegrations = (SettingIntegrations_component.exports);
// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js?{"cacheDirectory":"node_modules/.cache/vue-loader","cacheIdentifier":"23115053-vue-loader-template"}!./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/views/admin/SettingAdmins.vue?vue&type=template&id=94c92af6&scoped=true&
var SettingAdminsvue_type_template_id_94c92af6_scoped_true_render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',[_c('div',[_c('div',{staticClass:"page-title-cont"},[_c('h1',{staticClass:"wp-heading-inline"},[_vm._v("WPCal.io - "+_vm._s(_vm.T__("Settings")))]),_c('AdminHeaderRight')],1),_c('SettingsMenu'),_c('div',{staticClass:"col-cont settings-cont"},[_c('div',{staticClass:"col"},[_c('div',{staticStyle:{"font-size":"16px","padding":"5px 0","display":"flex"}},[_vm._v(" "+_vm._s(_vm.T__("Admin WPCal Usage"))+" "),_c('PremiumInfoBadge',{staticStyle:{"margin":"-4px 0px 0px 10px"}},[_c('em',[_vm._v("Free: 1 admin user"),_c('br'),_vm._v("Plus: 5 admin users"),_c('br'),_vm._v("Pro: 10 admin users")])])],1),_c('table',{staticClass:"mbox settingAdmins"},[_c('tr',[_c('td',[_vm._v(_vm._s(_vm.T__("Name")))]),_c('td',[_vm._v(_vm._s(_vm.T__("Total Event Types")))]),_c('td',[_vm._v(_vm._s(_vm.T__("Active Event Types")))])]),_vm._l((_vm.admin_users_details),function(admin_detail,index){return _c('tr',{key:index},[_c('td',[_c('a',{attrs:{"href":'user-edit.php?user_id=' + admin_detail.admin_user_id}},[_vm._v(_vm._s(admin_detail.name))])]),_c('td',[_vm._v(_vm._s(admin_detail.services_count))]),_c('td',[_vm._v(_vm._s(admin_detail.services_active_count))])])})],2),_c('AdminInfoLine',{attrs:{"info_slug":"setup_other_admins"}})],1)])],1)])}
var SettingAdminsvue_type_template_id_94c92af6_scoped_true_staticRenderFns = []


// CONCATENATED MODULE: ./src/views/admin/SettingAdmins.vue?vue&type=template&id=94c92af6&scoped=true&

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js??ref--12-0!./node_modules/thread-loader/dist/cjs.js!./node_modules/babel-loader/lib!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/views/admin/SettingAdmins.vue?vue&type=script&lang=js&
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ var SettingAdminsvue_type_script_lang_js_ = ({
  components: {
    SettingsMenu: SettingsMenu
  },
  data: function data() {
    return {
      document_title: "Admins ‹ Settings",
      admin_users_details: []
    };
  },
  methods: {
    load_page: function load_page() {
      var _this = this;

      var wpcal_request = {};
      var action = "get_wpcal_admin_users_details";
      wpcal_request[action] = "dummy__";
      var post_data = {
        action: "wpcal_process_admin_ajax_request",
        wpcal_request: wpcal_request
      };
      axios_default.a.post(window.wpcal_ajax.ajax_url, post_data).then(function (response) {
        //console.log(response);
        if (response.data && response.data[action].hasOwnProperty("admin_users_details")) {
          _this.admin_users_details = response.data[action].admin_users_details;
        }
      }).catch(function (error) {
        console.log(error);
      });
    }
  },
  mounted: function mounted() {
    this.load_page();
  }
});
// CONCATENATED MODULE: ./src/views/admin/SettingAdmins.vue?vue&type=script&lang=js&
 /* harmony default export */ var admin_SettingAdminsvue_type_script_lang_js_ = (SettingAdminsvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/views/admin/SettingAdmins.vue?vue&type=style&index=0&id=94c92af6&scoped=true&lang=css&
var SettingAdminsvue_type_style_index_0_id_94c92af6_scoped_true_lang_css_ = __webpack_require__("e791");

// CONCATENATED MODULE: ./src/views/admin/SettingAdmins.vue






/* normalize component */

var SettingAdmins_component = Object(componentNormalizer["a" /* default */])(
  admin_SettingAdminsvue_type_script_lang_js_,
  SettingAdminsvue_type_template_id_94c92af6_scoped_true_render,
  SettingAdminsvue_type_template_id_94c92af6_scoped_true_staticRenderFns,
  false,
  null,
  "94c92af6",
  null
  
)

/* harmony default export */ var SettingAdmins = (SettingAdmins_component.exports);
// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js?{"cacheDirectory":"node_modules/.cache/vue-loader","cacheIdentifier":"23115053-vue-loader-template"}!./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/views/admin/SettingAccount.vue?vue&type=template&id=4dbe65dc&
var SettingAccountvue_type_template_id_4dbe65dc_render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',[_c('div',[_c('div',{staticClass:"page-title-cont"},[_c('h1',{staticClass:"wp-heading-inline"},[_vm._v("WPCal.io - "+_vm._s(_vm.T__("Settings")))]),_c('AdminHeaderRight')],1),_c('SettingsMenu'),_c('div',{staticClass:"col-cont settings-cont"},[_c('div',{staticClass:"col"},[_c('div',{staticStyle:{"font-size":"16px","padding":"5px 0px"}},[_vm._v(" "+_vm._s(_vm.T__("Your Plan"))+" ")]),(_vm.license_info.email)?_c('div',{staticClass:"mbox"},[_c('table',[_c('tr',[_c('td',{staticStyle:{"text-align":"right"}},[_vm._v(_vm._s(_vm.T__("Email:")))]),_c('td',[_vm._v(" "+_vm._s(_vm.license_info.email)+" ("),_c('a',{on:{"click":_vm.show_change_email_confirmation}},[_vm._v(_vm._s(_vm.T__("change")))]),_vm._v(") ")])]),(_vm.license_info.plan_name)?_c('tr',[_c('td',{staticStyle:{"text-align":"right"}},[_vm._v(_vm._s(_vm.T__("Plan:")))]),_c('td',[_vm._v(" "+_vm._s(_vm.license_info.plan_name)+" ")])]):_vm._e()])]):_vm._e()])])],1),_c('v-dialog')],1)}
var SettingAccountvue_type_template_id_4dbe65dc_staticRenderFns = []


// CONCATENATED MODULE: ./src/views/admin/SettingAccount.vue?vue&type=template&id=4dbe65dc&

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js??ref--12-0!./node_modules/thread-loader/dist/cjs.js!./node_modules/babel-loader/lib!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/views/admin/SettingAccount.vue?vue&type=script&lang=js&
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ var SettingAccountvue_type_script_lang_js_ = ({
  components: {
    SettingsMenu: SettingsMenu
  },
  data: function data() {
    return {
      document_title: "Account ‹ Settings"
    };
  },
  computed: {
    license_info: function license_info() {
      return this.$store.getters.get_license_info;
    }
  },
  methods: {
    show_change_email_confirmation: function show_change_email_confirmation() {
      var _this = this;

      var dialog_text = this.T__("This email is used only for licensing purposes") + ' - <ul style="list-style-type: disc;padding: revert;"><li>' + this.T__("Plugin activation and license validation") + "</li><li>" + this.T__("License expiry and renewal alerts") + "</li><li>" + this.T__("Plugin-related support and communication") + "</li></ul>";
      dialog_text += this.Tsprintf(
      /* translators: 1: html-tag-open 2: html-tag-close */
      this.T__("Are you looking to change the new/reschedule/ cancellation booking notification email? %1$s Click here %2$s."), '<a href="https://help.wpcal.io/en/article/how-to-change-booking-notification-email-address-d2k93j/" target="_blank">', "</a>");
      dialog_text += "<br><br><strong>" + this.T__("Are you sure you want to change the account license email?") + "</strong>";
      this.$modal.show("dialog", {
        title: this.T__("Alert!"),
        text: dialog_text,
        buttons: [{
          title: this.T__("Yes"),
          handler: function handler() {
            _this.$router.push("/settings/account/login");

            _this.$modal.hide("dialog");
          }
        }, {
          title: this.T__("No, Cancel."),
          default: true // Will be triggered by default if 'Enter' pressed.

        }]
      });
    }
  }
});
// CONCATENATED MODULE: ./src/views/admin/SettingAccount.vue?vue&type=script&lang=js&
 /* harmony default export */ var admin_SettingAccountvue_type_script_lang_js_ = (SettingAccountvue_type_script_lang_js_); 
// CONCATENATED MODULE: ./src/views/admin/SettingAccount.vue





/* normalize component */

var SettingAccount_component = Object(componentNormalizer["a" /* default */])(
  admin_SettingAccountvue_type_script_lang_js_,
  SettingAccountvue_type_template_id_4dbe65dc_render,
  SettingAccountvue_type_template_id_4dbe65dc_staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* harmony default export */ var SettingAccount = (SettingAccount_component.exports);
// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js?{"cacheDirectory":"node_modules/.cache/vue-loader","cacheIdentifier":"23115053-vue-loader-template"}!./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/components/admin/SettingAccountSignupLogin.vue?vue&type=template&id=429e40b8&scoped=true&
var SettingAccountSignupLoginvue_type_template_id_429e40b8_scoped_true_render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',[_c('div',[(!_vm.first_time_logged_in)?_c('div',[_c('div',{staticClass:"page-title-cont"},[_c('h1',{staticClass:"wp-heading-inline"},[_vm._v("WPCal.io - "+_vm._s(_vm.T__("Settings")))]),_c('AdminHeaderRight')],1),_c('SettingsMenu')],1):_c('div',[_c('div',{staticClass:"page-title-cont"},[_c('AdminHeaderRight')],1)]),_c('div',{staticClass:"col-cont"},[_c('div',{staticClass:"col",staticStyle:{"margin":"100px auto 0"}},[(_vm.show_form == 'login')?_c('div',[_c('div',{staticStyle:{"font-size":"20px","text-align":"center","padding":"20px"}},[_vm._v(" "+_vm._s(_vm.T__("Login to your WPCal.io account"))+" ")]),_c('div',{staticClass:"validation_errors_cont"}),_c('div',{staticClass:"form"},[(_vm.form_signup_success)?_c('div',{staticStyle:{"border":"1px dashed #81e846","padding":"10px","border-radius":"5px","background-color":"rgba(129, 232, 70, 0.2)","margin-bottom":"10px"},domProps:{"innerHTML":_vm._s(
                _vm.Tsprintf(
                  /* translators: 1: html-tag-open 2: html-tag-close */
                  _vm.T__(
                    'Your account has been created successfully. Please login now using the %1$spassword sent to your email%2$s.'
                  ),
                  '<span style="text-decoration:underline;">',
                  '</span>'
                )
              )}}):_vm._e(),_c('form-row',{attrs:{"validator":_vm.$v.form_login.email}},[_c('label',{staticStyle:{"text-transform":"uppercase","font-size":"12px"},attrs:{"for":"form_login_email"}},[_vm._v(_vm._s(_vm.T__("Email address")))]),_c('input',{directives:[{name:"model",rawName:"v-model",value:(_vm.form_login.email),expression:"form_login.email"}],attrs:{"id":"form_login_email","type":"text","name":"email","tabindex":"1"},domProps:{"value":(_vm.form_login.email)},on:{"blur":function($event){return _vm.$v.form_login.email.$touch()},"input":function($event){if($event.target.composing){ return; }_vm.$set(_vm.form_login, "email", $event.target.value)}}})]),_c('form-row',{attrs:{"validator":_vm.$v.form_login.password}},[_c('label',{staticStyle:{"text-transform":"uppercase","font-size":"12px"},attrs:{"for":"form_login_password"}},[_vm._v(" "+_vm._s(_vm.T__("Password"))+" "),_c('em',{staticStyle:{"margin-top":"0"}},[_c('a',{staticStyle:{"text-transform":"capitalize"},attrs:{"href":_vm.$store.getters.get_wpcal_site_urls.lost_pass_url,"target":"_blank"}},[_vm._v(_vm._s(_vm.T__("Forgot password?")))])])]),_c('input',{directives:[{name:"model",rawName:"v-model",value:(_vm.form_login.password),expression:"form_login.password"}],attrs:{"id":"form_login_password","type":"password","tabindex":"2"},domProps:{"value":(_vm.form_login.password)},on:{"blur":function($event){return _vm.$v.form_login.password.$touch()},"input":function($event){if($event.target.composing){ return; }_vm.$set(_vm.form_login, "password", $event.target.value)}}})]),_c('div',{staticClass:"form-row"},[_c('button',{staticClass:"wpc-btn primary lg",attrs:{"type":"button","tabindex":"3","disabled":!_vm.login_btn_is_enabled},on:{"click":function($event){_vm.form_login_submit();
                  _vm.form_signup_success = false;}}},[_vm._v(" "+_vm._s(_vm.login_btn_txt)+" ")])])],1),_c('div',{staticClass:"form-row",staticStyle:{"text-align":"center","font-size":"14px"}},[_vm._v(" "+_vm._s(_vm.T__("Don't have an account yet?"))+" "),_c('a',{staticStyle:{"font-size":"14px"},on:{"click":_vm.show_signup_form}},[_vm._v(_vm._s(_vm.T__("Create your account now")))]),_vm._v(". ")])]):_vm._e(),(_vm.show_form == 'signup')?_c('div',[_c('div',{staticStyle:{"font-size":"20px","text-align":"center","padding":"20px"}},[_vm._v(" "+_vm._s(_vm.T__("Create your WPCal.io account"))+" ")]),_c('div',{staticStyle:{"background-color":"#E4E9F5","border":"1px dashed #567bf3","padding":"10px 10px 0px 10px","border-radius":"5px","margin-bottom":"20px"}},[_vm._v(" "+_vm._s(_vm.T__("You need to create an account for -"))+" "),_c('br'),_c('ul',[_c('li',{staticStyle:{"list-style":"disc","margin-left":"20px"}},[_vm._v(" "+_vm._s(_vm.T_x( "timely notification emails to you and your invitees.", "You need to create an account for" ))+" ")]),_c('li',{staticStyle:{"list-style":"disc","margin-left":"20px"}},[_vm._v(" "+_vm._s(_vm.T_x( "1-click connect to apps like Zoom, Google Meet etc.", "You need to create an account for" ))+" ")]),_c('li',{staticStyle:{"list-style":"disc","margin-left":"20px","margin-bottom":"0"}},[_vm._v(" "+_vm._s(_vm.T_x( "syncing calendar event changes to handle conflicts.", "You need to create an account for" ))+" ")])])]),_c('div',{staticClass:"validation_errors_cont"}),_c('div',{staticClass:"form"},[_c('form-row',{attrs:{"validator":_vm.$v.form_signup.email}},[_c('label',{staticStyle:{"text-transform":"uppercase","font-size":"12px","font-family":"'RubikMed'"},attrs:{"for":"form_singup_email"}},[_vm._v(_vm._s(_vm.T__("Enter your work email")))]),_c('div',{staticStyle:{"margin-bottom":"5px"}},[_vm._v(" "+_vm._s(_vm.T__( " This email will be used only for licensing purposes. For bookings, your WP admin user email will be used." ))+" ")]),_c('input',{directives:[{name:"model",rawName:"v-model",value:(_vm.form_signup.email),expression:"form_signup.email"}],attrs:{"id":"form_singup_email","type":"text","name":"email"},domProps:{"value":(_vm.form_signup.email)},on:{"blur":function($event){return _vm.$v.form_signup.email.$touch()},"focus":function($event){_vm.signup_password_note_shown_once = true},"input":function($event){if($event.target.composing){ return; }_vm.$set(_vm.form_signup, "email", $event.target.value)}}}),_c('span',{directives:[{name:"show",rawName:"v-show",value:(_vm.show_signup_password_note),expression:"show_signup_password_note"}],staticStyle:{"font-size":"12px","font-style":"italic","padding":"5px","background-color":"#fff200","display":"inline-block","margin-top":"5px"}},[_vm._v(_vm._s(_vm.T__( "A secure password will be sent to this email for you to login in the next step." )))])]),_c('div',{staticStyle:{"padding-bottom":"10px","text-align":"center","font-size":"11px"},domProps:{"innerHTML":_vm._s(
                _vm.Tsprintf(
                  /* translators: 1: html-tag-open 2: html-tag-close */
                  _vm.T__(
                    'By clicking on the Create my Account now button below, you agree that you have read and accept the %1$sTerms of Use%2$s'
                  ),
                  '<a style="font-size: 11px;" href="https://wpcal.io/terms-of-use/" target="_blank">',
                  '</a>.'
                )
              )}}),_c('div',{staticClass:"form-row"},[_c('button',{staticClass:"wpc-btn primary lg",attrs:{"type":"button","disabled":!_vm.signup_btn_is_enabled},on:{"click":_vm.form_signup_submit}},[_vm._v(" "+_vm._s(_vm.signup_btn_txt)+" ")])]),_c('div',{staticClass:"form-row",staticStyle:{"text-align":"center","font-size":"14px"}},[_vm._v(" "+_vm._s(_vm.T__("Already have an account?"))+" "),_c('a',{staticStyle:{"font-size":"14px"},on:{"click":function($event){return _vm.show_login_form(false)}}},[_vm._v(_vm._s(_vm.T__("Login now")))]),_vm._v(". ")])],1)]):_vm._e()])])]),_c('modal',{staticStyle:{"z-index":"9999"},attrs:{"name":"stronger_together_plan_modal","width":'700px',"height":"auto","scrollable":true,"adaptive":true},on:{"before-close":_vm.stronger_together_plan_modal_before_close}},[_c('div',{staticClass:"covid-consent-cont"},[_c('PricingStrongerTogether'),_c('div',{staticClass:"consent-action"},[_c('div',{staticStyle:{"font-weight":"500"}},[_vm._v("COVID-19 CONSENT")]),_c('label',{staticClass:"consent-agreement"},[_c('input',{directives:[{name:"model",rawName:"v-model",value:(_vm.stronger_together_plan_details.consent),expression:"stronger_together_plan_details.consent"}],attrs:{"type":"checkbox"},domProps:{"checked":Array.isArray(_vm.stronger_together_plan_details.consent)?_vm._i(_vm.stronger_together_plan_details.consent,null)>-1:(_vm.stronger_together_plan_details.consent)},on:{"change":function($event){var $$a=_vm.stronger_together_plan_details.consent,$$el=$event.target,$$c=$$el.checked?(true):(false);if(Array.isArray($$a)){var $$v=null,$$i=_vm._i($$a,$$v);if($$el.checked){$$i<0&&(_vm.$set(_vm.stronger_together_plan_details, "consent", $$a.concat([$$v])))}else{$$i>-1&&(_vm.$set(_vm.stronger_together_plan_details, "consent", $$a.slice(0,$$i).concat($$a.slice($$i+1))))}}else{_vm.$set(_vm.stronger_together_plan_details, "consent", $$c)}}}}),_vm._v("I understand that the "),_c('strong',[_vm._v("Stronger, Together!")]),_vm._v(" plan will be available only during the COVID-19 crisis after which I can either continue using the free features or need to subscribe to a paid plan to continue using premium features. ")]),_c('div',{staticStyle:{"text-align":"center"}},[_vm._v(" We’ll email you at "),_c('strong',[_vm._v(_vm._s(_vm.$store.getters.get_license_info.email))]),_vm._v(", 30 days in advance before "),_c('br'),_vm._v("removing the "),_c('strong',[_vm._v("Stronger, Together!")]),_vm._v(" plan. ")])]),_c('div',{staticStyle:{"text-align":"right","margin-top":"30px"}},[_c('button',{attrs:{"disabled":!_vm.stronger_together_plan_details.consent},on:{"click":_vm.handle_stronger_together_plan_modal_button}},[_vm._v(" I understand, Continue → ")])])],1)]),_c('a',{staticStyle:{"display":"none"},on:{"click":_vm.show_stronger_together_plan_modal}},[_vm._v("___ Lorem Ipsum (Show Stronger, Together!)")])],1)}
var SettingAccountSignupLoginvue_type_template_id_429e40b8_scoped_true_staticRenderFns = []


// CONCATENATED MODULE: ./src/components/admin/SettingAccountSignupLogin.vue?vue&type=template&id=429e40b8&scoped=true&

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js??ref--12-0!./node_modules/thread-loader/dist/cjs.js!./node_modules/babel-loader/lib!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/components/admin/SettingAccountSignupLogin.vue?vue&type=script&lang=js&
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//




/* harmony default export */ var SettingAccountSignupLoginvue_type_script_lang_js_ = ({
  components: {
    SettingsMenu: SettingsMenu,
    PricingStrongerTogether: PricingStrongerTogether
  },
  data: function data() {
    return {
      form_login: {
        email: "",
        password: ""
      },
      form_signup: {
        email: ""
      },
      show_form: "login",
      form_signup_success: false,
      stronger_together_plan_details: {
        consent: false,
        i_understand_clicked: false
      },
      first_time_logged_in: false,
      login_btn_is_enabled: true,
      signup_btn_is_enabled: true,
      signup_password_note_shown_once: false
    };
  },
  validations: {
    form_login: {
      email: {
        required: validators["required"],
        email: validators["email"]
      },
      password: {
        required: validators["required"]
      }
    },
    form_signup: {
      email: {
        required: validators["required"],
        email: validators["email"]
      }
    }
  },
  computed: {
    login_btn_txt: function login_btn_txt() {
      return this.login_btn_is_enabled ? this.T__("Login to my account") : this.T__("Logging you in...");
    },
    //
    signup_btn_txt: function signup_btn_txt() {
      return this.signup_btn_is_enabled ? this.T__("Create my Account now") : this.T__("Creating your account...");
    },
    show_signup_password_note: function show_signup_password_note() {
      if (this.signup_password_note_shown_once) {
        return true;
      }

      var is_show = this.form_signup.email.length > 0;
      return is_show;
    }
  },
  methods: {
    form_login_submit: function form_login_submit() {
      var _this = this;

      this.clear_validation_errors_cont();
      this.$v.form_login.$touch();

      if (this.$v.form_login.$anyError) {
        this.scroll_to_first_validation_error();
        return false;
      }

      this.login_btn_is_enabled = false;
      var wpcal_request = {};
      var action_auth_login = "license_auth_login";
      wpcal_request[action_auth_login] = this.form_login;
      var action_license_status = "license_status";
      wpcal_request[action_license_status] = "dummy__";
      var post_data = {
        action: "wpcal_process_admin_ajax_request",
        wpcal_request: wpcal_request
      };
      axios_default.a.post(window.wpcal_ajax.ajax_url, post_data).then(function (response) {
        _this.notify_single_action_result(response.data[action_auth_login], {
          success_msg: "Successfully logged in."
        });

        if (response.data[action_auth_login].status == "success" && response.data[action_license_status].status == "success") {
          if (_this.first_time_logged_in === true) {
            _this.show_stronger_together_plan_modal();
          } else {
            _this.$router.push("/settings/account");
          }

          _this.$store.commit("set_license_info", response.data[action_license_status].license_info);
        }
      }).catch(function (error) {
        console.log(error);
      }).then(function () {
        _this.login_btn_is_enabled = true;
      });
    },
    form_signup_submit: function form_signup_submit() {
      var _this2 = this;

      this.clear_validation_errors_cont();
      this.$v.form_signup.$touch();

      if (this.$v.form_signup.$anyError) {
        this.scroll_to_first_validation_error();
        return false;
      }

      this.signup_btn_is_enabled = false;
      var wpcal_request = {};
      var action_signup = "license_signup";
      wpcal_request[action_signup] = this.form_signup;
      var post_data = {
        action: "wpcal_process_admin_ajax_request",
        wpcal_request: wpcal_request
      };
      axios_default.a.post(window.wpcal_ajax.ajax_url, post_data).then(function (response) {
        if (response.data[action_signup].hasOwnProperty("status") && response.data[action_signup].status === "error") {
          _this2.notify_single_action_result(response.data[action_signup], {
            success_msg: _this2.T__("Settings saved.")
          });
        }

        if (response.data[action_signup].hasOwnProperty("status") && response.data[action_signup].status === "success") {
          _this2.form_login.email = _this2.form_signup.email;

          _this2.show_login_form(true);
        }
      }).catch(function (error) {
        console.log(error);
      }).then(function () {
        _this2.signup_btn_is_enabled = true;
      });
    },
    show_stronger_together_plan_modal: function show_stronger_together_plan_modal() {
      this.$modal.show("stronger_together_plan_modal");
    },
    handle_stronger_together_plan_modal_button: function handle_stronger_together_plan_modal_button() {
      this.stronger_together_plan_details.i_understand_clicked = true;
      this.$modal.hide("stronger_together_plan_modal");
      this.$router.push("/event-types");
    },
    stronger_together_plan_modal_before_close: function stronger_together_plan_modal_before_close(event) {
      if (!this.stronger_together_plan_details.i_understand_clicked || !this.stronger_together_plan_details.consent) {
        event.stop();
      }
    },
    check_and_set_first_time_logged_in: function check_and_set_first_time_logged_in() {
      if (this.$store.getters.get_license_info === null) {
        //propably not data not loaded
        return;
      }

      if (this._isEmpty(this.$store.getters.get_license_info)) {
        //initial setup not done, ask admin for login
        this.first_time_logged_in = true;
        this.show_signup_form();
        return;
      }
    },
    show_login_form: function show_login_form() {
      var form_signup_success = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : false;
      this.$v.form_login.$reset();
      this.show_form = "login";
      this.form_signup_success = form_signup_success;
    },
    show_signup_form: function show_signup_form() {
      this.$v.form_signup.$reset();
      this.signup_password_note_shown_once = false;
      this.show_form = "signup";
      this.form_signup_success = false;
    }
  },
  watch: {
    show_signup_password_note: function show_signup_password_note(is_show) {
      if (is_show) {
        this.signup_password_note_shown_once = true;
      }
    }
  },
  mounted: function mounted() {
    this.check_and_set_first_time_logged_in();

    if (this.form_login.email == "") {
      this.form_login.email = this.$store.getters.get_license_info.email ? this.$store.getters.get_license_info.email : this.$store.getters.get_current_admin_details.email;
    }

    if (this.form_signup.email == "") {
      this.form_signup.email = this.$store.getters.get_license_info.email ? this.$store.getters.get_license_info.email : this.$store.getters.get_current_admin_details.email;
    }
  },
  beforeRouteLeave: function beforeRouteLeave(to, from, next) {
    if (this.$store.getters.get_license_info === null) {
      //propably not data not loaded
      next();
      return;
    }

    if (this._isEmpty(this.$store.getters.get_license_info)) {
      //initial setup not done, ask admin for login
      //router.app.$router.push("/settings/account/login");
      next(false);
      return;
    }

    next();
  }
});
// CONCATENATED MODULE: ./src/components/admin/SettingAccountSignupLogin.vue?vue&type=script&lang=js&
 /* harmony default export */ var admin_SettingAccountSignupLoginvue_type_script_lang_js_ = (SettingAccountSignupLoginvue_type_script_lang_js_); 
// EXTERNAL MODULE: ./src/components/admin/SettingAccountSignupLogin.vue?vue&type=style&index=0&id=429e40b8&scoped=true&lang=css&
var SettingAccountSignupLoginvue_type_style_index_0_id_429e40b8_scoped_true_lang_css_ = __webpack_require__("7178");

// CONCATENATED MODULE: ./src/components/admin/SettingAccountSignupLogin.vue






/* normalize component */

var SettingAccountSignupLogin_component = Object(componentNormalizer["a" /* default */])(
  admin_SettingAccountSignupLoginvue_type_script_lang_js_,
  SettingAccountSignupLoginvue_type_template_id_429e40b8_scoped_true_render,
  SettingAccountSignupLoginvue_type_template_id_429e40b8_scoped_true_staticRenderFns,
  false,
  null,
  "429e40b8",
  null
  
)

/* harmony default export */ var SettingAccountSignupLogin = (SettingAccountSignupLogin_component.exports);
// CONCATENATED MODULE: ./src/router/admin.js















vue_runtime_esm["default"].use(vue_router_esm["a" /* default */]);
var routes = [{
  path: "/",
  //name: "home",
  redirect: "/bookings"
}, // {
//   path: "/about",
//   name: "about",
//   // route level code-splitting
//   // this generates a separate chunk (about.[hash].js) for this route
//   // which is lazy-loaded when the route is visited.
//   component: () => import("../views/About.vue")
// },
{
  path: "/event-types",
  name: "service_list",
  component: ServiceList // component: () =>
  //   import(
  //     /* webpackChunkName: "admin-ServiceList" */ "../views/admin/ServiceList.vue"
  //   )

}, {
  path: "/event-type/add",
  name: "service_add",
  component: ServiceForm // component: () =>
  //   import(
  //     /* webpackChunkName: "admin-ServiceForm" */ "../views/admin/ServiceForm.vue"
  //   )

}, {
  path: "/event-type/edit/:service_id",
  name: "service_edit",
  component: ServiceForm // component: () =>
  //   import(
  //     /* webpackChunkName: "admin-ServiceForm" */ "../views/admin/ServiceForm.vue"
  //   )

}, {
  path: "/bookings",
  name: "booking_list",
  children: [{
    path: "/bookings/custom/:booking_id/",
    name: "booking_custom_by_id"
  }],
  component: ServiceBookings // component: () =>
  //   import(
  //     /* webpackChunkName: "admin-ServiceBookings" */ "../views/admin/ServiceBookings.vue"
  //   )

}, {
  path: "/settings",
  name: "setting_general",
  component: SettingGeneral // component: () =>
  //   import(
  //     /* webpackChunkName: "admin-Settings" */ "../views/admin/SettingGeneral.vue"
  //   )

}, {
  path: "/settings/profile",
  name: "setting_profile",
  component: SettingProfile // component: () =>
  //   import(
  //     /* webpackChunkName: "admin-Settings" */ "../views/admin/SettingProfile.vue"
  //   )

}, {
  path: "/settings/calendars",
  name: "setting_calendars",
  component: SettingCalendars,
  props: true,
  children: [{
    path: "/settings/calendars/connected/:calendar_account_id/",
    redirect: function redirect(to) {
      return {
        name: "setting_calendars",
        params: {
          connect_status: "connected",
          connected_calendar_account_id: to.params.calendar_account_id
        }
      };
    }
  }] // component: () =>
  //   import(
  //     /* webpackChunkName: "admin-Settings" */ "../views/admin/SettingCalendars.vue"
  //   )

}, {
  path: "/settings/integrations",
  name: "setting_integrations",
  component: SettingIntegrations,
  props: true,
  children: [{
    path: "/settings/integrations/connected/:tp_account_id/",
    redirect: function redirect(to) {
      return {
        name: "setting_integrations",
        params: {
          connect_status: "connected",
          connected_tp_account_id: to.params.tp_account_id
        }
      };
    }
  }] // component: () =>
  //   import(
  //     /* webpackChunkName: "admin-Settings" */ "../views/admin/SettingIntegrations.vue"
  //   )

}, {
  path: "/settings/admins",
  name: "setting_admins",
  component: SettingAdmins // component: () =>
  //   import(
  //     /* webpackChunkName: "admin-Settings" */ "../views/admin/SettingAdmins.vue"
  //   )

}, {
  path: "/settings/account",
  name: "setting_account",
  component: SettingAccount // component: () =>
  //   import(
  //     /* webpackChunkName: "admin-Settings" */ "../views/admin/SettingAccount.vue"
  //   )

}, {
  path: "/settings/account/login",
  name: "setting_account_login",
  component: SettingAccountSignupLogin // component: () =>
  //   import(
  //     /* webpackChunkName: "admin-Settings" */ "../components/admin/SettingAccountSignupLogin.vue"
  //   )

}];
var router = new vue_router_esm["a" /* default */]({
  //mode: "history",
  //base: process.env.BASE_URL,
  routes: routes
}); //loading indicator for lazy loading the components in admin end

router.beforeEach(function (to, from, next) {
  var client_end = "admin";
  document.getElementById("wpcal_" + client_end + "_app").classList.add("loading-indicator");
  next();
});
router.afterEach(function (to, from) {
  var update_document_title = function update_document_title() {
    setTimeout( /*#__PURE__*/Object(asyncToGenerator["a" /* default */])( /*#__PURE__*/regeneratorRuntime.mark(function _callee() {
      var _to$matched$, _instances$default;

      var instances, document_title;
      return regeneratorRuntime.wrap(function _callee$(_context) {
        while (1) {
          switch (_context.prev = _context.next) {
            case 0:
              _context.next = 2;
              return (_to$matched$ = to.matched[0]) === null || _to$matched$ === void 0 ? void 0 : _to$matched$.instances;

            case 2:
              instances = _context.sent;
              document_title = (instances === null || instances === void 0 ? void 0 : (_instances$default = instances.default) === null || _instances$default === void 0 ? void 0 : _instances$default.document_title_final) ? instances.default.document_title_final : "";
              admin.dispatch("set_document_title", document_title);

            case 5:
            case "end":
              return _context.stop();
          }
        }
      }, _callee);
    })), 50);
  };

  update_document_title();
  var client_end = "admin";
  document.getElementById("wpcal_" + client_end + "_app").classList.remove("loading-indicator");
});
/* harmony default export */ var router_admin = (router);
// EXTERNAL MODULE: ./src/utils/common_mixin.js + 5 modules
var common_mixin = __webpack_require__("399f");

// EXTERNAL MODULE: ./src/utils/filters.js
var filters = __webpack_require__("1619");

// EXTERNAL MODULE: ./src/utils/http.js
var http = __webpack_require__("751a");

// EXTERNAL MODULE: ./node_modules/vue-js-modal/dist/index.js
var dist = __webpack_require__("1881");
var dist_default = /*#__PURE__*/__webpack_require__.n(dist);

// EXTERNAL MODULE: ./node_modules/v-calendar/lib/components/date-picker.umd.js
var date_picker_umd = __webpack_require__("404b");
var date_picker_umd_default = /*#__PURE__*/__webpack_require__.n(date_picker_umd);

// EXTERNAL MODULE: ./node_modules/vuelidate/lib/index.js
var lib = __webpack_require__("1dce");
var lib_default = /*#__PURE__*/__webpack_require__.n(lib);

// EXTERNAL MODULE: ./node_modules/vuelidate-error-extractor/dist/vuelidate-error-extractor.esm.js + 2 modules
var vuelidate_error_extractor_esm = __webpack_require__("7f53");

// EXTERNAL MODULE: ./src/utils/vuelidate_error_extractor_options.js + 5 modules
var vuelidate_error_extractor_options = __webpack_require__("2242");

// EXTERNAL MODULE: ./node_modules/vue-izitoast/dist/vue-izitoast.js
var vue_izitoast = __webpack_require__("e399");
var vue_izitoast_default = /*#__PURE__*/__webpack_require__.n(vue_izitoast);

// EXTERNAL MODULE: ./node_modules/izitoast/dist/css/iziToast.css
var iziToast = __webpack_require__("2068");

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js?{"cacheDirectory":"node_modules/.cache/vue-loader","cacheIdentifier":"23115053-vue-loader-template"}!./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/components/admin/AdminInfoLine.vue?vue&type=template&id=3642bfde&
var AdminInfoLinevue_type_template_id_3642bfde_render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('ul',{staticClass:"info-lines"},_vm._l((_vm.info_slugs_final),function(slug,index){return _c('li',{key:index},[(slug == 'timings_in_timezone' && _vm.timezone)?_c('div',{domProps:{"innerHTML":_vm._s(
        _vm.Tsprintf(
          /* translators: 1: html-tag-open 2: html-tag-close 3: timezone */
          _vm.T__(
            'All timings in this page are in %1$s %3$s %2$s Time Zone as per Event Type settings.'
          ),
          '<span style="font-weight:500">',
          '</span>',
          _vm.timezone
        )
      )}}):(slug == 'setup_other_admins')?_c('div',{domProps:{"innerHTML":_vm._s(
        _vm.Tsprintf(
          /* translators: 1: html-tag-open 2: html-tag-close 3: timezone */
          _vm.T__(
            'Want to set up/view/edit other admins\' event types or bookings? %1$s Read this &nearr; %2$s.'
          ),
          '<a href="https://help.wpcal.io/en/article/how-to-editviewithsetup-other-admins-event-types-or-bookings-nj0zjk/" target="_blank" >',
          '</a>'
        )
      )}}):(_vm.get_info_by_slug(slug))?_c('div',[_vm._v(" "+_vm._s(_vm.get_info_by_slug(slug))+" ")]):_vm._e()])}),0)}
var AdminInfoLinevue_type_template_id_3642bfde_staticRenderFns = []


// CONCATENATED MODULE: ./src/components/admin/AdminInfoLine.vue?vue&type=template&id=3642bfde&

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js??ref--12-0!./node_modules/thread-loader/dist/cjs.js!./node_modules/babel-loader/lib!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/components/admin/AdminInfoLine.vue?vue&type=script&lang=js&
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ var AdminInfoLinevue_type_script_lang_js_ = ({
  name: "AdminInfoLine",
  props: {
    info_slugs: {
      type: Array
    },
    info_slug: {
      type: String
    },
    timezone: {
      type: String
    }
  },
  data: function data() {
    return {
      admin_info_list: {
        ownership_settings_general: this.T__("These settings apply for all users."),
        ownership_settings_profile: this.T__("This is used only for your event types and bookings."),
        ownership_settings_calendars: this.T__("These calendar accounts are visible only to you and used only for your event types and bookings."),
        ownership_settings_integrations: this.T__("These integration accounts are visible only to you and used only for your event types and bookings."),
        ownership_single_event_type: this.T__("This event type can be managed only by you."),
        ownership_my_bookings: this.T__("Only your bookings are listed here."),
        booking_default_reminder_email: this.T__("A reminder email will be sent to invitees 24hrs before their scheduled event time.")
      }
    };
  },
  computed: {
    info_slugs_final: function info_slugs_final() {
      var info_slugs_tmp = [];

      if (Array.isArray(this.info_slugs) && this.info_slugs.length) {
        info_slugs_tmp = this.clone_deep(this.info_slugs);
      } else if (this.info_slug) {
        info_slugs_tmp = [this.info_slug];
      }

      return info_slugs_tmp;
    }
  },
  methods: {
    get_info_by_slug: function get_info_by_slug(slug) {
      if (!this.admin_info_list.hasOwnProperty(slug)) {
        return "";
      }

      return this.admin_info_list[slug];
    }
  }
});
// CONCATENATED MODULE: ./src/components/admin/AdminInfoLine.vue?vue&type=script&lang=js&
 /* harmony default export */ var admin_AdminInfoLinevue_type_script_lang_js_ = (AdminInfoLinevue_type_script_lang_js_); 
// CONCATENATED MODULE: ./src/components/admin/AdminInfoLine.vue





/* normalize component */

var AdminInfoLine_component = Object(componentNormalizer["a" /* default */])(
  admin_AdminInfoLinevue_type_script_lang_js_,
  AdminInfoLinevue_type_template_id_3642bfde_render,
  AdminInfoLinevue_type_template_id_3642bfde_staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* harmony default export */ var AdminInfoLine = (AdminInfoLine_component.exports);
// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js?{"cacheDirectory":"node_modules/.cache/vue-loader","cacheIdentifier":"23115053-vue-loader-template"}!./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/components/admin/PremiumInfoBadge.vue?vue&type=template&id=6549dc0b&
var PremiumInfoBadgevue_type_template_id_6549dc0b_render = function () {var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;return _c('div',{staticClass:"pro-badge-cont",on:{"click":_vm.show_pricing_compare_modal}},[_c('div',{staticClass:"pro-badge"},[_c('strong',[_vm._v("Premium")]),_vm._t("default")],2)])}
var PremiumInfoBadgevue_type_template_id_6549dc0b_staticRenderFns = []


// CONCATENATED MODULE: ./src/components/admin/PremiumInfoBadge.vue?vue&type=template&id=6549dc0b&

// CONCATENATED MODULE: ./node_modules/cache-loader/dist/cjs.js??ref--12-0!./node_modules/thread-loader/dist/cjs.js!./node_modules/babel-loader/lib!./node_modules/cache-loader/dist/cjs.js??ref--0-0!./node_modules/vue-loader/lib??vue-loader-options!./src/components/admin/PremiumInfoBadge.vue?vue&type=script&lang=js&
//
//
//
//
//
//
//
//
//

/* harmony default export */ var PremiumInfoBadgevue_type_script_lang_js_ = ({
  name: "PremiumInfoBadge",
  methods: {
    show_pricing_compare_modal: function show_pricing_compare_modal() {
      event_bus.$emit("show-pricing-compare-modal");
    }
  }
});
// CONCATENATED MODULE: ./src/components/admin/PremiumInfoBadge.vue?vue&type=script&lang=js&
 /* harmony default export */ var admin_PremiumInfoBadgevue_type_script_lang_js_ = (PremiumInfoBadgevue_type_script_lang_js_); 
// CONCATENATED MODULE: ./src/components/admin/PremiumInfoBadge.vue





/* normalize component */

var PremiumInfoBadge_component = Object(componentNormalizer["a" /* default */])(
  admin_PremiumInfoBadgevue_type_script_lang_js_,
  PremiumInfoBadgevue_type_template_id_6549dc0b_render,
  PremiumInfoBadgevue_type_template_id_6549dc0b_staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* harmony default export */ var PremiumInfoBadge = (PremiumInfoBadge_component.exports);
// CONCATENATED MODULE: ./src/admin_main.js




//eslint-disable-next-line
__webpack_require__.p = window.__wpcal_dist_url; // As import files are hoisted "window.__wpcal_client_end = "admin";" was not running, resulted in unexpected results. Now the same code run using import "./utils/client_end_admin.js";










vue_runtime_esm["default"].use(dist_default.a, {
  dialog: true
}); // import VCalendar from "v-calendar";
// Vue.use(VCalendar);


vue_runtime_esm["default"].component("v-date-picker", date_picker_umd_default.a);

vue_runtime_esm["default"].use(lib_default.a);


vue_runtime_esm["default"].use(vuelidate_error_extractor_esm["a" /* default */], vuelidate_error_extractor_options["a" /* default */]);


var defaultVueIziToastOptions = {
  timeout: 5000,
  position: "topRight",
  drag: false
};
vue_runtime_esm["default"].use(vue_izitoast_default.a, defaultVueIziToastOptions);

vue_runtime_esm["default"].component("AdminInfoLine", AdminInfoLine);

vue_runtime_esm["default"].component("PremiumInfoBadge", PremiumInfoBadge);
vue_runtime_esm["default"].config.productionTip = false;

vue_runtime_esm["default"].prototype.__ = common_func["b" /* __ */];
vue_runtime_esm["default"].prototype._x = common_func["f" /* _x */];
vue_runtime_esm["default"].prototype._n = common_func["d" /* _n */];
vue_runtime_esm["default"].prototype._nx = common_func["e" /* _nx */];
vue_runtime_esm["default"].prototype.T__ = common_func["b" /* __ */];
vue_runtime_esm["default"].prototype.T_x = common_func["f" /* _x */];
vue_runtime_esm["default"].prototype.T_n = common_func["d" /* _n */];
vue_runtime_esm["default"].prototype.T_nx = common_func["e" /* _nx */];
vue_runtime_esm["default"].prototype.Tsprintf = common_func["a" /* Tsprintf */];
document.addEventListener("DOMContentLoaded", function () {
  new vue_runtime_esm["default"]({
    router: router_admin,
    store: admin,
    render: function render(h) {
      return h(AdminApp);
    }
  }).$mount("#wpcal_admin_app");
});

/***/ }),

/***/ "c6fa":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "ca06":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "d1bc":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "de9d":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "e791":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_SettingAdmins_vue_vue_type_style_index_0_id_94c92af6_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("0131");
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_SettingAdmins_vue_vue_type_style_index_0_id_94c92af6_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_SettingAdmins_vue_vue_type_style_index_0_id_94c92af6_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_SettingAdmins_vue_vue_type_style_index_0_id_94c92af6_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "e98d":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_WeekDaysSelector_vue_vue_type_style_index_0_id_48cce514_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("0d24");
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_WeekDaysSelector_vue_vue_type_style_index_0_id_48cce514_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_WeekDaysSelector_vue_vue_type_style_index_0_id_48cce514_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_WeekDaysSelector_vue_vue_type_style_index_0_id_48cce514_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "eec2":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_AdminApp_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("a550");
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_AdminApp_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_AdminApp_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_2_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_3_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_AdminApp_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "f27a":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "f3b6":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "f648":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_PricingStrongerTogether_vue_vue_type_style_index_0_id_34bd2deb_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("a128");
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_PricingStrongerTogether_vue_vue_type_style_index_0_id_34bd2deb_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_PricingStrongerTogether_vue_vue_type_style_index_0_id_34bd2deb_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_PricingStrongerTogether_vue_vue_type_style_index_0_id_34bd2deb_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "f70a":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ServiceBookingList_vue_vue_type_style_index_0_id_96f56fa0_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("4f67");
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ServiceBookingList_vue_vue_type_style_index_0_id_96f56fa0_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ServiceBookingList_vue_vue_type_style_index_0_id_96f56fa0_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ServiceBookingList_vue_vue_type_style_index_0_id_96f56fa0_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "fbbe":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_SettingCalendars_vue_vue_type_style_index_1_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("704d");
/* harmony import */ var _node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_SettingCalendars_vue_vue_type_style_index_1_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_SettingCalendars_vue_vue_type_style_index_1_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* unused harmony reexport * */
 /* unused harmony default export */ var _unused_webpack_default_export = (_node_modules_mini_css_extract_plugin_dist_loader_js_ref_6_oneOf_1_0_node_modules_css_loader_dist_cjs_js_ref_6_oneOf_1_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_oneOf_1_2_node_modules_cache_loader_dist_cjs_js_ref_0_0_node_modules_vue_loader_lib_index_js_vue_loader_options_SettingCalendars_vue_vue_type_style_index_1_lang_css___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ })

/******/ });