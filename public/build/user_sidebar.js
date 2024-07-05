(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["user_sidebar"],{

/***/ "./assets/js/left_sidebar.js":
/*!***********************************!*\
  !*** ./assets/js/left_sidebar.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var $ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");

$('#collapsingLeftSideBar').click(function () {
  var leftSideBar = $('#sidebar');
  leftSideBar.css('margin-left') === '-250px' ? leftSideBar.css({
    "margin-left": '0'
  }) : leftSideBar.css({
    "margin-left": '-250px'
  });
});

/***/ })

},[["./assets/js/left_sidebar.js","runtime","vendors~app~user_sidebar"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvbGVmdF9zaWRlYmFyLmpzIl0sIm5hbWVzIjpbIiQiLCJyZXF1aXJlIiwiY2xpY2siLCJsZWZ0U2lkZUJhciIsImNzcyJdLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7O0FBQUEsSUFBTUEsQ0FBQyxHQUFHQyxtQkFBTyxDQUFDLG9EQUFELENBQWpCOztBQUVBRCxDQUFDLENBQUMsd0JBQUQsQ0FBRCxDQUE0QkUsS0FBNUIsQ0FBa0MsWUFBVztBQUN6QyxNQUFJQyxXQUFXLEdBQUdILENBQUMsQ0FBQyxVQUFELENBQW5CO0FBQ0FHLGFBQVcsQ0FBQ0MsR0FBWixDQUFnQixhQUFoQixNQUFtQyxRQUFuQyxHQUE4Q0QsV0FBVyxDQUFDQyxHQUFaLENBQWdCO0FBQUMsbUJBQWU7QUFBaEIsR0FBaEIsQ0FBOUMsR0FBc0ZELFdBQVcsQ0FBQ0MsR0FBWixDQUFnQjtBQUFDLG1CQUFlO0FBQWhCLEdBQWhCLENBQXRGO0FBQ0gsQ0FIRCxFIiwiZmlsZSI6InVzZXJfc2lkZWJhci5qcyIsInNvdXJjZXNDb250ZW50IjpbImNvbnN0ICQgPSByZXF1aXJlKCdqcXVlcnknKTtcblxuJCgnI2NvbGxhcHNpbmdMZWZ0U2lkZUJhcicpLmNsaWNrKGZ1bmN0aW9uKCkge1xuICAgIGxldCBsZWZ0U2lkZUJhciA9ICQoJyNzaWRlYmFyJyk7XG4gICAgbGVmdFNpZGVCYXIuY3NzKCdtYXJnaW4tbGVmdCcpID09PSAnLTI1MHB4JyA/IGxlZnRTaWRlQmFyLmNzcyh7XCJtYXJnaW4tbGVmdFwiOiAnMCd9KSA6IGxlZnRTaWRlQmFyLmNzcyh7XCJtYXJnaW4tbGVmdFwiOiAnLTI1MHB4J30pO1xufSk7XG4iXSwic291cmNlUm9vdCI6IiJ9