var docDefinition = {
    footer: function(currentPage, pageCount) { return currentPage.toString() + ' of ' + pageCount; },
    header: function(currentPage, pageCount, pageSize) {
      // you can apply any logic and return any valid pdfmake element
  
      return [
        { text: 'simple text', alignment: (currentPage % 2) ? 'left' : 'right' },
        { canvas: [ { type: 'rect', x: 170, y: 32, w: pageSize.width - 170, h: 40 } ] }
      ]
    },
    
  };