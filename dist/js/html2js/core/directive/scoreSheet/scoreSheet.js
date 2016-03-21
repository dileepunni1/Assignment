(function(module) {
try {
  module = angular.module('angus.templates.app');
} catch (e) {
  module = angular.module('angus.templates.app', []);
}
module.run(['$templateCache', function($templateCache) {
  $templateCache.put('directive/scoreSheet/scoreSheet.html',
    '<div class="row">\n' +
    '    <div class="col-md-12">\n' +
    '      scghsajvsakbcsjbcsdvjdfghjklòkjhgfd\n' +
    '\n' +
    '    </div>\n' +
    '\n' +
    '\n' +
    '</div>');
}]);
})();
