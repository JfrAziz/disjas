// Reload table

Livewire.on("reloadTable", (tableName) => {
    Livewire.components.getComponentsByName(tableName)[0].$wire.$refresh()
});