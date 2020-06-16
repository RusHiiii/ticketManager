var $ = require('jquery');

$(document).ready(function() {
    var picker = $("#field2Filter");
    var input = $("#filterValue");
    var firstTable = $("#meTable");
    var secondTable = $("#groupTable");
    input.keyup((evt)=>{
      var field2Filter = picker.val();
      var inputValue = $(evt.target).val();

      var concernedRow = firstTable.find("tbody").find("td[fieldname^='"+field2Filter+"']")
      $.each(concernedRow,(idx,elt)=>{
        doIteration(elt,inputValue)
      })
      var concernedRow2 = secondTable.find("tbody").find("td[fieldname^='"+field2Filter+"']")
      $.each(concernedRow2,(idx,elt)=>{
        doIteration(elt,inputValue)
      })
    })

    var picker2 = $("#row2Show");
    picker2.change((evt)=>{
      var inputValue = $(evt.target).val();
      var concernedRow = firstTable.find("tbody").find("td[fieldname^='dateEnd']")
      $.each(concernedRow,(idx,elt)=>{
        doIteration2(elt,inputValue);
      })
      var concernedRow2 = secondTable.find("tbody").find("td[fieldname^='dateEnd']")
      $.each(concernedRow2,(idx,elt)=>{
        doIteration2(elt,inputValue);
      })
    })
});

function doIteration(elt,val){
  if($(elt).text().includes(val)){
    $(elt).parent("tr").show()
  }else{
    if(val == ""){
      $(elt).parent("tr").show()
    }else {
      $(elt).parent("tr").hide()
    }
  }
}

function doIteration2(elt,val){
  if(val == "all"){
    $(elt).parent("tr").show()
  }else if (val == "visible") {
      if($(elt).text() == ""){
        $(elt).parent("tr").show()
      }else{
        $(elt).parent("tr").hide()
      }
  }else if (val == "close") {
    if($(elt).text() != ""){
      $(elt).parent("tr").show()
    }else{
      $(elt).parent("tr").hide()
    }
  }
}
