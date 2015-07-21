// name our angular app

'use strict';

angular.module('todoApp', [])
    .controller('mainController', function() {

    // bind this to vm (view-model)
    var vm = this;

    vm.hideCompleted = true;

});