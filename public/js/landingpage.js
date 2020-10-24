(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["js/landingpage"],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/landingpage.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/landingpage.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  name: "landingpage",
  props: {
    id: String,
    name: String
  },
  data: function data() {
    return {
      pageviews: 0,
      unique_pageviews: 0
    };
  },
  computed: {
    landing_id: function landing_id() {
      return parseInt(this.id);
    }
  },
  methods: {
    getAllPageViews: function getAllPageViews() {
      var _this = this;

      axios.get('/landingpage/getPageview/' + this.landing_id).then(function (response) {
        console.log();
        _this.pageviews = response.data.current_pageviews;
        _this.unique_pageviews = response.data.unique_pageviews;
      })["catch"](function (error) {
        console.log(error);
      });
    }
  },
  mounted: function mounted() {
    console.log("I am mounted");
    this.getAllPageViews();
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/landingpage.vue?vue&type=template&id=0572f92b&scoped=true&":
/*!**************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/landingpage.vue?vue&type=template&id=0572f92b&scoped=true& ***!
  \**************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "homepage container m-5" }, [
    _c("h1", { staticClass: "m-3 text-center" }, [_vm._v(_vm._s(_vm.name))]),
    _vm._v(" "),
    _c("div", { staticClass: "row justify-content-center mt-4" }, [
      _c("div", { staticClass: "col-md-4" }, [
        _c("div", { staticClass: "card" }, [
          _c("div", { staticClass: "card-body text-center" }, [
            _c("div", { staticClass: "card-title" }, [
              _vm._v(
                "\n                        All Page Views\n                    "
              )
            ]),
            _vm._v(" "),
            _c("h2", [_vm._v(_vm._s(_vm.pageviews))])
          ])
        ])
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "col-md-4" }, [
        _c("div", { staticClass: "card" }, [
          _c("div", { staticClass: "card-body text-center" }, [
            _c("div", { staticClass: "card-title" }, [
              _vm._v(
                "\n                        Unique Page Views\n                    "
              )
            ]),
            _vm._v(" "),
            _c("h2", [_vm._v(_vm._s(_vm.unique_pageviews))])
          ])
        ])
      ])
    ])
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/landingpage.vue":
/*!*************************************************!*\
  !*** ./resources/js/components/landingpage.vue ***!
  \*************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _landingpage_vue_vue_type_template_id_0572f92b_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./landingpage.vue?vue&type=template&id=0572f92b&scoped=true& */ "./resources/js/components/landingpage.vue?vue&type=template&id=0572f92b&scoped=true&");
/* harmony import */ var _landingpage_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./landingpage.vue?vue&type=script&lang=js& */ "./resources/js/components/landingpage.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _landingpage_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _landingpage_vue_vue_type_template_id_0572f92b_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _landingpage_vue_vue_type_template_id_0572f92b_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "0572f92b",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/landingpage.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/landingpage.vue?vue&type=script&lang=js&":
/*!**************************************************************************!*\
  !*** ./resources/js/components/landingpage.vue?vue&type=script&lang=js& ***!
  \**************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_landingpage_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./landingpage.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/landingpage.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_landingpage_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/landingpage.vue?vue&type=template&id=0572f92b&scoped=true&":
/*!********************************************************************************************!*\
  !*** ./resources/js/components/landingpage.vue?vue&type=template&id=0572f92b&scoped=true& ***!
  \********************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_landingpage_vue_vue_type_template_id_0572f92b_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./landingpage.vue?vue&type=template&id=0572f92b&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/landingpage.vue?vue&type=template&id=0572f92b&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_landingpage_vue_vue_type_template_id_0572f92b_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_landingpage_vue_vue_type_template_id_0572f92b_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);