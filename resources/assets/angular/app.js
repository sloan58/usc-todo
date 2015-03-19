// name our angular app
angular.module('todoApp', [])
    .controller('mainController', function() {

    // bind this to vm (view-model)
    var vm = this;

    vm.hideCompleted = true;

});