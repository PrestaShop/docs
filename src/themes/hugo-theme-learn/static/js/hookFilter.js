$(function() {

  const allItems = $('#hookFilter ~ dl dt');

  const escapeRegExp = function(string) {
    return string.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
  };

  const displayAll = function() {
    allItems.each(function() {
      const $item = $(this);
      if ($item.is(':hidden')) {
        $item.show();
        $item.next('dd').show();
      }
    });
  };

  const filterList = function(search) {
    const regex = new RegExp(escapeRegExp(search), 'i');
    allItems.each(function() {
      const $item = $(this);
      const $sibling = $item.next('dd');
      const text = $item.text();
      const matchesSearch = Boolean(text.match(regex));
      $item.toggle(matchesSearch);
      $sibling.toggle(matchesSearch);
    });
  };

  $('#hookFilter input[type="text"]').on('change', function(e) {
    const searchText = $(this).val().replace(/^\s+|\s+$/, '');
    if (searchText.length > 0) {
      filterList(searchText);
    } else {
      displayAll();
    }
  });
});
