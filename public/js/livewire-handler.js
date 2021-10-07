/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************************!*\
  !*** ./resources/js/livewire-handler.js ***!
  \******************************************/
// Reload table
Livewire.on("reloadTable", function (tableName) {
  Livewire.components.getComponentsByName(tableName)[0].$wire.$refresh();
});
/******/ })()
;